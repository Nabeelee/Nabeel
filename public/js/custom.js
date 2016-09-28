
//var myApp = angular.module('UserApp', [angularUtils.directives.dirPagination]);
var myApp = angular.module('UserApp', []);
//.controller('usersCtrl', function($scope) {
//  $scope.sortType     = 'name'; // set the default sort type
//  $scope.sortReverse  = false;  // set the default sort order 
//  
//  // create the list of sushi rolls 
//  $scope.user = [
//    {extension: 'Cali Roll', name: 'Cali Roll', username: 'Crab', password: 2 },
//    {extension: 'Cali Roll', name: 'Philly', username: 'Tuna', password: 4 },
//    {extension: 'Cali Roll', name: 'Tiger', username: 'Eel', password: 7 },
//    {extension: 'Cali Roll', name: 'Rainbow', username: 'Variety', password: 6 }
//  ];
//  
//});


//.controller('usersCtrl', function($scope, $http) {
//    //retrieve employees listing from API
//    $http.get('user').success(function(response) {
//                $scope.user = response; 
//            }); 
//            
//            }); 
//            
function MyController($scope, $http) {

    $http.get('user').success(function (response) {
        $scope.user = response;
        $scope.currentPage = 0;
        $scope.pageSize = "10";
        $scope.numberOfPages = function () {
            return Math.ceil($scope.user.length / $scope.pageSize);
        }
        
        $scope.selectEntity = function () {
	            // If any entity is not checked, then uncheck the "allItemsSelected" checkbox
	            for (var i = 0; i < $scope.user.length; i++) {
	                if (!$scope.user[i].isChecked) {
	                    $scope.user.allItemsSelected = false;
	                    return;
	                }
	            }
	
	            //If not the check the "allItemsSelected" checkbox
	            $scope.user.allItemsSelected = true;
	        };
        
        
         $scope.selectAll = function () {
	            // Loop through all the entities and set their isChecked property
	            for (var i = 0; i < $scope.user.length; i++) {
	                $scope.user[i].isChecked = $scope.user.allItemsSelected;
	            }
	        };
        
        
        

    });
    $scope.foo = function() { 
    }; 
}
myApp.filter('startFrom', function () {
    return function (input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});
myApp.controller('usersCtrl', MyController); 



app.directive('ngConfirmClick', [
  function(){
    return {
      priority: 100,
      restrict: 'A',
      //terminal: true,
      link: function(scope, element, attrs){
        element.bind('click', function(e){
          var message = attrs.ngConfirmClick;
          if(message && !confirm(message)){
            e.stopImmediatePropagation();
            e.preventDefault();
          }
        });
      }
    }
  }
]);