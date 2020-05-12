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
         <h5>ADMIN|MANAGE PATIENTS</h5>
             
                 <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#" class="text-dark">Manage <b>Patients</b></a></li>
        
    </ol>
        </div> 
        <table class="table table-responsive w-100 d-block d-md-table">                        
         <thead>
                         <tr class="text-center">
                           <th>#</th>
                           <th>FullName</th>
                           <th>Address</th>
                           <th>City</th>
                           <th>Gender</th>
                           <th>Email</th>
                           <th>Creation Date</th>
                           <!-- <th>Updation Date</th> -->
                           <th>Action</th>

                           </tr>
                        </thead>    
                        <?php  
                              
                            //   $query = "SELECT * FROM signup "; 
                            $query="SELECT signup.patient_id,signup.address,signup.city,
                            signup.gender,signup.username, signup.firstname, bookappointment.date  FROM signup   
                                INNER JOIN bookappointment  
                                ON signup.patient_id = bookappointment.book_id"; 
                              $result = mysqli_query($conn, $query);  
                              while($row = mysqli_fetch_array($result))  
                              {  
                              ?>  
                              <tr class="text-center">
                              <td><?php echo $row["patient_id"]; ?></td>
                               <td><?php echo $row["firstname"]; ?></td>
                               <td><?php echo $row["address"]; ?></td>

                               <td><?php echo $row["city"]; ?></td>
                               <td><?php echo $row["gender"]; ?>  </td>
                               <td><?php echo $row["username"]; ?></td>
                               <td><?php echo $row["date"]; ?></td>

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