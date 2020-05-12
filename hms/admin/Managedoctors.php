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
            <li><a href="AdminDashboard.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
            <li><a href="BookAppointment.php"><i class="fas fa-user icon"></i>Doctors</a></li>
            <li><a href="BookAppointment.php"><i class="fas fa-user icon"></i>Patients</a></li>

            <li><a href="Patientdetails.php"><i class="fas fa-address-card icon"></i>Appointment History</a></li>
        
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
      <a class="dropdown-item text-white" href="Changeadminpassword.php">Change Password</a>
          <a href="logout.php" class="dropdown-item  text-white">Logout</a>
    </div>
  </div>
            
        </div>  
        <div class="info">
         
        <div class="header2">
         <h5>ADMIN|MANAGE DOCTOR</h5>
             
                 <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#" class="text-dark">Manage <b>Doctor</b></a></li>
        
    </ol>
        </div> 
        <table class="table table-responsive w-100 d-block d-md-table">                        
         <thead>
                         <tr class="text-center">
                           <th>#</th>
                           <th>Specification</th>
                           <th>Doctors Name</th>
                        
                           <th>Creation Date</th>
                           <!-- <th>Updation Date</th> -->
                           <th>Action</th>

                           </tr>
                        </thead>    
                        <?php  
                              
                            //    $query = "SELECT * FROM doctors "; 
                            $query="SELECT specification.specification,
                            specification.c_date, doctors.doctor_name,specification.spec_id 
                             FROM specification   
                              INNER JOIN doctors  
                               ON   specification.spec_id=doctors.doctor_id"; 
                              $result = mysqli_query($conn, $query);  
                              while($row = mysqli_fetch_array($result))  
                              {  
                              ?>  
                              <tr class="text-center">
                              <td><?php echo $row["spec_id"]; ?></td>
                               <td><?php echo $row["specification"]; ?></td>
                               <td><?php echo $row["doctor_name"]; ?></td>

                               <td><?php echo $row["c_date"]; ?>  </td>

                                <td><i class="fa fa-edit icon" ></i>
                                <a href="Cancel.php?id=<?php echo $row["id"]; ?>" class="text-danger btn-xs ">Cancel</a></td>
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