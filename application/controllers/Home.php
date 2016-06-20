<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// jika belum login, login dulu
    if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
      $this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth/login', 'refresh');
		}

    // tidak punya hak akses terhadap controller ini
    //if ( $this->auth->has_grant($this->session->userdata('user_id'),$_SERVER['REQUEST_URI']) === FALSE ) {
      //  access_denied();
    //}

    $prefs = array(
			'start_day'    => 'monday',
			'month_type'   => 'long',
			'day_type'     => 'long',
			'show_next_prev'  => TRUE,
			'next_prev_url'   => base_url().'mod/dashboard/calendar-show'

		);
		$prefs['template'] = array(
			'table_open'           		=> '<table class="table table-bordered">',
			'heading_previous_cell'		=> '<th><a href="{previous_url}" class="btn btn-flat btn-default btn-sm pull-right">&lt;&lt;',
			'heading_title_cell'		=> '<th colspan="{colspan}" class="text-center">{heading}',
			'heading_next_cell'			=> '<th><a href="{next_url}" class="btn btn-flat btn-default btn-sm pull-left">&gt;&gt;',
			'cal_cell_start'       		=> '<td class="day">',
			'cal_cell_start_today' 		=> '<td class="today">',
			'cal_cell_start_today'		=> '<td class="bg-aqua">'
		);

		$this->load->library('calendar', $prefs);
	}

	function index()
	{
		$data['calendar'] = $this->calendar->generate();

		$user_id 	= $this->session->userdata('user_id');
		$user_groups = $this->ion_auth->get_users_groups($user_id)->row();
		$data['groups'] = $user_groups->id;

		//$this->load->view('design/header');
    //$this->load->view('design/side_menu', $data);
    //$this->load->view('dashboard/home', $data);
		//$this->load->view('design/footer');
		$this->template->load('design/template', 'dashboard/home', $data);
  }

}
