<?php

function display_search_results() {
    //TODO cf issue #28

    if (!has_get('q')) {
        redirect_to('/', array( 'status' => HTTP_MOVED_PERMANENTLY ));
    }

    status(HTTP_NOT_IMPLEMENTED);
}

?>
