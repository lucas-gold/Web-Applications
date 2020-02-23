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
    location VARCHAR(100),
    year_created INT(4),
    country_id INT(6),
    cont_id INT(6),
    FOREIGN KEY (country_id) REFERENCES Country(country_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (cont_id) REFERENCES Continent(cont_id) ON DELETE CASCADE ON UPDATE CASCADE

  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

// create table Pictures
try {
  $sql = "CREATE TABLE Pictures (
    attr_id INT(6) UNSIGNED PRIMARY KEY,
    picture1 VARCHAR(50),
    picture2 VARCHAR(50),
    picture3 VARCHAR(50),
    FOREIGN KEY (attr_id) REFERENCES Attraction(id) ON DELETE CASCADE ON UPDATE CASCADE

  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

// create table Reviews
try {
  $sql = "CREATE TABLE Reviews (
    attr_id INT(6) UNSIGNED PRIMARY KEY,
    reviewer_name VARCHAR(30) NOT NULL,
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

  $cont_id = "4";
  $name = "Cont1";

  $stmt->execute();

  $stmt = $conn->prepare("INSERT INTO Country (country_id, name, cont_id)
  VALUES (:country_id, :name, :cont_id)");
  $stmt->bindParam(':country_id', $id);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':cont_id', $cont_id);

  $id = "8";
  $name = "C1";
  $cont_id = "4";

  $stmt->execute();


  $stmt = $conn->prepare("INSERT INTO Attraction (id, name, type, founder, size, location, year_created, country_id, cont_id)
  VALUES (:id, :name, :type, :founder, :size, :location, :year_created, :country_id, :cont_id)");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':type', $type);
  $stmt->bindParam(':founder', $founder);
  $stmt->bindParam(':size', $size);
  $stmt->bindParam(':location', $location);
  $stmt->bindParam(':year_created', $year_created);
  $stmt->bindParam(':country_id', $country_id);
  $stmt->bindParam(':cont_id', $cont_id);

  $id = "123";
  $name = "John";
  $type = "Doe";
  $founder = "john@example.com";
  $size = "Computer Science";
  $location = "Toronto";
  $year_created = "2020";
  $country_id = "8";
  $cont_id = "4";
  $stmt->execute();

  $stmt = $conn->prepare("INSERT INTO Pictures (attr_id, picture1, picture2, picture3)
  VALUES (:attr_id, :picture1, :picture2, :picture3)");
  $stmt->bindParam(':attr_id', $attr_id);
  $stmt->bindParam(':picture1', $picture1);
  $stmt->bindParam(':picture2', $picture2);
  $stmt->bindParam(':picture3', $picture3);

  $attr_id = "123";
  $picture1 = "Intro to Computer Science";
  $picture2 = "Computer Science";
  $picture3 = "pic 3 Science";
  $stmt->execute();

  $stmt = $conn->prepare("INSERT INTO Reviews (attr_id, reviewer_name, date_posted)
  VALUES (:attr_id, :reviewer_name, :date_posted)");
  $stmt->bindParam(':attr_id', $attr_id);
  $stmt->bindParam(':reviewer_name', $reviewer_name);
  $stmt->bindParam(':date_posted', $date_posted);

  $attr_id = "123";
  $reviewer_name = "Michael Scott";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

}
catch(PDOException $e)
{
}

//SELECT statements


$query = $conn->prepare("SELECT * FROM Attraction");
$query->execute();
$attractions=$query->fetchAll(\PDO::FETCH_ASSOC);


$query = $conn->prepare("SELECT * FROM Continent");
$query->execute();
$continents=$query->fetchAll(\PDO::FETCH_ASSOC);


$query = $conn->prepare("SELECT * FROM Country");
$query->execute();
$countries=$query->fetchAll(\PDO::FETCH_ASSOC);

$query = $conn->prepare("SELECT * FROM Pictures");
$query->execute();
$pictures=$query->fetchAll(\PDO::FETCH_ASSOC);
print_r($attractions[0]["cont_id"]);


if (isset($_COOKIE["continent"])) {
$cont = $_COOKIE["continent"];
}
else {
  $cont = "0";
}

$query = $conn->prepare("SELECT * FROM Country WHERE cont_id = $cont");
$query->execute();
$country_cut=$query->fetchAll(\PDO::FETCH_ASSOC);

if (isset($_COOKIE["country"])) {
$country = $_COOKIE["country"];
}
else {
  $country = "0";
}

$query = $conn->prepare("SELECT * FROM Attraction WHERE country_id = $country");
$query->execute();
$attr_cut=$query->fetchAll(\PDO::FETCH_ASSOC);



echo $cont;
print_r($country_cut);

$conn = null;
?>
