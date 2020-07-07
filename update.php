<?php
$data=[
    "id"=>$_GET['id'],
    "title"=>$_POST['title'],
    "content"=>$_POST['content']
];
$id=$_GET['id'];
$pdo=new PDO("mysql:host=localhost;dbname=mydb","root","");
$sql='UPDATE `task` SET title=:title, descr=:content WHERE id=:id';
$ex=$pdo->prepare($sql);
$ex->execute($data);

header("Location: /");
