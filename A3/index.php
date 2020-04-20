<!DOCTYPE html>

<?php
require_once('travel_planner/create_table.php');
session_start();
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<html ng-app="travelApp">

<head>
  <link rel="icon" type="icon/png" href="img/plane.png">
  <title>Travel Planner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>
  <script src= "//ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-sanitize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="mainstyle.css">


<!-- map api that doesnt work
  <script type='text/javascript'>
  function GetMap()
  {
      var map = new Microsoft.Maps.Map('#myMap', {
        center: new Microsoft.Maps.Location(47.606209, -122.332071),
          zoom: 12,
      });

      Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                    var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                    // Set Route Mode to transit
                    directionsManager.setRequestOptions({ routeMode: Microsoft.Maps.Directions.RouteMode.transit });
                    var waypoint1 = new Microsoft.Maps.Directions.Waypoint({address: 'Paris, FR', location: new Microsoft.Maps.Location(48.8566, 2.3522)});
                    var waypoint2 = new Microsoft.Maps.Directions.Waypoint({ address: 'Seattle', location: new Microsoft.Maps.Location(47.59977722167969, -122.33458709716797) });
                    directionsManager.addWaypoint(waypoint1);
                    directionsManager.addWaypoint(waypoint2);
                    // Set the element in which the itinerary will be rendered
                    directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('printoutPanel') });
                    directionsManager.calculateDirections();
                });

  }
  </script>
-->



</head>

<body style="background:#dff1f7;">
  <div>
       <!-- notification message -->

       <!-- logged in user information -->
       <?php  if (isset($_SESSION['username'])) : ?>
         <p style="font-style:italic; position:fixed; margin-top: -17.7%; color:#397487;">&nbsp; Welcome <strong><?php echo $_SESSION['username']; ?>&nbsp;</strong>
         <a href="index.php?logout='1'" style="color: #6db2c9;"> logout</a> </p>
       <?php endif ?>
   </div>
<div ng-controller="formCtrl">
  <div class="searchbar">
    <a href="" class = "popup" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Search with phrases like: 'Castles in Toronto', 'Brazilian Museums' or 'Things to do in Asia'" style="position:fixed; color: #d7d9db; padding-right: 40px; margin-top: 50px;"><span class="glyphicon glyphicon-info-sign"></span></a>
    <form name="searchForm" class="form-inline">
      <div class="form-group mb-2 col-sm-11">
        <input type="text" ng-model="query" class="form-control input-lg" id="query" placeholder="Search travel destination" style="width:69%; position:fixed; margin-top: 50px;" required>
      </div>
      <button type="submit" ng-click="formsubmit(searchForm.$valid)" ng-disabled="searchForm.$invalid" class="btn btn-info mb-2" style="height:45px; position:fixed; margin-top: 50px;">
        Search <span class="glyphicon glyphicon-search"></span>
      </button>
    </form>
    <div class="padded"></div>
    <div style="margin: -20% -10% -25% -16%;">
      <p ng-bind-html="result" class="returned"></p></div>
      <div ng-view class="entry"></div>
      <div id="compare" class="compare"></div>
    </div>
  </div>







  <script>
    var myApp = angular.module("travelApp", ['ngSanitize', 'ngRoute']);


    myApp.controller("formCtrl", ['$scope', '$http', function ($scope, $http) {
      $scope.url = 'searchdb.php';
      $scope.formsubmit = function (isValid) {

        if (isValid) {

          $http.post($scope.url, {"query": $scope.query}).
          success(function (data, status) {
            $scope.status = status;
            $scope.data = data;
            $scope.result = data;
          })
        } else {
          alert('Input is not valid');
        }

      }

    }]);


/* add ratings:
    myApp.controller("ratingCtrl", ['$scope', '$http', function ($scope, $http) {
      $scope.url = 'rate.php';
      $scope.formsubmit = function (isValid) {
        if (isValid) {
          $http.post($scope.url, {"query": $scope.query}).
          success(function (data, status) {
            $scope.status = status;
            $scope.data = data;
            $scope.result = data;
          })
        } else {
          alert('Input is not valid');
        }
      }
    }]);
*/
    myApp.config(function($routeProvider) {
      $routeProvider

        .when('/cntower', {
          templateUrl : 'readmore.php?q=cntower'})
          .when('/theshard', {
            templateUrl : 'readmore.php?q=theshard'})


          });

              </script>

              <script>
                $(document).ready(function(){
                  $('[data-toggle="popover"]').popover();
                });
              </script>

              <script>
              function show_compare(str) {
                $("#compare").load("travel_planner/get_compare.php?q="+str);

              }
              </script>


            </body>

            </html>
