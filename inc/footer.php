			<div class="app-wrapper-footer">
				<div class="app-footer">
					<div class="app-footer__inner">
						<div class="app-footer-left">
							<ul class="nav">
								<!-- <li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										Footer Link 1
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										Footer Link 2
									</a>
								</li> -->
							</ul>
						</div>
						<div class="app-footer-right">
							<ul class="nav">
								<!-- <li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										Footer Link 3
									</a>
								</li>
								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link">
										<div class="badge badge-success mr-1 ml-0">
											<small>NEW</small>
										</div>
										Footer Link 4
									</a>
								</li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Search Results From <?php echo getNameOrg($organizationId); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				Search Donees Record
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Ration Details From All Organizations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src='//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
</html>

<script>
$(document).ready(function(){

$('#index_search').submit(function(e){
	$('#show_data').html('<img src="assets/images/loader.gif" width="100" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?index_search="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   $('#show_data').html(responseData);
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
	   }
	});
	e.preventDefault();
});

$('#search_form').submit(function(e){
	$('#searchModal .modal-body').html('<img src="assets/images/loader.gif" width="100" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?search_form="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   $('#searchModal .modal-body').html(responseData);
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
	   }
	});
	e.preventDefault();
});

$('.ration_view').click(function(e){
	$('#rationModal .modal-body').html('<img src="assets/images/loader.gif" width="100" />');
	var id = $(this).data('id');
	$.ajax({
	   type : "post",
	   url :  "ajax.php?ration_view="+id,
	   data: id,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   $('#rationModal .modal-body').html(responseData);
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
	   }
	});
	e.preventDefault();
});

$('#login').submit(function(e){
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?login="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   console.log(responseData);
			if(responseData == "1") {
				window.location.href = dashboard_url;
			}
			else{
				$('#login .error').html(responseData);
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
	   }
	});
	e.preventDefault();
});

$('#forget_password').submit(function(e){
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?forget_password="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   $('#forget_password .error').html(responseData);
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
	   }
	});
	e.preventDefault();
});

