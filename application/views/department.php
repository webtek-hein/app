<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="overflow-x:auto; width:auto;">
                <div class="box-header">
                    <select class="selectdept" name="department" id="depts">
                        <option class="option" value="none"> Departments</option>
                        <?php /** @noinspection PhpUndefinedVariableInspection */
                        foreach ($departments as $dept): ?>
                            <option class="option" value="<?php echo $dept['dept_id'] ?>"><?php echo $dept['res_center_code'] . ' ' . $dept['department'] ?></option>
                        <?php endforeach; ?>
                    </select>


                    <div class="container" style="overflow-x:auto; width:auto;">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="department" class="table table-bordered table-striped" width="100%">
                                <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Account Code</th>
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
                                    <th>Account Code</th>
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

