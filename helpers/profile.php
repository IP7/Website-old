<?php

# Return the URL of the avatar of the given user
function gravatar_url($user, $size=128) {
    $avatar_url  = '//www.gravatar.com/avatar/'.md5(strtolower(trim($user->getEmail())));
    $avatar_url .= '?s='.$size.'&d=retro';

    return $avatar_url;
}
