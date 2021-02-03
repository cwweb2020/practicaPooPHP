<?php namespace Models;

use mysqli;

class Estudiante{

// att
  private $id;
  private $nombre;
  private $edad;
  private $promedio;
  private $imagen;
  private $id_seccion;
  private $fecha;
  private $conect;
 

// methods
  public function __construct()
  {
      $this->conect= new Conexion();
  }

  public function set($atributo, $contenido){
        $this->$atributo = $contenido;
  }
  public function get($atributo, $contenido){
      return $this->$atributo;
}

  public function listar()
  {
      $sql =" SELECT `t1`.*, `t2`.`nombre` AS `nombre_seccion`
      FROM `estudiantes` AS `t1` 
          LEFT JOIN `secciones` AS `t2` ON `t1`.`id_seccion` = `t2`.`id`";
      $datos = $this->conect->retornoDato($sql);
  }
  public function add()
  {
     $sql = "INSERT INTO `estudiantes`(`id`, `nombre`, `edad`, `promedio`, `imagen`, `id_seccion`) VALUES (null,'{$this->nombre}','{$this->edad}','{$this->promedio}','{$this->imagen}','{$this->id_seccion}',NOW() )";
     $this->conect->consultaSimple($sql);
  }
  public function delete()
  {
      $sql= "DELETE FROM `estudiantes` WHERE ID= '{$this->id}'";
      $this->conect->consultaSimple($sql);
  }
  public function edit()
  {
      $sql = "UPDATE `estudiantes` SET `nombre`='{$this->nombre}',`edad`='{$this->edad}',`promedio`='{$this->promedio}',`imagen`='{$this->imagen}',`id_seccion`='{$this->id_seccion}' WHERE id='{$this->id}'";
      $this->conect->consultaSimple($sql);
  }

  public function view(){
     $sql = "SELECT `t1`.*, `t2`.`nombre` AS `nombre_seccion`
     FROM `estudiantes` AS `t1` 
         INNER JOIN `secciones` AS `t2` ON `t1`.`id_seccion` = `t2`.`id` WHERE t1.id='{$this->id}'";
         $datos = $this->conect->retornoDato($sql);
         $row  = mysqli_fetch_assoc($datos);
         return $row;

  }


}



?>