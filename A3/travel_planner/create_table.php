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
  
  
  
  $name = "White House";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Government";
  $city = "Washington dc";
  $country = "United States";
  $continent = "North America";
  $picture1 = "whitehouse.jpg";
  $picture2 = "whitehouse2.jpg";
  $description = "The White House is the official residence and workplace of the president of the United States.";
  $lat = "38.8977";
  $lon = "-77.0366";
  $price = "70";
  $review = "Fun for the whole family!";
  $rating = "5";
  $stmt->execute();
  
  
  
  $name = "Disney Land";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Tower";
  $city = "California";
  $country = "United States";
  $continent = "North America";
  $picture1 = "disney.jpg";
  $picture2 = "disney2.jpg";
  $description = "Disneyland Park, originally Disneyland, is the first of two theme parks built at the Disneyland Resort in Anaheim, California, opened on July 17, 1955.";
  $lat = "28.3852";
  $lon = "81.5638";
  $price = "100";
  $review = "Fun for the whole family!";
  $rating = "5";
  $stmt->execute();
 
  
  $name = "Christ the Redeemer";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Statue";
  $city = "Rio de Janeiro";
  $country = "Brazil";
  $continent = "South America";
  $picture1 = "redeemer.jpg";
  $picture2 = "redeemer2.jpg";
  $description = "Christ the Redeemer is an Art Deco statue of Jesus Christ in Rio de Janeiro, Brazil,";
  $lat = "-22.9518";
  $lon = "-43.2104";
  $price = "50";
  $review = "Fun for the whole family!";
  $rating = "3.8";
  $stmt->execute();
  
  $name = "Niteroi Museum";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Museum";
  $city = "Niterói";
  $country = "Brazil";
  $continent = "South America";
  $picture1 = "niteroi.jpg";
  $picture2 = "niteroi2.jpg";
  $description = "The Niterói Contemporary Art Museum is situated in the city of Niterói, Rio de Janeiro, Brazil.";
  $lat = "-22.9078";
  $lon = "-43.1258";
  $price = "50";
  $review = "Fun for the whole family!";
  $rating = "3.8";
  $stmt->execute();

  $name = "Botero Museum";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Museum";
  $city = "Bogotá";
  $country = "Colombia";
  $continent = "South America";
  $picture1 = "botero.jpg";
  $picture2 = "botero2.jpg";
  $description = "The Botero Museum also known as Museo Botero is a museum located in Bogotá, Colombia.";
  $lat = "4.5968";
  $lon = "-74.0731";
  $price = "95";
  $review = "Fun for the whole family!";
  $rating = "3.8";
  $stmt->execute();


  $name = "Lost City";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Park";
  $city = "Magdalena Department";
  $country = "Colombia";
  $continent = "South America";
  $picture1 = "lostcity.jpg";
  $picture2 = "lostcity2.jpg";
  $description = "A lost city is a settlement that fell into terminal decline and became extensively or completely uninhabited.";
  $lat = "11.0385";
  $lon = "-73.9251";
  $price = "15";
  $review = "Fun for the whole family!";
  $rating = "3.8";
  $stmt->execute();

  $name = "The Louvre";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Museum";
  $city = "Paris";
  $country = "France";
  $continent = "Europe";
  $picture1 = "louvre.jpg";
  $picture2 = "louvre2.jpg";
  $description = "The Louvre, or the Louvre Museum, is the world's largest art museum and a historic monument in Paris, France.";
  $lat = "48.8606";
  $lon = "2.3376";
  $price = "200";
  $review = "Fun for the whole family!";
  $rating = "3.8";
  $stmt->execute();


  $name = "Eiffel Tower";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Tower";
  $city = "Paris";
  $country = "France";
  $continent = "Europe";
  $picture1 = "eiffel.jpg";
  $picture2 = "eiffel2.jpg";
  $description = "The Eiffel Tower is a wrought-iron lattice tower on the Champ de Mars in Paris, France.";
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

  $name = "Great Wall of China";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Wall";
  $city = "Beijing";
  $country = "China";
  $continent = "Asia";
  $picture1 = "greatwall.jpg";
  $picture2 = "greatwall2.jpg";
  $description = "The Great Wall of China is the collective name of a series of fortification systems.";
  $lat = "40.4319";
  $lon = "116.5703";
  $price = "100";
  $review = "Good experience, would recommend.";
  $rating = "4.2";
  $stmt->execute();


  $name = "Forbidden City";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "City";
  $city = "Beijing";
  $country = "China";
  $continent = "Asia";
  $picture1 = "forbiddencity.jpg";
  $picture2 = "forbiddencity2.jpg";
  $description = "A Gothic Revival style mansion and garden built in 1914.";
  $lat = "39.9170";
  $lon = "116.3907";
  $price = "120";
  $review = "Good experience, would recommend.";
  $rating = "4.5";
  $stmt->execute();



  $name = "Taj Mahal";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Museum";
  $city = "Agra";
  $country = "India";
  $continent = "Asia";
  $picture1 = "tajmaha.jpg";
  $picture2 = "tajmaha2.jpg";
  $description = "The Taj Mahal was commissioned by Shah Jahan in 1631, to be built in the memory of his wife Mumtaz Mahal";
  $lat = "27.1750";
  $lon = "78.0421";
  $price = "90";
  $review = "Good experience, would recommend.";
  $rating = "3";
  $stmt->execute();

  $name = "Amber Palace";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Castle";
  $city = "Rajasthan";
  $country = "India";
  $continent = "Asia";
  $picture1 = "amberpalace.jpg";
  $picture2 = "amberpalace2.jpg";
  $description = "Amer Fort or Amber Fort is a fort located in Amer, Rajasthan, India. Amer is a town with an area of 4 square kilometres.";
  $lat = "26.9855";
  $lon = "75.8513";
  $price = "68";
  $review = "Good experience, would recommend.";
  $rating = "3";
  $stmt->execute();



  $name = "Sydney Opera House";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Theatre";
  $city = "Sydney";
  $country = "Australia";
  $continent = "Oceania";
  $picture1 = "sydney.jpg";
  $picture2 = "sydney2.jpg";
  $description = "The Sydney Opera House is a multi-venue performing arts centre at Sydney Harbour in Sydney, New South Wales, Australia. ";
  $lat = "-33.8568";
  $lon = "151.2152";
  $price = "300";
  $review = "Good experience, would recommend.";
  $rating = "3";
  $stmt->execute();


  $name = "Harbour Bridge";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Bridge";
  $city = "Sydney";
  $country = "Australia";
  $continent = "Oceania";
  $picture1 = "harbourbridge.jpg";
  $picture2 = "harbourbridge2.jpg";
  $description = "The Sydney Harbour Bridge is an Australian heritage-listed steel through arch bridge across Sydney Harbour.";
  $lat = "-33.8521";
  $lon = "151.2108";
  $price = "251";
  $review = "Good experience, would recommend.";
  $rating = "4";
  $stmt->execute();


  $name = "Mount Cook";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Park";
  $city = "Fiordland";
  $country = "New Zealand";
  $continent = "Oceania";
  $picture1 = "mountcook.jpg";
  $picture2 = "mountcook2.jpg";
  $description = "Aoraki / Mount Cook is the highest mountain in New Zealand. Its height, as of 2014, is listed as 3,724 metres. ";
  $lat = "-43.5946";
  $lon = "170.1414";
  $price = "35";
  $review = "Good experience, would recommend.";
  $rating = "4";
  $stmt->execute();


  $name = "Milford Sound";
  $id = strtolower(str_replace(' ', '', $name));
  $type = "Park";
  $city = "Fiordland";
  $country = "New Zealand";
  $continent = "Oceania";
  $picture1 = "milfordsound.jpg";
  $picture2 = "milfordsound2.jpg";
  $description = "Milford Sound is a fiord in the southwest of New Zealand’s South Island.";
  $lat = "-44.6716";
  $lon = "167.9251";
  $price = "50";
  $review = "Good experience, would recommend.";
  $rating = "4";
  $stmt->execute();


}
catch(PDOException $e)
{
}

$conn = null;
?>
