<?php
include_once 'entities/categoria.php';

class CategoriaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

        
        public function obtenerTodas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM categoria");

            while ($row = $query->fetch()) {
                $item = new categoria();
                $item->setId_categoria($row['id_categoria']);
                $item->setNombre($row['nombre']);
               
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        } 
    }

    public function obtenerNombrePorId($id)
    {
        $query = $this->db->connect()->prepare("SELECT nombre FROM categoria WHERE id_categoria = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                return $row['nombre'];
            }
        } catch (PDOException $e) {
            return null;
        }
    }
    
}
