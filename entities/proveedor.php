<?php
 class proveedor {

    private $id_proveedor;
    private $nombre;
	private $Empresa;

    public function __construct($id_proveedor=null,$nombre=null, $Empresa=null)
    {
    	$this -> id_proveedor = $id_proveedor;
    	$this-> nombre = $nombre;
		$this-> Empresa = $Empresa;
    	
    }
	public function getId_proveedor(){
		return $this->id_proveedor;
	}

	public function setId_proveedor($id_proveedor){
		$this->id_proveedor = $id_proveedor;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getEmpresa(){
		return $this->Empresa;
	}

	public function setEmpresa($Empresa){
		$this->Empresa = $Empresa;
	}
	}  