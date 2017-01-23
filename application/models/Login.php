<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function get_userpass($data) {
		$condition = "Username ='" . $data['username'] . "' AND Password ='" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->where($condition);
		$query = $this->db->get('login');
		
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function read_user_information($data) {
		$condition = "Username ='" . $data['username'] . "' AND Password ='" . $data['password'] . "'";
		$this->db->select('id');
		$this->db->select('idkary');
		$this->db->select('typeuser');
		$this->db->where($condition);
		$query = $this->db->get('login');
		return $query->result_array();
	}
	
}