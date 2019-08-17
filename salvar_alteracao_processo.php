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


$codigo_processo = strtoupper(addslashes($_POST['codigo_processo']));
$empresa = strtoupper(addslashes($_POST['empresa']));
$numero_processo = strtoupper(addslashes($_POST['numero_processo']));
$ano = strtoupper(addslashes($_POST['ano']));
$data_processo = strtoupper(addslashes($_POST['data_processo']));
$assunto = strtoupper(addslashes($_POST['assunto']));
$situacao_processo = strtoupper(addslashes($_POST['situacao_processo']));
$motivo_situacao = strtoupper(addslashes($_POST['motivo_situacao']));



$sql = "UPDATE tb_processo SET numero_processo='$numero_processo',ano='$ano',data_processo='$data_processo',assunto='$assunto',situacao_processo='$situacao_processo',motivo_situacao='$motivo_situacao' WHERE codigo_processo='$codigo_processo'";
mysqli_query($con, $sql);
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <h4 class="modal-title text-center" id="myModalLabel"><strong>PROCESSO ALTERADO COM SUCESSO!<br><br><P style="text-align: center">AGUARDE UM MOMENTO</strong></P></h4>
                <script type="text/javascript">
                    setTimeout('window.location.href="exibe_processo.php"', 3500);
                </script>
            </div>
            
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#myModal').modal('show');
    });
</script>





