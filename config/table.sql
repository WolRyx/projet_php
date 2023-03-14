CREATE DATABASE IF NOT EXISTS mvc_final; /* Cette ligne crée une base de données appelée "mvc_final" si elle n'existe pas déjà. */
use mvc_final; /* Indique que l'on va utiliser la base de données "mvc_final". */

/* On crée la table */
CREATE TABLE livre ( 
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
  livre_nom VARCHAR(255), 
  livre_auteur VARCHAR(255), 
  livre_date_sortie DATE
);
