<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_data;

class mahasiswa extends Controller
{

    public function __construct()
    {

        //     // Mendeklarasikan class m_data menggunakan $this->product
        $this->mhs = new m_data();
        //     /* Catatan:
        //     Apa yang ada di dalam function construct ini nantinya bisa digunakan
        //     pada function di dalam class Product 
        //     */
    }

    public function index()
    {
        // $model = new m_data();
        // $data['mahasiswa']  = $model->getMahasiswa()->getResult();
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

    public function edit($id)
    {
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['mahasiswa'] = $this->mhs->getmahasiswa($id);
        // Mengirim data ke dalam view
        return view('mahasiswa/edit', $data);
    }

    public function update($id)
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
    Membuat variabel ubah yang isinya merupakan memanggil function 
    update_product dan membawa parameter data beserta id
    */
        $ubah = $this->mhs->update_mahasiswa($data, $id);

        // Jika berhasil melakukan ubah
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated mahasiswa successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('mahasiswa'));
        }
    }

    public function delete($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $hapus = $this->mhs->delete_mahasiswa($id);

        // Jika berhasil melakukan hapus
        if ($hapus) {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted mahasiswa successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('mahasiswa'));
        }
    }
}
