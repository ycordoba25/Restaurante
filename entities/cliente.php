<?php
class cliente
{

	private $id_cliente;
	private $nombre;
	private $direccion;
	private $telefono;

	public function __construct($id_cliente = null, $nombre = null, $direccion = null, $telefono = null)
	{
		$this->id_cliente = $id_cliente;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->telefono = $telefono;
	}
	public function getId_cliente()
	{
		return $this->id_cliente;
	}

	public function setId_cliente($id_cliente)
	{
		$this->id_cliente = $id_cliente;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getDireccion()
	{
		return $this->direccion;
	}

	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}
}
