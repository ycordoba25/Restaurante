<?php
include_once 'entities/usuario.php';

class usuariomodel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insertar($usuario)
    {
        $query = $this->db->connect()->prepare("INSERT INTO usuario(id_usuario,nombre,usuario,contraseña,id_restaurante,rol)
        VALUES (:id_usuario,:nombre,:usuario,:contraseña,:id_restaurante,:rol)");
        try {
            $query->execute([
                'id_usuario' => $usuario->getId_usuario(),
                'nombre' => $usuario->getNombre(),
                'usuario' => $usuario->getUsuario(),
                'contraseña' => $usuario->getContraseña(),
                'id_restaurante' => $usuario->getId_restaurante(),
                'rol' => $usuario->getRol()


            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

 /*  public function obtenerPorId($id)
    {
        $item = new usuario();
        $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE cedula = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $item->setCedula($row['cedula']);
                $item->setNombre($row['usuario']);
                $item->setDireccion($row['nombre']);
                $item->setDireccion($row['direccion']);
                $item->setTelefono($row['telefono']);
                $item->setSexo($row['sexo']);
                $item->setRol($row['rol']);
                $item->setContrasena($row['contrasena']);
                $item->setCod_dueno($row['cod_dueno']);
                $item->setCod_ciudad($row['cod_ciudad']);
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
     
    public function editar($item)
    {
        $query = $this->db->connect()->prepare("UPDATE usuario SET cedula = :cedula, usuario = :usuario, nombre = :nombre,
         direccion = :direccion, telefono = :telefono, sexo = :sexo,  rol = :rol,contrasena = :contrasena, cod_ciudad = :cod_ciudad 
         WHERE cod_dueno = :cod_dueno");
        try {
            $query->execute([
                'cod_dueno' => $item['cod_dueno'],
                'cedula' => $item['cedula'],
                'usuario' => $item['usuario'],
                'nombre' => $item['nombre'],
                'direccion' => $item['direccion'],
                'telefono' => $item['telefono'],
                'sexo' => $item['sexo'],
                'rol' => $item['rol'],
                'contrasena' => $item['contrasena'],
                'cod_ciudad' => $item['cod_ciudad'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function eliminar($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM usuario WHERE cedula = :id");
        try {
            $query->execute([
                'id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function obtenerTodas()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM usuario");

            while ($row = $query->fetch()) {
                $item = new usuario();
                $item->setCedula($row['cedula']);
                $item->setNombre($row['nombre']);

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function obtenerUsuarios()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM usuario");

            while ($row = $query->fetch()) {
                $item = new usuario();
                $item->setCedula($row['cedula']);
                $item->setNombre($row['usuario']);
                $item->setDireccion($row['nombre']);
                $item->setDireccion($row['direccion']);
                $item->setTelefono($row['telefono']);
                $item->setSexo($row['sexo']);
                $item->setRol($row['rol']);
                $item->setContrasena($row['contrasena']);
                $item->setCod_dueno($row['cod_dueno']);
                $item->setCod_ciudad($row['cod_ciudad']);
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
   
*/
    public function validarInicioSesion($user, $pass)
    {
        $item = new usuario();
        $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE usuario = :usu AND contrasena = :pass");
        try {
            $query->execute([
                'usu' => $user,
                'pass' => $pass
            ]);

            while ($row = $query->fetch()) {
                $item->setId_usuario($row['id_usuario']);
                $item->setNombre($row['nombre']);
                $item->setUsuario($row['usuario']);
                $item->setContrasena($row['contrasena']);
                $item->setId_restaurante($row['id_restaurante']);
                $item->setRol($row['rol']);
            }
            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }
}
