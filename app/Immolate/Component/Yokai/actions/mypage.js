/**
 * Init casper
 */
var casper = require('casper').create({
    exitOnError: function(self, m){
        console.log('FATAL:' + m);
        self.exit();
    },
    pageSettings: {
        userAgent: 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_1 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Mobile/10B142'
    }
});

var cookie = casper.cli.get("php-sess-id");
phantom.addCookie({
    'name': 'PHPSESSID',
    'value': cookie,
    'domain': 'imm-mobile.aeriagames.com'
});

/**
 * Start request
 */

casper.start().open('http://imm-mobile.aeriagames.com/mypage/', {
    method:'get'
    }
);

casper.then(function(){
    this.echo(this.evaluate(function(){
        return JSON.stringify(header_user_data);
    }));
    //this.echo(this.getHTML());
});

casper.run();