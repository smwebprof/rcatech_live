
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					User Access Master
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
								Form Stuff
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Form Layouts
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
									 Form Actions
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
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>User Access Master
										</div>
										<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Viewuseraccessmaster" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										 View User Access Master
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

										<form action="" method="post" class="form-horizontal accessmaster-form">
											<?php
												   #print_r($this->data);
												   echo validation_errors();
												   if (isset($data['success']))
												   	echo '<p>'.@$data['success'].'</p>';
												   else 
												   	echo '<p>'.@$data['errors'].'</p>';	
											?>
											<div class="form-body">
												<h3 class="form-section">User Access Details</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">User Access Type*</label>
															<div class="col-md-9">
																<select class="form-control" name="user_type" id="user_type">
																	<option value="">Please Select</option>
																	<option value="TECHNICAL ADMIN">TECHNICAL ADMIN</option>
																	<option value="TECHNICAL USER">TECHNICAL USER</option>
																	<option value="EMPLOYEE">EMPLOYEE</option>
																	<option value="SURVEYOR HEAD">SURVEYOR HEAD</option>
																</select>
																<span for="user_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>	
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">User Name*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="user_name" id="user_name">
																	<option value=""></option>
																</select>
																<span for="user_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Main Menus*</label>
															<div class="col-md-9">
																<select class="form-control" name="main_menus" id="main_menus">
																<option value="">Select Main Menu</option>	
																	<?php
													                $rows = $main_menus;

													                foreach($rows as $main_menus){ 
													                	echo '<option value='.$main_menus["id"].'>'.$main_menus["short_name"].'</option>';

													                }	
																	?>
																</select>
																<span for="main_menus" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
		

										<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Select Submenus
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
							<div class="actions">
								<!--<a href="javascript:void(0);" class="btn blue" onclick="selectAll()">-->
								<!--<a href="javascript:void(0);" class="btn blue" >	
									<i class="fa fa-pencil"></i> Select All
								</a>-->
								<input type="checkbox" name="select-all" id="select-all" />Select All / Deselect All
							</div>
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th width="20%">
									 Submenu Name
								</th>
								<th width="20%">
									 View
								</th>
								<th class="numeric">
									 Add
								</th>
								<th class="numeric">
									 Edit
								</th>
								<th class="numeric">
									 Delete
								</th>
								
							</tr>
							</thead>
							<tbody id="submenu_text">
							<?php /*<tr>
								<td>
									 AAC
								</td>
								<td>
									 <input type="checkbox" id="inlineCheckbox1" value="option1"> Checkbox 1 </label>
								</td>
								<td class="numeric">
									 <input type="checkbox" id="inlineCheckbox1" value="option1"> Checkbox 1 </label>
								</td>
								<td class="numeric">
									 <input type="checkbox" id="inlineCheckbox1" value="option1"> Checkbox 1 </label>
								</td>
								<td class="numeric">
									<input type="checkbox" id="inlineCheckbox1" value="option1"> Checkbox 1 </label>
								</td>
								
							</tr>
							<tr>
								<td>
									 AAD
								</td>
								<td>
									 <input type="checkbox" id="inlineCheckbox1" value="option1"> Checkbox 1 </label>
								</td>
								<td class="numeric">
									 <input type="checkbox" id="inlineCheckbox1" value="option1"> Checkbox 1 </label>
								</td>
								<td class="numeric">
									 <input type="checkbox" id="inlineCheckbox1" value="option1"> Checkbox 1 </label>
								</td>
								<td class="numeric">
									 <input type="checkbox" id="inlineCheckbox1" value="option1"> Checkbox 1 </label>
								</td>
								
							</tr>*/ ?>

							
							
							
							
							
							
							
							
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
					
							
												
										
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>
															<a href="<?php echo BASE_PATH;?>Viewuseraccessmaster"><button type="button" class="btn default">Cancel</button></a>
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

