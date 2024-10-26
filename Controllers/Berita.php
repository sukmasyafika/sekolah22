<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Berita extends BaseController
{
  // variabel local
  protected $beritaModel;

  public function __construct()
  {
    $this->beritaModel = new BeritaModel();
  }

  public function index()
  {

    $data = [
      'title' => 'Siswa',
      'berita' => $this->beritaModel->getBerita()
    ];

    return view('admin/berita/index', $data);
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'Detail Berita',
      'berita' => $this->beritaModel->getBerita($slug)
    ];

    if (empty($data['berita'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama ' . $slug . ' Tidak di temukan');
    }

    return view('admin/berita/detail', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Data',
      'validation' => \Config\Services::validation()
    ];

    return view('admin/berita/create', $data);
  }

  public function simpan()
  {
    // Validasi input
    $validation = service('validation');
    $validation->setRules([
      'judul' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Judul wajib diisi.',
        ]
      ],
      'slug' => [
        'rules' => 'required|is_unique[berita.slug]',
        'errors' => [
          'required' => 'Slug wajib diisi.',
          'is_unique' => 'Slug sudah digunakan.'
        ]
      ],
      'tgl' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal wajib diisi.',
        ]
      ],
      'desk' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Deskripsi wajib diisi.',
        ]
      ],
      'foto' => [
        'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'Gambar wajib diunggah.',
          'max_size' => 'Ukuran Gambar maksimal 1MB.',
          'is_image' => 'File yang diunggah bukan gambar.',
          'mime_in'  => 'Format Gambar Harus JPG, JPEG, atau PNG.'
        ]
      ]
    ]);
    if (!$validation->run($this->request->getVar())) {
      return redirect()->back()->withInput()->with('validation', $validation->getErrors());;
    }

    // ambil foto
    $img = $this->request->getFile('foto');

    // pindahkan ke folder img/berita
    $img->move('assets/img/berita');

    // ambil nama foto
    $namaImg = $img->getName();


    // Simpan data ke model
    $this->beritaModel->insert([
      'foto' => $namaImg,
      'judul' => $this->request->getVar('judul'),
      'slug' => $this->request->getVar('slug'),
      'tgl' => $this->request->getVar('tgl'),
      'desk' => $this->request->getVar('desk')
    ]);

    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

    // Kembalikan ke halaman berita
    return redirect()->to('/berita');
  }

  public function delete($id)
  {

    // mencari foto dgn id
    $berita = $this->beritaModel->find($id);

    // hapus foto 
    unlink('assets/img/berita/' . $berita['foto']);

    if (!$berita) {
      session()->setFlashdata('error', 'Berita tidak ditemukan.');
      return redirect()->to('/berita');
    }

    $this->beritaModel->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil DiHapus.');
    return redirect()->to('/berita');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Ubah Data',
      'validation' => \Config\Services::validation(),
      'berita' => $this->beritaModel->getberita($slug)
    ];

    return view('admin/berita/edit', $data);
  }

  public function update($id)
  {

    $beritaLama = $this->beritaModel->find($id);
    // Cek slug
    $slug = $this->request->getVar('slug');
    if ($slug == $beritaLama['slug']) {
      $slugRule = 'required';
    } else {
      $slugRule = 'required|is_unique[berita.slug]';
    }

    $validation = service('validation');
    $validation->setRules([
      'slug' => [
        'rules' => $slugRule,
        'errors' => [
          'required' => 'Slug wajib diisi.',
          'is_unique' => 'Slug sudah digunakan.'
        ]
      ],
      'foto' => [
        'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar maksimal 1MB.',
          'is_image' => 'File yang diunggah bukan gambar.',
          'mime_in'  => 'Format Gambar Harus JPG, JPEG, atau PNG.'
        ]
      ]
    ]);
    if (!$validation->run($this->request->getVar())) {
      return redirect()->back()->withInput()->with('validation', $validation->getErrors());;
    }


    // ambil foto
    $img = $this->request->getFile('foto');

    //  Cek Gambar lama / baru
    if ($img->getError() == 4) {
      $namaImg = $this->request->getVar('fotoLama');
    } else {
      // pindahkan ke folder img/berita
      $img->move('assets/img/berita');

      // ambil nama foto baru
      $namaImg = $img->getName();

      //  menghapus foto lama
      $fotoLama = $this->request->getVar('fotoLama');
      if ($fotoLama) {
        $path = 'assets/img/berita/' . $fotoLama;
        if (file_exists($path)) {
          unlink($path);
        }
      }
    }

    // Simpan data ke model
    $this->beritaModel->update($id, [
      'slug' => $this->request->getVar('slug'),
      'judul' => $this->request->getVar('judul'),
      'tgl' => $this->request->getVar('tgl'),
      'desk' => $this->request->getVar('desk'),
      'foto' => $namaImg,
    ]);

    session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

    // Kembalikan ke halaman berita
    return redirect()->to('/berita');
  }
}
