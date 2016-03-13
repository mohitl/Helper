<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

   
    <input class="iw" type="text" name="name" Placeholder=NAME value="<?php echo $name;?>"  >
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
    <input class="iw" type="email" name="email" Placeholder=EMAIL value="<?php echo $email;?>" required>
   <span class="error">* <?php echo $emailErr;?></span>
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