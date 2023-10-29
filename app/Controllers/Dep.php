<?php

namespace App\Controllers;
use App\Models\Model_dep;

class Dep extends BaseController
{
    public function __construct() {
      $this->Model_dep = new Model_dep();
      helper('form');
    }

    public function index(): string
    {
        $data = array(
            'title' => 'Departemen',
            'dep' => $this->Model_dep->allData(),
            'isi' => 'v_dep'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add() {
        $data = [
            'nama_dep' => $this->request->getPost('nama_dep'),
        ];

        $this->Model_dep->add($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to(base_url('dep'));
    }

    public function edit($id_dep) {
        $data = [
            'id_dep' => $id_dep,
            'nama_dep' => $this->request->getPost('nama_dep'),
        ];

        $this->Model_dep->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('dep'));
    }

    public function delete($id_dep) {
        $data = [
            'id_dep' => $id_dep,
        ];

        $this->Model_dep->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('dep'));
    }
}
