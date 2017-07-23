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
                    <form action="">
                        <p class="display">The value of the text input is: </p>

                        <form action="#">
                            <input name="input" type="number" />
                            <input type="reset" value="Reset" />
                        </form>
                    <table id="details" class="table table-bordered table-striped" width="100%">
                        <thead>
                        <tr>
                            <th></th>
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
                            <th></th>
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
