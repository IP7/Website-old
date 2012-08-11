<?php

require_once dirname(__FILE__).'/../config.php';
Config::init();

# === GENERAL ================================================================ 

# helper
function admin_tpl_default() {
    static $init = false;
    static $d;

    if (!$init) {
        $d = array(
            'page' => array(
                'navlinks' => array(
                    array('title' => 'Modération',  'href' => Config::$root_uri.'admin/moderation'),
                    array('title' => 'Trésorerie',  'href' => Config::$root_uri.'admin/tresorerie'),
                    array('title' => 'Maintenance', 'href' => Config::$root_uri.'admin/maintenance'),

                    array('title' => 'Retour au site', 'href' => Config::$root_uri)
                )
            )
        );
        $init = true;
    }
    return $d;
}

# === HOME =====================================================================

function display_admin_home() {
    return Config::$tpl->render('admin_main.html', tpl_array(admin_tpl_default()));
}

# === MODERATION ===============================================================

function display_admin_moderation() {
    return Config::$tpl->render('admin_main.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'actions' => array(
                array('title' => 'Contenu signalé', 'href' => Config::$root_uri.'admin/reports'),
                array('title' => 'Contenu proposé', 'href' => Config::$root_uri.'admin/content/proposed')
                # add subpages here
            )
        )
    )));
}

# === FINANCES ================================================================

function display_admin_finances() {
    return Config::$tpl->render('admin_main.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'actions' => array(
                array('title' => 'Gérer les utilisateurs', 'href' => Config::$root_uri.'admin/membres'),
                array('title' => 'Gérer les transactions', 'href' => Config::$root_uri.'admin/transactions')
            )
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
                'href' => $uri.'/show',
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

            'members_form' => array( 'action' => Config::$root_uri.'admin/membres/show' ),

            'members' => $members
        )
    )));
}

# === MAINTENANCE =============================================================

function display_admin_maintenance() {
    $message = $message_type = null;

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
    return Config::$tpl->render('admin_main.html', tpl_array(admin_tpl_default(),array(
        'page' => array(
            'actions' => array(
                array('title' => 'Purger le cache des templates', 'href' => '?purge_cache'),
                array('title' => 'Optimiser les tables',          'href' => '?optimize_tables'),
                array('title' => 'Retour',                        'href' => '..')
            ),

            'message'      => $message,
            'message_type' => $message_type
        )
    )));
}

?>
