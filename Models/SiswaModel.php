<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
  protected $table = 'siswa';
  protected $useTimestamps = true;
  protected $allowedFields = ['nama', 'slug', 'kelas', 'jurusan', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'email', 'agama', 'thn_masuk'];

  public function getSiswa($slug = false)
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
