<?php 
include('dbconnect.php');

$update = false;
$username="";
$password="";
$fullname="";
$email="";
$address="";
$phone_number="";
$sel_acc="";

if(isset($_GET['edit'])){
    $username = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from users WHERE username='$username'");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $username=$n['username'];
        $password=$n['password'];
        $fullname=$n['fullname'];
        $email=$n['email'];
        $address=$n['address'];
        $phone_number=$n['phone_number'];
        //$accountType=$n['accountType'];
        $sel_acc=$n['accountType'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>MaintainDB - Users</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MaintainDB</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="db_attractions.php">Attractions</a></li>
      <li><a href="db_users.php">Users</a></li>
      <li><a href="db_city.php">City</a></li>
      <li><a href="db_country.php">Country</a></li>
      <li><a href="db_continent.php">Continent</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
    </ul>
  </div>
</nav>

<div class="container" style="margin-top:50px">
    <?php if(isset($_SESSION['message'])):?>
    <div class="alert alert-success alert-dismissable">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);    
        ?>
    </div>
    <?php endif ?>

    <form method="post" action="maintaindb.php">
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control input-sm" type="text" id="username" name="username" value="<?php echo $username;?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control input-sm" type="text" id="password" name="password" value="<?php echo $password;?>" required>
        </div>
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input class="form-control input-sm" type="text" id="fullname" name="fullname" value="<?php echo $fullname;?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control input-sm" type="text" id="email" name="email" value="<?php echo $email;?>" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input class="form-control input-sm" type="text" id="phone_number" name="phone_number" value="<?php echo $phone_number;?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input class="form-control input-sm" type="text" id="address" name="address" value="<?php echo $address;?>" required>
        </div>
        <div class="form-group">
            <label for="accountType">Account Type</label>
            <select class="form-control input-sm" id="accountType" name="accountType" required>
                <option disabled selected>Select one...</option>
                <option value="2" <?php if($sel_acc == "2") echo "selected"?>>Admin</option>
                <option value="1" <?php if($sel_acc == "1") echo "selected"?>>Regular</option>
            </select>
        </div>
            <?php if ($update == true): ?>
                <button class="btn btn-warning btn-sm" type="submit" name="update_user">Update</button> 
            <?php else: ?>
                <button class="btn btn-success btn-sm" type="submit" name="add_user">Add</button>
            <?php endif ?>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM users"); ?>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Account Type</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['accountType']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="db_users.php?edit=<?php echo $row['username'];?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="maintaindb.php?del_user=<?php echo $row['username'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>

