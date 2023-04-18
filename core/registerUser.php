<?php
session_start();
require "../conf.inc.php";
require "functions.php";




//Objectif : Insérer en BDD l'utilisateur (9 champs)

//Récupérer les valeurs de l'internaute
//Variables SUPER GLOBALE
// -->Accessible partout
// -->Commence par $_ et en majuscule
// -->Créée et alimentée par le serveur
// -->Contient forcément un tableau

//print_r($_POST); 
/*
Array ( [gender] => 0 [lastname] => Skrzypczyk [firstname] => yves [birthday] => 1986-11-29 [city] => 0 [email] => y.skrzypczyk@gmail.com [pwd] => fds [pwdConfirm] => gdfs [cgu] => on )
*/

//Vérification macro
//Vérification du nb et des champs required non vides
if( count($_POST) != 9 
	|| !isset($_POST["gender"])
	|| empty($_POST["lastname"])
	|| empty($_POST["firstname"])
	|| empty($_POST["birthday"])
	|| !isset($_POST["city"])
	|| empty($_POST["email"])
	|| empty($_POST["pwd"])
	|| empty($_POST["pwdConfirm"])
	|| empty($_POST["cgu"])
)
{
	die("Tentative de HACK !!!!");
}

//Nettoyer les valeurs
// -> Prénom
// -> Nom
// -> Email
$gender = $_POST["gender"];
$lastname = cleanLastname($_POST["lastname"]);
$firstname = cleanFirstname($_POST["firstname"]);
$email = cleanEmail($_POST["email"]);
$pwd = $_POST["pwd"];
$pwdConfirm = $_POST["pwdConfirm"];
$city = $_POST["city"];
$birthday = $_POST["birthday"];


$listOfErrors = [];
//Vérification micro des valeurs

// Gender -> Soit 0, 1 ou 2
$listOfGenders = [0,1,2];
if( !in_array($gender, $listOfGenders) ){
	$listOfErrors[] = "Le genre n'existe pas";
}
// Lastname -> >= 2 caractères
if(strlen($lastname) < 2){
	$listOfErrors[] = "Le nom doit faire plus de 2 caractères";
}
// Firstname -> >= 2 caractères
if(strlen($firstname) < 2){
	$listOfErrors[] = "Le prénom doit faire plus de 2 caractères";
}
// City -> Soit 0, 1 ou 2
$listOfCities = [0,1,2];
if( !in_array($city, $listOfCities) ){
	$listOfErrors[] = "La ville n'existe pas";
}
// Email -> Format
if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
	$listOfErrors[] = "L'email est incorrect";
}else{

	// Email -> Unicité
	$connection = connectDB();
	$queryPrepared = $connection->prepare("SELECT id FROM ".DB_PREFIX."user WHERE email=:email");
	$queryPrepared->execute([
								"email"=>$email
							]);

	$result = $queryPrepared->fetch();

	if(!empty($result)){
		$listOfErrors[] = "L'email est déjà utilisé";
	}

}


// Date de naissance -> entre 6 et 80
//echo $birthday; // 1986-11-29
//time() et strtotime()

$birthdayExploded = explode("-", $birthday);

if( !checkdate($birthdayExploded[1], $birthdayExploded[2], $birthdayExploded[0])){
	$listOfErrors[] = "Format de date incorrect";
}else{
	$todaySecond = time();
	$birthdaySecond = strtotime($birthday);
	$ageSecond = $todaySecond - $birthdaySecond;
	$age = $ageSecond/60/60/24/365.25;
	if( $age < 6 || $age > 80  ) {
		$listOfErrors[] = "Vous n'avez pas l'âge requis";
	}
}


// Pwd -> Min 8 caractères avec minuscules majuscules et chiffres
if( strlen($pwd)<8 || 
	!preg_match("#[a-z]#", $pwd)  || 
	!preg_match("#[A-Z]#", $pwd)  || 
	!preg_match("#[0-9]#", $pwd) ){

		$listOfErrors[] = "Votre mot de passe doit faire au minimum 8 caractères avec des minuscules, des majuscules et des chiifres";
}


//pwdConfirm -> = Pwd
if( $pwd != $pwdConfirm ){
		$listOfErrors[] = "Votre mot de passe de confirmation ne correspond pas";
}


if( empty($listOfErrors))
{
	//SI OK
	//Insertion du USER
	$queryPrepared = $connection->prepare("INSERT INTO ".DB_PREFIX."user 
										(gender, firstname, lastname, email, pwd, birthday, city)
										VALUES 
										(:gender, :firstname, :lastname, :email, :pwd, :birthday, :city)");

	$queryPrepared->execute([
								"gender"=>$gender,
								"firstname"=>$firstname,
								"lastname"=>$lastname,
								"email"=>$email,
								"pwd"=>password_hash($pwd, PASSWORD_DEFAULT),
								"birthday"=>$birthday,
								"city"=>$city
							]);

	//Redirection vers la page login
	header("location: ../login.php");

}else{
	//SI NOK
	//Redirection sur register avec les erreurs
	$_SESSION['errors'] = $listOfErrors;
	header("location: ../register.php");

}