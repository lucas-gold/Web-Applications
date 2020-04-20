<?php
$id = strval($_GET['del']);
$type = intval($_GET['type']);

echo $type;
echo $id;

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");

if ($type == 1) {
  $sql = "DELETE FROM Attraction WHERE id='$id'";
  $conn->query($sql);
}
else if ($type == 2) {
  $sql = "DELETE FROM Continent WHERE name='$id'";
  $conn->query($sql);
}
else if ($type == 3) {
  $sql = "DELETE FROM Country WHERE name='$id'";
  $conn->query($sql);
}
else if ($type == 4) {
  $sql = "DELETE FROM City WHERE name='$id'";
  $conn->query($sql);
}
else if ($type == 5) {
  $sql = "DELETE FROM users WHERE username='$id'";
  $conn->query($sql);
}
else {
  echo "Nothing to delete.";
}


mysqli_close($conn);


?>
