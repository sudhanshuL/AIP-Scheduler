<?php
session_start();
require("db.php");

// ================== Clean Request Handler =================== //
if (isset($_POST['allotSubmit']) && isset($_SESSION['username'])) {
  $reqId = mysqli_real_escape_string($db, $_POST['allotId']);
  $workerId = mysqli_real_escape_string($db, $_POST['workerId']);

  $allot_query = "Update cleanrequest set worker_id = '$workerId', req_status=1 where request_id = '$reqId'";
  $allot_result = mysqli_query($db, $allot_query);
  if ($allot_result) {
    $_SESSION['worker_alloted'] = "Housekeeper successfully alloted";
  } else {
    $_SESSION['allotment_failed'] = "Failed to allot worker, contact site management.";
  }
  header("Location: allot.php");
}

// Student Registration
// if(isset($_POST['regSubmit']) && isset($_SESSION['username'])){
//   $rollnumber = mysqli_real_escape_string($db, $_POST['regRoll']);
//   $roomnumber = mysqli_real_escape_string($db, $_POST['regRoom']);
//   $floornumber = mysqli_real_escape_string($db, $_POST['regFloor']);
//   $password = md5(12345);
//   $roomnumber = strtolower($roomnumber);
//   print "huhuhuhuhuhu"
//   $hostel_name = substr($_SESSION['username'], -1);
//   $reg_query = "Insert into student values ('$rollnumber', '$password', '$roomnumber', '$floornumber', '$hostel_name')";
//   $reg_result = mysqli_query($db, $reg_query);
//   if($reg_result){
//     $_SESSION['student_registered'] = 'Student with Rollnumber '. $rollnumber .' is Registered.';
//   } else{
//     $_SESSION['student_registered'] = 'Student is already Registered!';
//   }
//   header("Location: registerstudent.php");
// }

// Students Registration
if (isset($_POST['regSubmit']) && isset($_SESSION['username'])) {
  // alert("sdsamldaskdnakkndas");
  $name = mysqli_real_escape_string($db, $_POST['regStudent']);
  $date = mysqli_real_escape_string($db, $_POST['regDate']);
  $time = mysqli_real_escape_string($db, $_POST['regTime']);
  $password = mysqli_real_escape_string($db, $_POST['regPassword']);
  $teacher = mysqli_real_escape_string($db, $_POST['regTeacher']);
  $name = strtolower($name);
  print $name;
  print $date;
  $reg_query = "Insert into students (name,date,time,password,teacher) values ('$name', '$date', '$time','$password','$teacher')";

  // $hostel_name = substr($_SESSION['username'], -1);
  // $reg_query = "Insert into student values ('$rollnumber', '$password', '$roomnumber', '$floornumber', '$hostel_name')";
  $reg_result = mysqli_query($db, $reg_query);



  // $res=mysqli_query($db,"select * from teachers");
  // $res=mysqli_query($db,"select * from teachers");
  // $check=mysqli_num_rows($res);
  $res = mysqli_query($db, "select * from teachers order by time desc");
  $check = mysqli_num_rows($res);
  while ($row = mysqli_fetch_assoc($res)) {
    // echo $row;
    echo $row['time'];
    echo $row['time'];
    $save = $row['name'];
    $save1 = $row["time"] - 1;
    $save2=$row['password'];
    $res=mysqli_query($db,"DELETE FROM teachers WHERE name='$save' ");
    $reg_query = "Insert into teachers (name,time,password) values ('$save', '$save1','$save2')";
    $reg_result = mysqli_query($db, $reg_query);
    // $save2=$row["time"];
    // echo $save1;
    // $res = mysqli_query($db, "UPDATE teachers SET time=$save WHERE name='$save1'");
    // $check = mysqli_num_rows($res);
    // echo $check;



    break;
  }

  header("Location: registerstudent.php");
}


// Worker Registration
if (isset($_POST['regKeeperSubmit'])) {
  $name = mysqli_real_escape_string($db, $_POST['regStudent']);
  $date = mysqli_real_escape_string($db, $_POST['regDate']);
  $time = mysqli_real_escape_string($db, $_POST['regTime']);
  // $hostel_name = substr($_SESSION['username'], -1);

  $name = strtolower($name);

  $reg_query = "Insert into housekeeper (name, hostel, floor) values ('$name', '$date', '$time')";
  $reg_result = mysqli_query($db, $reg_query);
  if ($reg_result) {
    $_SESSION['worker_registered'] = 'New Housekeeper Registered.';
  } else {
    $_SESSION['worker_registered'] = 'Resistration Failed!';
  }
  header("Location: registerworker.php");
}

?>