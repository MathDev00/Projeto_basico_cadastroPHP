<?php

require_once 'C:\xampp\htdocs\aplicacao_banco_de_dados\projeto_biblioteca/Livro.php';


try 

{

if ( !empty($_GET['action']) and ($_GET['action'] == 'delete'))

{
    $id = (int) $_GET['id'];
   
    Livro::delete($id);
}

}

catch (Exception $e)

{

    print $e->getMessage();

}



$livros = Livro::all();

$items = '';
if ($livros)

{
    foreach ($livros as $livro)

    {  
        $item = file_get_contents('html/item.html');
        $item = str_replace( '{id}',    $livro['id'], $item);
        $item = str_replace( '{nomeLivro}',    $livro['nomeLivro'], $item);
        $item = str_replace( '{nomeAutor}',    $livro['nomeAutor'], $item);
        $item = str_replace( '{editora}',    $livro['editora'], $item);
        
        $items .= $item;
    }
}

$list = file_get_contents('html/list.html');
$list = str_replace('{items}',   $items, $list);

print $list;
?>
