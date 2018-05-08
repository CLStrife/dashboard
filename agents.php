<?php 
include ('connect.php');

$reponse = $db->query('SELECT * FROM advert ORDER BY nom');
echo 
	"<tr>
		
		<th>Prenom</th>
		
	</tr>";
		
		while($donnees = $reponse->fetch())

		{ 
			echo 
	
	"<tr>
	<
	<td>".$donnees['prenom']."</td>	
	
	</tr>";


		}
			//<td>".$donnees['nom']."</td><td>".$donnees['mail']."</td>
		$reponse->closeCursor();
		//$obj = json_encode($reponse);
 ?>