$('#new_password').submit(function(e){
	$("#new_password .btn").attr('disabled','disabled');
	$('#new_password .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?new_password="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
			   	$('#new_password .error').html("Updated Succesfully");
				window.location.href = base_url;
			}
			else{
				$('#new_password .error').html(responseData);
				$("#new_password .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#new_password .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('#org_update').submit(function(e){
	$("#org_update .btn").attr('disabled','disabled');
	$('#org_update .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?org_update="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
			   	$('#org_update .error').html("Updated Succesfully");
				window.location.reload();
			}
			else{
				$('#org_update .error').html(responseData);
				$("#org_update .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#org_update .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('#info_update').submit(function(e){
	$("#info_update .btn").attr('disabled','disabled');
	$('#info_update .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?info_update="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
			   	$('#info_update .error').html("Updated Succesfully");
				window.location.reload();
			}
			else{
				$('#info_update .error').html(responseData);
				$("#info_update .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#info_update .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('#credential_update').submit(function(e){
	$("#credential_update .btn").attr('disabled','disabled');
	$('#credential_update .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?credential_update="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
			   	$('#credential_update .error').html("Updated Succesfully");
				window.location.reload();
			}
			else{
				$('#credential_update .error').html(responseData);
				$("#credential_update .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#credential_update .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('#donee_add').submit(function(e){
	$("#donee_add .btn").attr('disabled','disabled');
	$('#donee_add .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?donee_add="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
			   	$('#donee_add .error').html("Added Succesfully");
			}
			else{
				$('#donee_add .error').html(responseData);
				$("#donee_add .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#donee_add .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('#donee_edit').submit(function(e){
	$("#donee_edit .btn").attr('disabled','disabled');
	$('#donee_edit .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?donee_edit="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
			   	$('#donee_edit .error').html("Updated Succesfully");
				window.location.reload();
			}
			else{
				$('#donee_edit .error').html(responseData);
				$("#donee_edit .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#donee_edit .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('#donee_ration_add').submit(function(e){
	$("#donee_ration_add .btn").attr('disabled','disabled');
	$('#donee_ration_add .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?donee_ration_add="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
			   	$('#donee_ration_add .error').html("Added Succesfully");
				window.location.reload();
			}
			else{
				$('#donee_ration_add .error').html(responseData);
				$("#donee_ration_add .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#donee_ration_add .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('#ration_add').submit(function(e){
	$("#ration_add .btn").attr('disabled','disabled');
	$('#ration_add .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?ration_add="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
			   	$('#ration_add .error').html("Added Succesfully");
				window.location.href = 'ration_details.php';
			}
			else{
				$('#ration_add .error').html(responseData);
				$("#ration_add .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#ration_add .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('#donor_add').submit(function(e){
	$("#donor_add .btn").attr('disabled','disabled');
	$('#donor_add .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?donor_add="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
			   	$('#donor_add .error').html("Added Succesfully");
				window.location.href = 'donor_details.php';
			}
			else{
				$('#donor_add .error').html(responseData);
				$("#donor_add .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#donor_add .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('#user_add').submit(function(e){
	$("#user_add .btn").attr('disabled','disabled');
	$('#user_add .error').html('Please wait... <img src="assets/images/loading-circle.gif" width="16" />');
	var datastring = $(this).serialize();
	$.ajax({
	   type : "post",
	   url :  "ajax.php?user_add="+datastring,
	   data: datastring,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
		   if(responseData == "1") {
				$('#user_add .error').html("Added Succesfully");
				window.location.href = 'user_details.php';
			}
			else{
				$('#user_add .error').html(responseData);
				$("#user_add .btn").removeAttr('disabled');
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
			$("#user_add .btn").removeAttr('disabled');
	   }
	});
	e.preventDefault();
});

$('.updateInput').change(function(e){
	var data_save = [];
	data_save.push({ name: "table", value: $(this).data('table') });
    data_save.push({ name: "field", value: $(this).data('field') });
    data_save.push({ name: "where", value: $(this).data('where') });
    data_save.push({ name: "id", value: $(this).data('id') });
	data_save.push({ name: "val", value: $(this).val() });
	$.ajax({
	   type : "post",
	   url :  "ajax.php?updateInput=1",
	   data: data_save,
	   cache : false,
	   success : function(responseData,textStatus,jqXHR){
			if(responseData == "1") {
				console.log('success');
			}
			else{
				alert(responseData);
			}
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
	   }
	});

	//when updating the delivery status
	if($(this).data('table') == 'tbl_donees' && $(this).data('field') == 'delivery_status'){

	}

	//when updating ration details
	if($(this).data('field') == 'advance' || $(this).data('field') == 'balance'){
		id = $(this).data('id');
		advance = $('.advance'+id).val();
		balance = $('.balance'+id).val();
		total_cost = parseFloat(advance) + parseFloat(balance);
		$('.total_cost'+id).html(total_cost);

		var data_save = [];
		data_save.push({ name: "table", value: $(this).data('table') });
		data_save.push({ name: "field", value: 'total_cost' });
		data_save.push({ name: "where", value: $(this).data('where') });
		data_save.push({ name: "id", value: $(this).data('id') });
		data_save.push({ name: "val", value: total_cost });
		$.ajax({
			type : "post",
			url :  "ajax.php?updateInput=1",
			data: data_save,
			cache : false,
			success : function(responseData,textStatus,jqXHR){
				if(responseData == "1") {
					console.log('success');
				}
				else{
					alert(responseData);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	}
	e.preventDefault();
});

$('.advance, .balance').change(function(e){
	advance = $('.advance').val();
	balance = $('.balance').val();
	total_cost = $('.total_cost').val();

	if(advance == ''){
		advance = 0;
		$('.advance').val(0)
	}
	if(balance == ''){
		balance = 0;
		$('.balance').val(0)
	}
	
	$('.total_cost').val(parseFloat(advance) + parseFloat(balance));
});

$('#logout').click(function(e){
	$.ajax({
	   type : "post",
	   url :  "ajax.php?logout=1",
	   success : function(responseData,textStatus,jqXHR){
			window.location.href = base_url;
	   },
	   error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
	   }
	});
	e.preventDefault();
});

});
</script>

</body>
</html>