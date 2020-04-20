<!DOCTYPE html>
<html>
<body>

<?php
$q = strval($_GET['q']);

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");

$close_id = 0;

$sql="SELECT Attraction.name, description, picture1, picture2, price, city.name city, country.name country FROM Attraction 
INNER JOIN city ON city.city_id=Attraction.city_id INNER JOIN country ON country.country_id=Attraction.country_id WHERE id = '".$q."'";

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
  echo "<table style='margin-top: -8%;'><tr><td valign='top'>";
  echo "<img class = 's1' src = img/" . $row["picture2"] . "></img></td><td>";
  echo "</td><td valign='top'><h2>".$row["name"]."</h2><h3>";
  echo $row["city"].", ".$row["country"];
  echo "</h3><br>";
  echo $row["description"]." <span style='font-style:italic;'>"; //Rated ".$row["rating"]."/5.</span><br>";
  echo " Cost: $".$row["price"];
  echo " - <a href='' style='font-style:italic;'> Add to cart.</a><br>";
  echo "</tr></table>";
}


mysqli_close($conn);
?>
</body>
</html>
