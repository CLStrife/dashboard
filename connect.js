var mysql = require('mysql');

var con = mysql.createConnection({
	host: "localhost",
	user: "root",
	password: "",
	database: "symfony"
});
con.connect(function(err){
	if(err)throw err;
	console.log("Connecté!");
});

module.exports = con;