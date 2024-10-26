<?php

namespace App\Controllers;

use App\Models\TenagaModel;
use App\Models\TenagaModelModel;

class Tenaga extends BaseController
{
  // variabel local
  protected $tenagaModel;

  public function __construct()
  {
    //tenaga 
    $this->tenagaModel = new TenagaModel();
  }

  public function index()
  {

    $data = [
      'title' => 'Tenaga',
      'tenaga' => $this->tenagaModel->getTenaga()
    ];

    return view('admin/staf/tenaga', $data);
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'Detail Tenaga',
      'tenaga' => $this->tenagaModel->getTenaga($slug)
    ];

    // jika tenaga tidak ada
    if (empty($data['tenaga'])) {
      // menangani hal 404
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama ' . $slug . 'Tidak di temukan');
    }

    return view('admin/staf/detail', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Data',
      'validation' => \Config\Services::validation()
    ];

    return view('admin/staf/create', $data);
  }

  public function simpan()
  {
    // Validasi input
    $validation = service('validation');
    $validation->setRules([
      'nama' => [
        'rules' => 'required|is_unique[tenaga.nama]',
        'errors' => [
          'required' => 'Nama wajib diisi.',
          'is_unique' => 'Nama sudah terdaftar.'
        ]
      ],
      'nip' => [
        'rules' => 'exact_length[18]',
        'errors' => [
          'exact_length' => 'NIP harus terdiri dari 18 angka.'
        ]
      ],
      'email' => [
        'rules' => 'required|is_unique[tenaga.email]',
        'errors' => [
          'required' => 'Email wajib diisi.',
          'is_unique' => 'Email sudah terdaftar.'
        ]
      ],
      'thn_msk' => [
        'rules' => 'permit_empty|exact_length[4]',
        'errors' => [
          'exact_length' => 'Tahun Masuk harus terdiri dari 4 angka.'
        ]
      ],
      'jabatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jabatan wajib diisi.'
        ]
      ],
      'agama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Agama wajib dipilih.'
        ]
      ],
      'jk' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis Kelamin wajib dipilih.'
        ]
      ],
      'foto' => [
        'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Foto wajib diunggah.',
          'max_size' => 'Ukuran foto maksimal 1MB.',
          'is_image' => 'File yang diunggah bukan gambar.',
          'mime_in'  => 'Format foto Harus JPG, JPEG, atau PNG.'
        ]
      ]
    ]);
    if (!$validation->run($this->request->getVar())) {
      return redirect()->back()->withInput();
    }

    // ambil foto
    $img = $this->request->getFile('foto');

    // pindahkan ke folder img/tenaga
    $img->move('assets/img/tenaga');

    // ambil nama foto
    $namaImg = $img->getName();

    $slug = url_title($this->request->getVar('nama'), '-', true);

    // Simpan data ke model
    $this->tenagaModel->insert([
      'nama' => $this->request->getVar('nama'),
      'slug' => $slug,
      'nip' => $this->request->getVar('nip'),
      'jk' => $this->request->getVar('jk'),
      'foto' => $namaImg,
      'alamat' => $this->request->getVar('alamat'),
      'email' => $this->request->getVar('email'),
      'jabatan' => $this->request->getVar('jabatan'),
      'mapel' => $this->request->getVar('mapel'),
      'tgs_tambahan' => $this->request->getVar('tgs_tambahan'),
      'agama' => $this->request->getVar('agama'),
      'thn_msk' => $this->request->getVar('thn_msk'),
    ]);

    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

    // Kembalikan ke halaman tenaga
    return redirect()->to('/tenaga');
  }

  public function delete($id)
  {

    // mencari foto dgn id
    $tenagaFoto = $this->tenagaModel->find($id);

    // hapus foto 
    unlink('assets/img/tenaga/' . $tenagaFoto['foto']);


    $this->tenagaModel->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil DiHapus.');
    return redirect()->to('/tenaga');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Ubah Data',
      'validation' => \Config\Services::validation(),
      'tenaga' => $this->tenagaModel->getTenaga($slug)
    ];

    return view('admin/staf/edit', $data);
  }

  public function update($id)
  {

    // cek nama 
    $tenagaLama = $this->tenagaModel->getTenaga($this->request->getVar('slug'));
    if ($tenagaLama['nama'] == $this->request->getVar('nama')) {
      $nama = 'required';
    } else {
      $nama = 'required|is_unique[tenaga.nama]';
    }

    // Validasi input
    $validation = service('validation');
    $validation->setRules([
      'nama' => [
        'rules' => $nama,
        'errors' => [
          'required' => 'Nama wajib diisi.',
          'is_unique' => 'Nama sudah terdaftar.'
        ]
      ],
      'foto' => [
        'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran foto maksimal 1MB.',
          'is_image' => 'File yang diunggah bukan gambar.',
          'mime_in'  => 'Format foto Harus JPG, JPEG, atau PNG.'
        ]
      ]
    ]);
    if (!$validation->run($this->request->getVar())) {
      // Kembali ke halaman form create dan kirim pesan error
      return redirect()->to('/tenaga/edit/' . $this->request->getVar('slug'))->withInput();
    }




    // ambil foto
    $img = $this->request->getFile('foto');

    //  Cek Gambar lama / baru
    if ($img->getError() == 4) {
      $namaImg = $this->request->getVar('fotoLama');
    } else {
      // pindahkan ke folder img/tenaga
      $img->move('assets/img/tenaga');

      // ambil nama foto baru
      $namaImg = $img->getName();

      //  menghapus foto lama
      $fotoLama = $this->request->getVar('fotoLama');
      if ($fotoLama) {
        $path = 'assets/img/tenaga/' . $fotoLama;
        if (file_exists($path)) {
          unlink($path);
        }
      }
    }

    $slug = url_title($this->request->getVar('nama'), '-', true);

    // Simpan data ke model
    $this->tenagaModel->update($id, [
      'nama' => $this->request->getVar('nama'),
      'slug' => $slug,
      'nip' => $this->request->getVar('nip'),
      'jk' => $this->request->getVar('jk'),
      'foto' => $namaImg,
      'alamat' => $this->request->getVar('alamat'),
      'email' => $this->request->getVar('email'),
      'jabatan' => $this->request->getVar('jabatan'),
      'mapel' => $this->request->getVar('mapel'),
      'tgs_tambahan' => $this->request->getVar('tgs_tambahan'),
      'agama' => $this->request->getVar('agama'),
      'thn_msk' => $this->request->getVar('thn_msk'),
    ]);

    session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

    // Kembalikan ke halaman tenaga
    return redirect()->to('/tenaga');
  }
}
