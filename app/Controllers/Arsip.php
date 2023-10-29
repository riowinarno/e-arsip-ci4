<?php

namespace App\Controllers;
use App\Models\Model_arsip;
use App\Models\Model_kategori;

class Arsip extends BaseController
{
    public function __construct() {
        $this->Model_arsip = new Model_arsip();
        $this->Model_kategori = new Model_kategori();
        helper('form');
    }

    public function index(): string
    {
        $data = array(
            'title' => 'Arsip',
            'arsip' => $this->Model_arsip->allData(),
            'isi' => 'arsip/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add() {
        $data = array(
            'title' => 'Add Arsip',
            'kategori' => $this->Model_kategori->allData(),
            'isi' => 'arsip/v_add'
        );
        return view('layout/v_wrapper', $data);
    }

    public function insert() {
        if ($this->validate([
            'nama_arsip' => [
                'label'  => 'Nama Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'uploaded[file_arsip]|max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi',
                    'max_size' => 'Ukuran {field} maksimal 1024 kb',
                    'ext_in' => 'Format {field} wajib .pdf',
                ],
            ],
        ])) {
            // mengambil file file_arsip yang akan diupload
            $file_arsip = $this->request->getFile('file_arsip');
            // mengacak nama file file_arsip
            $nama_file = $file_arsip->getRandomName();

            // mengambil ukuran file
            $ukuran_file = $file_arsip->getSize('kb');

            // jika valid
            $data = [
                'no_arsip' => $this->request->getPost('no_arsip'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'nama_arsip' => $this->request->getPost('nama_arsip'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tgl_upload' => date('Y-m-d'),
                'tgl_update' => date('Y-m-d'),
                'id_dep' => session()->get('id_dep'),
                'id_user' => session()->get('id_user'),
                'file_arsip' => $nama_file,
                'ukuran_file' =>$ukuran_file,
            ];

            // direktori upload file
            $file_arsip->move('file_arsip', $nama_file);

            $this->Model_arsip->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambah');

            return redirect()->to(base_url('arsip'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip/add'));
        }
    }

    public function edit($id_arsip) {
        $data = array(
            'title' => 'Edit Arsip',
            'kategori' => $this->Model_kategori->allData(),
            'arsip' => $this->Model_arsip->detailData($id_arsip),
            'isi' => 'arsip/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_arsip) {
        if ($this->validate([
            'nama_arsip' => [
                'label'  => 'Nama Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'id_kategori' => [
                'label'  => 'Kategori',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'deskripsi' => [
                'label'  => 'Deskripsi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'max_size[file_arsip,2048]|ext_in[file_arsip,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1024 kb',
                    'ext_in' => 'Format {field} wajib .pdf',
                ],
            ],
        ])) {
            // mengambil file file_arsip yang akan diupload
            $file_arsip = $this->request->getFile('file_arsip');

            if ($file_arsip->getError() == 4) {
                $data = [
                    'id_arsip' => $id_arsip,
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'nama_arsip' => $this->request->getPost('nama_arsip'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                ];

                $this->Model_arsip->edit($data);
            } else {
                $arsip = $this->Model_arsip->detailData($id_arsip);
                if ($arsip['file_arsip'] != '') {
                    unlink('file_arsip/' . $arsip['file_arsip']);
                }
                // mengacak nama file file_arsip
                $nama_file = $file_arsip->getRandomName();

                // mengambil ukuran file
                $ukuran_file = $file_arsip->getSize('kb');

                // jika valid
                $data = [
                    'id_arsip' => $id_arsip,
                    'no_arsip' => $this->request->getPost('no_arsip'),
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'nama_arsip' => $this->request->getPost('nama_arsip'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'tgl_update' => date('Y-m-d'),
                    'id_dep' => session()->get('id_dep'),
                    'id_user' => session()->get('id_user'),
                    'file_arsip' => $nama_file,
                    'ukuran_file' =>$ukuran_file,
                ];

                // direktori upload file
                $file_arsip->move('file_arsip', $nama_file);

                $this->Model_arsip->edit($data);

            }
            session()->setFlashdata('pesan', 'Data berhasil diperbarui');
            return redirect()->to(base_url('arsip'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip/edit/' . $id_arsip));
        }
    }

    public function delete($id_arsip) {
        // menghapus file lama
        $arsip = $this->Model_arsip->detailData($id_arsip);
        if ($arsip['file_arsip'] != '') {
            unlink('file_arsip/' . $arsip['file_arsip']);
        }

        $data = [
            'id_arsip' => $id_arsip,
        ];

        $this->Model_arsip->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('arsip'));
    }

    public function viewpdf($id_arsip) {
        $data = array(
            'title' => 'View Arsip',
            'arsip' => $this->Model_arsip->detailData($id_arsip),
            'isi' => 'arsip/v_viewpdf'
        );
        return view('layout/v_wrapper', $data);
    }
}
