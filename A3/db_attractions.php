<?php
include('dbconnect.php');

$update = false;
$id = "";
$name="";
$type="";
$picture1="";
$picture2="";
$description="";
$price="";
$rating="";
$review="";
$sel_city="";
$sel_cont="";
$sel_country="";
$lat="";
$lon="";

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * from Attraction WHERE id=$id");

    if($record->num_rows == 1){
        $n = mysqli_fetch_array($record);
        $id=$n['id'];
        $name=$n['name'];
        $type=$n['type'];
        $picture1=$n['picture1'];
        $picture2=$n['picture2'];
        $description=$n['description'];
        $price=$n['price'];
        $sel_city=$n['city'];
        $sel_cont=$n['continent'];
        $sel_country=$n['country'];
        $rating=$n['rating'];
        $review=$n['review'];
        $lat=$n['lat'];
        $lon=$n['lon'];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>MaintainDB - Attractions</title>
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

    <form method="post" action="maintaindb.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control input-sm" type="text" id="name" name="name" value="<?php echo $name;?>">
        </div>
        <div class="form-group">
            <label for="name">ID</label>
            <input class="form-control input-sm" type="text" id="id" name="id" value="<?php echo $id;?>">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input class="form-control input-sm" type="text" id="type" name="type" value="<?php echo $type;?>">
        </div>
        <div class="form-group">
            <label for="city_id">City</label>
            <select class="form-control input-sm" id="city_id" name="city_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT * FROM City");
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['name'];?>" <?php if($sel_city == $row['name']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="country_id">Country</label>
            <select class="form-control input-sm" id="country_id" name="country_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT * FROM Country");
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['name'];?>" <?php if($sel_country == $row['name']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="cont_id">Continent</label>
            <select class="form-control input-sm" id="cont_id" name="cont_id" required>
                <option disabled selected>Select one...</option>
                <?php $results = mysqli_query($conn, "SELECT * FROM Continent");
                while($row = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $row['name'];?>" <?php if($sel_cont == $row['name']) echo "selected"; ?>><?php echo $row['name'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="lat">Latitude</label>
            <input class="form-control input-sm" type="text" id="lat" name="lat" value="<?php echo $lat;?>">
        </div>
        <div class="form-group">
            <label for="lon">Latitude</label>
            <input class="form-control input-sm" type="text" id="lon" name="lon" value="<?php echo $lon;?>">
        </div>
        <div class="form-group">
            <label for="picture1">Picture 1</label>
            <?php if(!empty($picture1)){?>
            <img src="img/<?php echo $picture1;?>" height="50" width="50">
            <input type="hidden" name="picture1" value="<?php echo $picture1;?>">
            <?php } ?>
            <input class="form-control input-sm" id="picture1" type="file" name="picture1" accept="image/*" value="<?php echo $picture1;?>">
        </div>
        <div class="form-group">
            <label for="picture2">Picture 2</label>
            <?php if(!empty($picture2)){?>
            <img src="img/<?php echo $picture2;?>" height="50" width="50">
            <?php } ?>
            <input type="hidden" name="picture2" value="<?php echo $picture2;?>">
            <input class="form-control input-sm" id="picture2" type="file" name="picture2" accept="image/*" value="<?php echo $picture2;?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input class="form-control input-sm" type="text" id="description" name="description" value="<?php echo $description;?>">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control input-sm" type="text" id="price" name="price" value="<?php echo $price;?>">
        </div>
        <div class="form-group">
            <label for="price">Rating</label>
            <input class="form-control input-sm" type="text" id="rating" name="rating" value="<?php echo $rating;?>">
        </div>
        <div class="form-group">
            <label for="price">Review</label>
            <input class="form-control input-sm" type="text" id="review" name="review" value="<?php echo $review;?>">
        </div>
            <?php if ($update == true): ?>
                <button class="btn btn-warning btn-sm" type="submit" name="update_att">Update</button>
            <?php else: ?>
                <button class="btn btn-success btn-sm" type="submit" name="add_att">Add</button>
            <?php endif ?>
    </form>

    <?php $results = mysqli_query($conn, "SELECT * FROM Attraction"); ?>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>City</th>
                <th>Country</th>
                <th>Continent</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Picture 1</th>
                <th>Picture 2</th>
                <th>Description</th>
                <th>Price</th>
                <th>Rating</th>
                <th>Review</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['city'];?></td>
                <td><?php echo $row['country'];?></td>
                <td><?php echo $row['continent'];?></td>
                <td><?php echo $row['lat'];?></td>
                <td><?php echo $row['lon'];?></td>
                <td><?php echo $row['picture1']; ?></td>
                <td><?php echo $row['picture2']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['review']; ?></td>

                <td>
                    <a class="btn btn-warning btn-sm" href="db_attractions.php?edit=<?php echo $row['id'];?>">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="delete_entry.php?del=<?php echo $row['id'];?>&type=1">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
