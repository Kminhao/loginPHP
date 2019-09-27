<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cadastro SEGA6</title>
</head>
<body>
    <div class="row justify-content-center mt-5">
        <div class="col-3">
            <div class="row mt-3 mr-1 justify-content-end">
                <a href="index.php"><button class="btn btn-primary mb-2 mr-3">Voltar</button></a>
            </div>
            <div class="card">
                <h5 class="card-header">Cadastro</h5>
                <div class="card-body">
                    <form action="cadastrar.php" method="POST">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" required placeholder="Insira seu nome completo">
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" required name="data_nascimento">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" required placeholder="Insira seu email aqui">
                        </div>
                        <div class="form-group">
                                <label for="email">Senha</label>
                                <input type="password" class="form-control" name="senha" required placeholder="Insira sua senha aqui">
                        </div>
                        <div class="row mt-3 mr-1 justify-content-end">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row text-center">
                    <?php
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                    ?>
                </div>
        </div>
    </div>
</body>
</html>