<?php
//incluindo o arquivo de conexão com o BD
include("config.php");
 
//pegando dados atraves da URL
$id = $_GET['id'];
 
//excluindo a linha da tabela
$sql = "DELETE FROM usuario WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
 
//redirecionando para a index
header("Location:index.php");
?>