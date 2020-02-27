<?php
session_start();
include "include/navigation.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Travel Planner - Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  .map {
  	margin-top:30px;
    height: 200px;
    background: #aaa;
  }
  </style>
</head>


<body>


<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h3>Plans</h3>
      <p>Suggested Plans</p>
	  <div id="accordion">

  <div class="card">
    <div class="card-header">
      <input type=radio name="selectPlan" style="margin-right:10px">
      <a class="card-link" data-toggle="collapse" href="#collapseOne">
        Plan 1
      </a>
    </div>
    <div id="collapseOne" class="collapse show" data-parent="#accordion">
      <div class="card-body">
        Plan 1 Details
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <input type=radio name="selectPlan" style="margin-right:10px">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Plan 2
      </a>
    </div>
    <div id="collapseTwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
        Plan 2 Details
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
      <p>Price</p>
      <p>Tax</p>
      <p>Total</p>
      <button type=button>Purchase</button>
      <br>
    </div>
   </div>
</div>

</body>
</html>
