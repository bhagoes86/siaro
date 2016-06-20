<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('get_controller'))
{
	function get_controller($url) {
		$ctrl_name = str_replace('/arisan/', '', $url);
    $ctrl_name = explode('/', $ctrl_name);
    $ctrl_name = $ctrl_name[0]; // controller name
    //$ctrl_name = str_replace('-', '_', $ctrl_name); // replace '-' with '_';
    return $ctrl_name;
	}
}

if (! function_exists('active_menu'))
{
	function active_menu($controller) {
		//$controller = $controller == ''? 'home' : $controller;
		$CI =& get_instance();

		$query = $CI->db->query("
			SELECT *
			FROM 	menu
			WHERE
					controller = '$controller'
		");
		$active_menu = array();
		if ($query->num_rows()) {
			$active_menu = $query->row_array();
		}
		return $active_menu;
	}
}
/*
|	SIDE MENU (not hidden only)
| 	----------------------------------------------------------------
*/
if(! function_exists('side_menu'))
{
	function side_menu($groups, $active) {
		$CI     =& get_instance();
		$active = active_menu($active);

		// -- menu--
		echo '
			<li class="header">MAIN NAVIGATION</li>
		';

		// -- parent
		$query_par	= $CI->db->query("
			SELECT id as id, name as name, controller as controller, function as function, icon as icon
			FROM authority
			INNER JOIN menu ON id = menu_id
			WHERE grup_id = 1 && is_parent = 0 && is_sub = 0
			ORDER BY id ASC
		");
		if($query_par->num_rows()) {
			foreach ($query_par->result() as $row_par) {
				$id_par 							= $row_par->id;
				$name_par							= $row_par->name;
				$controller_par 			= $row_par->controller;
				$function_par 				= $row_par->function;
				$icon_par							= $row_par->icon;
				$treeview_active_par1 = $id_par == $active['is_parent']? 'active' : '';
				$treeview_active_par2 = $id_par == $active['id']? 'active' : '';
				$treeview_open_par 		= $id_par == $active['is_parent']? 'menu-open' : '';
				$treeview_display_par = $id_par == $active['is_parent']? 'block' : 'none';

					// -- cek parent punya sub tidak
					$query_cksub	= $CI->db->query("
						SELECT id as id, name as name, controller as controller, function as function, icon as icon
						FROM authority
						INNER JOIN menu ON id = menu_id
						WHERE grup_id = 1 && is_parent = $id_par && is_sub = 0
						ORDER BY id ASC
					");
					if ($query_cksub->num_rows()) {
						echo '
							<li class="treeview '.$treeview_active_par1.'">
								'.anchor($controller_par.'/'.$function_par, '<i class="'.$icon_par.'"></i> '.ucwords($name_par).' <i class="fa fa-angle-left pull-right"></i>').'
								<ul class="treeview-menu '.$treeview_open_par.'" style="display: '.$treeview_display_par.'">
						';

						foreach($query_cksub->result() as $row_sub) {
							$id_sub 							= $row_sub->id;
							$name_sub							= $row_sub->name;
							$controller_sub 			= $row_sub->controller;
		          $function_sub 				= $row_sub->function;
							$icon_sub							= $row_sub->icon;
							$treeview_active_sub1 = $id_sub == $active['is_sub']? 'active' : '';
							$treeview_active_sub2 = $id_sub == $active['id']? 'active' : '';
		          $treeview_open_sub 		= $id_sub == $active['is_sub']? 'menu-open' : '';
		          $treeview_display_sub = $id_sub == $active['is_sub']? 'block' : 'none';

							// -- cek sub punya menu tidak
							$query_ckmn	= $CI->db->query("
								SELECT id as id, name as name, controller as controller, function as function, icon as icon
								FROM authority
								INNER JOIN menu ON id = menu_id
								WHERE grup_id = 1 && is_parent = $id_par && is_sub = $id_sub
								ORDER BY id ASC
							");
							if ($query_ckmn->num_rows()) {
								echo '
									<li class="treeview '.$treeview_active_sub1.'">
										'.anchor($controller_sub.'/'.$function_sub, '<i class="'.$icon_sub.'"></i> '.ucwords($name_sub).' <i class="fa fa-angle-left pull-right"></i>').'
										<ul class="treeview-menu '.$treeview_open_sub.'" style="display: '.$treeview_display_par.'">
								';

								foreach($query_ckmn->result() as $row_mn) {
									$id_mn 							= $row_mn->id;
									$name_mn						= $row_mn->name;
									$controller_mn 			= $row_mn->controller;
				          $function_mn				= $row_mn->function;
									$icon_mn						= $row_mn->icon;
									$treeview_active_mn = $id_mn == $active['id']? 'active' : '';

									echo '
										 	<li class="'.$treeview_active_mn.'">
										 		'.anchor($controller_mn.'/'.$function_mn, '<i class="'.$icon_mn.'"></i> '.ucwords($name_mn)).'
											</li>
									';
								} // end foreach query_ckmn
								echo '
										</ul>
									</li>
								';

							} else {
								echo '
										<li class="'.$treeview_active_sub2.'">
											'.anchor($controller_sub.'/'.$function_sub, '<i class="'.$icon_sub.'"></i> '.ucwords($name_sub)).'
										</li>
								';
							}

						} // end foreach query_cksub

            echo '
                </ul>
              </li>
            ';
					} else {
						echo '
								<li class="'.$treeview_active_par2.'">
									'.anchor($controller_par.'/'.$function_par, '<i class="'.$icon_par.'"></i> <span>'.ucwords($name_par)).'</span>
								</li>
						';
					}
			} // end foreach query_par
		} // end query_par (parent)

	}
}

/*
if (! function_exists('name_function'))
{
	function name_function($var) {

		$CI =& get_instance();

		return $var;
	}
}
*/
