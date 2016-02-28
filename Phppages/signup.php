<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}

input.iw {
    width: 40%;
    height: 10%
   }
input.iw[placeholder]
{
  font-family: "Times New Roman", Times, serif;
  line-height:30px;
  font-size:32px;
}

</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $usernameErr = $passwordErr = $matchErr="";
$name = $email = $gender = $username = $password = $re_password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

   
    <input class="iw" type="text" name="name" Placeholder=NAME value="<?php echo $name;?>"  >
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
    <input class="iw" type="email" name="email" Placeholder=EMAIL value="<?php echo $email;?>" required>
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
    <input class="iw" type="text" name="username" Placeholder="USER NAME" value="<?php echo $username;?>" required>
   <span class="error">* <?php echo $usernameErr;?></span>
   <br><br>
    <input class="iw" type="password" name="password" Placeholder=PASSWORD value="<?php echo $password;?>" required>
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
   <input class="iw" type="password" name="re_password" Placeholder=RE-PASSWORD value="<?php echo $re_password;?>" required>
   <span class="error">* <?php echo $matchErr;?></span>
   <br><br>
   <input class="iw" type="text" name="c_city" Placeholder="CURRENT CITY" required>
   <br><br>
   <input class="iw" type="text" name="n_city" Placeholder="NATIVE CITY" required>
   <br><br>
   </div>
   Gender:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit">
   
</form>

</body>
</html>