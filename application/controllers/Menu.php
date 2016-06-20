<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $menu = $this->Menu_model->get_all();

        $data = array(
            'menu_data' => $menu
        );

        $user_id 	= $this->session->userdata('user_id');
    		$user_groups = $this->ion_auth->get_users_groups($user_id)->row();
        $data['groups'] = $user_groups->id;

        $this->template->load('design/template', 'menu/menu_list', $data);
    }

    public function read($id)
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'controller' => $row->controller,
		'function' => $row->function,
		'icon' => $row->icon,
		'is_parent' => $row->is_parent,
		'is_sub' => $row->is_sub,
		'is_active' => $row->is_active,
	    );
            $this->load->view('menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'controller' => set_value('controller'),
	    'function' => set_value('function'),
	    'icon' => set_value('icon'),
	    'is_parent' => set_value('is_parent'),
	    'is_sub' => set_value('is_sub'),
	    'is_active' => set_value('is_active'),
	);
        $this->load->view('menu/menu_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'controller' => $this->input->post('controller',TRUE),
		'function' => $this->input->post('function',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'is_parent' => $this->input->post('is_parent',TRUE),
		'is_sub' => $this->input->post('is_sub',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
	    );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }

    public function update($id)
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'controller' => set_value('controller', $row->controller),
		'function' => set_value('function', $row->function),
		'icon' => set_value('icon', $row->icon),
		'is_parent' => set_value('is_parent', $row->is_parent),
		'is_sub' => set_value('is_sub', $row->is_sub),
		'is_active' => set_value('is_active', $row->is_active),
	    );
            $this->load->view('menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'controller' => $this->input->post('controller',TRUE),
		'function' => $this->input->post('function',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'is_parent' => $this->input->post('is_parent',TRUE),
		'is_sub' => $this->input->post('is_sub',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
	    );

            $this->Menu_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }

    public function delete($id)
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('controller', 'controller', 'trim|required');
	$this->form_validation->set_rules('function', 'function', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
	$this->form_validation->set_rules('is_parent', 'is parent', 'trim|required');
	$this->form_validation->set_rules('is_sub', 'is sub', 'trim|required');
	$this->form_validation->set_rules('is_active', 'is active', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "menu.xls";
        $judul = "menu";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Controller");
	xlsWriteLabel($tablehead, $kolomhead++, "Function");
	xlsWriteLabel($tablehead, $kolomhead++, "Icon");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Parent");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Sub");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Active");

	foreach ($this->Menu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->controller);
	    xlsWriteLabel($tablebody, $kolombody++, $data->function);
	    xlsWriteLabel($tablebody, $kolombody++, $data->icon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->is_parent);
	    xlsWriteNumber($tablebody, $kolombody++, $data->is_sub);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_active);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=menu.doc");

        $data = array(
            'menu_data' => $this->Menu_model->get_all(),
            'start' => 0
        );

        $this->load->view('menu/menu_doc',$data);
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-17 09:24:50 */
/* http://harviacode.com */
