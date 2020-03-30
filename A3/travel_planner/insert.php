<?php
    if(!isset($_SESSION)) {
        session_start();
    }
//include 'connection.php';

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
    echo $e->getMessage();
}

if(isset($_POST['btn_insert_user'])){
    try{
    $sql = "INSERT INTO users (username, password, accountType) VALUES (:username, :password, :accountType)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':accountType', $accountType);


    $username = $_POST['username'];
    $password = $_POST['password'];
    $accountType = $_POST['accountType'];

    $stmt->execute();

    $_SESSION['message'] = "Insert Successful!";
    $_SESSION['msg_type'] = "success";
    header("location: ../maintain_insert.php");
    }
    catch(PDOException $e)
    {
    $_SESSION['message'] = "Error: " . $e->getMessage();
    $_SESSION['msg_type'] = "danger";
    header("location: ../maintain_insert.php");
    }
}

if(isset($_POST['btn_insert_plan'])){
    try{
    $sql = "INSERT INTO plans(startDate, duration, attraction_id1, attraction_id2, attraction_id3, transitFare, price)
    VALUES (:startDate, :duration, :attraction_id1, :attraction_id2, :attraction_id3, :transitFare, :price)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':startDate', $startDate);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':attraction_id1', $attraction_id1);
    $stmt->bindParam(':attraction_id2', $attraction_id2);
    $stmt->bindParam(':attraction_id3', $attraction_id3);
    $stmt->bindParam(':transitFare', $transitFare);
    $stmt->bindParam(':price', $price);

    $startDate = strtotime($_POST['startDate']);
    $startDate = date('Y-m-d',$startDate);
    $duration = $_POST['duration'];
    $attraction_id1 = $_POST['attraction_id1'];
    $attraction_id2 = $_POST['attraction_id2'];
    $attraction_id3 = $_POST['attraction_id3'];
    $transitFare = $_POST['transitFare'];
    $price = $_POST['price'];
    $stmt->execute();

    $_SESSION['message'] = "Insert Successful!";
    $_SESSION['msg_type'] = "success";
    header("location: ../maintain_insert.php");
    }
    catch(PDOException $e)
    {
    $_SESSION['message'] = "Error: " . $e->getMessage();
    $_SESSION['msg_type'] = "danger";
    header("location: ../maintain_insert.php");
    }
}

if(isset($_POST['btn_insert_review'])){
    try{
        echo "echo";
    }
    catch(PDOException $e)
    {
    $_SESSION['message'] = "Error: " . $e->getMessage();
    $_SESSION['msg_type'] = "danger";
    header("location: ../maintain_insert.php");
    }
}

    $conn = null;
?>
