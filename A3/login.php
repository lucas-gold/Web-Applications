<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="icon/png" href="img/plane.png">
  <title>Travel Planner</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
      <center>You must be signed in to use the website.<br><br></center>
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>



</body>
</html>
