<?php
    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

    if($btnLogin){
        $usuario = filter_input(INPUT_POST, 'email', 'FILTER_SANITIZE_STRING');
        $senha = filter_input(INPUT_POST, 'senha', 'FILTER_SANITIZE_STRING');
        echo $usuario - $senha;
    }else{
        $_SESSION['msg'] = "Página não encontrada";
        header("Location: index.html");
    }
?>