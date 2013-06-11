
var gifts = casper.cli.get('gifts');
casper.open('http://imm-mobile.aeriagames.com/present/present_receive', {
    method:'post',
    data: {
		'present_data_ids': gifts
	}
});
casper.then(function(){
	var response = this.getPageContents();
	returnData.response = response;
});


