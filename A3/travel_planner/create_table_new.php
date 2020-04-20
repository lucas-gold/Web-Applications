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
    cont_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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
    country_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    cont_id INT(6) UNSIGNED,
    FOREIGN KEY (cont_id) REFERENCES Continent(cont_id) ON DELETE CASCADE ON UPDATE CASCADE
  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

try {
    $sql = "CREATE TABLE City (
      city_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(50) NOT NULL,
      country_id INT(6) UNSIGNED,
      FOREIGN KEY (country_id) REFERENCES country(country_id) ON DELETE CASCADE ON UPDATE CASCADE
    )";
    $conn->exec($sql);
  }
  catch(PDOException $e)
  {
  }

// create table Attraction
try {
  $sql = "CREATE TABLE Attraction (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    type VARCHAR(30) NOT NULL,
    city_id INT(6) UNSIGNED,
    country_id INT(6) UNSIGNED,
    cont_id INT(6) UNSIGNED,
    lat DECIMAL(9,6),
    lon DECIMAL(9,6),
    picture1 VARCHAR(50),
    picture2 VARCHAR(50),
    picture3 VARCHAR(50),
    description VARCHAR(300),
    price DECIMAL(15,2),
    review VARCHAR(100),
    rating INT(4),
    FOREIGN KEY (city_id) REFERENCES city(city_id) ON DELETE CASCADE ON UPDATE CASCADE,
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
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone_number VARCHAR(14) NOT NULL,
    address VARCHAR(100) NOT NULL,
    accountType VARCHAR (1) NOT NULL)";
    $conn->exec($sql);
}
catch(PDOException $e)
{
    echo $e;
}

// create invoice table
try{
    $sql = "CREATE TABLE invoice (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id int(10) UNSIGNED,
        attr_id int(6) UNSIGNED,
        price DECIMAL(15,2),
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
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
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reviewer_id int(10) UNSIGNED,
    attr_id INT(6) UNSIGNED,
    review VARCHAR(240),
    rating INT(2) NOT NULL,
    date_posted DATETIME NOT NULL,
    FOREIGN KEY (reviewer_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (attr_id) REFERENCES Attraction(id) ON DELETE CASCADE ON UPDATE CASCADE
  )";
  $conn->exec($sql);
}
catch(PDOException $e)
{
}

