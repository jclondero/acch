<?php
  if(!isset($_SESSION)) {
    session_start();
  }
  if(!isset($_SESSION['tokenUser'])){
    session_write_close();
    header('Location: login.php');
    exit;
  }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function deslogar(){
    window.location.href = "http://loginwithcaptcha.londeroapps.com.br/deslogar.php";
  }
</script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">
<hr>

<div class="row">
  <aside class="col-lg-12">
  <h1>Seja bem vindo ao Sistema</h1>
  <button class="btn btn-primary btn-block" onclick="deslogar()">Deslogar</button>
</div>