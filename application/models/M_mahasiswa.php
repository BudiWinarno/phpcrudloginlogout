<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {
	public function tampilsemua()
	{
        return $this->db->get('mahasiswa')->result_array();
	}

	public function ambildatamahasiswa($id)
	{
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
	}

	public function hapusdatamahasiswa($id)
	{
        $this->db->where('id', $id);
		$this->db->delete('mahasiswa');
	}

	public function tambahdatamahasiswa()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'nim' => $this->input->post('nim', true),
			'email' => $this->input->post('email', true),
			'jurusan' => $this->input->post('jurusan', true),
		];

        $this->db->insert('mahasiswa', $data);
	}

	public function ubahdatamahasiswa()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'nim' => $this->input->post('nim', true),
			'email' => $this->input->post('email', true),
			'jurusan' => $this->input->post('jurusan', true),
		];
		
		$this->db->where('id', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
	}
}
