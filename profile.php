<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
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
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
                <tr>
						<td>First Name:</td>
						<td><?=$_SESSION['FIRSTNAME']?></td>
					</tr>
                    <tr>
						<td>Last Name:</td>
						<td><?=$_SESSION['LASTNAME']?></td>
					</tr>
					<tr>
						<td>Medical Number:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Date of Birth:</td>
						<td><?=$_SESSION['DOB']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['EMAIL']?></td>
                        
					</tr>
                    <tr>
						<td>Telephone:</td>
						<td><?=$_SESSION['TELEPHONE']?></td>
					</tr>
                    <tr>
						<td>City:</td>
						<td><?=$_SESSION['CITY']?></td>
                        <tr>
						<td>Province:</td>
						<td><?=$_SESSION['PROVINCE']?></td>
                        <tr>
						<td>Postal Code:</td>
						<td><?=$_SESSION['POSTALCODE']?></td>
                        <tr>
						<td>Address:</td>
						<td><?=$_SESSION['ADDRESS']?></td>
                        <tr>
						<td>Citizenship:</td>
						<td><?=$_SESSION['CITIZEN']?></td>
					</tr>
					</tr>
					</tr>
					</tr>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>