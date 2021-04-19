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
            <input type="text" name="addUserMednum" >
            <input type="text" name="addUserfirstname">
            <input type="text" name="addUserlastname" >
            <input type="text" name="addUserdob" >
            <input type="text" name="addUsertelephone">
            <input type="text" name="addUseremail">
            <input type="text" name="addUserprovince">
            <input type="text" name="addUseraddress">
            <input type="text" name="addUserfirst3chars">
            <input type="text" name="addUserlast3chars">
            <input type="text" name="addUsercitizen">
            <input type="text" name="addUserfirstparentmed">
            <input type="text" name="addUsersecondparentmed">
            <input type="submit" name="submitAddUser">

            </form>

           <?php 
           for($x = 0; $x < 12; $x++ )
           echo($field[$x] . " "); ?>

			<div>

			
			</div>
		</div>
	</body>
</html>