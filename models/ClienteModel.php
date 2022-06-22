<?php
include_once 'entities/cliente.php';

class ClienteModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function obtenerClientes()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM cliente");

            while ($row = $query->fetch()) {
                $item = new cliente();
                $item->setId_cliente($row['id_cliente']);
                $item->setNombre($row['nombre']);
                $item->setDireccion($row['direccion']);
                $item->setTelefono($row['telefono']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function editar($cliente)
    {

        $query = $this->db->connect()->prepare("UPDATE cliente
         SET nombre=:nombre,direccion=:direccion,telefono=:telefono
          WHERE id_cliente = :id_cliente");
        try {
            $query->execute([
                'id_cliente' => $cliente->getId_cliente(),
                'nombre' => $cliente->getNombre(),
                'direccion' => $cliente->getDireccion(),
                'telefono' => $cliente->getTelefono()
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function eliminar($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM cliente WHERE id_cliente = :id");
        try {
            $query->execute([
                'id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function insertar($cliente)
    {
        $query = $this->db->connect()->prepare("INSERT INTO cliente(id_cliente,nombre,direccion,telefono)
         VALUES (:id_cliente,:nombre,:direccion,:telefono)");
        try {
            $query->execute([
                'id_cliente' => $cliente->getId_cliente(),
                'nombre' => $cliente->getNombre(),
                'direccion' => $cliente->getDireccion(),
                'telefono' => $cliente->getTelefono()

            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function obtenerPorId($id)
    {
        $item = new cliente();
        $query = $this->db->connect()->prepare("SELECT * FROM cliente WHERE id_cliente = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->setId_cliente($row['id_cliente']);
                $item->setNombre($row['nombre']);
                $item->setDireccion($row['direccion']);
                $item->setTelefono($row['telefono']);
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }


    public function obtenerNombrePorId($id)
    {
        $query = $this->db->connect()->prepare("SELECT nombre FROM cliente WHERE id_cliente = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                return $row['nombre'];
            }
        } catch (PDOException $e) {
            return null;
        }
    }
    
    // public function obtenerTodas()
    // {
    //     $items = [];
    //     try {
    //         $query = $this->db->connect()->query("SELECT * FROM cliente");

    //         while ($row = $query->fetch()) {
    //             $item = new cliente();
    //             $item->setCedula($row['cedula']);
    //             $item->setNombre($row['nombre']);

    //             array_push($items, $item);
    //         }
    //         return $items;
    //     } catch (PDOException $e) {
    //         return [];
    //     }
    // }
}
