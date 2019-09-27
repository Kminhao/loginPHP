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
                <h5 class="card-header">Alterar senha</h5>
                <?php
                    if(isset($_SESSION['key'])){
                ?>
                <div class="card-body">
                    <form action="confirmar_alteracao.php" method="POST">
                        <input type="text" hidden value="<?php echo $_SESSION['key'] ?>" name="key">
                        <div class="form-group">
                            <label clafor="senha">Nova senha:</label>
                            <input type="password" class="form-control" required name="senha" placeholder="Insira a nova senha">
                        </div>
                        <div class="form-group">
                                <label clafor="senha2">Senha:</label>
                                <input type="password" class="form-control" name="senha2" required placeholder="Insira novamente a senha">
                        </div>
                        <div class="row justify-content-end mt-3 mr-1">
                            <button type="submit" required name="btnLogin" value="1" class="btn btn-primary">Confirmar</button>
                        </div>
                    </form>
                </div>
                <?php
                    unset($_SESSION['key']);
                    }else{
                ?>
                    <div class="card-body">
                        <h5>Sessão expirada ou link invalido</h5>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>