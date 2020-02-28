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
  <title>MaintainDB - update</title>
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

    .form_update {
        margin-top: 30px;
        display: none;
    }
</style>

<script>
// Show/Hide appropriate forms
$(document).ready(function(){
    $("#btn_selectTable").click(function(){
        var form = $("#selectTable").val();
        $(".form_update").hide();
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
    });
});
</script>

<body>
    <?php require_once 'travel_planner/update.php';?>

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
         <h2>MaintainDB [update]</h2> 
         <form name="chooseTable" id="chooseTable">
         <div class="form-group"> 
            <label for="selectTable">Choose a table:</label>
            <select class="form-control" name="selectTable" id="selectTable">
                <option value="users" selected>users</option>
                <option value="attractions">attractions</option>
                <option value="plans">plans</option>
                <option value="country">country</option>
                <option value="invoice">invoice</option>
                <option value="reviews">reviews</option>
            </select>
        </div>
        </form>
        <button id="btn_selectTable" class="btn btn-success">Select</button>

        <form action="travel_planner/update.php" method="POST" class="form_update" id="form_users">
            <div class="form-group">
                <label for="userid">User ID</label>
                <input type="number" class="form-control" name="userid" id="userid" maxlenght="10" required>
            </div>
            <button type="submit" name="btn_update_user" class="btn btn-danger" value="submit" value="submit">update</button>
        </form>

        <form action="travel_planner/update.php" method="POST" class="form_update" id="form_plans">
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
            <button type="submit" name="btn_update_plan" class="btn btn-success" value="submit">update</button>
        </form>

        <form action="travel_planner/update.php" method="POST" class="form_update" id="form_attractions">
            <div class="form-group">
                <label for="attraction">Attraction Name</label>
                <input type="text" class="form-control" id="attraction" required>
            </div>
            <div class="form-group">
                <label for="continent">Continent</label>
                <input type="text" class="form-control" id="continent" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" required>
            </div>
            <div class="form-group">
                <label for="dateCreated">Date Created</label>
                <input type="text" class="form-control" id="dateCreated" required>
            </div>
            <div class="form-group">
                <label for="founder">Founder</label>
                <input type="text" class="form-control" id="founder" required>
            </div>
            <button type="submit" name="btn_update_attraction" class="btn btn-success" value="submit">update</button>
        </form>

        <form action="travel_planner/update.php" method="POST" class="form_update" id="form_attraction_photos">
            <div class="form-group">
                <label for="filePath">File Path</label>
                <input type="text" class="form-control" id="filePath" required>
            </div>
            <div class="form-group">
                <label for="attractionId">Attraction ID</label>
                <input type="text" class="form-control" id="attractionId" required>
            </div>
            <button type="submit" name="btn_update_photo" class="btn btn-success" value="submit">update</button>
        </form>

        <form action="travel_planner/update.php" method="POST" class="form_update" id="form_invoice">
            <div class="form-group">
                <label for="planId">Plan ID</label>
                <input type="text" class="form-control" id="planId" required>
            </div>
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" name="username" id="username" maxlenght="30" required>
            </div>
            <div class="form-group">
                <label for="numAdults">Adults</label>
                <input type="number" class="form-control" id="numAdults" name="numAdults" min="1" max="100" required>
            </div>
            <div class="form-group">
                <label for="numChild">Children</label>
                <input type="number" class="form-control" id="numChild" name="numChild" min="1" max="100" required>
            </div>
            <button type="submit" name="btn_update_invoice" class="btn btn-success" value="submit">update</button>
        </form>

        <form action="travel_planner/update.php" method="POST" class="form_update" id="form_reviews">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" maxlenght="30" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" maxlenght="30" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" maxlenght="30" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" maxlenght="30" required>
            </div>
            <div class="form-group">
                <label for="review">Review</label>
                <textarea class="form-control" id="review" rows="4" required></textarea>
            </div>
            <button type="submit" name="btn_update_review" class="btn btn-success" value="submit">update</button>
        </form>
    </div>
</body>
</html>
