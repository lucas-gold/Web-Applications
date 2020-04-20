<?php

$id = strval($_GET['q']);

$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($conn,"travel_planner");

?>
<html>
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
    echo "<table style='margin-top: -7%; margin-right: 25%;'><tr><td valign='top'>";
    echo "<img class = 's1' src = img/" . $row["picture2"] . "></img></td><td>";
    echo "</td><td valign='top'><h2>".$row["name"]."</h2><h3>";
    echo $row["city"].", ".$row["country"];
    echo "</h3>";
    echo $row["description"];
    echo "<div ng-controller='ratingCtrl'>";
    echo "<form name='rateForm'><input type='hidden' ng-model='attrname' value='".$row["id"]."'><input type='text' id='review' ng-model='review' placeholder='Enter review' style='width:125px;'>";
    echo "<input type='number' id='rating' ng-model='rating' min='1' max='5' placeholder='&#9734;' style='width:35px;'>";
    echo "<button type='submit' ng-click='formsubmit(rateForm)'><span class='glyphicon glyphicon-ok' style='color:#7bacb3;'></span></button></form>";
    echo "{{res}}";
    echo "</div>";
    echo "Last review: ".$row["review"]." <span style='font-style:italic;'>... ".$row["rating"]." stars.</span><br>";
    //echo " Cost: $".$row["price"];
    //echo "<div ng-controller='cartCtrl'>";
    //echo "<form name = 'cartForm'>";
    //echo "<input type = 'hidden' name = 'attr_id' value = '".$row["name"]."'>";
    //echo "<button type='submit' ng-click='addtocart(cartForm.\$valid)' ng-disabled='cartForm.\$invalid' class='btn btn-info mb-2' style='height:45px; position:fixed; margin-top: 50px;'>";
    //echo "Add to cart </button></form></div>";

    echo "<a onclick='hide_compare()' style='font-style:italic;'> Click here to purchase for $".$row["price"].".</a><br>";

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
  $sql="SELECT * FROM Attraction WHERE id <> '".$id."'";
  $result = mysqli_query($conn,$sql);
  echo "<select id='attractions' onchange=show_compare(this.value,'".$id."') style='width:120px;height:28px;color:black'>";
    echo "<option selected disabled>Compare:</option>";
  while($row = mysqli_fetch_array($result)) {
    echo "<option value=" . $row["id"] . ">" . $row["name"] . "</option>";
  }
    echo "</select></td>";
echo "</tr></table>";

 ?>



</body>

</html>
