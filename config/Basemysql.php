<?php

class Basemysql
{

  // Setejo de forma privada parametres conexio a bbdd
  private $host = 'localhost';
  private $db_name = 'cet_blog_projecte_final_mf0492';
  private $username = 'root';
  private $password = 'root';
  private $conn;

  // Conexió a la base de dades
  public function connect()
  {
    $this->conn = null;

    try {
      // creo objecte conn (conexio). li paso com a paremetres, tipus bbdd, nom bbdd, usuari i password. Preparo catch possibles errors
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Error de la coneció: $e->getMessage()";
    }
    return $this->conn;
  }
}
