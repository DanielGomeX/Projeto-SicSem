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
    if (isset($_POST['empreendimento']) && empty($_POST['empreendimento']) == FALSE) {
        if (isset($_POST['processo']) && empty($_POST['processo']) == FALSE) {
            if (isset($_POST['numero_licenca']) && empty($_POST['numero_licenca']) == FALSE) {
                if (isset($_POST['ano_licenca']) && empty($_POST['ano_licenca']) == FALSE) {
                    if (isset($_POST['data_emissao']) && empty($_POST['data_emissao']) == FALSE) {
                        if (isset($_POST['data_validade']) && empty($_POST['data_validade']) == FALSE) {
                            if (isset($_POST['descricao_atividade']) && empty($_POST['descricao_atividade']) == FALSE) {
                                if (isset($_POST['licenca']) && empty($_POST['licenca']) == FALSE) {

                                    $empresa = strtoupper(addslashes($_POST['empresa']));
                                    $empreendimento = strtoupper(addslashes($_POST['empreendimento']));
                                    $processo = strtoupper(addslashes($_POST['processo']));
                                    $numero_licenca = strtoupper(addslashes($_POST['numero_licenca']));
                                    $ano_licenca = strtoupper(addslashes($_POST['ano_licenca']));
                                    $data_emissao = strtoupper(addslashes($_POST['data_emissao']));
                                    $data_validade = strtoupper(addslashes($_POST['data_validade']));
                                    $descricao_atividade = strtoupper(addslashes($_POST['descricao_atividade']));
                                    $licenca = strtoupper(addslashes($_POST['licenca']));

                                    /* codigo responsavel pela comparaçõa entre as data de emissoa e validade */
                                    if ($data_emissao >= $data_validade) {
                                        ?>
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">ERRO! A DATA DE EMISSÃO NÃO PODE SER MAIOR OU IGUAL A DATA DE VALIDADE</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="cad_licenca.php"><button type="button" class="btn btn-info"><strong>VOLTAR PARA O FORMULÁRIO DE CADASTRO</strong></button></a>
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

                                        <?php
                                    }
                                    //VERIFICANDO SE JÁ EXISTE UM NÚMERO E O UM TIPO DE LICEÇA JÁ CADASTRADOS 
                                    $consulta_licenca = "SELECT numero_licenca,licenca FROM tb_licenca WHERE numero_licenca ='" . $_POST['numero_licenca'] . "' AND licenca ='" . $_POST['licenca'] . "' ";
                                    $recebe_consulta = mysqli_query($con, $consulta_licenca);

                                    if (mysqli_num_rows($recebe_consulta) > 0) {
                                        ?>
                                        <script>
                                            alert('ERRO! JÁ EXISTE UM NÚMERO E O TIPO DE LICENÇA CADASTRO COM ESSAS INFORMÇÕES, POR FAVOR INFORME OUTRO NÚMERO OU TIPO DE LICENÇA!');
                                            window.history.back();
                                        </script>
                                        <?php
                                    } else {


                                        $sql = "INSERT INTO tb_licenca(fk4_codigo_empresa,fk1_codigo_empreendimento,fk1_codigo_processo,numero_licenca,ano_licenca,data_emissao,data_validade,descricao_atividade,licenca)"
                                                . "VALUES('$empresa','$empreendimento','$processo','$numero_licenca','$ano_licenca','$data_emissao','$data_validade',UPPER('$descricao_atividade'),'$licenca')";
                                        mysqli_query($con, $sql);
                                        $_SESSION['controle_de_abas'] = 2;
//                                        print_r($sql);
                                        ?>
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header btn-success">
                                                        <h4 class="modal-title text-center" id="myModalLabel"><strong>LICENÇA CADASTRADA COM SUCESSO!<br><br><P style="text-align: center">AGUARDE UM MOMENTO</strong></P></h4>
                                                        <script type="text/javascript">
                                                            setTimeout('window.location.href="cadastros.php"', 3500);
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
                                        <?php
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
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
                <a href="cad_licenca.php"><button type="button" class="btn btn-info"><strong>VOLTAR PARA O FORMULÁRIO DE CADASTRO</strong></button></a>
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

