<?php

	require_once dirname(__FILE__).'/../config.php'; 
	Config::init();

    function user2tplarray($user, $only_public=true) {
        $name = ($user->getConfigShowRealName()) ? $user->getName() : $user->getUsername();
        
         $userStatus = '';
 
         if ($user->isStudent()) {
             $userStatus .= adapt_to_gender($user, 'Étudiant');
         }
 
         if ($user->isTeacher()) {
             $userStatus .= ($userStatus=='') ? 'E' : ' e';
             $userStatus .= adapt_to_gender($user, 'nseignant');
         }

         $birthdate = (!$only_public || $user->getConfigShowBirthdate())? $user->getBirthdate() : false;

         if ($birthdate) {
            $birthdate = array( 'datetime_attr' => '', 'date' => date_fr($birthdate));
         }

         return array(
            'page' => array(
                'title' => 'Profil de '.$name,
                'noindex' => !$user->getConfigIndexProfile(),

                'user' => array(
                    'name'        => $name,
                    'pseudo'      => $user->getUsername(),
                    'status'      => $userStatus,
                    'firstname'   => (!$only_public || $user->getConfigShowRealName()) ? $user->getFirstName() : false,
                    'lastname'    => (!$only_public || $user->getConfigShowRealName()) ? $user->getLastName() : false,
                    'birthdate'   => $birthdate,
                    'age'         => (!$only_public || $user->getConfigShowAge()) ? $user->getAge() : false,
                    'email'       => (!$only_public || $user->getConfigShowEmail()) ? $user->getEmail() : false,
                    'phone'       => (!$only_public || $user->getConfigShowPhone()) ? $user->getPhone() : false,
                    'address'     => (!$only_public || $user->getConfigShowAddress()) ? $user->getAddress() : false,
                    'website'     => $user->getWebsite(),
                    'entry_date'  => $user->getFirstEntry(),
                    'last_visit'  => date_fr($user->getLastVisit()),
                    'description' => $user->getDescription(),

                    'options' => array(
                        array(
                            'name'  => 'opt_show_real_name',
                            'value' =>  $user->getConfigShowRealName(),
                            'title' => 'Montrer mon vrai nom'
                        ),
                        array(
                            'name'  => 'opt_show_birthdate',
                            'value' => $user->getConfigShowBirthdate(),
                            'title' => 'Montrer ma date de naissance'
                        ),
                        array(
                            'name'  => 'opt_show_age',
                            'value' => $user->getConfigShowAge(),
                            'title' => 'Montrer mon âge'
                        ),
                        array(
                            'name'  => 'opt_show_email',
                            'value' => $user->getConfigShowEmail(),
                            'title' => 'Montrer mon e-mail'
                        ),
                        array(
                            'name'  => 'opt_show_phone',
                            'value' => $user->getConfigShowPhone(),
                            'title' => 'Montrer mon téléphone'
                        ),
                        array(
                            'name'  => 'opt_show_address',
                            'value' => $user->getConfigShowAddress(),
                            'title' => 'Montrer mon adresse'
                        ),
                        array(
                            'name'  => 'opt_index_profile',
                            'value' => $user->getConfigIndexProfile(),
                            'title' => 'Indexer mon profil dans les moteurs de recherche'
                        )
                    )
                ),

            )
         );

    }

	function display_profile_page($username, $me=false) {
        if (!$me) {
            if (empty($username)) {
                halt(NOT_FOUND);
            }

            $user = UserQuery::create()->findOneByUsername($username);
        } else {
            if (!is_connected()) {
                halt(NOT_FOUND);
            }
            $user = user();
        }

		if ( $user == NULL ) {
            halt(NOT_FOUND);
        }

        $page = array();

        if ($me) {
            $page['href'] = Config::$root_uri.'profile';
            $page['title'] = 'Mon profil';
        }
        else {
            $page['href'] = Config::$root_uri.'p/'.$user->getUsername();
            $page['title'] = 'Profil de '.($user->getConfigShowRealName() ? $user->getName() : $user->getUsername());
        }

        return Config::$tpl->render('public_profile.html', tpl_array(user2tplarray($user), array(
            'page' => array(
                'breadcrumb' => array( $page ),
                'edit_button' => (!$me ? false : array( 'href' => Config::$root_uri.'profile/edit', 'title' => 'Éditer' ))
            )
        ),
        ($me? array('page' => array('title' => 'Mon Profil')) : array())));
	
	}

	function display_my_profile_page(){
        return display_profile_page(null, true);
	}

	function display_edit_profile_page(){
        if (!is_connected()) {
            halt(NOT_FOUND);
        }

		return Config::$tpl->render('profile_edit.html', tpl_array(user2tplarray(user(), false), Array(
            'page' => array(
                'title' => 'Edition du profil',
                'edit_form' => array( 'action' => Config::$root_uri.'profile/edit' )
            )
        )));
	}

    function post_edit_profile_page() {

        if (!is_connected()) {
            halt(NOT_FOUND);
        }

        $msgstr = '';
        $msgtype = false;

        if (has_post('new_password')) {
            if (!isset($_POST['old_password']) || empty($_POST['old_password'])) {
                $msgstr = 'Veuillez entrer votre ancien mot de passe pour le changer.';
                $msgtype = 'error';
            }
            else if (!Config::$p_hasher->CheckPassword($_POST['old_password'],
                                                        user()->getPasswordHash())) {
                $msgstr = 'L\'ancien mot de passe est incorrect.';
                $msgtype = 'error';
            }
            else {

                $p = $_POST['new_password'];

                if (strlen($p) < 3) {
                    $msgstr = 'Le nouveau mot de passe est trop court.';
                    $msgtype = 'error';
                }
                else {
                    user()->setPassword($p);
                }    
            }
        }

        if (has_post('website')) {
            $website = $_POST['website'];
            if (!filter_website($website)) {
                $msgstr = 'Le site Web est incorrect.';
                $msgtype = 'error';
            }
            else {
                user()->setWebsite($website);
            }
        }

        if (has_post('description')) {
            $desc = trim($_POST['description']);

            if (strlen($desc) > 512) {
                $desc = mb_substr($desc, 0, 509).'...';
                $msgstr = 'La présentation est trop longue, elle a été tronquée à 512 caractères.';
                $msgtype = 'notice';
            }

            user()->setDescription($desc);
        }

        $opts = array(
            'opt_show_real_name' => 0,
            'opt_show_birthdate' => 0,
            'opt_show_age' => 0,
            'opt_show_email' => 0,
            'opt_show_phone' => 0,
            'opt_show_address' => 0,
            'opt_index_profile' => 0
        );

        foreach ($opts as $opt => $v) {
            if (has_post($opt, true)) {
                $opts[$opt] = !!$_POST[$opt];
            }
        }

        user()->setConfigShowRealName($opts['opt_show_real_name']);
        user()->setConfigShowBirthdate($opts['opt_show_birthdate']);
        user()->setConfigShowAge($opts['opt_show_age']);
        user()->setConfigShowEmail($opts['opt_show_email']);
        user()->setConfigShowPhone($opts['opt_show_phone']);
        user()->setConfigShowAddress($opts['opt_show_address']);
        user()->setConfigIndexProfile($opts['opt_index_profile']);

        user()->save();

        if (!$msgstr) {
            redirect_to('/profile', array('status' => HTTP_SEE_OTHER));
        }


		return Config::$tpl->render('profile_edit.html', tpl_array(user2tplarray(user(), false), Array(
            'page' => array(
                'title' => 'Edition du profil',
                'edit_form' => array( 'action' => Config::$root_uri.'profile/edit' ),

                'message' => $msgstr,
                'message_type' => $msgtype

                #TODO add old values if there is a mistake
            )
        )));
    }

?>
