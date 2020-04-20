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
<head><title>MaintainDB - Continent</title></head>
<body>

    <?php if(isset($_SESSION['message'])):?>
    <div>
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);    
        ?>
    </div>
    <?php endif ?>

    <form method="post" action="maintaindb.php">
        <div>
            <input type="hidden" name="cont_id" value="<?php echo $cont_id;?>">
            <label>Continent</label>
            <input type="text" name="name" value="<?php echo $name;?>" required>

            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update_cont">Update</button> 
            <?php else: ?>
                <button class="btn" type="submit" name="add_cont">Add</button>
            <?php endif ?>
        </div>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM Continent"); ?>
    <table>
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
                    <a href="db_continent.php?edit=<?php echo $row['cont_id'];?>">Edit</a>
                </td>
                <td>
                    <a href="maintaindb.php?del_cont=<?php echo $row['cont_id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
