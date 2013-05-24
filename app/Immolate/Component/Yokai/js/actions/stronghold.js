/**
 * Start request
 */

casper.open('http://imm-mobile.aeriagames.com/mypage/', {
    method:'get'
    }
);

casper.then(function() {
    if (this.resourceExists('login.js')) {
        this.reload();
    }
    header_user_data = this.evaluate(function(){
        return header_user_data;
    });
    card_img = this.getElementAttribute('div.card', 'style');
    user_data = {
        exp: header_user_data.exp,
        levelup_exp: header_user_data.exp,
        level: header_user_data.level,
        stamina: header_user_data.stamina,
        stamina_max: header_user_data.stamina_max,
        mp: header_user_data.mp,
        mp_max: header_user_data.mp_max,
        atk: this.fetchText('div.atk'),
        def: this.fetchText('div.def'),
        img_path: card_img.slice(card_img.indexOf("/"), card_img.lastIndexOf(")"))
    };
    returnData.response = user_data;
});