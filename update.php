<?php
require "QueryBilder.php";
$data=[
    "id"=>$_GET['id'],
    "title"=>$_POST['title'],
    "descr"=>$_POST['descr']
];
$qb = new QueryBilder;
$qb->update("task",$data);

header("Location: /");
