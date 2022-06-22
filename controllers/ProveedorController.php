<?php
require 'models/proveedormodel.php';


class ProveedorController extends Controller
{

    public function actionIndex()
    {
        $datos = [
            'lista_proveedores' => $this->obtenerProveedor()
        ];

        $this->view('proveedores/listar', $datos);
    }

    public function obtenerProveedor()
    {
        $pModel = new proveedormodel();

        $listado_de_proveedores = $pModel->obtenerProveedor();

        for ($i = 0; $i < count($listado_de_proveedores); $i++) {


            $empresa = $listado_de_proveedores[$i]->getId_proveedor();

            $nombreDeProveedor = $this->obtenerNombreDeProveedor($empresa);

            $listado_de_proveedores[$i]->setId_proveedor($empresa);
        }

        return $listado_de_proveedores;
    }


    public function obtenerNombreDeProveedor($id)
    {
        $tpm = new proveedormodel();

        return $tpm->obtenerNombrePorId($id);
    }


    public function actionNuevo()
    {
        if (isset(

            $_POST["nombre"],
            $_POST["Empresa"]
        )) {

            $pModel = new proveedormodel();

            $respuesta =  $pModel->insertar(new proveedor(
                $_POST["nombre"],
                $_POST["Empresa"]
            ));

            if ($respuesta) {
                header('location:' . URL . 'proveedor');
            } else {
                echo 'No se registro proveedor Correctamente';
            }
        } else {

            $this->view('proveedores/nuevo');
        }
    }

    public function actionEliminar($id)
    {
        $pmodel = new proveedormodel();
        $pmodel->eliminar($id[0]);
        header('location:' . URL . 'proveedor');
    }

    public function actionEditar($id)
    {
        $pModel = new proveedormodel();
        if (isset(
            $_POST["id_proveedor"],
            $_POST["empresa"],
            $_POST["nombre"],
        )) {

            $respuesta =  $pModel->editar(new proveedor(
                $_POST["id_proveedor"],
                $_POST["nombre"],
                $_POST["empresa"]
            ));
            if ($respuesta) {
                header('location:' . URL . 'proveedor');
            } else {
                echo 'No se Edito Productos Correctamente';
            }
        } else {

            $datos = [
                'proveedor' => $pModel->obtenerPorId($id[0]),
            ];

            $this->view('proveedores/editar', $datos);
        }
    }
}
