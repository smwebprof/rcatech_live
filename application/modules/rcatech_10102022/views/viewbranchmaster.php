<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Branch Master
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
								View Branch Master
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
					<?php if (@$_GET['msg']==1) { echo '<font size="3" color="red">Data Saved Successfully!!!</font>'; } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>View Branch Master
							</div>
							<div class="actions">
								<?php #if ($data['access_right']['add_rights'] == 1) { ?>
								<a href="<?php echo BASE_PATH; ?>addbranchmaster" class="btn blue">
									<i class="fa fa-pencil"></i> Add New
								</a>
								<?php #} ?>
								<!-- <div class="btn-group">
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
								</div> -->
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th>
									 Sr.No.
								</th>
								<th>
									 Branch Name
								</th>
								<th>
									 Email
								</th>
								<th>
									 Address
								</th>
								<th>
									 Bank Name
								</th>
								<th>
									 Bank Branch Name
								</th>
								<?php #if ($data['access_right']['edit_rights'] == 1) { ?>
								<th>
									 Edit
								</th>
								<?php #} ?>
								<?php #if ($data['access_right']['delete_rights'] == 1) { ?>
								<th>
									 Delete
								</th>
								<?php #} ?>
							</tr>
							</thead>
							<tbody>
							<?php	
							$rows = $branch_data;
							$i=1;
							foreach($rows as $branch_data){
							?>
						    <tr class="odd gradeX">
						    	<td>
									 <?php echo $i; ?>
								</td>
								<td>
									 <a href="<?php echo BASE_PATH; ?>fullviewbranchmaster?id=<?php echo base64_encode($branch_data['id']); ?>"><?php echo $branch_data['branch_name']; ?></a>
								</td>
								<td>
									<?php echo $branch_data['branch_email']; ?>
								</td>
								<td>
     								<?php echo $branch_data['address']; ?>
								</td>
								<td>
									<?php echo $branch_data['bank_name']; ?>
								</td>
								<td class="center">
     								<?php echo $branch_data['bank_branch_name']; ?>
								</td>
								<?php #if ($data['access_right']['edit_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-success">
										 <a href="<?php echo BASE_PATH; ?>editbranchmaster?id=<?php echo base64_encode($branch_data['id']); ?>"  style="color:#fff">Edit</a>
									</span>
								</td>
								<?php #} ?>
								<?php #if ($data['access_right']['delete_rights'] == 1) { ?>
								<td>
									<span class="label label-sm label-danger">
										 <a href="<?php echo BASE_PATH; ?>delbranchmaster?id=<?php echo base64_encode($branch_data['id']); ?>"  style="color:#fff">Delete</a>
									</span>
								</td>
								<?php #} ?>
							</tr>	

							<?php
							$i++;
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
