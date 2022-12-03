<?php 
  if (!isset($_SESSION['username'])) {
  	header("Location: alogin.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
    mysqli_close($db);
  	header("Location: alogin.php");
  }
  require("db.php");
  require("allotfunctions.php");

  $complaintcount = getComplantCount($db);
  $requestcount = getRequestCount($db);
  $suggestioncount = getSuggestionCount($db);
?>

<div class="header-body">
  <!-- Card stats -->
  
</div>