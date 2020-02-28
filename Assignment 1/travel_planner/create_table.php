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

// create table Pictures
try {
  $sql = "CREATE TABLE Pictures (
    attr_id INT(6) UNSIGNED PRIMARY KEY,
    caption VARCHAR(50) NOT NULL,
    picture1 VARCHAR(50),
    picture2 VARCHAR(50),
    picture3 VARCHAR(50),
    close_id INT(6),
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
    reviewer_name VARCHAR(30) PRIMARY KEY,
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

  $cont_id = "4";
  $name = "Cont1";

  $stmt->execute();

  $cont_id = "5";
  $name = "Cont2";

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

  $id = "3";
  $name = "C2";
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

  $id = "123";
  $name = "Casa Loma";
  $type = "Doe";
  $founder = "john@example.com";
  $size = "Computer Science";
  $location = "Toronto";
  $country = "C1";
  $year_created = "2020";
  $country_id = "8";
  $cont_id = "4";
  $picture1 = "casaloma.jpg";
  $picture2 = "disney.jpg";
  $picture3 = "bigben.jpg";
  $close_id = "1";
  $stmt->execute();

  $id = "124";
  $name = "Disney Land";
  $type = "Doe";
  $founder = "john@example.com";
  $size = "Computer Science";
  $location = "Toronto";
  $country = "C1";
  $year_created = "2020";
  $country_id = "8";
  $cont_id = "4";
  $picture1 = "disney.jpg";
  $picture2 = "abc.jpg";
  $picture3 = "efg.jpg";
  $close_id = "1";
  $stmt->execute();

  $id = "125";
  $name = "Big Ben";
  $type = "Doe";
  $founder = "john@example.com";
  $size = "Computer Science";
  $location = "Toronto";
  $country = "C1";
  $year_created = "2020";
  $country_id = "8";
  $cont_id = "4";
  $picture1 = "bigben.jpg";
  $picture2 = "bologna.jpg";
  $picture3 = "brazil.jpg";
  $close_id = "1";
  $stmt->execute();

  $id = "126";
  $name = "Eiffel Tower";
  $type = "Doe";
  $founder = "john@example.com";
  $size = "Computer Science";
  $location = "Toronto";
  $country = "C1";
  $year_created = "2020";
  $country_id = "8";
  $cont_id = "4";
  $picture1 = "eiffel.jpg";
  $picture2 = "abc.jpg";
  $picture3 = "efg.jpg";
  $close_id = "1";
  $stmt->execute();

  $stmt = $conn->prepare("INSERT INTO Reviews (attr_id, reviewer_name, review, rating, date_posted)
  VALUES (:attr_id, :reviewer_name, :review, :rating, :date_posted)");
  $stmt->bindParam(':attr_id', $attr_id);
  $stmt->bindParam(':reviewer_name', $reviewer_name);
    $stmt->bindParam(':review', $review);
    $stmt->bindParam(':rating', $rating);
  $stmt->bindParam(':date_posted', $date_posted);

  $attr_id = "123";
  $reviewer_name = "Michael Scott";
  $review = "Great place to stay";
  $rating = "5";
  $date_posted = "2020-01-24 07:41:11";
  $stmt->execute();

  $attr_id = "123";
  $reviewer_name = "Test Scott";
  $review = "adjfaldsfkjasdlfkjads;l LSDKFJSDFLKJdsl adslfkjasdf;k";
  $rating = "3";
  $date_posted = "2019-01-24 07:41:19";
  $stmt->execute();

}
catch(PDOException $e)
{
}

//SELECT statements
$query = $conn->prepare("SELECT * FROM Continent");
$query->execute();
$continents=$query->fetchAll(\PDO::FETCH_ASSOC);

$query = $conn->prepare("SELECT * FROM Attraction LIMIT 5");
$query->execute();
$attractions=$query->fetchAll(\PDO::FETCH_ASSOC);

$conn = null;
?>
