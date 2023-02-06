<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Mon premier site en PHP">
	<title>Cours de PHP</title>
</head>
<body>

	<?php

		//commentaire sur une ligne
		/*
			Variables :
			Commence par un $
			camelCase
			logique
			Auto déclarée et auto typée
			Type : String, Integer, Boolean, Float, Null
			Typage dynamique
		*/

		$firstName = "Yves";
		$age = 36;
		$adult = true;
		$size = 1.96;
		$average = null;
		/*
		// Bonjour Yves, tu as 36 ans
		echo "<b>Bonjour</b> " . $firstName." tu as ".$age." ans<br>";

		$x = 5;
		// Bonjour Yves, dans 5 an(s) tu auras 41 ans
		echo "Bonjour ".$firstName.", dans ".$x." an(s) tu auras ".($age+$x)." ans";
		*/

		//Opérateurs arithmétiques
		// + - * / %

		//Incrémentation et décrementation

		/*
		$cpt = 0;
		$cpt += 1;
		$cpt++;
		$cpt = $cpt + 1;
		++$cpt;
		*/

		/*
		$cpt = 0;
		echo $cpt; //0
		echo $cpt + 1; //1
		echo $cpt++; //0
		echo $cpt; //1
		echo --$cpt; //0
		echo $cpt = $cpt + 1; //1
		echo $cpt -=2; //-1
		//echo --$cpt++; //Erreur
		*/


		//Conditions
		//if elseif else
		//Switch
		//Condition ternaire
		//Null coalescent
		// || OR
		// && AND

		/*
		$age = 18;

		if($age <= 0 || $age > 100){
			echo "Menteur";
		}
		elseif($age > 18){
			echo "Majeur";
		}
		elseif($age === 18){
			echo "Tout juste majeur";
		}
		else{
			echo "Mineur";
		}


		$role = "admin";
		switch ($role) {
			case "admin":
				echo "Tout faire";
				break;
			case "editeur":
				echo "Il peut modifier le contenu";
			default:
				echo "Il peut consulter le site";
				break;
		}
		

		//Condition ternaire
		// Juste un if et un else avec une seule et même instruction

		$adult = true;

		if($adult){
			echo "Adulte";
		}else{
			echo "Enfant";
		}

		//Syntaxe : Instruction (condition)?vrai:faux;
		echo ($adult)?"Adulte":"Enfant";


		//Syntaxe : Null Coalescent
		$firstName = null;

		if($firstName != null)
		{
			echo $firstName;
		}else{
			echo "ici ton prénom";
		}

		//Syntaxe instruction variable??defaut
		echo $firstName??"ici ton prénom";
		*/

		//BOUCLES
		//while -> On ne connait pas le nombre d'itération
		//do while -> Au moins une itération
		//for -> On connait le nb d'itération
		//foreach -> pour les tableaux
		/*
		$dice = rand(1,6);
		$cpt = 1;
		while ($dice != 6 ) {
			$dice = rand(1,6);
			$cpt++;
		}
		echo $cpt." Tentatives";

		$cpt = 0;
		do{
			$dice = rand(1,1000);
			$cpt++;
		}while($dice != 6 );
		echo $cpt." Tentatives";

		for( $cpt=0 ; $cpt<10 ; $cpt++){
			echo $cpt;
		}
		*/



		function isPrime($number){
			if($number < 2){
				return false;
			}
			for($cpt=2 ; $cpt <= sqrt($number) ; $cpt++){
				if($number % $cpt == 0){
					return false;
				}
			}
			return true;
		}

		// 2 3 5 7 11 13 ...

		//Afficher Vrai ou faux si un nombre est premier (5 pts)
		$x = 12;

		//echo (isPrime($x))?"Vrai":"Faux";


		//Afficher les nombres premiers entre 1 et 100 (10 pts)
		for($cpt=2 ; $cpt < 100 ; $cpt++){
			//echo (isPrime($cpt))?"<li>".$cpt:"";
		}

		//Afficher les $x premiers nombres premiers (5 pts)
		$start = microtime(true);
		$x = 100;
		$number = 2;
		while( $x > 0 ){
			if(isPrime($number)){
				$x--;
				//echo "<li>".$number;
			}
			$number++;
		}

		//echo (microtime(true)-$start)." secondes";





		// FONCTIONS 
		// camelCase, Anglais, Cohérent, unique

		function helloWorld(){
			//echo "Bonjour";
		}

		helloWorld();
		helloWorld();
		helloWorld();



		function helloYou($firstName = "Inconnu", $lastName = null){
			//global $firstName;
			//echo "Bonjour ".$firstName." ".$lastName;
		}

		$firstName = "Yves";
		$lastName = "SKRZYPCZYK";
		helloYou($firstName, $lastName);
		helloYou($firstName);
		helloYou();


		//Créer une fonction php permettant de nettoyer un prénom
		
		function cleanAndCheckFirstName(&$word){

			$word = ucwords(strtolower(trim($word)));

			return (strlen($word)>=2)?true:false;

		}

		$firstName = " jeAN piERRE  ";
		if(cleanAndCheckFirstName($firstName)){
			//Le prénom .... est OK
			echo "Le prénom ".$firstName." est OK";
		}else{
			//Le prénom .... n'est pas OK
			echo "Le prénom ".$firstName." n'est pas OK";
		}


		//Pointeurs
		/*
		$variable1 = "test1";
		$variable2 = &$variable1;
		$variable1 = "test2";
		$variable2 = "test3"

		echo $variable1; //test3
		*/



	?>




</body>
</html>