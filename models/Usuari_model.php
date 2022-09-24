<?php

class Usuari_model
{
  private $conn;
  private $table = 'usuarios';

  //propietats
  public $id;
  public $nombre;
  public $email;
  public $password;
  public $fecha_creacion;

  // constructor
  public function __construct($db)
  {
    $this->conn = $db;
  }




  // metode per LECTURA DE TOTS ELS USUARIS
  public function leer()
  {
    // creo la consulta
    // u correspon a la taula usuaris
    // r correspon a la taula rol
    $query = "SELECT  u.id AS usuario_id,
                      u.nombre AS usuario_nombre,
                      u.email AS usuario_email,
                      u.fecha_creacion AS usuario_fecha_creacion,
                      r.nombre AS rol
              FROM $this->table u INNER JOIN roles r ON r.id = u.rol_id"; //creo join
    // on la clau primaria de la taula rols sera el valor de rol_id de
    // la taula usuaris

    // preparo la sentencia
    $stmt = $this->conn->prepare($query);

    // executo la query
    $stmt->execute();

    // preparo el resultat de l'execute per retornar tots els articles en forma d'objecte
    $usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);

    // retorno l'objecte creat
    return $usuarios;
  }




  // metode per LECTURA D'UN USUARI INDIVIDUAL
  public function llegir_individual($id)
  {
    // creo la consulta
    $query = "SELECT  u.id AS usuario_id,
                      u.nombre AS usuario_nombre,
                      u.email AS usuario_email,
                      u.fecha_creacion AS usuario_fecha_creacion,
                      r.nombre AS rol
              FROM $this->table u INNER JOIN roles r ON r.id = u.rol_id 
              WHERE u.id = ? LIMIT 0,1";

    // preparo la sentencia
    $stmt = $this->conn->prepare($query);

    // vincular paràmetres
    $stmt->bindParam(1, $id);

    // executo la query
    $stmt->execute();

    // preparo el resultat de l'execute per retornar l'article en forma d'objecte
    $usuari = $stmt->fetch(PDO::FETCH_OBJ);

    // retorno l'objecte creat
    return $usuari;
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



  // metode per EDITAR UN USUARI 
  public function actualizar($idUsuari, $rol)
  {
    // creo la consulta
    $query = "UPDATE  $this->table SET rol_id = :rol_id  WHERE id = :id";

    // preparo la sentencia
    $stmt = $this->conn->prepare($query);

    // vincular paràmetres per nom
    // al parametre li vinculem el parametre rebut i li diem que l'id de l'usuari
    // i el la id del rol sera de tipus int
    $stmt->bindParam(":rol_id", $rol, PDO::PARAM_INT);
    $stmt->bindParam(":id", $idUsuari, PDO::PARAM_INT);

    // executo la query
    if ($stmt->execute()) {
      return true;
    }
  }



  // metode per ESBORRAR UN  USUARI
  public function esborrar($idUsuari)
  {
    // creo la consulta
    $query = "DELETE FROM $this->table WHERE id = :id";

    // preparo la sentencia
    $stmt = $this->conn->prepare($query);

    // vincular paràmetres per nom
    // al parametre li vinculem el parametre rebut i li diem que la 
    // dada sera de tipus int
    $stmt->bindParam(":id", $idUsuari, PDO::PARAM_INT);

    // executo la query
    if ($stmt->execute()) {
      return true;
    }
  }
}
