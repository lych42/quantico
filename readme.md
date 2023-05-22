Le Quai Antique 

Evaluation en Cours de Formation Juin 2023




Environnement de développement
Pour installer et exécuter l'application du Quai Antique localement, vous devez disposer des prérequis suivants :

    Symfony 6.2.10
    PHP 8.2.0
    Composer
    WampServer(Apache&SQL)
    Github
    Nodejs et npm

Vous pouvez vérifier si ces prérequis sont installés sur votre machine en exécutant la commande suivante via la CLI Symfony :

    symfony check:requirements
    composer require

Installation
Voici les étapes à suivre pour lancer l'environnement de développement :

Clonez le dépôt Github de l'application

Installez les dépendances en exécutant la commande suivante dans le répertoire racine du projet

    composer install 
    npm install 
    npm run build

Lancer le serveur web 

Enfin, lancez l'application Symfony avec la commande suivante :

    symfony serve-d

Configuration de la base de données
Pour configurer la base de données de l'application, utilisez la commande suivante :

    symfony console doctrine:database:create

Création du back-office
Pour créer le back-office de l'application, utilisez le bundle EasyAdmin en exécutant la commande suivante :

    composer require easycorp/easyadmin-bundle

Ensuite, pour générer des CRUD pour vos entités Doctrine, utilisez la commande suivante :

    symfony console make:admin:crud
    
Ces étapes vous permettront d'installer et de configurer l'application localement sur votre machine.