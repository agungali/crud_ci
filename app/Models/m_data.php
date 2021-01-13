<?php

namespace App\Models;

use CodeIgniter\Model;

class m_data extends Model
{
	protected $table = "mahasiswa";

	public function getMahasiswa($id = false)
	{
		if ($id === false) {
			return $this->table('mahasiswas')
				->get()
				->getResultArray();
		} else {
			return $this->table('mahasiswas')
				->where('id', $id)
				->get()
				->getRowArray();
		}
	}

	public function insert_mahasiswa($data)
	{
		return $this->db->table($this->table)->insert($data);
	}
}
