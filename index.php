<?php
session_start();  
//including the database connection file
include_once("config.php");
    
    
//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM usuario ORDER BY id DESC");

?>
 
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--//compatibilidade com telas variadas-->

    <title>Teste K13 CRUD</title>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/bootbox.min.js" type="text/javascript"></script>

    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    
  </head>
  <body>
    <nav class="navbar navbar-inverse menu">
        <div class="container">
            <div class="navbar-header col-md-12">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-left">
                      <li><span class="navbar-brand menu-info"></span></li>
                      <li><a class="navbar-brand" href="add.php">Adicionar novo usuario</a></li>
                    </ul>
                </div>
            </div>
    </nav>
        
</head>
 
<body>     
    <table width='100%'>

        <tr bgcolor='#CCCCCC'>
            <td>Nome</td>
            <td>CEP</td>
            <td>Rua</td>
            <td>Numero</td>
            <td>Complemento</td>
            <td>Bairro</td>
            <td>Cidade</td>
            <td>Estado</td>
            <td>Telefone</td>
        </tr>
    <?php     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {  
        echo "<tr>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['cep']."</td>";
        echo "<td>".$row['rua']."</td>";
        echo "<td>".$row['numero']."</td>";    
        echo "<td>".$row['complemento']."</td>";   
        echo "<td>".$row['bairro']."</td>";    
        echo "<td>".$row['cidade']."</td>";    
        echo "<td>".$row['estado']."</td>";    
        echo "<td>".$row['telefone']."</td>";    
        echo "<td><a href=\"edit.php?id=$row[id]\">Editar</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Voce tem certeza que deseja EXCLUIR?')\">Excluir</a></td>";        
    }
    ?>
    </table>
</body>
</html>