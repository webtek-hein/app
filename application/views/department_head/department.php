
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url() ?>assets/css/dept.css"/>
<script src="<?php echo base_url() ?>assets/js/sort.js"></script>
<?php
    $username = ($this->session->userdata['logged_in']['username']);
    $firstname = ($this->session->userdata['logged_in']['firstname']);
    $lastname = ($this->session->userdata['logged_in']['lastname']);
    $position = ($this->session->userdata['logged_in']['position']);
    $department = ($this->session->userdata['logged_in']['department']);
    $dept_id = ($this->session->userdata['logged_in']['dept_id']);

?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="overflow-x:auto; width:auto;">
                <div class="box-header">
                    <select class="selectdept" name="department" id="depts">
                        <option class="option" value="none"> Departments</option>
                            <option class="option" value="<?php echo $dept_id?>"><?php echo $department?></option>
                    </select>


                    <div class="container" style="overflow-x:auto; width:auto;">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="department" class="table table-bordered table-striped" width="100%">
                                <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Item name</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>View Item Detail</th>
                                </tr>
                                </thead>
                                <tbody id="dept_refresh">
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Department</th>
                                    <th>Item name</th>
                                     <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>View Item Detail</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>

