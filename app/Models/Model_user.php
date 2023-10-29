<?php 

namespace App\Models;

use CodeIgniter\Model;

class Model_user extends Model {
  public function allData() {
    return $this->db->table('tbl_user')
    ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
    ->get()
    ->getResultArray();
  }

  public function detailData($id_user) {
    return $this->db->table('tbl_user')
    ->join('tbl_dep', 'tbl_dep.id_dep = tbl_user.id_dep', 'left')
    ->where('id_user', $id_user)
    ->get()
    ->getRowArray();
  }

  public function add($data) {
    $this->db->table('tbl_user')->insert($data);
  }
  
  public function edit($data) {
    $this->db->table('tbl_user')
    ->where('id_user', $data['id_user'])
    ->update($data);
  }

  public function deleteData($data) {
    $this->db->table('tbl_user')
    ->where('id_user', $data['id_user'])
    ->delete($data);
  }
}