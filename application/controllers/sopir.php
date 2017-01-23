<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
					'username' => $row['username'],
					'email' => $row['email'],
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sess_array);
			}*/

class Sopir extends CI_Controller {

	public function __construct() {
		parent::__construct();
			if ( ! $this->session->userdata('logged_in'))
        		{ 
            		redirect();
       			}
			$this->load->model('crud');
		}

	public function index() {
		$data['read'] = $this->crud->read_sopir();
		$this->load->view('select/sopir', $data);
	}
	
	public function add_sopir() {
		$this->load->view('insert/sopir');
	}
	
	public function create_sopir() {
		$this->form_validation->set_rules('kode', 'kode', 'trim|required|is_unique[sopir.IDSopir]');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('telp', 'telp', 'trim|required');
		$this->form_validation->set_rules('nosim', 'nosim', 'trim|required');
		$this->form_validation->set_rules('tarif', 'tarif', 'trim|required');

		
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('sopir/add_sopir');
		} else {
			$data = array(
				'IDSopir' => $this->input->post('kode'),
				'NmSopir' => $this->input->post('nama'),
				'AlmtSopir' => $this->input->post('alamat'),
				'TelpSopir' => $this->input->post('telp'),
				'NoSIM' => $this->input->post('nosim'),
				'TarifperJam'=>$this->input->post('tarif')
			);
			$this->crud->create_sopir($data);
			redirect('sopir');
		}
	}
	
	public function detail_sopir() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->readupdate_sopir($id);
		$show = $this->crud->check_sopir($id);
		var_dump($show);
		if($show = FALSE){
			$data['tampil'] = 1;
		}else{
			$data['tampil'] = 2;
		}
		$this->load->view('detail/sopir', $data);
	}
	
	public function delete_sopir() {
		$id = $this->uri->segment(3);
		$this->crud->delete_sopir($id);
		redirect('sopir');
	}

	public function update_sopir() {
		$this->form_validation->set_rules('nama', 'Nama sopir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat sopir', 'trim|required');
		$this->form_validation->set_rules('telp', 'Nomor Telepon sopir', 'trim|required');
		$this->form_validation->set_rules('nosim', 'No SIM', 'trim|required');
		$this->form_validation->set_rules('tarif', 'Tarif per Jam', 'trim|required');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('sopir/change_sopir', $id);
		} else {
			$data = array(
				'Nmsopir' => $this->input->post('nama'),
				'Almtsopir' => $this->input->post('alamat'),
				'Telpsopir' => $this->input->post('telp'),
				'NoSIM' => $this->input->post('nosim'),
				'TarifperJam' => $this->input->post('tarif')
			);
			$this->crud->update_sopir($id,$data);
			redirect('sopir');
		}
	}

	public function change_sopir() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_sopir($id);
		$this->load->view('update/sopir', $data);
	}

}

/* End of file sopir.php */
/* Location: ./application/controllers/sopir.php */