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
					Add Inspector
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
								Add Inspector
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
									 Add Inspector
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
											<i class="fa fa-reorder"></i>New Add Inspector
										</div>
										<div class="actions">
										<!--<a href="<?php echo BASE_PATH; ?>addclientinteraction" class="btn yellow">
											<i class="fa fa-pencil"></i> Add Existing Client Interaction
										</a>-->
										<a href="<?php echo BASE_PATH; ?>Viewcallreschedule" class="btn red">
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

										<?php if (@$_GET['msg']==2) { echo '<font size="3" color="red">Engineer Name is Required!!!</font>'; } ?>	

										<form action="" method="post" class="form-horizontal callreschedule-form" enctype="multipart/form-data" onsubmit="submitForm()">
										<input type="hidden" name="status" value="Rescheduled">
										<input type="hidden" name="call_id"	id="call_id" value="<?php echo $call_id; ?>">
										<input type="hidden" name="file_id"	id="file_id" value="<?php echo $file_id; ?>">

										<div class="form-body">
												<h3 class="form-section alert alert-info">Call Details</h3> <br/>

											<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<div class="table-responsive">
															<div id="field_parameter_div">
															<?php foreach($file_data as $rows_data) {  ?>
															<table class="table table-bordered table-hover">
															<tbody>
															<tr class="active">
																<td>
																	 Call No
																</td>
																<td>
																	 <?php echo $rows_data['call_no']; ?>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 Client Name
																</td>
																<td>
																	 <?php echo $rows_data['client_name']; ?>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 End User
																</td>
																<td>
																	 <?php echo $rows_data['end_user']; ?>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 Manufactuer
																</td>
																<td>
																	 <?php echo $rows_data['manufacturer']; ?>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 Inspection Location
																</td>
																<td>
																	 <?php echo $rows_data['inspection_location']; ?>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 Inspection Date
																</td>
																<td>
																	 <?php echo $rows_data['inspection_schedule_date']." (".$rows_data['call_days']." days)"; ?>
																</td>
															</tr>
															</tbody>
															</table>
															<?php }  ?>
														</div>
														</div>
											</div>
											</div>
											</div>

											<div class="form-body">
												<h3 class="form-section alert alert-info">Item Details</h3> <br/>

											<div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<div class="table-responsive">
															<div id="field_parameter_div">
															<?php foreach($item_details as $rows_items) {  ?>
															<table class="table table-bordered table-hover">
															<tbody>
															<tr class="active">
																<td>
																	 Item Name
																</td>
																<td>
																	 <?php echo $rows_items['item_name']; ?>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 Item Subtype
																</td>
																<td>
																	 <?php echo $rows_items['subitem_name']; ?>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 Quantity
																</td>
																<td>
																	 <?php echo $rows_items['item_quantity']; ?>
																</td>
															</tr>
															<tr class="active">
																<td>
																	 Unit
																</td>
																<td>
																	 <?php echo $rows_items['unit_name']; ?>
																</td>
															</tr>
															</tbody>
															</table>
															<?php }  ?>
														</div>
														</div>
											</div>
											</div>
											</div>	

											<div class="form-body">
												<h3 class="form-section alert alert-info">Call Documents</h3> <br/>

											 <div class="row">
													<div class="col-md-12">
														<div class="portlet-body">
														<div class="table-responsive">
															<div id="field_parameter_div">
															<table class="table table-bordered table-hover">
															<thead>
															<tr>
																<th>
																	 Document Type
																</th>			
																<th>
																	 View
																</th>
																<!--<th>
																	 Upload Date
																</th>-->
															</tr>
															</thead>
															<tbody>
																<?php foreach($call_docsdata as $rows) {  ?>
																<tr class="active">
																<td>
																	 <?php echo $rows['document_name']; ?>
																</td>			
																<td>
																	<?php echo "<a href='".$rows['document_path']."' target='_blank'>View</a>"; ?>
																</td>
																<!--<td>
																	 2222
																</td>-->
																</tr>
															<?php } ?>
															</tbody>
															</table>
														</div>
														</div>
											</div>
											</div>
											</div>
											
											<div class="form-body">
												<h3 class="form-section alert alert-info">Call Info - On Submit Link will goto inspector</h3>
												* Marked fields are Mandatory <br/><br/>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">File No*</font></label>
															<div class="col-md-6">
																<input type="text" class="form-control" placeholder="" name="call_file_no" id="call_file_no" value="<?php echo $file_data[0]['file_no']; ?>" readonly>
																<span for="call_file_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Call No*</font></label>
															<div class="col-md-6">
																<input type="text" class="form-control" placeholder="" name="call_no" id="call_no" value="<?php echo $file_data[0]['call_no']; ?>" readonly>
																<span for="call_no" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->												
													
												</div>
												<!--/row-->	

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Engineers Name*</font></label>
															<div class="col-md-6">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="engineer_data[]" id="engineer_data" multiple>
																<?php
													            foreach($engineers_data as $user_data){ 
													            if (in_array($user_data["id"], $user_details)) {
													            	echo '<option value='.$user_data["id"].' selected>'.$user_data["first_name"] .' '.$user_data["last_name"] .'  - '.$user_data["branch_name"] .'</option>';
													                } else {
													                    echo '<option value='.$user_data["id"].'>'.$user_data["first_name"] .' '.$user_data["last_name"] .'  - '.$user_data["branch_name"] .'</option>';	
													                 }	
													            }	
													            ?>    
																</select>
																<span for="engineer_data" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3"><font color="red">Remarks*</font></label>
															<div class="col-md-6">
																<textarea class="form-control" rows="3" name="remarks" id="remarks"><?php echo @$schedule_data[0]['remarks']; ?></textarea>
																<span for="remarks" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->												
													
												</div>
												<!--/row-->	
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">From Schedule Date</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
																<input type="text" class="form-control" name="call_from_date" id="call_from_date" value="<?php echo $inspection_schedule_date; ?>"readonly>				
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
																</div>
																<span for="call_from_date" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">To Schedule Date</label>
															<div class="col-md-9">
																<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="-6m">
																<input type="text" class="form-control" name="call_to_date" id="call_to_date" value="<?php echo $inspection_schedule_next; ?>"readonly>				
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
																</div>
																<span for="call_to_date" class="help-block"></span>
															</div>
														</div>
													</div>
													<!--/span-->
													
												</div>
												<!--/row-->

											<?php /*<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Work Type</label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<option value=""></option>
																</select>
																<span for="scope_services" class="help-block"></span>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Category </label>
															<div class="col-md-9">
																<select class="form-control input-large select2me" data-placeholder="Select..." name="clients_name" id="clients_name">
																	<option value=""></option>
																</select>
																<span for="tax_options" class="help-block"></span>
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
															<button type="submit" class="btn green">Submit</button>&nbsp;&nbsp;&nbsp;
															<a href="<?php echo BASE_PATH; ?>Viewcallreschedule"><button type="button" class="btn default">Cancel</button></a>
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



