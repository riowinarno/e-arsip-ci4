<?php 

namespace App\Models;

use CodeIgniter\Model;

class Model_home extends Model {
  public function total_arsip() {
    return $this->db->table('tbl_arsip')->countAll();
  }
  public function total_dep() {
    return $this->db->table('tbl_dep')->countAll();
  }
  public function total_user() {
    return $this->db->table('tbl_user')->countAll();
  }
  public function total_kategori() {
    return $this->db->table('tbl_kategori')->countAll();
  }
}



?>