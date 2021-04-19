<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
require("connectDB.php");
$medNum = $_SESSION['name'];
$sql = "SELECT * FROM Diagnostic WHERE Med_num=$medNum";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$covid = $row["testResult"];

function convertTest($covid)
{
    if ($covid == 1) {
        return "Positive";
    } else {return "Negative";}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin">
    <nav class="navtop">
        <div>
            <h1>COVID-19 Dashboard</h1>
            <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>
    <div class="content">
        <h2>Home Page</h2>
        <p>Welcome back, <?= $_SESSION['name'] ?>!</p>

        <?php


        echo "<p>Your test result is: " . convertTest($covid) . "</p>";

        if($covid=="1"){
            echo "<p>Follow-up Form 
            <br>
            Please check all the list of Symptoms:
            <br>
            
            Any other symptoms, please fill in the box.
            

            
            ";
        }
        ?>
      

    </div>
</body>

</html>