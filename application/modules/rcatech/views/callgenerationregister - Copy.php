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
					Call Generation Register
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
								Call Generation Register
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
									 Call Generation
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
											<i class="fa fa-reorder"></i>Call Generation Register
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
												<h3 class="form-section alert alert-info">Call Details</h3>
												* Marked fields are Mandatory <br/><br/>


												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Client Name</label>
															<div class="col-md-6">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<option value=""></option>
																	<?php foreach($clients_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['client_name']."  (".$rows['city'].")"; ?></option>
																	<?php } ?>
																</select>
																<span for="clients_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File No</label>
															<div class="col-md-6">
																<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="file_no" id="file_no">
																	<option value="">Select</option>	
																</select>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>	
												</div>
												<!--/row-->	

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Classification*</label>
															<div class="col-md-6">
																<select class="form-control form-control-solid h-auto py-5 px-6" name="branch" id="branch" placeholder="Branch">
												                    <option value="">Select</option>
												                    <option value="Mumbai">AAAA</option>
												                    <option value="Chennai">BBBB</option>  
											                  	</select>
																<span for="user_data" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Call Date*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="<?php echo date('d-m-Y'); ?>" style="width:25%" readonly>
																<span for="user_data" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->	

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Call Time</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date("H:i"); ?>" style="width:25%" readonly>	
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">No of Days*</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="clients_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->												

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">RFI Date</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="client_ref_no" class="help-block"></span>
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">RFI No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->											
												</div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Inspection Location </label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="tax_options" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Manufacturer</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->
												
											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vendor </label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="tax_options" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">End Client</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->	

											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">NABCBFLAG (Yes/No) </label>
															<div class="col-md-6">
																<input type="checkbox" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Rate Type</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<option value="">Select</option>
																	<option value="">% Wise</option>
																	<option value="">Per Unit</option>
																	<option value="">Man Days</option>
																	<option value="">Monthly</option>
																</select>
																<span for="tax_options" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->	

											<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Rate</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Budget Amount </label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_date" id="file_date" value="" style="width:25%">
																<span for="tax_options" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->	

											<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<!--<button id="add_row">Add row</button>-->
														<input type="button" value="Add Item" id="cargo_row">
														<div class="table-scrollable">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover" id="cargo_details">
															<thead>
															<tr>
																<th style="text-align-last: center">
																	 Item
																</th>
																<th  style="text-align-last: center">
																	 Item Subtype/ IS Standards
																</th>
																<th  style="text-align-last: center">
																	 Quantity
																</th>
																<th  style="text-align-last: center">
																	 Unit
																</th>
																<th  style="text-align-last: center">
																	 Origin
																</th>
																<th  style="text-align-last: center">
																	 Size
																</th>
																<th  style="text-align-last: center">
																	 Class
																</th>
																<th  style="text-align-last: center">
																	 Schedule Date
																</th>
																<th  style="text-align-last: center">
																	 Schedule Time
																</th>
																<th  style="text-align-last: center">
																	 Remove
																</th>																
															</tr>
															</thead>
															<tbody>
															<tr class="active">
																<td>
																	 <select class="form-control input-small cargomaster" name="cargo[]" id="cargo" required>
																	 <option value="">Select</option>
																	 </select>
																	 <span for="cargo" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <select class="form-control input-small packingmaster" name="div_packing[]" id="div_packing" required>
																	 <option value="">Select</option>
																	 </select>
																	 <span for="div_packing" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	 <input type="text" class="form-control input-small" placeholder="" name="div_quantity[]" id="div_quantity" value="" required>
																	 <span for="div_quantity" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <select class="form-control input-small unitmaster" name="div_unit[]" id="div_unit" required>
																	 <option value="">Select</option>
																	 </select>
																	 <span for="div_unit" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_origin" id="div_origin" name="div_origin[]" value="" required>
																	 <span for="div_origin" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_container_wt" id="div_load_port" name="div_load_port[]" value="" required>
																	 <span for="div_load_port" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_net_wet" id="div_discharge_port" name="div_discharge_port[]" value="" required>
																	 <span for="div_discharge_port" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_net_wet" id="div_place_attendance" name="div_place_attendance[]" value="" required>
																	 <span for="div_place_attendance" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small div_net_wet" id="div_place_attendance" name="div_place_attendance[]" value="" required>
																	 <span for="div_place_attendance" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <!--<input type="button" class="form-control input-small rmv" value="Delete Cargo" id="delete_cargo_row">-->
																	 <a class="btn btn-danger btn-xs rmv" title="Delete Row"><i class="fa fa-times fa-fw"></i></a>
																</td>																
															</tr>															
															</tbody>
															</table>
															</div>
														</div>
													</div>
												</div>
											</div>	

											<h3 class="form-section alert alert-info">Call Documents</h3>

											<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<div class="table-responsive">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover">
															<thead>
															<tr>
																<th>
																	 Id
																</th>
																<th>
																	 Document Type
																</th>
																<th>
																	 Document No/Name
																</th>
																<th>
																	 Upload 
																</th>
															</tr>
															</thead>
															<tbody>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 CALL LETTER
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 CALL DETAILS
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 SUPPORTING DOCUMENT
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 INSPECTION REPORT
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 QUALITY ASSURANCE PLAN
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 INSPECTION TEST PLAN
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 DRAWINGS 
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>	
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 PURCHASE ORDER 
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 REQUEST FOR INSPECTION
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 COVERING LETTER
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 INVOICE 
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 BANK GUARANTEE 
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 INVOICE EMAIL 
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs">
																</td>
																<td>
																	 RATE CONFIRMATION 
																</td>
																<td>
																	<input type="text" name="docs">
																</td>
																<td>
																	 <input type="file" id='upl_document_type' name="upl_document_type">
																	 <span>*Only pdf,doc,xls accepted</span>
																</td>
																</tr>								
															</tbody>
															</table>
														</div>
														</div>
											</div>
											</div>
											</div>
												

											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-6">
														<div class="col-md-offset-9 col-md-9">
															<button type="submit" class="btn green">Submit</button>&nbsp;&nbsp;&nbsp;
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



