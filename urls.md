Quelques idées pour la conception des URL :


TD/TP/Examens/etc
-----------------

`infop7.org/<cursus>/<matière>/<type de contenu>`

Exemples 


- `infop7.org/l1/if1/tp` 
 page des TP d’IF1 (L1)
- `infop7.org/l3/` 
 page de la L3
- `infop7.org/l2/EA4` 
 page d’EA4 (L2)
- `infop7.org/l3/bd6/examens` 
 pages des examens de BD6 (L3)

Pages statiques
---------------

`infop7.org/<nom>`

Exemples :
- `infop7.org/contact`
- `infop7.org/legal`

Pages d'erreurs 
---------------

`infop7.org/<code>`

Exemples :
- `infop7.org/404`
- `infop7.org/500`

Annuaire 
--------

`infop7.org/annuaire`

Petites annonces 
----------------

`infop7.org/annonces` (liste complète)

Si on fait plusieurs pages : `infop7.org/annonces/<numero>`

Exemple : `infop7.org/annonces/3` (page 3)

Page d'une annonce : `infop7.org/annonce/<id>`

Exemple : `infop7.org/annonce/8457`

Annonces par tags : `infop7.org/annonces/<tag>/`

Exemples :
- `infop7.org/annonces/stage/`
- `infop7.org/annonces/css/`

Résultats de recherche 
----------------------

`infop7.org/search/<params>`

Exemples :
- `infop7.org/search/tralala%20tutu%20toto`
- `infop7.org/search/42%20douglas%20adams`

Évènements 
----------

`infop7.org/events/<année>/ [ <mois>/ ]`

Exemples :
- `infop7.org/events/2012/` : tous les évènements de 2012
- `infop7.org/events/2013/01/` : tous les évènements de janvier 2013

Page d’un évènement : `infop7.org/event/<id>`

Exemple : `infop7.org/event/458`

Profil de membre 
----------------

`infop7.org/~<pseudo>`

Exemple : `infop7.org/~tsalmon`

Administration 
--------------

`admin.infop7.org/…` (sous-domaine dédié)

- Gérer les membres : `admin.infop7.org/membres`
- Gérer les comptes (argent) : `admin.infop7.org/comptes`


Contraintes
===========

- Les URL doivent fonctionner indépendamment de la casse, en dehors des
  paramètres GET.
  
  Exemples :

    * `infop7.org/L1` = `infop7.org/l1`
    * `infop7.org/l1/Io2/eXaMens` = `infop7.org/L1/iO2/Examens` = `infop7.org/L1/IO2/EXAMENS`

