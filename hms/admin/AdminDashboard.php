<?php
session_start();
include_once "include/connect.php";

if($_SESSION['is_login'])
{
     $username=$_SESSION['username'];
}
else{
    header("location:login.php");
}
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
    <div class="sidebar" id="sidebar">
        <h2 class="text-secondary">HMS</h2>
        <div class="toggle-btn" onClick="toggleSlidebar()">
          <span></span>
          <span></span>
          <span></span>

        </div>
        <ul>
            <li><a href="AdminDashboard.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
            <li data-toggle="collapse" data-target="#demo"><a href="#"><i class="fas fa-user icon"></i>Doctors<b class="fa fa-angle-down icon ml-5"></b></a>
           
            </li>
            <ul id="demo" class="collapse text-center"  >
              <li ><a href="adddoctors.php">Add Doctors</a></li>
              <li><a href="addspeicification.php">Add Specification</a></li>
              <li><a href="Managedoctors.php">Mange Doctors</a></li>

            </ul>
            <li data-toggle="collapse" data-target="#demo2"><a href="#"><i class="fas fa-user icon"></i>Patient<b class="fa fa-angle-down icon ml-5"></b></a>
           
           </li>
           <ul id="demo2" class="collapse text-center"  >
             <li><a href="Patientdetails.php">Mange Patient</a></li>

           </ul>

            <li><a href="AppointmentDetails.php"><i class="fas fa-address-card icon"></i>Appointment History</a></li>
        
        </ul> 
        
    </div>
    <div class="main_content">
        <div class="header text-right ">
        <div class="dropdown">
            <span>Hospital Management System</span>
    <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
    <i class="fas fa-user"></i><?php echo $username ?></button>
    <div class="dropdown-menu bg-dark ">
      <a class="dropdown-item text-white" href="Changeadminpassword.php">Change Password</a>
          <a href="logout.php" class="dropdown-item  text-white">Logout</a>
    </div>
  </div>
            
        </div>  
        <div class="info">
         
        <div class="header2">
         <h5>USER|Dashboard</h5>
             
                 <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="EditProfile.php">Admin Dashboard </a></li>
        
    </ol>
        </div> 
        <div class="container panel mt-5" >
            <div class="row">
                <div class="col-md-4 text-center">
                  <div class="card p-5">
                    <span><i class="fas fa-smile admin-icon"></i></span>
                   <h6 class="text-primary  text-center">Manage Patients</h6>
                   <?php
                   $result = mysqli_query($conn,"select count(1) FROM bookappointment");
                   $row = mysqli_fetch_array($result);
                   
                   $total = $row[0];
                  //  echo "Total rows: " . $total;
                   ?>
                    <a class=" btn bg-white text-primary " href="Patientdetails.php">Total Patient: [<?php echo $total ?>]</a>
                  
                </div>
                </div> 
                <div class="col-md-4 text-center">
                <div class="card p-5">
                  <span><i class="fa fa-stethoscope admin-icon"></i></span>
                <h6  class="text-primary  text-center">Manage Doctors</h6>
                <?php
                   $result = mysqli_query($conn,"select count(1) FROM doctors");
                   $row = mysqli_fetch_array($result);
                   
                   $total = $row[0];
                  //  echo "Total rows: " . $total;
                   ?>
                <a class=" btn bg-white text-primary text-center " href="Managedoctors.php">Total Doctors:[<?php echo $total ?>]</a>
              </div>
                </div> 
                <div class="col-md-4 text-center">
                <div class="card p-5">
                  <span><i class="fas fa-address-card admin-icon"></i></span>
                  <h6  class="text-primary  text-center"> Appointment</h6>
                    <a class=" btn bg-white text-primary text-center " href="BookAppointment.php">Total Appointment</a>
                </div>
                </div>   
            </div>
        </div> 
      </div>
    </div>
</div>
<!-- <script>
 function toggleSlidebar(){
document.getElementById("sidebar").classList.toggle('active');
 }

  </script> -->
</body>
</html>