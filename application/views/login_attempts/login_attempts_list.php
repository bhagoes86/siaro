<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Login_attempts List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('login_attempts/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('login_attempts/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('login_attempts/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Ip Address</th>
		    <th>Login</th>
		    <th>Time</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($login_attempts_data as $login_attempts)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $login_attempts->ip_address ?></td>
		    <td><?php echo $login_attempts->login ?></td>
		    <td><?php echo $login_attempts->time ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('login_attempts/read/'.$login_attempts->id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('login_attempts/update/'.$login_attempts->id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('login_attempts/delete/'.$login_attempts->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    </body>
</html>