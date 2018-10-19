# blog
Blog pour un écrivain (qui n'aime pas WordPress)

## Plan

### 1) Cours OC : [Concevez votre site web avec PHP et MySQL](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql)
- [x] Installation de WAMP
- [x] Configurer WAMP pour voir les erreurs php
- [x] Variables, boucles ...
- [x] Arrays, fonctions
- [x] Inclure des portions de page
- [x] Transmettre des données avec l'URL
- [x] Transmettre des données avec les formulaires
- [x] TP : page protégée par mot de passe
- [x] Variables superglobales
- [x] Session & Cookies
- [x] Lire et écrire dans un fichier
- [x] Bases de données
- [x] phpMyAdmin
- [x] Lire des données
- [x] Écrire des données
- [x] TP : un mini-chat
- [x] Les fonctions SQL
- [x] Les dates en SQL
- [x] TP : un blog avec des commentaires
- [x] Les jointures entre tables
- 


### 2) Cours OC : [Programmez en orienté objet en PHP](https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php)
- [x] Introduction à la POO
- [x] Utiliser la classe
- [ ] L'opérateur de résolution de portée
- [x] Manipulation de données stockées

### 3) Cours OC : [Adoptez une architecture MVC en PHP](https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php)

### 4) Plan du site
* Interface d'administration protégée par mot de passe
* Backend : 
    * Rédaction des billets interface WYSIWYG basée sur TinyMCE
    * CRUD
    * Modération commentaires
* Base de donnée MySQL.
* Interface frontend : 
    * Lecture des billets
    * Signaler les commentaires
* Code sera construit sur une architecture MVC
* Autant que possible en orienté objet (au minimum, le modèle doit être construit sous forme d'objet)
* Github : progression régulière par petites étapes

* index.php : appel l'affichage du site
* indexView.php : affiche les billets du blog
* model.php : clas PostManage se connecte a la base de donnée
* Post.php : class Post
* Comment.php : class Comment