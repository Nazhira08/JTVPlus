<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class frontpage extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//if ($this->session->userdata('level') == 'admin' && $this->session->userdata('level') == 'hrd') redirect('dashboard');
		if (block_ip() == '1') redirect('http://www.google.co.id',false);
		//if (cari_level($this->session->userdata('level')) == '1') redirect('frontpage');
	}

	public function index() {
			$data['action'] = site_url(uri_string());
         	$this->load->view('admin/frontpage', $data);
	}

}
