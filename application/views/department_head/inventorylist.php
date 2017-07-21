<?php
	$department = ($this->session->userdata['logged_in']['department']);
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box" style="overflow-x:auto; width:auto;">
                <div class="box-header">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Item name</th>
                            <th>Description</th>
                            <th> Quantity</th>
                            <th> Unit</th>
                            <th> View Item Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Item name</th>
                            <th>Description</th>
                            <th> Quantity</th>
                            <th> Unit</th>
                            <th> View Item Details</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


