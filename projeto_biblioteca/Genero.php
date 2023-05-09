<?php

class Genero 

{


    public static function all ()


    {

        $host = "localhost";
        $banco = "livro";
        $usr = "root";
        $pwd = "";


        $conn = new PDO ("mysql: host=" .$host. "; dbname = ".$banco, $usr, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $result = $conn->query("SELECT * FROM livro ORDER BY id");
        return $result->fetchAll(); //todos os registros



    }

}

?>

