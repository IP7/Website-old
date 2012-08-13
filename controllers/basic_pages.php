<?php

function display_contact_page() {
    return tpl_render('contact.html', array(
        'page' => array( 'title' => 'Contact' )
    ));
}

?>

