<?php

// shortcut
function tpl_render($tp, $values) {
    return Config::$tpl->render($tp, tpl_array($values));
}

?>

