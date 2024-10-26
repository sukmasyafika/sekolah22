<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800 fw-bold">Data Siswa</h1>

  <!-- Card -->
  <div class="card shadow-lg mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
          <thead class="table-primary ">
            <tr class="text-center text-capitalize ">
              <th class="align-middle">No</th>
              <th class="align-middle">Nama</th>
              <th class="align-middle">Kelas</th>
              <th class="align-middle">Jurusan</th>
              <th class="align-middle">Tanggal Lahir</th>
              <th class="align-middle">Jenis Kelamin</th>
              <th class="align-middle">Alamat</th>
              <th class="align-middle">Email</th>
              <th class="align-middle">Agama</th>
              <th class="align-middle">Tahun Masuk</th>
              <th class="align-middle">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($siswa as $s) : ?>
              <tr class="text-center">
                <td class="align-middle"><?= $no++; ?></td>
                <td class="text-capitalize align-middle"><?= $s['nama']; ?></td>
                <td class="align-middle"><?= $s['kelas']; ?></td>
                <td class="align-middle"><?= $s['jurusan']; ?></td>
                <td class="align-middle"><?= date('d-m-Y', strtotime($s['tanggal_lahir'])); ?></td>
                <td class="align-middle"><?= $s['jenis_kelamin']; ?></td>
                <td class="align-middle"><?= $s['alamat']; ?></td>
                <td class="align-middle"><?= $s['email']; ?></td>
                <td class="align-middle"><?= $s['agama']; ?></td>
                <td class="align-middle"><?= $s['thn_masuk']; ?></td>
                <td class="align-middle">
                  <a href="/siswa/<?= $s['slug']; ?>" class=" btn btn-success">
                    Detail
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<!-- Page level plugins -->
<script src=" <?= base_url('/vendor/datatables/jquery.dataTables.min.js'); ?> "></script>
<script src="<?= base_url('/vendor/datatables/dataTables.bootstrap4.min.js'); ?> "></script>

<!-- Page level custom scripts -->
<script src=" <?= base_url('/js/demo/datatables-demo.js'); ?> "></script>

<?= $this->endSection(); ?>