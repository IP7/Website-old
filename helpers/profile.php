<?php

function tpl_user($user, $extended=false) {
    $displayed_name = ($user->getConfigShowRealName()) ? $user->getName() : $user->getUsername();

    $userStatus = '';

    if ($user->isAlumni()) {
        $userStatus .= adapt_to_gender($user, 'Ancien étudiant');
    }
    else if ($user->isStudent()) {
        $userStatus .= adapt_to_gender($user, 'Étudiant');
    }

    if ($user->isTeacher()) {
        $userStatus .= ($userStatus=='') ? 'E' : ' e';
        $userStatus .= adapt_to_gender($user, 'nseignant');
    }

    $tpl_user = array(
        'name'        => $user->getName(),
        'firstname'   => $user->getFirstName(),
        'lastname'    => $user->getLastName(),
        'pseudo'      => $user->getUsername(),
        'displayed_name' => $displayed_name,

        'gender'      => $user->getGender(),
        'status'      => $userStatus,
        
        'birthdate'   => tpl_date($user->getBirthdate()),
        'age'         => $user->getAge(),
        'email'       => $user->getEmail(),
        'phone'       => $user->getPhone(),
        'address'     => $user->getAddress(),
        'website'     => $user->getWebsite(),
        'first_entry' => tpl_date($user->getFirstEntry()),
        'last_entry'  => tpl_date($user->getLastEntry()),
        'last_visit'  => tpl_date($user->getLastVisit()),
        'expiration'  => tpl_date($user->getExpirationDate()),

        'options' => array(
            array(
                'name'  => 'opt_show_real_name',
                'value' =>  $user->getConfigShowRealName(),
                'title' => 'Montrer mon vrai nom'
            ),
            array(
                'name'  => 'opt_show_birthdate',
                'value' => $user->getConfigShowBirthdate(),
                'title' => 'Montrer ma date de naissance'
            ),
            array(
                'name'  => 'opt_show_age',
                'value' => $user->getConfigShowAge(),
                'title' => 'Montrer mon âge'
            ),
            array(
                'name'  => 'opt_show_email',
                'value' => $user->getConfigShowEmail(),
                'title' => 'Montrer mon e-mail'
            ),
            array(
                'name'  => 'opt_show_phone',
                'value' => $user->getConfigShowPhone(),
                'title' => 'Montrer mon téléphone'
            ),
            array(
                'name'  => 'opt_show_address',
                'value' => $user->getConfigShowAddress(),
                'title' => 'Montrer mon adresse'
            ),
            array(
                'name'  => 'opt_private_profile',
                'value' => $user->getConfigPrivateProfile(),
                'title' => 'Cacher mon profil aux non-membres'
            ),
            array(
                'name'  => 'opt_index_profile',
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
?>
