var app = angular.module("app", ['ngSanitize','ngResource','restangular']);

app.config(function($httpProvider) {

  var logsOutUserOn401 = function($location, $q, SessionService, FlashService) {
    var success = function(response) {
      return response;
    };

    var error = function(response) {
      if(response.status === 401) {
        SessionService.unset('authenticated');
        $location.path('/login');
        FlashService.show(response.data.alert);
        return $q.reject(response);
      } else {
        return $q.reject(response);
      }
    };

    return function(promise) {
      return promise.then(success, error);
    };
  };

  $httpProvider.responseInterceptors.push(logsOutUserOn401);
});

app.config(function($routeProvider) {

  $routeProvider.when('/login', {
    templateUrl: 'templates/layout/login.html',
    controller: 'BaseController'
  });

  $routeProvider.when('/soulbinders', {
    templateUrl: 'templates/soulbinders/index.html',
    controller: 'SoulbindersController',
    resolve: {
      soulbinders: function(Restangular){
        return Restangular.all('soulbinder').getList();
      }
    }
  });

  $routeProvider.when('/soulbinders/:id', {
    templateUrl: 'templates/soulbinders/view.html',
    controller: 'SoulbindersViewController',
    resolve: {
      soulbinder: function(Restangular, $route){
        return Restangular.one('soulbinder', $route.current.params.id).get();
      }
    }
  });

  $routeProvider.otherwise({ redirectTo: '/soulbinders' });

});

app.run(function($rootScope, $location, AuthenticationService, FlashService, $templateCache) {

  var routesThatRequireAuth = ['/soulbinders'];

  if(AuthenticationService.isLoggedIn()){
    $rootScope.authenticated = true;
  }

  $rootScope.$on('$routeChangeStart', function(event, next, current) {
    if(_(routesThatRequireAuth).contains($location.path()) && !AuthenticationService.isLoggedIn()) {
      $location.path('/login');
      FlashService.show("info", "Please log in to continue.");
    }
  });

  $rootScope.$on('$viewContentLoaded', function() {
      $templateCache.removeAll();
   });
});
