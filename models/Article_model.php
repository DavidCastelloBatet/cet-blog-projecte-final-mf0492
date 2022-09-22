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

  // lectura dels articles
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
}
