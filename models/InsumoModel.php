<?php
include_once 'entities/insumo.php';

class InsumoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function obtenerInsumo()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM insumo");

            while ($row = $query->fetch()) {
                $item = new insumo();
                $item->setId_insumo($row['id_insumo']);
                $item->setNombre($row['nombre']);
                $item->setCantidad($row['cantidad']);
                $item->setid_proveedor($row['id_proveedor']);
                $item->setPrecio($row['precio']);
                $item->setUnidadmedida($row['unidadmedida']);
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function insertar($insumo){
        $query = $this->db->connect()->prepare("INSERT INTO insumo(id_insumo,nombre,cantidad,id_proveedor,precio,unidadmedida) 
        VALUES (:id_insumo,:nombre,:cantidad,:id_proveedor,:precio,:unidadmedida)");
        try{
            $query->execute([
                'id_insumo' => $insumo->getId_insumo(),
                'nombre' => $insumo->getNombre(),
                'cantidad'=> $insumo->getCantidad(),
                'id_proveedor'=> $insumo->getId_proveedor(),
                'precio'=> $insumo->getPrecio(),
                'unidadmedida'=> $insumo->getUnidadmedida()
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
}
   public function eliminar($id){
         $query = $this->db->connect()->prepare("DELETE FROM insumo WHERE id_insumo = :id");
         try{
             $query->execute([
                 'id' => $id
             ]);
             return true;
        }catch(PDOException $e){
             return false;
         }
     }
      public function editar($insumo)
    {
        $query = $this->db->connect()->prepare("UPDATE insumo

         SET nombre=:nombre,cantidad=:cantidad,id_proveedor=:id_proveedor,precio=:precio,unidadmedida=:unidadmedida
          WHERE id_insumo = :id_insumo");
        try {
            $query->execute([
                'id_insumo' => $insumo->getId_insumo(),
                'nombre' => $insumo->getNombre(),
                'cantidad' => $insumo->getCantidad(),
                'id_proveedor' => $insumo->getId_proveedor(),
                'precio' => $insumo->getPrecio(),
                'unidadmedida' => $insumo->getUnidadmedida()
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
     public function obtenerPorId($id){
             $item = new Insumo();
             $query = $this->db->connect()->prepare("SELECT * FROM insumo WHERE id_insumo = :id");
             try{
                 $query->execute(['id' => $id]);
    
                 while($row = $query->fetch()){
                    $item->setId_insumo($row['id_insumo']);
                    $item->setNombre($row['nombre']);
                    $item->setCantidad($row['cantidad']);
                    $item->setId_proveedor($row['id_proveedor']);
                    $item->setPrecio($row['precio']);
                    $item->setUnidadmedida($row['unidadmedida']);
                    
                 }
                 return $item;
             }catch(PDOException $e){
                 return null;
             }
     }
     public function obtenerTodas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM insumo");

            while ($row = $query->fetch()) {
                $item = new Insumo();
                $item->setId_insumo($row['id_insumo']);
                $item->setNombre($row['nombre']);
                
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        } 
    }
}

