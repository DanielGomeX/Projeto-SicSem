
<?php
function setLOG($MSG, $REL) {
$IP = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
$HORA = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
 
$MSGF = mysql_escape_string($MSG); // Limpando String
 
// Monta a query para inserir o log no sistema
$sql = "INSERT INTO `LOGS` VALUES ('".$HORA."', '".$IP."', '".$REL."', '".$MSGF."')";
 
if (mysql_query($sql))
return true;
else
return false;
}
