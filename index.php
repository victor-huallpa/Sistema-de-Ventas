<?php
    require_once "config/app.php";
    require_once "autoload.php";
    require_once "app/views/inc/session_start.php";
    if (isset($_GET['views'])) {

        $url = explode("/", $_GET['views']);

        // $url = ["categoryupdate", "1", "7"];
    }else{
        $url = ["login"];
    }

    // echo $url[2];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php require_once "app/views/inc/head.php";?>
</head>
<body>
    <?php
        use app\controllers\viewsController;


        $viewsController= new viewsController;
        $vista=$viewsController->obtVisCon($url[0]);

        if ($vista=="login" || $vista=="404") {
            require_once "app/views/content/".$vista."-view.php";
        } else {
            
        
        
    ?>

    <!-- Main container -->
    <main class="page-container">



        <!-- NavLateral -->
        <?php require_once "app/views/inc/navLateral.php";?>



        <!-- Page content -->
        <section class="full-width pageContent scroll" id="pageContent">

            <!-- NavBar -->
            <?php 
                require_once "app/views/inc/navBar.php";

            // <!-- Content -->
                require_once $vista;
            ?> 

            <!-- Fin content -->


        </section> <!-- Fin page content -->

    </main> <!-- Fin main container -->
    <?php } require_once "app/views/inc/script.php";?>

    
</body>
</html>