casper.open('http://imm-mobile.aeriagames.com/item/shop_list/', {
    method:'post',
    data: {
		'_pjax': true
	}
});
casper.then(function(){
	var shop_data = this.evaluate(function(){
		return shop_data;
	});
	var response = [];
	this.each(shop_data, function(self, item){
		if(item.purchase_money == 0){
			response.push(item);
		}
	});
	returnData.response = response;
});


