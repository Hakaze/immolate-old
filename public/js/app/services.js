app.factory("FlashService", function($rootScope) {
  var type = 'info';
  return {
    show: function(type,message) {
      $rootScope.flash = {};
      $rootScope.flash.message = message;
      $rootScope.flash.type = "alert-" + type;
    },
    clear: function() {
      $rootScope.flash = "";
    }
  }
});

app.factory("SessionService", function() {
  return {
    get: function(key) {
      return sessionStorage.getItem(key);
    },
    set: function(key, val) {
      return sessionStorage.setItem(key, val);
    },
    unset: function(key) {
      return sessionStorage.removeItem(key);
    }
  }
});

app.factory("AuthenticationService", function($http, $sanitize, SessionService, FlashService, CSRF_TOKEN, $rootScope) {

  var cacheSession   = function(response) {
    SessionService.set('user', JSON.stringify(response));
    SessionService.set('authenticated', true);
  };

  var uncacheSession = function() {
    SessionService.unset('user');
    SessionService.unset('authenticated');
  };

  var loginError = function(response) {
    FlashService.show('error', response.alert);
  };

  var sanitizeCredentials = function(credentials) {
    return {
      email: $sanitize(credentials.email),
      password: $sanitize(credentials.password),
      csrf_token: CSRF_TOKEN
    };
  };

  return {
    login: function(credentials) {
      var login = $http.post("/account/login", sanitizeCredentials(credentials));
      login.success(cacheSession);
      login.success(FlashService.clear);
      login.success(function(){
        $rootScope.authenticated = true;
      });
      login.error(loginError);
      return login;
    },
    logout: function() {
      var logout = $http.get("/account/logout");
      logout.success(uncacheSession);
      logout.success(function(){
        $rootScope.authenticated = false;
      });
      return logout;
    },
    isLoggedIn: function() {
      var status = SessionService.get('authenticated');
      if(status){
        return true;
      } else {
        return false;
      }
    }
  };
});

app.factory('appLoading', function($rootScope) {
  var timer;
  var opts = {
    lines: 9,
    length: 0,
    width: 23,
    radius: 37,
    corners: 1,
    rotate: 0,
    direction: 1,
    color: '#000',
    speed: 1.5,
    trail: 29,
    shadow: false,
    hwaccel: false,
    className: 'spinner',
    zIndex: 2e9,
    top: 'auto',
    left: 'auto'
  };
  var target = document.getElementById('ng-view');
  var spinner = new Spinner(opts).spin(target);
  return {
    loading : function() {
      clearTimeout(timer);
      $rootScope.status = 'loading';
      spinner.spin(target);
      if(!$rootScope.$$phase) $rootScope.$apply();
    },
    ready : function(delay) {
      function ready() {
        $rootScope.status = 'ready';
        spinner.stop();
        if(!$rootScope.$$phase) $rootScope.$apply();
      }
      clearTimeout(timer);
      delay = delay == null ? 500 : false;
      if(delay) {
        timer = setTimeout(ready, delay);
      }
      else {
        ready();
      }
    }
  };
});

app.factory('GiftboxService', function($http, $q){
  return {
    path: '/soulbinders/giftbox',
    get: function(){
      var deferred = $q.deferred();
      $http.get(this.path).success(function(data){
        deferred.resolve(data);
      }).error(function(){
        deferred.reject("Could not load giftbox");
      });
      return deferred.promise;
    },
    accept: function(items){
      var deferred = $q.deferred();
      $http.post(this.path, items).success(function(data){
        deferred.resolve(data);
      }).error(function(){
        deferred.reject("Could not accept gifts");
      });
      return deferred.promise;
    }
  }
});