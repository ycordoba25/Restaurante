<?php

class IndexController extends Controller
{

    public function __construct()
    {
    }

    public function actionIndex()
    {
        // echo "siii";
        $data = ['titulo' => 'Login'];

        $this->view('login', $data);
    }

    public function actionVer()
    {
        echo "soy el Ver";
    }
}
