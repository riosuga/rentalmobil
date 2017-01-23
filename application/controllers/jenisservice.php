<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenisservice extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect();
        }
		$this->load->model('crud');
	}

	public function index() {
		$data['read'] = $this->crud->read_jenisservice();
		$this->load->view('select/jenisservice', $data);
	}
	
	public function add_jenisservice()	{
		$this->load->view('insert/jenisservice');
	}
	
	public function create_jenisservice() {
		$this->form_validation->set_rules('kode', 'Kode Merk', 'trim|required|is_unique[jenisservice.IDJenisService]');
		$this->form_validation->set_rules('nama', 'Nama Merk', 'trim|required');
		
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('jenisservice/add_jenisservice');
		} else {
			$data = array(
				'IDJenisService' => $this->input->post('kode'),
				'NmJenisService' => $this->input->post('nama')
			);
			$this->crud->create_jenisservice($data);
			redirect('jenisservice');
		}
	}
	
	public function change_jenisservice() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_jenisservice($id);
		$this->load->view('update/jenisservice', $data);
	}
	
	public function update_jenisservice() {
		$this->form_validation->set_rules('nama', 'Nama Jenis Service', 'trim|required');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('jenisservice/change_jenisservice/'.$id);
		} else {
			$data = array(
				'NmJenisService' => $this->input->post('nama')
			);
			$this->crud->update_jenisservice($id,$data);
			redirect('jenisservice');
		}
	}
	
	public function delete_jenisservice() {
		$id = $this->uri->segment(3);
		$this->crud->delete_jenisservice($id);
		redirect('jenisservice');
	}

}

/* End of file jenis_kendaraan.php */
/* Location: ./application/controllers/jenis_kendaraan.php */