<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid mb-5">
  <h1 class="h3 mb-4 text-gray-800 fw-bold">Detail Siswa</h1>
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card mb-3 shadow-lg">
        <div class="card-body">
          <ul class="list-group list-group-flush text-capitalize">
            <li class="list-group-item">
              <h3 class="text-primary text-center"><strong><?= $siswa['nama']; ?></strong></h3>
            </li>
            <li class="list-group-item">
              <strong class="text-dark">Kelas :</strong> <?= $siswa['kelas']; ?>
            </li>
            <li class="list-group-item">
              <strong class="text-dark">jurusan :</strong> <?= $siswa['jurusan']; ?>
            </li>
            <li class="list-group-item">
              <strong class="text-dark">tanggal lahir :</strong> <?= date('d-m-Y', strtotime($siswa['tanggal_lahir'])); ?>
            </li>
            <li class="list-group-item">
              <strong class="text-dark">jenis kelamin :</strong> <?= $siswa['jenis_kelamin']; ?>
            </li>
            <li class="list-group-item">
              <strong class="text-dark">alamat :</strong> <?= $siswa['alamat']; ?>
            </li>
            <li class="list-group-item">
              <strong class="text-dark">Agama :</strong> <?= $siswa['agama']; ?>
            </li>
            <li class="list-group-item">
              <strong class="text-dark">Email :</strong> <?= $siswa['email']; ?>
            </li>
            <li class="list-group-item">
              <strong class="text-dark">Tahun Masuk :</strong> <?= $siswa['thn_masuk']; ?>
            </li>
            <li class="list-group-item text-center">
              <a href="<?= base_url('siswa'); ?>" class="btn btn-primary mt-3">
                &laquo; Kembali
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>