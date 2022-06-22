<?php
 class insumoProducto {

    private $isinsumoproducto;
    private $id_insumo;
    private $id_producto;

  

    public function __construct($isinsumoproducto=null,$id_insumo=null,$id_producto=null)
    {
    	$this -> isinsumoproducto = $isinsumoproducto;
    	$this-> id_insumo = $id_insumo;
    	$this-> id_producto = $id_producto;

    	
    }
	public function getIsinsumoproducto(){
		return $this->isinsumoproducto;
	}

	public function setIsinsumoproducto($isinsumoproducto){
		$this->isinsumoproducto = $isinsumoproducto;
	}

	public function getId_insumo(){
		return $this->id_insumo;
	}

	public function setId_insumo($id_insumo){
		$this->id_insumo = $id_insumo;
	}

	public function getId_producto(){
		return $this->id_producto;
	}

	public function setId_producto($id_producto){
		$this->id_producto = $id_producto;
	}
    	
}