<!DOCTYPE html>
<html>
<?php
$q = $_GET['search'];

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");

 ?>

 <body>
   <?php
   $sql = "SELECT id, name, country, location FROM Attraction WHERE name LIKE '%$q%' OR country LIKE '%$q%' OR location LIKE '%$q%'";
   $result = mysqli_query($conn,$sql);

   echo "You searched for <span style='font-style:italic;'>\"".$q."\".</span><br><br>";
   $i = 0;
   while($row = mysqli_fetch_array($result)) {
    $i++;
     echo $i.". <a href='readmore.php?q=".$row["id"]."'>".$row["name"]."</a>";
     echo " in " . $row["location"] . ", " . $row["country"];
     echo "<br><br>";
   }
   echo "<span style='font-style:italic;'>Your search returned ".$i;
   if ($i > 1 || $i < 1) {
    echo " results.</span>";
   }
   else {
     echo " result.</span>";
   }

   mysqli_close($conn);
     ?>
 </body>
 </html>
