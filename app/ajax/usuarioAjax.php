<?php
    require_once "../../config/app.php";
    require_once "../views/inc/session-start.php";
    require_once "../../autoload.php";

    use app\controllers\userController;

    if (isset($_POST['modulo_usuario'])) {
        $insUsu= new userController();
        if($_POST['modulo_usuario']=="registrar"){
            echo $insUsu->regisUsuCon();
        }
    } else {
        session_destroy();
        header("Loction: ".APP_URL."login/");
    }
    