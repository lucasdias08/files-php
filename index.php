<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquivos em PHP</title>
    <link rel="stylesheet" href="css/base.css">
</head>
<body>
    <h1>Arquivos em PHP</h1>
    <main>
        <section>
            <form id="form-cad" action="bd/salvar-usuario.php" method="post">
                <div>
                    <label for="txtNome">Nome</label>
                    <input type="text" id="txtNome" name="nome">
                </div>
                <div>
                    <label for="txtEmail">e-mail</label>
                    <input type="email" id="txtEmail" name="email">
                </div>
                <div>
                    <label for="txtSenha">Senha</label>
                    <input type="password" id="txtSenha" name="senha">
                </div>
                <div>
                    <input type="submit" value="cadastrar">
                </div>
            </form>

            <form id="form-edit" class="form-edit-no-visible" action="bd/editar-usuario.php" method="post">
                <div>
                    <label for="txtNome2">Nome</label>
                    <input type="text" id="txtNome2" name="nome">
                </div>
                <div>
                    <label for="txtEmail2">e-mail</label>
                    <input type="email" id="txtEmail2" name="email">
                </div>
                <div>
                    <label for="txtSenha2">Senha</label>
                    <input type="password" id="txtSenha2" name="senha">
                </div>
                <div id="container-btt">
                    <button type="submit">Editar</button>
                    <button>Cancelar</button>
                    <input type="hidden" id="txti" name="i">
                </div>
            </form>
        </section>
        <section>
            <h2>Itens</h2>
            <ol>
                
                <?php
                    include_once "./bd/listar-usuario.php";

                    $usuarios = getUsuarios();

                    $i = 0;
                    foreach($usuarios as $usuario){
                    
                        //código para pegar pelo ID
                        echo "<li id=position-" . $i . ">";
                            
                        echo $usuario;

                        echo "<img src='/img/mode_edit_outline-24px.svg' alt='edit-button' onclick='openEdition(" . $i . ")'>";
                        echo "<img src='/img/delete_forever-24px.svg' alt='delete-button' onclick='closeEdition(" . $i . ")'>";

                        $i++;
                    }

                    $i = null;

                    echo "</li>";
                ?>
        
            </ol>
        </section>
    </main>
    <footer>
        <p>Elaborado por @_lucasdias08</p>
        <p>Todos os direitos concedidos</p>
    </footer>
    <script>

        function openEdition(i){
            //var idIt = document.getElementById(idItem);
            
            document.getElementById("form-edit").classList.remove("form-edit-no-visible");
            document.getElementById("form-cad").classList.add("form-edit-no-visible");

            //alert(document.getElementById("position-" + i).textContent);

            var line = document.getElementById("position-" + i).textContent;
            var arr = line.split(',');

            //alert(arr[0]);

            document.getElementById("txtNome2").value = arr[0];
            document.getElementById("txtEmail2").value = arr[1];
            document.getElementById("txtSenha2").value = arr[2];
            document.getElementById("txti").value = i;

            alert(document.getElementById("txti").value);
        }

        function closeEdition(){

            //var idIt = document.getElementById(idItem);

            document.getElementById("form-cad").classList.remove("form-edit-no-visible");
            document.getElementById("form-cad").classList.add("form-edit-visible");

            document.getElementById("form-edit").classList.remove("form-edit-visible");
            document.getElementById("form-edit").classList.add("form-edit-no-visible");
        }
    </script>
</body>
</html>