<?php $this->layout('layout') ?>

<div class="container">
    <H1 class="home"><a href="/app/tasks">My Tasks</a></H1>
        <label for="title">Title: </label>
        <h1 id="title"><?=$task['title']; ?></h1>
        <label for="description">Description: </label>
        <h2 id="description"><?= $task['descr'];?></h2>
    </div>