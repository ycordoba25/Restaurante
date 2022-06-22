<?php
include_once 'entities/venta.php';

class VentasModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function obtenerVentas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM venta");

            while ($row = $query->fetch()) {
                $item = new venta();
                $item->setId_venta($row['id_venta']);
                $item->setPrecio($row['precio']);
                $item->setMetodo_pago($row['metodo_pago']);
                $item->setId_cliente($row['id_cliente']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }



    public function obtenerVentasPorRango($fechaInicio, $fechaFin)
    {
        $items = [];
        $consulta = "SELECT * FROM venta WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin'";
        // var_dump($consulta);
        try {
            $query = $this->db->connect()->query($consulta);

            while ($row = $query->fetch()) {
                $item = new venta();
                $item->setId_venta($row['id_venta']);
                $item->setPrecio($row['precio']);
                $item->setMetodo_pago($row['medio_pago']);
                $item->setId_cliente($row['id_cliente']);
                $item->setFecha($row['fecha']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function insertarVentaProducto($producto_id)
    {
        $query = $this->db->connect()->prepare("INSERT INTO ventaproducto (id_ventaproducto,id_producto,id_venta)
         VALUES ( :id_ventaproducto, :id_producto, :id_venta)");
        try {
            $query->execute([
                'id_ventaproducto' => null,
                'id_producto' => $producto_id,
                'id_venta' => $this->obtenerUltimoId()
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertar($venta)
    {
        $query = $this->db->connect()->prepare("INSERT INTO venta (id_venta,precio,medio_pago,id_cliente)
         VALUES (:id_venta,:precio, :metodo_pago, :id_cliente)");
        try {
            $query->execute([
                'id_venta' => $venta->getId_venta(),
                'precio' => $venta->getPrecio(),
                'metodo_pago' => $venta->getMetodo_pago(),
                'id_cliente' => $venta->getId_cliente(),
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    private function obtenerUltimoId()
    {
        $id = "";
        $query = $this->db->connect()->prepare('SELECT MAX(id_venta) AS id FROM venta');
        try {
            $query->execute();

            while ($row = $query->fetch()) {
                $id = $row['id'];
            }
            return $id;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function obtenerVentasEntreFechas($fechaInicio, $fechafin)
    {
    }
}
