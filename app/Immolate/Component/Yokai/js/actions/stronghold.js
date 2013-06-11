
casper.open('http://imm-mobile.aeriagames.com/mypage/', {
    method:'get'
    }
);

casper.then(function(){
	this.click('#info-icon');
});

casper.then(function(){
	var response = '';
	if(this.exists('#popup-contents')){
		response = this.evaluate(function(){
			var elements = $j('p[id="info_subject"]');
			var updates = [];
			$j.each(elements, function(){
				updates.push({msg: this.innerText});
			});
			return updates;
		});
	} else {
		response = 'none';
	}
	returnData.response = response;
});


