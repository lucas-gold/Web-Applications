<?php
session_start();
require_once('travel_planner/create_table.php');
include 'include/navigation.php';
include 'include/aboutus.php';

?>

<html>
<?php
$id = intval($_GET['q']);

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($conn,"travel_planner");

?>
<head>
<meta name="viewport" content="width = device-width, initial-scale = 1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito|Titillium+Web" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="stylesheetA1.css">

<title>Travel Planner</title>

<style>

.header{
  font-family: "Nunito";
  font-display: block;
  font-style: oblique;
  padding-left: 100px;
  margin: 0px;
}

.about-us{
  color:#2F4F4F;
  font-family:"Nunito";
}

body{
  background: url("img/cityscape.svg");
  background-size:cover;

}


.contact{
  background-color: rgba(0, 204, 255, 0.986);
  padding-top:25px;
  padding-bottom:25px;
}

.contact{
  font-family: "Nunito";
  font-weight: bold;
  color:#2F4F4F;
}

#aboutpage {
  text-align:right;
  padding-top: 1%;
  padding-right: 20%;
  display:none;
  float:right;
}
#contactpage {
  text-align:right;
  padding-top: 1%;
  padding-right: 20%;
  display:none;
  float:right;

}

.about_l {
  width: 190px;
  position: fixed;
  text-align:center;
  background: #222222;
  border-radius: 25px;
  color:#9d9d9d;
  padding: 10px 20px 10px 20px;
}

.s1 {

  max-height: 275px;
  max-width: 290px;
  float:left;
  padding: 10px;
  background: #64b4cf;
  border-radius: 25px;
  margin: 30px 25px 50px 25px;
}
.s2 {

  max-height: 275px;
  max-width: 290px;
  float:left;
  padding: 10px;
  background: #64b4cf;
  border-radius: 25px;
  margin: 0px 25px 10px 25px;
}

.emptyrow {
  margin: 0px 350px;
}

.emptyrow_xs {
  margin: 0px 50px;
}



@media (max-height:400px) {
  .about_l{
    position:static;
    padding: 0px;
    background: none;
    color:black;
  }

}

@media (max-width:1300px) {
  .emptyrow {
    margin: 10px 5px;
  }
}

.reviewbox {
  background-color: #64b4cf;
  border: 8px solid #2f2f2f;
  color: #2f2f2f;
  font-size: 18px;
  border-radius: 15px;
  font-style:italic;
}
.reviewtext {
  color: #2f2f2f;
  font-size: 18px;
  font-style:italic;
}

</style>

</head>
<body>

  <?php

  $sql="SELECT * FROM Attraction WHERE id = '".$id."'";

  $result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_array($result)) {
    echo "<h2 style='position:absolute;color:white;margin-left:50px;'>".$row["name"]."<h2>";
    echo "<table><tr><td></div>";
    echo "<img class = 's1' src = img/" . $row["picture2"] . "></img></td><td><div class='emptyrow'></div></td><td>";
    echo "<h3>Date of Creation: </h3>".$row["year_created"];
    echo "<h3>Founder Name: </h3>".$row["founder"];
    echo "<h3>Approximate Size: </h3>".$row["size"];
    echo "<h3>Location: </h3>".$row["location"] . ", " . $row["country"];
    echo "</div></td></tr><tr><td>";
    echo "<img class = 's2' src = img/" . $row["picture3"] . "></img></td><td></tr></table>";
  }


  $sql="SELECT * FROM Reviews WHERE attr_id = '".$id."'";

  $result = mysqli_query($conn,$sql);

  echo "<div class='reviewbox'><h4 style='font-style:normal;text-align:center;font-size:22px;'>Reviews:</h4>";
    echo "<table><tr>";
  while($row = mysqli_fetch_array($result)) {
    echo "<td><span class = 'emptyrow_xs'></span></td><td><span class='reviewtext'>";
    echo $row['reviewer_name']." at ".$row['date_posted'];
    echo "<br><br>".$row["rating"]." stars<br><br>";
    echo $row["review"];
    echo "</span></td>";
  }
  echo "</tr></table>";
        echo "</div>";

 ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
