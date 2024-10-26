<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid my-5">
  <div class="container p-4 shadow-lg rounded">
    <h1 class="h3 mb-5 text-primary fw-bold text-center">Tambah Data Berita</h1>

    <form action="<?= base_url('berita/simpan'); ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>

      <div class="row mb-3 g-3">
        <div class="col-md-6">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul'); ?>" autofocus>
          <?php if ($validation->hasError('judul')): ?>
            <div class="invalid-feedback">
              <?= $validation->getError('judul'); ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="col-md-6">
          <label for="slug" class="form-label">URL</label>
          <input type="text" class="form-control" id="slug" name="slug" value="<?= old('slug'); ?>">
        </div>

        <div class="col-md-6">
          <label for="tgl" class="form-label">Tanggal Dibuat</label>
          <input type="date" class="form-control" id="tgl" name="tgl" value="<?= old('tgl'); ?>">
        </div>

        <div class="col-md-6">
          <label for="foto" class="form-label">Pilih Gambar</label>
          <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" onchange="previewImg()">
          <div class="invalid-feedback">
            <?= $validation->getError('foto'); ?>
          </div>
          <div class="mt-3">
            <img id="img-preview" class="img-thumbnail border border-info img-preview shadow-sm" style="max-width: 50%; height: auto; display: none;">
          </div>
        </div>

        <div class="col-md-6">
          <label for="desk" class="form-label">Deskripsi</label>
          <textarea class="form-control <?= ($validation->hasError('desk')) ? 'is-invalid' : ''; ?>" id="desk" name="desk" rows="3"><?= old('desk'); ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('desk'); ?>
          </div>
        </div>

      </div>

      <!-- Submit Button -->
      <div class="tombol my-5">
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="<?= base_url('berita'); ?>" class="btn btn-secondary">Batal</a>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>