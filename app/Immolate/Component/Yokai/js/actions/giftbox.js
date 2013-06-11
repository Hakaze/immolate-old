
casper.open('http://imm-mobile.aeriagames.com/present/present_list', {
    method:'get'
    }
);

casper.then(function(){
	this.click('#info-icon');
});

casper.then(function(){
	var response = this.evaluate(function(){
		return present_data;
	});
	returnData.response = response;
});


