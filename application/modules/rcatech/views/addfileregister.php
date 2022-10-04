<style> 
            h1 { 
                color:Green; 
            } 
            div.scroll { 
                margin:4px, 4px; 
                padding:4px; 
                background-color: #d5f4e6;
                width: 500px; 
                height: 170px; 
                overflow-y: auto;
            } 
        </style> 
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Technical File (New)
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
								New File Register
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
									 Technical File
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
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>New Technical File
										</div>
										<div class="actions">
										<!--<a href="<?php echo BASE_PATH; ?>addclientinteraction" class="btn yellow">
											<i class="fa fa-pencil"></i> Add Existing Client Interaction
										</a>-->
										<a href="<?php echo BASE_PATH; ?>Viewfileregister" class="btn red">
											<i class="fa fa-pencil"></i> View All Files
										</a>
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
									</div>
					
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
																			<?php
												   #print_r($this->data);
												   #echo validation_errors();
												   /*if (isset($this->data['success']))
												   	echo '<p>'.@$this->data['success'].'</p>';
												   else 
												   	echo '<p>'.@$this->data['errors'].'</p>';*/
											?><br>
										<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">File Options is Required!!!</font>'; } ?>

										<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Cargo Commodity Details is Required!!!</font>'; } ?>	

										<form action="" method="post" class="form-horizontal addfileregister-form" enctype="multipart/form-data" onsubmit="submitForm()">
											
											<div class="form-body">
												<h3 class="form-section alert alert-info">File Info</h3>
												* Marked fields are Mandatory <br/><br/>


												

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">File Creation Date*</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="<?php echo date('d-m-Y'); ?>" style="width:25%" readonly>
																<span for="user_data" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">File Source*</font></label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="file_source" id="file_source">
																	<option value=""></option>
																	<?php foreach($file_source_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['file_source']; ?></option>
																	<?php } ?>
																</select>
																<span for="file_source" class="help-block"></span>	
															</div>
														</div>
													</div>
													<!--/span-->												
													
												</div>
												<!--/row-->												

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Client Name*</font></label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<option value=""></option>
																	<?php foreach($clients_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['client_name']."  (".$rows['client_location'].")"; ?></option>
																	<?php } ?>
																</select>
																<span for="clients_name" class="help-block"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Shortname</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="client_shortname" id="client_shortname" value="" style="width:25%" readonly>
																<span for="client_shortname" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->											
												</div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Currency</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="currency_name" id="currency_name">
																	<option value=""></option>
																	<?php foreach($currency_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['currency_name']; ?></option>
																	<?php } ?>
																</select>
																<span for="currency_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Work Type*</font></label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="work_type" id="work_type">
																	<option value=""></option>
																	<?php foreach($work_type_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['work_name']; ?></option>
																	<?php } ?>
																</select>
																<span for="work_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->
												
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Category </label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="category_name" id="category_name">
																	<option value=""></option>
																	<?php foreach($category_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['category_name']; ?></option>
																	<?php } ?>
																</select>
																<span for="category_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Remarks</label>
															<div class="col-md-6">
																<textarea class="form-control" rows="3" name="file_remarks" id="file_remarks"></textarea>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->	

											<?php /*<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Remarks</label>
															<div class="col-md-6">
																<textarea class="form-control" rows="3" name="file_remarks" id="file_remarks"></textarea>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Work Type</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="work_type" id="work_type">
																	<option value=""></option>
																	<?php foreach($work_type_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['work_name']; ?></option>
																	<?php } ?>
																</select>
																<span for="work_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>*/ ?>
												<!--/row-->	

											<?php /*<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Category </label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="category_name" id="category_name">
																	<option value=""></option>
																	<?php foreach($category_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['category_name']; ?></option>
																	<?php } ?>
																</select>
																<span for="category_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Remarks</label>
															<div class="col-md-6">
																<textarea class="form-control" rows="3" name="file_remarks" id="file_remarks"></textarea>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>*/ ?>
												<!--/row-->		
												

											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" id="btn_submit" class="btn green">Submit</button>&nbsp;&nbsp;&nbsp;
															<a href="<?php echo BASE_PATH; ?>Viewfileregister"><button type="button" class="btn default">Cancel</button></a>
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



