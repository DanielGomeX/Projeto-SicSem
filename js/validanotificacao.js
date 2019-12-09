function notificacao() {

    if (document.frmnotificacao.tb_autuadoinfrator.value === "") {
        alert("Por Favor Selecione o Autuado");
        document.frmnotificacao.tb_autuadoinfrator.focus();
        return false;
    }
    if (document.frmnotificacao.nome_fiscal.value === "") {
        alert("Por Favor! Selecione o Fiscal");
        document.frmnotificacao.nome_fiscal.focus();
        return false;
    }
    if (document.frmnotificacao.matricula.value === "") {
        alert("Por Favor! Selecione a matricula");
        document.frmnotificacao.matricula.focus();
        return false;
    }
    if (document.frmnotificacao.Numero_Notificacao.value === "") {
        alert("Por Favor! Informe o Numero da Notificacao");
        document.frmnotificacao.Numero_Notificacao.focus();
        return false;
    }
    if (document.frmnotificacao.tb_processo.value === "") {
        alert("Por Favor! Informe o Numero do processo");
        document.frmnotificacao.tb_processo.focus();
        return false;
    }
    if (document.frmnotificacao.Data_PrazoNotificacao.value === "") {
        alert("Por Favor! Informe a Data do Prazo");
        document.frmnotificacao.Data_PrazoNotificacao.focus();
        return false;
    }
    if (document.frmnotificacao.Descricao_PrazoNotificacao.value === "") {
        alert("Por Favor! Informe a Descricao do Prazo");
        document.frmnotificacao.Descricao_PrazoNotificacao.focus();
        return false;
    }
    if (document.frmnotificacao.Irregularidade.value === "") {
        alert("Por Favor! Informe a Irregularidade");
        document.frmnotificacao.Irregularidade.focus();
        return false;
    }
}

//<!--o script abaixo permite que somente letras sejam digitas nos campos que recebem essa validação-->

function letras(e) {
    var expressao;
    expressao = /[0-9]/;
    if (expressao.test(String.fromCharCode(e.keyCode))) {
        return false;
    } else {
        return true;
    }
}

//<!--o script acima permite que somente letras sejam digitas nos campos que recebem essa validação-->

//<!--este scritp garante que no campo nº processo só serão aceitos numero positivos-->

function somenteNumeros(num) {
    var er = /[^0-9.]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}

//<!--OS DADOS ACIMA SÃO REFERENTES AO CADASTRO DE PROCESSO-->
function comparadatas()
{
    var data_notificacao = document.getElementById("data_notificacao");
    var data_comparecimento = document.getElementById("data_comparecimento");

    if (data_notificacao.value > data_comparecimento.value) {
        alert("ERRO! A DATA DE NOTIFICAÇÃO NÃO PODE SER MAIOR OU IGUAL A DATA DE COMPARECIMENTO");
        data_notificacao = document.getElementById('data_notificacao').value = '';
        data_comparecimento = document.getElementById('data_comparecimento').value = '';

    }
}

function comparaAnoData()
{
    var ano = document.getElementById("ano_notificacao").value;
    var data_notificacao = document.getElementById("data_notificacao").value;
    var data = data_notificacao.substr(0, 4); // pega só o ano
    if (ano !== data) {
        alert("ERRO! O ANO INFORMADO, NÃO ESTÁ COM O MESMO ANO DA DATA DA NOTIFICAÇÃO");
        var ano = document.getElementById("ano_notificacao").value = '';
        var data_notificacao = document.getElementById("data_notificacao").value = '';
    }
}

function mostrardivlicencas(valor) {

    if (valor === "SIM") {
        document.getElementById("NUMLICENCA").style.display = "block";
        document.getElementById("NUMANOLICENCA").style.display = "block";
        document.getElementById("ORGAOEMISSOR").style.display = "block";
        document.getElementById("DATAVALIDADE").style.display = "block";
    } else if (valor === "NAO") {
        document.getElementById("NUMLICENCA").style.display = "none";
        document.getElementById("NUMANOLICENCA").style.display = "none";
        document.getElementById("ORGAOEMISSOR").style.display = "none";
        document.getElementById("DATAVALIDADE").style.display = "none";
    }
}

function mostrardivnotificados(valor_notificado) {

    if (valor_notificado === "SIM") {
        document.getElementById("NOMENOTIFICADO").style.display = "block";
        document.getElementById("CPFNOTIFICADO").style.display = "block";
        document.getElementById("LOGRADOURONOTIFICADO").style.display = "block";
        document.getElementById("NUMERONOTIFICADO").style.display = "block";
        document.getElementById("BAIRRONOTIFICADO").style.display = "block";
        document.getElementById("TESTEMUNHANOTIFICADO").style.display = "block";
    } else if (valor_notificado === "NAO") {
        document.getElementById("NOMENOTIFICADO").style.display = "none";
        document.getElementById("CPFNOTIFICADO").style.display = "none";
        document.getElementById("LOGRADOURONOTIFICADO").style.display = "none";
        document.getElementById("NUMERONOTIFICADO").style.display = "none";
        document.getElementById("BAIRRONOTIFICADO").style.display = "none";
        document.getElementById("TESTEMUNHANOTIFICADO").style.display = "none";
    }
}
function mostrardivinformacoes(valor_informacoes) {
    if (valor_informacoes === "SIM") {
        document.getElementById("NUMNOTANTERIOR").style.display = "block";
        document.getElementById("NUMANOANTERIOR").style.display = "block";
        document.getElementById("NUMPROANTERIOR").style.display = "block";
        document.getElementById("NUMANOPROANTERIOR").style.display = "block";
        document.getElementById("LICENCAANTERIOR").style.display = "block";
    } else if (valor_informacoes === "NAO") {
        document.getElementById("NUMNOTANTERIOR").style.display = "none";
        document.getElementById("NUMANOANTERIOR").style.display = "none";
        document.getElementById("NUMPROANTERIOR").style.display = "none";
        document.getElementById("NUMANOPROANTERIOR").style.display = "none";
        document.getElementById("LICENCAANTERIOR").style.display = "none";
    }
}

