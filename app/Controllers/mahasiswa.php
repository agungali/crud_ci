<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_data;

class mahasiswa extends Controller
{

    public function __construct()
    {

        // Mendeklarasikan class m_data menggunakan $this->product
        $this->mhs = new m_data();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }

    public function index()
    {
        $data['mahasiswa'] = $this->mhs->getMahasiswa();
        echo view('mahasiswa/view_m', $data);
    }

    public function create()
    {
        return view('mahasiswa/create');
    }

    public function store()
    {
        // Mengambil value dari form dengan method POST
        $nim = $this->request->getPost('fnim');
        $nama = $this->request->getPost('fnama');
        $jurusan = $this->request->getPost('fjurusan');
        

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
        ];

        /* 
    Membuat variabel simpan yang isinya merupakan memanggil function 
    insert_product dan membawa parameter data 
    */
        $simpan = $this->mhs->insert_mahasiswa($data);

        // Jika simpan berhasil, maka ...
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created product successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('mahasiswa'));
        }
    }
}
