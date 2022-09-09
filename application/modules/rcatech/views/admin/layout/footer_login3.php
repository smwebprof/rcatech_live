<!--begin::Content footer for mobile-->
					<div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
						<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2022 RCAinet</div>
						<div class="d-flex order-1 order-sm-2 my-2">
							<a href="#" class="text-dark-75 text-hover-primary">Privacy</a>
							<!--<a href="#" class="text-dark-75 text-hover-primary ml-4">Legal</a>-->
							<a href="#" class="text-dark-75 text-hover-primary ml-4">Contact</a>
						</div>
					</div>
					<!--end::Content footer for mobile-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="<?php echo ASSETS_PATH; ?>newsample/plugins.bundle.js"></script>
		<script src="<?php echo ASSETS_PATH; ?>newsample/prismjs.bundle.js"></script>
		<script src="<?php echo ASSETS_PATH; ?>newsample/scripts.bundle.js"></script>
		<!--<script src="./newsample/engage_code.js"></script>-->
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="<?php echo ASSETS_PATH; ?>newsample/login-general.js"></script>
		<!--end::Page Scripts-->
	
	<!--end::Body-->

<script>
		jQuery(document).ready(function() {     
		  //App.init();
		  //Login.init();

		  $('#username').change(function(){
		  	var emp_id = $('#username').val();
		  	var comp_id = 1;
		  	//alert(emp_id);

		  	if(emp_id != '')
  			    {
  				 	$.ajax({
					'url' : '<?php echo BASE_PATH; ?>login/fetch_branch_user',
					'type': 'post',
					'data' : { id : emp_id},
					'success' : function(data)
					{
					  //alert(data);
					  $('#branchname').html(data);
					} 
					});

					$.ajax({
					'url' : '<?php echo BASE_PATH; ?>login/fetch_op_year',
					'type': 'post',
					'data' : { id : comp_id},
					'success' : function(data)
					{
					  //alert(data);
					  $('#operatingyear').html(data);
					} 
					});
  				 }	
		  });

		  });
</script>		
</body></html>