<?php 
  if (!isset($_SESSION['rollnumber'])) {
  	header("Location: login.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['rollnumber']);
    session_destroy();
    mysqli_close($db);
  	header("Location: login.php");
  }
  require("db.php");
  require('studentfunctions.php');
  $requestCount = getRequestCount($_SESSION['rollnumber'], $db);
  $complaintCount = getComplantCount($_SESSION['rollnumber'], $db);
  $suggestionCount = getSuggestionCount($_SESSION['rollnumber'], $db);
?>
<div class="header-body">
  <!-- Card stats -->
  
</div>