<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

        <title>Inventory</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<h2><center> SIGN UP</center></h2>
		<form name="signupform" method="post" action="">
			<table border="0" width="500" align="center" class="table">
				<tr>
					<td>First Name</td>
					<td><input type="text" class="InputBox" name="FirstName" value=""></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" class="InputBox" name="LastName" value=""></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="InputBox" name="Email" value=""></td>
				</tr>
				<tr>
					<td>Contact no.</td>
					<td><input type="text" class="InputBox" name="contactno" value=""></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" class="InputBox" name="Username" value=""></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="InputBox" name="Password" value=""></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="InputBox" name="confirm_password" value=""></td>
				</tr>
				<tr>

					<td>Type</td>
					<td>
					<select class="type" name="type">
					  <option value="default"></option>
					  <option value="Departent Head">Departent Head</option>
					  <option value="Admin">Admin</option>
					  <option value="Warehouse Officer">Custodian</option>
					</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" name="cancel" value="Cancel" class="cancel"></td>
					<td><input type="submit" name="createaccount" value="Register" class="createaccount"></td>
				</tr>
				
			</table>
		</form>
	</body>
</html>
