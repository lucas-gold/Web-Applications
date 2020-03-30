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
$sql="SELECT * FROM Attraction WHERE country_id = '".$q."'";
$result = mysqli_query($conn,$sql);

echo "<h3> &nbsp&nbsp&nbspAttractions:</h3><br>";
echo "<select id='attractions' onchange=show_pics(this.value) style='width:160px; color:black'>";
  echo "<option selected disabled>Choose One:</option>";
while($row = mysqli_fetch_array($result)) {
  echo "<option value=" . $row["id"] . ">" . $row["name"] . "</option>";
}
  echo "</select>";


mysqli_close($conn);
?>
</body>
</html>
