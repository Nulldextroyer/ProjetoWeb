<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once "acaoLivro.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $livro = new Livro(1,"","","","","","");
    
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/formStyle.css">
    <title>Cadastrar Livro</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/undraw_bookshelves_re_lxoy.svg" alt="">
        </div>
        <div class="form">
            <form action="acaoLivro.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastrar Livro</h1>
                    </div>
                    <div class="login-button">
                        <button disabled><a href="index.php">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label>Titulo</label>
                        <input type="text" name="titulo" placeholder="Digite o titulo do livro" autocomplete="off" required>
                    </div>

                    <div class="input-box">
                        <label>Autor</label>
                        <input type="text" name="autor" placeholder="Digite o nome do autor" autocomplete="off" required>
                    </div>

                    <div class="input-box">
                        <label>Editora</label>
                        <input type="text" name="editora" placeholder="Digite a editora do livro" autocomplete="off" required>
                    </div>

                    <div class="input-box">
                        <label>Data de Publição</label>
                        <input type="date" name="dataPublicacao" autocomplete="off" required>
                    </div>

                    <div class="input-box">
                        <label>Gênero</label>
                        <select name="genero">
                            <option disabled selected hidden>Selecione o gênero</option>
                            <option value="Romance">Romance</option>
                            <option value="Suspence">Suspence</option>
                            <option value="Crime">Crime</option>
                        </select>
                        <div class="confirmation-button" style="text-align: right">
                            <button><a href="index.php">Adicionar Gênero</a></button>
                        </div>
                    </div>

                    <div class="input-box">
                        <label>Estado do Livro</label>
                        <select name="condicao">
                            <option disabled selected hidden>Selecione a condição</option>
                            <option value="Perfeito">Perfeito</option>
                            <option value="Otimo">Otimo</option>
                            <option value="Ruim">Ruim</option>
                        </select>
                        <div class="confirmation-button" style="text-align: right">
                            <button><a href="index.php">Adicionar Condição</a></button>
                        </div>
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