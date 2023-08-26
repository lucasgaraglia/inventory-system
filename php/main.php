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




// funcion paginador de tablas
// parametros (pagina_actual, paginas totales, url, cantidad_de_botones_mostrados)
// la url seria con el ?page=N al final.
function table_pagination($active_page, $total_pages, $url, $buttons){
    $tabla = '<nav class="pagination is-centered is-rounded" role="navigation" arial-label="pagination">';

    // si la pagina activa es la 1, agrego el boton previous, pero deshabilitado. (is-disabled en la clase, y atributo disabled)
    // en caso contrario, agrego el boton habilitado
    if($active_page <= 1){
        $tabla.='
        <a class="pagination-previous is-disabled" disabled href="#">Previous</a>
        <ul class="pagination-list">';
    }else{
        $tabla.='
        <a class="pagination-previous" href="'.$url.($active_page-1).'">Previous</a>
        <ul class="pagination-list">
            <li><a class="pagination-link" href="'.$url.'1">1</a></li>
            <li><span class="pagination-ellipsis">&hellip;</span></li> 
        ';
    }

    // contador de iteraciones
    // este for es para contar los botones que se muestran a partir de la pagina en la
    // que nos encontramos
    $ci = 0;
    for($i=$active_page; $i<=$total_pages; $i++){
        if($ci>=$buttons){
            break;
        }

        if($active_page==$i){
                                    // is-current para que se vea oscuro
            $table.='
            <li><a class="pagination-link is-current" href="'.$url.$i.'">.'$i'.</a></li>
            ';
        }else{
            $table.='
            <li><a class="pagination-link" href="'.$url.$i.'">.'$i'.</a></li>
            ';
        }

        $ci++;

    }

    // lo mismo, pero para el boton de next
    if($active_page >= $total_pages){
        $tabla.='
        </ul>
        <a class="pagination-next is-disabled" disabled>Next</a>
        ';
    }else{
            // el &hellip son puntitos que dividen los botones del ultimo y del primero
        $tabla.='
            <li><span class="pagination-ellipsis">&hellip;</span></li>
            <li><a class="pagination-link" href="'.$url.$total_pages.'">'.$total_pages.'</a></li>
        </ul>
        <a class="pagination-next" href="'.$url.($active_page+1).'">Next</a>
        ';
    }

    // .= para concatenar
    $tabla.='</nav>';
    return $tabla;
}

?>
