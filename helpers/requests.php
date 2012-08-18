<?php

// check if $_POST[$name] exists and is not empty
function has_post($name, $allow_empty=false) {
    return (isset($_POST[$name]) && (!empty($_POST[$name]) || $allow_empty == empty($_POST[$name])));
}

// check if $_GET[$name] exists and is not empty
function has_get($name, $allow_empty=false) {
    return (isset($_GET[$name]) && (!empty($_GET[$name]) || $allow_empty == empty($_GET[$name])));
}

?>
