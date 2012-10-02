<?php

// check if the sent content is correct
function check_sent_content() {
    if (!has_post('t')) {
       halt(HTTP_FORBIDDEN, 'Un jeton d\'authentification est nécessaire.'); 
    }
    if (!has_post('title')) {
        halt(HTTP_BAD_REQUEST, 'Le titre du contenu est requis.');
    }
    else if (strlen($_POST['title']) > 140) {
        halt(HTTP_BAD_REQUEST, 'Le titre du contenu est trop long (140 caractères max).');
    }
}

?>
