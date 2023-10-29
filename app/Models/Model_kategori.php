<?php 

namespace App\Models;

use CodeIgniter\Model;

class Model_kategori extends Model {
  public function allData() {
    return $this->db->table('tbl_kategori')->get()->getResultArray();
  }

  public function add($data) {
    $this->db->table('tbl_kategori')->insert($data);
  }
  
  public function edit($data) {
    $this->db->table('tbl_kategori')
    ->where('id_kategori', $data['id_kategori'])
    ->update($data);
  }

  public function deleteData($data) {
    $this->db->table('tbl_kategori')
    ->where('id_kategori', $data['id_kategori'])
    ->delete($data);
  }
}