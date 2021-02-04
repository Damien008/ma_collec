# ma_collec
application web de gestion d'une collection de films

User Story :

- Créer un compte utilisateur
- Se connecter
- Ajouter des films à ma collection
- Consulter ma liste de film
- Modifier/Supprimer un film
- Rechercher un film par une partie de son titre
- Rechercher un film selon différents critères

Pour installer le projet :

- composer install
- yarn install
- yarn encore dev

Pour charger la base de données :

- symfony console d:d:c (création de la base de données)
- symfony console d:m:m (importation des migrations)
- symfony console d:f:l (importation des fixtures)

Travail effectué :

- Création de l'entité User
- Crétion de la fonction de Login et Logout
- Création du formulaire de connexion et d'enregistrement d'un nouvel utilisateur
- Création d'une fixtures pour un utilisateur

- Création de l'entité Movie
- Création du CRUD de Movie
- Création de fixtures de films
- Modification du formulaire d'ajout de film, pour avoir des listes déroulante pour "genre" et "support"
- Création des fomulaires de recherches
- Création de requêtes personnalisées pour la recherche de film

- CSS et mise en forme


