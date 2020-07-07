<?php $this->layout('layout') ?>

    <div class="container">
        <H1 class="home"><a href="/app/tasks">My Tasks</a></H1>
        <h1>Register new User</h1>
        <form action="./register" method="post">
            <div class="form-group create-form">
                <label for="register-email">Enter your email:</label>
                <input type="email" name="email" id="register-email" placeholder="Email" class="form-control">
                <label for="register-login">Enter your login:</label>
                <input type="login" name="login" id="register-login" placeholder="Login" class="form-control">
                <label for="register-password">Enter your password:</label>
                <input type="password" name="password" id="register-password" placeholder="Password" class="form-control">
                <input type="submit" name="register" value="Register" class="btn btn-primary">
            </div>
            
        </form>
    </div>