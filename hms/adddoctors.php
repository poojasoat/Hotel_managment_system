
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
<?php
// error_reporting(0);

include "connect.php";
if (isset($_POST['add'])) {
   $doctor_spec=$_POST['doctor_spec'];
    $doctor_name=$_POST['doctor_name'];
    $doctor_address=$_POST['doctor_address'];
    $doctor_fee=$_POST['doctor_fee'];
    $doctor_no=$_POST['doctor_no'];
    $doctor_email=$_POST['doctor_email'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];
if(empty($doctor_spec)||empty($doctor_name)||empty($doctor_address)||empty($doctor_fee)||
empty($doctor_no)||empty($doctor_email)||empty($password)||empty($c_password)){
        $error="please fill the all field";
        
    }
    
    else{

    $result=mysqli_query($conn,"insert into doctors (doctor_spec,doctor_name,doctor_address,doctor_fee,doctor_no,doctor_email,password,c_password) 
    values('$doctor_spec','$doctor_name','$doctor_address','$doctor_fee','$doctor_no','$doctor_email','$password','$c_password')");
    $success="Record Added  successfully !";
  
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
              <li><a>Mange Doctors</a></li>

            </ul>
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
    <a class="dropdown-item text-white" href="EditProfile.php">My Profile</a>
      <a class="dropdown-item text-white" href="Changepassword.php">Change Password</a>
          <a href="logout.php" class="dropdown-item  text-white">Logout</a>
    </div>
  </div>
            
        </div>  
        <div class="info">
         
        <div class="header2">
         <h5>Add Doctor</h5>
             
                 <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="#">Add Doctor</a></li>
        
                </ol>
        </div>  
        <div class="container mt-5" style="width:800px;">
  <form id="registration_form" method="POST" class="pt-2">
  <p class="text-danger"><?php if(isset($error)) echo $error;?> </P>
    <p class="text-success"><?php if(isset($success)) echo $success;?> </P>

        <p>Add Doctor</p>
        <div class="form-group">
        <label for="sel1">Doctor Specification</label>
        <select class="form-control" id="sel1" name="doctor_spec">
            <option >Select Specification</option>
            <option vale="homo">homo</option>
            <option value="cardo">Cardo</option>
            <option value="home1">homo1</option>
            <option value="cardo1">Cardo1</option>
        </select>
        </div>
        <div class="form-group">
        <label for="sel1">Doctor Name</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="city" placeholder="Doctor Name" name="doctor_name">
        </div>
        </div>
    <div class="form-group">
        <label>Doctors Clinic Address</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="city" placeholder="Doctors Clinic Address" name="doctor_address">
        </div>

    </div>
    <div class="form-group">
        <label>Doctors Clinic Fees</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="city" placeholder="Doctors Clinic fees" name="doctor_fee">
        </div>

    </div>
    <div class="form-group">
        <label>Doctor Contact No</label>
        <div class="input-group mb-3">
            <input type="num" class="form-control" id="gender" placeholder="Doctors Contact No" name="doctor_no">
        </div>

    </div>
    <div class="form-group">
        <label>Doctors Email</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" placeholder="Doctors Email" name="doctor_email">
        </div>

    </div>
    <div class="form-group">
        <label>Password</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" placeholder="Password" name="password">
        </div>

    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" placeholder="Confirm Password" name="c_password">
        </div>

    </div>
    
<div class="text-left">
<button type="submit" class="btn btn-outline-primary" name="add">Submit</button>

</button>
</div>

  </form>
</div>
  

      </div>
    </div>
</div>

</body>
</html>