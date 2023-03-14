<?php

// Démarrage de la session
session_start();

// Inclusion des fichiers nécessaires
require 'config/Database.php';
require "controllers/BookController.php";

// Création d'une instance du contrôleur de livres
$bookController = new BookController();

// Récupération de l'URI de la requête
$request = $_SERVER["REQUEST_URI"];

// Switch case pour gérer les différentes actions selon l'URI
switch ($request) {
  // Si l'URI est "/", on affiche la page d'accueil
  case "/":
    $bookController->read(); // On récupère les livres
    require __DIR__ . "/views/home.phtml"; // On affiche la vue d'accueil
    break;

  // Si l'URI est "/addBook", on ajoute un livre
  case '/addBook':
    $bookController->create(); // On crée un livre
    require __DIR__ . "/views/livre-ajoute.phtml"; // On affiche la vue de confirmation
    break;

  // Si l'URI est "/updateBook", on modifie un livre
  case '/updateBook':
    $bookController->update(); // On met à jour un livre
    require __DIR__ . "/views/livre-modifie.phtml"; // On affiche la vue de confirmation
    break;

  // Si l'URI est "/deleteBook", on supprime un livre
  case '/deleteBook':
    $bookController->delete(); // On supprime un livre
    require __DIR__ . "/views/livre-supprime.phtml"; // On affiche la vue de confirmation
    break;

  // Si l'URI ne correspond à aucune action, on retourne une erreur 404
  default:
    http_response_code(404);
    require __DIR__ . "/views/404.phtml"; // On affiche la vue d'erreur
    break;
}

?>