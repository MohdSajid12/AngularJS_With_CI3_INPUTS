<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AngularJS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="<?php echo $this->config->item("base_url"); ?>js/angular.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>

    <div>
        <h3 align="center">Insert Data in MySql using PHP and AngularJS</h3>

        <div ng-app="myApp" ng-controller="myCtrl">


            <div class="container" width="500px">

                <form>
                    <label for="">First Name</label>
                    <input type="text" name="firstname" ng-model="firstname" class="form-control" required /><br>
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" ng-model="lastname" class="form-control" /><br>

                    <input type="button" value="Submit" name="btnInsert" ng-click="insertData()" class="btn btn-info" />
                </form>
            </div>
        </div>

    </div>

    <script>
        var app = angular.module("myApp", []);

        app.controller("myCtrl", ['$scope', '$http', function($scope, $http) {

            var $config = {
            'base_url': '<?php echo $this->config->item("base_url"); ?>'
        };

            $scope.insertData = function() {
                if (!$scope.firstname) {
                    alert("First Name is required.");
                    return;
                }

                var data = {
                    'firstname': $scope.firstname,
                    'lastname': $scope.lastname
                };

                $http({
                    method: 'POST',
                    url: $config.base_url + 'First/addUser',
                    data: data,
                }).then(function(response) {
                    console.log(response.data);
                    alert('data inserted');
                }).catch(function(error) {
                    console.log("rejected with", error);
                });
            };

        }]);
    </script>
</body>

</html>
