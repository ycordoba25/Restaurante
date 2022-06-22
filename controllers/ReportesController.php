<?php
require 'models/ProductoModel.php';
require 'models/proveedormodel.php';
require 'models/VentasModel.php';
require 'models/ClienteModel.php';
require 'models/InsumoModel.php';
require 'models/CategoriaModel.php';
require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

class ReportesController extends Controller
{
    private $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

    public function actionIndex()
    {
        $this->view('reportes/index');
    }

    public function actionDownloadProductos()
    {

        $categoriaModel = new CategoriaModel();
        $productos = $this->productoModel->obtenerProductos();

        $contenido["productos"] = $this->cambiarIdCategoriaPorNombre($productos);
        $contenido["categorias"] = $categoriaModel->obtenerTodas();

        $this->generatePdf("reporte_productos", "/productos/reportProductos", $contenido);
    }

    public function actionDownloadInsumos()
    {

        $insumosModel = new InsumoModel();
        $insumos = $insumosModel->obtenerInsumo();

        $insumos = $this->cambiarIdProveedorPorNombre($insumos);

        $contenido["insumos"] = $insumos;

        $this->generatePdf("reporte_insumos", "/insumos/reportInsumos", $contenido);
    }

    private function cambiarIdProveedorPorNombre($listaInsumos)
    {
        for ($i = 0; $i < count($listaInsumos); $i++) {

            $idProvedor = $listaInsumos[$i]->getId_proveedor();

            $proveModel = new proveedormodel();

            $proveedor =  $proveModel->obtenerPorId($idProvedor);

            $empresaProvedor = $proveedor->getEmpresa();

            $listaInsumos[$i]->setId_proveedor($empresaProvedor);
        }
        return $listaInsumos;
    }

    public function actionDownloadVentas()
    {
        if (isset($_POST['fecha_inicio'], $_POST['fecha_fin'])) {

            $ventasModel = new VentasModel();

            $fechaInicio = $_POST['fecha_inicio'];
            $fechaFin = $_POST['fecha_fin'];

            $contenido['mensaje'] = "EN DESARROLLO";
            $contenido['fechaInicio'] = $fechaInicio;
            $contenido['fechaFin'] = $fechaFin;

            $ventasEnRango = $ventasModel->obtenerVentasPorRango($fechaInicio, $fechaFin);

            // var_dump($ventasEnRango[0]->getId_venta());

            $info = $this->cambiarIdPorNombreCliente($ventasEnRango);
            $contenido['ventas'] = $info;

            $this->generatePdf("reporte_ventas-" . $fechaInicio . " hasta " . $fechaFin, "/ventas/reportVentas", $contenido);
        } else {
            echo "Faltan datos";
        }
    }


    //Genera el pdf con el nombre indicado + la fecha actual y toma como plantilla el parametro archivo
    public function generatePdf($nombreDescargable = "reporte", $plantilla, $contenido)
    {
        date_default_timezone_set('America/Bogota');
        $DateAndTime = date('m-d-Y h:i:s a', time());

        ob_start();
        require_once 'pdfs/' . $plantilla . '.php';
        $html = ob_get_clean();
        $html2pdf = new Html2Pdf('P', 'LETTER', 'es', 'true', 'UTF-8');
        $html2pdf->writeHTML($html);
        $html2pdf->output($nombreDescargable . '-' . $DateAndTime . '.pdf', 'D');
    }

    private function cambiarIdPorNombreCliente($ventas)
    {

        // var_dump($ventas);
        for ($i = 0; $i < count($ventas); $i++) {

            $venta = $ventas[$i]->getId_venta();

            // var_dump($venta);
            $productos =  $this->productoModel->obtenerProductosDeVenta($venta);


            $ventas[$i]->setId_venta($productos);

            $idCliente = $ventas[$i]->getId_cliente();

            $nombreCliente = $this->obtenerNombreClientePorId($idCliente);

            $ventas[$i]->setId_cliente($nombreCliente);
        }
        return $ventas;
    }

    private function obtenerNombreClientePorId($idCliente)
    {
        $clienteModel = new ClienteModel();
        return $clienteModel->obtenerNombrePorId($idCliente);
    }

    private function cambiarIdCategoriaPorNombre($listado_de_productos)
    {
        for ($i = 0; $i < count($listado_de_productos); $i++) {

            $idCategoria = $listado_de_productos[$i]->getId_categoria();

            $nombreCategoria = $this->obtenerNombreDeCategoria($idCategoria);

            $listado_de_productos[$i]->setId_categoria($nombreCategoria);
        }
        return $listado_de_productos;
    }

    private function obtenerNombreDeCategoria($idCategoria)
    {
        $tpm = new CategoriaModel();

        return $tpm->obtenerNombrePorId($idCategoria);
    }
}
