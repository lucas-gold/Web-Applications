<?php 
include('dbconnect.php');

$update = false;
$id="";
$startDate="";
$duration="";
$transitFare="";
$price="";
$sel_att1="";
$sel_att2="";
$sel_att3="";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from plans WHERE id=$id");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        //$id=$n['id'];
        $startDate=$n['startDate'];
        $duration=$n['duration'];
        $sel_att1=$n['attraction_id1'];
        $sel_att2=$n['attraction_id2'];
        $sel_att3=$n['attraction_id3'];
        $transitFare=$n['transitFare'];
        $price=$n['price'];
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>MaintainDB - Plans</title></head>
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
            <input type="text" name="id" value="<?php echo $id;?>">
            <label>Start Date</label>
            <input type="text" name="startDate" value="<?php echo $startDate;?>" required>
            <label>Duration</label>
            <input type="text" name="duration" value="<?php echo $duration;?>" required>
            <label>Attraction 1</label>
            <select name="att_id1" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT id,name FROM Attraction"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['id'];?>" <?php if($sel_att1 == $row['id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
            <label>Attraction 2</label>
            <select name="att_id2">
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT id,name FROM Attraction");
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['id'];?>" <?php if($sel_att2 == $row['id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
            <label>Attraction 3</label>
            <select name="att_id3">
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT id,name FROM Attraction");
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['id'];?>" <?php if($sel_att3 == $row['id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
            <label>Transit Fare</label>
            <input type="text" name="transitFare" value="<?php echo $transitFare;?>" required>
            <label>Price</label>
            <input type="text" name="price" value="<?php echo $price;?>" required>
            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update_plan">Update</button> 
            <?php else: ?>
                <button class="btn" type="submit" name="add_plan">Add</button>
            <?php endif ?>
        </div>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM plans"); ?>
    <table>
        <thead>
            <tr>
                <th>Plan ID</th>
                <th>Start Date</th>
                <th>Duration</th>
                <th>Attraction 1</th>
                <th>Attraction 2</th>
                <th>Attraction 3</th>
                <th>Transit Fare</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['startDate']; ?></td>
                <td><?php echo $row['duration']; ?></td>
                
                <?php $att_id1 = $row['attraction_id1'];
                $result2 = mysqli_query($conn, "SELECT id,name FROM Attraction WHERE id=$att_id1");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['name'];?></td>

                <?php 
                $att_id2 = $row['attraction_id2'];
                if(!empty($att_id2)){
                    $result2 = mysqli_query($conn, "SELECT id,name FROM Attraction WHERE id=$att_id2");
                    $row2 = mysqli_fetch_array($result2);
                    echo "<td>" . $row2['name'] . "</td>";
                }else{
                    echo "<td></td>";
                }

                $att_id3 = $row['attraction_id3'];
                if(!empty($att_id3)){
                    $result2 = mysqli_query($conn, "SELECT id,name FROM Attraction WHERE id=$att_id3");
                    $row2 = mysqli_fetch_array($result2);
                    echo "<td>" . $row2['name'] . "</td>";
                }else{
                    echo "<td></td>";
                }
                ?>
                
                <td><?php echo $row['transitFare']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <a href="db_plans.php?edit=<?php echo $row['id'];?>">Edit</a>
                </td>
                <td>
                    <a href="maintaindb.php?del_plan=<?php echo $row['id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
