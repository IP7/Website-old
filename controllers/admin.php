<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

# === HOME =====================================================================

function display_admin_home($message, $message_type) {
    $admin_uri = Config::$root_uri.'admin';

    do_maintenance(&$message, &$message_type);

    $token = generate_token(null, 0, time() + Durations::ONE_MINUTE*2);

    return Config::$tpl->render('admin/main.html', tpl_array(
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
                            array('title' => 'Ajouter un membre',      'href' => $admin_uri.'/membres/add'),
                            array('title' => 'Gérer les membres',      'href' => $admin_uri.'/membres'),
                            array('title' => 'Gérer les transactions', 'href' => $admin_uri.'/transactions')
                        )
                    ),
                    array(
                        'title'   => 'Maintenance',
                        'id'      => 'mnt',
                        'actions' => array(
                            array('title' => 'Purger le cache des templates', 'href' => $admin_uri.'?purge_cache='.$token),
                            array('title' => 'Optimiser les tables',          'href' => $admin_uri.'?optimize_tables='.$token),
                            array('title' => 'Migrer la base de données',     'href' => $admin_uri.'/migrate')
                        )
                    )
                )
            )
    )));
}

# === MODERATION ===============================================================

function display_admin_content_report($msg = null){

	$query = ReportQuery::create()
                ->limit(50)
                ->orderById()
                ->find();

	$contentReport = Array();

	if ( $query != null ){

		foreach ( $query as $cR ){

			$user = $cR->getAuthor();
			$content = $cR->getContent();
	
			$uri = Config::$root_uri . 'cursus/' . $content->getCursus()->getShortName() . '/' . $content->getCourse()->getCode() . '/' . $content->getId();

			$contentReport []= Array(
                'id' => $cR->getId(),
                'href' => $uri,
					 'hrefUser' => Config::$root_uri . 'p/' . $user->getUsername(),
                'pseudo' => $user->getUsername(),
                'title' => $content->getTitle(),
                'reportDate' => $cR->getDate(),
                'reason' => $cR->getText(),
            );

		}

	}

	return Config::$tpl->render('admin/content_report.html', tpl_array(admin_tpl_default(),array(
					'page' => array(
						'title' => 'Contenu reporté',
						'msg' => $msg,
						'reports' => $contentReport
					)
			)));

}

function post_admin_content_report(){

	$msg = null;
	$content = ContentQuery::create()->findOneById((int)$_POST['content']);
	$report = ReportQuery::create()->findOneById((int)$_POST['report']);	

	if ( !has_post('Valider') && !has_post('Supprimer') )
		return display_admin_content_report();

	if ( has_post('Valider') ){
	
		$content->delete();
		$report->delete();
		$msg = "Le contenu et le report ont bien été supprimé";	

	}
		
	if ( has_post('Supprimer') ){
	
		$report->delete();
		$msg = 'Le report a bien été supprimé';

	}

	return display_admin_content_report($msg);

}

function display_admin_content_proposed(){

	$query = ContentQuery::create()
							->limit(50)
							->orderById()
							->findByValidated(0);

	$contentProposed = Array();
	$msg = '';

	if ( $query != null ){

		foreach ( $query as $cP ){

			$user   = $cP->getAuthor();
			$cursus = $cP->getCursus();
			$course = $cP->getCourse();

			$uri = Config::$root_uri . "admin/content/proposed/" . $cP->getId();

			$contentProposed []=	Array(
						'id' => $cP->getId(),
						'title' => $cP->getTitle(),
						'href' => $uri,
						'cursus' => $cursus->getShortName(),
						'course' => $course->getCode(),
						'pseudo' => $user->getUsername(),
						'proposedDate' => $cP->getDate()
					);


		}

		if ( has_get('n',false) ){
			if ( array_key_exists($_GET['n'],$_SESSION['message']) )
				$msg = get_message($_GET['n']);
		}
			
		return Config::$tpl->render('admin/content_proposed.html', tpl_array(admin_tpl_default(),array(
						'page' => Array(
							'title' => 'Contenu proposé',
							'msg' => $msg,
							'proposed' => $contentProposed
						)
				)));

	}

}

function display_admin_content_view(){

	$contentId = (int)params('id');

	$content	= ContentQuery::create()->findOneById($contentId);
	$user		= $content->getAuthor();
	$cursus	= $content->getCursus();
	$course	= $content->getCourse();

	$uri = Config::$root_uri . 'admin/content/proposed/' . $contentId;

	if ( $content->getValidated() )
		halt(NOT_FOUND);

	else{
		$contentArray = Array(
					'title' => $content->getTitle(),
					'cursus' => $cursus->getName(),
					'contentText' => $content->getText(),
					'courseName' => $course->getName(),
					'courseCode' => $course->getCode(),
					'date' => $content->getDate(),
					'username' => $user->getUsername()
				);

		$option = Array(
				Array(	'href' => $uri . '/validate',
							'title' => 'Valider'),
				Array(	'href' => $uri . '/delete',
							'title' => 'Supprimer')
			);
	}

	return Config::$tpl->render('admin/content_view.html', tpl_array(admin_tpl_default(),array(
					'page' => Array(
						'title' => 'Contenu proposé',
						'content' => $contentArray,
						'options' => $option
					)
		)));

}

