<?php
include_once 'entities/presentacion.php';

class MetodoPagoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }


    
        public function obtenerNombrePorId($id)
        {
    
            $query = $this->db->connect()->prepare("SELECT nombre FROM tipopago WHERE cod_tipopago = :id");
            try {
                $query->execute(['id' => $id]);
    
                while ($row = $query->fetch()) {
                    return $row['nombre'];
                }
                
            } catch (PDOException $e) {
                return null;
            }
        }
        
        public function obtenerTodas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM cod_tipopago");

            while ($row = $query->fetch()) {
                $item = new tipopago();
                $item->setCod_tipopago($row['cod_tipopago']);
                $item->setNombre($row['nombre']);
               
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        } 
    }
    
}
