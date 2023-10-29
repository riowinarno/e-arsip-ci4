<?php 

namespace App\Models;

use CodeIgniter\Model;

class Model_dep extends Model {
  public function allData() {
    return $this->db->table('tbl_dep')->get()->getResultArray();
  }

  public function add($data) {
    $this->db->table('tbl_dep')->insert($data);
  }
  
  public function edit($data) {
    $this->db->table('tbl_dep')
    ->where('id_dep', $data['id_dep'])
    ->update($data);
  }

  public function deleteData($data) {
    $this->db->table('tbl_dep')
    ->where('id_dep', $data['id_dep'])
    ->delete($data);
  }
}