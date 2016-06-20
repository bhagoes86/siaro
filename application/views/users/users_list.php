<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
			<i class="fa fa-home"></i> Home
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?=base_url('home')?>"><i class="fa fa-home"></i> Home</a></li>
			<li> General Setting</a></li>
			<li class="active"> Users</li>
		</ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
			<div class="col-sm-12">
				<div class="box box-primary">
					<div class="box-body" style"overflow: auto">
            <div class="box-header with-border">
    					<h3 class="box-title">User List <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h3>
              <?php echo anchor(site_url('users/create'), 'Create', 'class="btn btn-primary"'); ?>
          		<?php echo anchor(site_url('users/excel'), 'Excel', 'class="btn btn-primary"'); ?>
          		<?php echo anchor(site_url('users/word'), 'Word', 'class="btn btn-primary"'); ?>

              <div class="box-tools pull-right">
    						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
    					</div>
    				</div> <!-- /.box-header -->
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="mytable">
                  <thead>
                      <tr class="info">
                        <th width="80px">No</th>
                		    <th>Ip Address</th>
                		    <th>Username</th>
                		    <th>Password</th>
                		    <th>Salt</th>
                		    <th>Email</th>
                		    <th>Activation Code</th>
                		    <th>Forgotten Password Code</th>
                		    <th>Forgotten Password Time</th>
                		    <th>Remember Code</th>
                		    <th>Created On</th>
                		    <th>Last Login</th>
                		    <th>Active</th>
                		    <th>First Name</th>
                		    <th>Last Name</th>
                		    <th>Company</th>
                		    <th>Phone</th>
                		    <th>Action</th>
                      </tr>
                  </thead>
            	    <tbody>
                        <?php
                        $start = 0;
                        foreach ($users_data as $users)
                        {
                            ?>
                            <tr>
                      		    <td><?php echo ++$start ?></td>
                      		    <td><?php echo $users->ip_address ?></td>
                      		    <td><?php echo $users->username ?></td>
                      		    <td><?php echo $users->password ?></td>
                      		    <td><?php echo $users->salt ?></td>
                      		    <td><?php echo $users->email ?></td>
                      		    <td><?php echo $users->activation_code ?></td>
                      		    <td><?php echo $users->forgotten_password_code ?></td>
                      		    <td><?php echo $users->forgotten_password_time ?></td>
                      		    <td><?php echo $users->remember_code ?></td>
                      		    <td><?php echo date('Y-m-d', $users->created_on) ?></td>
                      		    <td><?php echo $users->last_login ?></td>
                      		    <td><?php echo $users->active ?></td>
                      		    <td><?php echo $users->first_name ?></td>
                      		    <td><?php echo $users->last_name ?></td>
                      		    <td><?php echo $users->company ?></td>
                      		    <td><?php echo $users->phone ?></td>
                      		    <td style="text-align:center" width="200px">
                        			<?php
                        			echo anchor(site_url('users/read/'.$users->id),'Read');
                        			echo ' | ';
                        			echo anchor(site_url('users/update/'.$users->id),'Update');
                        			echo ' | ';
                        			echo anchor(site_url('users/delete/'.$users->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                        			?>
                        		  </td>
            	              </tr>
                            <?php
                            }
                            ?>
                  </tbody>
              </table>
            </div> <!-- /.table-responsive -->
          </div> <!-- /.box-body -->
				</div> <!-- /.box box-primary -->
			</div> <!-- /.col-sm-12 -->
		</div> <!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
    $(function(){
        $("#mytable").dataTable();
    });
</script>
