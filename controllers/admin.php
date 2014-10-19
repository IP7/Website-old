<?php

# === HOME =====================================================================

function display_admin_home($message, $message_type) {
    $admin_uri = Config::$root_uri.'admin';

    $token = generate_token(null, 0, time() + Durations::ONE_MINUTE*2);
    
    if ( has_get('t') ){
        $message = get_message(get_string('t', 'GET'));
    }

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
                            array('title' => 'Contenus proposés', 'href' => $admin_uri.'/content/proposed')
                        )
                    )
                )
            )
    )));
}

function display_admin_proposed_content($msg_str=null, $msg_type=null){

	$contents = ContentQuery::create()
							->limit(50)
							->orderById()
							->findByValidated(0);

	$tpl_contents = Array();

	if ($contents){

		foreach ( $contents as $c ){

			$user   = $c->getAuthor();
			$cursus = $c->getCursus();
			$course = $c->getCourse();

            if (!$cursus) {
                continue;
            }

            $tpl_c = array(
                'title' => $c->getTitle(),
                'href'  => content_url($cursus, $course, $c),
                'date'  => tpl_date($c->getCreatedAt()),
                'author' => array(
                    'href' => user_url($user),
                    'name' => $user->getPublicName()
                )
            );

            if ($cursus) {

                $tpl_c['cursus'] = array(
                    'name' => $cursus->getShortName()
                );

                if ($course) {
                    $tpl_c ['course'] = array(
                        'name' => $course->getShortName()
                    );
                }
            }

			$tpl_contents []= $tpl_c;
		}

		return tpl_admin_render('admin/content_proposed.html', array(
            'page' => Array(
                'title' => 'Contenu proposé',
                'contents' => $tpl_contents,
				    'msg_str'  => $msg_str,
					'msg_type' => $msg_type
				)
        ));

	}

}

function post_admin_proposed_content() {

   $msg_str = null;
   $msg_type = null;

   if (!has_post('t')) {
       halt(HTTP_BAD_REQUEST);
   }

   $token = $_POST['t'];

   $fd = FormData::create($token);

   if ((!use_token($token, 'POST')) || (!$fd->exists())) {
       halt(HTTP_FORBIDDEN, 'Le jeton d\'authentification est invalide ou a expiré.');
   }

   $content = $fd->get('proposed');

	if ( !has_post('validate') && !has_post('delete') )
		return display_admin_proposed_content();

	if ( has_post('validate') ){
	
		$content->setValidated(1);
		$content->save();
		$msg_str = 'Le contenu a bien été validé.';	

	}
		
	if ( has_post('delete') ){
	
        $content->delete();
        $msg_str = 'Le contenu a bien été supprimé.';

	}

	return display_admin_proposed_content($msg_str, 'success');

}
