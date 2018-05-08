<script type="text/javascript">


			var count = 0;
			function loadFile(file){
				var xhr = new XMLHttpRequest();
				xhr.open('GET', file);
				xhr.onreadystatechange = function(){
					if (xhr.readystate == 4 && xhr.status == 200){
						document.getElementById('numCall').innerHTML = xhr.responseText;
					}
				}
				xhr.send(null);
			}


			
			(function(){
				var test1 = require ('test1');
				var files = test1.readdirSync('/test1/');

				loadFile(this.value);
			};
	},2000)();
			
			var x = setInterval(function(){
				{
					
				};
			}
		},2000)();

					/*if(count < 10)
				document.getElementById("numCall").innerHTML = count++;
			}*/
			//}, 2000);

	</script>