<?php

namespace App\Models;

use CodeIgniter\Model;

class m_data extends Model
{
	protected $table = "mahasiswa";
	public function getMahasiswa($id = false)
	{
		$name = ['Alwi'];
		if ($id === false) {
			return $this->table('mahasiswas')->where('nama', $name)
				
				->get()
				->getResultArray();
		} else {
			return $this->table('mahasiswas')->where('nama', $name)
			
				->where('id', $id)
				->get()
				->getRowArray();
		}
	}
	

	public function insert_mahasiswa($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function update_mahasiswa($data, $id)
	{
		return $this->db->table($this->table)->update($data, ['id' => $id]);
	}

	public function delete_mahasiswa($id)
	{
		return $this->db->table($this->table)->delete(['id' => $id]);
	}
}
