<?php
    require "QueryBilder.php";
    $qb = new QueryBilder;
    $tasks=$qb->show("task");
    
    if(!session_start())session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Task Manager</title>
</head>
<body>
    <?php if(empty($_SESSION)): ?>
        <H4><a href="register.php">Register</a></H4>
        <H4><a href="login.php">Login</a></H4>
    <?php else: ?> 
        <form action="auth.php" method="post">
        <input type="submit" name="logout" value="Logout">
        </form>
    <?php endif;?>
    

    <H1>Tasks</H1>
    <?php if(!empty($_SESSION)): ?>
    <div class="but">
        <button class="add""><a href="create.php">Add task</a></button>
    </div>
    
    <div class="task">
        <span>N</span>
        <div>Nazva</div>
        
    </div>
    <?php foreach ($tasks as $task): ?>
    <div class="task">
        <span><?= $task['id'];?></span>
        <div><?= $task['title'];?></div>
        <button class="show"><a href="show.php?id=<?= $task['id'];?>">Show</a></button>
        <button class="edit"><a href="edit.php?id=<?= $task['id'];?>">Edit</a></button>
        <button class="delete"><a href="delete.php?id=<?= $task['id'];?>">Delete</a></button>
    </div>
    <?php endforeach; ?>
    <?php endif;?>
</body>
</html>