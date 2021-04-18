<?php
    $GLOBALS["raiz"] = Ruta_Controlador::raiz_controlador();
    $GLOBALS["fecha"] = Ruta_Controlador::fecha_controlador();
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Candy Shop</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Oso rojo, importadores directos de todo tipo de articulos promocionales"/>
    <meta name="keywords" content="promocionales, articulos promocionales, regalos corporativos"/>
    <meta name="author" content="iNext Group"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vista/css/plantilla.css">
    <link rel="stylesheet" type="text/css" href="vista/css/colores.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-replica sidebar-mini login-page">
    <?php
        session_start();
        if(isset($_SESSION["id"]) && $_SESSION["validar_sesion"] === "ok"){
            echo '<div class="wrapper">';
            /*incio encabezado*/
            include "vista/modulos/core/encabezado.php";
            /*incio menu*/
            include "vista/modulos/core/menu.php";
            $modulo = new Ruta_Controlador();
            $modulo -> enlace_controlador();
            /*inicio pie*/
            include "vista/modulos/core/pie.php";
            /*inicio historial*/
            include "vista/modulos/core/historial.php";
            echo '</div>';
        }
        else if(isset($_SESSION["id"]) && $_SESSION["validar_sesion"] === "pendiente"){
            echo '<div class="wrapper">';
            /*incio encabezado*/
            include "vista/modulos/core/encabezado.php";
            $modulo = new Ruta_Controlador();
            $modulo -> enlace_controlador();
            /*inicio pie*/
            include "vista/modulos/core/pie.php";
            echo '</div>';
        }
        else{
            $modulo = new Ruta_Controlador();
            $modulo -> enlace_controlador();
        }
    ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
    <script type="text/javascript" src="https://use.fontawesome.com/96062cd812.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="vista/js/plantilla.js"></script>
    <script type="text/javascript" src="vista/js/usuario.js"></script>
    <script type="text/javascript" src="vista/js/cliente.js"></script>
    <script type="text/javascript" src="vista/js/producto.js"></script>
    <script type="text/javascript" src="vista/js/formulario.js"></script>
</body>
</html>
