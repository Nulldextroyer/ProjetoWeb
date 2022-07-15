<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once "../command\acaoEditora.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $editora = new Editora(1,"","","");
    if ($acao == "editar"){
        $editora = buscar($_GET['idEditora']);
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/formStyle.css">
    <title>Cadastrar Editora</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="../assets/img/undraw_bookshelves_re_lxoy.svg" alt="">
        </div>
        <div class="form">
            <form action="../command/acaoEditora.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastrar Editora</h1>
                    </div>
                    <div class="login-button">
                        <button disabled><a href="formLivro.php">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                   
                    <div class="input-box">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite o nome da editora" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $editora->getNome(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box" style="margin-left: 10px">
                        <label>Cnpj</label>
                        <input type="text" name="cnpj" placeholder="Digite o cnpj da empresa" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $editora->getCnpj(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box">
                        <label>Numero telefone</label>
                        <input type="text" name="numeroTelefone" placeholder="Digite o estado do livro" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $editora->getNumeroTelefone(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box" style="display : none">
                        <label>Id Condição</label>
                        <input type="text" name="idEditora"
                        value="<?php if ($acao == "editar") 
                            echo $editora->getIdEditora(); 
                         else 
                            echo 0;?>" readonly>
                    </div>
                    
                </div>

                <div class="continue-button">
                    <button type="submit" name="acao" value="salvar">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>