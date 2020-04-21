<?php
include('dbconnect.php');

if(isset($_POST['add_user'])){
    $stmt = $conn->prepare("INSERT INTO users (username, password, fullname, email, phone_number, address, accountType) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $username, $password, $fullname, $email, $phone_number, $address, $accountType);
    
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $fullname = $_POST['fullname'];
    $accountType = $_POST['accountType'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $stmt->execute();

    $_SESSION['message'] = "User added";
    header('location: db_users.php');
}

if(isset($_POST['update_user'])){
    $stmt = $conn->prepare("UPDATE users SET password=?, email=?, fullname=?, phone_number=?, address=?, accountType=? WHERE username=?");
    $stmt->bind_param("sssssss", $password, $email, $fullname, $phone_number, $address, $accountType, $username);
    
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $fullname = $_POST['fullname'];
    $accountType = $_POST['accountType'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $stmt->execute();

    $_SESSION['message'] = "User updated";
    header('location: db_users.php');
}

if(isset($_GET['del_user'])){
    $stmt = $conn->prepare("DELETE FROM users WHERE username=?");
    $stmt->bind_param("s", $username);

    $username = $_GET['del_user'];

    $stmt->execute();
    $SESSION['message'] = "User deleted";
    header('location: db_users.php');
}

//Country
if(isset($_POST['add_country'])){
    $stmt = $conn->prepare("INSERT INTO Country (name) VALUES (?)");
    $stmt->bind_param("s", $countryName);
    
    $countryName = $_POST['name'];

    $stmt->execute();

    $_SESSION['message'] = "Country added";
    header('location: db_country.php');
}

if(isset($_GET['del_country'])){
    $stmt = $conn->prepare("DELETE FROM Country WHERE name=?");
    $stmt->bind_param("s", $name);

    $name = $_GET['del_country'];

    $stmt->execute();

    $SESSION['message'] = "Contry deleted";
    header('location: db_country.php');
}

//City
if(isset($_POST['add_city'])){
    $stmt = $conn->prepare("INSERT INTO city (name) VALUES (?)");
    $stmt->bind_param("s", $city_name);
    
    $city_name = $_POST['name'];

    $stmt->execute();

    $_SESSION['message'] = "City added";
    header('location: db_city.php');
}

if(isset($_GET['del_city'])){
    $stmt = $conn->prepare("DELETE FROM city WHERE name=?");
    $stmt->bind_param("s", $name);

    $name = $_GET['del_city'];

    $stmt->execute();

    $SESSION['message'] = "City deleted";
    header('location: db_city.php');
}

//Continent
if(isset($_POST['add_cont'])){
    $stmt = $conn->prepare("INSERT INTO Continent (name) VALUES (?)");
    $stmt->bind_param("s", $continentName);
    
    $continentName = $_POST['name'];

    $stmt->execute();

    $_SESSION['message'] = "Continent added";
    header('location: db_continent.php');
}


if(isset($_GET['del_cont'])){
    $stmt = $conn->prepare("DELETE FROM Continent WHERE name=?");
    $stmt->bind_param("s", $name);
    
    $name = $_GET['del_cont'];

    $stmt->execute();
    $SESSION['message'] = "Continent deleted";
    header('location: db_continent.php');
}

//Attractions
if(isset($_POST['add_att'])){

    $stmt = $conn->prepare("INSERT INTO Attraction (name, id, type, city, country, continent, lat, lon, picture1, picture2, description, price, rating, review) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssddsssdss", $name, $id, $type, $city, $country, $continent, $lat, $lon, $picture1, $picture2, $description, $price, $rating, $review);

    $id=$_POST['id'];
    $name= $_POST['name'];
    $type= $_POST['type'];
    $city= $_POST['city'];
    $country = $_POST['country'];
    $cont = $_POST['continent'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
    $picture1 = $_FILES['picture1']['name'];
    $picture2 = $_FILES['picture2']['name'];
    $picture3 = $_FILES['picture3']['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    $stmt->execute();
    echo $picture1;
    $_SESSION['message'] = "Attraction added";
    header('location: db_attractions.php');
}

if(isset($_POST['update_att'])){
    $stmt = $conn->prepare("UPDATE Attraction SET name=?, type=?, city=?, country=?, continent=?, lat=?, lon=?, picture1=?, picture2=?, description=?, price=?, review=?, rating=? WHERE id=?");
    $stmt->bind_param("sssssddsssdsss", $name, $type, $city, $country, $continent, $lat, $lon, $picture1, $picture2, $description, $price, $review, $rating, $id);

    $name= $_POST['name'];
    $type= $_POST['type'];
    $city= $_POST['city'];
    $country = $_POST['country'];
    $cont = $_POST['continent'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];

    if($_FILES['picture1']['name'] != NULL){
        $picture1 = $_FILES['picture1']['name'];
    }else{
        $picture1 = $_POST['picture1'];
    }
    
    if($_FILES['picture2']['name'] != NULL){
        $picture2 = $_FILES['picture2']['name'];
    }else{
        $picture2 = $_POST['picture2'];
    }

    $description = $_POST['description'];
    $price = $_POST['price'];
    $id=$_POST['id'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    if($stmt->execute()){
        $_SESSION['message'] = "Attraction updated";
    }
    header('location: db_attractions.php');
}

if(isset($_GET['del_att'])){
    $stmt = $conn->prepare("DELETE FROM Attraction WHERE id=?");
    $stmt->bind_param("s", $id);
    
    $id = $_GET['del_att'];

    $stmt->execute();

    $SESSION['message'] = "Attraction deleted";
    header('location: db_attractions.php');
}
?>
