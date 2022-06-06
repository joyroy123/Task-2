<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
	
</head>
<body>

	<?php 

	$firstname = $lastname = $gender = $email = $mobileno = $address1 = $country = "";

	$firstnameErrMsg = "";
	$lastnameErrmsg = "";
	$genderErrmsg = "";
	$emailErrmsg  = "";
	$mobilenoErrmsg  = "";
	$address1Errmsg  = "";
	$countryErrmsg  = "";

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test_input($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

		$firstname = test_input($_POST['firstname']);
		$lastname = test_input($_POST['lastname']);
		$gender = isset($_POST['gender']) ? test_input($_POST['gender']) : NULL;
		$email = test_input($_POST['email']);
		$mobileno = test_input($_POST['mobileno']);
		$address1 = test_input($_POST['address1']);
		$country = isset($_POST['country']) ? test_input($_POST['country']) : NULL;

		$message = "";
		if (empty($firstname)) {

			$firstnameErrMsg = "First Name is Empty";
		}
		else {
			if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
			

				$firstnameErrMsg = "Only letters and spaces";
			}
			
		}
		if (empty($lastname)) {
			$lastnameErrmsg = "Last Name is Empty";
			
		}
		else {
			if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
			

				$lastnameErrmsg = "Only letters and spaces";
			}
			
		}
		if (empty($gender)) {
			$genderErrmsg = "Gender not Selected";
			
		}
		
		
	 
		if (empty($email)) {
			$emailErrmsg = "Email is Empty";
			
		}
		else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErrmsg = "Please correct your email";
				
			}
		}
		if (empty($mobileno)) {
			$mobilenoErrmsg = "Mobileno is Empty";
			
		}
		else {
			if (!preg_replace('/[^0-9]/', '', $mobileno )) {
			

				$mobilenoErrmsg = "Only number";
			}
			
		}
		
		
		if (empty($address1)) {
			$address1Errmsg= "Street/House/Road is Empty";
			
		}
		if (!isset($country) or empty($country)) {
			$message .= "Country not Seletect";
			$message .= "<br>";
		}
		if ($message ==="") {
			echo "Registration Successful";
			
		}
		
		
		else{
			
			echo $massage;
		}

        }	
?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>General</legend>

			<label for="fname">First Name</label>
			<input type="text" name="firstname" id="fname" value="<?php echo $firstname; ?>">
			<span style="color: red"><?php echo $firstnameErrMsg; ?></span>

			<br><br>

			<label for="lname">Last Name</label>
			<input type="text" name="lastname" id="lname" value="<?php echo $lastname; ?>">
			<span style="color: red"><?php echo $lastnameErrmsg; ?></span>

			<br><br>

			<label>Gender</label>
			<input type="radio" name="gender" id="male"> 
			<label for="male">Male</label>
			<?php if (isset($gender) && $gender=="male") echo "checked";?>
			<input type="radio" name="gender" id="female">
			<label for="female">Female</label>
		    <?php if (isset($gender) && $gender=="female") echo "checked";?>
			<span style="color: red"><?php echo $genderErrmsg; ?></span>
			
			<br><br>

			<p id="filename">Group_08_19-40734-1_19-40234-1</p>


		</fieldset>

		<fieldset>
			<legend>Contact</legend>

			<label for="email">Email</label>
			<input type="email" name="email" id="email" value="<?php echo $email; ?>">
			<span style="color: red"><?php echo $emailErrmsg; ?></span>

			<br><br>

			<label for="mobileno">Mobile No</label>
			<input type="text" name="mobileno" id="mobileno" value="<?php echo $mobileno; ?>" >
			<span style="color: red"><?php echo $mobilenoErrmsg; ?></span>

			<br><br>

		</fieldset>

		<fieldset>
			<legend>Address</legend>

			<label for="address1">Street/House/Road</label >
			<input type="text" name="address1" id="address1" value="<?php echo $address1; ?>">
			<span style="color: red"><?php echo $address1Errmsg; ?></span>

			<br><br>

			<label for="country">Country</label>
			<select name="country" id="country" >
				<option value="bd">Bangladesh</option>
				<option value="usa">USA</option>
				<option value="india">INDIA</option>
			</select>

			<br><br>

		</fieldset>

		<input type="submit" name="submit" value="Register">
	</form>

</body>
</html>