<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect();
        }
		$this->load->model('crud');
	}

	public function index() {
		$data['read'] = $this->crud->read_service_car();
		$this->load->view('select/service', $data);
	}
	
	public function add_service()	{
		$data['idkendaraan'] = $this->uri->segment(3);
		$data['list'] = $this->crud->read_jenis();
		$this->load->view('insert/service', $data);
	}
	
	public function create_service() {
		$this->form_validation->set_rules('kode', 'kode', 'trim|required|is_unique[service.KodeService]');
		$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
		$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
		$this->form_validation->set_rules('idtype', 'idtype', 'trim|required');

		$id = $this->input->post('idkendaraan');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('service/add_service');
		} else {
			$data = array(
				'KodeService' => $this->input->post('kode'),
				'TglService' => $this->input->post('tgl'),
				'BiayaService' => $this->input->post('biaya'),			
				'IDkendaraan' => $id,
				'IDJenisService' => $this->input->post('idtype')
			);
			$this->crud->create_service($data);
			redirect('kendaraan/detail_kendaraan/'.$id);
		}
	}
	
	public function detail_service() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->readupdate_service_car($id);
		$data['list'] = $this->crud->list_service_car($id);
		// $data['merk'] = $this->crud->list_merk($id);
		// $data['service'] = $this->crud->list_service($id);
		$this->load->view('detail/service', $data);
	}
	
	public function change_service() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_service_car($id);
		$this->load->view('update/service', $data);
	}
	
	public function update_service() {
		$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
		$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
				
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('service/change_service/'.$id);
		} else {
			$data = array(
				'TglService' => $this->input->post('tgl'),
				'BiayaService' => $this->input->post('biaya')			
			);
			$this->crud->update_service($id,$data);
			redirect('kendaraan/detail_kendaraan/'.$this->input->post('idpem'));
		}
	}
	
	public function delete_service() {
		$id = $this->uri->segment(3);
		$this->crud->delete_service($id);
		redirect('kendaraan');
	}


}

/* End of file service.php */
/* Location: ./application/controllers/service.php */