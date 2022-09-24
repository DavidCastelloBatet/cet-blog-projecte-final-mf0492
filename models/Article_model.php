<?php

class Article_model
{
  private $conn;
  private $table = 'articulos';

  //propietats
  public $id;
  public $titulo;
  public $imagen;
  public $texto;
  public $fecha_creacion;

  // constructor
  public function __construct($db)
  {
    $this->conn = $db;
  }




  // metode per LECTURA DE TOTS ELS ARTICLES
  public function leer()
  {
    // creo la consulta
    $query = "SELECT id, titulo, imagen, texto, fecha_creacion FROM $this->table";

    // preparo la sentencia
    $stmt = $this->conn->prepare($query);

    // executo la query
    $stmt->execute();

    // preparo el resultat de l'execute per retornar tots els articles en forma d'objecte
    $articulos = $stmt->fetchAll(PDO::FETCH_OBJ);

    // retorno l'objecte creat
    return $articulos;
  }




  // metode per LECTURA D'UN ARTICLE INDIVIDUAL
  public function llegir_individual($id)
  {
    // creo la consulta
    $query = "SELECT id, titulo, imagen, texto, fecha_creacion FROM $this->table WHERE id = ? LIMIT 0,1";

    // preparo la sentencia
    $stmt = $this->conn->prepare($query);

    // vincular paràmetres
    $stmt->bindParam(1, $id);

    // executo la query
    $stmt->execute();

    // preparo el resultat de l'execute per retornar l'article en forma d'objecte
    $article = $stmt->fetch(PDO::FETCH_OBJ);

    // retorno l'objecte creat
    return $article;
  }




  // metode per CREAR UN NOU ARTICLE
  public function crear($titulo, $newImageName, $texto)
  {
    // creo la consulta
    $query = "INSERT INTO  $this->table (titulo, imagen, texto) VALUES (:titulo, :imagen, :texto)";
    // $query = 'INSERT INTO ' . $this->table . ' (titulo, imagen, texto) VALUES(:titulo, :imagen, :texto)';

    // preparo la sentencia
    $stmt = $this->conn->prepare($query);

    // vincular paràmetres per nom
    // al parametre li vinculem el parametre rebut i li diem que la 
    // dada sera de tipus string
    $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
    $stmt->bindParam(":imagen", $newImageName, PDO::PARAM_STR);
    $stmt->bindParam(":texto", $texto, PDO::PARAM_STR);

    // executo la query
    if ($stmt->execute()) {
      return true;
    }
  }
}
