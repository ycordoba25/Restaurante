<?php
require 'models/InsumoModel.php';
require 'models/proveedormodel.php';

class InsumosController extends Controller
{

    public function actionIndex()
    {
        $datos = [
            'lista_insumos' => $this->obtenerInsumos()
        ];

        $this->view('insumos/listar', $datos);
    }

    public function actionEditar($id)
    {
        $pModel = new InsumoModel();
        if (isset(
            $_POST["id_insumo"],
            $_POST["nombre"],
            $_POST["cantidad"],
            $_POST["id_proveedor"],
            $_POST["precio"],
            $_POST["unidadmedida"]
        )) {

            $respuesta =  $pModel->editar(new insumo(
                $_POST["id_insumo"],
                $_POST["nombre"],
                $_POST["cantidad"],
                $_POST["id_proveedor"],
                $_POST["precio"],
                $_POST["unidadmedida"]
            ));
            if ($respuesta) {
                header('location:' . URL . 'insumos');
            } else {
                echo 'No se Edito insumos Correctamente';
            }
        } else {
            $datos = [
                'insumos' => $pModel->obtenerPorId($id[0]),
                'proveedor' => $this->obtenerProveedor()
            ];

            $this->view('insumos/editar', $datos);
        }
    }


    public function obtenerProveedor()
    {
        $tpm = new proveedormodel();
        return $tpm->obtenerTodas();
    }

    public function actionEliminar($id)
    {
        $pmodel = new InsumoModel();
        $pmodel->eliminar($id[0]);
        header('location:' . URL . 'insumos');
    }
    public function actionNuevo()
    {
        if (isset(
            $_POST["id_insumo"],
            $_POST["nombre"],
            $_POST["cantidad"],
            $_POST["id_proveedor"],
            $_POST["precio"],
            $_POST["unidadmedida"]
        )) {
            $pModel = new InsumoModel();

            $respuesta =  $pModel->insertar(new Insumo(
                $_POST["id_insumo"],
                $_POST["nombre"],
                $_POST["cantidad"],
                $_POST["id_proveedor"],
                $_POST["precio"],
                $_POST["unidadmedida"]
            ));

            if ($respuesta) {
                header('location:' . URL . 'Insumos');
            } else {
                echo 'No se registraron Productos Correctamente';
            }
        } else {

            $datos = [
                'proveedor' => $this->obtenerProveedor()
            ];

            $this->view('insumos/nuevo', $datos);
        }
    }


    public function obtenerInsumos()
    {
        $pModel = new InsumoModel();

        $Listado_de_insumos = $pModel->obtenerInsumo();

        for ($i = 0; $i < count($Listado_de_insumos); $i++) {

            $idProveedor = $Listado_de_insumos[$i]->getId_proveedor();
        }

        return $Listado_de_insumos;
    }

    // public function actionObtenerInsumoajax($id_proveedor)
    // {
    //     $pModel = new InsumoModel();

    //     $Listado_de_insumos = $pModel->obtenerPorProveedor($id_proveedor[0]);

    //     for ($i = 0; $i < count($Listado_de_insumos); $i++) {

    //        $idProveedor = $Listado_de_insumos[$i]->getId_proveedor();

    //         $nombreInsumo = $this->obtenerNombreDeProveedor($idProveedor);

    //         $Listado_de_insumos[$i]->setId_proveedor($nombreProveedor);
    //     }

    //     echo json_encode($Listado_de_insumos);
    // }


    // public function obtenerNombreDeInsumo($idInsumo)
    // {
    //     $tpm = new proveedormodel();

    //     return $tpm->obtenerNombrePorId($idProveedor);
    // }



}
