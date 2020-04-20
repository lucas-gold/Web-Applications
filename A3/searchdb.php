<?php

$post_data = file_get_contents("php://input");
$data = json_decode($post_data);

  $q = $data->query;


$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");


  $chars = "0123456789";
  $q_arr = str_word_count( $q , 1, $chars);
  $q_count = str_word_count( $q , 0, $chars);

  //place, continent, country, city, keyword(s), min-price, max-price
  $q_parsed = array("Attraction" => "notset", "Continent" => "notset", "Country" => "notset", "City" => "notset", "Keywords" => "notset", "min-price" => "notset", "max-price" => "notset");
  $prev_word = ""; //for multi word consideration i.e. New Zealand
  $tables = array("Continent", "Country", "Attraction", "City");

  for ($x = 0; $x < $q_count; $x++)
  {
    $word = $q_arr[$x];
    //echo $q_arr[$x];

    //STEM WORDS:
    //Remove trailing S
    if (strtolower(substr($word, -3)) == "ies") {
      $word = substr($word, 0, -3)."y";
    }
    else if (strtolower(substr($word, -1)) == "s") {
      $word = substr($word, 0, -1);
    }
    //Change trailing "ian" to "a"
    if (strtolower(substr($word, -3)) == "ian") {
      if (strtolower(substr($word, -4, -3)) == "l") {
          $word = substr($word, 0, -3);
      }
      else {
      $word = substr($word, 0, -3)."a";
    }
    }
    //**********end of stem words***************


    if ($x < $q_count-1) {
      $next_word = $q_arr[$x+1];

      //SET PRICE
      //look for current word of "under" "over" or "for"
      //if next word exists, find number
      if (substr($next_word, 0, 1) == "$") {
        $next_word = substr($next_word, 1);
      }
      if (is_numeric($next_word)) {
        if (strtolower($word) == "over")
        {
          $q_parsed["min-price"] = $next_word;
        }
        else if (strtolower($word) == "under")
        {
          $q_parsed["max-price"] = $next_word;
        }
        else if (strtolower($word) == "for")
        {
          $q_parsed["min-price"] = $next_word;
          $q_parsed["max-price"] = $next_word;
        }
      }
      //************end of set price******************

    }

    //CHECK MULTI WORDS
    $single_word = $word;
    if ($prev_word != "") {
      //only consider closest previous word
      if (str_word_count($prev_word , 0, $chars) > 1) {
        $prev_word_start = strrpos( $prev_word , " ") + 1;
        $prev_word = substr($prev_word, $prev_word_start);
      }
      $word = $prev_word." ".$word;
    }

//    echo "(~".$word."~)";
    //search for query term(s) in each table
    for ($i = 0; $i < count($tables); $i++) {
      $sql = "SELECT name FROM $tables[$i] WHERE name = '$word'";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) == 0) {
        $prev_word = $word;
      }
      else {
        while($row = mysqli_fetch_array($result)) {
          //do something
          $q_parsed[$tables[$i]] = $row["name"];
          //$prev_word = ""; //does this do anything?
        }
      }

      //repeat with single word
      //in case pair of words do not go together
      $sql = "SELECT name FROM $tables[$i] WHERE name = '$single_word'";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) == 0) {
        $prev_word = $word;
      }
      else {
        while($row = mysqli_fetch_array($result)) {
          //do something
          $q_parsed[$tables[$i]] = $row["name"];
          //$prev_word = ""; //no effect?
        }
      }
    } //end of inner for loop
/*
    echo "...";
    echo $q_parsed["Country"];
    echo ", ";
    echo $q_parsed["Continent"];
    echo ", ";
    echo $q_parsed["Attraction"];
    echo ", ";
    echo $q_parsed["City"];
    echo ", ";
*/

    //CHECK FOR MATCHING KEYWORDS (type) IN Attraction
    $sql = "SELECT type FROM Attraction WHERE type = '$single_word'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
      $q_parsed["Keywords"] = $row["type"];
    }

    //echo $q_parsed["Keywords"];
    //echo "!!! ";

    //echo "((".$q_parsed["City"] ."))";


  } //end of for loop to get parsed text

  //GET SEARCH RESULTS BASED ON PARSED TEXT
  $name_input = $q_parsed['Attraction'];
  $country_input = $q_parsed['Country'];
  $city_input = $q_parsed['City'];
  $continent_input = $q_parsed['Continent'];
  $keyword_input = $q_parsed['Keywords'];


  $sql = "SELECT name, type, city, country, picture1, continent FROM Attraction WHERE
  ('$name_input' = 'notset' OR  name = '$name_input')
  AND
  ('$country_input' = 'notset' OR  country = '$country_input')
  AND
  ('$continent_input' = 'notset' OR continent = '$continent_input')
  AND
  ('$city_input' = 'notset' OR city = '$city_input')
  AND
  ('$keyword_input' = 'notset' OR type = '$keyword_input')
  AND
  NOT ('$keyword_input' = 'notset' AND '$city_input' = 'notset' AND '$country_input' = 'notset' AND '$name_input' = 'notset' AND '$continent_input' = 'notset')
  ";


  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) == 0) {
    printf("<br><br><br><br>No results found.");
  }
  else {
  $row0 = "";
  $row1 = "";
  $row2 = "";
  $trow = "";

  $i = 0;
  while($row = mysqli_fetch_array($result)) {
    $i++;

    $tr1 = "<br><br><br><br><br><table><tr>";
    $row0 = "<td> &nbsp&nbsp&nbsp&nbsp&nbsp </td><td><a href = '#/".strtolower(str_replace(' ', '', $row[0]))."'><img src = 'img/".$row[4]."' class='imgresult'></img></a><br><br></td><td> &nbsp&nbsp&nbsp&nbsp&nbsp </td><td>".$row0."</td>";
    $tr = "</tr><tr>";
    $row1 = "<td>  </td><td>".$row[0]."</td><td>  </td><td>".$row1."</td>";
    if ($i == 2) {
      $row1 .= "</tr><tr></tr><tr>";
    }
    //$tr
    $row2 = "<td>  </td><td>".$row[2].", ".$row[3]."</td><td>  </td><td>".$row2."</td>";
    //$tr
    $tre = "</tr></table>";
    //add row for compare with checkbox
  //  echo $row[0]."\n";
  //  echo $row[2].", ".$row[3]."\n";
  //  echo $row[1]."\n\n";
  }
    if ($i <= 2) {
      $trow = "<td> &nbsp&nbsp </td>";
      $trow .= $trow;
      $trow .= $trow;
      $trow .= $trow;
      $trow .= $trow;

      printf("\n%s \n %s \n %s \n %s \n %s \n %s \n %s \n %s \n %s  \n %s \n %s", $tr1, $trow, $row0, $tr, $trow, $row1, $tr, $trow, $row2, $trow, $tre);

    }
    else {
    printf("\n%s \n %s \n %s \n %s \n %s \n %s \n %s", $tr1, $row0, $tr, $row1, $tr, $row2, $tre);
  }
//  echo $row1."\n".$row2."\n".$row3;

}

mysqli_close($conn);
?>
