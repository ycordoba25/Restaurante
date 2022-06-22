<?php
require 'models/UsuarioModel.php';
require 'models/CiudadModel.php';
require 'models/DueñoModel.php';


class UsuarioController extends Controller
{
    public function actionIndex()
    {
        $datos = [
            'lista_usuarios' => $this->obtenerUsuario()
        ];

        $this->view('usuarios/listar', $datos);
    }
    public function actionNuevo()
    {
        if(isset(
        $_POST["cedula"],
        $_POST["usuario"],
        $_POST["nombre"],
        $_POST["direccion"],
        $_POST["telefono"],
        $_POST["sexo"],
        $_POST["rol"],
        $_POST["contrasena"],
        $_POST["cod_dueno"],
        $_POST["cod_ciudad"]
        )){
            $pModel = new usuariomodel();
           
          $respuesta =  $pModel->insertar(new usuario( 
        $_POST["cedula"],
        $_POST["usuario"],
        $_POST["nombre"],
        $_POST["direccion"], 
        $_POST["telefono"],
        $_POST["sexo"],
        $_POST["rol"],
        $_POST["contrasena"],
        $_POST["cod_dueno"],
        $_POST["cod_ciudad"]));
        if($respuesta){
            header('location:'.URL.'usuario');
        }else{
            echo 'No se registraron Productos Correctamente';
        }
        }else{

            $datos = [
     
                'ciudades' => $this->obtenerCiudad()
            ];
           
            $this->view('usuarios/nuevo',$datos);

        }
        
    }
    public function obtenerDueño(){
        $pModel = new DueñoModel();
        return $pModel->obtenerTodas();
    }
    public function obtenerCiudad(){
        $pModel = new CiudadModel();
        return $pModel ->obtenerTodas();
    }
    public function obtenerUsuario()
    {
        $pModel = new usuariomodel();

        $listado_de_usuarios = $pModel->obtenerUsuarios();

        for ($i = 0; $i < count($listado_de_usuarios);$i++) {

            $cod_dueno = $listado_de_usuarios[$i]->getCod_dueno();

            $nombreTipoProducto = $this->obtenerNombreDueño($cod_dueno);

            $listado_de_usuarios[$i]->setCod_dueno($nombreTipoProducto);

            $cod_ciudad =  $listado_de_usuarios[$i]->getCod_ciudad();

            $nombreDeCiudad = $this->obtenerNombreCiudad($cod_ciudad);

            $listado_de_usuarios[$i]->setCod_ciudad( $nombreDeCiudad);

           
        }

        return $listado_de_usuarios;
    }
    public function obtenerNombreDueño($id)
    {
        $tpm = new DueñoModel();

        return $tpm->obtenerNombrePorId($id);
    }



    public function obtenerNombreCiudad($id)
    {
        $pmodel = new CiudadModel(); 

        return $pmodel->obtenerNombrePorId($id);
    }
    public function actionEliminar($id)
    {
        $pmodel = new usuariomodel();
        $pmodel->eliminar($id[0]);
        header('location:' . URL . 'usuarios');
    }
}