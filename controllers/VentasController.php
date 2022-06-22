<?php
require 'models/VentasModel.php';
require 'models/CategoriaModel.php';
require 'models/ClienteModel.php';

class VentasController extends Controller
{

    public function actionIndex()
    {
        $datos = [
            "categorias" => $this->obtenerCategorias(),
            "clientes" => $this->obtenerClientes()
        ];

        $this->view('ventas/listar', $datos);
    }

    public function actionRegistrarVenta()
    {
        $ventaModel = new VentasModel();
        $venta = new Venta(null, $_POST['total'], $_POST['metodoPago'], $_POST['cliente_id']);
        // var_dump($_POST);
        $ventaModel->insertar($venta);
        foreach ($_POST['productos'] as $p) {
            $ventaModel->insertarVentaProducto($p);
        }
        header('Location:' . constant('URL') . "ventas?s");
    }

    public function obtenerClientes()
    {
        $tpm = new ClienteModel();
        return $tpm->obtenerClientes();
    }

    public function obtenerCategorias()
    {
        $tpm = new CategoriaModel();
        return $tpm->obtenerTodas();
    }
}
