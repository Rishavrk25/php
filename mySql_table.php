<?php
    // Connecting to the Database
    $servername="localhost";
    $username="root";
    $password="";
    $database="dbharry";
    // Create a connection
    $conn=mysqli_connect($servername,$username,$password,$database);
    // Die if connection was not succesful
    if(!$conn){
        die("Sorry we failed to connect: ".mysqli_connect_error());
    }
    else{
        echo "Connection was succesful";
        echo "<br>";
    }

    // Create a Table
    // $sql="CREATE TABLE `trip` (`sno` INT(6) NOT NULL AUTO_INCREMENT, `name` VARCHAR(12) NOT NULL ,`dest` VARCHAR(6) NOT NULL , PRIMARY KEY(`sno`))";
    // $result=mysqli_query($conn,$sql);
    // if($result){
    //     echo "The table created successfully!";
    // }
    // else{
    //     echo "error --> ".mysqli_error($conn);
    // }

    // Insert into the Table
    $name="Vikrant";
    $destination="Russia";
    $sql="INSERT INTO `trip`(`name`, `dest`) values ('$name', '$destination')";
    $result=mysqli_query($conn,$sql);

    if($result){
        echo "Inserted successfully!";
    }
    else{
        echo "error --> ".mysqli_error($conn);
    }
    
?>