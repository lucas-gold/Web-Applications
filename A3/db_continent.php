<?php 
include('dbconnect.php');

$update = false;
$name="";

if(isset($_GET['edit'])){
    $cont_id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from Continent WHERE cont_id=$cont_id");

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
        <input type="hidden" name="cont_id" value="<?php echo $cont_id;?>">
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
                <th>Continent ID</th>
                <th>Continent</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['cont_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="db_continent.php?edit=<?php echo $row['cont_id'];?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="maintaindb.php?del_cont=<?php echo $row['cont_id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
