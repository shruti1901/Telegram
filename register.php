<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interview";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}

	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}
	}

	/* Validation to check if gender is selected */
	if(!isset($error_message)) {
	if(!isset($_POST["gender"])) {
	$error_message = " All Fields are required";
	}
	}

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($error_message)) {
		if(!isset($_POST["terms"])) {
		$error_message = "Accept Terms and Conditions to Register";
		}
	}

	if(!isset($error_message)) {
		
		$query = "INSERT INTO contestant (username, password, email, personal_question,branch,sem,phone_no,gender) VALUES
		('" . $_POST["username"] . "', '" .$_POST["password"] . "', '" . $_POST["email"] . "', '" . ($_POST["personal_question"]) . "', '" . $_POST["branch"] . "', '" . $_POST["sem"] . "', '" . $_POST["phone_no"] . "', '" . $_POST["gender"] . "')";
		$result = mysqli_multi_query($conn, $query) ;
	if($result){
		echo "New records created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
		if(!empty($result)) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
			unset($_POST);
		} else {
			$error_message = "Problem in registration. Try Again!";	
		}
	}
}
?>
<html>
<head>
<title>Registration Form</title>
<style>
body{
	width:610px;
	font-family:calibri;
}
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}
.demo-table {
	background: #d9eeff;
	width: 100%;
	border-spacing: initial;
	margin: 2px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 4px;
	padding: 20px 40px;
}
.demo-table td {
	padding: 15px 0px;
}
.demoInputBox {
	padding: 10px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
</style>
</head>
<body>
<form name="frmRegistration" method="post" action="">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>User Name</td>
<td><input type="text" class="demoInputBox" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="demoInputBox" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" class="demoInputBox" name="confirm_password" value="<?php if(isset($_POST['confirm_password'])) echo $_POST['confirm_password']; ?>"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" class="demoInputBox" name="email" value=""></td>
</tr>
<tr>
<td>Personal Question</td>
<td><input type="text" class="demoInputBox" name="personal_question" value=""></td>
</tr>
<tr>
<td>Branch</td>
<td><input type="text" class="demoInputBox" name="branch" value="<?php if(isset($_POST['branch'])) echo $_POST['branch']; ?>"></td>
</tr>
<tr>
<td>Semester</td>
<td><input type="text" class="demoInputBox" name="sem" value="<?php if(isset($_POST['sem'])) echo $_POST['sem']; ?>"></td>
</tr>
<tr>
<td>Phone number</td>
<td><input type="text" class="demoInputBox" name="phone_no" value="<?php if(isset($_POST['phone_no'])) echo $_POST['phone_no']; ?>"></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?>> Male
<input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?>> Female
</td>
</tr>
<tr>
<td colspan=2>
<input type="checkbox" name="terms"> I accept Terms and Conditions <input type="submit" name="register-user" value="Register" class="btnRegister"></td>
Already a member?  <a href="contestant.php" >Login
</tr>



</table>
</form>
</body></html>