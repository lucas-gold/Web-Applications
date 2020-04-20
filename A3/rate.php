<?php

$post_data = file_get_contents("php://input");
$data = json_decode($post_data);

  $rev = $data->review;
  $id = $data->attrname;


$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");

$sql = "UPDATE Attraction SET review='$rev' WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
      echo "Rating saved.";
  } else {
      echo "Rating could not be saved.";
  }

mysqli_close($conn);
?>
