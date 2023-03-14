<?php

class Database {
  private $bdd; // Définit une propriété privée pour stocker l'objet PDO qui représente la connexion à la base de données
  
  public function __construct() // Définit une méthode constructeur qui sera appelée lors de la création d'une nouvelle instance de la classe
  {
    $this->bdd = new PDO('mysql:host=localhost;dbname=mvc_final', "root", "root"); // Crée un objet PDO pour se connecter à la base de données "mvc_final" sur le serveur "localhost"
  }

  public function getBdd() { // Définit une méthode publique qui renvoie l'objet PDO stocké dans la propriété privée
    return $this->bdd;
  }
}
