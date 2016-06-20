<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
			<i class="fa fa-home"></i> Home
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url('home')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active"> Dashboard</li>
		</ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
			<div class="col-sm-6">
				<div class="box box-primary">
					<div class="box-body" style"overflow: auto">
  					<div class="table-responsive">
              <?php echo $calendar; ?>
  					</div>
          </div>
				</div>
			</div>
		</div>

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
