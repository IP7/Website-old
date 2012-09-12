<?php

require_once dirname(__FILE__) . '/../config.php';
Config::init();

function display_bug_report($msg_str=null, $msg_type=null){

    return Config::$tpl->render('bug_report.html', tpl_array(array(
        'page' => Array(
		    'title' => 'Signaler un bug',
            'message' => $msg_str,
            'message_type' => $msg_type
        )
    )));

}

function post_bug_report(){

    $msg_str = '';
    $msg_type = null;

    if (!has_post('title') || !has_post('description')) {
        $msg_type = 'error';
        $msg_str = 'Veuillez préciser ';
        $has_title = true;

        if (!has_post('title')) { $msg_str .= 'un titre'; $has_title = false; }
        if (!has_post('description')) { $msg_str .= ($has_title ? 'et ' : '').'une description'; }

        $msg_str .= '.';
    }

    else {

        $username = is_connected() ? user()->getPublicName() : 'anonymous';

        $to = 'contact@infop7.org';
        $subject = 'Signalement de bug : ' . $_POST['title'];
        $message = 'Auteur : '.$username . "\r\nIP : " . $_SERVER['REMOTE_ADDR'] . "\r\n";
        $message .= 'UA : '.$_SERVER['HTTP_USER_AGENT'] . "\r\n";
        $message .= 'Site version : '.IP7WEBSITE_VERSION."\r\n\r\n";
        $message .= 'Description : '.$_POST['description'] . "\r\n\r\n";

        if ( send_email_to($to, 'Bug report', $subject, $message, $username) ){

            $msg_str = 'Merci ! Le signalement a bien été enregistré.';
            $msg_type = 'success';
        }

        else {
            $msg_str  = 'Une erreur a été détectée lors de l\'enregistrement.';
            $msg_str .= 'Veuillez réessayer. Si l\'erreur persiste, contactez-nous.';
            $msg_type = 'error';
        }

    }

    return display_bug_report($msg_str, $msg_type);

}

?>

