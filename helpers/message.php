<?php

function set_message($string){

    $string = (string)$string;
    $random = rand();

    $_SESSION['message'][$random] = $string;

    return $random;

}

function get_message($idMessage){

    if ( isset($_SESSION['message'][$idMessage]) && !empty($_SESSION['message'][$idMessage]) ){
        
        $msg = $_SESSION['message'][$idMessage];
        unset($_SESSION['message'][$idMessage]);

        return $msg;

    }

}

