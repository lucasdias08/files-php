<?php

    include_once "./listar-usuario.php";

    $salvar = true;
    $position = $_POST["i"];
    $nomeNovo = $_POST["nome"];
    $emailNovo = $_POST["email"];
    $senhaNova = $_POST["senha"];

    // usuários recebe o arquivo em array
    $usuarios = getUsuarios();

    //usuário antigo é trocado pelo novo, editado pelo form de edição
    // usuário antigo é reconhecido devido a manipulação do "i"
    $usuarios[$position] = $nomeNovo . "," . $emailNovo . "," . $senhaNova;

    if(!isset($_POST["nome"])){
        $salvar = false;
    }

    if(!isset($_POST["email"])){
        $salvar = false;
    }

    if(!isset($_POST["senha"])){
        $salvar = false;
    }

    if(!isset($_POST["i"])){
        $salvar = false;
    }

    //apaga o arquivo existente antes de refazê-lo, obedecendo a troca de usuários de mesmo "i".
    unlink("usuario.bd");

    if($salvar){
        foreach($usuarios as $usuario){
            
            $banco = fopen("usuario.bd", "a");
            fwrite($banco, trim($usuario) . "\n");
            fclose($banco);
        
        }

    }

    header("location: ../index.php");

?>