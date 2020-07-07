<?php $this->layout('layout') ?>
<?php if (!isset($_SESSION)) session_start(); ?>

<div class="container">
    <?php if(!$_SESSION['user']): ?>
            <H4><a href="./tasks/register">Register</a></H4>
            <H4><a href="./tasks/login">Login</a></H4>
        <?php else: ?>
<!--            <form action="./Auth" method="post">-->
<!--            <input type="submit" name="logout" value="Logout">-->
<!--            </form>-->
        <H4><a href="./tasks/logout">Logout</a></H4>
        <?php endif;?>
    <div class="container">
        <H1 class="home"><a href="/app/tasks">My Tasks</a></H1>
        <?php if($_SESSION['user']): ?>
            <div class="but">
                <a href="./tasks/create" class="btn btn-success">Add task</a> 
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
                <a href="./tasks/<?= $task['id'];?>" class="btn btn-outline-primary">Show</a>
                <a href="./tasks/<?= $task['id'];?>/edit" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('are you sure?');" href="./tasks/<?= $task['id'];?>/delete" class="btn btn-danger">Delete</a>
            </div>
            <?php endforeach; ?>
            
        <?php endif;?>
    </div>
</div>
