<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
//---------------------------------------------------------------------------------------------------//	Karyawan
	public function create_karyawan($data) {
		$this->db->insert('karyawan', $data);
	}
	
	public function read_karyawan() {
		$query = $this->db->query('SELECT karyawan.*, login.Username FROM karyawan LEFT JOIN login ON karyawan.id = login.idkary');
		return $query->result_array();
	}
	
	public function readupdate_karyawan($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('karyawan');
		return $query->result_array();
	}
	
	public function update_karyawan($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('karyawan', $data);
	}
	
	public function delete_karyawan($id) {
		$this->db->where('id', $id);
		$this->db->delete('karyawan');
	}
	
	public function check_karyawan($id) {
		$condition = "(TypeUser=1 OR TypeUser=2) AND idkary=".$id;
		$this->db->where('idkary', $id);
		$query = $this->db->get('login');
		
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
//---------------------------------------------------------------------------------------------------//	Login
	public function create_login($data) {
		$this->db->insert('login', $data);
	}
	
	public function readupdate_login($id) {
		$this->db->where('idkary', $id);
		$query = $this->db->get('login');
		return $query->result_array();
	}
	
	public function update_login($id, $data) {
		$this->db->where('idkary', $id);
		$this->db->update('login', $data);
	}

//---------------------------------------------------------------------------------------------------//	Merk
	public function create_merk($data) {
		$this->db->insert('merk', $data);
	}
	
	public function read_merk() {
		$query = $this->db->get('merk');
		return $query->result_array();
	}
	
	public function readupdate_merk($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('merk');
		return $query->result_array();
	}
	
	public function list_type($id) {
		$this->db->where('idmerk', $id);
		$query = $this->db->get('type');
		return $query->result_array();
	}
	
	public function update_merk($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('merk', $data);
	}
	
	public function delete_merk($id) {
		$this->db->where('id', $id);
		$this->db->delete('merk');
	}

//---------------------------------------------------------------------------------------------------//	Type
	public function create_type($data) {
		$this->db->insert('type', $data);
	}
	
	public function read_type() {
		$query = $this->db->get('type');
		return $query->result_array();
	}
	
	public function readupdate_type($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('type');
		return $query->result_array();
	}
	
	public function list_merk($id) {
		$this->db->where('idtype', $id);
		$query = $this->db->get('merk');
		return $query->result_array();
	}
	
	public function update_type($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('type', $data);
	}
	
	public function delete_type($id) {
		$this->db->where('id', $id);
		$this->db->delete('type');
	}
	
//---------------------------------------------------------------------------------------------------//	Service
	public function create_service($data) {
		$this->db->insert('service', $data);
	}
	
	public function read_service() {
		$query = $this->db->get('service');
		return $query->result_array();
	}

	public function read_jenis(){
		$query = $this->db->get('jenisservice');
		return $query->result_array();
	}
	
	public function readupdate_service($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('service');
		return $query->result_array();
	}
	
	public function update_service($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('service', $data);
	}
	
	public function delete_service($id) {
		$this->db->where('id', $id);
		$this->db->delete('service');
	}
	
//---------------------------------------------------------------------------------------------------//	Jenis Service
	public function create_jenisservice($data) {
		$this->db->insert('jenisservice', $data);
	}
	
	public function read_jenisservice() {
		$query = $this->db->get('jenisservice');
		return $query->result_array();
	}
	
	public function readupdate_jenisservice($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('jenisservice');
		return $query->result_array();
	}
	
	public function update_jenisservice($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('jenisservice', $data);
	}
	
	public function delete_jenisservice($id) {
		$this->db->where('id', $id);
		$this->db->delete('jenisservice');
	}
	
//---------------------------------------------------------------------------------------------------//	Pemilik
	public function create_pemilik($data) {
		$this->db->insert('pemilik', $data);
	}
	
	public function read_pemilik() {
		$query = $this->db->get('pemilik');
		return $query->result_array();
	}
	
	public function readupdate_pemilik($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('pemilik');
		return $query->result_array();
	}
	
	public function update_pemilik($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('pemilik', $data);
	}
	
	public function delete_pemilik($id) {
		$this->db->where('id', $id);
		$this->db->delete('pemilik');
	}

	public function list_setoran($id) {
		$this->db->where('IDPemilik', $id);
		$query = $this->db->get('setoran');
		return $query->result_array();
	}

	public function list_kendaraan($id) {
		$this->db->where('IDPemilik', $id);
		$query = $this->db->get('kendaraan');
		return $query->result_array();
	}

//---------------------------------------------------------------------------------------------------//	Setoran
	public function create_setoran($data) {
		$this->db->insert('setoran', $data);
	}
	
	public function read_setoran() {
		$query = $this->db->get('setoran');
		return $query->result_array();
	}
	
	public function readupdate_setoran($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('setoran');
		return $query->result_array();
	}
	
	public function update_setoran($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('setoran', $data);
	}
	
	public function delete_setoran($id) {
		$this->db->where('id', $id);
		$this->db->delete('setoran');
	}

//---------------------------------------------------------------------------------------------------//	Kendaraan
	public function create_kendaraan($data) {
		$this->db->insert('kendaraan', $data);
	}
	
	public function read_kendaraan() {
		$query = $this->db->get('kendaraan');
		return $query->result_array();
	}
	
	public function readdetail_kendaraan($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('kendaraan');
		return $query->result_array();
	}
	
	public function readupdate_kendaraan($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('kendaraan');
		return $query->result_array();
	}
	
	public function update_kendaraan($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('kendaraan', $data);
	}
	
	public function delete_kendaraan($id) {
		$this->db->where('id', $id);
		$this->db->delete('kendaraan');
	}

	public function read_kendaraan_where($idpemilik){
		$this->db->where('IDPemilik', $idpemilik);
		$this->db->get('kendaraan');
		return $query->result_array();
	}

	/*public function list_service($id) {
		$this->db->where('IDKendaraan', $id);
		$query = $this->db->get('setoran');
		return $query->result_array();
	}*/

	public function list_service_car($id) {
		$this->db->where('IDKendaraan', $id);
		$query = $this->db->get('service');
		return $query->result_array();
	}

//---------------------------------------------------------------------------------------------------//	Sopir
	public function create_sopir($data) {
		$this->db->insert('sopir', $data);
	}
	
	public function read_sopir() {
		$query = $this->db->get('sopir');
		return $query->result_array();
	}
	
	public function readupdate_sopir($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('sopir');
		return $query->result_array();
	}
	
	public function update_sopir($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('sopir', $data);
	}
	
	public function delete_sopir($id) {
		$this->db->where('id', $id);
		$this->db->delete('sopir');
	}
	
	public function check_sopir($id) {
		$condition = "(TypeUser=1 OR TypeUser=2) AND idkary=".$id;
		/*$this->db->group_by('TypeUser');
		
		$this->db->where('TypeUser', '1');
		$this->db->or_where('TypeUser', '2');*/
		$this->db->where($condition);
		$query = $this->db->get('login');
		
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
//---------------------------------------------------------------------------------------------------//	Pelanggan
	public function create_pelanggan($data) {
		$this->db->insert('pelanggan', $data);
	}
	
	public function read_pelanggan() {
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}
	
	public function readupdate_pelanggan($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}
	
	public function update_pelanggan($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('pelanggan', $data);
	}
	
	public function delete_pelanggan($id) {
		$this->db->where('id', $id);
		$this->db->delete('pelanggan');
	}
	
//---------------------------------------------------------------------------------------------------//	Transaksi Sewa
	public function create_transaksi($data) {
		$this->db->insert('transaksisewa', $data);
	}
	
	public function list_kendmerk() {
		$this->db->select('kendaraan.*, merk.NmMerk, Type.NmType');
		$this->db->from('kendaraan');
		$this->db->join('type', 'kendaraan.IDType = type.id');
		$this->db->join('merk', 'type.idmerk = merk.id');
		$this->db->where('kendaraan.StatusRental', '1');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function read_transaksi() {
		$this->db->select('transaksisewa.*, pelanggan.NamaPel');
		$this->db->from('transaksisewa');
		$this->db->join('pelanggan', 'transaksisewa.IDPelanggan = pelanggan.id');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function readupdate_transaksi($id) {
		$this->db->select('transaksisewa.*, sopir.NmSopir, sopir.TarifperJam, kendaraan.NoPlat, kendaraan.TarifperJam as trf');
		$this->db->from('transaksisewa');
		$this->db->join('kendaraan', 'transaksisewa.IDKendaraan = kendaraan.id');
		$this->db->join('sopir', 'transaksisewa.IDSopir = sopir.id', 'left');
		$this->db->where('transaksisewa.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function detail_transaksi($id) {
		$this->db->select('transaksisewa.*, pelanggan.NamaPel, sopir.NmSopir, kendaraan.NoPlat');
		$this->db->from('transaksisewa');
		$this->db->join('pelanggan', 'transaksisewa.IDPelanggan = pelanggan.id');
		$this->db->join('kendaraan', 'transaksisewa.IDKendaraan = kendaraan.id');
		$this->db->join('sopir', 'transaksisewa.IDSopir = sopir.id', 'left');
		$this->db->where('transaksisewa.id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function update_transaksi($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('transaksisewa', $data);
	}
	
	public function delete_transaksi($id) {
		$this->db->where('id', $id);
		$this->db->delete('transaksisewa');
	}
}