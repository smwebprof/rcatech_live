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
					Call Generation (New)
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
							<a href="<?php echo BASE_PATH; ?>Viewcallgeneration">
								Call
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								New Call Generation
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
											<i class="fa fa-reorder"></i>New Call Generation
										</div>
										<div class="actions">
										<!--<a href="<?php echo BASE_PATH; ?>addclientinteraction" class="btn yellow">
											<i class="fa fa-pencil"></i> Add Existing Client Interaction
										</a>-->
										<a href="<?php echo BASE_PATH; ?>Viewcallgeneration" class="btn red">
											<i class="fa fa-pencil"></i> View Calls
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
												   if (isset($success))
												   	echo '<p>'.@$success.'</p>';
												   else 
												   	echo '<p>'.@$errors.'</p>';
											?><br>
										<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">File Options is Required!!!</font>'; } ?>

										<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Cargo Commodity Details is Required!!!</font>'; } ?>	

										<form action="" method="post" class="form-horizontal callgeneration-form" enctype="multipart/form-data" onsubmit="submitForm()">
											
											<div class="form-body">
												<h3 class="form-section alert alert-info">Call Details - Please read the Instructions in Red Before Clicking Submit</h3>
												* Marked fields are Mandatory <br/><br/>


												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Client Name*</font></label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<!--<option value="">Please Select</option>-->
																	<?php foreach($clients_data as $rows) {  
																	if ($client_details[0]['id']==$rows['id']) {	
																	?>
																	<option value="<?php echo $rows['id']; ?>" selected><?php echo $rows['client_name']."  (".$rows['client_location'].")"; ?></option>
																	<?php } } ?>
																</select>
																<span for="clients_name" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">File No*</font></label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="file_no" id="file_no">
																	<!--<option value="">Select</option>-->
																	<option value="<?php echo $file_id; ?>" selected><?php echo $file_no; ?></option>
																</select>
																<span for="file_no" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">File Classification</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="file_class" id="file_class" value="<?php echo $client_details[0]['client_shortname']; ?>" style="width:25%" readonly>
																<span for="user_data" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Call Date*</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="call_date" id="call_date" value="<?php echo date('d-m-Y'); ?>" style="width:25%" readonly>
																<span for="call_date" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->											
													
												</div>
												<!--/row-->	

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">End Client*</font></label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="call_end_client" id="call_end_client">
																	<option value="">Please Select</option>
																	<?php foreach($clients_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['client_name']."  (".$rows['client_location'].")"; ?></option>
																	<?php } ?>
																</select>
																<span for="call_end_client" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Manufacturer*</font></label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="call_manufacturer" id="call_manufacturer">
																	<option value="">Please Select</option>
																	<?php foreach($manufacturer_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['manufacturer_name']; ?></option>
																	<?php } ?>
																</select>
																<span for="call_manufacturer" class="help-block"></span>
															</div>
														</div>
													</div>											
												</div>
												<!--/row-->											

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vendor </label>
															<div class="col-md-9">		
																<select class="form-control input-large select2me" data-placeholder="Select..." name="call_vendor" id="call_vendor">
																	<option value="">Please Select</option>
																	<?php foreach($vendor_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['vendor_name']; ?></option>
																	<?php } ?>
																</select>
																<span for="call_vendor" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">No of Days*</font></label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="call_days" id="call_days" value="1" style="width:25%">
																<span for="call_days" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->							
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Assigned To Branch*</font></label>
															<div class="col-md-6">
																<select class="form-control" name="assigned_to_branch" id="assigned_to_branch">
																<option value="">Select Branch</option>	
																	<?php
													                $rows = $branches_data;

													                foreach($rows as $branches_data){ 
													                	if ($_SESSION['branch_id']==$branches_data["id"]) {
													                	echo '<option value='.$branches_data["id"].' selected>'.$branches_data["branch_name"].'</option>';		
													                	} else {
													                		echo '<option value='.$branches_data["id"].'>'.$branches_data["branch_name"].'</option>';
													                	}
													                }	
																	?>
																</select>
																<span for="assigned_to_branch" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--/span-->

													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">State*</label>
															<div class="col-md-6">
																<select class="form-control" name="company_state" id="company_state">
																<option value="">Select State</option>
																</select>
																<span for="company_state" class="help-block"></span>
															</div>
														</div>
													</div>-->
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Inspection Schedule Date*</font></label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
																<input type="text" class="form-control" name="inspection_schedule_date" id="inspection_schedule_date" value="" readonly>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
																</div>
																<span for="inspection_schedule_date" class="help-block"></span>
															</div>
														</div>
													</div>	
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Inspection Schedule Time</label>
															<div class="col-md-9">
																<div class="input-group input-small">
																	 <input type="text" class="form-control timepicker timepicker-24 itemscheduletime" id="itemscheduletime" name="itemscheduletime">
																	 <span class="input-group-btn">
																		<button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
																	 </span>
																</div>
																<span for="inspection_schedule_time" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Country*</font></label>
															<div class="col-md-6">
																<select class="form-control" name="company_country" id="company_country">
																<option value="">Select Country</option>	
																	<?php
													                $rows = $countries;

													                foreach($rows as $countries){ 
													                	echo '<option value='.$countries["id"].'>'.$countries["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="company_country" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--/span-->

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">State*</font></label>
															<div class="col-md-6">
																<select class="form-control" name="company_state" id="company_state">
																<option value="">Select State</option>
																</select>
																<span for="company_state" class="help-block"></span>
															</div>
														</div>
													</div>
												</div>
												<!--/row-->
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Inspection City*</font></label>
															<div class="col-md-9">
																<select class="form-control" name="company_city" id="company_city">
																<option value="">Select City</option>
																</select>
																<span for="company_city" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Inspection Location </label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="inspection_location" id="inspection_location" value="" style="width:25%">
																<span for="inspection_location" class="help-block"></span>
															</div>
														</div>
													</div>
													
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Purchase Order Status</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="call_po_type" id="call_po_type">
																	<option value="">Select</option>
																	<option value="Full PO">Full PO</option>
																	<option value="Part PO">Part PO</option>
																</select>
																<span for="call_po_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">NABCBFLAG (Yes/No) </label>
															<div class="col-md-6">		
																<input type="checkbox" class="form-control" placeholder="" name="call_nabcb_flag" id="call_nabcb_flag" value="1" style="width:25%">
																<span for="call_nabcb_flag" class="help-block"></span>
															</div>
														</div>
													</div>
													
												</div>
												<!--/row-->	

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Rate Type</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="call_rate_type" id="call_rate_type">
																	<option value="">Select</option>
																	<option value="% Wise">% Wise</option>
																	<option value="Per Unit">Per Unit</option>
																	<option value="Man Days">Man Days</option>
																	<option value="Monthly">Monthly</option>
																</select>
																<span for="call_rate_type" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">NABCBFLAG (Yes/No) </label>
															<div class="col-md-6">		
																<input type="checkbox" class="form-control" placeholder="" name="call_nabcb_flag" id="call_nabcb_flag" value="1" style="width:25%">
																<span for="call_nabcb_flag" class="help-block"></span>
															</div>
														</div>
													</div>-->
													
												</div>
												<!--/row-->

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Rate</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="call_rate" id="call_rate" value="" style="width:25%">
																<span for="call_rate" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Rate Confirmation</label>
															<div class="col-md-9">
																<input type="hidden" name="upl_call_letter_title[]" value="RATE CONFIRMATION">
																<input type="file" id='upl_call_rate_confirmation' name="upl_call_rate_confirmation">
																<span for="upl_call_rate_confirmation" class="help-block"></span>
															</div>
														</div>
													</div>
													
												</div>
												<!--/row-->	

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Budget Amount </label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="call_budget" id="call_budget" value="" style="width:25%">
																<span for="call_budget" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Budget Amount </label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="call_budget" id="call_budget" value="" style="width:25%">
																<span for="call_budget" class="help-block"></span>
															</div>
														</div>
													</div>-->
													
												</div>
												<!--/row-->

												<?php /*<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">RFI Date</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
																<input type="text" class="form-control" name="rfi_date" id="rfi_date" value="" readonly>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
																</div>
																<span for="rfi_date" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">RFI No</label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="rfi_no" id="rfi_no" value="" style="width:25%">
																<span for="rfi_no" class="help-block"></span>
															</div>
														</div>
													</div>
													
												</div>*/ ?>
												<!--/row-->	

												<!--<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Budget Amount </label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="call_budget" id="call_budget" value="" style="width:25%">
																<span for="call_budget" class="help-block"></span>
															</div>
														</div>
													</div>-->
													<!--/span-->
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Budget Amount </label>
															<div class="col-md-9">
																<input type="text" class="form-control" placeholder="" name="call_budget" id="call_budget" value="" style="width:25%">
																<span for="call_budget" class="help-block"></span>
															</div>
														</div>
													</div>-->
													<!--/span-->
													
												</div>
												<!--/row-->
												
												
												
												<h3 class="form-section alert alert-info">Item Details</h3>
												<font style="color:red" size="3" >***Instructions : 1.Please click/unclick NABCB flag option to fill Item Details</font><br/>
												<font style="color:red" size="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.Remove Items added if NABCB flag applicable values are not Refreshed.</font><br/><br/>
												<div class="row">
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo Group*</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="cargo_group" id="cargo_group">
																	<option value="">Select</option>
																	<?php
													                $cargo_group = $this->data['cargogroup'];

													                foreach($cargo_group as $cargogroup){ 
													                	echo '<option value='.$cargogroup["id"].'>'.$cargogroup["name"].'</option>';

													                }	
																	?>
																</select>
																<span for="cargo_group" class="help-block"></span>
															</div>
														</div>
													</div>*/ ?>
													<!--/span-->
													<?php /*<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Cargo*</label>
															<div class="col-md-9">
																<select class="form-control" name="cargo" id="cargo">
																<option value="">Select</option>
																</select>
																<span for="cargo" class="help-block"></span>
															</div>
														</div>
													</div> */ ?>
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
																	 Item Quantity
																</th>
																<th  style="text-align-last: center">
																	 Item Unit
																</th>
																<th  style="text-align-last: center">
																	 Item Size
																</th>
																<th  style="text-align-last: center">
																	 Order Value
																</th>
																<th  style="text-align-last: center">
																	 Remove
																</th>																
															</tr>
															</thead>
															<tbody>
															<tr class="active">
																<td>
																	 <select class="form-control input-small itemmaster" name="itemmaster[]" id="itemmaster" required>
																	 <option value="">Select</option>
																	 <?php foreach($call_items as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['item_name']; ?></option>
																	<?php } ?>
																	</select>
																	<span for="itemmaster" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <select class="form-control input-small itemsubtype" name="itemsubtype[]" id="itemsubtype" required>
																	 <option value="">Select</option>
																	 </select>
																	 <span for="itemsubtype" class="help-block" style="color:red"></span>
																</td>																	
																<td>
																	 <input type="text" class="form-control input-small itemquantity" placeholder="" name="itemquantity[]" id="itemquantity" value="" required>
																	 <span for="itemquantity" class="help-block" style="color:red"></span>
																</td>
																<td>				
																	<select class="form-control input-small select2me" data-placeholder="Select..." name="itemunit" id="itemunit">
																	<option value="">Select</option>
																	<?php foreach($units_data as $rows) {  ?>
																	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['unit_name']; ?></option>
																	<?php } ?>
																	</select> 
																	<span for="itemunit" class="help-block" style="color:red"></span>
																</td>
																<td>
																	 <input type="text" class="form-control input-small itemsize" id="itemsize" name="itemsize[]" value="">
																	 <span for="itemsize" class="help-block" style="color:red"></span>
																</td>				
																<td>
																	<input type="text" class="form-control input-small itemtotalvalue" placeholder="" name="itemtotalvalue[]" id="itemtotalvalue" value="">
																	 <span for="itemtotalvalue" class="help-block" style="color:red"></span>
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
																<!--<th>
																	 Document No/Name
																</th>-->
																<th>
																	 Upload 
																</th>
															</tr>
															</thead>
															<tbody>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]" value="1">
																</td>
																<td>
																	 CALL LETTER
																	 <input type="hidden" name="upl_call_letter_title[]" value="CALL LETTER">
																</td>
																<!--<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>-->
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_letter' name="upl_call_letter"> 
																	 	</td>
																	 	<!--<td>*Only pdf,doc,xls accepted.
																	 	</td>-->	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]" value="2">
																</td>
																<?php /*<td>
																	 CALL DETAILS
																	 <input type="hidden" name="upl_call_letter_title[]" value="CALL DETAILS">
																</td>
																<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_details' name="upl_call_details"> 
																	 	</td>
																	 	<td>*Only pdf,doc,xls accepted.
																	 	</td>	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]" value="3">
																</td>
																<td>
																	 SUPPORTING DOCUMENT
																	 <input type="hidden" name="upl_call_letter_title[]" value="SUPPORTING DOCUMENT">
																</td>
																<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_supporting_docs' name="upl_call_supporting_docs"> 
																	 	</td>
																	 	<td>*Only pdf,doc,xls accepted.
																	 	</td>	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 INSPECTION REPORT
																	 <input type="hidden" name="upl_call_letter_title[]" value="INSPECTION REPORT">
																</td>
																<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_inspection_report' name="upl_call_inspection_report"> 
																	 	</td>
																	 	<td>*Only pdf,doc,xls accepted.
																	 	</td>	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>*/ ?>
																<td>
																	 QUALITY ASSURANCE PLAN
																	 <input type="hidden" name="upl_call_letter_title[]" value="QUALITY ASSURANCE PLAN">
																</td>
																<!--<td>
																	<input type="text" name="upl_call_letter_text[]">-->
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_quality_assr' name="upl_call_quality_assr"> 
																	 	</td>
																	 	<!--<td>*Only pdf,doc,xls accepted.
																	 	</td>-->	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<?php /*<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 INSPECTION TEST PLAN
																	 <input type="hidden" name="upl_call_letter_title[]" value="INSPECTION TEST PLAN">
																</td>
																<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_inspection_plan' name="upl_call_inspection_plan"> 
																	 	</td>
																	 	<td>*Only pdf,doc,xls accepted.
																	 	</td>	
																	 	</tr>	
																	 </table>
																</td>
																</tr>*/ ?>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 DRAWINGS
																	 <input type="hidden" name="upl_call_letter_title[]" value="DRAWINGS"> 
																</td>
																<!--<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>-->
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_drawings' name="upl_call_drawings"> 
																	 	</td>
																	 	<!--<td>*Only pdf,doc,xls accepted.
																	 	</td>-->	
																	 	</tr>	
																	 </table>
																</td>
																</tr>	
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 PURCHASE ORDER 
																	 <input type="hidden" name="upl_call_letter_title[]" value="PURCHASE ORDER">
																</td>
																<!--<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>-->
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_purchase_order' name="upl_call_purchase_order"> 
																	 	</td>
																	 	<!--<td>*Only pdf,doc,xls accepted.
																	 	</td>-->	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 REQUEST FOR INSPECTION
																	 <input type="hidden" name="upl_call_letter_title[]" value="REQUEST FOR INSPECTION">
																</td>
																<!--<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>-->
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_request_inspection' name="upl_call_request_inspection"> 
																	 	</td>
																	 	<!--<td>*Only pdf,doc,xls accepted.
																	 	</td>-->	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 TECHNICAL DOCUMENTS
																	 <input type="hidden" name="upl_call_letter_title[]" value="TECHNICAL DOCUMENTS">
																</td>
																<!--<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>-->
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_request_techdocs' name="upl_call_request_techdocs"> 
																	 	</td>
																	 	<!--<td>*Only pdf,doc,xls accepted.
																	 	</td>-->	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<?php /*<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 COVERING LETTER
																	 <input type="hidden" name="upl_call_letter_title[]" value="COVERING LETTER">
																</td>
																<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_covering_letter' name="upl_call_covering_letter"> 
																	 	</td>
																	 	<td>*Only pdf,doc,xls accepted.
																	 	</td>	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 INVOICE
																	 <input type="hidden" name="upl_call_letter_title[]" value="INVOICE"> 
																</td>
																<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_invoice' name="upl_call_invoice"> 
																	 	</td>
																	 	<td>*Only pdf,doc,xls accepted.
																	 	</td>	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 BANK GUARANTEE 
																	 <input type="hidden" name="upl_call_letter_title[]" value="BANK GUARANTEE">
																</td>
																<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_bank' name="upl_call_bank"> 
																	 	</td>
																	 	<td>*Only pdf,doc,xls accepted.
																	 	</td>	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 INVOICE EMAIL 
																	 <input type="hidden" name="upl_call_letter_title[]" value="INVOICE EMAIL">
																</td>
																<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_invoice_email' name="upl_call_invoice_email"> 
																	 	</td>
																	 	<td>*Only pdf,doc,xls accepted.
																	 	</td>	
																	 	</tr>	
																	 </table>
																</td>
																</tr>
																<tr class="active">
																<td>
																	 <input type="checkbox" name="docs[]">
																</td>
																<td>
																	 RATE CONFIRMATION 
																	 <input type="hidden" name="upl_call_letter_title[]" value="RATE CONFIRMATION">
																</td>
																<td>
																	<input type="text" name="upl_call_letter_text[]">
																</td>
																<td>
																	 <table>
																	 	<tr>
																	 	<td>
																	 		<input type="file" id='upl_call_rate_confirmation' name="upl_call_rate_confirmation"> 
																	 	</td>
																	 	<td>*Only pdf,doc,xls accepted.
																	 	</td>	
																	 	</tr>
																	 </table>
																</td>
																</tr>*/ ?>								
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
															<a href="<?php echo BASE_PATH; ?>Viewcallgeneration"><button type="button" class="btn default">Cancel</button></a>
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



