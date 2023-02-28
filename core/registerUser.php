<?php

require "functions.php";



//Objectif : Insérer en BDD l'utilisateur (9 champs)

//Récupérer les valeurs de l'internaute
//Variables SUPER GLOBALE
// -->Accessible partout
// -->Commence par $_ et en majuscule
// -->Créée et alimentée par le serveur
// -->Contient forcément un tableau

print_r($_POST); 
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
}



// Date de naissance -> entre 6 et 80
// Email -> Unicité
// Pwd -> Min 8 caractères avec minuscules majuscules et chiffres
//pwdConfirm -> = Pwd


if( empty($listOfErrors))
{
	//SI OK
	//Insertion en BDD
	//Redirection login
}else{
	//SI NOK
	//Redirection sur register avec les erreurs
}