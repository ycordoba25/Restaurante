<?php
require 'models/ProductoModel.php';
require 'models/CategoriaModel.php';

class ProductosController extends Controller
{

    public function actionIndex()
    {
        $datos = [
            'lista_productos' => $this->obtenerProductos()
        ];

        $this->view('productos/listar', $datos);
    }

    public function actionEditar($id)
    {
        $pModel = new ProductoModel();
        if (isset(
            $_POST["id_producto"],
            $_POST["nombre"],
            $_POST["precio"],
            $_POST["id_categoria"]
        )) {

            $respuesta =  $pModel->editar(new Producto(
                $_POST["id_producto"],
                $_POST["nombre"],
                $_POST["precio"],
                $_POST["id_categoria"]
            ));
            if ($respuesta) {
                header('location:' . URL . 'productos');
            } else {
                echo 'No se Edito Productos Correctamente';
            }
        } else {
            $datos = [
                'producto' => $pModel->obtenerPorId($id[0]),
                'categorias' => $this->obtenerCategorias()
            ];

            $this->view('productos/editar', $datos);
        }
    }


    public function obtenerCategorias()
    {
        $tpm = new CategoriaModel();
        return $tpm->obtenerTodas();
    }

    public function actionEliminar($id)
    {
        $pmodel = new ProductoModel();
        $pmodel->eliminar($id[0]);
        header('location:' . URL . 'productos');
    }
    public function actionNuevo()
    {
        if (isset(
            $_POST["id_producto"],
            $_POST["nombre"],
            $_POST["precio"],
            $_POST["id_categoria"]
        )) {
            $pModel = new ProductoModel();

            $respuesta =  $pModel->insertar(new Producto(
                $_POST["id_producto"],
                $_POST["nombre"],
                $_POST["precio"],
                $_POST["id_categoria"]
            ));

            if ($respuesta) {
                header('location:' . URL . 'productos');
            } else {
                echo 'No se registraron Productos Correctamente';
            }
        } else {

            $datos = [
                'categorias' => $this->obtenerCategorias()
            ];

            $this->view('productos/nuevo', $datos);
        }
    }


    public function obtenerProductos()
    {
        $pModel = new ProductoModel();

        $listado_de_productos = $pModel->obtenerProductos();

        for ($i = 0; $i < count($listado_de_productos); $i++) {

            $idCategoria = $listado_de_productos[$i]->getId_categoria();

            $nombreCategoria = $this->obtenerNombreDeCategoria($idCategoria);

            $listado_de_productos[$i]->setId_categoria($nombreCategoria);
        }

        return $listado_de_productos;
    }

    public function actionObtenerProductosAjax($id_categoria)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Allow: GET, POST, OPTIONS, PUT, DELETE");

        $pModel = new ProductoModel();

        $listado_de_productos = $pModel->obtenerPorCategoria($id_categoria[0]);

        for ($i = 0; $i < count($listado_de_productos); $i++) {

            $idCategoria = $listado_de_productos[$i]->getId_categoria();

            $nombreCategoria = $this->obtenerNombreDeCategoria($idCategoria);

            $listado_de_productos[$i]->setId_categoria($nombreCategoria);
        }

        echo json_encode($listado_de_productos);
    }


    public function obtenerNombreDeCategoria($idCategoria)
    {
        $tpm = new CategoriaModel();

        return $tpm->obtenerNombrePorId($idCategoria);
    }
}
