<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

# === HOME =====================================================================

function display_admin_home() {
    $message = $message_type = null;

    $admin_uri = Config::$root_uri.'admin';

    # ---- Maintenance ---------------------------------------------------------

    if (isset($_GET['purge_cache'])) {
        if (!purge_cache()) {
            $message = 'Erreur lors de la purge. Consultez les logs.';
            $message_type = 'error';
        }
        else {
            $message = 'Purge effectuée avec succès.';
            $message_type = 'notice';
        }
    }
    else if (isset($_GET['optimize_tables'])) {
        if (!optimize_tables()) {
            $message = 'Erreur lors de l\'optimisation. Consultez les logs.';
            $message_type = 'error';
        }
        else {
            $message = 'Optimisation effectuée avec succès.';
            $message_type = 'notice';
        }
    }

    # ---- Rendering ----------------------------------------------------------

    return Config::$tpl->render('admin_main.html', tpl_array(
                                                            admin_tpl_default(),
                                                            array(
        'page' => array(
            'title'        => 'Accueil',

            'message'      => $message,
            'message_type' => $message_type,

            'sections'     => array(
                array(
                    'title'   => 'Modération',
                    'id'      => 'mod',
                    'actions' => array(
                        array('title' => 'Contenu signalé', 'href' => $admin_uri.'/reports'),
                        array('title' => 'Contenu proposé', 'href' => $admin_uri.'/content/proposed')
                    )
                ),
                array(
                    'title'   => 'Trésorerie',
                    'id'      => 'tres',
                    'actions' => array (
                        array('title' => 'Gérer les utilisateurs', 'href' => $admin_uri.'/membres'),
                        array('title' => 'Gérer les transactions', 'href' => $admin_uri.'/transactions')
                    )
                ),
                array(
                    'title'   => 'Maintenance',
                    'id'      => 'mnt',
                    'actions' => array(
                        array('title' => 'Purger le cache des templates', 'href' => $admin_uri.'?purge_cache'),
                        array('title' => 'Optimiser les tables',          'href' => $admin_uri.'?optimize_tables')
                    )
                )
            )
        )
    )));
}

# === FINANCES ================================================================

function display_admin_add_member() {

    return Config::$tpl->render('admin_add_member.html', tpl_array(admin_tpl_default(), array(
        'page' => array(
            'title' => 'Ajouter un membre',
            'breadcrumbs' => array(
                array( 'title' => 'Ajouter un membre', 'href' => Config::$root_uri.'admin/members/add' )
            ),
        )
    )));
}

function display_admin_members() {

    $q = UserQuery::create()
            ->limit(100)
            ->orderByUsername()
            ->find();

    $members = array();

    if ($q != NULL) {
        foreach ($q as $m) {

            $activated = $m->isActivated();
            $uri = Config::$root_uri.'admin/membre/'.$m->getUsername();

            $lastentry = $m->getLastEntry();

            if ($lastentry == NULL) {
                $lastentry = 'jamais';
            } else {
                $dt = new DateTime($lastentry);
                $lastentry = $dt->format('d/m/Y');
            }

            $type = '-';

            if ($m->isAdmin()) {
                $type = 'administrateur';
            }
            else if ($m->isModerator()) {
                $type = 'modérateur';
            }
            else if ($m->isMember()) {
                $type = 'membre';
            }

            $activate_href = $uri.'/'.($activated?'off':'on');
            $activate_title = 'Désactiver';

            if (!$activated) {
                $activate_title = ($m->getFirstEntry() != NULL) ? 'Réactiver' : 'Activer';
            }

            $options = array(
                array( 'href' => $activate_href, 'title' => $activate_title,),
                array( 'href' => $uri.'/renew',  'title' => 'Renouveler' ),
                array( 'href' => $uri.'/edit',   'title' => 'Modifier' )
            );

            $members []= array(
                'id' => $m->getId(),
                'href' => Config::$root_uri.'p/'.$m->getUsername(),
                'pseudo' => $m->getUsername(),
                'name' => $m->getName(),
                'type' => $type,
                'last_entry' => $lastentry,
                'options' => $options
            );
        }
    }

    return Config::$tpl->render('admin_members.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'title' => 'Membres',
            'members' => $members,
            'add_member_link' => Config::$root_uri.'admin/membres/add'
        )
    )));
}

?>
