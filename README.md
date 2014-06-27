BLOG APPLICATION 
=============================

Author
------------
* Nicolas Castelli (castelli.nc@gmail.com)

Configuration et tuto
------------

* CHMOD 777 sur /uploads et /DB

* /config.php : 
pensez � configurer config.php avant toute utilisation, contient toute les constantes de l'application pour son fonctionnement

* /controllers :  
les pages sont � ins�rer dans /controllers
exemple : /controllers/mapage.php, puis l'enregistrer dans le fichier /config.php pour qu'elle soit list� dans le loader du framework.

* /resources : 
toutes les resources (fichiers javascripts, css, images design etc) sont � placer dans /resources
On peut ensuite les charger depuis les controllers avec la variable "$MVC" (d�j� d�clar�) qui est une instance de l'application BLOG
Exemple :

#CSS
	$MVC->loadCSS('css/main.css'); //chargera le fichier /apps/blog/resources/css/main.css au bon endroit dans le code HTML, � noter que l'argument attendu par la m�thode loadCSS est le chemin du fichier depuis le r�pertoire "resources" de l'application

#JS
	$MVC->loadJS('js/main.js');

#images
toutes les images du r�pertoire /uploads sont accessibles depuis /images/full/monimage.jpg (/apps/blog/uploads/monimage.jpg)

#miniatures
pour (/apps/blog/uploads/monimage.jpg)

SMALL : /images/small/monimage.jpg
MEDIUM : /images/medium/monimage.jpg
LARGE : /images/large/monimage.jpg

Un moyen tr�s simple d'ins�rer les images :
	<img src="<?php echo new URL('images/full/monimage.jpg') ?>" />
	// la classe URL contruira automatiquement l'url pour vous


* Ins�rer des fichiers externes :
Pour ins�rer des fichiers voici un exemple :

- depuis le r�pertoire /public � la racine du framework
	<a href="<?php echo NEMESIS_URL ?>public/CV.pdf">Mon CV</a> (pas de "/" avant public)
	// correspond au fichier /public/CV.pdf, ne pas oublier la constante NEMESIS_URL qui indique le d�but de l'URL


* Fonctions utiles
/core/functions.php : boite � outils du framework pour parser vos chaines de caract�res, et quelques racourcis

* D�tecter si la requ�te est ajax
	if(URL::isHttpRequest()) {
		// code � executre
		die;
	}

* la variable $HASH :
array contenant l'URL d�coup�
exemple pour l'url : http://www.monsite.com/contact/object/reclamation
=> $HASH aura la valeur array('object, 'reclamation') dans le controller contact.php


Libraries Dependencies
* RedBeanPHP 3

Plugins Dependencies
------------
* HTMLhelpers Plugin
* GD Plugin

Resources Dependencies
------------
* jQuery 1.9
* jQuery html5lightbox
* jQuery html5 filedrop
* jQuery infinite scroll helper
* jQuery lazyload
* jQuery sortable
* jQuery timers
* jQuery tagInput
* jQuery wyziwym
* jQuery autogrow
* jQuery showdown (markdown to html)
* jQuery toMarkown (html to markdown)
* jQuery customs plugins
* html5shiv
* Disqus comments API
* CSS Normalize/Responsive
* CSS customs forms (transitions and CSS3 properties)
* alegreya-regular-webfont generated from fontSquirrel


Changelog
---------

### 0.1
* Initial Release
