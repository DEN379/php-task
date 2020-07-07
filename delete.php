<?php 
$id=$_GET['id'];
$pdo= new PDO("mysql:host=localhost;dbname=mydb","root","");
$sql="DELETE FROM `task` WHERE id=:id";
$ex=$pdo->prepare($sql);
$ex->bindParam("id",$id);
$ex->execute();
header("Location: /");
