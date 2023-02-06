<?php

//Ancienne version pour déclarer un tableau
//$student = array("JOMAA", "Selim", 20);

//Nouvelle version
$student = ["JOMAA", "Selim", 20];

//Accès à une donnée
//Afficher Selim
//echo $student[1];

//Ajouter la moyenne de 11 à Sélim
$student[3]=11;
$student[]=9;
$student[4]=19;

echo "<pre>";
//print_r($student);
//var_dump($student);
echo "</pre>";


$student = [
				"lastname"=>"Pierre", 
				"firstname"=>"Michel",
				"age"=>20,
			];
//afficher Prénom Nom a age ans
//echo $student["firstname"]." ".$student["lastname"]." a ".$student["age"]." ans";

$student[]=11;

//echo $student[0];

asort($student);

//print_r($student);



//DIMENSION
$student = ["toto", 12]; //1D

$class = [ 
			["toto",12] , 
			["titi",11] 
		]; // 2D

$array = [
			0=>"test",
			1=>[
				0=>1,
				1=>2
			   ]
		]; // 2D



echo "<pre>";
//	print_r($class);
echo "</pre>";

//echo $class[1][0]; //afficher titi

$array = [
			0=>[],
			1=>[
				0=>[
					0=>[
						0=>[],
						1=>[
							0=>[0=>"tutu"]
						]
					],
					1=>[]
				]
			]
		];//6D

echo "<pre>";
//print_r($array);
echo "</pre>";

//echo $array[1][0][0][1][0][0];








$fruits = ["cerise", "tomate", "pomme", "avocat", "fraise"];

echo "<ul>";

foreach ($fruits as $fruit) {
	//echo "<li>".$fruit."</li>";
}

echo "</ul>";

$class = [
			["firstname"=>"Reda","CC1"=>15,"CC2"=>16, "partiel"=>10],
			["firstname"=>"Julien","CC1"=>14,"CC2"=>14, "partiel"=>12],
			["firstname"=>"Célian","CC1"=>14,"CC2"=>14, "partiel"=>4],
			["firstname"=>"Mike","CC1"=>12,"CC2"=>9, "partiel"=>13]
];

$minAverage = 20;
$maxAverage = 0;
$winner;
$looser;

echo '<table border="1px">
	<tr>
		<th>Prénom</th>
		<th>Moyenne</th>
	</tr>';

foreach ($class as $student){




	$average = ($student["CC1"]+$student["CC2"]+$student["partiel"])/3;

	if($average <= $minAverage){
		$looser = $student["firstname"];
		$minAverage = $average;
	}

	if($average >= $maxAverage){
		$winner = $student["firstname"];
		$maxAverage = $average;
	}



	echo '<tr>';
	echo '<td>'.$student["firstname"].'</td>';
	echo '<td>'.round($average, 2).'</td>';
	echo '</tr>';
}

echo '</table>';

echo "Le pire c'est ".$looser." et le meilleur c'est ".$winner;