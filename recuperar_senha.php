<?php
    session_start();
    include_once("conexao.php");

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

        if((!empty($email))){
            $query = "SELECT id, email FROM usuario WHERE email = '$email' LIMIT 1";
            $run = mysqli_query($conn, $query);
            if($run){
                if(mysqli_num_rows($run) > 0){
                    $row = mysqli_fetch_assoc($run);
                    //Gerar hash de verificação que após 30 minutos não poderá mais ser utilizado
                    $idUsuario = $row['id'];
                     $hash = password_hash($idUsuario . 'secret' . date(DATE_RFC822)  ,PASSWORD_DEFAULT);
                     $query = "INSERT INTO recuperacao (usuario_id, recovery_hash) values ($idUsuario, '$hash')";
                     $run = mysqli_query($conn, $query);

                     if(!$run){
                        echo mysqli_error($run);
                        $_SESSION['msg'] = "Erro no servidor";
                        header("Location: index.php");
                    }else{
                        $_SESSION['hash_ok'] = "Hash enviado com sucesso!";
                        mail($email, 'Recuperação de Senha', 'http://localhost/validar_hash.php?code=' . $hash);
                        header("Location: recuperar.php");
                    }
                }else{
                    $_SESSION['msg'] = 'E-mail não encontrado';
                    header("Location: recuperar.php");
                }
            }
            else{
                $_SESSION['msg'] = 'Erro';
                header("Location: recuperar.php");
            }
        }else{
            $_SESSION['msg'] = "Preencha todos os campos";
            header("Location: recuperar.php");
        }
        // CREATE TABLE seg.recuperacao(
        //     id int not null auto_increment primary key,
        //     usuario_id int not null,
        //     recovery_hash varchar(256) not null,
        //     created_at date not null,
        //     foreign key(usuario_id) references usuario(id)
        // );

?>