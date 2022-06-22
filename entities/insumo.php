<?php
class insumo
{

    private $id_insumo;
    private $nombre;
    private $cantidad;
    private $id_proveedor;
    private $precio;
    private $unidadmedida;



    public function __construct($id_insumo = null, $nombre = null, $cantidad = null, $id_proveedor = null, $precio = null, $unidadmedida = null)
    {
        $this->id_insumo = $id_insumo;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->id_proveedor = $id_proveedor;
        $this->precio = $precio;
        $this->unidadmedida = $unidadmedida;
    }
    public function getId_insumo(){
		return $this->id_insumo;
	}

	public function setId_insumo($id_insumo){
		$this->id_insumo = $id_insumo;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function getId_proveedor(){
		return $this->id_proveedor;
	}

	public function setId_proveedor($id_proveedor){
		$this->id_proveedor = $id_proveedor;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getUnidadmedida(){
		return $this->unidadmedida;
	}

	public function setUnidadmedida($unidadmedida){
		$this->unidadmedida = $unidadmedida;
	}
}
