var app = require('http').createServer(handler),
	io = require('socket.io').listen(app),
	fs = require('fs'),
	mysql = require('mysql'),
	connectionArray = [],
	connection = mysql.createConnection({
		host: 'localhost',
		user: 'root',
		password: '',
		database: 'symfony',
		port: 3306
	}),
	POLLING_INTERVAL = 3000,
	pollingTimer;

	connection.connect(function(err){
		if (err) {
			console.log(err);
		}
	});
	app.listen(8080);

//fonction pour chager le html et retourner erreurs
	function handler(req, res){
		fs.readFile(__dirname + '/testNodeJs.html', function(err, data){
			if (err) {
				console.log(err);
				res.writeHead(500);
				return res.end('Erreur chargement testNodeJs.html');
			}
			res.writeHead(200);
			res.end(data);
		});
	}

	var pollingLoop = function(){

		var query = connection.query('SELECT nom, prenom, mail as utilisateur FROM advert'),
		users =[]; //array qui contient le résultat de la requête
		query
		//.on(eventName, listener)
		.on('error', function(err){
			console.log(err);
			updateSockets(err);
		})
		.on('result', function(user){
			users.push(user);
		})
		.on('end', function(){
			//boucle s'il ya des sockets connectés
			if(connectionArray.length){
				pollingTimer = setTimeout(pollingLoop, POLLING_INTERVAL);
				updateSockets({
					users: users
				});
			}else{
				console.log('Le timer a stoppé, il n\' ya plus de socket connecté');
			}
		});
	};

	// à la connexion d'un socket
	io.sockets.on('connection', function(socket){
		var socketIndex = connectionArray.indexOf(socket);
		console.log('Nombre de connections:' + connectionArray.length);
		//commence la boucle si seulement au moins un user connecté
		if(!connectionArray.length){
			pollingLoop();
		}
		//à la déconnexion du socket
		socket.on('disconnect', function(){
			var socketIndex = connectionArray.indexOf(socket);
			console.log('socketID = %s got disconnected', socketIndex);
			// tilde correspond au dernier socketIndex
			if(~socketIndex){
				//on remplace la valeur 
				connectionArray.splice(socketIndex, 1);
			}
		})
		console.log('Un nouveau socket est connecté');
		connectionArray.push(socket);
	});

	var updateSockets = function(data){
		data.time = new Date();
		console.log('Push des nouvelles données à tous les clients connectés: nb = %s) - %s', connectionArray.length, data.time);
		connectionArray.forEach(function(tmpSocket){
			//volatile message permet la perte de message
			tmpSocket.volatile.emit('notification', data);
		});
	};
	console.log('Please connect to http://localhost:8080');