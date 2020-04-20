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



</head>

<body style="background:#dff1f7;">
  <div>
    <!-- notification message -->

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      <p style="font-style:italic; position:fixed; margin-top: -17.7%; color:#397487;">&nbsp; Welcome <strong><?php echo $_SESSION['username']; ?>&nbsp;</strong>
        <a href="index.php?logout='1'" style="color: #6db2c9;"> logout</a></p>
      <?php endif ?>
    </div>
    <div ng-controller="formCtrl">
      <div class="searchbar">
        <a href="" class = "popup" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="Search with phrases like: 'Castles in Toronto', 'Brazilian Museums' or 'Things to do in Asia'" style="position:fixed; color: #d7d9db; padding-right: 40px; margin-top: 105px;"><span class="glyphicon glyphicon-info-sign"></span></a>
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
            alert('Search is not valid');
          }

        }

      }]);



      myApp.controller("ratingCtrl", ['$scope', '$http', function ($scope, $http) {
        $scope.url = 'rate.php';
        $scope.formsubmit = function() {
          $http.post($scope.url, {'review': $scope.review, 'attrname': $scope.attrname}).
          success(function (data, status) {
            $scope.status = status;
            $scope.data = data;
            $scope.res = data;
          })
        }
      }]);

      //directive that allows for HTML input value to be set while using ngModel
      //provided by Dan Hunsaker on stackoverflow.com/questions/10610282
      myApp.directive('input', ['$parse', function ($parse) {
        return {
          restrict: 'E',
          require: '?ngModel',
          link: function (scope, element, attrs) {
            if(attrs.value) {
              $parse(attrs.ngModel).assign(scope, attrs.value);
            }
          }
        };
      }]);



      myApp.config(function($routeProvider) {
        $routeProvider

        .when('/cntower', {
          templateUrl : 'readmore.php?q=cntower'})
          .when('/theshard', {
            templateUrl : 'readmore.php?q=theshard'})
            .when('/casaloma', {
              templateUrl : 'readmore.php?q=casaloma'})
              .when('/cart', {
                templateUrl : 'shoppingcart.php'})
                .when('/paid', {
                  templateUrl : 'paid.php'})

                });

                /*
                myApp.filter('filterText', function() {
                return function(x) {
                var arr = x.split('');
                var i, c, txt = "";
                for (i = 0; i < arr.length; i++) {
                if (x[i] == "#") {

                for (j = i; j < i+20; j++) {
                txt+=x[j];
              }
              break;
            }

          }
          return txt;
        };
      });
      */
      </script>

      <script>
      $('#reviewForm').submit(function() {
        var post_data = $('#mail_subscribe').serialize();
        $.post('process.php', post_data, function(data) {
          $('#notification').show();
        });
      });
      </script>

      <script>
      $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
      });
      </script>

      <script>
      function show_compare(str, orig) {
        document.getElementById("compare").style.display = "block";
        $("#compare").load("travel_planner/get_compare.php?q="+str+"&original="+orig);
      }
      function hide_compare() {
        document.getElementById("compare").style.display = "none";
        window.location.href = '#/cart';
      }
      </script>


    </body>

    </html>
