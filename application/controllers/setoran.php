<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setoran extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect();
        }
		$this->load->model('crud');
	}

	public function index() {
		$data['read'] = $this->crud->read_setoran();
		$this->load->view('select/setoran', $data);
	}
	
	public function add_setoran()	{
		$data['setoran'] = $this->uri->segment(3);
		$this->load->view('insert/setoran', $data);
	}
	
	public function create_setoran() {
		$this->form_validation->set_rules('kode', 'kode', 'trim|required|is_unique[setoran.NoSetoran]');
		$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('setoran/add_setoran/'.$id);
		} else {
			$idkaryawan= $this->session->userdata('idkary');
			$data = array(
				'NoSetoran' => $this->input->post('kode'),
				'TglSetoran' => $this->input->post('tgl'),
				'Jumlah'	=> $this->input->post('jumlah'),
				'IDPemilik' => $id,
				'IDKaryawan' => $idkaryawan
			);
			$this->crud->create_setoran($data);
			redirect('pemilik/detail_pemilik/'.$id);
		}
	}
	
	/*public function detail_setoran() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->readupdate_setoran($id);
		$data['type'] = $this->crud->list_type($id);
		$this->load->view('detail/setoran', $data);
	}*/
	
	public function change_setoran() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_setoran($id);
		$this->load->view('update/setoran', $data);
	}
	
	public function update_setoran() {
		$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('setoran/change_setoran/'.$id);
		} else {
			$data = array(
				'TglSetoran' => $this->input->post('tgl'),
				'Jumlah' => $this->input->post('jumlah'),
			);
			$this->crud->update_setoran($id,$data);
			redirect('pemilik/detail_pemilik/'.$this->input->post('idtype'));
		}
	}
	
	public function delete_setoran() {
		$id = $this->uri->segment(3);
		$this->crud->delete_setoran($id);
		redirect('pemilik');
	}

}

/* End of file setoran.php */
/* Location: ./application/controllers/setoran.php */