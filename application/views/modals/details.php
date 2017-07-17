<!-- Modal-->
<div class="modal fade" id="view" role="dialog">
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">
        <div class="container" style="background-color:white; width:auto; height: auto; size:50px;">

            <!-- Modal content-->

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><b>Item Details<b></h4>
                <button onclick="myFunction()">Add Serial</button>

            </div>
            <div class="modal-body" align="center">

                <div class="box-body" style="overflow-x:auto; width:auto ">
                    <table id="details" class="table table-bordered table-striped" width="100%">
                        <thead>
                        <tr>
                            <th>Serial #</th>
                            <th>Expiration Date</th>
                            <th>Supplier</th>
                            <th>Description</th>
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
                            <th>Serial #</th>
                            <th>Expiration Date</th>
                            <th>Supplier</th>
                            <th>Description</th>
                            <th>Official Receipt #</th>
                            <th>Date Delivered</th>
                            <th>Date Received</th>
                            <th>Received By</th>
                            <th>Unit Cost</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <dialog id="myDialog">

        <div class="modal-body">
            <table border="0" width="500" align="center" class="table">
                <tr>
                    <td>Add Serial</td>
                    <td><input type="text"  class="InputBox" name="serial" value=""></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-default" id="save2">Save</button>
            <button type="button" class="btn btn-default" id="cancel2" data-dismiss="modal">Cancel</button>
        </div>

    </dialog>

    <script>
        function myFunction() {
            document.getElementById("myDialog").showModal();
        }
    </script>