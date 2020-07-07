<?php 
$id=$_GET['id'];
$pdo=new PDO("mysql:host=localhost;dbname=mydb","root","");
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Task</title>
</head>
<body>
    <div class="container">
    <H1 class="home"><a href="/">My Tasks</a></H1>
        <label for="title">Title: </label>
        <h1 id="title"><?=$task['title']; ?></h1>
        <label for="description">Description: </label>
        <h2 id="description"><?= $task['descr'];?></h2>
    </div>

</body>
</html>