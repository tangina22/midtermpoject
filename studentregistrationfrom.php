<html>
 <head>
 <title>Student Registration Form</title>
  <style type="text/css">
  	.error {color: #FF0000;}
  	
  </style>
</head>
 
<body>

<?php
    $username = $l_name=$password=$email= $mobile=$gender = $address = $applied = "";
	 $errusername = $errl_name=$errpassword=$erremail = $errmobile=$errgender = $erraddress = $errapplied = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["First_Name"])) {
    $errusername = "user name is required";
  } else {
    $username = test_input($_POST["First_Name"]); 
  }

    
   if (empty($_POST["password"])) {
    $errpassword = "password is required";
    } else {
    $password = test_input($_POST["password"]); 
   }
  
  if (empty($_POST["Email_Id"])) {
    $erremail= "Email is required";
  }
  else if (!filter_var($_POST["Email_Id"],FILTER_VALIDATE_EMAIL)) {
    $erremail= "Email is invalid";
  }  
  else {
    $email = test_input($_POST["Email_Id"]);
  }
    
  if (empty($_POST["Mobile_Number"])) {
    $errmobile = "Mobile No is required";
  } 
  else if (!is_numeric($_POST["Mobile_Number"])) {
    $errmobile = "Mobile No is not valid";
  } 
  else if(strlen($_POST["Mobile_Number"])<11 || strlen($_POST["Mobile_Number"])>=12){
  	 $errmobile = "please give 11 digit";
  }
  
  else {
    $mobile = test_input($_POST["Mobile_Number"]);
  }

  if (empty($_POST["Gender"])) {
    $errgender = "Gender is required";
  } else {
    $gender = test_input($_POST["Gender"]);
  }

  if (empty($_POST["Address"])) {
    $erraddress = "Addres is required";
  } else {
    $address = test_input($_POST["Address"]);
  }

  if (empty($_POST["applied"])) {
    $errapplied = "Addres is required";
  } else {
    $applied = test_input($_POST["applied"]);
  }

  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h3>STUDENT REGISTRATION FORM</h3>

 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<table align="center" cellpadding = "10">
 
<!----- First Name ---------------------------------------------------------->
<tr>
<td>User NAME</td>
<td><input type="text" name="First_Name" maxlength="30"/>
(max 30 characters a-z and A-Z)
</td>
<td>
  <span class="error">* <?php echo $errusername;?></span>
 </td>
</tr>
 
<!----- Last Name ---------------------------------------------------------->

 
<!----- Date Of Birth -------------------------------------------------------->

<tr>
<td>Password</td>
<td><input type="password" name="password" maxlength="30"/></td>
<td>
  <span class="error">* <?php echo $errpassword;?></span>
 </td>
</tr>
 
<!----- Email Id ---------------------------------------------------------->
<tr>
 <td>EMAIL ID</td>
 <td><input type="text" name="Email_Id" maxlength="100" /></td>
 <td>
  <span class="error">* <?php echo $erremail;?></span>
 </td>
</tr>
 
<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>MOBILE NUMBER</td>
<td>
<input type="text" name="Mobile_Number" maxlength="12" />
(11 digit number)
</td>
<td>
  <span class="error">* <?php echo $errmobile;?></span>
 </td>
</tr>
 
<!----- Gender ----------------------------------------------------------->
<tr>
<td>GENDER</td>
<td>
Male <input type="radio" name="Gender" value="Male" />
Female <input type="radio" name="Gender" value="Female" />
</td>
<td>
  <span class="error">* <?php echo $errgender;?></span>
 </td>
</tr>
 
<!----- Address ---------------------------------------------------------->
<tr>
<td>ADDRESS <br /><br /><br /></td>
<td><textarea name="Address" rows="4" cols="30"></textarea></td>
<td>
  <span class="error">* <?php echo $erraddress;?></span>
 </td>
</tr>
 
 
<!----- Course ---------------------------------------------------------->
<tr>
<td>COURSES<br />APPLIED FOR</td>
<td>
BCA
<input type="radio" name="applied" value="BCA">
B.Com
<input type="radio" name="applied" value="B.Com">
B.Sc
<input type="radio" name="applied" value="B.Sc">
B.A
<input type="radio" name="applied" value="B.A">
</td>
<td>
  <span class="error">* <?php echo $errapplied;?></span>
 </td>
</tr>
 
<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Submit">
</td>
</tr>
<tr>
<td colspan="2" align="center">
<a href="login.php">Login</a>
</td>
</tr>
</table>
 
</form>

<?php

echo "<h2>Your Input:</h2>";
echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $mobile;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $address;
echo "<br>";
echo $applied;

    $lines = file("Reg_Info.txt");
      $num = count($lines)+1; 
      $id = "P-".$num;
      
      $file = fopen("Reg_Info.txt", 'a');
      $str = $id."|".$username."|".$email."|".$password."|".$gender."|".$mobile."|".$address."|".$applied;
      fwrite($file,$str."\r\n");
      fclose($file);

?>
 
</body>
</html>