$(document).ready(function () {

    jQuery.validator.addMethod("isString", function (value, element) {
        var regExp = /[0-9]/;
        if (regExp.test(value))
            return false;

        return true;
    },
            "Por Favor! Insira Somente Letras");

    //Na linha abaixo, quando o form for submetido ele faz o validate 
    $('#frmnotificacao').validate({
        //na linha abaixo sao criada as regras de validacao
        rules: {
            empresa: {
                required: true
            },
            processo: {
                required: true
            },
            numero_notificacao: {
                required: true,
                maxlength: 3
            },
            ano_notificacao: {
                required: true
            },
            data_notificacao: {
                required: true
            },
            data_comparecimento: {
                required: true
            },
            profissao_atividade: {
                required: true,
                minlength: 10,
                isString: true
            },
            descricao_prazo: {
                required: true,
                minlength: 30
            },
            status_informacoes_adicionais: {
                required: true
            },
            numero_notificacao_ano_anterior: {
                maxlength: 4

            },
            numero_notificacao_anterior: {
                maxlength: 3
            },
            numero_processo_notificacao_anterior: {
                maxlength: 3
            },
            ano_processo_notificacao_anterior: {
                maxlength: 4
            },
            numero_licenca_notificacao_anterior: {
                maxlength: 3
            },
            ano_licenca_notificacao_anterior: {
                maxlength: 4
            },
            orgao_emissor_licenca: {
                minlength: 4,
                isString: true
            },
            nome_notificado: {
                minlength: 12,
                isString: true
            },
            logradouro: {
                minlength: 5
            },
            bairro: {
                minlength: 5
            },
            testemunha: {
                minlength: 8,
                isString: true
            },
            status_notificado: {
                required: true
            },
            fiscal: {
                required: true
            },
            chefe: {
                required: true
            }
        },
        //na  linha abaixo sao criada as mensagem que serao vista pelo usuarios
        messages: {
            empresa: {
                required: "Campo Obrigatório*"
            },
            processo: {
                required: "Campo Obrigatório*"
            },
            numero_notificacao: {
                required: "Campo Obrigatório*",
                maxlength: "Erro! Informe no Máximo 3 Digitos!"
            },
            ano_notificacao: {
                required: "Campo Obrigatório*"
            },
            data_notificacao: {
                required: "Campo Obrigatório*"
            },
            data_comparecimento: {
                required: "Campo Obrigatório*"
            },
            profissao_atividade: {
                required: "Campo Obrigatório*",
                minlength: "Profisssão e / ou Atividade Realizada Inválida, Por Favor Informe Mais Detalhes!"

            },
            descricao_prazo: {
                required: "Campo Obrigatório*",
                minlength: "Descrição e / ou Prazo Inválidos, Por Favor Informe Mais Detalhes!"
            },
            status_informacoes_adicionais: {
                required: "Campo Obrigatório*"
            },
            numero_notificacao_ano_anterior: {
                maxlength: "Erro! Por Favor Insira no Máximo 4 numeros"

            },
            numero_notificacao_anterior: {
                maxlength: "Erro! Por Favor Insira somente 3 numeros"
            },
            numero_processo_notificacao_anterior: {
                maxlength: "Erro! Por Favor Insira somente 3 numeros"
            },
            ano_processo_notificacao_anterior: {
                maxlength: "Erro! Por Favor Insira somente 4 numeros"
            },
            numero_licenca_notificacao_anterior: {
                maxlength: "Erro! Por Favor Insira somente 3 numeros"
            },
            ano_licenca_notificacao_anterior: {
                maxlength: "Erro! Por Favor Insira somente 4 numeros"
            },
            orgao_emissor_licenca: {
                minlength: "Erro! Por Favor, Mais Detalhes"
            },
            nome_notificado: {
                minlength: "Erro! Por Favor Informe Mais Detalhes"
            },
            logradouro: {
                minlength: "Erro! Por Favor Informe Mais Detalhes"
            },
            bairro: {
                minlength: "Erro! Por Favor Informe Mais Detalhes"
            },
            testemunha: {
                minlength: "Erro! Por Favor Informe Mais Detalhes"
            },
            status_notificado: {
                required: "Campo Obrigatório*"
            },
            fiscal: {
                required: "Campo Obrigatório*"
            },
            chefe: {
                required: "Campo Obrigatório*"
            }
        }
    });
});
