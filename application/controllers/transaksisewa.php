<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksisewa extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect();
        }
		$this->load->model('crud');
		$this->load->helper('date');
	}
	
	public function index() {
		$data['read'] = $this->crud->read_transaksi();
		$this->load->view('select/transaksi', $data);
	}

	public function add_transaksi() {
		$data['pel'] = $this->crud->read_pelanggan();
		$data['sopir'] = $this->crud->read_sopir();
		$data['kend'] = $this->crud->list_kendmerk();
		$this->load->view('insert/transaksi', $data);
	}
	
	public function create_transaksi() {
		$this->form_validation->set_rules('no', 'Nomor Transaksi', 'trim|required|is_unique[transaksisewa.NoTransaksi]');
		$this->form_validation->set_rules('tgl_pjm', 'Tanggal Peminjaman', 'trim|required');
		$this->form_validation->set_rules('jam_pjm', 'Jam Peminjaman', 'trim|required');
		$this->form_validation->set_rules('tgl_kemb', 'Rencana Tanggal Pengembalian', 'trim|required');
		$this->form_validation->set_rules('jam_kemb', 'Rencana Jam Pengembalian', 'trim|required');
		$this->form_validation->set_rules('km_pjm', 'Kilometer Peminjaman', 'trim|required|numeric');
		$this->form_validation->set_rules('bbm_pjm', 'BBM Peminjaman', 'trim|required|numeric');
		$this->form_validation->set_rules('kondisi', 'Kondisi Kendaraan', 'trim|required');
		
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('transaksisewa/add_transaksi');
		} else {
			$data = array(
				'NoTransaksi' => $this->input->post('no'),
				'IDPelanggan' => $this->input->post('pelanggan'),
				'IDKendaraan' => $this->input->post('tipe'),
				'IDSopir' => $this->input->post('sopir'),
				'TglPinjam' => $this->input->post('tgl_pjm'),
				'JamPinjam' => $this->input->post('jam_pjm'),
				'TglKembaliRencana' => $this->input->post('tgl_kemb'),
				'JamKembaliRencana' => $this->input->post('jam_kemb'),
				'KilometerPinjam' => $this->input->post('km_pjm'),
				'BBMPinjam' => $this->input->post('bbm_pjm'),
				'KondisiMobilPinjam' => $this->input->post('kondisi'),
				'TglPesan' => date('Y-m-d'),
				'IDKaryawan' => $this->session->userdata('idkary')
			);
			$this->crud->create_transaksi($data);
			redirect('transaksisewa');
		}
	}
	
	public function detail_transaksi() {
		$id = $this->uri->segment(3);
		$data['detail'] = $this->crud->detail_transaksi($id);
		$this->load->view('detail/transaksi', $data);
	}
	
	public function change_transaksi() {
		$id = $this->uri->segment(3);
		$data['change'] = $this->crud->readupdate_transaksi($id);
		$this->load->view('update/transaksi', $data);
	}
	
//----------------------------------------------------------------------------------------------------//
	public function update_transaksi() {
		$this->form_validation->set_rules('tgl_k', 'Tanggal Pengembalian', 'trim|required');
		$this->form_validation->set_rules('jam_k', 'Jam Pengembalian', 'trim|required');
		$this->form_validation->set_rules('km_k', 'KM Pengembalian', 'trim|required|numeric');
		$this->form_validation->set_rules('bbm_k', 'BBM Pengembalian', 'trim|required|numeric');
		$this->form_validation->set_rules('kondisi_k', 'Kondisi Pengembalian', 'trim|required');
		$this->form_validation->set_rules('kerusakan', 'Kerusakan', 'trim|required');
		$this->form_validation->set_rules('kerusakan_b', 'Biaya Kerusakan', 'trim|required|numeric');
		
		$id = $this->input->post('id');
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_message', 'Some field is Invalid');
			redirect('transaksisewa/change_transaksi/'.$id);
		} else {
			if ($this->input->post('bbm_k') >= $this->input->post('bbm_p')) {
				$bbm = 0;
			} else {
				$bbm = (($this->input->post('bbm_p') - $this->input->post('bbm_k')) * 7100);
			}
			$datetime1 = date_create($this->input->post('tgl_p'));	// Pinjam
			$datetime2 = date_create($this->input->post('tgl_r'));	// Rencana
			$datetime3 = date_create($this->input->post('tgl_k'));	// Kembali
			$tangg = (int) date_diff($datetime1, $datetime3)->format('%R%a');
			$t_den = (int) date_diff($datetime2, $datetime3)->format('%R%a');
			$datetime4 = date_create($this->input->post('jam_p'));	// Pinjam
			$datetime5 = date_create($this->input->post('jam_r'));	// Rencana
			$datetime6 = date_create($this->input->post('jam_k'));	// Kembali
			$jammm = (int) date_diff($datetime4, $datetime6)->format('%R%H');
			$j_den = (int) date_diff($datetime5, $datetime6)->format('%R%H');
			$denda = ((($t_den * 24) + $j_den) * 1000);
			$total = $bbm + ((($tangg * 24) + $jammm) * $this->input->post('h_sop')) + ((($tangg * 24) + $jammm) * $this->input->post('h_ken')) + $this->input->post('kerusakan_b') + $denda;
			
			$data = array(
				'TglKembaliRealisasi' => $this->input->post('tgl_k'),
				'JamKembaliReal' => $this->input->post('jam_k'),
				'KilometerKembali' => $this->input->post('km_k'),
				'BBMKembali' => $this->input->post('bbm_k'),
				'KondisiMobilKembali' => $this->input->post('kondisi_k'),
				'Kerusakan' => $this->input->post('kerusakan'),
				'BiayaKerusakan' => $this->input->post('kerusakan_b'),
				'BiayaBBM' => $bbm,
				'Denda' => $denda,
				'total' => $total
			);
			$this->crud->update_transaksi($id,$data);
			redirect('transaksisewa/detail_transaksi/'.$id);
		}
	}
	
	public function delete_transaksi() {
		$id = $this->uri->segment(3);
		$this->crud->delete_transaksi($id);
		redirect('transaksisewa');
	}

}