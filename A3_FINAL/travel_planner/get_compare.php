<!DOCTYPE html>
<html>
<body>

<?php
$q = strval($_GET['q']);
$originalid = strval($_GET['original']);

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");


$sql="SELECT lat,lon,name FROM Attraction WHERE id = '".$originalid."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
  $lat1 = $row["lat"];
  $lon1 = $row["lon"];
  $name1 = $row["name"];
}


$sql="SELECT * FROM Attraction WHERE id = '".$q."'";

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
  $lat2 = $row["lat"];
  $lon2 = $row["lon"];

  echo "<table style='margin-top: -8%;'><tr><td valign='top'>";
  echo "<img class = 's1' src = img/" . $row["picture2"] . "></img></td><td>";
  echo "</td><td valign='top'><h2>".$row["name"]."</h2><h3>";
  echo $row["city"].", ".$row["country"];
  echo "</h3><br>";
  echo $row["description"];
  echo "<br>Last review: ".$row["review"]." <span style='font-style:italic;'>... ".$row["rating"]." stars.</span><br>";
  //echo " Cost: $".$row["price"];
  echo "<a onclick='hide_compare()' style='font-style:italic;'> Click here to purchase for $".$row["price"].".</a><br>";

  //distance function taken from https://www.geodatasource.com/developers/php
  function distance($lat1, $lon1, $lat2, $lon2, $unit) {
    if (($lat1 == $lat2) && ($lon1 == $lon2)) {
      return 0;
    }
    else {
      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit = strtoupper($unit);

      if ($unit == "K") {
        return round(($miles * 1.609344),0);
      } else if ($unit == "N") {
        return round(($miles * 0.8684),0);
      } else {
        return round($miles,0);
      }
    }
  }

  echo "<div style='font-weight:bold;'>".distance($lat1, $lon1, $lat2, $lon2, "K") . " Kilometres from ".$name1."</div>";

  //echo " - <a onclick='hide_compare()' style='font-style:italic;'> Add to cart.</a><br>";
  echo "</tr></table>";
}


mysqli_close($conn);
?>
</body>
</html>
