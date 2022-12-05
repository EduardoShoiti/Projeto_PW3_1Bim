<?php
  session_start();
  if(!isset($_SESSION['usuario']) or !isset($_SESSION['senha'])){
    header('location:loginAdm.php');
  }
?>