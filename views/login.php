<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= URL ?>public/css/login-custom.css">
</head>

<body>

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Iniciar Sesión</h2>
                    <?php
                    if (isset($message)) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>Usuario y/o Password Incorrecto</span>
                        </div>
                    <?php
                    }
                    ?>
                    <form action="login/validar" class="login-form" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Usuario</label>
                            <input type="text" class="form-control" placeholder="" name="user">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Contraseña</label>
                            <input type="password" class="form-control" placeholder="" name="pass">
                        </div>


                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                <small>Recordarme</small>
                            </label>
                            <button type="submit" class="btn btn-login float-right">Ingresar</button>
                        </div>

                    </form>
                    <div class="copy-text">Para un mejor control <i class="fa fa-heart"></i> Lovers Burgers</div>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div>
                                <img src="https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2020/08/hamburguesa-2028707.jpg?itok=ujl3qgM9" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">

                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
    </section>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>

</html>