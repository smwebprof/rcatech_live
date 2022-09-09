
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Dashboard <!--<small>statistics and more</small>-->
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo BASE_PATH; ?>dashboard">
								Home
							</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
								Dashboard
							</a>
						</li>
						<?php /*<li class="pull-right">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="fa fa-calendar"></i>
								<span>
								</span>
								<i class="fa fa-angle-down"></i>
							</div>
						</li> */ ?>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			
			<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="note note-success">
						<!--<h4 class="block">Pace</h4>-->
						<p>
							 <u><h2>You now logged in to <b><?php echo $_SESSION['branch_name'];?></b>  Branch.Please continue...</h2></u>
						</p>
						<!--<p>
							 <font color='red'>***</font> Dashboard Data is displayed as per current financial year.
						</p>-->
						<p>
							 <font color='red'>***</font> Dashboard page is auto refresh every 10 mins.
						</p>
					</div>
				</div>
			</div>

			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-files-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 1234
							</div>
							<div class="desc">
								 Total Files Created
							</div>
						</div>
						<a class="more" href="<?php echo BASE_PATH; ?>viewfilereport">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-files-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 1234
							</div>
							<div class="desc">
								 Total Invoices Created
							</div>
						</div>
						<a class="more" href="<?php echo BASE_PATH; ?>viewfilereport">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-files-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 1234
							</div>
							<div class="desc">
								 Total Invoice Amount
							</div>
						</div>
						<a class="more" href="<?php echo BASE_PATH; ?>viewfilereport">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-files-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 1234
							</div>
							<div class="desc">
								 Total Clients
							</div>
						</div>
						<a class="more" href="<?php echo BASE_PATH; ?>viewfilereport">
							 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>				
			</div>

			<div class="clearfix">
			</div>

			
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
</form>
</body>
<!-- END BODY -->
</html>