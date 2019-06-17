<?php
  if(!isset($_SESSION) || !isset($_SESSION['tokenUser'])) {
    session_start();
  }
  require('checkLogin.php');
  if(isset($_SESSION['tokenUser'])){
    header('Location: index.php');
    exit;
  }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">
<hr>

<div class="row">
  <aside class="col-xs-12 col-lg-6">
  <div class="card">
  <article class="card-body">
    <a href="" class="float-right btn btn-outline-primary">Cadastrar</a>
    <h4 class="card-title mb-4 mt-1">Sistema de Login</h4>
      <form method="POST">
        <div class="form-group">
          <label>Digite seu email</label>
            <input name="email" class="form-control" placeholder="Email" type="email">
        </div>
        <div class="form-group">
          <a class="float-right" href="#">Esqueceu sua senha?</a>
          <label>Digite sua senha</label>
            <input name="password" class="form-control" placeholder="******" type="password">
        </div>
        <div class="form-group"> 
        <div class="checkbox">
          <label> <input type="checkbox"> Salvar Senha </label>
        </div>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary btn-block" value="Logar" />
        </div>                                                        
      </form>
  </article>
</div>