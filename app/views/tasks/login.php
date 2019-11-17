<?php $this->layout('layout') ?>

    <h1>Login to your account</h1>
    <form action="./auth" method="post">
        <P>Email: <input type="email" name="email"></P>
        <P>Password: <input type="password" name="password"></P>
        <input type="submit" name="login" value="Login">
    </form>
