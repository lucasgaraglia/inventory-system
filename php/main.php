<!-- aca van a estar todas las funciones que vamos a utilizar en el sistema -->

<!-- conexion a bdd con PDO (framework de php)-->
<?php
/* PDO('mysql:host=nombre_host;dbname=nombre_db;','user','password') */
/* esto es una instancia de la clase PDO */
function connection(){
    $pdo = new PDO('mysql:host=localhost;dbname=inventory;','root','');
    return $pdo;
}

/* -> significa que voy a usar un metodo de la instancia */
/* ejemplo insert sql */
/*$pdo->query("INSERT INTO category(category_name, category_address) VALUES('test','address test')");*/
?>