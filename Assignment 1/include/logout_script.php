<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
  } else {
    session_destroy();
    header("Location: ../index.php");
  }
 ?>
