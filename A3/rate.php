<?php

$post_data = file_get_contents("php://input");
$data = json_decode($post_data);

  $rev = $data->review;
  $rate = $data->rating;
  $id = $data->attrname;


$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");

$sql = "UPDATE Attraction SET review='$rev', rating='$rate' WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
      echo "Review saved.";
  } else {
      echo "Review could not be saved.";
  }

mysqli_close($conn);
?>
