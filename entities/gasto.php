<?php
 class gasto {

    private $id_gasto;
    private $descripcion;
	private $id_restaurante;
  

    public function __construct($id_gasto=null,$descripcion=null,$id_restaurante=null)
    {
    	$this -> id_gasto = $id_gasto;
    	$this-> descripcion = $descripcion;
		$this-> id_restaurante = $id_restaurante;
    	
    }  
	public function getId_gasto(){
		return $this->id_gasto;
	}

	public function setId_gasto($id_gasto){
		$this->id_gasto = $id_gasto;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getId_restaurante(){
		return $this->id_restaurante;
	}

	public function setId_restaurante($id_restaurante){
		$this->id_restaurante = $id_restaurante;
	}
}