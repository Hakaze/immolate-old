/**
 * Start request
 */

casper.open('http://imm-mobile.aeriagames.com/mypage/', {
    method:'get'
    }
);

casper.then(function(){
    returnData.response = this.evaluate(function(){
        return header_user_data;
    });
});