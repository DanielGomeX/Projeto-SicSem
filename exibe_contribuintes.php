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
        <div class="col-sm-4" style="">
            <input type="text" name="parametro_empresa" class="form-control" placeholder="Digite o Nome da Razão Social / Pª Física">
        </div>  

        <div class="col-sm-8" style="text-align: left"  >
            <input type="submit" value="Clique Para Buscar" class="btn btn-primary pull-left" style="font-size: 15px; font-weight: bold;margin-left: -20px;color: #fff">
            <div  class="btn btn-danger" style="margin-left: 10px">              
                <a href="editar.php" style="font-weight:bold; color:#FFF; text-decoration:none;">Cancelar<span class="glyphicon glyphicon-remove" style="margin-left: 10px;"></span></a>
            </div>   
        </div>
        
    </div> 
</form>

<div class="row">
    <h2>NOSSOS CONTRIBUINTES</h2>
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
                <tr style="text-align: center;background-color:#67b168;color: #000000" >               
                    <th style="text-align: center;font-size: 12px">RAZÃO SOCIAL / PESSOA FÍSICA</th>   
                    <th style="text-align: center;font-size: 12px">NOME FANTASIA</th>             
                    <th style="text-align: center;font-size: 12px">CNPJ / CPF</th>
                    <th style="text-align: center;font-size: 12px">TELEFONE</th> 
                    <th style="width: 1%"><img src="img/user.png" title="Editar" style="margin-left: 7px"></th>  
                </tr>
            </header>            
            <?php
            //seleciona todos os itens da tabela 
            $empresas = "select * from tb_empresa";
            $linha = mysqli_query($con, $empresas);

            //conta o total de itens 
            $total = mysqli_num_rows($linha);

            $parametro_empresa = filter_input(INPUT_GET, "parametro_empresa");

            $sql = "SELECT codigo_empresa,razaosocial_pessoafisica,nome_fantasia,cnpj_cpf,bairro,telefone
        FROM tb_empresa WHERE razaosocial_pessoafisica LIKE '$parametro_empresa%' ORDER BY razaosocial_pessoafisica asc";
            $recebe = mysqli_query($con, $sql);
            if (mysqli_num_rows($recebe) > 0) {
                while ($linhas = mysqli_fetch_array($recebe)) {
                    $cod_empresa = $linhas['codigo_empresa']; //variavel pararecupar o id do empreendimento         
                    echo'<td style="font-size:12px">' . $linhas['razaosocial_pessoafisica'] . '</td>';
                    echo'<td style="font-size:12px">' . $linhas['nome_fantasia'] . '</td>';  
                    echo'<td style="font-size:12px">' . $linhas['cnpj_cpf'] . '</td>';
                    echo'<td style="font-size:12px">' . $linhas['telefone'] . '</td>';
                    echo'<td style="height:30px;text-align:center" title="Editar"><a href=alterar_empresa.php?codigo_empresa=' . $cod_empresa . '><span class="glyphicon glyphicon-pencil"></a></td>';
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
