# Thimes

Thimes est une application web qui permet de recupèrer régulièrement des articles disponible au format RSS.

Chaque club, associé à un compte peut ajout des articles dans une liste qui lui appartient et qui sera nommée « press-book ». Cette liste est visible par tout le monde.

Tous les clubs sont associés à un sport, parmi une liste de sports pré-définie et fixée à l’avance. Certains flux peuvent être associés à un sport. Dans ce cas tous les articles de ce flux sont associés à ce sport.

Les utilisateurs peuvent parcourir les articles, accéder directement à l’article d’origine depuis la liste présentée, ajouter ou supprimer un article de son press-book et étiquetter un article avec un mot. Les articles sont automatiquement associés au sport du club.

Les utilisateurs peuvent consulter leur press-book et aussi lister les autres utilisateurs et visualiser leur press-book.
## Installation de l'application

Executer cette commande dans le dossier de l'application Thimes pour télécharger toute les dépendances.

    php composer install
### docker

Le docker-compose se compose de ce qui suis.

    version: '3'

    services:
      slim:
          image: php:7-alpine
          working_dir: /var/www
          command: php -S 0.0.0.0:8080 -t public
          environment:
              docker: "true"
          ports:
              - 8080:8080
          volumes:
              - .:/var/www
              - logs:/var/www/logs
      db:
        image: postgres:11-alpine
        restart: always
        environment:
          POSTGRES_PASSWORD:
        volumes:
          - db_data:/var/lib/postgresql/data

      adminer:
        image: adminer
        restart: always
        ports:
          - 8090:8080

          volumes:
          logs:
          db_data:

Pour exécuter l'application rendez-vous dans le dossier Thimes et lancer cette commande.

    docker-compose up
