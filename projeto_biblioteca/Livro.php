<?php

class Livro 

{

    public static function find ($id) 
    
    {

        $host = "localhost";
        $banco = "livro";
        $usr = "root";
        $pwd = "";


        $conn = new PDO ("mysql: host=" .$host. "; dbname = ".$banco, $usr, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
       

        $result = $conn->query("SELECT * FROM livro WHERE id = '{$id}'");
        return $result->fetch(); // uma unica row resultante da consulta

    }

    public static function delete ($id)

    {
        $host = "localhost";
        $banco = "livro";
        $usr = "root";
        $pwd = "";


        $conn = new PDO ("mysql: host=" .$host. "; dbname = ".$banco, $usr, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
       

        $result = $conn->query("DELETE FROM livro WHERE id = '{$id}'");
        return $result;


    }

    public static function all ()


    {

        $host = "localhost";
        $banco = "livro";
        $usr = "root";
        $pwd = "";


        $conn = new PDO ("mysql:host=".$host."; dbname=".$banco, $usr, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
       

        $result = $conn->query("SELECT * FROM livro ORDER BY id");
        

        return $result->fetchAll(); //todos os registros



    }

    public static function save ($livro) 
    
    
    {

        $host = "localhost";
        $banco = "livro";
        $usr = "root";
        $pwd = "";


        $conn = new PDO ("mysql: host=" .$host. "; dbname = ".$banco, $usr, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
       

        if (empty($liro ['id'])) 
        
        {

            $result = $conn->query ("SELECT max(id) as next FROM livro");
            $row = $result->fetch();
            $pessoa ['id'] = (int) $row ['next'] + 1;

    
            $sql = "INSERT INTO livro (id, nomeLivro, nomeAutor, editora, id_genero)
                                VALUES ( '{$livro['id']}', '{$livro['nomeLivro']}', '{$livro['nomeAutor']}',
                            '{$livro['editora']}','{$livro['id_genero']}')";
      



        }
        
        else 
        
        {

            $sql = "UPDATE livro SET nomeLivro = '{$livro['nomeLivro']}',
            nomeAutor = '{$livro['nomeAutor']}',
            editora = '{$livro['editora']}',
            id_genero = '{$livro['id_genero']}'
  WHERE id = '{$livro['id']}'";

        }

        return $conn->query($sql);

    }

}

?>

