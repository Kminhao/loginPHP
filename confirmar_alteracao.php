<?php
    session_start();
    include_once("conexao.php");
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $senha2 = filter_input(INPUT_POST, 'senha2', FILTER_SANITIZE_STRING);
        $key = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);

        if((!empty($senha)) AND (!empty($senha2)) AND (!empty($key))){
            $hashNovaSenha = password_hash($senha, PASSWORD_DEFAULT);
            $query = "UPDATE usuario SET senha = '$hashNovaSenha' WHERE id = (SELECT usuario_id FROM recuperacao WHERE recovery_hash = '$key')";
            $run = mysqli_query($conn, $query);
            if(!$run){
                $_SESSION['msg'] = 'Erro no servidor';
                header("Location: alterar_senha.php");
            }else{
                $_SESSION['msg'] = "Senha alterada com sucesso!";
                header("Location: index.php");
            }
        }else{
            $_SESSION['msg'] = "Preencha todos os campos";
            header("Location: recuperar.php");
        }
?>