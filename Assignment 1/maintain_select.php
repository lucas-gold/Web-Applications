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

        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Account Type</th>
                </tr>
            </thead>
            <?php
                while($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['password'];?></td>
                    <td><?php echo $row['Account Type'];?></td>
                </tr>
        </table>
    </div>

</body>
</html>
