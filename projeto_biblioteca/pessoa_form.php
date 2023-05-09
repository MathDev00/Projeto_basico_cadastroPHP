<?php

require_once 'C:\xampp\htdocs\aplicacao_banco_de_dados\projeto_biblioteca/Livro.php';
require_once 'C:\xampp\htdocs\aplicacao_banco_de_dados\projeto_biblioteca/Genero.php';

$livro = [];
$livro['id']        = '';
$livro['nomeLivro']      = '';
$livro['nomeAutor']  = '';
$livro['editora']    = '';
$livro['id_genero'] = '';





if (!empty($_REQUEST['action']))
{

    try {
    if ($_REQUEST['action'] == 'edit')
    {
        if (!empty($_GET['id']))
        {
            $id = (int) $_GET['id'];
           $livro = Livro:: find($id);
        }
    }
    else if ($_REQUEST['action'] == 'save')
    {
        $id        = $_POST['id'];
        $livro    = $_POST;
        
        Livro::save($id);
        
    }

    }

    catch (Exception $e)

    {

        print $e->getMessage();

    }
}

$genero = '';

foreach ( Genero::all() as $genero) 

{

    $id = $genero ['id'];
    $nome = $genero ['nome'];

    $check = ($genero ['id'] == $pesssoa ['id_genero']? 'selected=1') : '';
    $genero.= "<option {$check} value ='{$id}'> {$nome} </option>";
}

$form = file_get_contents('html/form.html');
$form = str_replace( '{id}',        $livro['id'],       $form);
$form = str_replace( '{nome}',      $livro['nome'],     $form);
$form = str_replace( '{endereco}',  $livro['endereco'], $form);
$form = str_replace( '{bairro}',    $livro['bairro'],   $form);
$form = str_replace( '{telefone}',  $livro['telefone'], $form);
$form = str_replace( '{email}',     $livro['email'],    $form);
$form = str_replace( '{id_cidade}', $livro['id_cidade'],$form);
$form = str_replace( '{cidades}',   $cidades,            $form);

print $form;

?>
