<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {

	public function __construct() {
		parent::__construct();
			if ( ! $this->session->userdata('logged_in'))
        		{ 
            		redirect();
       			}
			$this->load->model('crud');
		}

	public function index() {
		$data['read'] = $this->crud->read_pemilik();
		$this->load->view('select/pemilik', $data);
	}
	
	public function add_pemilik() {
		$this->load->view('insert/pemilik');
	}
	
	public function create_pemilik() {
		$this->form_validation->set_rules('kode', 'kode', 'trim|required|is_unique[pemilik.KodePemilik]');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('telp', 'telp', 'trim|required');
		
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('pemilik/add_pemilik');
		} else {
			$data = array(
				'KodePemilik' => $this->input->post('kode'),
				'NmPemilik' => $this->input->post('nama'),
				'AlmtPemilik' => $this->input->post('alamat'),
				'TelpPemilik' => $this->input->post('telp')
			);
			$this->crud->create_pemilik($data);
			redirect('pemilik');
		}
	}
	
	public function detail_pemilik() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->readupdate_pemilik($id);
		$data['setoran'] = $this->crud->list_setoran($id);
		$data['kendaraan'] = $this->crud->list_kendaraan($id);
		$this->load->view('detail/pemilik', $data);
	}

	public function change_pemilik() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_pemilik($id);
		$this->load->view('update/pemilik', $data);
	}

	public function update_pemilik() {
		$this->form_validation->set_rules('nama', 'Nama pemilik', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat pemilik', 'trim|required');
		$this->form_validation->set_rules('telp', 'Nomor Telepon pemilik', 'trim|required');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('pemilik/change_pemilik', $id);
		} else {
			$data = array(
				'NmPemilik' => $this->input->post('nama'),
				'AlmtPemilik' => $this->input->post('alamat'),
				'TelpPemilik' => $this->input->post('telp')
			);
			$this->crud->update_pemilik($id,$data);
			redirect('pemilik');
		}
	}
	
	public function delete_pemilik() {
		$id = $this->uri->segment(3);
		$this->crud->delete_pemilik($id);
		redirect('pemilik');
	}

}

/* End of file pemilik.php */
/* Location: ./application/controllers/pemilik.php */