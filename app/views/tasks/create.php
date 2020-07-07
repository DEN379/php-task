<?php $this->layout('layout') ?>

<div class="container">
    <H1 class="home"><a href="/app/tasks">My Tasks</a></H1>
        <h1>Create new task</h1>
        <form action="store.php" method="post">
            <div class="form-group create-form">
                <label for="create-title">Enter title for task:</label>
                <input type="text" name="title" id="create-title" placeholder="Title" class="form-control">
                <label for="create-textarea">Enter description of task</label>
                <textarea name="content" id="create-textarea" placeholder="Description" class="form-control"></textarea>
                <input type="submit" class="btn btn-primary">
            </div>
            
        </form>
</div>