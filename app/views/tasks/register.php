<?php $this->layout('layout') ?>

    <h1>Register new User</h1>
    <form action="./register" method="post">
        <P>Email: <input type="email" name="email"></P>
        <P>Username: <input type="text" name="username"></P>
        <P>Password: <input type="password" name="password"></P>
        <input type="submit" name="register" value="Register">
    </form>
