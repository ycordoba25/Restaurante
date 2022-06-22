<?php
 class ventaproducto {

    private $id_ventaproducto;
    private $id_producto;
	private $id_venta;
  

	public function __construct($id_ventaproducto=null,$id_producto=null,$id_venta=null)
	{
    	$this -> id_ventaproducto = $id_ventaproducto;
    	$this-> id_producto = $id_producto;
		$this-> id_venta = $id_venta;
    	
    } 
	public function getId_ventaproducto(){
		return $this->id_ventaproducto;
	}

	public function setId_ventaproducto($id_ventaproducto){
		$this->id_ventaproducto = $id_ventaproducto;
	}

	public function getId_producto(){
		return $this->id_producto;
	}

	public function setId_producto($id_producto){
		$this->id_producto = $id_producto;
	}

	public function getId_venta(){
		return $this->id_venta;
	}

	public function setId_venta($id_venta){
		$this->id_venta = $id_venta;
	}
}