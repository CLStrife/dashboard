<?php 
	$user = "root";
	$pass = "";
	

	try {

		$db = new PDO('mysql:host=localhost;dbname=symfony', $user, $pass);
		$db->query('SELECT * FROM advert') as $row {
			print_r($row);
		}
		
	} catch (PDOException $e) {
		print "Erreur! : ".$e->getMessage()."<br/>";
		die();
	}
 ?>