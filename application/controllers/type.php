<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect();
        }
		$this->load->model('crud');
	}

	public function index() {
		$data['read'] = $this->crud->read_type();
		$this->load->view('select/type', $data);
	}
	
	public function add_type()	{
		$data['idmerk'] = $this->uri->segment(3);
		$this->load->view('insert/type', $data);
	}
	
	public function create_type() {
		$this->form_validation->set_rules('kode', 'ID Type', 'trim|required|is_unique[type.IDType]');
		$this->form_validation->set_rules('nama', 'Nama Type', 'trim|required');
		
		$id = $this->input->post('idmerk');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('type/add_type/'.$id);
		} else {
			$data = array(
				'IDType' => $this->input->post('kode'),
				'NmType' => $this->input->post('nama'),
				'idmerk' => $id
			);
			$this->crud->create_type($data);
			redirect('merk/detail_merk/'.$id);
		}
	}
	
	/*public function detail_merk() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->readupdate_merk($id);
		$data['type'] = $this->crud->list_type($id);
		$this->load->view('detail/merk', $data);
	}*/
	
	public function change_type() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_type($id);
		$this->load->view('update/type', $data);
	}
	
	public function update_type() {
		$this->form_validation->set_rules('nama', 'Nama Type', 'trim|required');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('type/change_type/'.$id);
		} else {
			$data = array(
				'NmType' => $this->input->post('nama')
			);
			$this->crud->update_type($id,$data);
			redirect('merk/detail_merk/'.$this->input->post('idmerk'));
		}
	}
	
	public function delete_type() {
		$id = $this->uri->segment(3);
		$this->crud->delete_type($id);
		redirect('merk');
	}

}

/* End of file merk.php */
/* Location: ./application/controllers/merk.php */