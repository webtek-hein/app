<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

        <title>Sign Up</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel = "stylesheet" type = "text/css" href = "assets/css/signup.css" />
</head>
<body>
<h1><center> SIGN UP</center></h1>
		<?php echo validation_errors(); ?>
		<?php echo form_open('signup'); ?>
			<table align="center">
				<tr>
					<td>First Name</td>
					<td><input type="text" class="InputBox" name="FirstName" value="<?php echo isset($_POST["FirstName"]) ? $_POST["FirstName"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" class="InputBox" name="LastName" value="<?php echo isset($_POST["LastName"]) ? $_POST["LastName"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="InputBox" name="Email" value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Contact no.</td>
					<td><input type="text" class="InputBox" name="contactno" value="<?php echo isset($_POST["contactno"]) ? $_POST["contactno"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" class="InputBox" name="Username" value="<?php echo isset($_POST["Username"]) ? $_POST["Username"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="InputBox" name="Password" value=></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="InputBox" name="confirm_password" value=""></td>
				</tr>
				<tr>
				
					<td>Type</td>
					<td>
					<select>
					  <option value="Warehouse Officer">Custodian</option>
					  <option value="Department Head">Department Head</option>
					  <option value="Admin">Admin</option>
					</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-primary btn-block btn-large" name="cancel" value="Cancel" class="cancel"></td>
					<td><input type="submit" class="btn btn-primary btn-block btn-large" name="createaccount" value="Register" class="createaccount"></td>
				</tr>
			</table>
	</body>
</html>
