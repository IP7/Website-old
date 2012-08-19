<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

# === HOME =====================================================================

function display_admin_home() {
    $message = $message_type = null;

    $admin_uri = Config::$root_uri.'admin';

    do_maintenance(&$message, &$message_type);

    return Config::$tpl->render('admin_main.html', tpl_array(
                                                            admin_tpl_default(),
                                                            array(
        'page' => array(
            'title'        => 'Accueil',

            'message'      => $message,
            'message_type' => $message_type,

            'sections'     => array(
                array(
                    'title'   => 'Modération',
                    'id'      => 'mod',
                    'actions' => array(
                        array('title' => 'Contenu signalé', 'href' => $admin_uri.'/reports'),
                        array('title' => 'Contenu proposé', 'href' => $admin_uri.'/content/proposed')
                    )
                ),
                array(
                    'title'   => 'Trésorerie',
                    'id'      => 'tres',
                    'actions' => array (
                        array('title' => 'Gérer les utilisateurs', 'href' => $admin_uri.'/membres'),
                        array('title' => 'Gérer les transactions', 'href' => $admin_uri.'/transactions')
                    )
                ),
                array(
                    'title'   => 'Maintenance',
                    'id'      => 'mnt',
                    'actions' => array(
                        array('title' => 'Purger le cache des templates', 'href' => $admin_uri.'?purge_cache'),
                        array('title' => 'Optimiser les tables',          'href' => $admin_uri.'?optimize_tables')
                    )
                )
            )
        )
    )));
}

# === FINANCES ================================================================

function display_admin_add_member($values=null, $msg=null, $msg_type=null) {

    return Config::$tpl->render('admin_add_member.html', tpl_array(admin_tpl_default(), array(
        'page' => array(
            'title' => 'Ajouter un membre',
            'breadcrumbs' => array(
                1 => array( 'title' => 'Ajouter un membre', 'href' => Config::$root_uri.'admin/membres/add' )
            ),

            'message' => $msg,
            'message_type' => $msg_type,

            'add_form' => array(
                'action' => Config::$root_uri.'admin/membres/add',

                'birthdate' => array(
                    'max' => date('Y-m-d', time() -  473040000), // 15 years ago
                    'min' => date('Y-m-d', time() - 3153600000) // 100 years ago
                ),

                'values' => $values
            ),

            'scripts' => array(
                array( 'src' => Config::$root_uri.'views/static/js/admin_enhancements.js' )
            )
        )
    )));
}

function post_admin_add_member() {

    $message = $message_type = null;

    $required_fields = array(
        'lastname' => 'Le nom',
        'firstname' => 'Le prénom',
        'username' => 'Le pseudo',
        'email' => 'L\'email'
    );

    foreach ($required_fields as $name => $label) {
        if (has_post($name)) { continue; }
        $message .= (($message!='')?' ':'').$label.' est requis.';
        $message_type = $message_type || 'error';
    }

    if ($message_type != null) {
        return display_admin_add_member($_POST, $message, $message_type);
    }

    if (!filter_username($_POST['username'])) {
        return display_admin_add_member($_POST, "Le pseudo est incorrect.", 'error');
    }

    if (UserQuery::create()->findOneByUsername(trim($_POST['username']))) {
        return display_admin_add_member($_POST, "Ce pseudo est déjà pris.", 'error');
    }

    $rank = has_post('rank') ? $_POST['rank'] : 'member';

    $type = ($rank == 'member')
                ? MEMBER_RANK
                : (($rank == 'moderator')
                    ? MODERATOR_RANK
                    : (($rank == 'admin')
                            ? ADMIN_RANK
                            : VISITOR_RANK));

    $gender = (has_post('gender') && $_POST['gender'] == 'F') ? 'F' : 'M';

    $password = get_random_password();

    $user = new User();
    $user->setType($type);
    $user->setFirstname(get_string('firstname', 'post'));
    $user->setLastname(get_string('lastname', 'post'));
    $user->setUsername(get_string('username', 'post'));
    $user->setPassword($password);
    $user->setGender($gender);
    $user->setWebsite('');
    $user->setEmail(get_string('email', 'post'));
    $user->setPhone(get_string('phone', 'post'));
    $user->setBirthDate(get_string('birthdate', 'post'));

    $user->setIsATeacher(has_post('teacher') && $_POST['teacher']);
    $user->setIsAStudent(has_post('student') && $_POST['student']);
    $user->setIsAnAlumni(has_post('alumni')  && $_POST['alumni']);

    $user->setRemarks(get_string('remarks', 'post'));

    if (get_string('fee', 'post') != '1') {
        $user->setFirstEntry(time());
        $user->setLastEntry(time());
        $user->setExpirationDate(next_expiration_date());

        $fee = new Transaction(); 
        $fee->setDescription("Cotisation de ".$user->getName().".");
        $fee->setAmount(5.0);
        $fee->setUser($user);
        $fee->setValidated(true);
        $fee->save();

        send_welcome_message($user, $password);
    }
    else {
        $user->setDeactivated(1);
    }

    $user->save();

    //TODO test if everything is fine
    return 'ok';
}

function display_admin_members() {

    $q = UserQuery::create()
            ->limit(100)
            ->orderByUsername()
            ->find();

    $members = array();

    if ($q != NULL) {
        foreach ($q as $m) {

            $activated = $m->isActivated();
            $uri = Config::$root_uri.'admin/membre/'.$m->getUsername();

            $lastentry = $m->getLastEntry();

            if ($lastentry == NULL) {
                $lastentry = 'jamais';
            } else {
                $dt = new DateTime($lastentry);
                $lastentry = $dt->format('d/m/Y');
            }

            $type = '-';

            if ($m->isAdmin()) {
                $type = 'administrateur';
            }
            else if ($m->isModerator()) {
                $type = 'modérateur';
            }
            else if ($m->isMember()) {
                $type = 'membre';
            }

            $activate_href = $uri.'/'.($activated?'off':'on');
            $activate_title = 'Désactiver';

            if (!$activated) {
                $activate_title = ($m->getFirstEntry() != NULL) ? 'Réactiver' : 'Activer';
            }

            $options = array(
                array( 'href' => $activate_href, 'title' => $activate_title,),
                array( 'href' => $uri.'/renew',  'title' => 'Renouveler' ),
                array( 'href' => $uri.'/edit',   'title' => 'Modifier' )
            );

            $members []= array(
                'id' => $m->getId(),
                'href' => Config::$root_uri.'p/'.$m->getUsername(),
                'pseudo' => $m->getUsername(),
                'name' => $m->getName(),
                'type' => $type,
                'last_entry' => $lastentry,
                'options' => $options
            );
        }
    }

    return Config::$tpl->render('admin_members.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'title' => 'Membres',
            'members' => $members,
            'add_member_link' => Config::$root_uri.'admin/membres/add'
        )
    )));
}

// check if an username already exists,
// and return the response with JSON
function json_admin_check_username() {
    if (!has_get('username')) {
        return '';
    }
    $u = trim($_GET['username']);

    $user = UserQuery::create()->findOneByUsername($u);

    return json(array('response' => ($user ? 'fail' : 'ok')));
}

?>
