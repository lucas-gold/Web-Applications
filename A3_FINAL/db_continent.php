<?php 
include('dbconnect.php');

$update = false;
$name="";

if(isset($_GET['edit'])){
    $name = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from Continent WHERE name='$name'");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $name=$n['name'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>MaintainDB - Continent</title>
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

<div class="container">
    <?php if(isset($_SESSION['message'])):?>
    <div class="alert alert-success alert-dismissible">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);    
        ?>
    </div>
    <?php endif ?>

    <form method="post" action="maintaindb.php" class="form-inline">
        <div class="form-group">
            <label for="name">Continent</label>
            <input class="form-control input-sm" type="text" id="name" name="name" value="<?php echo $name;?>" required>
        </div>
        <?php if ($update == true): ?>
            <button class="btn btn-warning btn-sm" type="submit" name="update_cont">Update</button> 
        <?php else: ?>
            <button class="btn btn-success btn-sm" type="submit" name="add_cont">Add</button>
        <?php endif ?>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM Continent"); ?>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Continent</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="db_continent.php?edit=<?php echo $row['name'];?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="maintaindb.php?del_cont=<?php echo $row['name'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
