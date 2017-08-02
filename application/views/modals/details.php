<!-- Modal-->

<div class="modal fade" id="view" role="dialog">
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">
        <div class="container" style="background-color:white; width:auto; height: auto; size:50px;">

            <!-- Modal content-->
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><b>Item Details<b></h4>
            </div>
            <div class="modal-body" align="center">
                <form class="box-body" style="overflow-x:auto; width:auto; ">
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if($position === 'admin' || $position === 'custodian') {
                    echo '<form action="">'.
                         '<p class="display">Note: Only UNIQUE serial numbers will be saved.</p>'.
                         '<p class="display">Select desired items and input the serial here for multi-input:  </p>'.
                         '<form action="#">'.
                         '<input placeholder="serial number: xxxxxxxx" name="input"/>'.
                         '<input class = "btn btn-danger" type="reset" value="Reset" />';
                    }
                    ?>

                    <table id="details" class="table table-bordered table-striped" width="100%">
                        <thead>
                        <tr>
                    <?= $position = $this->session->userdata['logged_in']['position'];
                        if($position === 'custodian' || $position === 'receiver'){
                            echo '<th><input type="checkbox" name="select-all" ><label> Check all</label></th>';
                        }
                        ?>
                            <th>Serial #</th>
                            <th>Expiration Date</th>
                            <th>Supplier</th>
                            <th>Official Receipt #</th>
                            <th>Date Delivered</th>
                            <th>Date Received</th>
                            <th>Received By</th>
                            <th>Unit Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <?= $position = $this->session->userdata['logged_in']['position'];
                            if($position === 'custodian' || $position === 'receiver'){
                                echo '<th><input type="checkbox" name="select-all" ><label> Check all</label></th>';
                            }
                            ?>
                            <th>Serial #</th>
                            <th>Expiration Date</th>
                            <th>Supplier</th>
                            <th>Official Receipt #</th>
                            <th>Date Delivered</th>
                            <th>Date Received</th>
                            <th>Received By</th>
                            <th>Unit Cost</th>
                        </tr>
                        </tfoot>
                    </table>
                        <?php $position = $this->session->userdata['logged_in']['position'];
                        if($position === 'receiver') {
                            echo '<button type="button" class="open-modal-action" onclick="return_selected_items()" ">Return Selected Item(s)</button>';
                        }?>
                </form>
                </div>

            </div>
        </div>
    </div>
