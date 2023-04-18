<?php 
	session_start();
	require "conf.inc.php";
	require "core/functions.php";

	redirectIfNotConnected();
?>

<?php include "template/header.php" ?>


<h1>Tous les utilisateurs</h1>

<?php

	$connect = connectDB();
	$results = $connect->query("SELECT * FROM ".DB_PREFIX."user");

	$listOfUsers = $results->fetchAll();

?>

	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Genre</th>
				<th>Prénom</th>
				<th>Nom</th>
				<th>Email</th>
				<th>Date de naissance</th>
				<th>Ville</th>
				<th>Date d'insertion</th>
				<th>Date de modification</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php

				foreach($listOfUsers as $user){
					echo "<tr>";

					echo "<td>".$user["id"]."</td>";
					echo "<td>".$user["gender"]."</td>";
					echo "<td>".$user["firstname"]."</td>";
					echo "<td>".$user["lastname"]."</td>";
					echo "<td>".$user["email"]."</td>";
					echo "<td>".$user["birthday"]."</td>";
					echo "<td>".$user["city"]."</td>";
					echo "<td>".$user["date_inserted"]."</td>";
					echo "<td>".$user["date_updated"]."</td>";
					echo "<td><a href='' class='btn btn-danger'>Supprimer</a></td>";

					echo "</tr>";
				}

			?>
		</tbody>
	</table>



<?php include "template/footer.php" ?>