function processo(){
    if(document.frmprocesso.Orgao.value === ""){
        alert('Informe o Orgao Emissor');
        document.frmprocesso.Orgao.focus();
        return false;
    }
    
    if(document.frmprocesso.Numero_Processo.value === ""){
        alert('Informe o Numero do Processo');
        document.frmprocesso.Numero_Processo.focus();
        return false;
    }
    
    if(document.frmprocesso.Data_Processo.value === ""){
        alert('Informe a Data de Abertura do Processo');
        document.frmprocesso.Data_Proceeso.focus();
        return false;
    }
    if(document.frmprocesso.tb_autuadoinfrator.value === ""){
        alert('Selecione o Nome / Atuado Infrator');
        document.frmprocesso.tb_autuadoinfrator.focus();
        return false;
    }
    if(document.frmprocesso.Assunto.value === ""){
        alert('Informe o Assunto');
        document.frmprocesso.Assunto.focus();
        return false;
    }
    
}

