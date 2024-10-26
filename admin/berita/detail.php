<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid mb-5">
  <h1 class="h3 mb-4 text-gray-800 fw-bold">Detail Berita</h1>
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow border-0 mb-4">
        <div class="card-header bg-primary text-white text-center">
          <h4 class="m-0"><?= $berita['judul']; ?></h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 text-center mb-4">
              <img src="<?= base_url('assets/img/berita/' . $berita['foto']); ?>" alt="<?= $berita['foto']; ?>" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <h5 class="text-dark"><strong>Tanggal Di Buat :</strong></h5>
                <p class="lead"><?= date('d M Y', strtotime($berita['tgl'])); ?></p>
              </div>

              <div class="mb-4">
                <h5 class="text-dark"><strong>Deskripsi :</strong></h5>
                <p><?= nl2br(htmlspecialchars($berita['desk'])); ?></p>
              </div>
            </div>
          </div>
          <a href="<?= base_url('berita'); ?>" class="btn btn-primary">
            &laquo; Kembali
          </a>
        </div>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection(); ?>