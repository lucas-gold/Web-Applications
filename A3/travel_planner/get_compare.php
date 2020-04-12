<!DOCTYPE html>
<html>
<body>

<?php
$q = intval($_GET['q']);

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");

$close_id = 0;


$sql="SELECT * FROM Attraction WHERE id = '".$q."'";

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {

  echo "<table style='margin-top: -9%;'><tr><td valign='top'>";
  echo "<img class = 's1' src = img/" . $row["picture2"] . "></img></td><td>";
  echo "</td><td valign='top'><h2>".$row["name"]."</h2><h3>";
  echo $row["city"].", ".$row["country"];
  echo "</h3><br>";
  echo "This is a placeholder for a description.<br>";
  echo " Cost: $ 100.00</td>";
  echo "</tr></table>";
}


mysqli_close($conn);
?>
</body>
</html>
