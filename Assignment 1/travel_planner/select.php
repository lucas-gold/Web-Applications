<?php 
session_start();
include 'connection.php';

if(isset($_POST['btn_insert_user'])){
    $sql = "SELECT * FROM users (uid,username,password,accountType) VALUES (?,?,?,?)";

    if($stmt = $conn->prepare($sql)){
        //$stmt->bind_param("isss",$uid,$username,$password,$accountType);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $accountType = $_POST['accountType'];

    if($stmt->execute()){
        $_SESSION['message'] = "Insert Successful!";
        $_SESSION['msg_type'] = "success";
        header("location: ../maintain_select.php");
    }else{
        $_SESSION['message'] = "There was an error";
        $_SESSION['msg_type'] = "danger";
        header("location: ../maintain_select.php");
    }
}
    $conn = null;
?>