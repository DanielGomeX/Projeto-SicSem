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
        if (isset($_POST['numero_processo']) && empty($_POST['numero_processo']) == FALSE) {
            if (isset($_POST['data_processo']) && empty($_POST['data_processo']) == FALSE) {
                if (isset($_POST['assunto']) && empty($_POST['assunto']) == FALSE) {

                    $empresa = strtoupper(addslashes($_POST['empresa']));
                    $empreendimento = strtoupper(addslashes($_POST['empreendimento']));
                    $numero_processo = strtoupper(addslashes($_POST['numero_processo']));
                    $ano = strtoupper(addslashes($_POST['ano']));
                    $data_processo = strtoupper(addslashes($_POST['data_processo']));
                    $assunto = strtoupper(addslashes($_POST['assunto']));
                    $situacao_processo = strtoupper(addslashes($_POST['situacao_processo']));
                    $motivo_situacao = strtoupper(addslashes($_POST['motivo_situacao']));

                    //verificando se ja existe no banco de dados o numero do processo informado            
                    $consulta_processo = "SELECT numero_processo,assunto FROM tb_processo WHERE numero_processo ='" . $_POST['numero_processo'] . "' AND assunto ='" . $_POST['assunto'] . "' ";
                    $recebe_consulta = mysqli_query($con, $consulta_processo);

                    if (mysqli_num_rows($recebe_consulta) > 0) {
                        ?>
                        <script>
                            alert('ERRO JÁ EXISTE UM PROCESSO COM O NÚMERO INFORMADO, POR FAVOR INFORME OUTRO NÚMERO! \n\n ATENÇÃO CASO O EMPREENDIMENTO NÃO APAREÇA SELECIONE A EMPRESA NOVAMENTE ');
                            window.history.back();
                        </script>
                        <?php
                    } else {

                        $sql = "INSERT INTO tb_processo(fk3_codigo_empresa,fk4_codigo_empreendimento,numero_processo,ano,data_processo,assunto,situacao_processo,motivo_situacao)"
                                . "VALUES('$empresa','$empreendimento','$numero_processo','$ano','$data_processo','$assunto','$situacao_processo','$motivo_situacao')";
                        mysqli_query($con, $sql);

                        //recuperando o ultimo processo inserido
                        $ultimo_processo = mysqli_insert_id($con);
//                        echo $ultimo_processo;
                        $_SESSION['ultimo_processo'] = $ultimo_processo;

//                      print_r($sql);                   
//                        $_SESSION['controle_de_abas'] = 1;
                        ?>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header btn-success">
                                        <h4 class="modal-title text-center" id="myModalLabel"><strong>PROCESSO CADASTRADO COM SUCESSO!<br><br><P style="text-align: center">AGUARDE UM MOMENTO</strong></P></h4>
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





