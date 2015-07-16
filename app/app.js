var app = angular.module('demoApp',['ngRoute','ui.bootstrap']);

app.config(['$routeProvider',function($routeProvider) {
	$routeProvider
		.when
		(
			'/',
			{
				controller: 'customerCtrl',
				templateUrl: 'view1.html'
			}
		)
		.otherwise({redirectTo:'/'});
}]);