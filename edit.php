<?php
$id=$_GET['id'];
$pdo = new PDO("mysql:host=localhost;dbname=mydb","root","");
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
    <title>Edit task</title>
</head>
<body>
    
    <div class="container">
    <H1 class="home"><a href="/">My Tasks</a></H1>
        <h1 class="">Edit task</h1>
        <form action="update.php?id=<?= $task['id'];?>" method="post">
            <div class="form-group create-form">
                <label for="create-title">Enter title for task:</label>
                <input type="text" name="title" id="create-title" placeholder="Title" class="form-control" value="<?= $task['title']; ?>">
                <label for="create-textarea">Enter description of task</label>
                <textarea name="content" id="create-textarea" placeholder="Description" class="form-control"><?= $task['descr']; ?></textarea>
                <input type="submit" class="btn btn-primary">
            </div>
            
        </form>
    </div>

</body>
</html>