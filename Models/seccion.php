<?php namespace Models;


class Seccion{
   // prop
   public $id;
   public $nombre;
   public $conect;

  public function __construct()
  {
    $this->conect= new Conexion();
  }

   // methods
   public function set($atributo, $contenido){
    $this->atributo = $contenido;
  }
  public function get($atributo, $contenido){
  return $this->atributo;
  }
  public function add(){
      $sql = "INSERT INTO `secciones`(`id`, `nombre`) VALUES (null,{$this->nombre})";
      $this->conect->consultaSimple($sql);
  }
  public function delete(){
    $sql = "DELETE FROM `secciones` WHERE ID={$this->id}";
    $this->conect->consultaSimple($sql);
}
public function edit()
{
    $sql = "UPDATE `secciones` SET `nombre`={$this->nombre} WHERE ID={$this->id}";
    $this->conect->consultaSimple($sql);
}
  public function listar()
  {
      $sql ="SELECT * FROM `secciones`";
      $datos = $this->conect->retornoDato($sql);
      return $datos;
  }
  public function view(){
    $sql ="SELECT * FROM `secciones` WHERE ID={$this->id}";
        $datos = $this->conect->retornoDato($sql);
        $row  = mysqli_fetch_assoc($datos);
        return $row;

 }












}







