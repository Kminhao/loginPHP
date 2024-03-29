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
    <title>Login SEGA6</title>
</head>
<body>
    <div class="row justify-content-center mt-5">
        <div class="col-3">
            <div class="card">
                <h5 class="card-header">Login</h5>
                <div class="card-body">
                    <form action="validacao.php" method="POST">
                        <div class="form-group">
                            <label clafor="email">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Insira seu email aqui">
                        </div>
                        <div class="form-group">
                                <label clafor="email">Senha:</label>
                                <input type="password" class="form-control" name="senha" required placeholder="Insira sua senha aqui">
                        </div>
                            <a href="recuperar.php">Esqueci minha senha</a><br>
                            <a href="cadastro.php">Cadastre-se</a>
                        <div class="row justify-content-end mt-3 mr-1">
                            <button type="submit" required name="btnLogin" value="1" class="btn btn-primary">Acessar</button>
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