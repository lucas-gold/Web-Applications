<?php 
include('dbconnect.php');

$update = false;
$name="";

?>

<!DOCTYPE html>
<html>
<head>
<title>MaintainDB - City</title>
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
      <li><a href="db_attractions.php">Users</a></li>
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
            <label for id="name">City</label>
            <input class="form-control input-sm" type="text" id="name" name="name" value="<?php echo $name;?>" required>
        </div>
                <button class="btn btn-success btn-sm" type="submit" name="add_city">Add</button>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM city"); ?>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>City</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <a class="btn btn-danger btn-sm" href="maintaindb.php?del_city=<?php echo $row['name'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>