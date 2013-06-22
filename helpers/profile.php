<?php

# Return the URL of the avatar of the given user
function gravatar_url($user, $size=128) {
    $avatar_url  = '//www.gravatar.com/avatar/'.md5(strtolower(trim($user->getEmail())));
    $avatar_url .= '?s='.$size.'&d=retro';

    return $avatar_url;
}

function tpl_user($user, $extended=false) {
    $displayed_name = $user->getPublicName();

    $userStatus = '';
    $avatar = null;

    if ($user->isAlumni()) {
        $userStatus .= Lang\adapt_to_gender($user, 'Ancien étudiant');
    }
    else if ($user->isStudent()) {
        $userStatus .= Lang\adapt_to_gender($user, 'Étudiant');
    }

    if ($user->isTeacher()) {
        $userStatus .= ($userStatus=='') ? 'E' : ' e';
        $userStatus .= Lang\adapt_to_gender($user, 'nseignant');
    }

    $tpl_user = array(
        'name'        => $user->getName(),
        'pseudo'      => $user->getUsername(),
        'displayed_name' => $displayed_name,
        'id'          => $user->getId(),
        'rank'        => rights2rank($user->getRights()),

        'avatar'      => array(
            'href'   => gravatar_url($user, 128),
            'height' => 128,
            'width'  => 128
        ),

        'gender'      => $user->getGender(),
        'status'      => $userStatus,
        
        'birthdate'   => tpl_date($user->getBirthdate()),
        'age'         => $user->getAge(),
        'email'       => $user->getEmail(),
        'phone'       => $user->getPhone(),
        'website'     => $user->getWebsite(),
        'first_entry' => tpl_date($user->getFirstEntry()),
        'last_entry'  => tpl_date($user->getLastEntry()),
        'last_visit'  => tpl_date($user->getLastVisit()),
        'expiration'  => tpl_date($user->getExpirationDate()),

        'contents_count' => ContentQuery::create()
                                ->filterByAuthor($user)
                                ->filterByValidated(true)
                                ->count(),

        'noindex'     => !$user->getConfigIndexProfile(),

        'options' => array(
            array(
                'name'  => 'show_real_name',
                'value' =>  $user->getConfigShowRealName(),
                'title' => 'Montrer mon vrai nom'
            ),
            array(
                'name'  => 'show_birthdate',
                'value' => $user->getConfigShowBirthdate(),
                'title' => 'Montrer ma date de naissance'
            ),
            array(
                'name'  => 'show_age',
                'value' => $user->getConfigShowAge(),
                'title' => 'Montrer mon âge'
            ),
            array(
                'name'  => 'show_email',
                'value' => $user->getConfigShowEmail(),
                'title' => 'Montrer mon e-mail'
            ),
            array(
                'name'  => 'show_phone',
                'value' => $user->getConfigShowPhone(),
                'title' => 'Montrer mon téléphone'
            ),
            array(
                'name'  => 'private_profile',
                'value' => $user->getConfigPrivateProfile(),
                'title' => 'Cacher mon profil aux non-membres'
            ),
            array(
                'name'  => 'index_profile',
                'value' => $user->getConfigIndexProfile(),
                'title' => 'Indexer mon profil dans les moteurs de recherche'
            )
        )
    );

    if ($extended) {
        $tpl_user['description'] = $user->getDescription();
    }

    return $tpl_user;
}

// convert a rank into a rights level
function rank2rights($rank) {

    foreach (Config::$user_rights as $n => $s) {
        if ($s === $rank) return $n;
    }

    return VISITOR_RANK;
}

// convert a rights level into a rank
function rights2rank($rights) {
    if (isset(Config::$user_rights[$rights])) {
        return Config::$user_rights[$rights];
    }

    return null;
}
