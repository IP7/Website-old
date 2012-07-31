<?php

# Templates helpers

# Merge default templates values with the given
# array, and return a new array.
function tpl_array($arr) {

    if (empty($arr)) {
        return Config::$default_tpl_values;
    }
    return array_merge(Config::$default_tpl_values, $arr);
}

?>

