<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="cc_tableau.css">
	<title>Call Center</title>
</head>
<body>
	<h1 class="banniere">Booking</h1>
	<div class="zone1">
		<div class="container">

		<div class="col-lg-1" id="tableau">
			<table class="table table-bordered" id="table">
				<tr>
					<th scope="col">Nom</th>
					<th scope="col">Prenom</th>
					<th scope="col">Mail</th>
				</tr>
				
				<?php include('agents.php'); ?>
			</table>
		</div>
		
	</div>
	</div>

	<div class="waitingCall">
		<table id="numCall" class="table table-bordered">

		</table>
	</div>


	<script type="text/javascript">

		function charger(){

			setTimeout(function(){ 		
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					document.getElementById('table').innerHTML = this.responseText;
					document.getElementById('numCall').innerHTML = this.responseText;
				}
			};
			xhr.open("GET", "agents.php", true); //methode de la requete, appel du fichier
			xhr.send();

			charger(); //appel de la fonction 
			}, 2000);
		}
		charger(); //nouveau rappel de la fonction pour boucler

	</script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>