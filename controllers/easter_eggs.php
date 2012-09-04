<?php

function display_sql_injection() {
    $error = '<b>Warning: mysql_num_rows()</b>: supplied argument is'
            .' not a valid MySQL result resource in <b>/lolilol/boum'
            .'/boum/tralala.php</b> on line <b>42</b>';

    return tpl_render('empty.html',
        array(
            'page' => array(
                'title' => 'Boum',
                'content' => $error
            )
        )
    );
}

?>
