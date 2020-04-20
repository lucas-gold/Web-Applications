<?php 
include('dbconnect.php');

$update = false;
$date_posted="";
$rating="";
$sel_attr="";
$sel_user="";
$sel_rating="";
$review="";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from Reviews WHERE id=$id");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $sel_user=$n['reviewer_id'];
        $review=$n['review'];
        $sel_rating=$n['rating'];
        $date_posted=$n['date_posted'];
        $sel_attr=$n['attr_id'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>MaintainDB - Reviews</title>
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

    <form method="post" action="maintaindb.php">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form-group">
            <label for="reviewer_id">Reviewer Name</label>
            <select class="form-control input-sm" id="reviewer-id" name="reviewer_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT id,fullname FROM users"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['id'];?>" <?php if($sel_user == $row['id']) echo "selected"; ?>><?php echo $row['fullname'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="attr_id">Attraction</label>
            <select class="form-control input-sm" id="attr-id" name="attr_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT id,name FROM Attraction"); 
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['id'];?>" <?php if($sel_attr == $row['id']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="review">Review</label>
            <!--<input type="text" name="review" value="<?php echo $review?>">-->
            <textarea  class="form-control" maxlength="240" rows="5" cols="50" id="review" name="review"><?php echo $review?></textarea>
        </div>
        <div class="form-group">
            <label for="rating"l>Rating</label>
            <select class="form-control input-sm" id="rating" name="rating" required>
                    <option value="1" <?php if($sel_rating == 1) echo "selected"; ?>>1</option>
                    <option value="2" <?php if($sel_rating == 2) echo "selected"; ?>>2</option>
                    <option value="3" <?php if($sel_rating == 3) echo "selected"; ?>>3</option>
                    <option value="4" <?php if($sel_rating == 4) echo "selected"; ?>>4</option>
                    <option value="5" <?php if($sel_rating == 5) echo "selected"; ?>>5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date_posted">Date Posted</label>
            <input class="form-control input-sm" type="text" id="date_posted" name="date_posted" value="<?php echo $date_posted?>">
        </div>
            <?php if ($update == true): ?>
                <button class="btn btn-warning btn-sm" type="submit" name="update_review">Update</button> 
            <?php else: ?>
                <button class="btn btn-success btn-sm" type="submit" name="add_review">Add</button>
            <?php endif ?>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM Reviews"); ?>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Review ID</th>
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
                <td><?php echo $row['id'];?></td>
                <?php $reviewer_id = $row['reviewer_id'];
                $result2 = mysqli_query($conn, "SELECT fullname FROM users WHERE id=$reviewer_id");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['fullname']; ?></td>
                <?php $attr_id = $row['attr_id'];
                $result2 = mysqli_query($conn, "SELECT name FROM Attraction WHERE id=$attr_id");
                $row2 = mysqli_fetch_array($result2);?>
                <td><?php echo $row2['name'];?></td>
                <td><?php echo $row['review']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['date_posted']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="db_reviews.php?edit=<?php echo $row['id'];?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="maintaindb.php?del_review=<?php echo $row['id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
