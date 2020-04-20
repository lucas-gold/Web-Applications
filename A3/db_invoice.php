<?php 
include('dbconnect.php');

$update = false;
$sel_attr="";
$sel_user="";
$price="";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from invoice WHERE id=$id");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $sel_user=$n['user_id'];
        $sel_attr=$n['attr_id'];
        $price=$n['price'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>MaintainDB - Invoice</title>
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
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form-group">
            <label for="user_id">Invoiced To</label>
            <select class="form-control input-sm" id="user_id" name="user_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT id,username FROM users"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['id'];?>" <?php if($sel_user == $row['id']) echo "selected"; ?>><?php echo $row['username'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="attr_id">Attraction</label>
            <select class="form-control input-sm" id="attr_id" name="attr_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT id,name FROM Attraction"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['id'];?>" <?php if($sel_attr == $row['id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control input-sm" type="text" id="price" name="price" value="<?php echo $price?>">
        </div>
            <?php if ($update == true): ?>
                <button class="btn btn-warning btn-sm" type="submit" name="update_invoice">Update</button> 
            <?php else: ?>
                <button class="btn btn-success btn-sm" type="submit" name="add_invoice">Add</button>
            <?php endif ?>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM invoice"); ?>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Invoiced To</th>
                <th>Attraction</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <?php $user_id = $row['user_id'];
                $result2 = mysqli_query($conn, "SELECT username FROM users WHERE id=$user_id");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['username']; ?></td>
                <?php $attr_id = $row['attr_id'];
                $result2 = mysqli_query($conn, "SELECT name FROM Attraction WHERE id=$attr_id");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['name'];?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="db_invoice.php?edit=<?php echo $row['id'];?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="maintaindb.php?del_invoice=<?php echo $row['id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
