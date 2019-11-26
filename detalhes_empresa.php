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
<h2 style="text-align:center;color: #1b6d85"><strong>DADOS DA RAZÃO SOCIAL / Pª FÍSICA</strong></h2><br><br>


<?php
//INFORMAÇÕES REFERENTES A EMPRESAS, EMPREENDIMENTOS,LICENCAS,PROCESSOS...
$infor_empresa = $_GET['codigo_empresa']; /* link dinamico utilizando o get */
$sql_empresa = "SELECT tb_licenca.codigo_licenca,tb_licenca.numero_licenca,tb_licenca.ano_licenca,tb_licenca.data_emissao,tb_licenca.data_validade,tb_licenca.descricao_atividade,tb_empresa.codigo_empresa,tb_empresa.razaosocial_pessoafisica,tb_empresa.nome_fantasia,tb_empresa.pessoa_fisicajuridica,tb_empresa.cnpj_cpf,
tb_empresa.logradouro,tb_empresa.numero,tb_empresa.uf,tb_empresa.municipio,tb_empresa.bairro,tb_empresa.cep,tb_empresa.email,tb_empresa.telefone,tb_empresa.complemento,tb_empresa.localizacao_map,tb_processo.codigo_processo,tb_processo.numero_processo,tb_processo.ano,tb_processo.assunto,
tb_empreendimento.codigo_empreendimento,tb_empreendimento.nome_empreendimento,tb_empreendimento.nome_logradouro,tb_empreendimento.numero_empreendimento,tb_empreendimento.nome_bairro,tb_empreendimento.nome_municipio,tb_empreendimento.localizacao_map_empre,tb_empreendimento.nome_atividade,(if(current_date()<= data_validade,'VALIDA','INVALIDA')) AS situacao
FROM 
tb_licenca,tb_empresa,tb_processo,tb_empreendimento
WHERE 
tb_licenca.fk4_codigo_empresa = tb_empresa.codigo_empresa and tb_licenca.fk1_codigo_processo = tb_processo.codigo_processo and tb_licenca.fk1_codigo_empreendimento = tb_empreendimento.codigo_empreendimento  and codigo_empresa = $infor_empresa ORDER BY codigo_licenca DESC limit 1";
$exe_empresa = mysqli_query($con, $sql_empresa);

