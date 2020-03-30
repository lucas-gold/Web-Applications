<?php
session_start();
require_once('travel_planner/create_table.php');
include 'include/navigation.php';

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

body {
  background: url("img/cityscape.svg");
  background-size:cover;
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
        <?php $i = 1; foreach ($plan as $row): ?>
          <p id="planID">Plan ID: <?=$row["id"]?></p>
          <p id="planStartDate">Start Date: <?=$row["startDate"]?></p>
          <p id="planDuration">Duration: <?=$row["duration"]?></p>
          <p id="attractions">Attractions: <?=$row["attraction_id1"]?></p>
          <p id="planTransitFare">Transportation Fare: $<?=$row["transitFare"]?></p>
          <p id="planPrice">Price: $<?=$row["price"]?></p>

        <?php $i++; endforeach ?>
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
        <p id="planID">Plan ID: <?=$row["id"]+2?></p>
        <p id="planStartDate">Start Date: <?=$row["startDate"]?></p>
        <p id="planDuration">Duration: 1<?=$row["duration"]?></p>
        <p id="attractions">Attractions: <?=$row["attraction_id1"]?></p>
        <p id="planTransitFare">Transportation Fare: $<?=$row["transitFare"]*2?></p>
        <p id="planPrice">Price: $<?=$row["price"]*2?></p>
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
      <p id="invoicePrice">Price: <?=$row["price"]?></p>
      <p id="tax">Tax: <?=$row["price"] * 0.13?></p>
      <p id="invoiceTotal">Total: <?=$row["price"] * 1.13?></p>
      <button type=button>Purchase</button>
      <br>
    </div>
   </div>
</div>


  <!--MAIN PAGE-->

    <!--DROPDOWN MENU-->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
