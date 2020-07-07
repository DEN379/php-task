<?php $this->layout('layout') ?>

    <div class="container">
        <H1 class="home"><a href="/app/tasks">My Tasks</a></H1>
        <h1>Login to your account</h1>
        <form action="./auth" method="post">
            <div class="form-group create-form">
                <label for="login-email">Email:</label>
                <input type="email" name="email" id="login-email" placeholder="Email" class="form-control">
                <label for="login-password">Password:</label>
                <input type="password" name="password" id="login-password" placeholder="Password" class="form-control">
                <input type="submit" name="login" value="Login" class="btn btn-primary">
            </div>
            
        </form>
    </div>