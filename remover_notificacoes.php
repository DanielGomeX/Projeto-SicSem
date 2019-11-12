<?php

session_start();
require './config/conexao.php';
require './pages/header.php';

if (isset($_SESSION['email']) && empty($_SESSION['email']) == FALSE) {
    if (isset($_SESSION['senha']) && empty($_SESSION['senha']) == FALSE) {
        
    }
} else {
    header("Location:login.php");
    exit();
}

if (isset($_GET['codigo_notificacao']) && empty($_GET['codigo_notificacao']) == FALSE) {
    $codigo = $_GET['codigo_notificacao']; /* link dinamico utilizando o get */

    $sql = "DELETE FROM tb_notificacao WHERE codigo_notificacao = $codigo";
    $exe_sql = mysqli_query($con, $sql);
    
    if (mysqli_affected_rows($con)>0) {
        $_SESSION['msg'] = "<div class='alert alert-success text-center' role='alert'><strong>NOTIFICACÃO EXCLUÍDA COM SUCESSO!</strong></div>";
        header("Location: exibe_notificacoes.php");
    } else {
       $_SESSION['msg'] = "<div class='alert alert-danger text-center' role='alert'><strong>ERRO A NOTIFICACÃO NÃO PODE SER APAGADA, CONSULTE O ADMINISTRADOR DA BASE DE DADOS!</strong></div>";
        header("Location: exibe_notificacoes.php");
    }
}




    