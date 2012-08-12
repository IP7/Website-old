<?php

	require_once dirname(__FILE__).'/../config.php'; 
	Config::init();

	/*
	
		#TODO
		-Permettre aux utilisateurs de changer certains champs #DONE
		-Faire la fonction pour changer les données

	*/

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
                    'birthdate'   => (!$only_public || $user->getConfigShowBirthdate())? $user->getBirthdate() : false,
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

    # TODO
    function post_edit_profile_page() {
        echo('TEST: $_POST=');
        var_dump($_POST);
        return "";
    }

?>
