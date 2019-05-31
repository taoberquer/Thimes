
# Thimes | Flux-RSS
***

## Mise en situation 
La Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales et à d’autres structures hébergées. La M2L est une structure financée par le Conseil Régional de Lorraine dont l’administration est déléguée au Comité Régional Olympique et Sportif de Lorraine (CROSL).

Le projet est constitué autour d’une plate-forme Web qui récupère régulièrement des articles disponibles au format RSS.

## Technologie 

Cette Apllication Web a été construit avec le framework [Laravel](https://laravel.com/).

Laravel est un framework web open-source écrit en PHP2 respectant le principe modèle-vue-contrôleur et entièrement développé en programmation orientée objet. Laravel est distribué sous licence MIT, avec ses sources hébergées sur GitHub. 

Laravel utilise Eloquent comme ORM ainsi que Blade comme moteur de template. 

## Installation 

#### Prérequis
* Php
* [Composer](https://getcomposer.org/)
* [Vagrant](https://www.vagrantup.com/) 

L'installation de l'application web peut se faire de plusieurs façon differentes mais la plus portable serai d'utiliser la box Homestead via Vagrant.

Effectuer un git clone de notre repo sur votre machine.
    
    git clone https://github.com/taoberquer/Thimes.git
    
Ajouter la box Homestead à Vagrant.

    vagrant box add laravel/homestead

Rendez-vous ensuite dans le projet pour installer la box Homestead en utilisant Composer.

    composer require laravel/homestead --dev
    
    
Une fois Homestead installer dans le projet, utiliser la commande make pour générer les fichiers Vagrantfile ainsi que Homestead.yaml

Mac/Linux:

    php vendor/bin/homestead make
    
Windows: 

    vendor\\bin\\homestead make
    
Résolution des Hosts. Redirigez les hosts vers votre projet. 
Sous Mac/Linux ajouter la ligne qui suivra dans /etc/hosts, sous windows dans C:\Windows\System32\drivers\etc\hosts.

    192.168.10.10  homestead.test
    
Rendez vous dans votre naviguateur pour aller à l'url suivant.

    http://homestead.test
    
Dans votre projet copier le .env.

    cp .env.example .env
    
Générer également une clé.
    
    php artisan key:generate
    
Installation des dépendance pour l'application. 

    composer install
    
Pour la base de données ainsi que les seeders

    php artisan migrate:fresh --seed

## Auteurs

* **Tao Berquer** - [www.taoberquer.fr](www.taoberquer.fr)
* **Alexandre Kaprielian** - [www.alexandre-kaprielian.com](www.alexandre-kaprielian.com)
