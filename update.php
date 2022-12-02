<?php
// require("db.php");
require("db.php");
$save=$_GET['updateid'];
// echo $save;
// $res=mysqli_query($db,"DELETE FROM students WHERE name='$save' ");
if (isset($_POST['submit'])){

    $name=$_POST['name'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $password="12345";
    $res=mysqli_query($db,"DELETE FROM students WHERE name='$save' ");
    $reg_query = "Insert into students (name,date,time,password) values ('$name', '$date', '$time','$password')";
    $reg_result = mysqli_query($db, $reg_query);
    // $res=mysqli_query($db,"UPDATE `students` SET name=$name,date=$date,time=$time,password=$password WHERE name='$save'");
    // $sql ="UPDATE `students` set name=$name,date=$date,time=$time WHERE name='$save'";
    echo $res;
    echo $reg_result;
    echo $save;
    echo $name;
    echo $date;
    echo $time;
}

?>






  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Housekeeper Student Login</title>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Custom Style -->
  <link rel="stylesheet" href="assets/css/main.min.css">

  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="favicon/site.webmanifest">
</head>
<body>
<div class="container-fluid  pb-6 m--10">
      <div class="row mt-2">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <h3 class="mb-0">Update Student</h3>
            </div>
            <div class="card-body pb-5">
              <form method="POST" autocomplete="off" >
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-id">Student name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="input-id" class="form-control" required placeholder="Enter student time">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-room">Date <span class="text-danger">*</span></label>
                        <input type="date" name="date" id="input-room" class="form-control" required placeholder="Ex : C202">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-time">Time <span class="text-danger">*</span></label>
                        <input type="time" name="time" id="input-time" class="form-control" required placeholder="Enter single digit no.">
                      </div>
                    </div>
                  </div>
                  <button name="submit" class="btn btn-icon btn-3 btn-primary" type="submit">
                    <span class="btn-inner--text">UPDATE</span>
                  </button>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <!-- Form -->
      

  </header>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>