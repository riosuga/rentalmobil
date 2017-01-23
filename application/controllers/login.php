<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect();
        }
		$this->load->model('crud');
	}

	public function add_login() {
		$data['idlog'] = $this->uri->segment(3);
		$this->load->view('insert/login', $data);
	}
	
	public function create_login() {
		$this->form_validation->set_rules('user', 'Username', 'trim|required|is_unique[login.Username]');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|md5');
		$this->form_validation->set_rules('type', 'Type User', 'trim|required');
		
		$id = $this->input->post('idkary');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('login/add_login/'.$id);
		} else {
			$data = array(
				'Username' => $this->input->post('user'),
				'Password' => $this->input->post('pass'),
				'TypeUser' => $this->input->post('type'),
				'idkary' => $id
			);
			$this->crud->create_login($data);
			redirect('karyawan/detail_karyawan/'.$id);
		}
	}
	
	public function change_login() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_login($id);
		$this->load->view('update/login', $data);
	}
	
	public function update_login() {
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|md5');
		$this->form_validation->set_rules('type', 'Type User', 'trim|required');
		
		$id = $this->input->post('idkary');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('login/change_login/'.$id);
		} else {
			$data = array(
				'Password' => $this->input->post('pass'),
				'TypeUser' => $this->input->post('type')
			);
			$this->crud->update_login($id,$data);
			redirect('karyawan/detail_karyawan/'.$id);
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */