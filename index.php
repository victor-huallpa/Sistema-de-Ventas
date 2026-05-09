<?php
    require_once "config/app.php";
    require_once "app/views/inc/session_start.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php require_once "app/views/inc/head.php";?>
</head>
<body>

    <!-- Main container -->
    <main class="page-container">



        <!-- NavLateral -->
        <?php require_once "app/views/inc/navLateral.php";?>



        <!-- Page content -->
        <section class="full-width pageContent scroll" id="pageContent">

            <!-- NavBar -->
            <?php require_once "app/views/inc/navBar.php";?>

            <!-- Content -->
            <!-- <?php require_once "app/views/content/dashboard-view.php";?> -->

            <!-- Fin content -->


        </section> <!-- Fin page content -->

    </main> <!-- Fin main container -->
    <?php require_once "app/views/inc/script.php";?>

    
</body>
</html>