<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					User Access Master (View)
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
							<a href="#">
								Masters
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								View User Access Master
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
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View User Access Master
							</div>
							<div class="actions">
								<a href="<?php echo BASE_PATH; ?>Adduseraccessmaster" class="btn blue">
									<i class="fa fa-pencil"></i> Add User Access
								</a>
								<!--<a href="<?php echo BASE_PATH; ?>viewclientmaster?a=1" class="btn yellow">
									<i class="fa fa-pencil"></i> Display Verified Clients
								</a>
								<a href="<?php echo BASE_PATH; ?>viewclientmaster?a=0" class="btn red">
									<i class="fa fa-pencil"></i> Display UnVerified Clients
								</a>-->
								
								<!--<div class="btn-group">
									<a class="btn green" href="#" data-toggle="dropdown">
										<i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
												<i class="fa fa-pencil"></i> Edit
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-trash-o"></i> Delete
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-ban"></i> Ban
											</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
												<i class="i"></i> Make admin
											</a>
										</li>
									</ul>
								</div>-->
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 First Name
								</th>
								<th>
									 Last Name
								</th>
								<th>
									 Access Type
								</th>
								<th>
									 Edit
								</th>
								<th>
									 Delete
								</th>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $user_data;

							foreach($rows as $user_data){
							?>
						    <tr class="odd gradeX">
								<td>
									 <?php echo $user_data['first_name'] ?>
								</td>
								<td>
									<?php echo $user_data['last_name']; ?>
								</td>
								<td>
     								<?php echo $user_data['employee_staff']; ?>
								</td>
								<td>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>edituseraccessmaster?id=<?php echo base64_encode($user_data['id']); ?>"  style="color:#fff">Edit</a>
									</span>
								</td>
								<td>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>deleteuseraccessmaster?id=<?php echo base64_encode($user_data['id']); ?>"  style="color:#fff">Delete</a>
									</span>
								</td>
							</tr>	

							<?php
						    }
							?>
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				<div class="col-md-6 col-sm-12">
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
