<!DOCTYPE html>
<html>
<body>

<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($conn,"travel_planner");

$close_id = 0;


$sql="SELECT * FROM Pictures WHERE attr_id = '".$q."'";

$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($result)) {
//echo "<figure id ='fig'>";
$close_id = $row["close_id"];
echo "<img class = 'mainimg' src = img/" . $row["picture1"] . "></img>";
//<figcaption id = "caption"></figcaption>
//echo "</figure>";
}
$sql="SELECT picture1 FROM Pictures WHERE close_id = '".$close_id."' AND attr_id <> '".$q."'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
  $i = 1;
  $cls = "c" . $i;
  echo "<img class = '" . $cls .  "'src = img/" . $row["picture1"] . "></img>";
  $i = $i + 1;
}
//$row = mysqli_fetch_array($result["close_id"]) ;
//$sql="SELECT picture1 FROM Pictures WHERE close_id = '".$q+1."' AND ";

/*
    <img id = "c1"></img>

    <img id = "c2"></img>

    <img id = "c3"></img><br><br>
    */

mysqli_close($conn);
?>
</body>
</html>
