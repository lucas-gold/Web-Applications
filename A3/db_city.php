<?php 
include('dbconnect.php');

$update = false;
$name="";
$sel_country="";

if(isset($_GET['edit'])){
    $city_id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from City WHERE city_id=$city_id");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $name=$n['name'];
        $sel_country=$n['country_id'];
    }
}
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
        <input type="hidden" name="city_id" value="<?php echo $city_id;?>" required>
        <div class="form-group">
            <label for id="name">City</label>
            <input class="form-control input-sm" type="text" id="name" name="name" value="<?php echo $name;?>" required>
        </div>
        <div class="form-group">
            <label for="country_id">Country</label>
            <select class="form-control input-sm" id="country_id" name="country_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT * FROM Country"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['country_id'];?>" <?php if($sel_country == $row['country_id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
        </div>
            <?php if ($update == true): ?>
                <button class="btn btn-warning btn-sm" type="submit" name="update_city">Update</button> 
            <?php else: ?>
                <button class="btn btn-success btn-sm" type="submit" name="add_city">Add</button>
            <?php endif ?>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM city"); ?>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>City</th>
                <th>Country</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <?php $country_id = $row['country_id'];
                $result2 = mysqli_query($conn, "SELECT name FROM Country WHERE country_id=$country_id");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['name'];?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="db_city.php?edit=<?php echo $row['city_id'];?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="maintaindb.php?del_city=<?php echo $row['city_id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>