<?php
    session_start();
    include_once("conexao.php");
    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

    if($btnLogin){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        if((!empty($usuario)) AND (!empty($senha))){
            $result = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
            $resultado_usuario = mysqli_query($conn, $result);
            if($resultado_usuario){
                $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                if(password_verify($senha, $row_usuario['senha'])){
                    echo "Login realizado com sucesso!";
                }else{
                    $_SESSION['msg'] = "Senha incorreta";
                    header("Location: index.php");
                }
            }else{
                $_SESSION['msg'] = "Email incorreto";
                    header("Location: index.php");
            }
        }else{
            $_SESSION['msg'] = "Preencha todos os campos";
            header("Location: index.php");
        }
    }else{
        $_SESSION['msg'] = "Página não encontrada";
        header("Location: index.php");
    }
?>