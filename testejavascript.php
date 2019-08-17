<meta charset="UTF-8">
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
?>
<script type="text/javascript">
function calc()
{
  var a = total.value;
  var b = valor.value;

  total.value = a * 2.40;
}
</script>



<form id="formulario">
    Valor: <input type="tex" id="valor" onkeypress="calc()"><br/><br/>
    Total: <input type="text" id="total">
</form>