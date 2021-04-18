<?php 

    require("connectDB.php");
    $username = $_POST["username"];
    $password = $_POST["password"];

    
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  

    $sql = "SELECT * FROM Person where med_Num = '$username' and DOB = '$password'";
    $result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);; 
    
   
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    
    
    if($count == 1){  
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $username;
		$_SESSION['DOB'] = $password;
        $_SESSION['EMAIL'] = $row["email"];
        $_SESSION['FIRSTNAME'] = $row["firstName"];
        $_SESSION['LASTNAME'] = $row["lastName"];
        $_SESSION['TELEPHONE'] = $row["telephone"];
        $_SESSION['PROVINCE'] = $row["province"];
        $_SESSION['CITY'] = $row["city"];
        $_SESSION['POSTALCODE'] = $row["postalCode"];
        $_SESSION['ADDRESS'] = $row["address"];
        $_SESSION['CITIZEN'] = $row["citizenship"];
        header('Location: home.php');
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     
?>