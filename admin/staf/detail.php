<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid mb-5">
  <h1 class="h3 mb-4 text-gray-800 fw-bold">Detail Tenaga</h1>
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card mb-3 shadow-lg">
        <div class="row g-0">
          <div class="col-md-4 d-flex align-items-center justify-content-center bg-primary text-white rounded">
            <img src="<?= base_url('assets/img/tenaga/' . $tenaga['foto']); ?>" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <h5 class="text-dark"><strong>Nama :</strong> <?= $tenaga['nama']; ?></h5>
                </li>
                <li class="list-group-item">
                  <strong class="text-dark">NIP :</strong> <?= !empty($tenaga['nip']) ? $tenaga['nip'] : '-'; ?>
                </li>
                <li class="list-group-item">
                  <strong class="text-dark">Email :</strong> <?= $tenaga['email']; ?>
                </li>
                <li class="list-group-item">
                  <strong class="text-dark">Jabatan :</strong> <?= $tenaga['jabatan']; ?>
                </li>
                <li class="list-group-item">
                  <strong class="text-dark">Mapel :</strong> <?= $tenaga['mapel']; ?>
                </li>
                <li class="list-group-item">
                  <strong class="text-dark">Tugas Tambahan :</strong> <?= !empty($tenaga['tgs_tambahan']) ? $tenaga['tgs_tambahan'] : '-'; ?>
                </li>
                <li class="list-group-item">
                  <strong class="text-dark">Tahun Masuk :</strong> <?= $tenaga['thn_msk']; ?>
                </li>
                <li class="list-group-item">
                  <strong class="text-dark">Alamat :</strong> <?= $tenaga['alamat']; ?>
                </li>
                <li class="list-group-item">
                  <strong class="text-dark">Jenis Kelamin :</strong> <?= $tenaga['jk']; ?>
                </li>
                <li class="list-group-item">
                  <strong class="text-dark">Agama :</strong> <?= $tenaga['agama']; ?>
                </li>
                <li class="list-group-item text-center">
                  <a href="<?= base_url('tenaga'); ?>" class="btn btn-primary mt-3">
                    &laquo; Kembali
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>