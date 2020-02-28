<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_planner";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['btn_selectTable']))

    $option = $_POST['selectTable'];

    if($option == "users"){
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Username</th><th>Password</th><th>Account Type</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td> ".$row["password"]."</td><td> ".$row["accountType"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

$conn->close();
?>