<?php
$id=$_GET['id'];
$pdo = new PDO("mysql:host=test;dbname=tasks","root","");
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
    <title>Edit task</title>
</head>
<body>
    <form action="update.php?id=<?= $task['id'];?>" method="post">
        <p>Nazva: <input type="text" name="title" value="<?=$task['title']; ?>"></p>
        <p>Opis: <textarea name="content"><?=$task['descr'];?></textarea></p>
        <input type="submit">
    </form>
</body>
</html>