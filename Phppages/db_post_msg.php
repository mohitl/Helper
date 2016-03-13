<?php
session_start(); 
?>
<?php
//connection to  database


include 'db_connect.php';






 $action=$_POST["action"];
 
  
  
 
   if(!empty($_POST['msg'])){
  
  

$em= $_SESSION['email'];
$ms=$_POST['msg'];


$sql = "INSERT INTO post_msg (email, msg)VALUES ('$em' , '$ms' )";

if ($conn->query($sql) === TRUE) {
    echo "<li><b>$em</b> : $ms</li>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



}



$conn->close();
?>    
