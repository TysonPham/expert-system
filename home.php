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
$symptoms = "SHOW COLUMNS FROM Symptoms";
$symptomsResult = mysqli_query($conn, $symptoms);
$symptomsRow =  mysqli_fetch_array($symptomsResult, MYSQLI_ASSOC);
$symptomsCount = mysqli_num_rows($symptomsResult);

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

        


        <?php echo "<p>Your test result is: " . convertTest($covid) . "</p>"; ?>

        <?php
        if($covid=="1"){?>
    
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h3> Follow-up Form </h3> 
            <p>Please check all the list of Symptoms: </p>

            <?php for($x = 1; $x < $symptomsCount; $x++){ 
                
                $symptomName = mysqli_fetch_row($symptomsResult)[0]; 
                
                ?>
                <label> <?php echo $symptomName;?> </label>
                <input type="checkbox" name="fname[]" value= <?php echo $symptomName?>; > <br/>
            
            <?php } ?>

            <input type="submit" name="submit" value ="Submit Form" >
            
            <input type="text" name="text1" value ="Submit Form" >

        </form>

        <?php if($_SERVER["REQUEST_METHOD"] == "POST") { 
            $name = $_POST['fname[]']; 
}       ?>
    
      <?php  } ?>
    
      

    </div>
</body>

</html>