<?php
class Producto
{

    public $id_producto;
    public $nombre;
    public $precio;
    public $id_categoria;



    public function __construct($id_producto = null, $nombre = null, $precio = null, $id_categoria = null)
    {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->id_categoria = $id_categoria;
        
    }
    public function getId_producto(){
		return $this->id_producto;
	}

	public function setId_producto($id_producto){
		$this->id_producto = $id_producto;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getId_categoria(){
		return $this->id_categoria;
	}

	public function setId_categoria($id_categoria){
		$this->id_categoria = $id_categoria;
	}
}
