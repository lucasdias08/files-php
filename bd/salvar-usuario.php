<?php
    //print_r($_POST);
    
    $salvar = true;

    if(!isset($_POST["nome"])){
        $salvar = false;
    }

    if(!isset($_POST["email"])){
        $salvar = false;
    }
    
    if(!isset($_POST["senha"])){
        $salvar = false;
    }

    if($salvar){
        $banco = fopen("usuario.bd", "a");
        fwrite($banco, $_POST["nome"] . "," . $_POST["email"] . "," . $_POST["senha"] . "\r\n");

        fclose($banco);
    }

    header("location: ../index.php");
?>