<?php
  define( 'MYSQL_HOST', 'sql138.main-hosting.eu' );
  define( 'MYSQL_USER', 'u292238768_login' );
  define( 'MYSQL_PASSWORD', 'login123' );
  define( 'MYSQL_DB_NAME', 'u292238768_login' );

  try{
    $PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
  } catch ( PDOException $e ) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage(); 
  }

  if(isset($_SESSION['login_tentativas']) && $_SESSION['login_tentativas'] >= 3) {
    if(!isset($_SESSION['captcha'])) {
      $n = rand(1000, 9999);
      $_SESSION['captcha'] = $n;
    }
  }

  if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE email LIKE '%".$email."%' AND password LIKE '%".$password."%'";
    $result = $PDO->query( $sql );
    $rows = $result->rowCount();

    if($rows > 0) {
      if($_SESSION['login_tentativas'] < 3){
        $_SESSION['tokenUser'] = 326523474892;
      } else if (!empty($_POST['codigo']) && $_POST['codigo'] == $_SESSION['captcha']) {
        $_SESSION['login_tentativas'] = 0;
        $_SESSION['tokenUser'] = 326523474892;
      }
    } else {
      if(!isset($_SESSION['login_tentativas'])) {
        $_SESSION['login_tentativas'] = 0;
      }
      $tentativas = 3;
      $tentativas -= $_SESSION['login_tentativas'];
      
      $_SESSION['login_tentativas']++;
      //echo "Senha Incorreta";
      // echo "Você tem apenas mais ".$tentativas." tentativa";
    }
  }
  $n = rand(1000, 9999);
  $_SESSION['captcha'] = $n;
?>