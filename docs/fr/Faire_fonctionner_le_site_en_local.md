# Faire fonctionner le site en local

Ce guide indique comment dupliquer le site en local, sous Ubuntu ou OSX. Ça
doit probablement marcher sous les autres \*NIX moyennant quelques adaptations
concernant les commandes à utiliser.

## 1. Préparer l’environnement

La partie serveur du site est écrite complètement en PHP5, avec MySQL pour la
base de données. Le site tourne sous Apache. Il faut donc installer tout ça :

```sh
# pour Ubuntu
sudo apt-get install apache2 php5 mysql-server libapache2-mod-php5 php5-mysql

# pour OSX (quasiment tout est déjà installé)
brew install mysql
```

De façon optionnelle, vous pouvez utiliser phpMyAdmin :

```sh
sudo apt-get install phpmyadmin
```

Lors de ces installations, si la création de logins/mots de passe vous est
demandé, choisissez ce que vous voulez, ça n’a pas d’importance pour le
fonctionnement du site. Pour la suite, on considèrera que l’utilisateur root de
MySQL s’appelle `root` et a pour mot de passe `secretrootpassword`.

Les dépendances PHP (code tier) sont gérées avec Composer. Il faut donc
l’installer :
```sh
# pour Ubuntu
cd /usr/local/bin
curl -sS https://getcomposer.org/installer | sudo php
sudo chmod a+x composer.phar
sudo mv composer.phar composer

# pour OSX
brew install composer
```

Puis :

```sh
composer install
```

## 2. Récupérer le code-source

Si vous avez `git` installé (`sudo apt-get install git`), vous pouvez cloner le
dépôt Github en local, ce qui a l’avantage de vous permettre de le maintenir à
jour par la suite :

```sh
git clone https://github.com/IP7/Website.git IP7Website
```

Cela va créer un répertoire `IP7Website` qui contient l’ensemble du code du site
d’IP7.

Si vous n’avez pas git ou que vous ne voulez/pouvez pas l’utiliser, vous pouvez
récupérer le code-source sous forme d’archive zip :

```sh
wget https://github.com/IP7/Website/archive/master.zip && unzip master.zip && rm -f master.zip
```

Cela va créer un répertoire `Website-master`, que vous pouvez renommer en
quelque chose de plus compréhensible.

Il manque le code des dépendances. Pour l’ajouter, placez-vous dans le
répertoire du projet, et utilisez `composer install --dev`.

## 3. Configurer la base de données

Il faut maintenant configurer la base de données. Le mieux est de créer un
nouvel utilisateur pour la base de données du site. Le code suivant crée un
nouvel utilisateur, `infop7user` dont le mot de passe est `topsecret`, une
base de données `infop7db` sur laquelle l’utilisateur a tout les droits. La base
de données doit avoir ce nom, mais vous pouvez changer le nom et le mot de
passe. Il faut d’abord accéder à MySQL :

```sh
mysql -u root -psecretrootpassword
```

Entrez ensuite les commandes suivantes :

```mysql
CREATE USER infop7user IDENTIFIED BY 'topsecret';
CREATE DATABASE infop7db;
GRANT ALL ON infop7db.* TO infop7user;
```

Il faut maintenant créer les tables de la base de données. Placez-vous dans le
répertoire qui contient le code du site, accédez à MySQL (il n’y a rien à faire
si vous n’en êtes pas sortis suite aux commandes précédentes), et tapez les
commandes suivantes :

```mysql
USE infop7db;
\. ./models/build/sql/schema.sql
```

Vous pouvez maintenant presser `<C-D>` (Ctrl+D) pour sortir de MySQL. La base de
données est créée, elle est remplie avec des tables, mais elles sont toutes
vides. Vous pouvez les remplir avec ce que vous voulez. Si vous voulez avoir
quelque chose qui ressemble au site en ligne, vous pouvez demander à avoir un
export partiel de la base de données, contactez-nous à `contact@infop7.org`.
L’export ne contiendra pas la table des utilisateurs, puisqu’elle contient leurs
informations, dont un hash de leur mot de passe.

Il faut maintenant créer un fichier de configuration pour dire au site à quelle
base de données se connecter et avec quels identifiants.

Créez un fichier `./models/build/conf/ip7website-conf.php` contenant le code
suivant :

