<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid my-5">
  <div class="container p-4 shadow-lg rounded">
    <h1 class="h3 mb-4 text-gray-800">Edit Data Tenaga</h1>

    <form action="<?= base_url('tenaga/update/' . $tenaga['id']); ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>

      <input type="hidden" name="slug" value="<?= $tenaga['slug']; ?>">
      <input type="hidden" name="fotoLama" value="<?= $tenaga['foto']; ?>">

      <div class="row mb-3 g-3">
        <div class="col-md-6">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama', $tenaga['nama']); ?>" required>
          <div class="invalid-feedback">
            <?= $validation->getError('nama'); ?>
          </div>
        </div>

        <div class="col-md-6">
          <label for="nip" class="form-label">NIP</label>
          <input type="number" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" id="nip" name="nip" value="<?= old('nip', $tenaga['nip']); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('nip'); ?>
          </div>
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $tenaga['email']); ?>" required>
        </div>

        <div class="col-md-6">
          <label for="jabatan" class="form-label">Jabatan</label>
          <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= old('jabatan', $tenaga['jabatan']); ?>" required>
        </div>

        <div class="col-md-6">
          <label for="mapel" class="form-label">Mata Pelajaran</label>
          <input type="text" class="form-control" id="mapel" name="mapel" value="<?= old('mapel', $tenaga['mapel']); ?>">
        </div>

        <div class="col-md-6">
          <label for="tgs_tambahan" class="form-label">Tugas Tambahan</label>
          <input type="text" class="form-control" id="tgs_tambahan" name="tgs_tambahan" value="<?= old('tgs_tambahan', $tenaga['tgs_tambahan']); ?>">
        </div>

        <div class="col-md-6">
          <label for="agama" class="form-label">Agama</label>
          <select class="form-select" id="agama" name="agama" required>
            <option value="" disabled>Pilih Agama</option>
            <option value="Islam" <?= ($tenaga['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
            <option value="Kristen" <?= ($tenaga['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
            <option value="Katolik" <?= ($tenaga['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
            <option value="Hindu" <?= ($tenaga['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
            <option value="Buddha" <?= ($tenaga['agama'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
            <option value="Konghucu" <?= ($tenaga['agama'] == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <select class="form-select" id="jk" name="jk" required>
            <option value="" disabled>Pilih Jenis Kelamin</option>
            <option value="Laki-laki" <?= ($tenaga['jk'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?= ($tenaga['jk'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= old('alamat', $tenaga['alamat']); ?></textarea>
        </div>

        <div class="col-md-6">
          <label for="thn_msk" class="form-label">Tahun Masuk</label>
          <input type="number" class="form-control" id="thn_msk" name="thn_msk" value="<?= old('thn_msk', $tenaga['thn_msk']); ?>">
        </div>

        <div class="col-md-6">
          <label for="foto" class="form-label">Pilih Foto</label>
          <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" onchange="previewImg()">
          <div class="invalid-feedback">
            <?= $validation->getError('foto'); ?>
          </div>
          <div class="row mt-3 text-center">
            <div class="col">
              <?php if (!empty($tenaga['foto'])): ?>
                <img src="<?= base_url('assets/img/tenaga/' . $tenaga['foto']); ?>" class="img-thumbnail border border-info img-preview shadow-sm h-100" style="max-width: 100%; height: auto;" alt="Foto Lama">
                <p class="text-center mt-2">Foto Lama</p>
              <?php endif; ?>
            </div>
            <div class="col">
              <img id="img-preview" class="img-thumbnail border border-info img-preview shadow-sm h-100" style="max-width: 100%; height: auto; display: none;" alt="Pratinjau Foto Baru">
              <!-- <p class="text-center mt-2 <?= empty($tenaga['foto']) ? 'd-none' : 'd-block'; ?>">Foto Baru</p> -->
            </div>
          </div>
        </div>

      </div>

      <!-- Submit Button -->
      <div class="tombol my-5">
        <button type="submit" class="btn btn-primary">Ubah Data</button>
        <a href="<?= base_url('tenaga'); ?>" class="btn btn-secondary">Batal</a>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>