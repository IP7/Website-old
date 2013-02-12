<?php

function display_signin_form($values=null, $msg=null, $msg_type=null) {


    return tpl_render('signin_form.html', array(
        'page' => array(
            'title'          => 'Inscription',
            'breadcrumbs'    => array(
                array(
                    'href'  => url(),
                    'title' => 'Inscription'
                )
            ),

            'message' => $msg,
            'message_type' => $msg_type,

            'keywords'       => array(),
            'description'    => 'Inscription au site d\'IP7'

        )
    ));

}

function post_signin_form() {

    $last_name = get_string('lastname', 'post');
    $first_name = get_string('firstname', 'post');
    $good_email = filter_email('email', 'post');
    $email = get_string('email', 'post');
    
    $is_student = (bool)get_string('etu', 'post');
    $is_alumni = (bool)get_string('a_etu', 'post');
    $is_teacher = (bool)get_string('ens', 'post');

    $dob = get_string('dob', 'post');
    $phone = get_string('phone', 'post');
    $good_phone = filter_phone('phone', 'post');

    $message = '';
    $message_type = null;
    $missing_fields = array();

    if (!$last_name) { $missing_fields []= 'du nom de famille'; }
    if (!$first_name) { $missing_fields []= 'du prénom'; }
    if (!$email) { $missing_fields []= 'de l\'email'; }
    else if (!$good_email) {

        $message = 'L\'email entré est incorrect. ';
        $message_type = 'error';
    }

    if (count($missing_fields) > 0) {

        $message_type = 'error';

        if (count($missing_fields) == 1) {

            $message .= 'Il manque le champ ' . $missing_fields[0] . '.';

        } else {

            $message .= 'Il manque les champs ';
            $last = array_pop($missing_fields);

            $message .= implode(', ', $missing_fields);
            $message .= ' et ' .$last . '.';

        }

    }
        
    if ($message_type != null) {
        return display_signin_form($_POST, $message, $message_type);
    }

    $phone =  $good_phone ? format_phone($phone) : '06';
    $password = get_random_password();

    $user = new User();

    $user->setRights(MEMBER_RANK);
    $user->setFirstname($first_name);
    $user->setLastname($last_name);
    $user->setUsername(get_temp_username());
    $user->setPassword($password);
    $user->setGender('N');
    $user->setEmail($email);
    $user->setPhone($phone);

    $user->setIsATeacher($is_teacher);
    $user->setIsAStudent($is_student);
    $user->setIsAnAlumni($is_alumni);

    $paths = array();

    if (has_post('educpaths')) {
        foreach ($_POST['educpaths'] as $id) {
            $p = EducationalPathQuery::create()->findOneById($id);
            if ($p != NULL) {
                $paths []= $p;
            }
        }
    }

    $user->setDeactivated(0);

    if ($user->validate()) {
        if(!$user->save()) {
            return display_signin_form(
                $_POST,
                'Une erreur est survenue lors de l\'enregistrement dans la base de données.',
                'error'
            );
        }

        foreach ($paths as $p) {
            $user->addEducationalPath($p);
        }

        send_welcome_message($user);

    }

    foreach ($user->getValidationFailures() as $failure) {
        $message .= (($message=='')?' ':'') . $failure->getMessage();
        if(!$message_type) $message_type = 'error';
    }
    
    if ($message_type != null) {
        return display_signin_form($_POST, $message, $message_type);
    }

    return tpl_render('signin_confirm.html', array(
        'page' => array(
            'title'         => 'Inscription',
            'breadcrumbs'   => array(
                array(
                    'href'  => url(),
                    'title' => 'Inscription'
                )
            ),

            'keywords'      => array(),
            'description'   => 'Inscription au site d\'IP7',

            'inbox_url'     => get_mail_provider_url($user)

        )
    ));

}
