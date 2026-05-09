<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE VENTAS</title>
    <link rel="stylesheet" href="./css/bulma.min.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/sweetalert2.min.css">
    <script src="./js/sweetalert2.all.min.js" ></script>
</head>
<body>

    <!-- LogIn -->
    <div class="main-container">

        <form class="box login" action="" method="POST" autocomplete="off" >
            <p class="has-text-centered">
                <i class="fas fa-user-circle fa-5x"></i>
            </p>
            <h5 class="title is-5 has-text-centered">Inicia sesión con tu cuenta</h5>

            <div class="field">
                <label class="label"><i class="fas fa-user-secret"></i> &nbsp; Usuario</label>
                <div class="control">
                    <input class="input" type="text" name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required >
                </div>
            </div>

            <div class="field">
                <label class="label"><i class="fas fa-key"></i> &nbsp; Clave</label>
                <div class="control">
                    <input class="input" type="password" name="login_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required >
                </div>
            </div>

            <p class="has-text-centered mb-4 mt-3">
                <button type="submit" class="button is-info is-rounded">LOG IN</button>
            </p>

        </form>
    </div> <!-- Fin LogIn -->



    <script src="./js/main.js" ></script>
</body>
</html>