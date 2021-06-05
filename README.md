# TP - API Firebase

Ce projet est une application permettant de gérer les données de stocks d'une API REST.
On peut suprimer / ajouter / modifier toutes les données et les affcher sur une page WEB.

## Pour commencer

Dans le dossier api/calls.php, modifiez la variable php ``$adresse_api``, qui contient l'URL de l'API que l'on va utiliser.

### Arcitecture des données

``Produits.json:
    "0":
    {
        "categorie": "Fruits",
        "description": "fruit exotique",
        "id": 0,
        "nom": "Banane",
        "prix": "0,46"
    },
    "1":
    {
        "categorie": "Fruits",
        "description": "Tomate coeur de boeuf",
        "id": "1",
        "nom": "Tomate",
        "prix": "0,23"
    }``