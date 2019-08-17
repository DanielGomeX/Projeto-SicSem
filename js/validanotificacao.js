function notificacao(){
    
    if(document.frmnotificacao.tb_autuadoinfrator.value === ""){
        alert("Por Favor Selecione o Autuado");
        document.frmnotificacao.tb_autuadoinfrator.focus();
        return false;
    }
    if(document.frmnotificacao.nome_fiscal.value === ""){
        alert("Por Favor! Selecione o Fiscal");
        document.frmnotificacao.nome_fiscal.focus();
        return false;
    }
    if(document.frmnotificacao.matricula.value === "" ){
        alert("Por Favor! Selecione a matricula");
       document.frmnotificacao.matricula.focus();
        return false;
    }
   if(document.frmnotificacao.Numero_Notificacao.value === ""){
        alert("Por Favor! Informe o Numero da Notificacao");
        document.frmnotificacao.Numero_Notificacao.focus();
        return false;
    }      
   if(document.frmnotificacao.tb_processo.value === ""){
        alert("Por Favor! Informe o Numero do processo");
        document.frmnotificacao.tb_processo.focus();
        return false;
    }      
   if(document.frmnotificacao.Data_PrazoNotificacao.value === ""){
        alert("Por Favor! Informe a Data do Prazo");
        document.frmnotificacao.Data_PrazoNotificacao.focus();
        return false;
    }      
   if(document.frmnotificacao.Descricao_PrazoNotificacao.value === ""){
        alert("Por Favor! Informe a Descricao do Prazo");
        document.frmnotificacao.Descricao_PrazoNotificacao.focus();
        return false;
    }      
   if(document.frmnotificacao.Irregularidade.value === ""){
        alert("Por Favor! Informe a Irregularidade");
        document.frmnotificacao.Irregularidade.focus();
        return false;
    }      
}

