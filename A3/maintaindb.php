<?php
include('dbconnect.php');

if(isset($_POST['add_user'])){
    $stmt = $conn->prepare("INSERT INTO users (username, password, email, phone_number, address, accountType) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $username, $password, $email, $phone_number, $address, $accountType);
    
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $accountType = $_POST['accountType'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $stmt->execute();

    $_SESSION['message'] = "User added";
    header('location: db_users.php');
}

if(isset($_POST['update_user'])){
    $stmt = $conn->prepare("UPDATE users SET username=?, password=?, email=?, phone_number=?, address=?, accountType=? WHERE id=?");
    $stmt->bind_param("ssssssd", $username, $password, $email, $phone_number, $address, $accountType, $id);
    
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $accountType = $_POST['accountType'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $stmt->execute();

    $_SESSION['message'] = "User updated";
    header('location: db_users.php');
}

if(isset($_GET['del_user'])){
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("d", $id);

    $id = $_GET['del_user'];

    $stmt->execute();
    $SESSION['message'] = "User deleted";
    header('location: db_users.php');
}

//Country
if(isset($_POST['add_country'])){
    $stmt = $conn->prepare("INSERT INTO Country (name, cont_id) VALUES (?,?)");
    $stmt->bind_param("sd", $countryName, $cont_id);
    
    $countryName = $_POST['name'];
    $cont_id = $_POST['cont_id'];

    $stmt->execute();

    $_SESSION['message'] = "Country added";
    header('location: db_country.php');
}

if(isset($_POST['update_country'])){
    $stmt = $conn->prepare("UPDATE Country SET name=?, cont_id=? WHERE country_id=?");
    $stmt->bind_param("ssd", $countryName, $cont_id, $country_id);
    
    $country_id = $_POST['country_id'];
    $countryName = $_POST['name'];
    $cont_id = $_POST['cont_id'];

    $stmt->execute();

    $_SESSION['message'] = "Contry updated";
    header('location: db_country.php');
}

if(isset($_GET['del_country'])){
    $stmt = $conn->prepare("DELETE FROM Country WHERE country_id=?");
    $stmt->bind_param("d", $id);

    $id = $_GET['del_country'];

    $stmt->execute();

    $SESSION['message'] = "Contry deleted";
    header('location: db_country.php');
}

//City
if(isset($_POST['add_city'])){
    $stmt = $conn->prepare("INSERT INTO city (name, country_id) VALUES (?,?)");
    $stmt->bind_param("sd", $city_name, $country_id);
    
    $city_name = $_POST['name'];
    $country_id = $_POST['country_id'];

    $stmt->execute();

    $_SESSION['message'] = "City added";
    header('location: db_city.php');
}

if(isset($_POST['update_city'])){
    $stmt = $conn->prepare("UPDATE city SET name=?, country_id=? WHERE city_id=?");
    $stmt->bind_param("sdd", $city_name, $country_id, $city_id);
    
    $country_id = $_POST['country_id'];
    $city_name = $_POST['name'];
    $city_id = $_POST['city_id'];

    $stmt->execute();

    $_SESSION['message'] = "City updated";
    header('location: db_city.php');
}

if(isset($_GET['del_city'])){
    $stmt = $conn->prepare("DELETE FROM city WHERE city_id=?");
    $stmt->bind_param("d", $id);

    $id = $_GET['del_city'];

    $stmt->execute();

    $SESSION['message'] = "City deleted";
    header('location: db_city.php');
}

//Continent
$continentName = "";
if(isset($_POST['add_cont'])){
    $stmt = $conn->prepare("INSERT INTO Continent (name) VALUES (?)");
    $stmt->bind_param("s", $continentName);
    
    $continentName = $_POST['name'];

    $stmt->execute();

    $_SESSION['message'] = "Continent added";
    header('location: db_continent.php');
}

if(isset($_POST['update_cont'])){
    $stmt = $conn->prepare("UPDATE Continent SET name=? WHERE cont_id=?");
    $stmt->bind_param("sd", $continentName, $cont_id);
    
    $cont_id = $_POST['cont_id'];
    $continentName = $_POST['name'];

    $stmt->execute();

    $_SESSION['message'] = "Continent updated";
    header('location: db_continent.php');
}

if(isset($_GET['del_cont'])){
    $stmt = $conn->prepare("DELETE FROM Continent WHERE cont_id=?");
    $stmt->bind_param("d", $id);
    
    $id = $_GET['del_cont'];

    $stmt->execute();
    $SESSION['message'] = "Continent deleted";
    header('location: db_continent.php');
}

//Attractions
if(isset($_POST['add_att'])){

    $stmt = $conn->prepare("INSERT INTO Attraction (name, type, city_id, country_id, cont_id, lat, lon, picture1, picture2, picture3, description, price) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssdddssssd", $name, $type, $city_id, $country_id, $cont_id, $lat, $lon, $picture1, $picture2, $picture3, $description, $price);

    $name= $_POST['name'];
    $type= $_POST['type'];
    $city_id= $_POST['city_id'];
    $country_id = $_POST['country_id'];
    $cont_id = $_POST['cont_id'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
    $picture1 = $_FILES['picture1']['name'];
    $picture2 = $_FILES['picture2']['name'];
    $picture3 = $_FILES['picture3']['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt->execute();
    echo $picture1;
    $_SESSION['message'] = "Attraction added";
    header('location: db_attractions.php');
}

if(isset($_POST['update_att'])){
    $stmt = $conn->prepare("UPDATE Attraction SET name=?, type=?, city_id=?, country_id=?, cont_id=?, lat=?, lon=?, picture1=?, picture2=?, picture3=?, description=?, price=? WHERE id=?");
    $stmt->bind_param("ssdddssssdd", $name, $type, $city_id, $country_id, $cont_id, $lat, $lon, $picture1, $picture2, $picture3, $description, $price, $id);

    $name= $_POST['name'];
    $type= $_POST['type'];
    $city_id= $_POST['city_id'];
    $country_id = $_POST['country_id'];
    $cont_id = $_POST['cont_id'];
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

    if($_FILES['picture3']['name'] != NULL){
        $picture3 = $_FILES['picture3']['name'];
    }else{
        $picture3 = $_POST['picture3'];
    }

    $description = $_POST['description'];
    $price = $_POST['price'];
    $id=$_POST['id'];

    $stmt->execute();

    $_SESSION['message'] = "Attraction updated";
    header('location: db_attractions.php');
}

if(isset($_GET['del_att'])){
    $stmt = $conn->prepare("DELETE FROM Attraction WHERE id=?");
    $stmt->bind_param("d", $id);
    
    $id = $_GET['del_att'];

    $stmt->execute();

    $SESSION['message'] = "Attraction deleted";
    header('location: db_attractions.php');
}

//plans
if(isset($_POST['add_plan'])){
    $stmt = $conn->prepare("INSERT INTO plans (startDate, duration, attraction_id1, attraction_id2, attraction_id3, transitFare, price) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("ssddddd", $startDate, $duration, $att_id1, $att_id2, $att_id3, $transitFare, $price);
    
    $startDate = $_POST['startDate'];
    $duration = $_POST['duration'];
    $att_id1 = $_POST['att_id1'];
    $att_id2 = $_POST['att_id2'];
    $att_id3 = $_POST['att_id3'];
    $transitFare = $_POST['transitFare'];
    $price = $_POST['price'];

    $stmt->execute();

    $_SESSION['message'] = "Plan added";
    header('location: db_plans.php');
}

if(isset($_POST['update_plan'])){
    $stmt = $conn->prepare("UPDATE plans SET startDate=?, duration=?, attraction_id1=?, attraction_id2=?, attraction_id3=?, transitFare=?, price=? WHERE id=?");
    $stmt->bind_param("ssdddddd", $startDate, $duration, $att_id1, $att_id2, $att_id3, $transitFare, $price, $id);
    
    $id = $_POST['id'];
    $startDate = $_POST['startDate'];
    $duration = $_POST['duration'];
    $att_id1 = $_POST['att_id1'];
    $att_id2 = $_POST['att_id2'];
    $att_id3 = $_POST['att_id3'];
    $transitFare = $_POST['transitFare'];
    $price = $_POST['price'];

    $stmt->execute();

    $_SESSION['message'] = "Plan updated";
    header('location: db_plans.php');
}

if(isset($_GET['del_plan'])){
    $stmt = $conn->prepare("DELETE FROM plans WHERE id=?");
    $stmt->bind_param("d", $id);

    $id = $_GET['del_plan'];

    $stmt->execute();
    $SESSION['message'] = "Plan deleted";
    header('location: db_plans.php');
}

//Reviews
if(isset($_POST['add_review'])){
    $stmt = $conn->prepare("INSERT INTO Reviews (reviewer_id, attr_id, review, rating, date_posted) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ddsds", $reviewer_id, $attr_id, $review, $rating, $date_posted);
    
    $reviewer_id = $_POST['reviewer_id'];
    $attr_id = $_POST['attr_id'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $date_posted = $_POST['date_posted'];

    $stmt->execute();

    $_SESSION['message'] = "Review added";
    header('location: db_reviews.php');
}

if(isset($_POST['update_review'])){
    $stmt = $conn->prepare("UPDATE Reviews SET reviewer_id=?, attr_id=?, review=?, rating=?, date_posted=? WHERE id=?");
    $stmt->bind_param("ddsdsd", $reviewer_id, $attr_id, $review, $rating, $date_posted, $id);
    
    $id = $_POST['id'];
    $reviewer_id = $_POST['reviewer_id'];
    $attr_id = $_POST['attr_id'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $date_posted = $_POST['date_posted'];

    $stmt->execute();

    $_SESSION['message'] = "Review updated";
    header('location: db_reviews.php');
}

if(isset($_GET['del_review'])){
    $stmt = $conn->prepare("DELETE FROM Reviews WHERE id=?");
    $stmt->bind_param("d", $id);

    $id = $_GET['del_review'];

    $stmt->execute();
    $SESSION['message'] = "Review deleted";
    header('location: db_reviews.php');
}

//Invoice
if(isset($_POST['add_invoice'])){
    $stmt = $conn->prepare("INSERT INTO invoice (user_id, attr_id, price) VALUES (?,?,?)");
    $stmt->bind_param("ddd", $user_id, $attr_id, $price);
    
    $user_id = $_POST['user_id'];
    $attr_id = $_POST['attr_id'];
    $price = $_POST['price'];

    $stmt->execute();

    $_SESSION['message'] = "Invoice added";
    header('location: db_invoice.php');
}

if(isset($_POST['update_invoice'])){
    $stmt = $conn->prepare("UPDATE invoice SET user_id=?, attr_id=?, price=? WHERE id=?");
    $stmt->bind_param("dddd", $user_id, $attr_id, $price, $id);
    
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $attr_id = $_POST['attr_id'];
    $price = $_POST['price'];
    $stmt->execute();

    $_SESSION['message'] = "Invoice updated";
    header('location: db_invoice.php');
}

if(isset($_GET['del_invoice'])){
    $stmt = $conn->prepare("DELETE FROM invoice WHERE id=?");
    $stmt->bind_param("d", $id);

    $id = $_GET['del_invoice'];

    $stmt->execute();
    $SESSION['message'] = "Invoice deleted";
    header('location: db_invoice.php');
}
?>