<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct() {
		parent::__construct();
			if ( ! $this->session->userdata('logged_in'))
        		{ 
            		redirect();
       			}
			$this->load->model('crud');
		}

	public function index() {
		$data['read'] = $this->crud->read_pelanggan();
		$this->load->view('select/pelanggan', $data);
	}
	
	public function add_pelanggan() {
		$this->load->view('insert/pelanggan');
	}
	
	public function create_pelanggan() {
		$this->form_validation->set_rules('noktp', 'No KTP', 'trim|required|is_unique[pelanggan.noktp]');
		$this->form_validation->set_rules('namapel', 'Nama pelanggan', 'trim|required');
		$this->form_validation->set_rules('alamatpel', 'Alamat pelanggan', 'trim|required');
		$this->form_validation->set_rules('telppel', 'Nomor Telepon pelanggan', 'trim|required');
		
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('pelanggan/add_pelanggan');
		} else {
			$data = array(
				'NoKTP' => $this->input->post('noktp'),
				'NamaPel' => $this->input->post('namapel'),
				'AlamatPel' => $this->input->post('alamatpel'),
				'TelpPel' => $this->input->post('telppel')
			);
			$this->crud->create_pelanggan($data);
			redirect('pelanggan');
		}
	}
	
	public function detail_pelanggan() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->readupdate_pelanggan($id);
		$this->load->view('detail/pelanggan', $data);
	}
	
	public function delete_pelanggan() {
		$id = $this->uri->segment(3);
		$this->crud->delete_pelanggan($id);
		redirect('pelanggan');
	}

	public function update_pelanggan() {
		$this->form_validation->set_rules('namapel', 'Nama pelanggan', 'trim|required');
		$this->form_validation->set_rules('alamatpel', 'Alamat pelanggan', 'trim|required');
		$this->form_validation->set_rules('telppel', 'Nomor Telepon pelanggan', 'trim|required');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('pelanggan/change_pelanggan', $id);
		} else {
			$data = array(
				'NamaPel' => $this->input->post('namapel'),
				'AlamatPel' => $this->input->post('alamatpel'),
				'TelpPel' => $this->input->post('telppel')
			);
			$this->crud->update_pelanggan($id,$data);
			redirect('pelanggan');
		}
	}

	public function change_pelanggan() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_pelanggan($id);
		$this->load->view('update/pelanggan', $data);
	}

}

/* End of file pelanggan.php */
/* Location: ./application/controllers/pelanggan.php */