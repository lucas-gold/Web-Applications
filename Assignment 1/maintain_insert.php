<?php
    if(!isset($_SESSION)) { 
        session_start(); 
    } 
    /*
    if (isset($_SESSION['user_id'])) {
   
    // Get user data from the database using the user_id
    // Let access only to "logged in" pages
    echo "done";
    } else {
    // Redirect to the login page
    header("Location: http://www.yourdomain.com/login-form.php");
    echo "try again";
    }
    */
    require_once 'include/connection.php';
    include 'include/navigation.php'
?>

<html>
<head>
  <title>MaintainDB - Insert</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito|Titillium+Web" rel="stylesheet">
</head>

<style>
    .main {
        margin-top:50px;
    }

    .form_insert {
        margin-top: 30px;
        display: none;
    }
</style>

<script>
// Show/Hide appropriate forms
$(document).ready(function(){
    $("#btn_selectTable").click(function(){
        var form = $("#selectTable").val();
        $(".form_insert").hide();
        if(form == "users"){
            $("#form_users").toggle();
        }
        if(form == "attractions"){
            $("#form_attractions").toggle();
        }
        if(form == "plans"){
            $("#form_plans").toggle();
        }
        if(form == "country"){
            $("#form_attraction_photos").toggle();
        }
        if(form == "invoice"){
            $("#form_invoice").toggle();
        }
        if(form == "reviews"){
            $("#form_reviews").toggle();
        }
        if(form == "country"){
            $("#form_country").toggle();
        }
        if(form == "continent"){
            $("#form_continent").toggle();
        }
    });
});
</script>

