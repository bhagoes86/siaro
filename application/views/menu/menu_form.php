<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Menu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Controller <?php echo form_error('controller') ?></label>
            <input type="text" class="form-control" name="controller" id="controller" placeholder="Controller" value="<?php echo $controller; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Function <?php echo form_error('function') ?></label>
            <input type="text" class="form-control" name="function" id="function" placeholder="Function" value="<?php echo $function; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Icon <?php echo form_error('icon') ?></label>
            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Is Parent <?php echo form_error('is_parent') ?></label>
            <input type="text" class="form-control" name="is_parent" id="is_parent" placeholder="Is Parent" value="<?php echo $is_parent; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Is Sub <?php echo form_error('is_sub') ?></label>
            <input type="text" class="form-control" name="is_sub" id="is_sub" placeholder="Is Sub" value="<?php echo $is_sub; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Is Active <?php echo form_error('is_active') ?></label>
            <input type="text" class="form-control" name="is_active" id="is_active" placeholder="Is Active" value="<?php echo $is_active; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>