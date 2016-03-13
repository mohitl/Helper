<?php
session_start(); 
?>
<?php
//connection to  database


include 'db_connect.php';


echo "show page";



 $action=$_POST["action"];
 
  
  
 
  if($action=="showcomment"){
  
     
     $sql="Select * from post_msg order by id desc";
 
   $result = $conn->query($sql);
	
       
     while($row = $result->fetch_assoc()){
        echo "<li><b>$row[email]</b> : $row[msg]</li>";
          
     }
  
  } 

  
$conn->close();
?>    
