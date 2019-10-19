<?php
require "QueryBilder.php";
$id=$_GET['id'];
$qb = new QueryBilder;
$task=$qb->showOne("task",$id);
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
        <p>Opis: <textarea name="descr"><?=$task['descr'];?></textarea></p>
        <input type="submit">
    </form>
</body>
</html>