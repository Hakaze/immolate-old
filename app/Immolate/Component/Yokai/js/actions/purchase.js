var id = casper.cli.get('id');
casper.open('http://imm-mobile.aeriagames.com/item/purchase', {
    method:'post',
    data: {
		'id': id,
		'num': 1
	}
});
casper.then(function(){
	var response = JSON.parse(this.getPageContents());
	returnData.response = response;
});


