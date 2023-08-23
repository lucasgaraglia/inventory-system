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




// funcion para limpiar strings (evitar inyecciones SQL y demas)
function clean_string($string){
    //  la funcion trim elimina espacios en blanco al inicio y al final
    $string = trim($string);
    //  elimina barras invertidas
    $string = stripslashes($string);
    //  reemplaza caracteres por nuevos caracteres indicados en el string indicado
                        // evitamos codigo js (ataque xss)
    $string = str_ireplace("<script>","",$string);
    $string = str_ireplace("</script>","",$string);
    $string = str_ireplace("<script src", "", $string);
    $string = str_ireplace("<script type=", "", $string);
                        // evitamos SQL
    $string = str_ireplace("SELECT * FROM", "", $string);
    $string = str_ireplace("DELETE FROM", "", $string);
    $string = str_ireplace("INSERT INTO", "", $string);
    $string = str_ireplace("DROP TABLE", "", $string);
    $string = str_ireplace("DROP DATABASE", "", $string);
    $string = str_ireplace("TRUNCATE TABLE", "", $string);
    $string = str_ireplace("SHOW TABLES;", "", $string);
    $string = str_ireplace("SHOW DATABASES;", "", $string);
                        // evitamos php
    $string = str_ireplace("<?php", "", $string);
    $string = str_ireplace("?>", "", $string);
                        // demas
    $string = str_ireplace("--", "", $string);
    $string = str_ireplace("^", "", $string);
    $string = str_ireplace("<", "", $string);
    $string = str_ireplace("[", "", $string);
    $string = str_ireplace("]", "", $string);
    $string = str_ireplace("==", "", $string);
    $string = str_ireplace(";", "", $string);
    $string = str_ireplace("::", "", $string);
    // devuelta trim y stripslashes con la cadena limpia
    $string = trim($string);
    $string = stripslashes($string);

    return $string;
}
// ejemplo utilizacion
// $text = " Hola <script>js::</script>";
// echo clean_string($text);
// salida: "Hola js"




// funcion renombrar fotos
function rename_image($name){
    $name=str_ireplace(" ", "_", $name);
    $name=str_ireplace("/", "_", $name);
    $name=str_ireplace("#", "_", $name);
    $name=str_ireplace("-", "_", $name);
    $name=str_ireplace("$", "_", $name);
    $name=str_ireplace(".", "_", $name);
    $name=str_ireplace(",", "_", $name);
    // numero random para evitar conflictos de nombres iguales
    // de mas de una foto. se podria resolver de otra forma mas
    // efectiva. porque todavia existe la posibilidad de repeticion,
    // aunque mucho menor.
    $name=$name."_".rand(0,100);

    return $name;
}
//ejemplo de uso
// $img_name = "Play Station 5 slim/edition";
// echo rename_image($img_name);

?>
