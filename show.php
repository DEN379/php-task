<?php 
$id=$_GET['id'];
$pdo=new PDO("mysql:host=test;dbname=tasks","root","");
$sql='SELECT * FROM `task` WHERE id=:id';
$ex=$pdo->prepare($sql);
$ex->bindParam("id",$id);
$ex->execute();
$task=$ex->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task</title>
</head>
<body>
    <h1><?=$task['title']; ?></h1>
    <h2><?= $task['descr'];?></h2>
</body>
</html>