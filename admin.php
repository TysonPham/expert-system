<?php
session_start();
require("connectDB.php");

if(isset($_POST['submitGetUser'])){
    $medNum = $_POST['displayUser'];
    $sql = "SELECT * FROM Person where med_Num = '$medNum'";
    $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
    $field = mysqli_fetch_row($result);
    
}
//Add user not done
else if(isset($_POST['submitAddUser'])){
   $med = $_POST['addUserMednum'];
   $fname = $_POST['addUserfirstname']; 
   $lname = $_POST['addUserlastname'];
   $dob = $_POST['addUserdob'];
   $telephone = $_POST['addUsertelephone'];
    $email = $_POST['addUseremail']; 
   $province = $_POST['addUserprovince'];
   $address = $_POST['addUseraddress'];
   $first3chars = $_POST['addUserfirst3chars'];
   $last3chars = $_POST['addUserlast3chars'];
   $parent1 = $_POST['addUserfirstparentmed'];
   $parent2 = $_POST['addUsersecondparentmed'];
    
    
    
    $sqlAddPerson = "INSERT INTO Person VALUES('')";


}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="css/home.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>COVID-19 Dashboard</h1>
                <a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Get User</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
            <input type="text" name="displayUser" id="displayUser">
            <input type="submit" name="submitGetUser">
            </form>

            <h2>Add User</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
            <input type="text" name="addUserMednum" required>
            <input type="text" name="addUserfirstname" required>
            <input type="text" name="addUserlastname" required>
            <input type="text" name="addUserdob" required>
            <input type="text" name="addUsertelephone" required>
            <input type="text" name="addUseremail" required>
            <input type="text" name="addUserprovince" required>
            <input type="text" name="addUseraddress" required>
            <input type="text" name="addUserfirst3chars" required>
            <input type="text" name="addUserlast3chars" required>
            <input type="text" name="addUsercitizen" required>
            <input type="text" name="addUserfirstparentmed" required>
            <input type="text" name="addUsersecondparentmed" required>
            <input type="submit" name="submitAddUser" required>

            </form>

           <?php 
           for($x = 0; $x < 12; $x++ )
           echo($field[$x] . " "); ?>

			<div>

			
			</div>
		</div>
	</body>
</html>