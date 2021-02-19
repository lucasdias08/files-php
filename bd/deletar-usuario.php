<?php

    $canRemove = true;

    if(!isset($_GET["id"])){
        $canRemove = false;

    }

    if($canRemove == true){
        $usuarios = file("usuario.bd");

        unset($usuarios[$_GET["id"]]);

        file_put_contents("usuario.bd", $usuarios);

    }

    header("location: ../index.php");

?>