<?php

$id = intval($_GET['q']);

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($conn,"travel_planner");

?>
<head>
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>
  <script src= "//ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-sanitize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="mainstyle.css">


</head>
<body>

  <?php

  $sql="SELECT * FROM Attraction WHERE id = '".$id."'";

  $result = mysqli_query($conn,$sql);

  $space = "&nbsp&nbsp&nbsp&nbsp";
  $space .= $space;
  $space .= $space;
  $space .= $space;
  $lower = "<br><br><br><br><br><br>";

  while($row = mysqli_fetch_array($result)) {
    echo "<table style='margin-top: -9%;'><tr><td valign='top'>";
    echo "<img class = 's1' src = img/" . $row["picture2"] . "></img></td><td>";
    echo "</td><td valign='top'><h2>".$row["name"]."</h2><h3>";
    echo $row["city"].", ".$row["country"];
    echo "</h3><br>";
    echo "This is a placeholder for a description.<br>";
    echo " Cost: $ 100.00<br>";
    //echo "</tr></table>";
    /*
    echo "<h2 style='position:absolute;color:white;margin-left:50px;'>".$row["name"]."<h2>";
    echo "<table><tr><td></div>";
    echo "<img class = 's1' src = img/" . $row["picture2"] . "></img></td><td><div class='emptyrow'></div></td><td>";
    echo "<h3>Date of Creation: </h3>".$row["year_created"];
    echo "<h3>Founder Name: </h3>".$row["founder"];
    echo "<h3>Approximate Size: </h3>".$row["size"];
    echo "<h3>Location: </h3>".$row["location"] . ", " . $row["country"];
    echo "</div></td></tr><tr><td>";
    echo "<img class = 's2' src = img/" . $row["picture3"] . "></img></td><td></tr></table>";
    */
  }


  //echo "<select id='continentlist' name='continentlist' onchange=show_countries(this.value) style='width:160px; color:black'>";
  //echo "<option selected disabled>Choose a continent...</option>";
  //echo "</select>";
  $sql="SELECT * FROM Attraction";
  $result = mysqli_query($conn,$sql);
  echo "<select id='attractions' onchange=show_compare(this.value) style='width:120px;height:28px;color:black'>";
    echo "<option selected disabled>Compare:</option>";
  while($row = mysqli_fetch_array($result)) {
    echo "<option value=" . $row["id"] . ">" . $row["name"] . "</option>";
  }
    echo "</select></td>";
echo "</tr></table>";

  $sql="SELECT * FROM Reviews WHERE attr_id = '".$id."'";

  $result = mysqli_query($conn,$sql);
/*
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
*/
 ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
