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

if (isset($_GET['codigo_processo']) && empty($_GET['codigo_processo']) == FALSE) {
    $codigo = $_GET['codigo_processo']; /* link dinamico utilizando o get */

    $sql = "DELETE FROM tb_processo WHERE codigo_processo = $codigo";
    $exe_sql = mysqli_query($con, $sql);
    
    if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
		header("Location: exibe_processo.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: exibe_processo.php");
        }
}





    