<?php 
session_start();
$id=$_GET['id'];
$_SESSION["userID"]=$id;
$url="index.php";
Header("Location: $url");
?> 
