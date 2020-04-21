<?php

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");

$id=$_POST['id'];
$name=$_POST['name'];
$type=$_POST['type'];
$picture1=$_POST['picture1'];
$picture2=$_POST['picture2'];
$description=$_POST['description'];
$price=$_POST['price'];
$city=$_POST['city'];
$continent=$_POST['continent'];
$country=$_POST['country'];
$rate=$_POST['rating'];
$rev=$_POST['review'];
$lat=$_POST['lat'];
$lon=$_POST['lon'];


$sql = "UPDATE Attraction SET name='$name', type='$type', city='$city', country='$country', continent='$continent', description='$description', picture1='$picture1', picture2='$picture2', lat='$lat', lon='$lon', price='$price', review='$rev', rating='$rate' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Update saved.";
} else {
    echo "Update could not be saved.";
}


mysqli_close($conn);


?>

<a href="db_attractions.php">Return</a>
