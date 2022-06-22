<?php
 class usuario {

    private $id_usuario;
    private $nombre;
    private $usuario;
    private $contrasena;
    private $id_restaurante;
    private $rol;



    public function __construct($id_usuario=null,$nombre=null,$usuario=null,$contrasena=null,$id_restaurante=null,$rol=null)
    {
    	$this -> id_usuario = $id_usuario;;
    	$this -> nombre = $nombre;
    	$this -> usuario = $usuario;
    	$this -> contrasena = $contrasena;
    	$this -> id_restaurante = $id_restaurante;
    	$this -> rol = $rol;
    }
	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getContrasena(){
		return $this->contrasena;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}

	public function getId_restaurante(){
		return $this->id_restaurante;
	}

	public function setId_restaurante($id_restaurante){
		$this->id_restaurante = $id_restaurante;
	}

	public function getRol(){
		return $this->rol;
	}

	public function setRol($rol){
		$this->rol = $rol;
	}
    
}
