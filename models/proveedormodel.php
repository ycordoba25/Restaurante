<?php
include_once 'entities/proveedor.php';

class proveedormodel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function obtenerNombrePorId($id)
    {

        $query = $this->db->connect()->prepare("SELECT nombre FROM proveedor WHERE id_proveedor = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                return $row['nombre'];
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function obtenerPorId($id)
    {
        $item = new proveedor();
        $query = $this->db->connect()->prepare("SELECT * FROM proveedor WHERE id_proveedor = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->setId_proveedor($row['id_proveedor']);
                $item->setNombre($row['nombre']);
                $item->setEmpresa($row['Empresa']);
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function obtenerTodas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM proveedor");

            while ($row = $query->fetch()) {
                $item = new proveedor();
                $item->setId_proveedor($row['id_proveedor']);
                $item->setNombre($row['nombre']);
                $item->setEmpresa($row['Empresa']);

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function obtenerProveedor()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM proveedor");

            while ($row = $query->fetch()) {
                $item = new proveedor();
                $item->setId_proveedor($row['id_proveedor']);
                $item->setNombre($row['nombre']);
                $item->setEmpresa($row['Empresa']);


                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertar($proveedor)
    {
        $query = $this->db->connect()->prepare("INSERT INTO proveedor(id_proveedor,nombre,Empresa)
         VALUES (:id_proveedor,:nombre,:Empresa)");
        try {
            $query->execute([
                'id_proveedor' => $proveedor->getId_proveedor(),
                'nombre' => $proveedor->getNombre(),
                'Empresa' => $proveedor->getEmpresa()

            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function eliminar($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM proveedor WHERE id_proveedor = :id");
        try {
            $query->execute([
                'id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function editar($proveedor)
    {
        // var_dump($proveedor);    
        $query = $this->db->connect()->prepare("UPDATE proveedor
        SET nombre=:nombre,Empresa=:Empresa
        WHERE id_proveedor=:id_proveedor");
        try {
            $query->execute([
                'id_proveedor' => $proveedor->getId_proveedor(),
                'nombre' => $proveedor->getNombre(),
                'Empresa' => $proveedor->getEmpresa(),
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
