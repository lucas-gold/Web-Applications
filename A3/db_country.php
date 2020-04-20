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
<head><title>MaintainDB - Country</title></head>
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
            <input type="hidden" name="country_id" value="<?php echo $country_id;?>" required>
            <label>Country</label>
            <input type="text" name="name" value="<?php echo $name;?>" required>
            <label>Continent</label>
            <select name="cont_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT * FROM Continent"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['cont_id'];?>" <?php if($sel_cont == $row['cont_id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update_country">Update</button> 
            <?php else: ?>
                <button class="btn" type="submit" name="add_country">Add</button>
            <?php endif ?>
        </div>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM country"); ?>
    <table>
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
                    <a href="db_country.php?edit=<?php echo $row['country_id'];?>">Edit</a>
                </td>
                <td>
                    <a href="maintaindb.php?del_country=<?php echo $row['country_id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
