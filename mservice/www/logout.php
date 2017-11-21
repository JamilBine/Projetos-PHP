<?php 
session_start();
session_destroy();
$url="index.php";
Header("Location: $url");
?> 
