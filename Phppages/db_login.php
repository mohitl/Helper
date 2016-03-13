<?php
//connection to  database
include 'db_connect.php';




  //starting the session for user profile page
if(!empty($_POST['email']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	$sql = "SELECT *  FROM signup where email = '$_POST[email]' AND passwd = '$_POST[pass]'" ;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if(!empty($row['email']) AND !empty($row['passwd']))
	{
		$_SESSION["email"] = $row['email'];
		echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE... " .$_SESSION["email"]. "ok";

	}
	else
	{
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	}
}





$conn->close();
?>   
