<html>
   <link rel="stylesheet" type="text/css" href="assets/css/forget.css">
<div class="container">

    <?php echo form_open('Forget/doforget'); ?>
    <form>
			<fieldset>
	          <legend>Reset password</legend>

				<div class="control-group">
					<label for="email"> Email</label>
					<input class="box" type="text" id="email" name="email" required="required"/>
				</div>
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
                <a href="<?php echo base_url() ?>signup" style="text-decoration:none">Click Here To Sign Up </a>

</fieldset>
</form>
</div>
</html>