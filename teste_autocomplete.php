<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>simpleAutoComplete JQuery Plugin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Language" content="pt-BR en">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>      
        <script type="text/javascript" src="js/simpleAutoComplete.js"></script>
        <link rel="stylesheet" type="text/css" href="css/simpleAutoComplete.css"/>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $('#estado_autocomplete').simpleAutoComplete('auto_complete_teste.php', {
                    autoCompleteClassName: 'autocomplete',
                    selectedClassName: 'sel',
                    attrCallBack: 'rel',
                    identifier: 'ativ'
                }, estadoCallback);

            });
            function estadoCallback(par)
            {

            }
        </script>
    </head>
    <body>
        <h1>&nbsp;</h1>
        <div style="margin-left:100px;">
            <h2>Digite um estado brasileiro:</h2>
            <form action="recebe_teste.php"  method="POST" name="frmteste">     
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            atividade:<input type="text" id="estado_autocomplete" name="atividade" class="form-control"><br><br>
                        </div>
                    </div>
                </div>
                empresa:<input type="text" id="empresa" name="empresa" style="width:250px; height:23px"><br><br>
                <button type="submit" class="btn btn-success" style="font-size: 17px; font-weight: bold;">REALIZAR CADASTRO<span class="glyphicon glyphicon-saved" style="margin-left: 10px;"></span></button>
            </form>
        </div>
    </body>
</html>

