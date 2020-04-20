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
    name VARCHAR(50) PRIMARY KEY
  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

try {
  $sql = "CREATE TABLE Country (
    name VARCHAR(50) PRIMARY KEY
  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

try {
  $sql = "CREATE TABLE City (
    name VARCHAR(50) PRIMARY KEY
  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}


// create table Attraction
try {
  $sql = "CREATE TABLE Attraction (
    name VARCHAR(50) NOT NULL,
    id VARCHAR(50) PRIMARY KEY,
    type VARCHAR(30) NOT NULL,
    city VARCHAR(50),
    country VARCHAR(50),
    continent VARCHAR(50),
    picture1 VARCHAR(50),
    picture2 VARCHAR(50),
    description VARCHAR(100),
    lat DECIMAL(9,6),
    lon DECIMAL(9,6),
    price INT(8),
    review VARCHAR(100),
    rating INT(4))";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

try{
  $sql = "CREATE TABLE users (
    username VARCHAR(30) PRIMARY KEY,
    fullname VARCHAR(40) NOT NULL,
    password VARCHAR(100) NOT NULL,
	  email VARCHAR(50) NOT NULL,
	  phone_number VARCHAR(14) NOT NULL,
	  address VARCHAR(100) NOT NULL,
    accountType VARCHAR (1) NOT NULL)";
    $conn->exec($sql);
}
catch(PDOException $e)
{
}




// Populate tables
try {



  $stmt = $conn->prepare("INSERT INTO users (username, password, email, address,phone_number, accountType, fullname)
  VALUES (:username, :password, :email, :address, :phone_number, :accountType, :fullname)");
  $stmt->bindParam(':username', $user);
  $stmt->bindParam(':password', $pass);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':address', $address);
  $stmt->bindParam(':phone_number', $phone);
  $stmt->bindParam(':accountType', $type);
  $stmt->bindParam(':fullname', $name);

  $user = "admin";
  $pass = md5("admin");
  $email = "N/A";
  $address = "N/A";
  $phone = "N/A";
  $type = "2";
  $name = "admin";

  $stmt->execute();

$stmt = $conn->prepare("INSERT INTO Continent (name)
VALUES (:name)");
$stmt->bindParam(':name', $name);

$name = "North America";
$stmt->execute();
$name = "South America";
$stmt->execute();
$name = "Europe";
$stmt->execute();
$name = "Asia";
$stmt->execute();
$name = "Australia";
$stmt->execute();

$stmt = $conn->prepare("INSERT INTO Country (name)
VALUES (:name)");
$stmt->bindParam(':name', $name);

$name = "Canada";
$stmt->execute();
$name = "USA";
$stmt->execute();
$name = "England";
$stmt->execute();
$name = "France";
$stmt->execute();

$stmt = $conn->prepare("INSERT INTO City (name)
VALUES (:name)");
$stmt->bindParam(':name', $name);

$name = "Toronto";
$stmt->execute();
$name = "Anaheim";
$stmt->execute();
$name = "London";
$stmt->execute();
$name = "Paris";
$stmt->execute();

  $stmt = $conn->prepare("INSERT INTO Attraction (name, id, type, city, country, continent, picture1, picture2, description, lat, lon, price, review, rating)
  VALUES (:name, :id, :type, :city, :country, :continent, :picture1, :picture2, :description, :lat, :lon, :price, :review, :rating)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':type', $type);
  $stmt->bindParam(':city', $city);
  $stmt->bindParam(':country', $country);
  $stmt->bindParam(':continent', $continent);
  $stmt->bindParam(':picture1', $picture1);
  $stmt->bindParam(':picture2', $picture2);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':lat', $lat);
  $stmt->bindParam(':lon', $lon);
  $stmt->bindParam(':price', $price);
  $stmt->bindParam(':review', $review);
  $stmt->bindParam(':rating', $rating);

  $name = "Casa Loma";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Castle";
  $city = "Toronto";
  $country = "Canada";
  $continent = "North America";
  $picture1 = "casaloma.jpg";
  $picture2 = "casaloma2.jpg";
  $description = "A Gothic Revival style mansion and garden built in 1914.";
  $lat = "43.6532";
  $lon = "-79.3832";
  $price = "40";
  $review = "Beautiful castle!";
  $rating = "4";
  $stmt->execute();

  $name = "CN Tower";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Tower";
  $city = "Toronto";
  $country = "Canada";
  $continent = "North America";
  $picture1 = "cntower.jpg";
  $picture2 = "cntower.jpg";
  $description = "A Gothic Revival style mansion and garden built in 1914.";
  $lat = "43.6532";
  $lon = "-79.3832";
  $price = "50";
  $review = "Fun for the whole family!";
  $rating = "5";
  $stmt->execute();

  $name = "Eiffel Tower";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Tower";
  $city = "Paris";
  $country = "France";
  $continent = "Europe";
  $picture1 = "eiffel.jpg";
  $picture2 = "eiffel2.jpg";
  $description = "A Gothic Revival style mansion and garden built in 1914.";
  $lat = "48.8566";
  $lon = "2.3522";
  $price = "70";
  $review = "Fun for the whole family!";
  $rating = "5";
  $stmt->execute();

  $name = "Big Ben";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Tower";
  $city = "London";
  $country = "England";
  $continent = "Europe";
  $picture1 = "bigben.jpg";
  $picture2 = "bigben2.jpg";
  $description = "A Gothic Revival style mansion and garden built in 1914.";
  $lat = "52.3555";
  $lon = "-1.1743";
  $price = "35";
  $review = "Good experience, would recommend.";
  $rating = "3";
  $stmt->execute();

  $name = "The Shard";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Tower";
  $city = "London";
  $country = "England";
  $continent = "Europe";
  $picture1 = "shard.jpg";
  $picture2 = "shard2.jpg";
  $description = "A Gothic Revival style mansion and garden built in 1914.";
  $lat = "52.3555";
  $lon = "-1.1743";
  $price = "45";
  $review = "Good experience, would recommend.";
  $rating = "3";
  $stmt->execute();


}
catch(PDOException $e)
{
}


$conn = null;
?>
