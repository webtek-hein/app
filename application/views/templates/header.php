<!DOCTYPE html>
<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $firstname = ($this->session->userdata['user_in']['firstname']);
    $lastname = ($this->session->userdata['user_in']['lastname']);
    $position = ($this->session->userdata['logged_in']['position']);
    $department = ($this->session->userdata['logged_in']['department']);
    $image = ($this->session->userdata['image_in']['image']);
} else {
    redirect("logout");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
    if($position === 'receiver' || $position == 'department head'){
        echo '<title>'. $department.'</title>';
    }else{
        echo '<title> GSO Inventory</title>';
    }
    ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-dialog.min.css">

    <!--modal css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/modal.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- datatables-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.css">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url() ?>assets/css/dept.css"/>
    <link rel="icon" href="<?php echo base_url() ?>assets/css/logo.png">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
             <?php
                if($position == 'department head'){
                    echo '<span class="logo-mini"><b>DH</b></span>';
                }else{
                    echo '<span class="logo-mini"><b>GSO</b></span>';
                }
             ?>   
            <!-- logo for regular state and mobile devices -->
             <?php
                if($position == 'department head'){
                    echo '<span class="logo-lg"><b>DH</b>Inventory</span>';
                }else{
                    echo '<span class="logo-lg"><b>GSO</b>Inventory</span>';
                }
             ?>   
            
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <a class='navbar-brand'>
                <span><?= $department ?></span>
            </a>
            
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!--<img src="<?php echo base_url() ?>assets/dist/img/admin.jpg" class="user-image" alt="User Image">-->
                            <span class="hidden-xs"><?= $firstname.' '.$lastname?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url() ?>images/<?= $image ?>" class="img-circle" alt="User Image">
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url()?>profile" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url()?>logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
    
                </ul>
            </div>
        </nav>
    </header>


    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url() ?>images/<?= $image ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= $position?></p>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>

                <li class="treeview">
                    <?php $position = str_replace(' ', '_', $position) ;

                    ?>

                    <a href="<?php echo base_url(). $position. '/' ?>dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="<?php echo base_url()?>inventory">
                        <i class="fa fa-book"></i> <span>Inventory</span>
                    </a>
                </li>


            <?php $position = $this->session->userdata['logged_in']['position'];
            if ($position === 'admin' || $position === 'custodian'){
                echo '<li class="treeview"><a href='.base_url().'department><i class="fa fa-building"></i>'.
                    '<span>Department</span></a></li><li class="treeview"><a href='.base_url().'returned><i class="fa fa-reply"></i>'.
                        '<span>Return</span></a></li>';
            }
                ?>
                


            <?php
            if ($position === 'admin') {

                echo '<li class="treeview" ><a href ='.base_url().'users> <i class="fa fa-user-plus" >'.
                     '</i > <span > Users</span ></a ></li >';
            }
            ?>
                <li class="treeview"><a href="#"><i class="fa fa-table"></i><span>Logs</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
            <?php

                           echo '<ul class="treeview-menu">';
                            if ($position === 'admin' || $position === 'custodian') {
                               echo '<li><a href=' . base_url() . 'increaselog><i class="fa fa-circle-o"></i> Increase</a></li>' .
                                '<li><a href=' . base_url() . 'decreaselog><i class="fa fa-circle-o"></i> Decrease</a></li>'.
                                '<li><a href=' . base_url() . 'editlog><i class="fa fa-circle-o"></i> Edit</a></li>';

                            }
                            echo '<li><a href=' . base_url() . 'returnlog><i class="fa fa-circle-o"></i> Return log</a></li>';
                            echo '</ul></li>';
            ?>



                <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content" id="main">
