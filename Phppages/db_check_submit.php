
<?php
// define variables and set to empty values


$nameErr = $emailErr = $genderErr  = $passwordErr = $matchErr="";
$name = $email = $gender  = $passwd = $re_passwd= $c_city= $n_city ="";



function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
   }
   


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

echo "insert data under function";

   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
     }
   }
  
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
     }
   }
    

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }


$passwd = test_input($_POST["password"]);
$c_city = test_input($_POST["c_city"]);
$n_city = test_input($_POST["n_city"]);


echo "$name $email  $gender   $passwd $c_city $n_city ";

//adding  to  submit form data

include 'db_submit.php';

}

?> 

