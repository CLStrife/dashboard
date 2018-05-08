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
		charger();