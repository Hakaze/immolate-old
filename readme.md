## Immolate

Immolate is a gameplay automation and emulation system for the iOS game Immortalis. The purpose of this project was to utilize various technologies to push the limits
of my experience as an application developer while applying it to something fun!

### Server Side

Immolate uses Laravel 4 as a RESTful api. Game emulation is performed by CasperJS scripts which are excecuted by a package I created called Yokai.
Yokai executes action based javascript files via CLI and returns the output back to the server application. My choice for CasperJS over a php based
cURL library such as Guzzle was due to the ability to inject client side scripts, perform browser automation, and evaluate javascript within its native
environment using QtWebkit. 

### Client Side

Immolate's client side and UI/UX is a combination of AngularJS and Twitter Bootstrap.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
Immolate is a private project and property of Thomas Cresine.