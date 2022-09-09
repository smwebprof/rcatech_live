<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2019 &copy; AgriMin Control International.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH; ?>plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo ASSETS_PATH; ?>scripts/core/app.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH; ?>scripts/custom/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();


		  $('#companyname').change(function(){
  				var comp_id = $('#companyname').val();

  				 if(comp_id != '')
  				 {
  				 	$.ajax({
					'url' : '<?php echo BASE_PATH; ?>login/fetch_branch',
					'type': 'post',
					'data' : { id : comp_id},
					'success' : function(data)
					{
					  //alert(data);
					  $('#branchname').html(data);
					} 
					});
  				 }	

  				 if(comp_id != '')
  				 {
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

  				 if(comp_id != '')
  				 {
  				 	$.ajax({
					'url' : '<?php echo BASE_PATH; ?>login/fetch_fin_year',
					'type': 'post',
					'data' : { id : comp_id},
					'success' : function(data)
					{
					  //alert(data);operatingyear
					  $('#financialyear').html(data);
					} 
					});
  				 }
  		  });		
		});
	</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
