<?php
try{         
	$bdd = new PDO('mysql:host=localhost;dbname=nationsounds;charset=utf8', 'root', '');    
	 }     
	 catch (Exception $e){         
		 die('Erreur : ' . $e->getMessage());     
         } 
         
session_start();
session_unset();
session_destroy();
header('Location: index.php');
exit();
?>