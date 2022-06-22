<?php
 class restaurante {

    private $id_restaurante;
    private $nombre;
    private $direccion;
  

    public function __construct($id_restaurante=null,$nombre=null,$direccion=null)
    {
    	$this->id_restaurante = $id_restaurante;
    	$this->nombre = $nombre;
    	$this->direccion = $direccion;
   	}
       public function getId_restaurante(){
		return $this->id_restaurante;
	}

	public function setId_restaurante($id_restaurante){
		$this->id_restaurante = $id_restaurante;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
}