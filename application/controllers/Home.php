<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['judul'] = 'Home Page';

		$this->load->view('templates/header', $data);
		$this->load->view('Home/index');
		$this->load->view('templates/footer');
	}
}
