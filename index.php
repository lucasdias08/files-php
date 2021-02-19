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
                    <input type="text" id="txtNome" name="nome" required>
                </div>
                <div>
                    <label for="txtEmail">e-mail</label>
                    <input type="email" id="txtEmail" name="email" required>
                </div>
                <div>
                    <label for="txtSenha">Senha</label>
                    <input type="password" id="txtSenha" name="senha" required>
                </div>
                <div>
                    <input type="submit" id="bttCad" value="cadastrar" onmouseover='document.getElementById("bttCad").style.cursor = "pointer";'>
                </div>
            </form>

            <form id="form-edit" class="form-edit-no-visible" action="bd/editar-usuario.php" method="post">
                <div>
                    <label for="txtNome2">Nome</label>
                    <input type="text" id="txtNome2" name="nome" required>
                </div>
                <div>
                    <label for="txtEmail2">e-mail</label>
                    <input type="email" id="txtEmail2" name="email" required>
                </div>
                <div>
                    <label for="txtSenha2">Senha</label>
                    <input type="password" id="txtSenha2" name="senha" required>
                </div>
                <div id="container-btt">
                    <button type="submit" id="bttEditar" onmouseover='document.getElementById("bttEditar").style.cursor = "pointer";'>Editar</button>
                    <button id="bttCancel" onmouseover='document.getElementById("bttCancel").style.cursor = "pointer";'>Cancelar</button>
                    
                    <!-- achei necessário criar esse input "secreto"-->
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

                    // variável fundamental. Ela é inicializada e incrementada a medida que é renderizado um item
                    $i = 0;
                    foreach($usuarios as $usuario){
                    
                        //código para pegar pelo ID
                        echo "<li id=position-" . $i . ">";
                            
                        echo $usuario;

                        echo "<img src='/img/mode_edit_outline-24px.svg' alt='edit-button' onclick='openEdition(" . $i . ")'>";
                        echo "<a href='bd/deletar-usuario.php?id=". $i ."'><img src='/img/delete_forever-24px.svg' alt='delete-button' ></a>";

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
    <script src="./js/front-code.js"></script>
</body>
</html>