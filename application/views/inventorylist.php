
<body>


<div class="container">
    <h1>Learn PHP CodeIgniter Framework with AJAX and Bootstrap</h1>
    </center>
    <h3>Book Store</h3>
    <br />

    <br />
    <br />
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Item id</th>


        </tr>
        </thead>
        <tbody>
        <?php foreach ($item as $item_record): ?>
            <tr>
                <td><?php echo $item_record['item_id']; ?></td>

<td>
                    <button class="btn btn-danger" onclick="edit_book(<?php echo $item_record['item_id']; ?>)"><i class="glyphicon glyphicon-remove"></i></button>


                </td>
            </tr>
        <?php endforeach; ?>



        </tbody>


    </table>

</div>

<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();

    } );

    function edit_book(id)
    {
     //   save_method = 'update';
     //   $('#example1')[0].reset(); // reset form on modals

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('admin/itemdet/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="item_id"]').val(data.item_id);


                $('#view').modal('show'); // show bootstrap modal when complete loaded
               // $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Book Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="book_id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Book ISBN</label>
                            <div class="col-md-9">
                                <input name="book_isbn" placeholder="Book ISBN" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Book Title</label>
                            <div class="col-md-9">
                                <input name="book_title" placeholder="Book_title" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Book Author</label>
                            <div class="col-md-9">
                                <input name="book_author" placeholder="Book Author" class="form-control" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Book Category</label>
                            <div class="col-md-9">
                                <input name="book_category" placeholder="Book Category" class="form-control" type="text">

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
<!-- End Bootstrap modal -->

</body>
</html>
