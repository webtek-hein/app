<html>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/forget.css">
   <link rel="icon" href="<?php echo base_url() ?>assets/css/logo.png">
<div class="container">

    <?php echo form_open('Forget/doforget'); ?>
    <form>
			<fieldset>
	          <legend style="text-decoration:none; font-family:Calibri;">Reset password</legend>

				<div class="control-group">
					<label for="email" style="text-decoration:none; font-family:sans-serif;"> Email</label>
					<input class="box" type="text" id="email" name="email" required="required"/>
				</div>
                <br>
				<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="Reset" />
				</div>
                <?php
                echo "<div class='error_msg'>";
                if (isset($error_message)) {
                    echo $error_message;
                }elseif (isset($success_message)){
                    echo $success_message;
                }
                echo validation_errors();
                echo "</div>";
                ?>
                <a href="<?php echo base_url() ?>login" style="text-decoration:none; font-family:sans-serif;"><center>Sign In</center></a>
                <br>
                <a href="<?php echo base_url() ?>signup" style="text-decoration:none; font-family:sans-serif;"><center>Click Here To Sign Up</center> </a>


</fieldset>
</form>
</div>
</html>