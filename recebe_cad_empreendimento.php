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
if (isset($_POST['empresa']) && empty($_POST['empresa']) == FALSE) {

    $empresa = strtoupper(addslashes($_POST['empresa']));
    $nome_atividade = strtoupper(addslashes($_POST['nome_atividade']));
    $nome_empreendimento = strtoupper(addslashes($_POST['nome_empreendimento']));
    $nome_logradouro = strtoupper(addslashes($_POST['nome_logradouro']));
    $numero_empreendimento = strtoupper(addslashes($_POST['numero_empreendimento']));
    $complemento = strtoupper(addslashes($_POST['complemento']));
    $localizacao_map_empre = (addslashes($_POST['localizacao_map_empre']));
    $uf = strtoupper(addslashes($_POST['nome_uf']));
    $municipio = strtoupper(addslashes($_POST['nome_municipio']));
    $bairro = strtoupper(addslashes($_POST['nome_bairro']));
    $atividade_empreendimento = strtoupper(addslashes($_POST['atividade_empreendimento']));
    $grau_atividade = strtoupper(addslashes($_POST['grau_atividade']));
//    $denominacao_comercial = strtoupper(addslashes($_POST['denominacao_comercial']));

    $verifica = "SELECT fk1_codigo_empresa,nome_atividade FROM tb_empreendimento,tb_empresa WHERE tb_empreendimento.fk1_codigo_empresa='" . $_POST['empresa'] . "' AND tb_empreendimento.nome_atividade='" . $_POST['nome_atividade'] . "'";
//        $verifica = "SELECT fk1_codigo_empresa,nome_atividade FROM tb_empreendimento,tb_empresa WHERE tb_empreendimento.fk1_codigo_empresa='" . $_POST['empresa'] . "' AND tb_empreendimento.nome_atividade='" . $_POST['nome_atividade'] . "'";
    $recebe_consulta = mysqli_query($con, $verifica);

    if (mysqli_num_rows($recebe_consulta) > 0 && $nome_atividade != '') {
        ?>
        <script>
            alert('ERRO! ESTA RAZÃO SOCIAL / PESSOA FÍSICA JÁ POSSUI ESTA ATIVIDADE CADASTRADA');
            window.history.back();

        </script>
        <?php
    } else

    if (isset($_POST['empresa'])) {
        $sql = "INSERT INTO tb_empreendimento(fk1_codigo_empresa,nome_atividade,nome_empreendimento,nome_logradouro,numero_empreendimento,complemento,Localizacao_map_empre,nome_uf,nome_municipio,nome_bairro,atividade_empreendimento,grau_atividade)"
                . "VALUES($empresa,UPPER('$nome_atividade'),UPPER('$nome_empreendimento'),UPPER('$nome_logradouro'),'$numero_empreendimento',UPPER('$complemento'),'$localizacao_map_empre','$uf','$municipio','$bairro','$atividade_empreendimento','$grau_atividade')";

        mysqli_query($con, $sql);
//        print_r($sql);
//recuperando o ultimo id do usuario inserido
        $ultimo_cod = mysqli_insert_id($con);
//        echo $ultimo_cod;
        $_SESSION['ultimo_cod'] = $ultimo_cod;


        // O CÓDIGO ABAIXO REGISTRA O USUARIO QUE REALIZOU O CADASTRO DE CERTO EMPRESA / PESSOA FISICA
        $emailUser = $_SESSION['email'];
        $user = $_SESSION['nome'];
        $ip_rem = getenv('REMOTE_ADDR'); //pega o ip da maquina ususario
        $ip_maq = $_SERVER["REMOTE_ADDR"]; //Pego o IP
        $data = Date("Y-m-d H:i:s");
        $acaoUsuario = "Realizou o Cadastro da Atividade / Empreendimento->$nome_atividade,$nome_empreendimento,Para a Empresa de codigo->$empresa";
        $sqlLog = "INSERT INTO tb_controle_usuario(acao,data_acesso,ip_maquina,ip_remoto,email,nome)VALUES(UPPER('$acaoUsuario'),'$data','$ip_maq','$ip_rem','$emailUser','$user')";
        mysqli_query($con,$sqlLog);
        ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
            <div class="modal-dialog btn-success" role="document">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><strong>EMPREENDIMENTO /  ATIVIDADE CADASTRADO COM SUCESSO!<br><br><P style="text-align: center">AGUARDE UM MOMENTO</strong></P></h4>
                </div>
                <div class="modal-footer">
                    <?php if ($_POST['nome_atividade']) {
                        ?>
                        <script type="text/javascript">
                            setTimeout('window.location.href="cadastros.php"', 3500);
                        </script>
                        <?php
                    } else {
                        ?>
                        <script type="text/javascript">
                            setTimeout('window.location.href="cad_atividade.php"', 3500);
                        </script><?php }
                    ?>
                </div>
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#myModal').modal('show');
            });
        </script>
        <?php
    }
}
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">ERRO! POR FAVOR PREENCHA O FORMULÁRIO</h4>
            </div>
            <div class="modal-footer">
                <a href="cadastros.php"><button type="button" class="btn btn-info"><strong>VOLTAR PARA O FORMULÁRIO DE CADASTRO</strong></button></a>
                <a href="home.php"><button type="button" class="btn btn-danger"><strong>CANCELAR</strong></button></a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#myModal').modal('show');
    });
</script>



