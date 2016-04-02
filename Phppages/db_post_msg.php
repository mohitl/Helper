<?php
session_start(); 
?>
<?php
//connection to  database


include 'db_connect.php';





 $action=$_POST["action"];
 
 
  if( $action=="addcomment")
  {
 
   if(!empty($_POST['msg'])){
  
  

$em= $_SESSION['email'];
$ms=$_POST['msg'];


$sql = "INSERT INTO post_msg (email, msg)VALUES ('$em' , '$ms' )";

if ($conn->query($sql) === TRUE) {
    echo "<li><b>$em</b> : $ms</li>";
     echo "<li>";
          
          include "commentarea.php" ;
          echo "</li>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



}

}
elseif($action=="addcomment2")
{

if(!empty($_POST['msg1'])){
  
 

$em= $_SESSION['email'];
$ms=$_POST['msg1'];
$id=$_POST['p_id'];


$sql = "INSERT INTO comment_msg (comment , email, id)VALUES ('$ms' , '$em','$id')";

if ($conn->query($sql) === TRUE) {
    echo "<li><b>$em</b> : $ms</li>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



}
}

$conn->close();
?>    
