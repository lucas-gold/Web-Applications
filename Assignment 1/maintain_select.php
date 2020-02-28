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
    //require_once 'include/connection.php';
    include 'include/navigation.php'
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_planner";

//Connect to db
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
}
?>

<html>
<head>
  <title>MaintainDB - Select</title>
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
</style>

<script>
// Show/Hide appropriate forms
$(document).ready(function(){
    $("#btn_selectTable").click(function(){
        var form = $("#selectTable").val();
        $(".table_select").hide();
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
    <?php require_once 'travel_planner/select.php';?>

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
        <form action="travel_planner/select.php" method="POST" name="chooseTable" id="chooseTable">
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
        <button name="btn_selectTable" id="btn_selectTable" class="btn btn-success">Select</button>
        
        <?php
            $stmt = $conn->prepare("SELECT * FROM users");
            $stmt->execute();
        ?>

        <table class="table table_select">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Account Type</th>
                </tr>
            </thead>
            <?php while($row = $result->fetch_array()):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['password'];?></td>
                    <td><?php echo $row['Account Type'];?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>