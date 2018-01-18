<!DOCTYPE html>
<html lang="pt-br">
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--//COMPATIBILIDADE COM TELAS DIFERENTES-->

        <title>Teste K13 CRUD</title>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/bootbox.min.js" type="text/javascript"></script>

        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    
    </head>
  <body>
<?php
    //INCLUINDO A CONEX�O COM O BANCO DE DADOS
    include_once("config.php");
        session_start();

if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $nome=$_POST['nome'];
    $cep=$_POST['cep'];
    $rua=$_POST['rua'];
    $numero=$_POST['numero']; 
    $complemento=$_POST['complemento']; 
    $bairro=$_POST['bairro']; 
    $cidade=$_POST['cidade']; 
    $estado=$_POST['estado']; 
    $telefone=$_POST['telefone'];

    
    // CONFERE SE TODOS OS CAMPOS ESTÃO PREENCHIDOS
    if(empty($nome) || empty($cep) || empty($rua) || empty($numero) || empty($complemento) || empty($bairro) || empty($cidade) || empty($estado) || empty($telefone)) {

        if(empty($nome)) {
           echo "<script>alert('O campo Nome deve ser preenchido!');</script>"; 
        }
        if(empty($cep)) {
            echo "<script>alert('O campo Cep deve ser preenchido!');</script>"; 
        }
        if(empty($rua)) {
            echo "<script>alert('O campo Rua deve ser preenchido!');</script>"; 
        }
        if(empty($numero)) {
            echo "<script>alert('O campo Numero deve ser preenchido!');</script>";
        }        
        if(empty($complemento)) {
            echo "<script>alert('O campo Complemento deve ser preenchido!');</script>";
        } 
        if(empty($bairro)) {
            echo "<script>alert('O campo Bairro deve ser preenchido!');</script>";
        } 
        if(empty($cidade)) {
            echo "<script>alert('O campo Cidade deve ser preenchido!');</script>";
        } 
        if(empty($estado)) {
            echo "<script>alert('O campo Estado deve ser preenchido!');</script>";
        } 
        if(empty($telefone)) {
            echo "<script>alert('O campo Telefone deve ser preenchido!');</script>";
        } 
    } else { 
                header("Location: index.php");

            // SE TODOS OS CAMPOS ESTÃO PREENCHIDOS FAZ UPDATE NO BANCO    
        $sql = "UPDATE usuario SET nome= :nome, cep= :cep, rua= :rua, numero= :numero, complemento= :complemento, bairro= :bairro, cidade= :cidade, estado= :estado, telefone= :telefone WHERE id= :id";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':nome', $nome);
        $query->bindparam(':cep', $cep);
        $query->bindparam(':rua', $rua);
        $query->bindparam(':numero', $numero);
        $query->bindparam(':complemento', $complemento);
        $query->bindparam(':bairro', $bairro);
        $query->bindparam(':cidade', $cidade);
        $query->bindparam(':estado', $estado);
        $query->bindparam(':telefone', $telefone);
        $query->execute();        
        
                
        //redireciona para index
header("Location: index.php");
    }
}
?>
        <nav class="navbar navbar-inverse menu">
            <div class="container">
                <div class="navbar-header col-md-12">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-left">
                      <li><a href="index.php">Voltar</a></li>
                    </ul>

                </div>
            </div>
        </nav>
<?php
//pega id da URL e trata pra ñ exibir erro
$id = isset($_GET["id"]) ? $_GET["id"] : 0;
//$id = $_GET['id'];
 
//seleciona dados relacionado ao ID
$sql = "SELECT * FROM usuario WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
 
while($rows = $query->fetch(PDO::FETCH_ASSOC))
{   
    $nome = $rows['nome'];
    $cep = $rows['cep'];
    $rua = $rows['rua'];
    $numero = $rows['numero']; 
    $complemento = $rows['complemento']; 
    $bairro = $rows['bairro']; 
    $cidade = $rows['cidade']; 
    $estado = $rows['estado']; 
    $telefone = $rows['telefone'];    
}
?>
<html>
<body>
         <div class="container">
    <div class="centro-menu">
        <p>Editar Usuario</p>

    <form name="form1" method="post" class="col-md-8" action="edit.php">
         <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" value="<?php echo $nome; ?>" name="nome" aria-describedby="emailHelp" placeholder="Digite seu nome">
        </div>            
        <div class="form-group">
            <label for="usuario">CEP</label>
            <input type="number" class="form-control" value="<?php echo $cep; ?>" name="cep"  aria-describedby="emailHelp" placeholder="Digite o CEP">
        </div>            
        <div class="form-group">
            <label for="senha">Rua</label>
            <input type="text" class="form-control" value="<?php echo $rua; ?>" name="rua" aria-describedby="emailHelp" placeholder="Digite a rua">
        </div>            
        <div class="form-group">
            <label for="email">Numero</label>
            <input type="number" class="form-control" value="<?php echo $numero; ?>" name="numero" aria-describedby="emailHelp" placeholder="Digite o numero">
        </div>      
        <div class="form-group">
            <label for="email">Complemento</label>
            <input type="text" class="form-control" value="<?php echo $complemento; ?>" name="complemento" aria-describedby="emailHelp" placeholder="Digite o complemento">
        </div> 
        <div class="form-group">
            <label for="email">Bairro</label>
            <input type="text" class="form-control" value="<?php echo $bairro; ?>" name="bairro" aria-describedby="emailHelp" placeholder="Digite o bairro">
        </div> 
        <div class="form-group">
            <label for="email">Cidade</label>
            <input type="text" class="form-control" value="<?php echo $cidade; ?>" name="cidade" aria-describedby="emailHelp" placeholder="Digite a cidade">
        </div> 
        <div class="form-group">
            <label for="email">Estado</label>
            <input type="text" class="form-control" value="<?php echo $estado; ?>" name="estado" aria-describedby="emailHelp" placeholder="Digite o estado">
        </div> 
        <div class="form-group">
            <label for="email">Telefone</label>
            <input type="text" class="form-control" value="<?php echo $telefone; ?>" name="telefonefixo" aria-describedby="emailHelp" placeholder="Digite o telefone fixo">
        </div> 
        <td><input type="submit" name="update" value="Salvar" class="btn btn-success"></td>

    </form>
</body>
</html>                                         
