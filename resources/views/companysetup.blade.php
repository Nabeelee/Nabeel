<!DOCTYPE html>
<html ng-app="UserApp" >
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    </head>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>

<!--    <script src="js/angular.min.js"></script>-->
    <script src="js/custom.js"></script>
    <script src="js/ui-bootstrap-tpls-2.1.4.min.js.js"></script> 
     <script>document.write('<base href="' + document.location + '" />');</script>
    
    <body>
        </br>
        <div class="container">
            <div  ng-controller="usersCtrl">
   
                <p>
                    <button  ng-click="foo()" ng-confirm-click="again" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> Delete All 
                    </button>
                </p>
                <table id="users" class="table table-striped table-bordered" cellspacing="0" width="50%">
                    <thead>
                        <tr>
                             <th><input type="checkbox" ng-model="user.allItemsSelected" ng-change="selectAll()"></th>
                            <th> <a href="#" ng-click="sortType = 'extension'; sortReverse = !sortReverse">Extension #<span ng-show="sortType == 'extension' && !sortReverse" class="fa fa-caret-down"></span>
                                    <span ng-show="sortType == 'extension' && sortReverse" class="fa fa-caret-up"></span>
                                </a></th>
                            <th> <a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">Name<span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
                                    <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span></th>
                            <th><a href="#" ng-click="sortType = 'username'; sortReverse = !sortReverse">Username <span ng-show="sortType == 'username' && !sortReverse" class="fa fa-caret-down"></span>
                                    <span ng-show="sortType == 'username' && sortReverse" class="fa fa-caret-up"></span>
                                </a></th>
                            <th><a href="#" ng-click="sortType = 'password'; sortReverse = !sortReverse">Password <span ng-show="sortType == 'password' && !sortReverse" class="fa fa-caret-down"></span>
                                    <span ng-show="sortType == 'password' && sortReverse" class="fa fa-caret-up"></span>
                                </a></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr ng-repeat="roll in user| orderBy:sortType:sortReverse | startFrom:currentPage * pageSize | limitTo:pageSize">
                           <td><input type="checkbox" ng-model="roll.isChecked" ng-change="selectEntity()"></td>
                            <td>@{{ roll.extension}}</td>
                            <td>@{{ roll.name}}</td>
                            <td>@{{ roll.user_name}}</td>
                            <td>@{{ roll.password}}</td>
                            <td> <a href="#">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a></td>
                            <td>  <a href="#">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a></td>
                        </tr> 
                    </tbody>
                </table>
                <div class="col-xs-2">
                    <label for="search">Items per page:</label> 
                    <select  name="psize" id="psize"  ng-model="pageSize"  > <option value='10' >10</option><option value='25'  ng-selected="true">25</option><option value='50'>50</option><option value='100000000'>All</option></select>

                </div>
                <center>
                    <button class="btn btn-primary btn-sm" ng-disabled="currentPage == 0" ng-click="currentPage = currentPage - 1">
                        Previous
                    </button>
                    @{{currentPage + 1}}/@{{numberOfPages()}}
                    <button class="btn btn-primary btn-sm" ng-disabled="currentPage >= user.length / pageSize - 1" ng-click="currentPage = currentPage + 1">
                        Next
                    </button>
                </center>
            </div>
        </div>  

    </div>
    <div class="container">
        <form style="border: 1px solid #a1a1a1; margin-top: 15px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

            <input type="file" name="import_file" />
            </br>
            <button class="btn btn-primary">Import Extension</button>

        </form>
    </div>  






</body>
</html>
