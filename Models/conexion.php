<?php namespace Models ;

use mysqli;

class Conexion{
    private $conect;
    private $BDdatos=array(

        'host'=>'localhost',
        'user'=>'root',
        'pass'=>'',
        'db'=>'practica_poo'
    );
     

   public function __construct(){
       $this->conect = new \mysqli(

        $this->BDdatos['host'],
        $this->BDdatos['user'],
        $this->BDdatos['pass'],
        $this->BDdatos['db']

       );
       
   }

    public function consultaSimple($sql){
           $this->conect->query($sql);
   
    }
    public function retornoDato($sql){
       $datos= $this->conect->query($sql);
              return $datos;
    }







}










?>