<?php

// check if $_POST[$name] exists and is not empty
function has_post($name, $allow_empty=false) {
    return (isset($_POST[$name]) && (!empty($_POST[$name]) || $allow_empty == empty($_POST[$name])));
}

?>
