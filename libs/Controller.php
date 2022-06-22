<?php
class Controller
{

    public function model($model)
    {
        require_once 'models/' .  ucfirst($model) . 'Model.php';
        $model = ucfirst($model) . 'Model';
        return new $model();
    }

    public function view($view, $data = [])
    {
        session_start();

        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['rol']) && $_SESSION['rol'] == "admin") {

                if (file_exists('views/farmacia/' . $view . '.php')) {

                    foreach ($data as $key => $value) {
                        $$key = $value;
                    }

                    require_once 'views/farmacia/' . $view . '.php';
                } else {
                    header('location:' . URL . 'productos');
                }
            } else if (isset($_SESSION['rol']) && $_SESSION['rol'] == "cajero") {

                if (file_exists('views/cajeros/' . $view . '.php')) {
                    foreach ($data as $key => $value) {
                        $$key = $value;
                    }
                    require_once 'views/cajeros/' . $view . '.php';
                } else {
                    header('location:' . URL . 'ventas');
                }
            }
        } else {
            if (file_exists('views/' . $view . '.php')) {

                foreach ($data as $key => $value) {
                    $$key = $value;
                }

                require_once 'views/' . $view . '.php';
            } else {
                header('location:' . URL . 'login');
            }
        }
    }
}
