
<!-- SIDE MENU -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image"><img src="<?=base_url()?>assets/images/users/<?php echo users_info('foto')?>" class="img-circle" alt="User Image"></div>
			<div class="pull-left info">
			  <p><?php echo users_info('full_name'); ?></p>
				<!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
			</div>
		</div>
    <ul class="sidebar-menu">
      <?php echo side_menu($groups, get_controller($_SERVER['REQUEST_URI']));?>
    </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- END SIDE MENU -->
