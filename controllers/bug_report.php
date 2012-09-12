<?php

require_once dirname(__FILE__) . '/../config.php';
Config::init();

function display_bug_report($msg_str=null, $msg_type=null){

    return Config::$tpl->render('bug_report.html', tpl_array(array(
        'page' => Array(
		    'title' => 'Signalement de bugs',
            'msg_str' => $msg_str,
            'msg_type' => $msg_type
        )
    )));

}

function post_bug_report(){

    $msg_str = null;
    $msg_type = null;

    if ( empty($_POST['title']) || empty($_POST['description']) ){

        $msg_str = 'L\'un des deux champs est vide';
        $msg_type = 'error';

    }

    else{

        if ( !is_connected() )
            $username = 'anonymous';
        else
            $username = user()->getPublicName();

        $to = 'contact@infop7.org';
        $subject = 'Report de bug : ' . $_POST['title'];
        $message = $username . ' -- ' . $_SERVER['REMOTE_ADDR'] . "\r\n";
        $message .= $_SERVER['HTTP_USER_AGENT'] . "\r\n\r\n";
        $message .= $_POST['description'] . "\r\n\r\n";
        $message .= 'Message généré le ' . date("d/m/y \à H:i:s");

        if ( send_email_to($to, 'Bug report', $subject, $message, $username) ){

            $msg_str = 'Le rapport a bien été envoyé';
            $msg_type = 'notice';
        }

        else{

            $msg_str = 'Une erreur a été détécté lors de l\'envoi';
            $msg_type = 'error';
        }

    }

    return display_bug_report($msg_str,$msg_type);

}

?>

