<?php
require 'models/usuariomodel.php';

class LoginController extends Controller
{

    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new usuariomodel();
    }

    public function actionIndex()
    {
        $data = ['titulo' => 'Login'];

        $this->view('login', $data);
    }

    public function actionValidar()
    {
        if (isset($_POST['user'], $_POST['pass'])) {
            session_start();

            $username = $_POST['user'];
            $pass = $_POST['pass'];

            // echo $this->usuarioModel->validarInicioSesion($username, $pass)->getNombre();

            if ($this->usuarioModel->validarInicioSesion($username, $pass)->getNombre() != null) {

                $rol = $this->usuarioModel->validarInicioSesion($username, $pass)->getRol();

                $_SESSION['user'] = $username;
                $_SESSION['rol'] = $rol;
                $_SESSION['user_name'] = $this->usuarioModel->validarInicioSesion($username, $pass)->getNombre();
                if ($rol == "admin") {
                    header('location: ' . URL . 'productos');
                } else {
                    header('location: ' . URL . 'ventas');
                }
            } else {
                header('location: ' . URL . 'login?message');
            }
        } else {
            header('location: ' . URL . 'login');
        }
    }

    public function actionLogout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location: ' . URL . 'login');
    }
}
