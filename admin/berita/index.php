<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800 fw-bold">Berita</h1>
  <div class="card shadow-lg mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-start mb-3">
        <a href="<?= site_url('berita/create'); ?>" class="btn btn-primary p-2">
          <i class="fas fa-plus"></i> Tambah
        </a>
      </div>

      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle" id="dataTable" width="100%" cellspacing="0">
          <thead class="table-primary ">
            <tr class="text-center text-capitalize ">
              <th>No</th>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Tanggal Di Buat</th>
              <th>Deskripsi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($berita as $b) : ?>
              <tr class="text-center">
                <td class="align-middle"><?= $no++; ?></td>
                <td class="align-middle">
                  <img src="<?= base_url('assets/img/berita/' . $b['foto']); ?>" alt="<?= $b['foto']; ?>" width="100">
                </td>
                <td class="text-capitalize align-middle"><?= $b['judul']; ?></td>
                <td class="align-middle"><?= date('d-m-Y', strtotime($b['tgl'])); ?></td>
                <td class="align-middle"><?= $b['desk']; ?></td>
                <td class="align-middle">
                  <a href="<?= site_url('/berita/' . $b['slug']); ?> " class="btn btn-success mb-3">
                    <i class="fas fa-eye"></i> Detail
                  </a>
                  <a href="<?= site_url('/berita/edit/' . $b['slug']); ?>" class="btn btn-warning mx-3 mb-3">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <form action="<?= base_url('/berita/' . $b['id']); ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger mb-3" onclick="return confirm('Apa Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i> Hapus</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>