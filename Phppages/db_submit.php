<?php

//connection to  database
include 'db_connect.php';

$sql = "INSERT INTO signup (name, email, passwd, c_city, n_city, gender)
VALUES ('$name', '$email' ,   '$passwd', '$c_city', '$n_city' ,'$gender' )";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>  
