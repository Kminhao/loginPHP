<?php
    session_start();
    
    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

    if($btnLogin){
        $usuario = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        
        if((!empty($usuario)) AND (!empty($senha))){
            $_SESSION['msg'] = "EAE GABIRU";
            header("Location: index.php");
        }else{
            $_SESSION['msg'] = "Preencha todos os campos";
            header("Location: index.php");
        }
    }else{
        $_SESSION['msg'] = "Página não encontrada";
        header("Location: index.php");
    }
?>