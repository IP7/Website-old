<?php

function escape_mysql_wildcards($s) {
    return preg_replace('/[%_*]/', '\\\\\\0', $s);
}

?>
