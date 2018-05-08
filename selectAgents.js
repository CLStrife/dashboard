var con = require("./connect");
	con.query("SELECT * FROM advert ORDER BY nom", function(err, result, fields){
		if(err)throw err;
		console.log(result);
	});

	module.exports = con;