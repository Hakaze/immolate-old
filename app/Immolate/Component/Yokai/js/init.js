/**
 * Init casper
 */

var casper = require('casper').create({
    verbose: false,
    logLevel: "debug",
    exitOnError: function(self, m){
        console.log('FATAL:' + m);
        self.exit();
    },
    pageSettings: {
        userAgent: 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_1 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Mobile/10B142'
    }
});

/**
 * Create return data
 */

var returnData = {
    statusCode: 1,
    statusMsg: 'OK',
    response: null
};

/**
 * Handle cli variables
 */

var action = casper.cli.get("action");
var cookie = casper.cli.get("php-sess-id");
var actionsPath = phantom.casperScript.substring(0, phantom.casperScript.lastIndexOf("/")) + "/actions/";

phantom.addCookie({
    'name': 'PHPSESSID',
    'value': cookie,
    'domain': 'imm-mobile.aeriagames.com'
});

/**
 * Setup event listeners
 */

//Check if session expired
//
casper.on('url.changed', function(url){
    if(url == 'http://imm-mobile.aeriagames.com/login/relogin'){
        returnData.statusMsg = 'session.expired';
        returnData.statusCode = '2';
        this.exit();
    }
});

//return the responseData object on exit in json format
//
casper.on('exit', function(){
    this.echo(JSON.stringify(returnData));
});

/**
 * Load and execute action
 */

casper.start();

phantom.injectJs(actionsPath + action + ".js");

casper.run(function() {
    this.exit();
});