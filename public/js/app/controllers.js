app.controller("BaseController", function($scope, $location, AuthenticationService, SessionService, $rootScope, appLoading)
{
  $rootScope.$on('$routeChangeStart', function() {
    appLoading.loading();
  });
  $rootScope.$on('$routeChangeSuccess', function() {
    appLoading.ready();
  });
  $rootScope.$on('$routeChangeError', function() {
    appLoading.ready();
  });
  $scope.credentials = { email: "", password: "" };
  $scope.user = JSON.parse(SessionService.get('user'));
  $scope.login = function() {
    AuthenticationService.login($scope.credentials).success(function() {
      $location.path('/soulbinders');
    });
  };

  $scope.logout = function() {
    AuthenticationService.logout().success(function() {
      $location.path('/login');
    });
  };
});

app.controller("SoulbindersController", ['$scope', 'soulbinders', function($scope, soulbinders)
{
  $scope.soulbinders = soulbinders;
}]);

app.controller("SoulbindersViewController", ['$scope', 'soulbinder', function($scope, soulbinder)
{
  $scope.soulbinder = soulbinder;
  $scope.tabs = [
    {name: 'Stronghold', template: 'templates/stronghold/main.html'},
    {name: 'Quest', template: 'templates/quest/main.html'},
    {name: 'Conjure', template: 'templates/conjure/main.html'},
    {name: 'Sacrifice', template: 'templates/sacrifice/main.html'}
  ];
  $scope.tabSelected = 0;

  $scope.loadTab = function(index){
    $scope.tabSelected = index;
  };
  $scope.tabClass = function(index){
    return index === $scope.tabSelected ? 'active' : undefined;
  };
}]);

app.controller("StrongholdController", function($scope, Restangular)
{
  $scope.actions = [
    {name: 'Updates', template: 'templates/stronghold/updates.html', icon: 'icon-exclamation'},
    {name: 'Giftbox', template: 'templates/stronghold/giftbox.html', icon: 'icon-gift'},
    {name: 'Shop', template: 'templates/stronghold/shop.html', icon: 'icon-shopping-cart'}    
  ];
  $scope.actionSelected = 0;
  $scope.loadAction = function(index){
    $scope.actionSelected = index;
  };
});

app.controller("UpdatesController", function($scope, Restangular)
{
  $scope.updates = $scope.soulbinder.all('updates').getList();
  $scope.results = $scope.updates.get("length");
  $scope.results.then(function(length){
    return length;
  });
  $scope.confirmUpdates = function(){
    $scope.soulbinder.all('updates').post().then(function(){
      $scope.updates = $scope.soulbinder.all('updates').getList();
    });
  }
});

app.controller("InventoryController", function($scope, Restangular)
{
  $scope.items = $scope.soulbinder.all('shop').getList();
  $scope.results = $scope.items.get("length");
  $scope.results.then(function(length){
    return length;
  });
  $scope.purchase = function(itemId){
    $scope.soulbinder.all("shop").post({'item_id':itemId}).then(function(response){
      $scope.items = $scope.soulbinder.all('shop').getList();
    });
  }
});

app.controller("ShopController", function($scope, Restangular)
{
  $scope.items = $scope.soulbinder.all('shop').getList();
  $scope.results = $scope.items.get("length");
  $scope.results.then(function(length){
    return length;
  });
  $scope.purchase = function(itemId){
    $scope.soulbinder.all("shop").post({'item_id':itemId}).then(function(response){
      $scope.items = $scope.soulbinder.all('shop').getList();
    });
  }
});

app.controller("GiftboxController", function($scope, Restangular)
{
  $scope.gifts = $scope.soulbinder.all('giftbox').getList();
  $scope.results = $scope.gifts.get("length");
  $scope.results.then(function(length){
    return length;
  });
  $scope.acceptAll = function(gifts){
    var data = [];
    angular.forEach(gifts, function(value, key){
      this.push(value.present_data_id);
    },data);
    data = data.join(',');
    console.log(data);
    $scope.soulbinder.all("giftbox").post({'present_data_ids': data}).then(function(){
      $scope.gifts = $scope.soulbinder.all('giftbox').getList();
    });
  }
  $scope.acceptSelected = function(gifts){
    var data = [];
    angular.forEach(gifts, function(value, key){
      if(value.checked){
        this.push(value.present_data_id);
      }
    },data);
    data = data.join(',');
    console.log(data);
    $scope.soulbinder.all("giftbox").post({'present_data_ids': data}).then(function(){
      $scope.gifts = $scope.soulbinder.all('giftbox').getList();
    });
  }
});