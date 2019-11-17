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
    <div class="row">
        <div class="col-md-12">
            <h1>All Tasks</h1>
            <?php if($_SESSION['user']): ?>
            <a href="./tasks/create" class="btn btn-success">Add Task</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($tasks as $task):?>
                    <tr>
                        <td><?= $task['id'];?></td>
                        <td><?= $task['title'];?></td>
                        <td>
                            <a href="./tasks/<?= $task['id'];?>" class="btn btn-info">
                                Show
                            </a>
                            <a href="./tasks/<?= $task['id'];?>/edit" class="btn btn-warning">
                                Edit
                            </a>
                            <a onclick="return confirm('are you sure?');" href="./tasks/<?= $task['id'];?>/delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
            <?php endif;?>
        </div>
    </div>
</div>
