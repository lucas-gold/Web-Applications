<?php 
include('dbconnect.php');

$update = false;
$name="";
$type="";
$founder="";
$size="";
$year_created="";
$location="";
$country_id="";
$cont_id="";
$picture1="";
$picture2="";
$picture3="";
$close_id="";
$sel_cont="";
$sel_country="";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from Attraction WHERE id=$id");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $name=$n['name'];
        $type=$n['type'];
        $founder=$n['founder'];
        $size=$n['size'];
        $year_created=$n['year_created'];
        $location=$n['location'];
        //$country_id=$n['country_id'];
        //$cont_id=$n['cont_id'];
        $picture1=$n['picture1'];
        $picture2=$n['picture2'];
        $picture3=$n['picture3'];
        $close_id=$n['close_id'];
        $sel_cont=$n['cont_id'];
        $sel_country=$n['country_id'];;
    }
}

?>

<!DOCTYPE html>
<html>
<head><title>MaintainDB - Attractions</title></head>
<body>

    <?php if(isset($_SESSION['message'])):?>
    <div>
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);    
        ?>
    </div>
    <?php endif ?>

    <form method="post" action="maintaindb.php" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name;?>">
            <label>Type</label>
            <input type="text" name="type" value="<?php echo $type;?>">
            <label>Founder</label>
            <input type="text" name="founder" value="<?php echo $founder;?>">
            <label>Size</label>
            <input type="text" name="size" value="<?php echo $size;?>">
            <label>Year Created</label>
            <input type="text" name="year_created" value="<?php echo $year_created;?>">
            <label>Location</label>
            <input type="text" name="location" value="<?php echo $location;?>">

            <label>Country</label>
            <select name="country_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT * FROM Country"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['country_id'];?>" <?php if($sel_country == $row['country_id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>

            <label>Continent</label>
            <select name="cont_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT * FROM Continent"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['cont_id'];?>" <?php if($sel_cont == $row['cont_id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>

            <label>Picture 1</label>
            <?php if(!empty($picture1)){?>
            <img src="<?php echo $picture1;?>" height="50" width="50">
            <input type="hidden" name="picture1" value="<?php echo $picture1;?>">
            <?php } ?>
            <input type="file" name="picture1" value="<?php echo $picture1;?>">

            <label>Picture 2</label>
            <?php if(!empty($picture2)){?>
            <img src="<?php echo $picture2;?>" height="50" width="50">
            <?php } ?>
            <input type="hidden" name="picture2" value="<?php echo $picture2;?>">
            <input type="file" name="picture2" value="<?php echo $picture2;?>">

            <label>Picture 3</label>
            <?php if(!empty($picture3)){?>
            <img src="<?php echo $picture3;?>" height="50" width="50">
            <input type="hidden" name="picture3" value="<?php echo $picture3;?>">
            <?php } ?>
            <input type="hidden" name="picture3" value="<?php echo $picture3;?>">
            <input type="file" name="picture3" accept="image/*" value="<?php echo $picture3;?>">

            <label>Close ID</label>
            <input type="text" name="close_id" value="<?php echo $close_id;?>">

            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update_att">Update</button> 
            <?php else: ?>
                <button class="btn" type="submit" name="add_att">Add</button>
            <?php endif ?>
        </div>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM Attraction"); ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Founder</th>
                <th>Size</th>
                <th>Year Created</th>
                <th>Location</th>
                <th>Country</th>
                <th>Continent</th>
                <th>Picture 1</th>
                <th>Picture 2</th>
                <th>Picture 3</th>
                <th>Close ID</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['founder']; ?></td>
                <td><?php echo $row['size']; ?></td>
                <td><?php echo $row['year_created']; ?></td>
                <td><?php echo $row['location']; ?></td>
                
                <?php $country_id = $row['country_id'];
                $result2 = mysqli_query($conn, "SELECT name FROM Country WHERE country_id=$country_id");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['name'];?></td>

                <?php $cont_id = $row['cont_id'];
                $result2 = mysqli_query($conn, "SELECT name FROM Continent WHERE cont_id=$cont_id");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['name'];?></td>

                <td><?php echo $row['picture1']; ?></td>
                <td><?php echo $row['picture2']; ?></td>
                <td><?php echo $row['picture3']; ?></td>
                <td><?php echo $row['close_id']; ?></td>
                <td>
                    <a href="db_attractions.php?edit=<?php echo $row['id'];?>">Edit</a>
                </td>
                <td>
                    <a href="maintaindb.php?del_att=<?php echo $row['id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>

