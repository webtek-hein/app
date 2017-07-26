<!-- Modal-->
<div class="modal fade" id="deactivate" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <?php echo validation_errors(); ?>
        <?php echo form_open('users/deactivate'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><b>Deactivate Account?<b></h4>
            </div>
            <div class="modal-body" align="center">
                <input id="user-id" type="hidden" name="user_id" value="">
                <h4></h4>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" id="save1" >Confirm</button>
                <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
