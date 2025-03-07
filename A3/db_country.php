<?php 
include('dbconnect.php');

$update = false;
$name="";
$sel_cont="";

if(isset($_GET['edit'])){
    $country_id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from Country WHERE country_id=$country_id");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $name=$n['name'];
        $sel_cont=$n['cont_id'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>MaintainDB - Country</title>
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

    <form class="form-inline" method="post" action="maintaindb.php">
        <input type="hidden" name="country_id" value="<?php echo $country_id;?>" required>
        <div class="form-group">
            <label for="name">Country</label>
            <input class="form-control input-sm" type="text" id="name" name="name" value="<?php echo $name;?>" required>
        </div>

        <div class="form-group">
            <label for="cont_id">Continent</label>
            <select class="form-control input-sm" id="cont_id" name="cont_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT * FROM Continent"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['cont_id'];?>" <?php if($sel_cont == $row['cont_id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
        </div>

        <?php if ($update == true): ?>
            <button class="btn btn-warning btn-sm" type="submit" name="update_country">Update</button> 
        <?php else: ?>
            <button class="btn btn-success btn-sm" type="submit" name="add_country">Add</button>
        <?php endif ?>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM country"); ?>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Country</th>
                <th>Continent</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <?php $cont_id = $row['cont_id'];
                $result2 = mysqli_query($conn, "SELECT name FROM Continent WHERE cont_id=$cont_id");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['name'];?></td>
                <td>
                    <a href="db_country.php?edit=<?php echo $row['country_id'];?>" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                    <a href="maintaindb.php?del_country=<?php echo $row['country_id'];?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
