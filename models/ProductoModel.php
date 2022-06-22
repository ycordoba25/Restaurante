<?php
include_once 'entities/Producto.php';

class ProductoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function obtenerProductos()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM producto");

            while ($row = $query->fetch()) {
                $item = new Producto();
                $item->setId_producto($row['id_producto']);
                $item->setNombre($row['nombre']);
                $item->setPrecio($row['precio']);
                $item->setId_categoria($row['id_categoria']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function obtenerProductosDeVenta($id_vent)
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT nombre from producto WHERE id_producto IN (SELECT id_producto FROM `ventaproducto` WHERE id_venta= $id_vent)");

            while ($row = $query->fetch()) {
                array_push($items, $row['nombre']);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function obtenerPorCategoria($id_categoria)
    {
        $items = [];
        $query = $this->db->connect()->prepare("SELECT * FROM producto WHERE id_categoria = :id");
        try {


            $query->execute([
                'id' => $id_categoria
            ]);

            while ($row = $query->fetch()) {
                $item = new Producto();
                $item->setId_producto($row['id_producto']);
                $item->setNombre($row['nombre']);
                $item->setPrecio($row['precio']);
                $item->setId_categoria($row['id_categoria']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function insertar($producto)
    {
        $query = $this->db->connect()->prepare("INSERT INTO producto(id_producto,nombre,precio,id_categoria) 
        VALUES (:id_producto,:nombre,:precio,:categoria)");
        try {
            $query->execute([
                'id_producto' => $producto->getId_producto(),
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio(),
                'categoria' => $producto->getId_categoria()
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function eliminar($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM producto WHERE id_producto = :id");
        try {
            $query->execute([
                'id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function editar($producto)
    {
        $query = $this->db->connect()->prepare("UPDATE producto 
        SET nombre = :nombre,
            precio = :venta,
            id_categoria = :cat
            WHERE id_producto = :cod");
        try {
            $query->execute([
                'cod' => $producto->getId_producto(),
                'nombre' => $producto->getNombre(),
                'venta' => $producto->getPrecio(),
                'cat' => $producto->getId_categoria()
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function obtenerPorId($id)
    {

        $item = new Producto();
        $query = $this->db->connect()->prepare("SELECT * FROM producto WHERE id_producto = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->setId_producto($row['id_producto']);
                $item->setNombre($row['nombre']);
                $item->setPrecio($row['precio']);
                $item->setId_categoria($row['id_categoria']);
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
            $query = $this->db->connect()->query("SELECT * FROM producto");

            while ($row = $query->fetch()) {
                $item = new Producto();
                // $item->setCod_producto($row['id_producto']);
                $item->setNombre($row['nombre']);

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}
