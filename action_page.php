<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr  = "";
$title = $desecription = $gender = $comment  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["title"])) {
    $nameErr = "Title is required";
  } else {
    $title = test_input($_POST["title"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["desecription"])) {
    $emailErr = "Desecription is required";
  } else {
    $desecription = test_input($_POST["desecription"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^[a-zA-Z ]*$/",$desecription)) {
      $emailErr = "Only letters and white space allowed";
    }
  }    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<?php
echo "<h2>Title:</h2>";
echo $title;
echo "<br>";
echo "<h2>Desecription</h2>";
echo $desecription;
echo "<br>";

?>