<body>
    <?php require_once 'travel_planner/insert.php';?>

    <!--Create success/error message-->
    <?php
        if(isset($_SESSION['message'])):
    ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif?>

    <div class="container main">
         <h2>MaintainDB [Insert]</h2> 
         <form name="chooseTable" id="chooseTable">
         <div class="form-group"> 
            <label for="selectTable">Choose a table:</label>
            <select class="form-control" name="selectTable" id="selectTable">
                <option value="users" selected>users</option>
                <option value="attractions">attractions</option>
                <option value="plans">plans</option>
                <option value="country">country</option>
                <option value="continent">continent</option>
                <option value="invoice">invoice</option>
                <option value="reviews">reviews</option>
            </select>
        </div>
        </form>
        <button id="btn_selectTable" class="btn btn-success">Select</button>

        <form action="travel_planner/insert.php" method="POST" class="form_insert" id="form_users">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" maxlenght="30" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" maxlenght="30" required>
            </div>
            <div class="form-group">
                <label for="accountType">Account Type</label><br>
                <small><em>A = Admin, S = Standard</em></small>
                <input type="text" class="form-control" name="accountType" placeholder="S" id="accountType" maxlength="1" pattern="[AS]" required>
            </div>
            <button type="submit" name="btn_insert_user" class="btn btn-success" value="submit" value="submit">Insert</button>
        </form>

        <form action="travel_planner/insert.php" method="POST" class="form_insert" id="form_plans">
            <div class="form-group">
                <label for="startDate">Start Date</label><br>
                <small><em>YYYY-MM-DD</em></small>
                <input type="text" class="form-control" id="startDate" name="startDate" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" required>
            </div>
            <div class="form-group">
                <label for="attraction_id1">1st Attraction ID</label>
                <input type="number" class="form-control" id="attraction_id1" name="attraction_id1" maxlength="6" required>
            </div>
            <div class="form-group">
                <label for="attraction_id2">2nd Attraction ID</label>
                <small><em>*optional</em></small>
                <input type="number" class="form-control" maxlength="6" id="attraction_id2" name="attraction_id2">
            </div>
            <div class="form-group">
                <label for="attraction_id3">3rd Attraction ID</label>
                <small><em>*optional</em></small>
                <input type="number" class="form-control" maxlength="6" id="attraction_id3" name="attraction_id3">
            </div>
            <div class="form-group">
                <label for="transitFare">Transit Fare</label>
                <input type="number" class="form-control" id="transitFare" name="transitFare" step="0.05" pattern="^[0-9]+(\.[0-9]{1,2})?$" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" pattern="^[0-9]+(\.[0-9]{1,2})?$" required>
            </div>
            <button type="submit" name="btn_insert_plan" class="btn btn-success" value="submit">Insert</button>
        </form>

        <form action="travel_planner/insert.php" method="POST" class="form_insert" id="form_attractions">
            <div class="form-group">
                <label for="attraction">Attraction Name</label>
                <input type="text" class="form-control" name="attractionName" id="attractionName" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" id="type" required>
            </div>
            <div class="form-group">
                <label for="founder">Founder</label>
                <input type="text" class="form-control" name="founder" id="founder" required>
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input type="text" class="form-control" name="size" id="size" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" name="location" id="location" required>
            </div>
            <div class="form-group">
                <label for="country_id">Country ID</label>
                <input type="text" class="form-control" name="country_id" id="country_id" required>
            </div>
            <div class="form-group">
                <label for="cont_id">Continent ID</label>
                <input type="text" class="form-control" name="cont_id" id="cont_id" required>
            </div>
            <div class="form-group">
                <label for="picture1">Picture 1</label>
                <input type="text" class="form-control" name="picture1" id="picture1" required>
            </div>
            <div class="form-group">
                <label for="picture2">Picture 2</label>
                <input type="text" class="form-control" name="picture2" id="picture2" required>
            </div>
            <div class="form-group">
                <label for="picture3">Picture 3</label>
                <input type="text" class="form-control" name="picture3" id="picture3" required>
            </div>
            <div class="form-group">
                <label for="close_id">Close Id</label>
                <input type="text" class="form-control" name="close_id" id="close_id" required>
            </div>
            <button type="submit" name="btn_insert_attraction" class="btn btn-success" value="submit">Insert</button>
        </form>

        <form action="travel_planner/insert.php" method="POST" class="form_insert" id="form_invoice">
            <div class="form-group">
                <label for="planId">Plan ID</label>
                <input type="number" class="form-control" name="planId" id="planId" required>
            </div>
            <div class="form-group">
                <label for="userId">User ID</label>
                <input type="number" class="form-control" name="userId" id="userId" maxlenght="30" required>
            </div>
            <div class="form-group">
                <label for="invoiceTotal">Invoice Total</label>
                <input type="number" class="form-control" id="invoiceTotal" name="invoiceTotal" pattern="^[0-9]+(\.[0-9]{1,2})?$" required>
            </div>
            <button type="submit" name="btn_insert_invoice" class="btn btn-success" value="submit">Insert</button>
        </form>

        <form action="travel_planner/insert.php" method="POST" class="form_insert" id="form_country">
        <!--
            <div class="form-group">
                <label for="countryId">Country ID</label>
                <input type="number" class="form-control" name="countryId" id="countryId" max="6" required>
            </div>
        -->
            <div class="form-group">
                <label for="countryName">Country Name</label>
                <input type="text" class="form-control" name="countryName" id="countryName" maxlenght="50" required>
            </div>
            <div class="form-group">
                <label for="continentId">Continent ID</label>
                <input type="number" class="form-control" id="continentId" name="continentId" max="6" required>
            </div>
            <button type="submit" name="btn_insert_country" class="btn btn-success" value="submit">Insert</button>
        </form>

        <form action="travel_planner/insert.php" method="POST" class="form_insert" id="form_continent">
        <!--
            <div class="form-group">
                <label for="continentId">Continent ID</label>
                <input type="number" class="form-control" name="continentId" id="continentId" max="6" required>
            </div>
        -->
            <div class="form-group">
                <label for="continentName">Continent Name</label>
                <input type="text" class="form-control" name="continentName" id="continentName" maxlenght="50" required>
            </div>
            <button type="submit" name="btn_insert_continent" class="btn btn-success" value="submit">Insert</button>
        </form>

        <form action="travel_planner/insert.php" method="POST" class="form_insert" id="form_reviews">
            <div class="form-group">
                <label for="reviewerName">Name</label>
                <input type="text" class="form-control" name="reviewerName" id="reviewerName" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="attraction_id">Attraction Id</label>
                <input type="number" class="form-control" name="attraction_id" id="attraction_id" maxlength="6" required>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label><br>
                <small><em>*1-5</em></small>
                <input type="number" class="form-control" name="username" id="username" maxlength="1" min="0" max="5" required>
            </div>
            <div class="form-group">
                <label for="datePosted">Date Posted</label><br>
                <small><em>*YYYY-MM-DD HH:MI:SS</em></small>
                <input type="text" class="form-control" name="datePosted" id="datePosted" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="review">Review</label>
                <textarea class="form-control" id="review" rows="4" maxlength="240" required></textarea>
            </div>
            <button type="submit" name="btn_insert_review" class="btn btn-success" value="submit">Insert</button>
        </form>
    </div>
</body>
</html>