try {
    $stmt = $conn->prepare("INSERT INTO users (username, password, fullname, email, phone_number, address, accountType)
    VALUES(:username, :password, :fullname, :email, :phone_number, :address, :accountType)");

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':accountType', $accountType); 

    $username = "admin";
    $password = md5("admin");
    $fullname = "admin";
    $email = "admin@hotmail.com";
    $phone_number = "123-123-1234";
    $address = "20 Street West";
    $accountType = "a";
    $stmt->execute();

    $username = "michael_s";
    $password = md5("admin");
    $fullname = "Michael Scott";
    $email = "michael_s@hotmail.com";
    $phone_number = "521-321-4321";
    $address = "11 Street East";
    $accountType = "r";
    $stmt->execute();

    $username = "j_doe";
    $password = md5("admin");
    $fullname = "Jane Doe";
    $email = "j_doe@hotmail.com";
    $phone_number = "361-321-4321";
    $address = "12 Street East";
    $accountType = "r";
    $stmt->execute();

    $stmt = $conn->prepare("INSERT INTO Continent (name) VALUES (:name)");
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
    
    $stmt = $conn->prepare("INSERT INTO Country (name, cont_id) VALUES (:name, :cont_id)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':cont_id', $cont_id);
    
    $name = "Canada";
    $cont_id = "1";
    $stmt->execute();
    
    $name = "USA";
    $cont_id = "1";
    $stmt->execute();
    
    $name = "Brazil";
    $cont_id = "2";
    $stmt->execute();

    $name = "Colombia";
    $cont_id = "2";
    $stmt->execute();
    
    $name = "France";
    $cont_id = "3";
    $stmt->execute();
    
    $name = "England";
    $cont_id = "3";
    $stmt->execute();

    $name = "China";
    $cont_id = "4";
    $stmt->execute();

    $name = "India";
    $cont_id = "4";
    $stmt->execute();
    
    $name = "Australia";
    $cont_id = "5";
    $stmt->execute();

    $name = "New Zealand";
    $cont_id = "5";
    $stmt->execute();

    $stmt = $conn->prepare("INSERT INTO City (name, country_id) VALUES(:name, :country_id)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':country_id', $country_id);

    $name = "Toronto";
    $country_id= "1";
    $stmt->execute();

    $name = "Washington, D.C.";
    $country_id= "2";
    $stmt->execute();

    $name = "Anaheim";
    $country_id= "2";
    $stmt->execute();

    $name = "Rio de Janeiro";
    $country_id= "3";
    $stmt->execute();

    $name = "Bogota";
    $country_id= "3";
    $stmt->execute();

    $name = "Magdalena";
    $country_id= "4";
    $stmt->execute();

    $name = "Paris";
    $country_id= "5";
    $stmt->execute();

    $name = "London";
    $country_id= "6";
    $stmt->execute();

    $name = "Huairou District";
    $country_id= "7";
    $stmt->execute();

    $name = "New Delhi";
    $country_id= "8";
    $stmt->execute();

    $name = "Sydney";
    $country_id= "9";
    $stmt->execute();

    $name = "Southern Alps";
    $country_id= "10";
    $stmt->execute();

    $name = "Northern Alps";
    $country_id= "10";
    $stmt->execute();

    $name = "Beijing";
    $country_id= "7";
    $stmt->execute();

    $stmt = $conn->prepare("INSERT INTO Attraction (name, type, city_id, country_id, cont_id, lat, lon, picture1, picture2, picture3, description, price, review, rating)
    VALUES (:name, :type, :city_id, :country_id, :cont_id, :lat, :lon, :picture1, :picture2, :picture3, :description, :price, :review, :rating)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':city_id', $city_id);
    $stmt->bindParam(':country_id', $country_id);
    $stmt->bindParam(':cont_id', $cont_id);
    $stmt->bindParam(':lat', $lat);
    $stmt->bindParam(':lon', $lon);
    $stmt->bindParam(':picture1', $picture1);
    $stmt->bindParam(':picture2', $picture2);
    $stmt->bindParam(':picture3', $picture3);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':review', $review);
    $stmt->bindParam(':rating', $rating);
  
    $name = "Casa Loma";
    $type = "Castle";
    $city_id = "1";
    $country_id = "1";
    $cont_id = "1";
    $lat = "43.6532";
    $lon = "-79.3832";
    $picture1 = "casaloma.jpg";
    $picture2 = "casaloma2.jpg";
    $picture3 = "casaloma3.jpg";
    $description = "A Gothic Revival style mansion and garden built in 1914.";
    $price = "40";
    $review = "Beautiful castle!";
    $rating = "4";
    $stmt->execute();
  
    $name = "CN Tower";
    $type = "Tower";
    $city_id = "1";
    $country_id = "1";
    $cont_id = "1";
    $lat = "43.6532";
    $lon = "-79.3832";
    $picture1 = "cntower.jpg";
    $picture2 = "cntower2.jpg";
    $picture3 = "cntower3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "35";
    $review = "Fun for the whole family!";
    $rating = "5";
    $stmt->execute();

    $name = "White House";
    $type = "Government";
    $city_id = "2";
    $country_id = "2";
    $cont_id = "1";
    $lat = "38.8977";
    $lon = "-77.0366";
    $picture1 = "whitehouse.jpg";
    $picture2 = "whitehouse2.jpg";
    $picture3 = "whitehouse3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "70";
    $review = "Fun for the whole family!";
    $rating = "5";
    $stmt->execute();

    $name = "Disney Land";
    $type = "Park";
    $city_id = "3";
    $country_id = "2";
    $cont_id = "1";
    $lat = "28.3852";
    $lon = "81.5638";
    $picture1 = "disney.jpg";
    $picture2 = "disney2.jpg";
    $picture3 = "disney3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "100";
    $review = "Fun for the whole family!";
    $rating = "5";
    $stmt->execute();

    $name = "Christ the Redeemer";
    $type = "Statue";
    $city_id = "4";
    $country_id = "3";
    $cont_id = "2";
    $lat = "-22.9518";
    $lon = "-43.2104";
    $picture1 = "redeemer.jpg";
    $picture2 = "redeemer2.jpg";
    $picture3 = "redeemer3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "55";
    $review = "Fun for the whole family!";
    $rating = "3.8";
    $stmt->execute();

    $name = "Niteroi Museum";
    $type = "Museum";
    $city_id = "4";
    $country_id = "3";
    $cont_id = "2";
    $lat = "-22.9078";
    $lon = "-43.1258";
    $picture1 = "niteroi.jpg";
    $picture2 = "niteroi2.jpg";
    $picture3 = "niteroi3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "50";
    $review = "Fun for the whole family!";
    $rating = "5";
    $stmt->execute();
  
    $name = "Botero Museum";
    $type = "Museum";
    $city_id = "5";
    $country_id = "4";
    $cont_id = "2";
    $lat = "4.5968";
    $lon = "-74.0731";
    $picture1 = "botero.jpg";
    $picture2 = "botero2.jpg";
    $picture3 = "botero3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "95";
    $review = "Fun for the whole family!";
    $rating = "3";
    $stmt->execute();

    $name = "Lost City";
    $type = "Park";
    $city_id = "6";
    $country_id = "4";
    $cont_id = "2";
    $lat = "11.0385";
    $lon = "-73.9251";
    $picture1 = "lostcity.jpg";
    $picture2 = "lostcity2.jpg";
    $picture3 = "lostcity3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "15";
    $review = "Fun for the whole family!";
    $rating = "2.5";
    $stmt->execute();
  
    $name = "The Louvre";
    $type = "Museum";
    $city_id = "7";
    $country_id = "5";
    $cont_id = "3";
    $lat = "48.8606";
    $lon = "2.3376";
    $picture1 = "louvre.jpg";
    $picture2 = "louvre2.jpg";
    $picture3 = "louvre3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "200";
    $review = "Fun for the whole family!";
    $rating = "3";
    $stmt->execute();

    $name = "Eiffel Tower";
    $type = "Tower";
    $city_id = "7";
    $country_id = "5";
    $cont_id = "3";
    $lat = "48.8566";
    $lon = "2.3522";
    $picture1 = "eiffel.jpg";
    $picture2 = "eiffel2.jpg";
    $picture3 = "eiffel3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "80";
    $review = "Fun for the whole family!";
    $rating = "4";
    $stmt->execute();

    $name = "Big Ben";
    $type = "Tower";
    $city_id = "8";
    $country_id = "6";
    $cont_id = "3";
    $lat = "52.3555";
    $lon = "-1.1743";
    $picture1 = "bigben.jpg";
    $picture2 = "bigben2.jpg";
    $picture3 = "bigben3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "35";
    $review = "Fun for the whole family!";
    $rating = "4.5";
    $stmt->execute();

    $name = "The Shard";
    $type = "Tower";
    $city_id = "8";
    $country_id = "6";
    $cont_id = "3";
    $lat = "52.3555";
    $lon = "-1.1743";
    $picture1 = "shard.jpg";
    $picture2 = "shard2.jpg";
    $picture3 = "shard3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "45";
    $review = "Fun for the whole family!";
    $rating = "3.6";
    $stmt->execute();

    $name = "Great Wall of China";
    $type = "Wall";
    $city_id = "9";
    $country_id = "7";
    $cont_id = "4";
    $lat = "40.4319";
    $lon = "116.5703";
    $picture1 = "greatwall.jpg";
    $picture2 = "greatwall2.jpg";
    $picture3 = "greatwall3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "100";
    $review = "Fun for the whole family!";
    $rating = "2.3";
    $stmt->execute();

    $name = "Forbidden City";
    $type = "City";
    $city_id = "14";
    $country_id = "7";
    $cont_id = "4";
    $lat = "39.9170";
    $lon = "116.3907";
    $picture1 = "forbiddencity.jpg";
    $picture2 = "forbiddencity2.jpg";
    $picture3 = "forbiddencity3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "120";
    $review = "Fun for the whole family!";
    $rating = "5";
    $stmt->execute();

    $name = "Taj Mahal";
    $type = "Museum";
    $city_id = "10";
    $country_id = "8";
    $cont_id = "4";
    $lat = "27.1750";
    $lon = "78.0421";
    $picture1 = "tajmahal.jpg";
    $picture2 = "tajmahal2.jpg";
    $picture3 = "tajmahal3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "90";
    $review = "Fun for the whole family!";
    $rating = "5";
    $stmt->execute();

    $name = "Amber Palace";
    $type = "Castle";
    $city_id = "10";
    $country_id = "8";
    $cont_id = "4";
    $lat = "26.9855";
    $lon = "75.8513";
    $picture1 = "amberpalace.jpg";
    $picture2 = "amberpalace2.jpg";
    $picture3 = "amberpalace2.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "68";
    $review = "Fun for the whole family!";
    $rating = "5";
    $stmt->execute();
  
    $name = "Sydney Opera House";
    $type = "Theatre";
    $city_id = "11";
    $country_id = "9";
    $cont_id = "5";
    $lat = "-33.8568";
    $lon = "151.2152";
    $picture1 = "sydney.jpg";
    $picture2 = "sydney2.jpg";
    $picture3 = "sydney3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "300";
    $review = "Fun for the whole family!";
    $rating = "4";
    $stmt->execute();

    $name = "Harbour Bridge";
    $type = "Bridge";
    $city_id = "11";
    $country_id = "9";
    $cont_id = "5";
    $lat = "-33.8521";
    $lon = "151.2108";
    $picture1 = "harbourbridge.jpg";
    $picture2 = "harbourbridge2.jpg";
    $picture3 = "harbourbridge3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "251";
    $review = "Fun for the whole family!";
    $rating = "4";
    $stmt->execute();

    $name = "Mount Cook";
    $type = "Park";
    $city_id = "12";
    $country_id = "10";
    $cont_id = "5";
    $lat = "-43.5946";
    $lon = "170.1414";
    $picture1 = "mountcook.jpg";
    $picture2 = "mountcook2.jpg";
    $picture3 = "mountcook3.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "35";
    $review = "Fun for the whole family!";
    $rating = "3";
    $stmt->execute();

    $name = "Milford Sound";
    $type = "Park";
    $city_id = "13";
    $country_id = "10";
    $cont_id = "5";
    $lat = "-44.6716";
    $lon = "167.9251";
    $picture1 = "milfordsound.jpg";
    $picture2 = "milfordsound.jpg";
    $picture3 = "milfordsound.jpg";
    $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia.";
    $price = "50";
    $review = "Fun for the whole family!";
    $rating = "5";
    $stmt->execute();
  
    $stmt = $conn->prepare("INSERT INTO Reviews (attr_id, reviewer_id, review, rating, date_posted)
    VALUES (:attr_id, :reviewer_id, :review, :rating, :date_posted)");
    $stmt->bindParam(':attr_id', $attr_id);
    $stmt->bindParam(':reviewer_id', $reviewer_id);
    $stmt->bindParam(':review', $review);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':date_posted', $date_posted);
  
    $attr_id = "1";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "1";
    $reviewer_id = "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "2";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "2";
    $reviewer_id = "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "3";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "3";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "4";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "4";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
  
    $attr_id = "5";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "5";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "6";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "6";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "7";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "7";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "8";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "8";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "9";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "9";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "10";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "10";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "11";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "11";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "12";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "12";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "13";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "13";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "14";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "14";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "15";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "15";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "16";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "16";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();

    $attr_id = "17";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "17";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "18";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "18";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "19";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "19";
    $reviewer_id= "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();
  
    $attr_id = "20";
    $reviewer_id = "2";
    $review = "Great place to stay";
    $rating = "5";
    $date_posted = "2020-01-24 07:41:11";
    $stmt->execute();
  
    $attr_id = "20";
    $reviewer_id = "3";
    $review = "I had a great time...";
    $rating = "3";
    $date_posted = "2019-01-23 07:41:19";
    $stmt->execute();

    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }