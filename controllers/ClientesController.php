<?php
require 'models/ClienteModel.php';


class ClientesController extends Controller
{

    public function actionIndex()
    {
        $datos = [
            'lista_clientes' => $this->obtenerClientes()
        ];

        $this->view('clientes/listar', $datos);
    }

    public function obtenerClientes()
    {
        $pModel = new ClienteModel();

        $listado_de_clientes = $pModel->obtenerClientes();

        return $listado_de_clientes;
    }
   


  
    public function actionEliminar($id)
    {
        $pmodel = new ClienteModel();
        $pmodel->eliminar($id[0]);
        header('location:' . URL . 'clientes');
    }
    public function actionNuevo()
    {
        if (isset($_POST["id_cliente"],
        $_POST["nombre"],
        $_POST["direccion"],
        $_POST["telefono"])) {
            $pModel = new ClienteModel();

            $respuesta =  $pModel->insertar(new cliente(
                $_POST["id_cliente"],
                $_POST["nombre"],
                $_POST["direccion"],
                $_POST["telefono"]
            ));

            if ($respuesta) {
                header('location:' . URL . 'clientes');
            } else {
                echo 'No se registraron clientes Correctamente';
            }
        } else {

            $this->view('clientes/nuevo');
        }
    }
    
    public function actionEditar($id)
    {
        $pModel = new ClienteModel();

        if (isset($_POST["id_cliente"],
        $_POST["nombre"],
        $_POST["direccion"],
        $_POST["telefono"])) {
    
            $respuesta =  $pModel->editar(new cliente(
                $_POST["id_cliente"],
                $_POST["nombre"],
                $_POST["direccion"],
                $_POST["telefono"]
            ));

            if ($respuesta) {
                header('location:' . URL . 'clientes');
            } else {
                echo 'No se Edito clientes Correctamente';
            }
        }
         else {

            $datos = [
                'cliente' => $pModel->obtenerPorId($id[0]),
                

            ];

            $this->view('clientes/editar', $datos);
        }
    }
}
