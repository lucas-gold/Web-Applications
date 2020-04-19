<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_planner";

//Connect to db
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
}

// create table Continent
try {
  $sql = "CREATE TABLE Continent (
    cont_id INT(6) PRIMARY KEY,
    name VARCHAR(50) NOT NULL
  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

// create table Country
try {
  $sql = "CREATE TABLE Country (
    country_id INT(6) PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    cont_id INT(6),
    FOREIGN KEY (cont_id) REFERENCES Continent(cont_id) ON DELETE CASCADE ON UPDATE CASCADE
  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}


// create table Attraction
try {
  $sql = "CREATE TABLE Attraction (
    id INT(6) UNSIGNED PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    type VARCHAR(30) NOT NULL,
    founder VARCHAR(50),
    size VARCHAR(50),
    location VARCHAR(50),
    country VARCHAR(50),
    year_created INT(4),
    country_id INT(6),
    cont_id INT(6),
    picture1 VARCHAR(50),
    picture2 VARCHAR(50),
    picture3 VARCHAR(50),
    close_id INT(6),
    FOREIGN KEY (country_id) REFERENCES Country(country_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (cont_id) REFERENCES Continent(cont_id) ON DELETE CASCADE ON UPDATE CASCADE
  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

try{
  $sql = "CREATE TABLE users (
    id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
	email VARCHAR(50) NOT NULL,
	phone VARCHAR(14) NOT NULL,
	address VARCHAR(100) NOT NULL,
    accountType VARCHAR (1) NOT NULL)";
    $conn->exec($sql);
}
catch(PDOException $e)
{
}

try{
  $sql = "CREATE TABLE plans (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    startDate VARCHAR(10) NOT NULL,
    duration VARCHAR(30) NOT NULL,
    attraction_id1 INT(6) UNSIGNED NULL,
    attraction_id2 INT(6) UNSIGNED NULL,
    attraction_id3 INT(6) UNSIGNED NULL,
    transitFare DECIMAL(15,2) NOT NULL,
    price DECIMAL(15,2) NOT NULL,
    FOREIGN KEY (attraction_id1) REFERENCES Attraction(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (attraction_id2) REFERENCES Attraction(id) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (attraction_id3) REFERENCES Attraction(id) ON DELETE SET NULL ON UPDATE CASCADE
    )";
    $conn->exec($sql);
}
catch(PDOException $e)
{
  echo $e->getMessage();
}

// create table Reviews
try {
  $sql = "CREATE TABLE Reviews (
    reviewer_name VARCHAR(30),
    attr_id INT(6) UNSIGNED,
    review VARCHAR(240),
    rating INT(2) NOT NULL,
    date_posted DATETIME NOT NULL,
    FOREIGN KEY (attr_id) REFERENCES Attraction(id) ON DELETE CASCADE ON UPDATE CASCADE
  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

// Populate tables
try {

$stmt = $conn->prepare("INSERT INTO Continent (cont_id, name)
VALUES (:cont_id, :name)");
$stmt->bindParam(':cont_id', $cont_id);
$stmt->bindParam(':name', $name);

$cont_id = "1";
$name = "North America";

$stmt->execute();

$cont_id = "2";
$name = "South America";

$stmt->execute();

$cont_id = "3";
$name = "Europe";

$stmt->execute();

$cont_id = "4";
$name = "Asia";

$stmt->execute();

$cont_id = "5";
$name = "Australia";

$stmt->execute();

$stmt = $conn->prepare("INSERT INTO Country (country_id, name, cont_id)
VALUES (:country_id, :name, :cont_id)");
$stmt->bindParam(':country_id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':cont_id', $cont_id);

$id = "101";
$name = "Canada";
$cont_id = "1";

$stmt->execute();

$id = "102";
$name = "USA";
$cont_id = "1";

$stmt->execute();

$id = "201";
$name = "Brazil";
$cont_id = "2";

$stmt->execute();

$id = "202";
$name = "Colombia";
$cont_id = "2";

$stmt->execute();

$id = "301";
$name = "France";
$cont_id = "3";

$stmt->execute();

$id = "302";
$name = "England";
$cont_id = "3";

$stmt->execute();

$id = "401";
$name = "China";
$cont_id = "4";

$stmt->execute();

$id = "402";
$name = "India";
$cont_id = "4";

$stmt->execute();

$id = "501";
$name = "Australia";
$cont_id = "5";

$stmt->execute();

$id = "502";
$name = "New Zealand";
$cont_id = "5";

$stmt->execute();


  $stmt = $conn->prepare("INSERT INTO Attraction (id, name, type, founder, size, location, country, year_created, country_id, cont_id, picture1, picture2, picture3, close_id)
  VALUES (:id, :name, :type, :founder, :size, :location, :country, :year_created, :country_id, :cont_id, :picture1, :picture2, :picture3, :close_id)");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':type', $type);
  $stmt->bindParam(':founder', $founder);
  $stmt->bindParam(':size', $size);
  $stmt->bindParam(':location', $location);
  $stmt->bindParam(':country', $country);
  $stmt->bindParam(':year_created', $year_created);
  $stmt->bindParam(':country_id', $country_id);
  $stmt->bindParam(':cont_id', $cont_id);
  $stmt->bindParam(':picture1', $picture1);
  $stmt->bindParam(':picture2', $picture2);
  $stmt->bindParam(':picture3', $picture3);
  $stmt->bindParam(':close_id', $close_id);

  $id = "1011";
  $name = "Casa Loma";
  $type = "Castle";
  $founder = "E.J. Lennox";
  $size = "5 acres";
  $location = "Toronto";
  $country = "Canada";
  $year_created = "1911";
  $country_id = "101";
  $cont_id = "1";
  $picture1 = "casaloma.jpg";
  $picture2 = "casaloma2.jpg";
  $picture3 = "casaloma3.jpg";
  $close_id = "1";
  $stmt->execute();

  $id = "1012";
  $name = "CN Tower";
  $type = "Tower";
  $founder = "John Kenney";
  $size = "550m";
  $location = "Toronto";
  $country = "Canada";
  $year_created = "1923";
  $country_id = "101";
  $cont_id = "1";
  $picture1 = "cntower.jpg";
  $picture2 = "cntower2.jpg";
  $picture3 = "cntower3.jpg";
  $close_id = "1";
  $stmt->execute();

  $id = "1021";
  $name = "White House";
  $type = "Government";
  $founder = "George Washington";
  $size = "6 acres";
  $location = "Washington, D.C.";
  $country = "USA";
  $year_created = "1877";
  $country_id = "102";
  $cont_id = "1";
  $picture1 = "whitehouse.jpg";
  $picture2 = "whitehouse2.jpg";
  $picture3 = "whitehouse3.jpg";
  $close_id = "1";
  $stmt->execute();

  $id = "1022";
  $name = "Disney Land";
  $type = "Park";
  $founder = "Walt Disney";
  $size = "120 acres";
  $location = "Anaheim";
  $country = "USA";
  $year_created = "1928";
  $country_id = "102";
  $cont_id = "1";
  $picture1 = "disney.jpg";
  $picture2 = "disney2.jpg";
  $picture3 = "disney3.jpg";
  $close_id = "1";
  $stmt->execute();

  $id = "2011";
  $name = "Christ the Redeemer";
  $type = "Statue";
  $founder = "Paul Landowski";
  $size = "38m";
  $location = "Rio de Janeiro";
  $country = "Brazil";
  $year_created = "1965";
  $country_id = "201";
  $cont_id = "2";
  $picture1 = "redeemer.jpg";
  $picture2 = "redeemer2.jpg";
  $picture3 = "redeemer3.jpg";
  $close_id = "2";
  $stmt->execute();

  $id = "2012";
  $name = "Niteroi Museum";
  $type = "Museum";
  $founder = "Albert Niteroi";
  $size = "12 acres";
  $location = "Rio de Janeiro";
  $country = "Brazil";
  $year_created = "1986";
  $country_id = "201";
  $cont_id = "2";
  $picture1 = "niteroi.jpg";
  $picture2 = "niteroi2.jpg";
  $picture3 = "niteroi3.jpg";
  $close_id = "2";
  $stmt->execute();

  $id = "2021";
  $name = "Botero Museum";
  $type = "Museum";
  $founder = "Albert Botero";
  $size = "3 acres";
  $location = "Bogota";
  $country = "Colombia";
  $year_created = "1976";
  $country_id = "202";
  $cont_id = "2";
  $picture1 = "botero.jpg";
  $picture2 = "botero2.jpg";
  $picture3 = "botero3.jpg";
  $close_id = "2";
  $stmt->execute();

  $id = "2022";
  $name = "Lost City";
  $type = "Park";
  $founder = "The Tairona People";
  $size = "210 acres";
  $location = "Magdalena";
  $country = "Colombia";
  $year_created = "1970";
  $country_id = "202";
  $cont_id = "2";
  $picture1 = "lostcity.jpg";
  $picture2 = "lostcity2.jpg";
  $picture3 = "lostcity3.jpg";
  $close_id = "2";
  $stmt->execute();

  $id = "3011";
  $name = "The Louvre";
  $type = "Museum";
  $founder = "Jonathan Louvre";
  $size = "12 acres";
  $location = "Paris";
  $country = "France";
  $year_created = "1972";
  $country_id = "301";
  $cont_id = "3";
  $picture1 = "louvre.jpg";
  $picture2 = "louvre2.jpg";
  $picture3 = "louvre3.jpg";
  $close_id = "3";
  $stmt->execute();

  $id = "3012";
  $name = "Eiffel Tower";
  $type = "Tower";
  $founder = "Jacques Eiffel";
  $size = "6 acres";
  $location = "Paris";
  $country = "France";
  $year_created = "1908";
  $country_id = "301";
  $cont_id = "3";
  $picture1 = "eiffel.jpg";
  $picture2 = "eiffel2.jpg";
  $picture3 = "eiffel3.jpg";
  $close_id = "3";
  $stmt->execute();

  $id = "3021";
  $name = "Big Ben";
  $type = "Tower";
  $founder = "Rudy Smith";
  $size = "50 m";
  $location = "London";
  $country = "England";
  $year_created = "1957";
  $country_id = "302";
  $cont_id = "3";
  $picture1 = "bigben.jpg";
  $picture2 = "bigben2.jpg";
  $picture3 = "bigben3.jpg";
  $close_id = "3";
  $stmt->execute();

  $id = "3022";
  $name = "The Shard";
  $type = "Tower";
  $founder = "John Goodley";
  $size = "200 m";
  $location = "London";
  $country = "England";
  $year_created = "2006";
  $country_id = "302";
  $cont_id = "3";
  $picture1 = "shard.jpg";
  $picture2 = "shard2.jpg";
  $picture3 = "shard3.jpg";
  $close_id = "3";
  $stmt->execute();

  $id = "4011";
  $name = "Great Wall of China";
  $type = "Wall";
  $founder = "Ming";
  $size = "21 million m";
  $location = "Huairou District";
  $country = "China";
  $year_created = "1500";
  $country_id = "401";
  $cont_id = "4";
  $picture1 = "greatwall.jpg";
  $picture2 = "greatwall2.jpg";
  $picture3 = "greatwall3.jpg";
  $close_id = "4";
  $stmt->execute();

  $id = "4012";
  $name = "Forbidden City";
  $type = "City";
  $founder = "Ming";
  $size = "30 acres";
  $location = "Huairou District";
  $country = "China";
  $year_created = "1700";
  $country_id = "401";
  $cont_id = "4";
  $picture1 = "forbiddencity.jpg";
  $picture2 = "forbiddencity2.jpg";
  $picture3 = "forbiddencity3.jpg";
  $close_id = "4";
  $stmt->execute();

  $id = "4021";
  $name = "Taj Mahal";
  $type = "Museum";
  $founder = "Taj Mahal";
  $size = "30 acres";
  $location = "New Delhi";
  $country = "India";
  $year_created = "1678";
  $country_id = "402";
  $cont_id = "4";
  $picture1 = "tajmahal.jpg";
  $picture2 = "tajmahal2.jpg";
  $picture3 = "tajmahal3.jpg";
  $close_id = "4";
  $stmt->execute();

  $id = "4022";
  $name = "Amber Palace";
  $type = "Castle";
  $founder = "Sir Amber";
  $size = "35 acres";
  $location = "New Delhi";
  $country = "India";
  $year_created = "1701";
  $country_id = "402";
  $cont_id = "4";
  $picture1 = "amberpalace.jpg";
  $picture2 = "amberpalace2.jpg";
  $picture3 = "amberpalace2.jpg";
  $close_id = "4";
  $stmt->execute();

  $id = "5011";
  $name = "Sydney Opera House";
  $type = "Theatre";
  $founder = "Sir Amber";
  $size = "9 acres";
  $location = "Syndey";
  $country = "Australia";
  $year_created = "1983";
  $country_id = "501";
  $cont_id = "5";
  $picture1 = "sydney.jpg";
  $picture2 = "sydney2.jpg";
  $picture3 = "sydney3.jpg";
  $close_id = "5";
  $stmt->execute();

  $id = "5012";
  $name = "Harbour Bridge";
  $type = "Bridge";
  $founder = "Sir Harbour";
  $size = "3 km";
  $location = "Syndey";
  $country = "Australia";
  $year_created = "1970";
  $country_id = "501";
  $cont_id = "5";
  $picture1 = "harbourbridge.jpg";
  $picture2 = "harbourbridge2.jpg";
  $picture3 = "harbourbridge3.jpg";
  $close_id = "5";
  $stmt->execute();

  $id = "5021";
  $name = "Mount Cook";
  $type = "Park";
  $founder = "Aoraki";
  $size = "700 acres";
  $location = "Southern Alps";
  $country = "New Zealand";
  $year_created = "1800";
  $country_id = "502";
  $cont_id = "5";
  $picture1 = "mountcook.jpg";
  $picture2 = "mountcook2.jpg";
  $picture3 = "mountcook3.jpg";
  $close_id = "5";
  $stmt->execute();

  $id = "5022";
  $name = "Milford Sound";
  $type = "Park";
  $founder = "Aoraki";
  $size = "800 acres";
  $location = "Northern Alps";
  $country = "New Zealand";
  $year_created = "1750";
  $country_id = "502";
  $cont_id = "5";
  $picture1 = "milfordsound.jpg";
  $picture2 = "milfordsound.jpg";
  $picture3 = "milfordsound.jpg";
  $close_id = "5";
  $stmt->execute();

  $stmt = $conn->prepare("INSERT INTO Reviews (attr_id, reviewer_name, review, rating, date_posted)
  VALUES (:attr_id, :reviewer_name, :review, :rating, :date_posted)");
  $stmt->bindParam(':attr_id', $attr_id);
  $stmt->bindParam(':reviewer_name', $reviewer_name);
    $stmt->bindParam(':review', $review);
    $stmt->bindParam(':rating', $rating);
  $stmt->bindParam(':date_posted', $date_posted);

  $attr_id = "1011";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "1011";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "1012";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "1012";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "1021";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "1021";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "1022";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "1022";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();


  $attr_id = "2011";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "2011";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "2012";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "2012";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "2021";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "2021";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "2022";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "2022";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();



  $attr_id = "3011";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "3011";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "3012";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "3012";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "3021";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "3021";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "3022";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "3022";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();



  $attr_id = "4011";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "4011";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "4012";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "4012";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "4021";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "4021";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "4022";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "4022";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();



  $attr_id = "5011";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "5011";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "5012";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "5012";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "5021";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "5021";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $attr_id = "5022";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "5022";
  $reviewer_name = "Jane Doe";
  $review = "I had a great time...";
  $rating = "3";
  $date_posted = "2019-01-23 07:41:19";
  $stmt->execute();

  $stmt = $conn->prepare("INSERT INTO plans (id, startDate, duration, attraction_id1, attraction_id2, attraction_id3, transitFare, price)
  VALUES (:id, :startDate, :duration, :attraction_id1, :attraction_id2, :attraction_id3, :transitFare, :price)");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':startDate', $startDate);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':attraction_id1', $attraction_id1);
    $stmt->bindParam(':attraction_id2', $attraction_id2);
    $stmt->bindParam(':attraction_id3', $attraction_id3);
  $stmt->bindParam(':transitFare', $transitFare);
  $stmt->bindParam(':price', $price);

  $id = "1";
  $startDate = "Feb 29 20";
  $duration = "7 days";
  $attraction_id1 = "1011";
  $attraction_id2 = "1012";
  $attraction_id3 = "1021";
  $transitFare = "390.99";
  $price = "1200.99";
  $stmt->execute();






}
catch(PDOException $e)
{
}

//SELECT statements

$query = $conn->prepare("SELECT * FROM plans");
$query->execute();
$plan=$query->fetchAll(\PDO::FETCH_ASSOC);


$query = $conn->prepare("SELECT * FROM Continent");
$query->execute();
$continents=$query->fetchAll(\PDO::FETCH_ASSOC);

$query = $conn->prepare("SELECT * FROM Attraction LIMIT 5");
$query->execute();
$attractions=$query->fetchAll(\PDO::FETCH_ASSOC);

$conn = null;
?>
