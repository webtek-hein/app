<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

        <title>Sign Up</title>
        <link rel="stylesheet" <?php echo base_url() ?>assets/js/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/signup.css">
       
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
					function select_dept() {
    					if (document.getElementById('type').value == 'department head' || document.getElementById('type').value == 'receiver') {
        					document.getElementById('dment').style.display  = 'block';
    					} else {
        					document.getElementById('dment').style.display = 'none';
   						}
					}
				</script>
					<td>Position</td>
					<td>
						<select id="type" name="type"  onclick='select_dept()'>
						<option selected="true" disabled>--Choose Position--</option>
 						<option value="custodian">Custodian</option>
					  	<option value="department head">Department Head</option>
					  	<option value="receiver">Receiver</option>
					    <option value="admin">Admin</option>
					    </select>
					 </td>
				</tr>	
				<tr>
				<td></td>
				<td>
					<select  id="dment" name="dment" style="display:none;">
						<option selected="true" disabled>--Choose Department--</option>
          				<?php foreach ($departments as $dept): ?>
                		<option value="<?php echo $dept['dept_id'] ?>"><?php echo $dept['res_center_code'] . ' ' . $dept['department'] ?></option>
          				<?php endforeach; ?>
					</select>
        		</td>
				</tr>
				<tr>
					<td><a href=index.php type="submit" class="btn btn-primary btn-block btn-large" name="cancel" value="Cancel" >Cancel</a></td>
					<td><input type="submit" class="btn btn-primary btn-block btn-large" name="createaccount" value="Register" ></td>
				</tr>
				
			</table>
	</body>
</html>