function post_admin_content_action(){

	$id = (int)params('id');
	$action = (string)params('action');

	$content = ContentQuery::create()
							->findOneById($id);

	if ( ($content instanceOf Content) && !$content->getValidated() ){

		$msg = 'Le contenu a bien été ';
		$uri = 'admin/content/proposed';

		if ( $action == 'validate' ){
			$content->setValidated(true);
			$content->save();

			$idMessage = set_message($msg . 'validé.');

			redirect_to($uri, Array('n' => $idMessage));
		}	

		else if ( $action == 'delete' ){
			$content->delete();
			
			$idMessage = set_message($msg . 'supprimé.');
			redirect_to($uri, Array('n' => $idMessage));
		}	

		else
			halt(NOT_FOUND);

	}

	else
		halt(NOT_FOUND);

}

# === FINANCES ================================================================

function display_admin_add_member($values=null, $msg=null, $msg_type=null) {

    $paths = EducationalPathQuery::create()
        ->limit(15) // should not be so high, so this limit is ok
        ->orderByCursusId()
        ->find();

    $tpl_paths = array();

    foreach ($paths as $k => $p) {

        $cursus = $p->getCursus();
        if (!$cursus) { continue; }

        $tpl_paths []= array(
            'value' => $p->getId(),
            'name'  => $cursus->getShortName().' parcours '.$p->getShortName()
        );
    }

    return Config::$tpl->render('admin/add_member.html', tpl_array(admin_tpl_default(), array(
        'page' => array(
            'title' => 'Ajouter un membre',
            'breadcrumbs' => array(
                1 => array( 'title' => 'Membres', 'href' => Config::$root_uri.'admin/membres'),
                2 => array( 'title' => 'Ajouter un membre', 'href' => Config::$root_uri.'admin/membres/add' )
            ),

            'message' => $msg,
            'message_type' => $msg_type,

            'add_form' => array(
                'action' => Config::$root_uri.'admin/membres/add',

                'birthdate' => array(
                    'max' => date('Y-m-d', time() - Durations::ONE_YEAR*15), // 15 years ago
                    'min' => date('Y-m-d', time() - Durations::ONE_YEAR*100) // 100 years ago
                ),

                'post_token' => generate_post_token(user(), 0, time()+20*Durations::ONE_MINUTE),

                'educational_paths' => $tpl_paths,
                'values' => $values
            )
        )
    )));
}

function post_admin_add_member() {

    $message = $message_type = null;

    if (!has_post('t')) {
        return display_admin_add_member();
    }
    
    if (!use_token($_POST['t'], 'POST')) {
        return display_admin_add_member(
            $_POST,
            'Le token a expiré. Veuillez réessayer',
            'error'
        );
    }

    // required fields

    $required_fields = array(
        'lastname' => 'Le nom',
        'firstname' => 'Le prénom',
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


    // filters

    $rank = has_post('rank') ? $_POST['rank'] : 'member';

    $type = ($rank == 'member')
                ? MEMBER_RANK
                : (($rank == 'moderator')
                    ? MODERATOR_RANK
                    : (($rank == 'admin')
                            ? ADMIN_RANK
                            : VISITOR_RANK));

    $password = get_random_password();
    $phone = format_phone(get_string('phone', 'post'));
    $birthdate = get_date_from_input(get_string('birthdate', 'post'));
    $firstname = get_string('firstname', 'post');
    $lastname = get_string('lastname', 'post');

    $user = new User();
    $user->setType($type);
    $user->setFirstname(get_string('firstname', 'post'));
    $user->setLastname(get_string('lastname', 'post'));
    $user->setUsername(get_temp_username());
    $user->setPassword($password);
    $user->setGender('N');
    $user->setEmail(get_string('email', 'post'));
    $user->setPhone($phone);

    $user->setIsATeacher(has_post('teacher') && $_POST['teacher']);
    $user->setIsAStudent(has_post('student') && $_POST['student']);
    $user->setIsAnAlumni(has_post('alumni')  && $_POST['alumni']);

    $user->setRemarks(get_string('remarks', 'post'));

    $paths = array();

    if (has_post('educpaths')) {
        foreach ($_POST['educpaths'] as $id) {
            $p = EducationalPathQuery::create()->findOneById($id);
            if ($p != NULL) {
                $paths []= $p;
            }
        }
    }

    $fee = null;

    if (has_post('fee')) {
        $user->setFirstEntry(time());
        $user->setLastEntry(time());
        $user->setExpirationDate(next_expiration_date());

        $fee = new Transaction(); 
        $fee->setDescription("Cotisation de ".$user->getName().".");
        $fee->setAmount(5.0);
        $fee->setUser($user);
        $fee->setValidated(true);
    }

    if (get_string('activate', 'post')) {
        $user->setDeactivated(0);
    }

    if ($user->validate()) {
        if(!$user->save()) {
            return display_admin_add_member(
                $_POST,
                'Une erreur est survenue lors de l\'enregistrement dans la base de données.',
                'error'
            );
        }

        if ($fee) {
            $fee->save();
        }

        foreach ($paths as $p) {
            $user->addEducationalPath($p);
        }

        send_welcome_message($user);

        redirect_to(Config::$root_uri.'admin/', array( 'status' => HTTP_SEE_OTHER ));
    }

    foreach ($user->getValidationFailures() as $failure) {
        $message .= (($message=='')?' ':'') . $failure->getMessage();
        $message_type = $message_type || 'error';
    }

    return display_admin_add_member($_POST, $message, $message_type);
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

    return Config::$tpl->render('admin/members.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'title' => 'Membres',
            'members' => $members,
            'add_member_link' => Config::$root_uri.'admin/membres/add'
        )
    )));
}

?>
