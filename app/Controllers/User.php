<?php

namespace App\Controllers;
use App\Models\Model_user;
use App\Models\Model_dep;

class User extends BaseController
{
    public function __construct() {
      $this->Model_user = new Model_user();
      $this->Model_dep = new Model_dep();
      helper('form');
    }

    public function index(): string
    {
        $data = array(
            'title' => 'User',
            'user' => $this->Model_user->allData(),
            'isi' => 'user/v_index'
        );
        return view('layout/v_wrapper', $data);
    }

    public function add() {
      $data = array(
            'title' => 'Add User',
            'dep' => $this->Model_dep->allData(),
            'isi' => 'user/v_add'
        );
        return view('layout/v_wrapper', $data);
    }

    public function insert() {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'email' => [
                'label'  => 'E-Mail',
                'rules'  => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                    'is_unique' => '{field} Sudah ada',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'id_dep' => [
                'label'  => 'Departemen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi',
                    'max_size' => 'Ukuran {field} maksimal 1024 kb',
                    'mime_in' => 'Format {field} wajib png/jpg/jpeg/gif',
                ],
            ],
        ])) {
            // mengambil file foto yang akan diupload
            $foto = $this->request->getFile('foto');
            // mengacak nama file foto
            $nama_file = $foto->getRandomName();

            // jika valid
            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'level' => $this->request->getPost('level'),
                'id_dep' => $this->request->getPost('id_dep'),
                'foto' => $nama_file,
            ];

            // direktori upload file
            $foto->move('foto', $nama_file);

            $this->Model_user->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambah');

            return redirect()->to(base_url('user'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
        }
    }

    public function edit($id_user) {
        $data = array(
            'title' => 'Edit User',
            'dep' => $this->Model_dep->allData(),
            'user' => $this->Model_user->detailData($id_user),
            'isi' => 'user/v_edit'
        );
        return view('layout/v_wrapper', $data);
    }

    public function update($id_user) {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama User',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'id_dep' => [
                'label'  => 'Departemen',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                ],
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1024 kb',
                    'mime_in' => 'Format {field} wajib png/jpg/jpeg/gif',
                ],
            ],
        ])) {
            // mengambil file foto yang akan diupload
            $foto = $this->request->getFile('foto');
            // // mengacak nama file foto
            $nama_file = $foto->getRandomName();

            if ($foto->getError() == 4) {
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'id_dep' => $this->request->getPost('id_dep'),
                ];
    
                $this->Model_user->edit($data);
            } else {
                // menghapus foto lama
                $user = $this->Model_user->detailData($id_user);
                if ($user['foto'] != '') {
                    unlink('foto/' . $user['foto']);
                }

                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'id_dep' => $this->request->getPost('id_dep'),
                    'foto' => $nama_file,
                ];
    
                // direktori upload file
                $foto->move('foto', $nama_file);
    
                $this->Model_user->edit($data);
            }
            
            session()->setFlashdata('pesan', 'Data berhasil diperbarui');
            return redirect()->to(base_url('user'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit/' . $id_user));
        }
    }

    public function delete($id_user) {
        // menghapus foto lama
        $user = $this->Model_user->detailData($id_user);
        if ($user['foto'] != '') {
            unlink('foto/' . $user['foto']);
        }

        $data = [
            'id_user' => $id_user,
        ];

        $this->Model_user->deleteData($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('user'));
    }
}
