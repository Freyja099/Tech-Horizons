# Tech Horizons

**Tech Horizons** est une application web développée en PHP/MySQL pour la gestion d'un magazine en ligne. Elle permet aux utilisateurs de consulter les thèmes auxquels ils sont abonnés, de gérer leur historique de navigation et de proposer des articles à publier.

but:
Créer une application Web, sous PHP/MySQL, pour gérer un magazine en ligne (Tech Horizons). Il s’agit de permettre à un ensemble d’utilisateurs de consulter les thèmes auxquels ils sont abonnés, gérer leur historique de navigation et proposer des articles à publier. Il s’agit de faire une analyse et une conception convenables, créer et gérer une base de données puis proposer une interface Web pour se servir des fonctionnalités offertes par l'application.

L’application Web permettra de gérer un magazine en ligne et offrira aux utilisateurs une interface intuitive et sécurisée, donnant la possibilité de consulter les articles liés aux thèmes auxquels ils sont abonnés ( Intelligence artificielle, Internet des objets, Cybersécurité, Réalité virtuelle et augmentée ... ). L'application permet aussi de recommander des articles à l'utilisateur connecté en se basant sur son historique et ses centres d’intérêt. Lors de la consultation, l’utilisateur voit défiler les images du numéro sélectionné, un clic sur une image l’envoi vers l’article correspondant.

Le site est consulté par quatre types d’utilisateurs :

-  **Invité** : Il ne peut que consulter les informations sur les thèmes, déposer une demande d’inscription au magazine et consulter les numéros publics. 
-  **Abonné** : Il dispose d’un espace personnalisé où il peut visualiser tous les numéros du magazine, gérer ses abonnements aux thèmes, gérer l’historique de navigation en utilisant des filtres pour retrouver des articles précédemment consultés et proposer des articles à publier, avec un système de suivi pour consulter son état (Refus, En cours, Retenu, Publié). Il peut aussi attribuer une note de 1 à 5 aux articles et ajouter des messages aux conversations (Chat) liées aux articles. 
- **Responsable** d’un thème : Il gère les abonnements liés à son thème et ses articles, consulte les articles postés par les abonnés, peut éventuellement les proposer pour la publication dans les prochains numéros, et voir les statistiques sur les articles et les abonnés de son thème. Il joue aussi le rôle du modérateur des conversations liées aux articles de son thème. 
- **Editeur de Tech Horizons**  : peut gérer les numéros( publier un numéro, rendre public … ) et ajouter/modifier/bloquer ou supprimer des abonnés ou des responsables d’un thème. Après publication, il peut activer/désactiver un numéro ou un article. Aussi, il peut voir les statistiques sur les abonnés, les responsables de thèmes, les numéros, les thèmes et les articles.

---

## 🛠️ Fonctionnalités

- **Abonnement aux thèmes** : Les utilisateurs peuvent s'abonner à différents thèmes pour personnaliser leur expérience de lecture.
    
- **Historique de navigation** : Suivi de l'historique de lecture pour un accès facile aux articles précédemment consultés.
    
- **Soumission d'articles** : Les utilisateurs ont la possibilité de proposer de nouveaux articles pour publication.

---

## 🔧 Prérequis

- **PHP** : Version 7.4 ou supérieure.
    
- **MySQL** : Version 5.7 ou supérieure.
    
- **Composer** : Gestionnaire de dépendances PHP.
    
- **Node.js et npm** : Pour la gestion des dépendances front-end.

---

## 🚀 Installation

1. **Cloner le dépôt** :
    
    ```
    git clone https://github.com/imadboulyakine9/techhorz2.git
    cd techhorz2
    ```
    
2. **Installer les dépendances PHP** :
    
    ```
    composer install
    ```
    
3. **Installer les dépendances JavaScript** :
    
    ```
    npm install
    ```
    
4. **Configurer l'environnement** :
    
    - Dupliquer le fichier `.env.example` et le renommer en `.env`.
        
    - Mettre à jour les informations de connexion à la base de données et autres configurations nécessaires dans le fichier `.env`.
        
5. **Générer la clé de l'application** :
    
    ```
    php artisan key:generate
    ```
    
6. **Exécuter les migrations et les seeders** :
    
    ```
    php artisan migrate --seed
    ```
    
7. **Compiler les assets front-end** :
    
    ```
    npm run dev
    ```
    
8. **Lancer le serveur de développement** :
    
    ```
    php artisan serve
    ```
    
    L'application sera accessible à l'adresse `http://localhost:8000`.


## 🖼️ How It Works

1. **Menu Navigation**: Choose a difficulty level or read the backstory.
2. **Gameplay**:
    - Navigate using arrow keys.
    - Reach the exit (house) to win.
3. **Sound & Music**:
    - Dynamic sound effects for actions.
    - Victory sound on winning.

--- 
## 📂 Project Structure

```plaintext
techhorz2/
├── app/                # Contient les fichiers du cœur de l'application Laravel
│   ├── Models/         # Modèles Eloquent ORM
│   ├── Http/           # Contrôleurs et middleware
├── bootstrap/         # Initialisation de Laravel
├── config/            # Fichiers de configuration
├── database/          # Migrations et seeders
├── public/            # Fichiers accessibles publiquement (CSS, JS, images)
├── resources/         # Vues Blade, fichiers Sass, et JS
│   ├── views/         # Templates Blade
│   ├── css/           # Feuilles de style
│   ├── js/            # Scripts JavaScript
├── routes/            # Fichiers de définition des routes
│   ├── web.php        # Routes web principales
├── storage/           # Fichiers générés (logs, cache...)
├── tests/             # Tests unitaires et fonctionnels
├── .env.example       # Exemple de fichier de configuration d'environnement
├── artisan            # Interface de commande Laravel
├── composer.json      # Dépendances PHP
├── package.json       # Dépendances Node.js
├── README.md          # Documentation du projet

```


---
## 🏆 Credits

- **Team Members**:
    - Aya Zoujari Idrissi
    - Imad Boulyakine
    - Et-Taalabi Sefiane
- **Professors**: 
	- M. M'hamed Ait Kbir
	- M. Yasyn El Yusufi
