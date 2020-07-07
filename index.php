<?php
    $pdo = new PDO("mysql:host=localhost;dbname=mydb","root","");
    $sql="SELECT * FROM `task`";
    $ex=$pdo->prepare($sql);
    $result=$ex->execute();
    $tasks=$ex->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Task Manager</title>
</head>
<body>
  <div class="container">
  <H1 class="home"><a href="/">My Tasks</a></H1>
    <div class="but">
        <a href="create.php" class="btn btn-success">Add task</a> 
    </div>
   
    

    <div class="task-example task">
        <span>#</span>
        <div>Title</div>
	<div>Description</div>
        
    </div>
    <?php foreach ($tasks as $task): ?>
    <div class="task">
        <span><?= $task['id'];?></span>
        <div><?= $task['title'];?></div>
	<div class="description"><?= $task['descr'];?></div>
        <a href="show.php?id=<?= $task['id'];?>" class="btn btn-outline-primary">Show</a>
        <a href="edit.php?id=<?= $task['id'];?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?= $task['id'];?>" class="btn btn-danger">Delete</a>
    </div>
    <?php endforeach; ?>

</div>
</body>
</html>