<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

    //  header("location: http://localhost/login/index.php/user_authentication/user_login_process");
}
?>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/login.css">
   
</head>
<body>
<?php
if (isset($logout_message)) {
    echo "<div class='message'>";
    echo $logout_message;
    echo "</div>";
}
?>
<?php
if (isset($message_display)) {
    echo "<div class='message'>";
    echo $message_display;
    echo "</div>";
}
?>
<?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
<div id="main">
    <div id="login">
        <h1>Login</h1>
        <?php echo form_open('Login/user_login_process'); ?>
        <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
            echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
        ?>
        <input type="text" name="username" id="name" placeholder="username" required="required"/>
        <input type="password" name="password" id="password" placeholder="password" required="required"/>
        <input type="submit" class="btn btn-primary btn-block btn-large" value=" Login " name="submit"/><br />
        <a href="<?php echo base_url() ?>signup" style="text-decoration:none">To SignUp Click Here</a>
        <?php echo form_close(); ?>
    </div>
</div>
</body>
</html>

