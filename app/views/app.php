<!DOCTYPE html>
<html ng-app="app" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><!-- Force IE to use the latest rendering engine -->		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-capable" content="yes">

		<title>Immolate</title>

		<!-- SCROLLS -->
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/app.css" rel="stylesheet">
		<link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script src="/js/vendor/angular.js"></script>
		<script src="/js/vendor/angular-sanitize.js"></script>
    	<script src="/js/vendor/angular-resource.min.js"></script>
		<script src="/js/vendor/underscore.js"></script> 	
		<script src="/js/vendor/restangular.min.js"></script>
		<script src="/js/vendor/spin.min.js"></script>					
		<script src="/js/app/app.js"></script>
		<script src="/js/app/services.js"></script>
		<script src="/js/app/controllers.js"></script>
		<script src="/js/app/filters.js"></script>
		<script src="/js/app/directives.js"></script>		
		<script>
    		angular.module("app").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
  		</script>
	</head>
	<body ng-controller="BaseController" ng-cloak>
		<div id="wrapper">
			<div ng-switch on="authenticated">
				<nav class="app-navigation" ng-switch-when="true" ng-include="'templates/layout/navbar.html'" ng-animate="{enter: 'nav-enter'}"></nav>
				<div ng-switch-default ></div>
			</div>

			<div class="container">
				<div ng-view id="ng-view" ng-animate="{enter: 'view-enter'}"></div>
			</div>
		</div>
		<script src="/js/vendor/jquery-1.9.1.min.js"></script>
		<script src="/js/vendor/bootstrap.min.js"></script>
	</body>
</html>