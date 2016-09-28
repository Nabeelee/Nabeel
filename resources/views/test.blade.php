<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add User</title>
        <!-- Fonts -->
        <!-- Styles -->
        <link href="css/app.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
         <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  

    </head>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
  
<!--    <script src="js/angular.min.js"></script>-->
    <script src="js/custom.js"></script>
    <script src="js/dirPagination.js"></script>
    <script src="js/ui-bootstrap-tpls-2.1.4.min.js.js"></script> 
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div  ng-controller="MyController" class="my-controller">
          <h1>Tasty Paginated Menu</h1>

          <small>this is in "MyController"</small>


          <div class="row">
            <div class="col-xs-4">
              <h3>Meals Page: @{{ currentPage }}</h3>
            </div>
            <div class="col-xs-4">
              <label for="search">Search:</label>
              <input ng-model="q" id="search" class="form-control" placeholder="Filter text">
            </div>
            <div class="col-xs-4">
              <label for="search">items per page:</label>
              <input type="number" min="1" max="100" class="form-control" ng-model="pageSize">
            </div>
          </div>
          <br>
          <div class="panel panel-default">
            <div class="panel-body">

              <ul>
                <li dir-paginate="meal in meals | filter:q | itemsPerPage: pageSize" current-page="currentPage">@{{meal}}</li>
                
              </ul>
            </div>
          </div>
        </div>

        <div ng-controller="OtherController" class="other-controller">
          <small>this is in "OtherController"</small>
          <div class="text-center">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="tpl/dirPagination.tpl.html"></dir-pagination-controls>
          </div>
        </div>
          
      </div>
    </div>
  </div>
</body>
</html>