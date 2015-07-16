app.controller('customerCtrl',['$scope','$modal','$log','$http', function($scope, $modal, $log, $http){

	$scope.datas = {};

	$scope.open = function(size){
		var modalInstance = $modal.open({
			templateUrl: 'customerAdd.html',
			controller: 'ModalInstanceCtrl',
			size: size,
			resolve: {
				items: function(){
					return;
				}	
			}
		});

	}

	$http.get("selects.php")
	.success(function(respose){
		$scope.datas = respose.records;
	});


}])

app.controller('ModalInstanceCtrl',['$scope','$modalInstance','$http', function($scope, $modalInstance,$http){
	$scope.cancel = function(){
		alert("Function Doing");
		$modalInstance.dismiss('close');
	}
	$http.post('view.php').success(function(data){
		$scope.employee = data;
	});
	$scope.addEmployee = function(){
		alert("Function Doing");
		$scope.errors = [];
		$scope.msgs = [];


		$http.post('insert.php',{
			'customer': $scope.newEmployee.customer,
			'names': $scope.newEmployee.names,
			'email': $scope.newEmployee.email,
			'countrycode': $scope.newEmployee.countrycode,
			'budget': $scope.newEmployee.budget,
			'used': $scope.newEmployee.used
		}).success(function(data, status, headers, config){
			if($scope.newEmployee.names != "" || $scope.newEmployee.email != "" || $scope.newEmployee.countrycode != "" || $scope.newEmployee.budget != "" ||  $scope.newEmployee.used != "" || data != ""){
				console.log($scope.newEmployee.customer);
				console.log($scope.newEmployee.names);
				console.log($scope.newEmployee.email);
				console.log($scope.newEmployee.countrycode);
				console.log($scope.newEmployee.budget);
				console.log($scope.newEmployee.used);
				console.log("inserted Successfully");
			}
			
			if(data.msgs != ''){
				$scope.msgs.push(data.msgs);
			}else{
				$scope.errors.push(data.errors);
			}
		}).error(function(data, status){
			$scope.errors.push(status);
		});
	}
}])
	
