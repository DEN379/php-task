<?php 

require __DIR__ . '/vendor/autoload.php';
use Delight\Auth\Auth;

$pdo = new PDO("mysql:host=test;dbname=tasks","root","");
$auth = new Auth($pdo);
if(!session_start())session_start();

if($_POST['register']){
    try {
        $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
            echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
        });

        echo 'We have signed up a new user with the ID ' . $userId;
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        die('Invalid email address');
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        die('Invalid password');
    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
        die('User already exists');
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    }
}

if($_POST['login']){
    try {
        $auth->login($_POST['email'], $_POST['password']);
        header("Location: /index.php");
       // echo 'User is logged in';
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        die('Wrong email address');
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        die('Wrong password');
    }
    catch (\Delight\Auth\EmailNotVerifiedException $e) {
        die('Email not verified');
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    }
}

if($_POST['logout']){
    try {
        $auth->logOut();
        header("Location: /index.php");
    }
    catch (\Delight\Auth\NotLoggedInException $e) {
        die('Not logged in');
    }
}