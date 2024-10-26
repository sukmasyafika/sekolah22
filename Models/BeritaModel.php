<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
  protected $table = 'berita';
  protected $useTimestamps = true;
  protected $allowedFields = ['foto', 'judul', 'slug', 'desk', 'tgl'];

  public function getBerita($slug = false)
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
