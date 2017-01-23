<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect();
        }
		$this->load->model('crud');
	}

	public function index() {
		$data['read']=$this->crud->read_karyawan();
		$this->load->view('select/karyawan',$data);
	}
	
	public function add_karyawan() {
		$this->load->view('insert/karyawan');
	}
	
	public function create_karyawan() {
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_unique[karyawan.NIK]');
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Karyawan', 'trim|required');
		$this->form_validation->set_rules('telp', 'Nomor Telepon', 'trim|required');
		
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('karyawan/add_karyawan');
		} else {
			$data = array(
				'NIK' => $this->input->post('nik'),
				'NmKaryawan' => $this->input->post('nama'),
				'AlmtKaryawan' => $this->input->post('alamat'),
				'TelpKaryawan' => $this->input->post('telp')
			);
			$this->crud->create_karyawan($data);
			redirect('karyawan');
		}
	}
	
	public function detail_karyawan() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->readupdate_karyawan($id);
		$show = $this->crud->check_karyawan($id);
		if($show == false){
			$data['tampil'] = FALSE;
		}else{
			$data['tampil'] = TRUE;
		}
		$this->load->view('detail/karyawan', $data);
	}
	
	public function change_karyawan() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_karyawan($id);
		$this->load->view('update/karyawan', $data);
	}
	
	public function update_karyawan() {
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat Karyawan', 'trim|required');
		$this->form_validation->set_rules('telp', 'Nomor Telepon Karyawan', 'trim|required');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('karyawan/change_karyawan/'.$id);
		} else {
			$data = array(
				'NmKaryawan' => $this->input->post('nama'),
				'AlmtKaryawan' => $this->input->post('alamat'),
				'TelpKaryawan' => $this->input->post('telp')
			);
			$this->crud->update_karyawan($id,$data);
			redirect('karyawan/detail_karyawan/'.$id);
		}
	}
	
	public function delete_karyawan() {
		$id = $this->uri->segment(3);
		$this->crud->delete_karyawan($id);
		redirect('karyawan');
	}

}

/* End of file karyawan.php */
/* Location: ./application/controllers/karyawan.php */