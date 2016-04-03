<?php
session_start(); 
?>

<html>
<head>
</head>
<body>

<?php
//connection to  database


include 'db_connect.php';


echo "show page";



 $action=$_POST["action"];
 
  
  
 
  if($action=="showcomment"){
  
   
     $sql="Select * from post_msg order by id desc";
 
   $result = $conn->query($sql);
	
       $stack = array();
       $comm_on_post_stack = array();
     while($row = $result->fetch_assoc()){
                   
                 
               
               array_push($stack, "$row[id]" );
               
               $id_for_comm="p_"."$row[id]";
               
               echo "<div id=$id_for_comm>";
               
        echo "<li><b>$row[email]</b> : $row[msg]</li>";
       
       
        $c_sql="Select * from comment_msg where id = '$row[id]' ";
        
        $c_result = $conn->query($c_sql);
        $i=0;
        while($c_row = $c_result->fetch_assoc()){
        $i++;
        echo "<li><b>$c_row[email]</b> : $c_row[comment]</li>";
        }
        array_push($comm_on_post_stack, $i );
        
        $_SESSION["post_comment_no"] = $comm_on_post_stack;
         $_SESSION["post_post_no"] = $stack;
          print_r($_SESSION["post_comment_no"]);
        print_r($_SESSION["post_post_no"]);
        echo "</div>";
        
       
        
          echo "<li>";
         
          include "commentarea.php" ;
          
          echo "</li>";
         
              
     }
     
   $_SESSION["post_msg_no"] =count($stack) ;
  } 
 elseif($action="addcomment2") //to show post msgs updated by  other including  comment
 {
  echo "<div id=comm>";
  
     $sql="Select * from post_msg";
 
   $result = $conn->query($sql);
	
       $stack1 = array();
     while($row = $result->fetch_assoc()){
     
                 
               
               array_push($stack1, "$row[id]");
         
              
     }
     
     //if post and comment increased in  3 secs
     if($_SESSION["post_msg_no"]!=count($stack1))
     {
     
       
      for($d=$_SESSION["post_msg_no"];$d<count($stack1);$d++)
      {
      
         echo  $stack1[$d];
      $sql="Select * from post_msg where id = '$stack1[$d]' ";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      
        echo "<li><b>$row[email]</b> : $row[msg]</li>";
      $c_sql="Select * from comment_msg where id = '$d' ";
        
        $c_result = $conn->query($c_sql);
        while($c_row = $c_result->fetch_assoc()){
        
        echo "<li><b>$c_row[email]</b> : $c_row[comment]</li>";
        }
      }
        $_SESSION["post_msg_no"] =count($stack1) ;
     }
     
     
     
     
     
     
     
   echo "</div>";
   }
   
   
$conn->close();
?>    


</body>
</html>