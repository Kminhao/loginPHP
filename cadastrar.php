<?php
    session_start();
    include_once("conexao.php");
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $dn = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);

        if((!empty($email)) AND (!empty($senha)) AND (!empty($nome)) AND (!empty($dn))){
            $query = "INSERT INTO usuario (nome, email, senha, data_nascimento) values ('$nome', '$email','". password_hash($senha, PASSWORD_DEFAULT). "' , '$dn')";
            $run = mysqli_query($conn, $query);
            if(!$run){
                $_SESSION['msg'] = 'Erro no cadastro';
                header("Location: cadastro.php");
            }else{
                $_SESSION['msg'] = "Usuário cadastrado com sucesso!";
                header("Location: index.php");
            }
        }else{
            $_SESSION['msg'] = "Preencha todos os campos";
            header("Location: cadastro.php");
        }
?>