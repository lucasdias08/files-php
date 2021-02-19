<?php

    include_once "./listar-usuario.php";

    $salvar = true;
    $position = $_POST["i"];
    $nomeNovo = $_POST["nome"];
    $emailNovo = $_POST["email"];
    $senhaNova = $_POST["senha"];

    $newLine = [$nomeNovo, $emailNovo, $senhaNova];

    $usuarios = getUsuarios();

    $usuarios[$position] = $nomeNovo . "," . $emailNovo . "," . $senhaNova;
    
    print_r($usuarios);
    

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

    unlink("usuario.bd");

    if($salvar){

        foreach($usuarios as $usuario){
            

            if($usuario == end($usuarios)){
                $banco = fopen("usuario.bd", "a");
                
                fwrite($banco, trim($usuario));
                
                fclose($banco);    
                
            } else {
                $banco = fopen("usuario.bd", "a");

                fwrite($banco, trim($usuario) . "\n");
                fclose($banco);
            }
            
        }

    }

    header("location: ../index.php");    

?>