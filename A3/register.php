<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="icon/png" href="img/plane.png">
  <title>Travel Planner</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header" style="margin-top:1%;">
  	<h2>Register</h2>
  </div>

  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>" required>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" required>
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2" required>
  	</div>
    <div class="input-group">
   <label>Full Name</label>
    <input type="text" name="fullname" required>
    </div>
	 <div class="input-group">
	<label>Address</label>
	 <input type="text" name="address" required>
	 </div>
	 <div class="input-group">
	<label>Email</label>
    <label>
    <input type="text" name="email" required>
    </label>
	</div>
	<div class="input-group">
    <label>Phone Number</label>
	<label>
    <input type="tel" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
    </label>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
