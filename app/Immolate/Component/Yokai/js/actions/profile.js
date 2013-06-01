
casper.open('http://imm-mobile.aeriagames.com/profile/',
    {
        method: 'get'
    }
);

casper.then(function getUserData() {
    header_user_data = this.evaluate(function(){
        return header_user_data;
    });
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
        card_img: this.getElementAttribute('.card_area img', 'src')
    };
    returnData.response = user_data;
});