<?php 
  require("db.php");
  session_start();
  if (isset($_POST['submit'])){
    
    $name=$_POST['regName'];
    $time=$_POST['regTime'];
    
    $reg_query = "Insert into teachers (name,time) values ('$name', '$time')";
    $reg_result = mysqli_query($db, $reg_query);

  }
  if (!isset($_SESSION['username'])) {
  	header("Location: alogin.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
  	header("Location: alogin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register HouseKeeper - Housekeeper Admin Dashboard</title>
  <?php require("meta.php"); ?>
</head>
<body>
  <!-- Side Navigation -->
  <?php require("allotsidenav.php"); ?>
  <!-- Main content -->
  <div class="main-content">
      <!-- Header -->
      <div class="header bg-background pb-6 pt-5 pt-md-6">
      <div class="container-fluid">
        <!-- notification message -->
        <?php if (isset($_SESSION['worker_registered'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['worker_registered']; unset($_SESSION['worker_registered']); ?>
          </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>
        <?php require("allotheader.php"); ?>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--5 pb-6">
      <div class="row mt-2">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <h3 class="mb-0">Register New </h3>
            </div>
            <div class="card-body pb-5">
              <form method="POST" autocomplete="off">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-id">Faculty Name <span class="text-danger">*</span></label>
                        <input type="text" name="regName" id="input-id" class="form-control" required placeholder="Faculty Name">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-room">Total Time<span class="text-danger">*</span></label>
                        <input type="number" name="regTime" id="input-room" class="form-control" required placeholder="Enter numeric value">
                      </div>
                    </div>
                  </div>
                  <button name="submit" class="btn btn-icon btn-3 btn-primary" type="submit">
                    <span class="btn-inner--text">Register</span>
                  </button>
                  <br>
                  <br>
                  <br>
                  <span class="btn-inner--text">All Faculty Listed Below</span>
                </div>
              </form>
              <tbody>
              <?php
                $res=mysqli_query($db,"select * from teachers");
                $check=mysqli_num_rows($res);
                while ($row=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['time'];?></td>
                  
                 <td><a href="deletet.php?deleteid=<?php echo $row['name'];?>">DELETE</a></td>
                 <br>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/argon.min.js"></script>
</body>
</html>
