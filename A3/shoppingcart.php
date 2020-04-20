<?php
session_start();
$conn = mysqli_connect('localhost','root','','travel_planner');
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn,"travel_planner");

$user = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = '$user'";
$result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_array($result)) {
    $fullname = $row["fullname"];
    $phone = $row["phone_number"];
    $address = $row["address"];
    $email = $row["email"];
  }
?>

<form name="cartForm" class="form-inline" action="#/paid">
  <div>
    <label>Full Name: </label>
    <input type="text" value="<?php echo $fullname?> " required>
    <label>Email: </label>
    <input type="text"  value="<?php echo $email?> " required>
    <label>Phone Number: </label>
    <input type="text" value="<?php echo $phone?> " required><br><br>
    <label>Address: </label>
    <input type="text" style = "width: 50%;" value="<?php echo $address?> " required>
    <label>Credit Card: </label>
    <input type="text" style = "width: 25%" name="cc"  pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}" placeholder = "1234 1234 1234 1234" required>
  </div><br>
  <button type="submit" class="btn btn-success" >
    Pay <span class="glyphicon glyphicon-usd"></span>
  </button>
</form>
<a href="index.php" class="btn btn-danger" style="margin-top: -7.7%; margin-left: 12%">Cancel</a>
