<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sys_e extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('login');
		if ($this->session->userdata('logged_in')) { 
			$allowed = array('logout');
			if ( ! in_array($this->router->fetch_method(), $allowed)) {
				redirect('home');
			}
        }
	}
	
	public function index() {
		$this->load->view('login');
	}
	
	public function login_process() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|strtolower');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|strtolower');
		
		if($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$result = $this->login->get_userpass($data);
			if($result == TRUE){
				$result = $this->login->read_user_information($data);
				$sess_array = array();
				foreach ($result as $row) {
					$sess_array =array(
						# code...
						'id'=> $row['id'],
						'typeuser' => $row['TypeUser'],
						'idkary' => $row['idkary'],
						'logged_in'=> TRUE
					);
					$this->session->set_userdata($sess_array);
				}
				// $this->session->set_userdata($result);
				// $this->session->set_userdata('logged_in', $result);
				redirect('home');
			}else{
				$this->session->set_flashdata('error_message', 'Invalid Username or Password');
				redirect('sys_e');
			}
		}
		
	}
	
	public function logout() {
		/*$sess = array(
			'id',
			'typeuser',
			'idkary',
			'logged_in'=> FALSE
		);
		$this->session->unset_userdata($sess);*/
		$this->session->sess_destroy();
		// $this->session->unset_userdata('logged_in', $sess);
		// $this->session->set_flashdata('error_message', 'Successfully Logout');
		redirect('sys_e');
	}
}
