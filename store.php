<?php
$pdo = new PDO("mysql:host=localhost;dbname=mydb","root","");
$sql="INSERT INTO `task`(title,descr) VALUES (:title,:descr)";
$ex=$pdo->prepare($sql);
$ex->bindParam("title",$_POST['title']);
$ex->bindParam("descr",$_POST['content']);
$ex->execute();

header("Location: /");
exit;