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
  <title>MaintainDB - Delete</title>
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

    .form_delete {
        margin-top: 30px;
        display: none;
    }
</style>

<script>
// Show/Hide appropriate forms
$(document).ready(function(){
    $("#btn_selectTable").click(function(){
        var form = $("#selectTable").val();
        $(".form_delete").hide();
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
    <?php require_once 'travel_planner/delete.php';?>

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
        <h2>MaintainDB [Delete]</h2> 
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

        <form action="travel_planner/delete.php" method="POST" class="form_delete" id="form_users">
            <div class="form-group">
                <label for="userid">User ID</label>
                <input type="number" class="form-control" name="userid" id="userid" maxlenght="10" required>
            </div>
            <button type="submit" name="btn_delete_user" class="btn btn-danger" value="submit" value="submit">Delete</button>
        </form>

        <form action="travel_planner/delete.php" method="POST" class="form_delete" id="form_plans">
            <div class="form-group">
                <label for="planId">Plan ID</label><br>
                <input type="number" class="form-control" id="planId" name="planId" maxlength="6" required>
            </div>
            <button type="submit" name="btn_delete_plan" class="btn btn-danger" value="submit">Delete</button>
        </form>

        <form action="travel_planner/delete.php" method="POST" class="form_delete" id="form_attractions">
            <div class="form-group">
                <label for="attractionId">Attraction ID</label>
                <input type="number" class="form-control" name="attractionId" id="attractionId"  maxlength="6" required>
            </div>
            <button type="submit" name="btn_delete_attraction" class="btn btn-danger" value="submit">delete</button>
        </form>

        <form action="travel_planner/delete.php" method="POST" class="form_delete" id="form_invoice">
            <div class="form-group">
                <label for="invoiceID">Invoice ID</label>
                <input type="number" class="form-control" name="invoiceID" id="invoiceID" maxlenght="6" required>
            </div>
            <button type="submit" name="btn_delete_invoice" class="btn btn-danger" value="submit">delete</button>
        </form>

        <form action="travel_planner/delete.php" method="POST" class="form_delete" id="form_country">
            <div class="form-group">
                <label for="countryId">Country ID</label>
                <input type="number" class="form-control" name="countryId" id="countryId" maxlenght="6" required>
            </div>
            <button type="submit" name="btn_insert_country" class="btn btn-danger" value="submit">Insert</button>
        </form>

        <form action="travel_planner/delete.php" method="POST" class="form_delete" id="form_continent">
            <div class="form-group">
                <label for="continentId">Continent ID</label>
                <input type="number" class="form-control" name="continentId" id="continentId" max="6" required>
            </div>
            <button type="submit" name="btn_insert_continent" class="btn btn-danger" value="submit">Insert</button>
        </form>

        <form action="travel_planner/delete.php" method="POST" class="form_delete" id="form_reviews">
            <div class="form-group">
                <label for="reviewId">Review ID</label>
                <input type="number" class="form-control" name="reviewId" id="reviewId" maxlenght="6" required>
            </div>
            <button type="submit" name="btn_delete_review" class="btn btn-danger" value="submit">delete</button>
        </form>
    </div>
</body>
</html>
