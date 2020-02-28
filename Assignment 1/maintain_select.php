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
        if(form == "attraction_photos"){
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
         <h2>MaintainDB [Select]</h2> 
         <form name="chooseTable" id="chooseTable">
         <div class="form-group"> 
            <label for="selectTable">Choose a table:</label>
            <select class="form-control" name="selectTable" id="selectTable">
                <option value="users" selected>users</option>
                <option value="attractions">attractions</option>
                <option value="plans">plans</option>
                <option value="attraction_photos">attraction_photos</option>
                <option value="invoice">invoice</option>
                <option value="reviews">reviews</option>
            </select>
        </div>
        </form>
        <button id="btn_selectTable" class="btn btn-success">Select</button>
    </div>
</body>
</html>
