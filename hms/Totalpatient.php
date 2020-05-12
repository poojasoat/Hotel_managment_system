<?php
session_start();
include_once "connect.php";

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
	<title>Side Navigation Bar</title>
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
        <ul>
        <li><a href="Dashboard.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="BookAppointment.php"><i class="fas fa-user"></i>Book Appointment</a></li>
            <li><a href="AppointmentHistory.php"><i class="fas fa-address-card"></i>Appointment History</a></li>
        
        </ul> 
        
    </div>
    <div class="main_content">
        <div class="header text-right ">
        <div class="dropdown">
            <span>Hospital Managemant System</span>
    <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
    <i class="fas fa-user"></i><?php echo $username ?></button>

    </button>
    <div class="dropdown-menu bg-dark ">
    <a class="dropdown-item text-white" href="EditProfile.php">My Profile</a>
      <a class="dropdown-item text-white" href="Changepassword.php">Change Password</a>
          <a href="logout.php" class="dropdown-item  text-white">Logout</a>
    </div>
  </div>
            
        </div>  
        <div class="info">
         
        <div class="header2">
         <h5>ADMIN|MANAGE PATIENTS</h5>
             
                 <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#" class="text-dark">Manage <b>Patients</b></a></li>
        
    </ol>
        </div> 
        <table class="table table-responsive w-100 d-block d-md-table">                        
         <thead>
                         <tr>
                           <th>#</th>
                           <th>FullName</th>
                           <th>Address</th>
                           <th>City</th>
                           <th>Gender</th>
                           <th>Email</th>
                           <th>Updatation Date</th>
                           <th>Action</th>

                           </tr>
                        </thead>    
                        <?php  
                              
                              $query = "SELECT * FROM bookappointment "; 
                              $result = mysqli_query($conn, $query);  
                              while($row = mysqli_fetch_array($result))  
                              {  
                              ?>  
                              <tr class="text-center">
                              <td><?php echo $row["id"]; ?></td>
                               <td><?php echo $row["specification"]; ?></td>
                               <td><?php echo $row["doctors"]; ?></td>

                               <td>$<?php echo $row["fees"]; ?></td>
                               <td><?php echo $row["date"]; ?>  <?php echo $row["time"]; ?></td>
                                <td>Active</td>
                                <td><a href="Cancel.php?id=<?php echo $row["id"]; ?>" class="text-danger btn-xs ">Cancel</a></td>
                             </tr>
                             <?php  
                              }  
                             
                              ?>  
                     </table>
      </div>
    </div>
</div>

</body>
</html>