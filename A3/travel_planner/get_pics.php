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

echo "<figure id = 'fig'>";
while($row = mysqli_fetch_array($result)) {
$close_id = $row["close_id"];
$filename = str_replace(' ', '', $row["name"]);
echo "<img class = 'mainimg' src = img/" . $row["picture1"] . "></img>";
echo "<figcaption class = 'caption'>". $row["name"] . "&nbsp&nbsp<span style='font-style:italic'>(" .$row["location"] . ", " . $row["country"] . ")</span> " . " &nbsp&nbsp <a href='readmore.php?q=".$row["id"]."' style='text-decoration:underline;color:#2F4F4F;text-align:right;'>Read More</a>" . "</figcaption>";
}
echo "</figure>";


$sql="SELECT * FROM Attraction WHERE close_id = '".$close_id."' AND id <> '".$q."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
  $i = 1;
  $cls = "c" . $i;
  echo "<img class = '" . $cls .  "'src = img/" . $row["picture1"] . "></img>";
  echo "<div class = 'caption2'>". $row["name"] . " (" .$row["location"] . ", " . $row["country"] . ") " . "<br><a href='readmore.php?q=".$row["id"]."' style='color:white;font-style:italic;'>Read More</a>" .  "</div>";

  $i = $i + 1;
}


mysqli_close($conn);
?>
</body>
</html>
