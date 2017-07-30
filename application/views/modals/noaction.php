<!-- Modal-->
<div class="modal fade" id="noaction" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <?php echo validation_errors(); ?>
        <?php echo form_open('/returned/no_action'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><b>No Action<b></h4>
            </div>
            <div class="modal-body" align="center">
                <input id="return-id" type="hidden" name="return_id" value="">
                <h4>Are you sure you want to ignore this entry?</h4>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-default" id="save1" value="Confirm">
                <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
