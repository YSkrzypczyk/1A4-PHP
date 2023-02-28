<?php

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


//Vérification micro des valeurs
// Gender -> Soit 0, 1 ou 2
// Lastname -> >= 2 caractères
// Firstname -> >= 2 caractères
// Date de naissance -> entre 6 et 80
// City -> Soit 0, 1 ou 2
// Email -> Format
// Email -> Unicité
// Pwd -> Min 8 caractères avec minuscules majuscules et chiffres
//pwdConfirm -> = Pwd


//SI OK
//Insertion en BDD
//Redirection login


//SI NOK
//Redirection sur register avec les erreurs
