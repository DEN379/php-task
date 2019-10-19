<?php 
require "QueryBilder.php";
$id=$_GET['id'];
$qb = new QueryBilder;
$qb->delete("task",$id);
header("Location: /");
