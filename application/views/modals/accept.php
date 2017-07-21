<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Confirm dialog example</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<!-- Modal dialog -->
	<div id="frmTest" tabindex="-1">
	    <!-- CUTTED -->
        <div id="step1" class="modal-footer">
		  <button type="button" class="glyphicon glyphicon-erase btn btn-default" id="btnDelete"> Button</button>
		</div>
	</div>

    <!-- Modal confirm -->
	<div class="modal" id="confirmModal" style="display: none; z-index: 1050;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body" id="confirmMessage">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="confirmOk">confirm</button>
		        	<button type="button" class="btn btn-default" id="confirmCancel">Cancel</button>
		        </div>
			</div>
		</div>
	</div>
</body>
<script>
    var YOUR_MESSAGE_STRING_CONST = "Your confirm message?";
      $('#btnDelete').on('click', function(e){
    		confirmDialog(YOUR_MESSAGE_STRING_CONST, function(){
    			//My code to delete
    		});
    	});

        function confirmDialog(message, onConfirm){
    	    var fClose = function(){
    			modal.modal("hide");
    	    };
    	    var modal = $("#confirmModal");
    	    modal.modal("show");
    	    $("#confirmMessage").empty().append(message);
    	    $("#confirmOk").one('click', onConfirm);
    	    $("#confirmOk").one('click', fClose);
    	    $("#confirmCancel").one("click", fClose);
        }
  </script>
</html>