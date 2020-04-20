<?php 
include('dbconnect.php');

$update = false;
$reviewer_name="";
$attr_id="";
$date_posted="";
$rating="";
$sel_attr="";
$sel_rating="";
$review="";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from Reviews WHERE id=$id");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $reviewer_name=$n['reviewer_name'];
        $review=$n['review'];
        $sel_rating=$n['rating'];
        $date_posted=$n['date_posted'];
        $sel_attr=$n['attr_id'];
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>MaintainDB - Reviews</title></head>
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
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <label>Reviewer Name</label>
            <input type="text" name="reviewer_name" value="<?php echo $reviewer_name;?>" required>
            <label>Attraction</label>
            <select name="attr_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT id,name FROM Attraction"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['id'];?>" <?php if($sel_attr == $row['id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
            <label>Review</label>
            <input type="text" name="review" value="<?php echo $review?>">
            <label>Rating</label>
            <select name="rating" required>
                    <option value="0" <?php if($sel_rating == 0) echo "selected"; ?>>0</option>
                    <option value="1" <?php if($sel_rating == 1) echo "selected"; ?>>1</option>
                    <option value="2" <?php if($sel_rating == 2) echo "selected"; ?>>2</option>
                    <option value="3" <?php if($sel_rating == 3) echo "selected"; ?>>3</option>
                    <option value="4" <?php if($sel_rating == 4) echo "selected"; ?>>4</option>
                    <option value="5" <?php if($sel_rating == 5) echo "selected"; ?>>5</option>
            </select>
            <label>Date Posted</label>
            <input type="text" name="date_posted" value="<?php echo $date_posted?>">
            <?php if ($update == true): ?>
                <button class="btn" type="submit" name="update_review">Update</button> 
            <?php else: ?>
                <button class="btn" type="submit" name="add_review">Add</button>
            <?php endif ?>
        </div>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM Reviews"); ?>
    <table>
        <thead>
            <tr>
                <th>Reviewer Name</th>
                <th>Attraction</th>
                <th>Review</th>
                <th>Rating</th>
                <th>Date Posted</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['reviewer_name']; ?></td>
                <?php $attr_id = $row['attr_id'];
                $result2 = mysqli_query($conn, "SELECT name FROM Attraction WHERE id=$attr_id");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['name'];?></td>
                <td><?php echo $row['review']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['date_posted']; ?></td>
                <td>
                    <a href="db_reviews.php?edit=<?php echo $row['id'];?>">Edit</a>
                </td>
                <td>
                    <a href="maintaindb.php?del_review=<?php echo $row['id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
