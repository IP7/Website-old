<?php

function display_admin_home() {

    if (!isset($_SESSION['user'])) {
        // TODO check also if user rank is >= ADMIN_RANK
        // TODO connection
    }

    //TODO HTTP_UNAUTHORIZED
}

function post_connection() {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $pass = $_POST['password'];

        $co = connection($login, $pass);

        if ($co === WRONG_USERNAME_OR_PASSWORD) {
            //TODO HTTP_UNAUTHORIZED
            //TODO error message (try again)
        }

        //TODO test if $co has sufficient privileges,
        // and is not deactivated

    }

    //TODO HTTP_BAD_REQUEST
}

?>

