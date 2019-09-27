<?php
    session_start();
    include_once("conexao.php");
        if(isset($_GET['code'])){
            $hash = $_GET['code'];
            //Retorna a query apenas se a hash não foi criada há mais de 30 minutos
            $query = "SELECT id FROM recuperacao WHERE recovery_hash = '$hash' AND TIMESTAMPDIFF(MINUTE, created_at, current_timestamp()) <= 30  LIMIT 1";
            $run = mysqli_query($conn, $query);
            if($run){
                if(mysqli_num_rows($run) > 0){
                    $row = mysqli_fetch_assoc($run);
                     $_SESSION['key'] = $hash;
                     header("Location: alterar_senha.php");
                }else{
                    $_SESSION['msg'] = "Link invalido ou expirado";
                    header("Location: index.php");
                }
            }else{
                echo "Link invalido ou expirado";
            }
        }

?>