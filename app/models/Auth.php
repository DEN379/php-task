<?php 
namespace App\models;
require __DIR__ . '../../vendor/autoload.php';
use Delight\Auth\Auth;
if (!session_status())session_start();
use PDO;
class Auths
{
    private $pdo;
    private $auth;
    public function __construct(PDO $pdo,Auth $auth)
    {
        $this->pdo= $pdo;
        $this->auth = $auth;
    }



//if ($_POST['register'])
//{
public function register()
{
    try {
        $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
            echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
        });

        echo 'We have signed up a new user with the ID ' . $userId;
    } catch
    (\Delight\Auth\InvalidEmailException $e) {
        die('Invalid email address');
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        die('Invalid password');
    } catch (\Delight\Auth\UserAlreadyExistsException $e) {
        die('User already exists');
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    }
}

//if ($_POST['login']) {
public function login()
{
var_dump("de ya");
    try {
        $this->auth->login($_POST['email'], $_POST['password']);
        header("Location: /app/tasks");
        // echo 'User is logged in';
    } catch (\Delight\Auth\InvalidEmailException $e) {
        die('Wrong email address');
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        die('Wrong password');
    } catch (\Delight\Auth\EmailNotVerifiedException $e) {
        die('Email not verified');
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    }
}

//if ($_POST['logout']) {
public function logout(){
    try {
        $this->auth->logOut();
        header("Location: /app/tasks");
    } catch (\Delight\Auth\NotLoggedInException $e) {
        die('Not logged in');
    }
}
}