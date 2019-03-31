<?php
 // write your name and student id here
 //hariadi adha firmansyah - 1301174252
class Mahasiswa_model extends CI_model
{

	public function getAllMahasiswa()
	{
		//use query builder to get data table "mahasiswa"
		return $this->db->get('mahasiswa')->result();
	}

	public function tambahDataMahasiswa()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"nim" => $this->input->post('nim', true),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true),
		];

		//use query builder to insert $data to table "mahasiswa"
		$this->db->insert('mahasiswa',$data);
	}

	public function hapusDataMahasiswa($id)
	{
		//use query builder to delete data based on id
		return $this->db->delete('mahasiswa',array('id' => $id));
	}

	public function getMahasiswaById($id)
	{
		//get data mahasiswa based on id
		return $this->db->get_where('mahasiswa',array('id' => $id ))->row();
	}

	public function ubahDataMahasiswa()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"nim" => $this->input->post('nim', true),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true),
		];
		//use query builder class to update data mahasiswa based on id
		$this->db->update('mahasiswa', $data, array('id' => $this->input->post()['id'] ));
	}

	public function cariDataMahasiswa()
	{
		$keyword = $this->input->post('keyword', true);
		//use query builder class to search data mahasiswa based on keyword "nama" or "jurusan" or "nim" or "email"
		$this->db->like('nama',$keyword);
		$this->db->or_like('jurusan', $keyword);
		$this->db->or_like('nim',$keyword);
		$this->db->or_like('email',$keyword);
		return $this->db->get('mahasiswa')->result();

		//return data mahasiswa that has been searched
	}
}
