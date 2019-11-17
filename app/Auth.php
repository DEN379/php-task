<?php
namespace App;
use App\models\QueryBilder;
use PDO;
//if (!session_status())session_start();
if (!isset($_SESSION)) {
    session_start();
}
class Auth
{
    public $db;

    public function __construct(QueryBilder $db)
    {
        $this->db = $db;
    }

    public function register()
    {
        $this->db->store('users', [
            'email'  =>  $_POST['email'],
            'password'   =>  $_POST['password']
        ]);
    }

    public function login()
    {
        //  1. Проверить существует ли пользователь в базе
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";
        $statement = $this->db->pdo->prepare($sql);
        $statement->bindParam(":email", $_POST['email']);
        $statement->bindParam(":password", $_POST['password']);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        //var_dump($user);
        //  2. Если да
        //      2.1. Записываем в сессию и возвращаем true
        if($user) {
            $_SESSION['user'] = $user;
            header("Location: /app/tasks");
            //return true;
           // session_start();
        }
        //  3. Если нет
        //      3.1. Возвращаем false
        return false;
    }


    public function logout()
    {
        unset($_SESSION['user']);
//        session_destroy();

        header("Location: /app/tasks");
    }

    public function check()
    {
        if(isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }

    public function currentUser()
    {
        if($this->check()) {
            return $_SESSION['user'];
        }
    }

    public function fullName()
    {
        $user = $this->currentUser();

        return $user['name'] . " " . $user['surname'];
    }
}