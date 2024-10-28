<?php 
session_start();
include_once 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $usuario = $_POST['txt_usuario'];
    $senha = $_POST['txt_senha'];

    
    if ($usuario === USUARIO && $senha === SENHA) {
        
        $_SESSION['loginSucesso'] = "Bem-vindo!";
        header("Location: painel.php"); 
    } else {
        
        $_SESSION['loginErro'] = "Usuário ou senha inválidos.";
        header("Location: login.php"); 
    }
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CODERPHP</title>
  <link rel="stylesheet" href="css/signin.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body style="background-image: url('img/matrix.gif') ">

 <section class="asdsd">
  <div class="login">
   <center> <img style="border-radius:50%;" border="0" height="80px" src="img/images.png" alt=""></center>
   <form class="form-signin" action="login.php" method="post">
     <center>
      <h1 style='font-size:19px;' class="sadsadsd">Painel Admin: Login Serasa</h1>
    </center>
    <!--- essa parte de login foi feita pelo meus amg da elite cordes --->
    <p class="text-center text-danger">
      <br>
      <span class="errovermelhor">   
        <?php if(isset($_SESSION['loginErro'])) {
          echo $_SESSION['loginErro'];
          unset($_SESSION['loginErro']);
        } ?> 
      </span>
    </p>

    <p class="text-center text-success">
      <span class="sucesso">
        <?php if(isset($_SESSION['loginDeslogado'])) {
          echo $_SESSION['loginDeslogado'];
          unset($_SESSION['loginDeslogado']);
        } ?>
      </span>
    </p>

    <div class="form-group">
      <label style="color:white;">Usuário</label>
      <input type="text" required class="form-control" name="txt_usuario" placeholder="Seu E-mail">               
    </div>
    <div class="form-group">
      <label style="color:white;">Senha</label>
      <input type="password" required name="txt_senha" class="form-control" placeholder="Sua Senha">
    </div>
    <input type="submit" value="Entrar!" class="btn"> 
    <br><br>
    <hr style="border:solid 1px rgb(229, 229, 229);"> 
  </form>
</div>
</section>
</body>
</html>
