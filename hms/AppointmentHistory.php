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
	<title> Appointment History</title>
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
         <h5>USER|APPOINTMENT HISTORY</h5>
             
                 <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item"><a href="AppointmentHistory.php">Appointment History </a></li>
        
    </ol>
		</div>
			<!-- start: BASIC EXAMPLE -->
			<div class="container-fluid container-fullw bg-white">
						

						<div class="row">
					<div class="col-md-12">
						
						
						<table class="table table-hover" id="sample-table-1">
							<thead>
								<tr>
									<th class="center">#</th>
									<th class="hidden-xs">Doctor Id</th>
									<th>Specialization</th>
									<th>Consultancy Fee</th>
									<th>Appointment Date / Time </th>
									<th>Appointment Creation Date  </th>
									<th>Current Status</th>
									<th>Action</th>
									
								</tr>
							</thead>
							<tbody>
					<?php
					$sql=mysqli_query($conn,"select * from appointment where userId='".$_SESSION['id']."'");
					$cnt=1;
					while($row=mysqli_fetch_array($sql))
					{
					?>

								<tr>
									<td class="center"><?php echo $cnt;?>.</td>
									<td class="hidden-xs"><?php echo $row['doctorId'];?></td>
									<td><?php echo $row['doctorSpecialization'];?></td>
									<td><?php echo $row['consultancyFees'];?></td>
									<td><?php echo $row['appointmentDate'];?> / <?php echo
									 $row['appointmentTime'];?>
									</td>
									<td><?php echo $row['postingDate'];?></td>
									<td>Active</td>
									<td>Cancel</td>
								
								</tr>
								
								<?php 
								$cnt=$cnt+1;
								 }?>
								
								
							</tbody>
						</table>
					</div>
				</div>
					</div>
			
			<!-- end: BASIC EXAMPLE -->
      </div>
    </div>
</div>

</body>
</html>