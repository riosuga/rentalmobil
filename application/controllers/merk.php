<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect();
        }
		$this->load->model('crud');
	}

	public function index() {
		$data['read'] = $this->crud->read_merk();
		$this->load->view('select/merk', $data);
	}
	
	public function add_merk()	{
		$this->load->view('insert/merk');
	}
	
	public function create_merk() {
		$this->form_validation->set_rules('kode', 'Kode Merk', 'trim|required|is_unique[merk.KodeMerk]');
		$this->form_validation->set_rules('nama', 'Nama Merk', 'trim|required');
		
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('merk/add_merk');
		} else {
			$data = array(
				'KodeMerk' => $this->input->post('kode'),
				'NmMerk' => $this->input->post('nama')
			);
			$this->crud->create_merk($data);
			redirect('merk');
		}
	}
	
	public function detail_merk() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->readupdate_merk($id);
		$data['type'] = $this->crud->list_type($id);
		$this->load->view('detail/merk', $data);
	}
	
	public function change_merk() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_merk($id);
		$this->load->view('update/merk', $data);
	}
	
	public function update_merk() {
		$this->form_validation->set_rules('nama', 'Nama Merk', 'trim|required');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('merk/change_merk/'.$id);
		} else {
			$data = array(
				'NmMerk' => $this->input->post('nama')
			);
			$this->crud->update_merk($id,$data);
			redirect('merk/detail_merk/'.$id);
		}
	}
	
	public function delete_merk() {
		$id = $this->uri->segment(3);
		$this->crud->delete_merk($id);
		redirect('merk');
	}

}

/* End of file type.php */
/* Location: ./application/controllers/type.php */