<?php

$artwork = $_POST;

echo "<h3>Title:</h3>";
echo $artwork["title"];
echo "<br>";
echo "<h3>Desecription:</h3>";
echo $artwork["description"];
echo "<br>";


echo "<style>h4 { font-style: italic}</style>";

if (empty($artwork["genre"])) {
  echo "<h4>Genre Unknown</h4>";
}
else {
  echo "<h3>Genre:</h3>";
  echo $artwork["genre"];
}
if (empty($artwork["subject"])) {
    echo "<h4>Subject Unknown</h4>";
  }
  else {
    echo "<h3>Subject:</h3>";
    echo $artwork["subject"];
  }
if (empty($artwork["year"])) {
  echo "<h4>Year Unknown</h4>";
}
else {
  echo "<h3>Year:</h3>";
  echo $artwork["year"];
}
if (empty($artwork["museum"])) {
  echo "<h4>Museum Unknown</h4>";
}
else {
  echo "<h3>Museum:</h3>";
  echo $artwork["museum"];
}
if (empty($artwork["copyright"])) {
  echo "<h4>Creative Commons Specification Unknown</h4>";
}
else {
  echo "<h3>Creative Commons Speficiation:</h3>";
  echo $artwork["copyright"];
}
if (empty($artwork["type"])) {
  echo "<h4>Artwork Type Unknown</h4>";
}
else {
  echo "<h3>Artwork Type:</h3>";
  echo $artwork["type"];
}

?>
