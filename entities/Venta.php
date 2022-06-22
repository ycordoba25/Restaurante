<?php
class Venta
{

	private $id_venta;
	private $id_cliente;
	private $precio;
	private $metodo_pago;
	private $fecha;


	public function __construct($id_venta = null, $precio = null, $medio_pago = null, $id_cliente = null, $fecha = null)
	{
		$this->id_venta = $id_venta;
		$this->id_cliente = $id_cliente;
		$this->precio = $precio;
		$this->metodo_pago = $medio_pago;
		$this->fecha = $fecha;
	}

	public function getId_venta()
	{
		return $this->id_venta;
	}

	public function setId_venta($id_venta)
	{
		$this->id_venta = $id_venta;
	}

	public function getId_cliente()
	{
		return $this->id_cliente;
	}

	public function setId_cliente($id_cliente)
	{
		$this->id_cliente = $id_cliente;
	}

	public function getPrecio()
	{
		return $this->precio;
	}

	public function setPrecio($precio)
	{
		$this->precio = $precio;
	}

	public function getMetodo_pago()
	{
		return $this->metodo_pago;
	}

	public function setMetodo_pago($metodo_pago)
	{
		$this->metodo_pago = $metodo_pago;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

}
