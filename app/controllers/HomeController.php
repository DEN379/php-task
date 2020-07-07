<?php
namespace App\controllers;

use App\models\QueryBilder;
use League\Plates\Engine;
use Aura\SqlQuery\QueryFactory;
use PDO;


class HomeController
{
    private $view;
    private $queryFactory;
    private $pdo;

    public function __construct(Engine $view, QueryFactory $queryFactory, PDO $pdo)
    {
        $this->view = $view;
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }

    public function index()
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('task');

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $myTasks = $sth->fetchAll(PDO::FETCH_ASSOC);

        echo $this->view->render('tasks/index', ['tasks' => $myTasks]);
    }


    public function show($id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('task')
            ->where('id=:id')
            ->bindValues(['id'  =>  $id]);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $myTask = $sth->fetch(PDO::FETCH_ASSOC);

        echo $this->view->render('tasks/show', ['task' => $myTask]);
    }

    public function edit($id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from('task')
            ->where('id=:id')
            ->bindValues(['id'=>$id]);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        $myTasks = $sth->fetch(PDO::FETCH_ASSOC);

        echo $this->view->render('tasks/edit', ['task' => $myTasks]);
    }

    public function update($id)
    {
        $update = $this->queryFactory->newUpdate();
        $update
            ->table('task')
            ->cols($_POST)
            ->where('id=:id')
            ->bindValues(['id'=>$id]);

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
        header("Location: /app/tasks");
    }

    public function delete($id)
    {
        $delete = $this->queryFactory->newDelete();
        $delete
            ->from('task')
            ->where('id=:id')
            ->bindValues(['id'=>$id]);

        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
        header("Location: /app/tasks");
    }

    public function store()
    {
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into('task')
            ->cols($_POST);

        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($_POST);

        header("Location: /app/tasks");
    }

    public function create()
    {
        echo $this->view->render('tasks/create');
    }

    public function login()
    {
        echo $this->view->render('tasks/login');
    }

    public function register()
    {
        echo $this->view->render('tasks/register');
    }
    public function auth()
    {
        echo $this->view->render('tasks/register');
        header("Location: /app/tasks");
    }
}
