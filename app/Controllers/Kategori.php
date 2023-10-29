<?php

namespace App\Controllers;
use App\Models\Model_kategori;

class Kategori extends BaseController
{
    public function __construct() {
      $this->Model_kategori = new Model_kategori();
      helper('form');
    }

    public function index(): string
    {
        $data = array(
            'title' => 'Kategori',
            'kategori' => $this->Model_kategori->allData(),
            'isi' => 'v_kategori'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add() {
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];

        $this->Model_kategori->add($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to(base_url('kategori'));
    }

    public function edit($id_kategori) {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];

        $this->Model_kategori->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('kategori'));
    }

    public function delete($id_kategori) {
        $data = [
            'id_kategori' => $id_kategori,
        ];

        $this->Model_kategori->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('kategori'));
    }
}
