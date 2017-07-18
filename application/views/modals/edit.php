                 <!-- Modal edit inventory-->
                <div class="modal fade" id="edit" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Inventory</h3>
                            </div>
                            <div class="modal-body form">
                                <form action="#" id="form" class="form-horizontal">
                                    <input type="hidden" value="" name="item_id"/>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Item Name</label>
                                            <div class="col-md-9">
                                                <input name="item_name"  placeholder="Item Name" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Description</label>
                                            <div class="col-md-9">
                                                <input name="desc" placeholder="Description" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Unit</label>
                                            <div class="col-md-9">
                                                <input name="unit" placeholder="Unit" class="form-control" type="text">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Quantity</label>
                                            <div class="col-md-9">
                                                <input name="qty" placeholder="Quantity" class="form-control" type="text">

                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


