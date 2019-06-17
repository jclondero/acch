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

  if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE email LIKE '%".$email."%' AND password LIKE '%".$password."%'";
    $result = $PDO->query( $sql );
    $rows = $result->rowCount();

    // if(isset($_SESSION['login_tentativas']) && $_SESSION['login_tentativas'] >= 3) {
    //   echo "Você estourou o limite de tentativas <br/>";
    //   echo "Seu acesso está bloqueado";
    // } else {
      if($rows > 0) {
        //$_SESSION['tokenUser'] = 326523474892; //token aleatório
        //echo "ACESSO PERMITIDO";
        $_SESSION['tokenUser'] = 326523474892;
      } else {
        // if(!isset($_SESSION['login_tentativas'])) {
        //   $_SESSION['login_tentativas'] = 0;
        // }
        // $tentativas = 3;
        // $tentativas -= $_SESSION['login_tentativas'];
        
        // $_SESSION['login_tentativas']++;
        //echo "Senha Incorreta";
        // echo "Você tem apenas mais ".$tentativas." tentativa";
      }
    // }
  }
?>