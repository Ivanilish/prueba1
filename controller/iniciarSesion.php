<?php 

@session_start(); 

if($_SESSION["login"] != "login")
{ 
  header('Location: ../../index.php ');
  exit(); 
} 

?>