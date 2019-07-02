<?php
  if(!isset($_SESSION)) {
    session_start();
  }
  unset($_SESSION['tokenUser']);
  header('Location: index.php');
?>