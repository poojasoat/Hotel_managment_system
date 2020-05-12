<?php
session_start();
//error_reporting(0);
include('include/connect.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$specilization=$_POST['Doctorspecialization'];
$doctorid=$_POST['doctor'];
$userid=$_SESSION['id'];
$fees=$_POST['fees'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];
$userstatus=1;
$docstatus=1;
$query=mysqli_query($conn,"insert into appointment(doctorSpecialization,doctorId,
userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
	if($query)
	{
		echo "<script>alert('Your appointment successfully booked');</script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Book Appointment</title>
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
         <h5>USER|BOOK APPOINTMENT</h5>
             
                 <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item"><a href="BookAppointment.php">Book Appointment</a></li>
        
                </ol>
        </div>  
        <div class="container mt-5" style="width:800px;">
  <form id="registration_form" method="POST" >
  <p class="text-danger"><?php if(isset($error)) echo $error;?> </P>
    <p class="text-success"><?php if(isset($success)) echo $success;?> </P>

        <p>Book Appointment</p>
        <div class="form-group">
        <label for="sel1">Doctor Specification</label>
        <select class="form-control" id="sel1" name="Doctorspecialization">
            <option >Select Specification</option>
            <option vale="homo">homo</option>
            <option value="cardo">Cardo</option>
            <option value="home1">homo1</option>
            <option value="cardo1">Cardo1</option>
        </select>
        </div>
        <div class="form-group">
        <label for="sel1">Doctors</label>
        <select class="form-control" id="sel1" name="doctor">
            <option>Select Doctor</option>
            <option value="Dr.Mishra">Dr.Mishra</option>
            <option value="Dr.Shah">Dr.Shah</option>
            <option value="Dr.Bhtra">Dr.Bhtra</option>
            <option value="Dr.Metha">Dr.Metha</option>
        </select>
        </div>
    <div class="form-group">
        <label>Consultancy Fees</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="city" placeholder="fees" name="fees">
        </div>

    </div>
    <div class="form-group">
        <label>Date</label>
        <div class="input-group mb-3">
            <input type="date" class="form-control" id="gender" placeholder="gender" name="appdate">
        </div>

    </div>
    <div class="form-group">
        <label>Time</label>
        <div class="input-group mb-3">
            <input type="time" class="form-control" id="username" placeholder="username" name="apptime">
        </div>

    </div>
    
<div class="text-left">
<button type="submit" class="btn btn-outline-primary" name="submit">Submit</button>

</button>
</div>

  </form>
</div>
  

      </div>
    </div>
</div>

</body>
</html>