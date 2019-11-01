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

if (isset($_GET['codigo_licenca']) && empty($_GET['codigo_licenca']) == FALSE) {
    $codigo = $_GET['codigo_licenca']; /* link dinamico utilizando o get */

    $sql = "DELETE FROM tb_licenca WHERE codigo_licenca = $codigo";
    $exe_sql = mysqli_query($con, $sql);
    header("Location:exibe_licencas.php");
} else {
    header("Location:editar.php");
}




    