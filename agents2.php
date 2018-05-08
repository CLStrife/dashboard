<?php 
include ('connect.php');

$reponse = $db->query('SELECT * FROM advert ORDER BY nom');
echo 
	"<tr>
		<th>Nom</th>
		
	</tr>";
	//<th>Prenom</th>
	//	<th>Mail</th>
		
		while($donnees = $reponse->fetch())

		{ 
			echo 
	
	"<tr>
	<td>".$donnees['nom']."</td>
	
	</tr>";
	//for ($i=0; $i < 10; $i++) { 
	//	echo $donnees[1][0];
	//}
	
		}
			//<td>".$donnees['prenom']."</td>	
	//<td>".$donnees['mail']."</td>
		$reponse->closeCursor();
		$obj = json_encode($reponse);
		
 ?>