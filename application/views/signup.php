<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

        <title>Sign Up</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/signup.css">
       
</head>
<body>

<h1><center> SIGN UP</center></h1>
		<?php echo validation_errors(); ?>
		<?php echo form_open('signup'); ?>
			<table border="0" width="500" align="center" class="table">
				<tr>
					<td>First Name</td>
					<td><input type="text" class="InputBox" name="FirstName" required="required" value="<?php echo isset($_POST["FirstName"]) ? $_POST["FirstName"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" class="InputBox" name="LastName" required="required" value="<?php echo isset($_POST["LastName"]) ? $_POST["LastName"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="InputBox" name="Email" required="required" value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Contact no.</td>
					<td><input type="text" class="InputBox" name="contactno" required="required" value="<?php echo isset($_POST["contactno"]) ? $_POST["contactno"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" class="InputBox" name="Username" required="required" value="<?php echo isset($_POST["Username"]) ? $_POST["Username"] : ''; ?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" class="InputBox" name="Password" value="" required="required"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" class="InputBox" name="confirm_password" value="" required="required"></td>
				</tr>
				<tr>
				<script>
					function test() {
    					if (document.getElementById('type').value == 'Department Head') {
        					document.getElementById('extra').style.display  = 'block';
    					} else {
        					document.getElementById('extra').style.display = 'none';
   						}
					}
				</script>
					<td>Position</td>
					<td>
						<select id="type" name="type"  onclick='test()'>
 						<option value="Warehouse Officer">Custodian</option>
					  <option value="Department Head">Department Head<a/option>
					  <option value="Admin">Admin</option>
 				</select>
					
				<tr>

				<td>Departments</td>
				<td>
					<select id="extra" name="department" style="display:none;">
    				<option class="option" value="NULL">Departments</option>
          				<?php foreach ($departments as $dept): ?>
                		<option class="option" value="<?php echo $dept['dept_id'] ?>"><?php echo $dept['res_center_code'] . ' ' . $dept['department'] ?></option>
          				<?php endforeach; ?>
					</select>
        		</td>
				</tr>
					</td>
				</tr>
				<tr>
					<td><a href="index.php" class="btn btn-primary btn-block btn-large" style="text-decoration: none">Cancel</a></td>
					<td><input type="submit" class="btn btn-primary btn-block btn-large" name="createaccount" value="Register" ></td>
				</tr>
				
			</table>
	</body>
</html>
