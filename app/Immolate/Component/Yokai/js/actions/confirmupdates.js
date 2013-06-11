casper.open('http://imm-mobile.aeriagames.com/mypage/', {
    method:'get'
    }
);
var response = '';
casper.then(function(){
	this.click('#info-icon');
});

casper.then(function(){
	if(this.exists('#popup-contents')){
		response = this.evaluate(function(){
			var elements = $j('#middle a');
			var updates = [];
			$j.each(elements, function(){
				updates.push({url: this.href});
			});
			return updates;
		});
	} else {
		response = 'none';
	}
	returnData.response = 'cleared';
});

casper.then(function(){
	this.each(response, function(self, link){
		self.thenOpen(link.url);
	});
});


