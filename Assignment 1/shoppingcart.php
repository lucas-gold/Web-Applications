<?php
session_start();
include "include/navigation.php"; 
?>

<html>
<head>
  <title>Travel Planner - Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito|Titillium+Web" rel="stylesheet">
  <style>
  .map {
  	margin-top:30px;
    height: 200px;
    background: #aaa;
  }
  </style>
</head>

<body>

<div class="container" style="margin-top:50px">
  <div class="row">
    <div class="col-sm-4">
      <h3>Plans</h3>
      <p>Suggested Plans</p>
      <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
       <input type=radio name="selectPlan" style="margin-right:10px">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Plan 1</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
          <p id="planID">Plan ID: </p>
          <p id="planStartDate">Start Date: </p>
          <p id="planDuration">Duration: </p>
          <p id="attractions">Attractions: </p>
          <p id="planTransitFare">Transportation Fare: $</p>
          <p id="planPrice">Price: $</p>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
      <input type=radio name="selectPlan" style="margin-right:10px">  
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Plan 2</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
          <p id="planID">Plan ID: </p>
          <p id="planStartDate">Start Date: </p>
          <p id="planDuration">Duration: </p>
          <p id="attractions">Attractions: </p>
          <p id="planTransitFare">Transportation Fare: $</p>
          <p id="planPrice">Price: $</p>
      </div>
    </div>
  </div>
</div>
      <div class="map">Map</div>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <h2>Invoice</h2>
      <h5>Plan Name</h5>
      <p>
      <label for="numAdults" style="margin-right: 35px">Adults</label>
      <input type="number" id="numAdults" name="numAdults" min="1" max="10">
      </p>
      <p>
      <label for="numChild" style="margin-right: 20px">Children</label>
      <input type="number" id="numChild" name="numChild" min="1" max="10">
      </p>
      <p id="invoicePrice">Price: </p>
      <p id="tax">Tax: </p>
      <p id="invoiceTotal">Total: </p>
      <button type=button>Purchase</button>
      <br>
    </div>
   </div>
</div>

</body>
</html>

