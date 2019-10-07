<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_mahasiswa');
    }
	public function index()
	{
        $data['judul'] = 'Daftar Mahasiwa';
        $data['mahasiswa'] = $this->M_mahasiswa->tampilsemua();

		$this->load->view('templates/header', $data);
		$this->load->view('Mahasiswa/index', $data);
		$this->load->view('templates/footer');
    }

	public function ubahdataview($id)
	{
        $data['judul'] = 'Ubah Data Mahasiwa';
        $data['mahasiswa'] = $this->M_mahasiswa->ambildatamahasiswa($id);

		$this->load->view('templates/header', $data);
		$this->load->view('Mahasiswa/editdata', $data);
		$this->load->view('templates/footer');
    }

	public function tambahdataview()
	{
        $data['judul'] = 'Tambah Data Mahasiwa';

		$this->load->view('templates/header', $data);
		$this->load->view('Mahasiswa/tambahdata');
		$this->load->view('templates/footer');
    }

	public function tambahdataMahasiswa()
	{
        $data['mahasiswa'] = $this->M_mahasiswa->tambahdatamahasiswa();
        redirect('mahasiswa');
    }

	public function ubahdataMahasiswa()
	{
        $data['mahasiswa'] = $this->M_mahasiswa->ubahdatamahasiswa();
        redirect('mahasiswa');
    }

	public function hapus($id)
	{
        $data['mahasiswa'] = $this->M_mahasiswa->hapusdatamahasiswa($id);
        redirect('mahasiswa');
    }
    
    
}
