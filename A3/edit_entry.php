<head>
<title>MaintainDB - Attractions</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<?php
$id = strval($_GET['edit']);
//$type = intval($_GET['type']);

//echo $type;
echo $id;

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");


  $sql = "SELECT * FROM Attraction WHERE id='$id'";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_array($result)) {
    $id=$row['id'];
    $name=$row['name'];
    $type=$row['type'];
    $picture1=$row['picture1'];
    $picture2=$row['picture2'];
    $description=$row['description'];
    $price=$row['price'];
    $city=$row['city'];
    $continent=$row['continent'];
    $country=$row['country'];
    $rating=$row['rating'];
    $review=$row['review'];
    $lat=$row['lat'];
    $lon=$row['lon'];
  }
?>

<form method="post" action="edit_entry_form.php">
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
        <input class="form-control input-sm" type="text" id="city" name="city" value="<?php echo $city;?>">
    </div>
    <div class="form-group">
        <label for="country_id">Country</label>
        <input class="form-control input-sm" type="text" id="country" name="country" value="<?php echo $country;?>">
    </div>
    <div class="form-group">
        <label for="cont_id">Continent</label>
        <input class="form-control input-sm" type="text" id="continent" name="continent" value="<?php echo $continent;?>">
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
            <button class="btn btn-warning btn-sm" type="submit" name="submit">Update</button>
</form>








<?php

mysqli_close($conn);


?>
