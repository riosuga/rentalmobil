<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect();
        }
		$this->load->model('crud');
	}

	public function index() {
		$data['read'] = $this->crud->read_kendaraan();
		$this->load->view('select/kendaraan', $data);
	}
	
	public function add_kendaraan()	{
		$data['idpemilik'] = $this->uri->segment(3);
		$data['list'] = $this->crud->read_type();
		$this->load->view('insert/kendaraan', $data);
	}
	
	public function create_kendaraan() {
		$this->form_validation->set_rules('plat', 'Nomor Plat', 'trim|required|is_unique[kendaraan.NoPlat]');
		$this->form_validation->set_rules('thn', 'Tahun kendaraan', 'trim|required');
		$this->form_validation->set_rules('tarif', 'Tarif per Jam', 'trim|required');
		$this->form_validation->set_rules('idtype', 'Type Kendaraan', 'trim|required');
		
		$id = $this->input->post('idpemilik');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('kendaraan/add_kendaraan');
		} else {
			$data = array(
				'NoPlat' => $this->input->post('plat'),
				'Tahun' => $this->input->post('thn'),
				'TarifperJam' => $this->input->post('tarif'),
				'StatusRental' => '1',
				'IDType' => $this->input->post('idtype'),
				'IDPemilik' => $id
			);
			$this->crud->create_kendaraan($data);
			redirect('pemilik/detail_pemilik/'.$id);
		}
	}
	
	public function detail_kendaraan() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->readupdate_kendaraan($id);
		// $data['list'] = $this->crud->read_type();
		$data['list'] = $this->crud->list_service_car($id);
		// $data['merk'] = $this->crud->list_merk($id);
		// $data['service'] = $this->crud->list_service($id);
		$this->load->view('detail/kendaraan', $data);
	}
	
	public function change_kendaraan() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_kendaraan($id);
		$this->load->view('update/kendaraan', $data);
	}
	
	public function update_kendaraan() {
		$this->form_validation->set_rules('tahun', 'Tahun kendaraan', 'trim|required');
		$this->form_validation->set_rules('tarif', 'Tarif per Jam', 'trim|required');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('kendaraan/change_kendaraan/'.$id);
		} else {
			$data = array(
				'Tahun' => $this->input->post('tahun'),
				'TarifperJam' => $this->input->post('tarif'),
				'StatusRental' => $this->input->post('status')
			);
			$this->crud->update_kendaraan($id,$data);
			redirect('pemilik/detail_pemilik/'.$this->input->post('idpem'));
		}
	}
	
	public function delete_kendaraan() {
		$id = $this->uri->segment(3);
		$this->crud->delete_kendaraan($id);
		redirect('pemilik');
	}

}

/* End of file kendaraan.php */
/* Location: ./application/controllers/kendaraan.php */