<!-- las sesiones se declaran antes del codigo HTML -->
<?php require "./inc/session_start.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./inc/head.php";?>
</head>
<body>
    <?php 

    /* si la variable view no viene definida, o es una cadena en blanco,
    le asigno valor login (incluyo login y va a tener que loguearse)*/
    if(!isset($_GET['view']) || $_GET['view']==""){
        $_GET['view']="login";
    }

    /* si existe un archivo que se llame tal (resultado
    del if anterior), incluyo navbar, script y el archivo de
    la view que corresponda.
    Y SI ES DISTINTO A LOGIN O A 404 (a esos archivos
    los vamos a tratar de otra manera)*/
    if(is_file("./views/".$_GET['view'].".php") && $_GET['view']!="login" && $_GET['view']!="404"){
        include "./inc/navbar.php";
        include "./views/".$_GET['view'].".php";
        include "./inc/script.php";
    }else{
        if($_GET['view']=="login"){
            include "./views/login.php";
        }else{
            /*y si no es igual a ninguna pag, no existe en el sistema,
            muestro error 404*/
            include "./views/404.php";
        }

    }

    
    ?>
</body>
</html>