<!DOCTYPE html>
<html lang="en">
<head>

<style>
<?php include 'main.css'; ?>
</style>
<?php require 'connectDB.php' ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
 


 
</head>
<body>

<?php 

$medNum = $_POST['medNum'];




$sql = "SELECT * FROM Person WHERE med_num='$medNum'";
$result = $conn->query($sql);


echo "<h1>PERSONAL INFORMATION</h1>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>Med Number</th><th> First Name</th> <th>Last Name</th> <th>Date Of Birth</th> <th>Telephone</th> <th>Email</th> <th>Province</th> <th>City</th> <th> Postal Code</th><th> Address</th><th> Citizenship</th> </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["med_num"]. "</td><td>" . $row["firstName"]. "</td><td> " . $row["lastName"]. "</td><td>" . $row["DOB"]. "</td><td> " . $row["telephone"]. "</td><td>" .$row["email"]. "</td><td>" .$row["province"].  "</td><td>" .$row["city"]. "</td><td>" .$row["postalCode"].  "</td><td>" .$row["address"]. "</td><td>" .$row["citizenship"]. "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
?>
  <h1>TEST RESULTS</h1>
<?php
$sql = "SELECT * FROM Diagnostic WHERE Med_num='$medNum'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $covidResult = $row["testResult"];
    echo "Result submitted on ". $row["result_Date"] . "<br>";
    
      echo "Your test result is: ";
      if($covidResult =="1"){
        echo "POSITIVE<br>";
      }else{
        echo "NEGATIVE<br>";
      }

      echo "The test was conducted by WorkerID: ". $row["WorkerID"] . "<br>";
      
      echo "The test was conducted on: ". $row["test_Date"];
      
    }
  
  } else {
    echo "0 results";
  }
?>

  
</body>
</html>