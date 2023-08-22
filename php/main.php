<!-- aca van a estar todas las funciones que vamos a utilizar en el sistema -->

<?php
/* !!!conexion a bdd con PDO (framework de php)!!! */

    /* PDO('mysql:host=nombre_host;dbname=nombre_db;','user','password') */
    /* esto es una instancia de la clase PDO */
function connection(){
    $pdo = new PDO('mysql:host=localhost;dbname=inventory;','root','');
    return $pdo;
}
    /* -> significa que voy a usar un metodo de la instancia */
    /* ejemplo insert sql */
    /*$pdo->query("INSERT INTO category(category_name, category_address) VALUES('test','address test')");*/




/* funcion verificar datos formulario*/
    // lleva como parametros el filtro aplicado (expresiones regulares) y el string
function verify_data($filter, $string){
    //la funcion preg_match tambien recibe esos dos parametros
    if(preg_match("/^".$filter."$/", $string)){
        // si el string cumple con las condiciones del filtro, devuelvo FALSE (que no hay error)
        return false;
    }else{
        // si no cumple, devuelvo TRUE (hay error)
        return true;
    }
}
// ejemplo de uso
// $name2 = "Crist2";
// if(verify_data("[a-zA-Z]{4,20}",$name2)){
//     echo "Please enter the right data.";
// }



?>
