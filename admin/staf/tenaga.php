<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800 fw-bold">Data Guru & Staf</h1>

  <div class="card shadow-lg mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tenaga Pendidikan</h6>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-start mb-3">
        <a href="<?= base_url('tenaga/create'); ?>" class="btn btn-primary p-2">
          <i class="fas fa-plus"></i> Tambah
        </a>
      </div>

      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="table-info">
            <tr class="text-center">
              <th>No</th>
              <th>Gambar</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Mapel yang Diampu</th>
              <th>Tugas Tambahan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($tenaga as $t) : ?>
              <tr class="text-center">
                <td class="align-middle"><?= $no++; ?></td>
                <td class="align-middle"><img src="/assets/img/tenaga/<?= $t['foto']; ?>" alt="" width="100"></td>
                <td class="text-capitalize align-middle"><?= $t['nama']; ?></td>
                <td class="align-middle"><?= $t['jabatan']; ?></td>
                <td class="align-middle"><?= $t['mapel']; ?></td>
                <td class="align-middle"><?= !empty($t['tgs_tambahan']) ? $t['tgs_tambahan'] : '-'; ?></td>

                <td class="align-middle">
                  <a href="/tenaga/<?= $t['slug']; ?>" class="btn btn-sm btn-info mb-3">
                    <i class="fas fa-eye"></i> Detail
                  </a>

                  <a href="<?= base_url('/tenaga/edit/' . $t['slug']); ?>" class="btn btn-sm btn-warning mx-3 mb-3">
                    <i class="fas fa-edit"></i> Edit
                  </a>

                  <form action="<?= base_url('/tenaga/' . $t['id']); ?>" method="post" class="d-inline">
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