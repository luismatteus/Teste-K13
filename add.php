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
    //ARQUIVO DE CONEXÃO COM BANCO
        include_once("config.php");
    session_start();

 
if(isset($_POST['Submit'])) {    
   
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
            echo "<script>alert('O campo CEP deve ser preenchido!');</script>"; 
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
       
            // SE TODOS OS CAMPOS ESTÃO PREENCHIDOS INSERE NO BANCO    
        $sql = "INSERT INTO usuario(nome, cep, rua, numero, complemento, bairro, cidade, estado, telefone) VALUES(:nome, :cep, :rua, :numero, :complemento, :bairro, :cidade, :estado, :telefone)";
        $query = $dbConn->prepare($sql);
         
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

          echo "<script type='text/javascript'> alert('Usuario adicionado com sucesso!');</script>";
          echo "<script>javascript:history.go(-1)</script>";
                          header("Location: index.php");

    }
}
?>
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
                      <li><a href="index.php">Voltar</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
            </div>
        </nav>
        
    <div class="container">
    <div class="centro-menu">
        <p>Dados para cadastro</p>
    <form method="post" name="form1" class="col-md-8">
            
        <div class="form-group">
            <label for="nome">Nome do usuário</label>
            <input type="text" class="form-control" name="nome" aria-describedby="emailHelp" autofocus="" placeholder="Digite seu nome">
        </div>   
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="number" class="form-control" name="cep" aria-describedby="emailHelp" placeholder="Digite o CEP">
        </div>   
        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" name="rua" aria-describedby="emailHelp" placeholder="Digite a rua ">
        </div>            
        <div class="form-group">
            <label for="numero">Numero</label>
            <input type="number" class="form-control" name="numero" aria-describedby="emailHelp" placeholder="Digite o número">
        </div>     
        <div class="form-group">
            <label for="complemento">Complemento</label>
            <input type="text" class="form-control" name="complemento" aria-describedby="emailHelp" placeholder="Digite o complemento">
        </div>   
         <div class="form-group">
            <label for="nome">Bairro</label>
            <input type="text" class="form-control" name="bairro" aria-describedby="emailHelp" placeholder="Digite o bairro">
        </div>
        <div class="form-group">
            <label for="nome">Cidade</label>
            <input type="text" class="form-control" name="cidade" aria-describedby="emailHelp" placeholder="Digite a cidade">
        </div>
        <div class="form-group">
            <label for="nome">Estado</label>
            <input type="text" class="form-control" name="estado" aria-describedby="emailHelp" placeholder="Digite o estado">
        </div>
        <div class="form-group">
            <label for="email">Telefone </label>
            <input type="number" class="form-control" name="telefone" aria-describedby="emailHelp" placeholder="Digite seu telefone celular">
        </div>  

           <input type="submit" name="Submit" value="Adicionar" class="btn btn-success"> 

    </form>
    </div>
    </div>

</body>
</html>