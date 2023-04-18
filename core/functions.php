<?php

function helloWorld()
{
	echo "Hello world";
}


function cleanLastname($lastname){
	return strtoupper(trim($lastname));
}

function cleanFirstname($firstname){
	return ucwords(strtolower(trim($firstname)));
}

function cleanEmail($email){
	return strtolower(trim($email));
}

function connectDB(){
	//Connexion à la bdd (DSN, USER, PWD)
	try{
		$connection = new PDO("mysql:host=localhost;dbname=projet_web_1a4;port=3306", "root", "");
	}catch(Exception $e){
		die("Erreur SQL ".$e->getMessage());
	}

	return $connection;
}


function isConnected(){

	if(!empty($_SESSION["email"]) && !empty($_SESSION["login"])){
		
		$connect = connectDB();
		$queryPrepared = $connect->prepare("SELECT id FROM esgi_user WHERE email=:email");
		$queryPrepared->execute(["email"=>$_SESSION["email"]]);
		$result = $queryPrepared->fetch();
		//Si l'email que l'on a en session existe aussi dans la bdd
		//alors on part du principe que l'utilisateur est bien connecté
		if(!empty($result)){
			return true;
		}
	}

	return false;
}

function redirectIfNotConnected(){
	if(!isConnected()){
		header("Location: login.php");
	}
}