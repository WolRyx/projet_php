<?php


class Book {
  private $database;
  private $bdd;

  // Le constructeur initialise une connexion à la base de données en utilisant l'objet Database.
  public function __construct()
  {
    $this->database = new Database();
    $this->bdd = $this->database->getBdd();
  }

  // La fonction getBook récupère tous les livres de la table "livre" de la base de données.
  public function getBook() {
    $query = $this->bdd->query("SELECT * FROM livre");
    $books = $query->fetchAll(PDO::FETCH_ASSOC);
    return $books;
  }

  // La fonction newBook insère un nouveau livre dans la table "livre" de la base de données.
  public function newBook($nom, $auteur, $date) {
    $query = $this->bdd->prepare("INSERT INTO livre(livre_nom, livre_auteur, livre_date_sortie) values (?,?,?)");

    try {
      $books = $query->execute([$nom, $auteur, $date]);
    }
    // Si une erreur se produit lors de l'exécution de la requête, elle est imprimée avec print_r().
    catch (Exception $err) {
      print_r($err);
    }
    return $books;
  }

  // La fonction deleteBook supprime un livre de la table "livre" de la base de données en fonction de son id.
  public function deleteBook($id) {
    $query = $this->bdd->prepare("DELETE FROM livre WHERE id=?");

    try {
      $books = $query->execute([$id]);
    }
    // Si une erreur se produit lors de l'exécution de la requête, elle est imprimée avec print_r().
    catch (Exception $err) {
      print_r($err);
    }
  }

  // La fonction updateBook met à jour les informations d'un livre de la table "livre" de la base de données en fonction de son id.
  public function updateBook($id, $nom, $auteur, $date) {
    $query = $this->bdd->prepare("UPDATE livre SET livre_nom=?, livre_auteur=?, livre_date_sortie=? WHERE id=?");

    try {
      $books = $query->execute([$nom, $auteur, $date, $id]);
    }
    // Si une erreur se produit lors de l'exécution de la requête, elle est imprimée avec print_r().
    catch (Exception $err) {
      print_r($err);
    }
  }
}

?>