```php
<?php
$conf = array (
  'datasources' => 
  array (
    'infop7db' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;dbname=infop7db',
        'user' => 'infop7user',
        'password' => 'topsecret',
        'options' => 
        array (
          'MYSQL_ATTR_INIT_COMMAND' => 
          array (
            'value' => 'SET NAMES utf8 COLLATE utf8_unicode_ci',
          ),
        ),
      ),
    ),
    'default' => 'infop7db',
  ),
  'generator_version' => '1.6.7',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-ip7website-conf.php');
return $conf;
```

N’oubliez pas de modifier le mot de passe et/ou le nom d’utilisateur si vous
n’avez pas utilisé ceux de ce guide.

Générez les fichiers PHP correspondant :

```sh
cd models
../vendor/bin/propel-gen
```

## 4. Configurer l’accès au site

Il faut maintenant définir l’URL d’accès au site. Il existe deux méthodes, l’une
rapide mais qui peut poser quelques problèmes par la suite, et une un tout petit
peu plus longue (les deux prennent moins d’une minute) mais qui permet d’éviter
tous problèmes.

### 4.1 La méthode courte

Créez un lien symbolique depuis `/var/www/ip7` (vous pouvez changer `ip7` par ce
que vous voulez, mais vous devez adapter le reste du code de cette partie) vers
le répertoire du code du site (placez-vous dans le répertoire qui contient le
code du site avant) :

```sh
# pour Ubuntu
sudo ln -s $(pwd) /var/www/ip7

# pour OSX
sudo ln -s $(pwd) /Library/WebServer/Documents/
```

Ensuite, éditez le fichier `config.php`, et vers la ligne 66, changez :

```php
static $root_uri = '/';
```

en :

```php
static $root_uri = '/ip7/';
```

Ensuite, le site sera accessible à l’adresse `http://localhost/ip7/`. Le
problème de cette méthode, en plus du fait qu’elle oblige à modifier le fichier
de configuration du site, est qu’il est possible que certains liens relatifs sur
le site partent du principe que l’adresse normale est `www.infop7.org` et
commencent donc par `/` au lieu de `/ip7/`. Ça ne devrait normalement pas
arriver, mais c’est possible.

### 4.2 La méthode longue (mais mieux)

Créez un sous-domaine local pour le site, par exemple `ip7.localhost`. Ouvrez,
en root et avec votre éditeur préféré le fichier `/etc/apache2/httpd.conf` :

```sh
sudo vim /etc/apache2/httpd.conf
```

Ajoutez-y les lignes suivantes, en remplaçant `<chemin>` par le chemin *absolu*
du répertoire contenant le code du site :

```apache
<VirtualHost *:80>
ServerName ip7.localhost
DocumentRoot "<chemin>"
DirectoryIndex index.php index.html index.html index.htm index.shtml
</VirtualHost>
```

Éditez ensuite, toujours en root, le fichier `/etc/hosts` et remplacez la ligne
suivante :

```
127.0.0.1 localhost
```

par celle-ci :

```
127.0.0.1 localhost ip7.localhost
```

Si la première ligne n’est pas dans le fichier, ajoutez la deuxième. Ensuite,
relancez Apache :

```sh
sudo service apache2 restart
```

Le site est maintenant accessible à l’adresse `http://ip7.localhost/`

## 5. Générez les scripts JS & styles CSS

Afin d’améliorer les temps de chargement, tous les scripts JS et styles CSS du
site sont minifiés et concaténés, ce qui a pour effet de diminuer leur taille et
de diminuer le nombre de requêtes HTTP à chaque chargement de page.

Le script utilisé pour générer les scripts/styles fonctionne avec Node.js :

```sh
# Ubuntu
sudo apt-get-install nodejs npm
sudo npm -g install node-minify

# OSX
brew install node
npm -g install node-minify
```

Ensuite, placez-vous dans le répertoire contenant le code du site, et exécutez
la commande suivante :

```sh
node ./scripts/minify.js
```

## 6. Fin

Si tout s’est déroulé correctement, vous devriez avoir un site fonctionnel en
local, accessible soit à l’adresse `http://localhost/ip7/` (méthode 4.1), soit à
l’adresse `http://ip7.localhost/`.
