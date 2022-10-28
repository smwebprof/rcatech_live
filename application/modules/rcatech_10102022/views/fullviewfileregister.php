
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					File Register - Full View 
					</h3>
					<?php if (!empty(@$_SESSION['userId'])) { ?>
					<ul class="page-breadcrumb breadcrumb">
						<!--<li class="btn-group">
							<button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
							<span>
								Actions
							</span>
							<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li>
									<a href="#">
										Action
									</a>
								</li>
								<li>
									<a href="#">
										Another action
									</a>
								</li>
								<li>
									<a href="#">
										Something else here
									</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">
										Separated link
									</a>
								</li>
							</ul>
						</li>-->
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo BASE_PATH; ?>dashboard">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="<?php echo BASE_PATH; ?>Viewfileregister">
								File
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Full View Register
							</a>
						</li>
					</ul>
				    <?php } ?>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless tabbable-reversed">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_0" data-toggle="tab">
									 File Register
								</a>
							</li>
							<!--<li>
								<a href="#tab_1" data-toggle="tab">
									 2 Columns
								</a>
							</li>
							<li>
								<a href="#tab_2" data-toggle="tab">
									 2 Columns Horizontal
								</a>
							</li>
							<li>
								<a href="#tab_3" data-toggle="tab">
									 2 Columns View Only
								</a>
							</li>
							<li>
								<a href="#tab_4" data-toggle="tab">
									 Row Seperated
								</a>
							</li>
							<li>
								<a href="#tab_5" data-toggle="tab">
									 Bordered
								</a>
							</li>
							<li>
								<a href="#tab_6" data-toggle="tab">
									 Row Stripped
								</a>
							</li>
							<li>
								<a href="#tab_7" data-toggle="tab">
									 Label Stripped
								</a>
							</li>-->
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>View File Register
							</div>
							<!--<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>-->
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewfileregister" class="btn red">
										<i class="fa fa-pencil"></i> View All Files
								</a>
							</div>
						</div>
						<?php 
											
						foreach($file_data as $file_info){
						?>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>File No</strong>
								</td>
								<td>
									<?php echo $file_info['file_no']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>File Source</strong>
								</td>
								<td>
									<?php echo $file_info['source_info']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>File Creation Date</strong>
								</td>
								<td>
									<?php echo date('d-m-Y',strtotime($file_info['file_creation_date'])) ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Client Name</strong>
								</td>
								<td>
									<?php echo $file_info['client_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Currency</strong>
								</td>
								<td>
									<?php echo $file_info['currency_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Work Type</strong>
								</td>
								<td>
									<?php echo $file_info['work_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Category</strong>
								</td>
								<td>
									<?php echo $file_info['category_name']; ?>
								</td>
							</tr>
							<tr>
								<td>
									 <strong>Remarks</strong>
								</td>
								<td>
									<?php echo $file_info['file_remarks']; ?>
								</td>
							</tr>
							</table>
						</div>
					</div>
					<!-- END PORTLET-->


					

					

					
					

					<!-- Start PORTLET-->
								<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-reorder"></i>File Generated By :
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-hover table-striped table-bordered">
							<tr>
								<td width="50%">
									 <strong>Created By :</strong> <?php echo $file_info['fname']." ".$file_info['lname'] ?>
								</td>  
								<td>
									 <strong>Created Date:</strong>  <?php echo date('d-m-Y',strtotime($file_info['entry_date'])) ?>
								</td>
							</tr>
							<tr>
								<td width="50%">
									 <strong>Modified By :</strong> <?php echo $file_info['ename']." ".$file_info['elname'] ?>
								</td>  
								<td>
									 <?php if (!empty($file_info['modify_date'])) {   
											 $modify_date = date('d-m-Y',strtotime($file_info['modify_date']));
										   } else {
										   	 $modify_date = '';	
										   }	 

									 	?>
									 <strong>Modified Date:</strong>  <?php echo $modify_date; ?>
								</td>
							</tr>
						
							</table>
						</div>
					</div>
					<!-- END PORTLET-->

					<?php
				    }
				    ?>


								</div>
		
								</div>
							</div>
							
							
							
							
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

