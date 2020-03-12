var app = angular.module('searchApp', []);

app.controller('searchCtrl', function($scope, $http) {

  $scope.results = '';
  var url = 'https://restcountries.eu/rest/v2/all';
  $http.get(url).success(
    function(data) {
      $scope.results = data;
    });

  $scope.getCurrentTime = function(timezone) {
      return (new moment().zone(timezone).format("HH:mm"));
  };

});