if (mysqli_num_rows($exe_empresa) > 0) {
    while ($linhas = mysqli_fetch_array($exe_empresa)) {
        $licencas = $linhas['codigo_empresa']; //variavel pararecupar o id do empreendimento

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>RAZÃO SOCIAL / PESSOA FÍSICA: </strong>" . $linhas['razaosocial_pessoafisica'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>NOME FANTASIA: </strong>" . $linhas['nome_fantasia'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>Pª JURIDICA / FISICA : </strong>" . $linhas['pessoa_fisicajuridica'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>CNPJ / CPF: </strong>" . $linhas['cnpj_cpf'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>ENDEREÇO: </strong>" . $linhas['logradouro'] . "";
        echo"<strong style='font-size:15px;margin-left:10px'>Nº: </strong>" . $linhas['numero'] . "";
        echo'<strong style="font-size:15px;margin-left:15px;background-color:#3CB371;border-radius:5px"><a href=' . $linhas['localizacao_map'] . ' target="_blank" style="color:#FFF;text-decoration:none"><span  class="glyphicon glyphicon-map-marker" style="text-align:center;width:40px;font-size:15px;;color:#FFF"></span></strong></a>';
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>BAIRRO: </strong>" . $linhas['bairro'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>COMPLEMENTO: </strong>" . $linhas['complemento'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>CEP: </strong>" . $linhas['cep'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>MUNICÍPIO: </strong>" . $linhas['municipio'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-aling:right'>UF: </strong>" . $linhas['uf'] . "<br>";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>TELEFONE: </strong>" . $linhas['telefone'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-aling:right'>EMAIL: </strong>" . $linhas['email'] . "<br>";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-12' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-aling:right'>ATIVIDADE: </strong>" . $linhas['nome_atividade'] . "<br>";
        echo"</div><br><br>";
        echo"</div>";

//        echo"<div class='row'>";
//        echo"<div class='col-sm-12' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
//        echo"<strong style='font-size:15px;margin-left:10px'>RAMO DA ATIVIDADE: </strong>" . $linhas['ramo_atividade_um'] . "";
//        echo"</div><hr style='border:1px solid black'>";
//        echo"</div>";
//        echo"</div>";

        /* ESTE CÓDIGO TEM COMO PROPÓSITO INFORMAR A QTD DE LICENCA QUE CADA EMPRESA POSSUI */
        echo"<div class='row'>";
        echo"<div class='col-sm-12 text-center' style='border:'>";
        $sql_tipo_licenca = "SELECT tb_licenca.codigo_licenca,tb_empresa.codigo_empresa FROM tb_licenca,tb_empresa WHERE tb_licenca.fk4_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_licencas.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">LICENÇAS<span class="glyphicon glyphicon-list-alt" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">LICENÇAS<span class="glyphicon glyphicon-list-alt" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_processo.codigo_processo,tb_empresa.codigo_empresa FROM tb_processo,tb_empresa WHERE tb_processo.fk3_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_processos.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">PROCESSOS<span class="glyphicon glyphicon-th-list" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">PROCESSOS<span class="glyphicon glyphicon-th-list" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_empreendimento.codigo_empreendimento,tb_empreendimento.nome_empreendimento,tb_empresa.codigo_empresa FROM tb_empreendimento, tb_empresa WHERE tb_empreendimento.fk1_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa AND atividade_empreendimento = 'EMPREENDIMENTO'";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_empreendimento.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">EMPREENDIMENTO<span class="glyphicon glyphicon-stats" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">EMPREENDIMENTO<span class="glyphicon glyphicon-stats" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_empreendimento.codigo_empreendimento,tb_empreendimento.nome_atividade,tb_empresa.codigo_empresa FROM tb_empreendimento, tb_empresa WHERE tb_empreendimento.fk1_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa AND atividade_empreendimento = 'ATIVIDADE'";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_atividades.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">ATIVIDADE<span class="glyphicon glyphicon-briefcase" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">ATIVIDADE<span class="glyphicon glyphicon-briefcase" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_notificacao.codigo_notificacao,tb_empresa.codigo_empresa FROM tb_notificacao,tb_empresa WHERE tb_notificacao.fk5_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_notificacoes.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">NOTIFICAÇÃO<span class="glyphicon glyphicon-bell" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">NOTIFICACÃO<span class="glyphicon glyphicon-bell" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }
        $sql_tipo_licenca = "SELECT tb_auto_infracao.codigo_auto_infracao,tb_empresa.codigo_empresa FROM tb_auto_infracao, tb_empresa WHERE tb_auto_infracao.fk9_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_infracoes.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">AUTO DE INFRAÇÃO<span class="glyphicon glyphicon-bell" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#EEE9E9">AUTO DE INFRAÇÃO<span class="glyphicon glyphicon-alert" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }
        echo"</div>";
        echo"</div><br><br>";
        echo"<div class='row'>";
        echo"<div class='col-sm-12' style='text-align:center'>";
        echo"<div class='btn-grou'>";
        ?>
        <?php
        echo'<button type="button" class="btn btn-primary" style="margin-left:3px"><strong style="font-size:17px"><a href="consultar_empresas.php" style="font-weight:bold; color:#FFF; text-decoration:none">NOVA CONSULTA <span  class="glyphicon glyphicon-remove" style="margin-left:10px; font-size:17px"></a></strong></button>';
        echo'<button type="button" class="btn btn-danger" style="margin-left:3px"><strong style="font-size:17px"><a href="inicio.php" style="font-weight:bold; color:#FFF; text-decoration:none">PAGINA INICIAL <span  class="glyphicon glyphicon-remove" style="margin-left:10px; font-size:17px"></a></strong></button>';
        echo"</div>";
        echo"</div>";
        echo"</div><br><br><br><br>";
        echo"</div>";
    }
} else if (mysqli_num_rows($exe_empresa) > 0) {
    $sql = "SELECT tb_empresa.codigo_empresa,tb_empresa.razaosocial_pessoafisica,tb_empresa.nome_fantasia,tb_empresa.pessoa_fisicajuridica,tb_empresa.cnpj_cpf,tb_empresa.cep,tb_empresa.logradouro,tb_empresa.complemento,tb_empresa.localizacao_map,tb_empresa.bairro,tb_empresa.municipio,tb_empresa.uf,tb_empresa.telefone,tb_empresa.email,tb_empresa.numero,tb_notificacao.codigo_notificacao,tb_auto_infracao.codigo_auto_infracao FROM tb_empresa,tb_notificacao,tb_auto_infracao WHERE tb_notificacao.fk5_codigo_empresa = tb_empresa.codigo_empresa AND tb_auto_infracao.fk9_codigo_empresa = tb_empresa.codigo_empresa AND codigo_empresa= $infor_empresa";
    $recebe = mysqli_query($con, $sql);

    while ($linhas = mysqli_fetch_array($recebe)) {
        $codigo_empresa = $linhas['codigo_empresa']; //variavel pararecupar o id do empreendimento

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>RAZÃO SOCIAL / PESSOA FÍSICA: </strong>" . $linhas['razaosocial_pessoafisica'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>NOME FANTASIA: </strong>" . $linhas['nome_fantasia'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>Pª JURIDICA / FISICA : </strong>" . $linhas['pessoa_fisicajuridica'] . "";
        echo"</div>";

        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>CNPJ / CPF: </strong>" . $linhas['cnpj_cpf'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>ENDEREÇO: </strong>" . $linhas['logradouro'] . "";
        echo"<strong style='font-size:15px;margin-left:10px'>Nº: </strong>" . $linhas['numero'] . "";
        echo'<strong style="font-size:15px;margin-left:15px;background-color:#3CB371;border-radius:5px"><a href=' . $linhas['localizacao_map'] . ' target="_blank" style="color:#FFF;text-decoration:none"><span  class="glyphicon glyphicon-map-marker" style="text-align:center;width:40px;font-size:15px;;color:#FFF"></span></strong></a>';
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>BAIRRO: </strong>" . $linhas['bairro'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>COMPLEMENTO: </strong>" . $linhas['complemento'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>CEP: </strong>" . $linhas['cep'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>MUNICÍPIO: </strong>" . $linhas['municipio'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-aling:right'>UF: </strong>" . $linhas['uf'] . "<br>";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>TELEFONE: </strong>" . $linhas['telefone'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-aling:right'>EMAIL: </strong>" . $linhas['email'] . "<br>";
        echo"</div><br><br>";
        echo"</div>";

//        echo"<div class='row'>";
//        echo"<div class='col-sm-12' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
//        echo"<strong style='font-size:15px;margin-left:10px'>RAMO DA ATIVIDADE: </strong>" . $linhas['ramo_atividade_um'] . "";
//        echo"</div><hr style='border:1px solid black'>";
//        echo"</div>";
//        echo"</div>";

        /* ESTE CÓDIGO TEM COMO PROPÓSITO INFORMAR A QTD DE LICENCA QUE CADA EMPRESA POSSUI */
        echo"<div class='row'>";
        echo"<div class='col-sm-12 text-center' style='border:'>";

        $sql_tipo_licenca = "SELECT tb_licenca.codigo_licenca,tb_empresa.codigo_empresa FROM tb_licenca,tb_empresa WHERE tb_licenca.fk4_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_licencas.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">LICENÇAS<span class="glyphicon glyphicon-list-alt" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">LICENÇAS<span class="glyphicon glyphicon-list-alt" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_processo.codigo_processo,tb_empresa.codigo_empresa FROM tb_processo,tb_empresa WHERE tb_processo.fk3_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_processos.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">PROCESSOS<span class="glyphicon glyphicon-th-list" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">PROCESSOS<span class="glyphicon glyphicon-th-list" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_empreendimento.codigo_empreendimento,tb_empreendimento.nome_empreendimento,tb_empresa.codigo_empresa FROM tb_empreendimento, tb_empresa WHERE tb_empreendimento.fk1_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa AND atividade_empreendimento = 'EMPREENDIMENTO'";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_empreendimento.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">EMPREENDIMENTOS<span class="glyphicon glyphicon-stats" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">EMPREENDIMENTOS<span class="glyphicon glyphicon-stats" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_empreendimento.codigo_empreendimento,tb_empreendimento.nome_atividade,tb_empresa.codigo_empresa FROM tb_empreendimento, tb_empresa WHERE tb_empreendimento.fk1_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa AND atividade_empreendimento = 'ATIVIDADE'";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_atividades.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">ATIVIDADES<span class="glyphicon glyphicon-briefcase" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">ATIVIDADES<span class="glyphicon glyphicon-briefcase" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_notificacao.codigo_notificacao,tb_empresa.codigo_empresa FROM tb_notificacao, tb_empresa WHERE tb_notificacao.fk5_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_notificacoes.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">NOTIFICAÇÃO<span class="glyphicon glyphicon-bell" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">NOTIFICAÇÃO<span class="glyphicon glyphicon-bell" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }
        $sql_tipo_licenca = "SELECT tb_auto_infracao.codigo_auto_infracao,tb_empresa.codigo_empresa FROM tb_auto_infracao, tb_empresa WHERE tb_auto_infracao.fk9_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_infracoes.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">AUTO DE INFRAÇÃO<span class="glyphicon glyphicon-bell" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">AUTO DE INFRAÇÃO<span class="glyphicon glyphicon-alert" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        echo"</div>";
        echo"</div><br><br>";

        echo"<div class='row'>";
        echo"<div class='col-sm-12' style='text-align:center'>";
        echo"<div class='btn-group'>";
        ?>

        <?php
        echo'<button type="button" class="btn btn-primary" style="margin-left:3px"><strong style="font-size:17px"><a href="consultar_empresas.php" style="font-weight:bold; color:#FFF; text-decoration:none">NOVA CONSULTA <span  class="glyphicon glyphicon-remove" style="margin-left:10px; font-size:17px"></a></strong></button>';
        echo'<button type="button" class="btn btn-danger" style="margin-left:3px"><strong style="font-size:17px"><a href="inicio.php" style="font-weight:bold; color:#FFF; text-decoration:none">PAGINA INICIAL <span  class="glyphicon glyphicon-remove" style="margin-left:10px; font-size:17px"></a></strong></button>';

        echo"</div>";
        echo"</div>";
        echo"</div><br><br><br><br>";
        echo"</div>";
    }
} else {
    $sql = "SELECT codigo_empresa,razaosocial_pessoafisica,nome_fantasia,pessoa_fisicajuridica,cnpj_cpf,cep,logradouro,complemento,localizacao_map,bairro,municipio,uf,telefone,email,numero FROM tb_empresa WHERE codigo_empresa = $infor_empresa";
    $recebe = mysqli_query($con, $sql);

    while ($linhas = mysqli_fetch_array($recebe)) {
        $codigo_empresa = $linhas['codigo_empresa']; //variavel pararecupar o id do empreendimento

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>RAZÃO SOCIAL / PESSOA FÍSICA: </strong>" . $linhas['razaosocial_pessoafisica'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>NOME FANTASIA: </strong>" . $linhas['nome_fantasia'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>Pª JURIDICA / FISICA : </strong>" . $linhas['pessoa_fisicajuridica'] . "";
        echo"</div>";

        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>CNPJ / CPF: </strong>" . $linhas['cnpj_cpf'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>ENDEREÇO: </strong>" . $linhas['logradouro'] . "";
        echo"<strong style='font-size:15px;margin-left:10px'>Nº: </strong>" . $linhas['numero'] . "";
        echo'<strong style="font-size:15px;margin-left:15px;background-color:#3CB371;border-radius:5px"><a href=' . $linhas['localizacao_map'] . ' target="_blank" style="color:#FFF;text-decoration:none"><span  class="glyphicon glyphicon-map-marker" style="text-align:center;width:40px;font-size:15px;;color:#FFF"></span></strong></a>';
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>BAIRRO: </strong>" . $linhas['bairro'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>COMPLEMENTO: </strong>" . $linhas['complemento'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-align:right'>CEP: </strong>" . $linhas['cep'] . "";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>MUNICÍPIO: </strong>" . $linhas['municipio'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-aling:right'>UF: </strong>" . $linhas['uf'] . "<br>";
        echo"</div><br><br>";
        echo"</div>";

        echo"<div class='row'>";
        echo"<div class='col-sm-8' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;margin-left:10px'>TELEFONE: </strong>" . $linhas['telefone'] . "";
        echo"</div>";
        echo"<div class='col-sm-4' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
        echo"<strong style='font-size:15px;text-aling:right'>EMAIL: </strong>" . $linhas['email'] . "<br>";
        echo"</div><br><br>";
        echo"</div>";

//        echo"<div class='row'>";
//        echo"<div class='col-sm-12' style='border:1px solid #EEE9E9;background-color:#EEE9E9'>";
//        echo"<strong style='font-size:15px;margin-left:10px'>RAMO DA ATIVIDADE: </strong>" . $linhas['ramo_atividade_um'] . "";
//        echo"</div><hr style='border:1px solid black'>";
//        echo"</div>";
//        echo"</div>";

        /* ESTE CÓDIGO TEM COMO PROPÓSITO INFORMAR A QTD DE LICENCA QUE CADA EMPRESA POSSUI */
        echo"<div class='row'>";
        echo"<div class='col-sm-12 text-center' style='border:'>";

        $sql_tipo_licenca = "SELECT tb_licenca.codigo_licenca,tb_empresa.codigo_empresa FROM tb_licenca,tb_empresa WHERE tb_licenca.fk4_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_licencas.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">LICENÇAS<span class="glyphicon glyphicon-list-alt" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">LICENÇAS<span class="glyphicon glyphicon-list-alt" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_processo.codigo_processo,tb_empresa.codigo_empresa FROM tb_processo,tb_empresa WHERE tb_processo.fk3_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_processos.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">PROCESSOS<span class="glyphicon glyphicon-th-list" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">PROCESSOS<span class="glyphicon glyphicon-th-list" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_empreendimento.codigo_empreendimento,tb_empreendimento.nome_empreendimento,tb_empresa.codigo_empresa FROM tb_empreendimento, tb_empresa WHERE tb_empreendimento.fk1_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa AND atividade_empreendimento = 'EMPREENDIMENTO'";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_empreendimento.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">EMPREENDIMENTOS<span class="glyphicon glyphicon-stats" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">EMPREENDIMENTOS<span class="glyphicon glyphicon-stats" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        $sql_tipo_licenca = "SELECT tb_empreendimento.codigo_empreendimento,tb_empreendimento.nome_atividade,tb_empresa.codigo_empresa FROM tb_empreendimento, tb_empresa WHERE tb_empreendimento.fk1_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa AND atividade_empreendimento = 'ATIVIDADE'";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_atividades.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">ATIVIDADES<span class="glyphicon glyphicon-briefcase" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">ATIVIDADES<span class="glyphicon glyphicon-briefcase" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
//            echo'<button type="button" data-toggle="modal" data-target="#myModalcadEmpreendimento" class="btn btn-link" style="text-decoration:none;background-color:#808080;color:#F5FFFA"><strong>CADASTRAR</strong><span class="glyphicon glyphicon-plus" style="color:000;margin-left:5px;"></span></button>';
        }

        $sql_tipo_licenca = "SELECT tb_notificacao.codigo_notificacao,tb_empresa.codigo_empresa FROM tb_notificacao, tb_empresa WHERE tb_notificacao.fk5_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_notificacoes.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">NOTIFICAÇÃO<span class="glyphicon glyphicon-bell" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">NOTIFICAÇÕES<span class="glyphicon glyphicon-bell" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }
        $sql_tipo_licenca = "SELECT tb_auto_infracao.codigo_auto_infracao,tb_empresa.codigo_empresa FROM tb_auto_infracao, tb_empresa WHERE tb_auto_infracao.fk9_codigo_empresa = tb_empresa.codigo_empresa and codigo_empresa = $infor_empresa";
        $sql_qtd = mysqli_query($con, $sql_tipo_licenca);
        $sql_total = mysqli_num_rows($sql_qtd);
        if (mysqli_num_rows($sql_qtd) > 0) {
            echo'<a href=listar_infracoes.php?codigo_empresa=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">AUTO DE INFRAÇÃO<span class="glyphicon glyphicon-bell" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        } else {
            echo'<a href=#=' . $infor_empresa . ' class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#D3D3D3">AUTOS DE INFRAÇÕES<span class="glyphicon glyphicon-alert" style="color:000;margin-left:5px"></span><br><span class="badge">' . $sql_total . '</span></a>';
        }

        echo"</div>";
        echo"</div>";
        ?>

        <div class="row">
            <div class='col-sm-12 text-center'>
                <div class="col-sm-1" style="margin-left: 165px">
                    <a href="#myModalcadEmpreendimento" data-toggle="modal"  class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#000\9;"><span class="glyphicon glyphicon-plus" style="color:000;margin-left:5px"></span><br><span class="badge"></span>
                        cadastrar   
                    </a>
                </div>
                <div class="col-sm-1" style="margin-left: 20px">
                    <a href="#myModalcadEmpreendimento" data-toggle="modal"  class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#000\9"><span class="glyphicon glyphicon-plus" style="color:000;margin-left:5px"></span><br><span class="badge"></span>
                        cadastrar   
                    </a>
                </div>
                <div class="col-sm-1" style="margin-left: 65px">
                    <a href="#myModalcadEmpreendimento" data-toggle="modal"  class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#000\9"><span class="glyphicon glyphicon-plus" style="color:000;margin-left:5px"></span><br><span class="badge"></span>
                        cadastrar   
                    </a>
                </div>
                <div class="col-sm-1" style="margin-left: 65px">
                    <a href="#myModalcadEmpreendimento" data-toggle="modal"  class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#000\9"><span class="glyphicon glyphicon-plus" style="color:000;margin-left:5px"></span><br><span class="badge"></span>
                        cadastrar   
                    </a>
                </div>
                <div class="col-sm-1" style="margin-left: 40px">
                    <a href="#myModalcadEmpreendimento" data-toggle="modal"  class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#000\9"><span class="glyphicon glyphicon-plus" style="color:000;margin-left:5px"></span><br><span class="badge"></span>
                        cadastrar   
                    </a>
                </div>
                <div class="col-sm-1" style="margin-left: 80px">
                    <a href="#myModalcadEmpreendimento" data-toggle="modal"  class="btn btn-basic" style="margin-right:2px;font-size:15px; font-weight: bold;color:000;background-color:#000\9"><span class="glyphicon glyphicon-plus" style="color:000;margin-left:5px"></span><br><span class="badge"></span>
                        cadastrar   
                    </a>
                </div>
            </div>
        </div><br>
        <?php
        echo"<div class='row'>";
        echo"<div class='col-sm-12' style='text-align:center'>";
        echo"<div class='btn-group'>";
        ?>

        <?php
        echo'<button type="button" class="btn btn-primary" style="margin-left:3px"><strong style="font-size:17px"><a href="consultar_empresas.php" style="font-weight:bold; color:#FFF; text-decoration:none">NOVA CONSULTA <span  class="glyphicon glyphicon-remove" style="margin-left:10px; font-size:17px"></a></strong></button>';
        echo'<button type="button" class="btn btn-danger" style="margin-left:3px"><strong style="font-size:17px"><a href="inicio.php" style="font-weight:bold; color:#FFF; text-decoration:none">PAGINA INICIAL <span  class="glyphicon glyphicon-remove" style="margin-left:10px; font-size:17px"></a></strong></button>';

        echo"</div>";
        echo"</div>";
        echo"</div><br><br><br><br>";
        echo"</div>";
    }
}
?>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/valida-documento.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/validaempreendimento.js"></script>
<link rel="stylesheet" type="text/css" href="css/estilo_cadEmpreendimento.css">

<div class="modal fade" id="myModalcadEmpreendimento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Cancelar &times</span></button><br>
                <h4 class="modal-title text-center" id="myModalLabel"><strong style="color: #048C46">CADASTRO ATIVIDADE</strong></h4>
            </div>
            <div class="modal-body">
                <form  action="guarda_empreendimento.php"  method="POST" name="frmempreendimento" id="frmempreendimento">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-success">
                                <div class="panel-heading"> 
                                    <div class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><strong>DADOS DO EMPREENDIMENTO / ATIVIDADE</strong></a>
                                    </div>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="empresa"><strong>RAZÃO SOCIAL E / OU PESSOA FÍSICA *</strong></label><br/>
                                                    <!--<input type="text" name="empresa" id="empresa" value="<?= $linha_sql['razaosocial_pessoafisica']; ?>" readonly="" class="form-control" autofocus="" />-->
                                                <select name="empresa" id="empresa" class="form-control" autofocus="">
                                                       
                                                        <?php
//                                                        $codigo_empresa = $_GET['codigo_empresa']; /* link dinamico utilizando o get */
                                                        $empresa = "SELECT codigo_empresa, razaosocial_pessoafisica FROM tb_empresa WHERE codigo_empresa = $infor_empresa";
                                                        $recebe_empresas = mysqli_query($con, $empresa);
                                                        while ($linha = mysqli_fetch_array($recebe_empresas)) {
                                                            echo '<option value="' . $linha['codigo_empresa'] . '">' . $linha['razaosocial_pessoafisica'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>                                   
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="atividade_empreendimento"><strong>ATIVIDADE*</strong></label><br/>
                                                    <input type="text" name="atividade_empreendimento" id="atividade_empreendimento" value="ATIVIDADE"  readonly="" class="form-control" placeholder="Campo Obrigatório" autocomplete="off" />   
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-12" id="ATIV">
                                                <div class="form-group">
                                                    <label for="nome_atividade"><strong>ATIVIDADE A LICENCIAR *</strong></label><br/>
                                                    <input type="text" name="nome_atividade" id="nome_atividade" class="form-control" placeholder="Campo Obrigatório" autocomplete="off" />                          
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="ATIV_GRAU">
                                            <div class="col-sm-12">                                    
                                                <div class="form-group">
                                                    <label for="grau_atividade"><strong>POTENCIAL POLUIDOR DA ATIVIDADE *</strong></label><br/>
                                                    <select name="grau_atividade" id="grau_atividade" class="form-control" />                                                                            
                                                    <option value="">SELECIONE</option>
                                                    <option value="INSIGNIFICANTE">INSIGNIFICANTE</option>
                                                    <option value="BAIXO">BAIXO</option>
                                                    <option value="MEDIO">MÉDIO</option>
                                                    <option value="ALTO">ALTO</option>
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-title" style="text-align: center;"><br/>
                                    <button type="submit" class="btn btn-success" style="font-size: 17px; font-weight: bold;">REALIZAR CADASTRO<span class="glyphicon glyphicon-saved" style="margin-left: 10px;"></span></button>
                                </div>   
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



