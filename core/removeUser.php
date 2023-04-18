<?php

session_start();
require "../conf.inc.php";
require "functions.php";


redirectIfNotConnected();


$connect = connectDB();
$queryPrepared = $connect->prepare("DELETE FROM ".DB_PREFIX."user WHERE id=:id");
$queryPrepared->execute(["id"=>$_GET['id']]);

header("Location: ../users.php");