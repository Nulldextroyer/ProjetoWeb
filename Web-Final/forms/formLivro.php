<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once "../command/acaoLivro.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $livro = new Livro(1,"","",0,0,0,0);
    if ($acao == "editar"){
        $livro = buscar($_GET['idLivro']);
    }
    
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/formStyle.css">
    <title>Cadastrar Livro</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="../assets/img/undraw_bookshelves_re_lxoy.svg" alt="">
        </div>
        <div class="form">
            <form action="../command/acaoLivro.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastrar Livro</h1>
                    </div>
                    <div class="login-button">
                        <button disabled><a href="../index.php">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label>Titulo</label>
                        <input type="text" name="titulo" placeholder="Digite o titulo do livro" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $livro->getTitulo(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box">
                        <label>Data de Publição</label>
                        <input type="date" name="dataPublicacao" autocomplete="off" required
                        value="<?php if ($acao == "editar") 
                            echo $livro->getDataPublicacao(); 
                         else 
                            echo "";?>">
                    </div>

                    <div class="input-box">
                        <label>Autor(a)</label>
                        <select name="idAutor">
                            <option disabled selected hidden>Selecione o autor</option>
                            <?php
                                $pdo = Conexao::getInstance(); 
                                $consulta = $pdo->query("SELECT * FROM autores ORDER BY idAutor");
                                                        
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                            ?>
                            <option value="<?php echo $linha['idAutor'] ?>"><?php echo $linha['nomeCompleto'] ?></option>

                            <?php }?>
                        </select>
                        <div class="confirmation-button" style="text-align: right">
                            <button disabled><a href="formAutor.php">Adicionar</a></button>
                        </div>
                    </div>

                    <div class="input-box">
                        <label>Editora</label>
                        <select name="idEditora">
                            <option disabled selected hidden>Selecione a editora</option>
                            <?php
                                $pdo = Conexao::getInstance(); 
                                $consulta = $pdo->query("SELECT * FROM editoras ORDER BY idEditora");
                                                        
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                            ?>
                            <option value="<?php echo $linha['idEditora'] ?>"><?php echo $linha['nome'] ?></option>

                            <?php }?>
                        </select>
                        <div class="confirmation-button" style="text-align: right">
                            <button disabled><a href="formEditora.php">Adicionar</a></button>
                        </div>
                    </div>

                    <div class="input-box">
                        <label>Gênero</label>
                        <select name="idGenero">
                            <option disabled selected hidden>Selecione o gênero</option>
                            <?php
                                $pdo = Conexao::getInstance(); 
                                $consulta = $pdo->query("SELECT * FROM generos ORDER BY idGenero");
                                                        
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                            ?>
                            <option value="<?php echo $linha['idGenero'] ?>"><?php echo $linha['classificacao'] ?></option>

                            <?php }?>
                        </select>
                        <div class="confirmation-button" style="text-align: right">
                            <button disabled><a href="formGenero.php">Adicionar</a></button>
                        </div>
                    </div>

                    <div class="input-box">
                        <label>Estado do Livro</label>
                        <select name="idCondicao">
                            <option disabled selected hidden>Selecione uma condição</option>
                            <?php
                                $pdo = Conexao::getInstance(); 
                                $consulta = $pdo->query("SELECT * FROM condicoes ORDER BY idCondicao");
                                                        
                                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                            ?>
                            <option value="<?php echo $linha['idCondicao'] ?>"><?php echo $linha['condicao'] ?></option>

                            <?php }?>
                        </select>
                        <div class="confirmation-button" style="text-align: right">
                            <button disabled><a href="formCondicao.php">Adicionar</a></button>
                        </div>
                    </div>

                    <div class="input-box" style="display : none">
                        <label>Id Livro</label>
                        <input type="text" name="idLivro"
                        value="<?php if ($acao == "editar") 
                            echo $livro->getIdLivro(); 
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