<?php

// Inclure le modèle Book
require "models/Book.php";

// Définir une interface qui spécifie les méthodes qui doivent être implémentées par toute classe qui l'implémente.
interface CrudInterface
{
    public function create(); // Méthode pour créer un nouvel enregistrement
    public function read(); // Méthode pour lire un enregistrement
    public function update(); // Méthode pour mettre à jour un enregistrement
    public function delete(); // Méthode pour supprimer un enregistrement
}

// Définir une classe qui étend le modèle Book et implémente CrudInterface
class BookController extends Book implements CrudInterface
{
    private $book; // Propriété privée qui contiendra une instance du modèle Book

    public function __construct() {
        parent::__construct(); // Appeler le constructeur de la classe parente
        $this->book = new Book(); // Instancier un nouvel objet Book et l'assigner à la propriété $book
    }

    // Méthode pour créer un nouvel enregistrement
    public function create()
    {
        // Récupérer les valeurs des champs du formulaire et les assigner à des variables
        $nom = $_POST['nom'];
        $auteur = $_POST['auteur'];
        $date = $_POST['date'];

        // Appeler la méthode newBook du modèle Book et passer les valeurs du formulaire
        $this->book->newBook($nom, $auteur, $date);
    }

    // Méthode pour lire un enregistrement
    public function read()
    {
        // Appeler la méthode getBook du modèle Book et assigner la valeur retournée à une variable
        $books = $this->book->getBook();

        // Retourner le tableau de livres
        return $books;
    }

    // Méthode pour mettre à jour un enregistrement
    public function update()
    {
        // Récupérer les valeurs des champs du formulaire et les assigner à des variables
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $auteur = $_POST['auteur'];
        $date = $_POST['date'];

        // Appeler la méthode updateBook du modèle Book et passer les valeurs du formulaire
        $this->book->updateBook($id, $nom, $auteur, $date);
    }

    // Méthode pour supprimer un enregistrement
    public function delete()
    {
        // Récupérer la valeur de l'input id et l'assigner à une variable
        $id = $_POST['id'];

        // Appeler la méthode deleteBook du modèle Book et passer l'id
        $this->book->deleteBook($id);
    }
}

?>