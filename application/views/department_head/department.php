<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url() ?>assets/css/dept.css"/>
<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $firstname = ($this->session->userdata['logged_in']['firstname']);
    $lastname = ($this->session->userdata['logged_in']['lastname']);
    $position = ($this->session->userdata['logged_in']['position']);
} else {
    header("location: login");
}
?>
<script src="<?php echo base_url() ?>assets/js/sort.js"></script>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="overflow-x:auto; width:auto;">
                <div class="box-header">


                    <select class="selectdept" name="department" id="depts">
                        <option class="option" value="none">Departments</option>
                        <span class="hidden-xs"><?= $firstname.' '.$lastname?></span>
                    </select>
                    <button type= "button" class="btn btn-success" onclick="summary()">Summary of Items</button>

                    <div class="container" style="overflow-x:auto; width:auto;">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="department" class="table table-bordered table-striped" width="100%">
                                <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Item name</th>
                                    <th>Account Code</th>
                                    <th>Official Receipt</th>
                                    <th>Delivery Date</th>
                                    <th>Date received</th>
                                    <th>Received by </th>
                                    <th>Cost</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="dept_refresh">
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Department</th>
                                    <th>Item name</th>
                                    <th>Account Code</th>
                                    <th>Official Receipt</th>
                                    <th>Delivery Date</th>
                                    <th>Date received</th>
                                    <th>Received by </th>
                                    <th>Cost</th>
                                    <th>Action</th>
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

