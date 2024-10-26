<?php

namespace App\Models;

use CodeIgniter\Model;

class TenagaModel extends Model
{
  protected $table = 'tenaga';
  protected $useTimestamps = true;
  protected $allowedFields = ['nama', 'slug', 'nip', 'jk', 'foto', 'alamat', 'email', 'jabatan', 'mapel', 'tgs_tambahan', 'agama', 'thn_msk'];

  public function getTenaga($slug = false)
  {
    if ($slug == false) {
      return $this->findAll();
    }

    return $this->where(['slug' => $slug])->first();
  }

  public function countAll()
  {
    return $this->countAllResults();
  }
}
