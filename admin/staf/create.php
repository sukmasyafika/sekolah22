<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid my-5">
  <div class="container p-4 shadow-lg rounded">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Tenaga</h1>

    <form action="<?= base_url('tenaga/simpan'); ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>

      <div class="row mb-3 g-3">
        <div class="col-md-6">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" autofocus>
          <?php if ($validation->hasError('nama')): ?>
            <div class="invalid-feedback">
              <?= $validation->getError('nama'); ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="col-md-6">
          <label for="nip" class="form-label">NIP</label>
          <input type="number" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" id="nip" name="nip" value="<?= old('nip'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('nip'); ?>
          </div>
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('email'); ?>
          </div>
        </div>

        <div class="col-md-6">
          <label for="jabatan" class="form-label">Jabatan</label>
          <input type="text" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>" id="jabatan" name="jabatan" value="<?= old('jabatan'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('jabatan'); ?>
          </div>
        </div>

        <div class="col-md-6">
          <label for="mapel" class="form-label">Mata Pelajaran</label>
          <input type="text" class="form-control" id="mapel" name="mapel" value="<?= old('mapel'); ?>">
        </div>

        <div class="col-md-6">
          <label for="tgs_tambahan" class="form-label">Tugas Tambahan</label>
          <input type="text" class="form-control" id="tgs_tambahan" name="tgs_tambahan" value="<?= old('tgs_tambahan'); ?>">
        </div>

        <div class="col-md-6">
          <label for="agama" class="form-label">Agama</label>
          <select class="form-select <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" id="agama" name="agama">
            <option value="" disabled <?= old('agama') ? '' : 'selected'; ?>>Pilih Agama</option>
            <option value="Islam" <?= (old('agama') == 'Islam') ? 'selected' : ''; ?>>Islam</option>
            <option value="Kristen" <?= (old('agama') == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
            <option value="Katolik" <?= (old('agama') == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
            <option value="Hindu" <?= (old('agama') == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
            <option value="Buddha" <?= (old('agama') == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
            <option value="Konghucu" <?= (old('agama') == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('agama'); ?>
          </div>
        </div>

        <div class="col-md-6">
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <select class="form-select <?= ($validation->hasError('jk')) ? 'is-invalid' : ''; ?>" id="jk" name="jk">
            <option value="" disabled <?= old('jk') ? '' : 'selected'; ?>>Pilih Jenis Kelamin</option>
            <option value="Laki-laki" <?= (old('jk') == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?= (old('jk') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('jk'); ?>
          </div>
        </div>

        <div class="col-md-6">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= old('alamat') ? old('alamat') : (isset($tenaga['alamat']) ? $tenaga['alamat'] : ''); ?></textarea>
        </div>

        <div class="col-md-6">
          <label for="thn_msk" class="form-label">Tahun Masuk</label>
          <input type="number" class="form-control <?= ($validation->hasError('thn_msk')) ? 'is-invalid' : ''; ?>" id="thn_msk" name="thn_msk" value="<?= old('thn_msk'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('thn_msk'); ?>
          </div>
        </div>

        <div class="col-md-6">
          <label for="foto" class="form-label">Pilih Foto</label>
          <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" onchange="previewImg()">
          <div class="invalid-feedback">
            <?= $validation->getError('foto'); ?>
          </div>
          <div class="mt-3">
            <img id="img-preview" class="img-thumbnail border border-info img-preview shadow-sm" style="max-width: 50%; height: auto; display: none;">
          </div>
        </div>

      </div>

      <!-- Submit Button -->
      <div class="tombol my-5">
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="<?= base_url('tenaga'); ?>" class="btn btn-secondary">Batal</a>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>