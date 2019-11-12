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
<link rel="stylesheet" href="css/estilo_exibeContribuintes.css">
<form name="fmrpesquisa">
    <div class="row">
        <div class="col-sm-3" style="">
            <input type="text" name="parametro_processo" class="form-control" placeholder="Digite o Número do Processo">
        </div>  
        <div class="col-sm-2" style="">
            <input type="text" name="parametro_ano" class="form-control" placeholder="Digite o Ano">
        </div>  

        <div class="col-sm-7" style="text-align: left"  >
            <input type="submit" value="Clique Para Buscar" class="btn btn-primary pull-left" style="font-size: 15px; font-weight: bold;margin-left: -20px;color: #fff">
            <div  class="btn btn-danger" style="margin-left: 10px">              
                <a href="editar.php" style="font-weight:bold; color:#FFF; text-decoration:none;">Cancelar<span class="glyphicon glyphicon-remove" style="margin-left: 10px;"></span></a>
            </div>  
        </div> 
    </div>
</form>

<div class="row">
    <h2>PROCESSOS</h2>
    <!--ESTE CSS RESPONSVEL POR AJUDAR NA INSERÇÃO DA BARRA DE ROLAGEM DA TABELA-->
    <style type="text/css">
        .table-overflow {
            max-height:400px;
            overflow-x:auto;
        }
    </style>
    <div class="table-overflow">
        <table class="table table-striped table-hover table-bordered" >
            <header>
                <tr style="text-align: center;background-color:#67b168;color: #000000"  >               
                    <th style="text-align: center;font-size: 12px;">Nº PROCESSO</th>   
                    <th style="text-align: center;font-size: 12px;">ANO</th>
                    <th style="text-align: center;font-size: 12px;">DATA</th>              
                    <th style="text-align: center;font-size: 12px;">ASSUNTO</th>
                    <th style="text-align: center;font-size: 12px;">SITUAÇÃO</th>                
                    <th style="width: 1%"><img src="img/user.png" title="Editar" style="margin-left: 7px"></th>  
                    <th style="width: 1%"><img src="img/excluir.png" title="Remover" style="margin-left: 7px;width: 25px;height: 25px"></th>  
                </tr>
            </header>            
            <?php
            //seleciona todos os itens da tabela 
            $processos = "select * from tb_processo";
            $linha = mysqli_query($con, $processos);

            //conta o total de itens 
            $total = mysqli_num_rows($linha);

            $parametro_processo = filter_input(INPUT_GET, "parametro_processo");
            $parametro_ano = filter_input(INPUT_GET, "ano");

            $sql = "SELECT tb_processo.codigo_processo,tb_processo.numero_processo,tb_processo.ano,tb_processo.ano,tb_processo.data_processo,tb_processo.assunto,tb_processo.situacao_processo,tb_processo.motivo_situacao,
                    tb_empresa.codigo_empresa,tb_empresa.razaosocial_pessoafisica,tb_empreendimento.codigo_empreendimento,tb_empreendimento.nome_empreendimento,tb_empreendimento.nome_atividade
                    FROM 
                    tb_processo,tb_empresa,tb_empreendimento
                    WHERE(numero_processo LIKE '$parametro_processo%' AND ano LIKE '$parametro_ano%')AND
                    tb_processo.fk3_codigo_empresa = tb_empresa.codigo_empresa AND tb_processo.fk4_codigo_empreendimento = tb_empreendimento.codigo_empreendimento order by razaosocial_pessoafisica asc";
            $recebe = mysqli_query($con, $sql);
            if (mysqli_num_rows($recebe) > 0) {
                while ($linhas = mysqli_fetch_array($recebe)) {
                    $cod_processo = $linhas['codigo_processo']; //variavel pacuperar o id do empreendimento         
                    echo'<td style="font-size:12px;text-align:center">' . $linhas['numero_processo'] . '</td>';
                    echo'<td style="font-size:12px;text-align:center">' . $linhas['ano'] . '</td>';
                    echo'<td style="font-size:12px;text-align:center">' . date('d/m/Y', strtotime($linhas['data_processo'])) . '</td>';
                    echo'<td style="font-size:12px">' . $linhas['assunto'] . '</td>';
                    echo'<td style="font-size:12px;text-align:center">' . $linhas['situacao_processo'] . '</td>';                              
                    echo'<td style="height:30px;text-align:center" title="Editar"><a href=alterar_processo.php?codigo_processo=' . $cod_processo . '><span class="glyphicon glyphicon-pencil"></a></td>';
                    echo'<td style="height:30px;text-align:center" title="Remover"><a href=remover.php?codigo_processo=' . $cod_processo . '><span class="glyphicon glyphicon-remove btn-danger"></a></td>';
                    echo'</tr>';
                }
            }
            ?>
        </table>
    </div>  
    <br><br><br>
</div>
</div>
<?php
require './pages/footer.php';

