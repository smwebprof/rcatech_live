
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Item Master
					</h3>
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
							<a href="index.html">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Masters
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Item Master
							</a>
						</li>
					</ul>
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
									 Item Master
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
								<div class="portlet box red">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>Item Master Form
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>viewitemmaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View Items
									</span>
								</a>
								<!--<div class="btn-group">
									<a class="btn default yellow-stripe" href="#" data-toggle="dropdown">
										<i class="fa fa-share"></i>
										<span class="hidden-480">
											 Tools
										</span>
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
												 Export to Excel
											</a>
										</li>
										<li>
											<a href="#">
												 Export to CSV
											</a>
										</li>
										<li>
											<a href="#">
												 Export to XML
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												 Print Invoices
											</a>
										</li>
									</ul>
								</div>-->
							</div>
										<!--<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="#portlet-config" data-toggle="modal" class="config">
											</a>
											<a href="javascript:;" class="reload">
											</a>
											<a href="javascript:;" class="remove">
											</a>
										</div>-->
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" method="post" class="form-horizontal unitmaster-form">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($success))
												   	echo '<p>'.@$success.'</p>';
												   else 
												   	echo '<p>'.@$errors.'</p>';
											?>
											<input type="hidden" name="id" id="id" value="<?php echo $item_data[0]['id']; ?>">
											<div class="form-body">
												<h3 class="form-section">Item Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Item Name</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="item_name" id="item_name" value="<?php echo $item_data[0]['item_name']; ?>">
																<span for="item_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Department</label>
															<div class="col-md-9">
																<select class="form-control form-control-solid h-auto py-5 px-6" name="department_id" id="department_id" placeholder="Deaprtment">
												                    <option value="">Select</option>
												                    <?php foreach($departmentdata as $rows) {  
												                    if ($item_data[0]['department_id']==$rows['id']) { 	
												                    ?>
																	<option value="<?php echo $rows['id']; ?>" selected><?php echo $rows['name']; ?></option>
																	<?php } else { ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>	
																	<?php } } ?>  
											                  	</select>
																<span for="department_id" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">NABCBFLAG (Yes/No)</label>
															<div class="col-md-9">
																<input type="hidden" name="nabcb_flag" value="0">
																<input type="checkbox" class="form-control" placeholder="" name="nabcb_flag" id="nabcb_flag" value="1" style="width:25%" <?php if ($item_data[0]['nabcb_flag']==1){  echo 'checked';} else { echo ''; } ?>>
																<span for="nabcb_flag" class="help-block"></span>
															</div>
														  </div>
														</div>
														<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Active</label>
															<div class="col-md-9">
																<select class="form-control form-control-solid h-auto py-5 px-6" name="is_active" id="is_active" placeholder="is_active">
												                    <option value="">Select</option>
												                    <option value="1" <?php if ($item_data[0]['is_active']==1){  echo 'selected';} else { echo ''; } ?>>Yes</option>
												                    <option value="0" <?php if ($item_data[0]['is_active']==0){  echo 'selected';} else { echo ''; } ?>>No</option>  
											                  	</select>
																<span for="is_active" class="help-block"></span>
															</div>
														  </div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												
																								
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>viewunitmaster"><button type="button" class="btn default">Cancel</button></a>
														</div>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
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

