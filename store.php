<?php
require "QueryBilder.php";
$data = [
    "title" =>  $_POST['title'],
    "descr"   =>  $_POST['descr']
];
$qb = new QueryBilder;
$qb->store("task",$data);

header("Location: /");
exit;