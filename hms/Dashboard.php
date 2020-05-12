<?php
session_start();
//error_reporting(0);
include('include/connect.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="css/style.css"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar">
    <h2 class="text-secondary">HMS</h2>
        <div class="toggle-btn" onClick="toggleSlidebar()">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <ul>
            <li><a href="Dashboard.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
            <li><a href="BookAppointment.php"><i class="fas fa-user icon"></i>Book Appointment</a></li>
            <li><a href="AppointmentHistory.php"><i class="fas fa-address-card icon"></i>Appointment History</a></li>
        
        </ul>
</div>
    <div class="main_content">
        <div class="header text-right ">
        <div class="dropdown">
            <span>Hospital Managemant System</span>
                <span type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                  <?php $query=mysqli_query($conn,"select fullName from users where id='".$_SESSION['id']."'");
                    while($row=mysqli_fetch_array($query))
                    {
                      echo $row['fullName'];
                    }
                  ?>
    <i class="fas fa-user"></i></span>
    <div class="dropdown-menu bg-dark ">
      <a class="dropdown-item text-white" href="EditProfile.php">My Profile</a>
      <a class="dropdown-item text-white" href="Changepassword.php">Change Password</a>
          <a href="logout.php" class="dropdown-item  text-white">Logout</a>
    </div>
  </div>
            
        </div>  
        <div class="info">
          <div class="header2">
             <h5>USER|Dashboard</h5>
              <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item"><a href="Dashboard.php">User Dashboard </a></li>
            </ol>
        </div> 
        <div class="container panel mt-5" >
            <div class="row">
                <div class="col-md-4 text-center">
                  <div class="card p-5">
                    <span><i class="fas fa-user icon admin-icon"></i></span>
                   <h6 class="text-primary  text-center">My Profile</h6>
                    <a class=" btn bg-white text-primary " href="EditProfile.php">Update Profile</a>
                </div>
                </div> 
                <div class="col-md-4 text-center">
                <div class="card p-5">
                  <span><i class="fas fa-blog icon admin-icon"></i></span>
                <h6  class="text-primary  text-center">My Appointment</h6>
                <a class=" btn bg-white text-primary text-center " href="AppointmentHistory.php">View Appointment History</a>
              </div>
                </div> 
                <div class="col-md-4 text-center">
                <div class="card p-5">
                  <span><i class="fas fa-address-card admin-icon"></i></span>
                  <h6  class="text-primary  text-center">Book My Appointment</h6>
                    <a class=" btn bg-white text-primary text-center " href="BookAppointment.php">Book Appointment</a>
                </div>
                </div>   
            </div>
        </div> 
      </div>
    </div>
</div>

</body>
</html>