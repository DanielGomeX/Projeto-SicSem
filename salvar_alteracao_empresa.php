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

//if (isset($_POST['razaosocial_pessoafisica']) && empty($_POST['razaosocial_pessoafisica']) == FALSE) {
//    if (isset($_POST['nome_fantasia']) && empty($_POST['nome_fantasia']) == FALSE) {
//        if (isset($_POST['pessoa_fisicajuridica']) && empty($_POST['pessoa_fisicajuridica']) == FALSE) {
//            if (isset($_POST['cnpj_cpf']) && empty($_POST['cnpj_cpf']) == FALSE) {
//                if (isset($_POST['cep']) && empty($_POST['cep']) == FALSE) {
//                    if (isset($_POST['logradouro']) && empty($_POST['logradouro']) == FALSE) {
//                        if (isset($_POST['uf']) && empty($_POST['uf']) == FALSE) {
//                            if (isset($_POST['municipio']) && empty($_POST['municipio']) == FALSE) {
//                                if (isset($_POST['bairro']) && empty($_POST['bairro']) == FALSE) {
//                                    if (isset($_POST['telefone']) && empty($_POST['telefone']) == FALSE) {

$codigo_empresa = strtoupper(addslashes($_POST['codigo_empresa']));
$razaosocial_pessoafisica = strtoupper(addslashes($_POST['razaosocial_pessoafisica']));
$nome_fantasia = strtoupper(addslashes($_POST['nome_fantasia']));
$pessoa_fisicajuridica = strtoupper(addslashes($_POST['pessoa_fisicajuridica']));
$cnpj_cpf = strtoupper(addslashes($_POST['cnpj_cpf']));
$cep = strtoupper(addslashes($_POST['cep']));
$logradouro = strtoupper(addslashes($_POST['logradouro']));
$numero = strtoupper(addslashes($_POST['numero']));
$complemento = strtoupper(addslashes($_POST['complemento']));
$localizacao_map = (addslashes($_POST['localizacao_map']));
$uf = strtoupper(addslashes($_POST['uf']));
$municipio = strtoupper(addslashes($_POST['municipio']));
$bairro = strtoupper(addslashes($_POST['bairro']));
$email = strtoupper(addslashes($_POST['email']));
$telefone = strtoupper(addslashes($_POST['telefone']));

$sql = "UPDATE tb_empresa SET razaosocial_pessoafisica='$razaosocial_pessoafisica',nome_fantasia='$nome_fantasia',pessoa_fisicajuridica='$pessoa_fisicajuridica',cnpj_cpf='$cnpj_cpf',cep='$cep',logradouro='$logradouro',numero='$numero',uf='$uf',complemento='$complemento',localizacao_map='$localizacao_map',municipio='$municipio',bairro='$bairro',email='$email',telefone='$telefone' WHERE codigo_empresa='$codigo_empresa'";
mysqli_query($con, $sql);
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <h4 class="modal-title text-center" id="myModalLabel"><strong>EMPRESA / PESSOA FÍSICA ALTERADA COM SUCESSO!<br><br><P style="text-align: center">AGUARDE UM MOMENTO</strong></P></h4>
                <script type="text/javascript">
                    setTimeout('window.location.href="exibe_contribuintes.php"', 3500);
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





