
			
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Call Checklists
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
							<a href="#">
								File
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Call Checklists
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
									 Call Checklists
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
											<i class="fa fa-reorder"></i>Document Checklist
										</div>
										<div class="actions">
									
								
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
										<form action="" method="post" class="form-horizontal operationsmaster-form" enctype="multipart/form-data">

											<h3 class="form-section alert alert-info">Upload Documents</h3>

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
																	 Document No/Name
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
																<tr class="active">
																<td>
																	 RFI
																</td>
																<td>
																	 
																</td>
																<td>
																	<a href='<?php echo APP_UPLOAD_PATH;?>docs/DACPL -RFI_REV_08.docx'>RFI</a>
																</td>
																<!--<td>
																	 2222
																</td>-->
																</tr>
																<tr class="active">
																<td>
																	 PO 
																</td>
																<td>
																	 
																</td>
																<td>
																	<a href='<?php echo APP_UPLOAD_PATH;?>docs/PO.pdf'>PO</a>
																</td>
																<!--<td>
																	 2222
																</td>-->
																</tr>
																<tr class="active">
																<td>
																	 WO
																</td>
																<td>
																	 
																</td>
																<td>
																	<a href='<?php echo APP_UPLOAD_PATH;?>docs/WO.pdf'>WO</a>
																</td>
																<!--<td>
																	 2222
																</td>-->
																</tr>
																<tr class="active">
																<td>
																	 CALL LETTER
																</td>
																<td>
																	 
																</td>
																<td>
																	<a href='<?php echo APP_UPLOAD_PATH;?>docs/Call_Letter.pdf'>CALL LETTER</a>
																</td>
																<!--<td>
																	 2222
																</td>-->
																</tr>
																<tr class="active">
																<td>
																	 QAP/Data Sheet/ Specification
																</td>
																<td>
																	 
																</td>
																<td>
																	<a href='<?php echo APP_UPLOAD_PATH;?>docs/QAP_&_DRG.pdf'>QAP_&_DRG</a>
																</td>
																<!--<td>
																	 2222
																</td>-->
																</tr>
																<tr class="active">
																<td>
																	 Drawing
																</td>
																<td>
																	 
																</td>
																<td>
																	11111
																</td>
																<!--<td>
																	 2222
																</td>-->
																</tr>
																<tr class="active">
																<td>
																	 Email
																</td>
																<td>
																	 
																</td>
																<td>
																	11111
																</td>
																<!--<td>
																	 2222
																</td>-->
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
															<button type="submit" class="btn green">Submit</button>
															<?php if (@$_SESSION['fname']!='Guest') { ?>
															<a href="<?php echo BASE_PATH;?>Viewfileoperations"><button type="button" class="btn default">Cancel</button></a>
															<?php } ?>
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

