<?php

function short_link_route() {


    $code = params(0);

    if (!$code) {
        redirect_to( 'http://www.infop7.org' );
    }

    $shortlink = ShortLinkQuery::create()
                    ->findOneByShortUrl($code);

    if (!$shortlink) {
        redirect_to( 'http://www.infop7.org/404' );
    }
    else {

        redirect_to(
            'http://www.infop7.org/' . $shortlink->getUrl(),
            array( 'status' => HTTP_MOVED_PERMANENTLY )
        );

    }
}
