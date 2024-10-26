<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\SiswaModelModel;

class Siswa extends BaseController
{
  // variabel local
  protected $siswaModel;

  public function __construct()
  {
    $this->siswaModel = new SiswaModel();
  }

  public function index()
  {

    $data = [
      'title' => 'Siswa',
      'siswa' => $this->siswaModel->getSiswa()

      // pagination
      // 'siswa' =>  $this->siswaModel->paginate(10, 'siswa'),
      // 'pager' => $this->siswaModel->pager,
    ];

    return view('admin/siswa/index', $data);
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'Detail Siswa',
      'siswa' => $this->siswaModel->getSiswa($slug)
    ];

    if (empty($data['siswa'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama ' . $slug . 'Tidak di temukan');
    }

    return view('admin/siswa/detail', $data);
  }
}
