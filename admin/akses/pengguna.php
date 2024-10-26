<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Pengguna & Hak Akses</h1>
  <!-- DataTales users -->
  <div class="card shadow-lg mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle" id="dataTable" width="100%" cellspacing="0">
          <thead class="table-info">
            <tr class="text-center">
              <th>No</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $user) : ?>
              <tr class="text-center">
                <td><?= $i++; ?></td>
                <td class="text-capitalize"><?= $user->username; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->name; ?></td>
                <td>
                  <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-sm btn-info mx-3">
                    <i class="fas fa-eye"></i> Detail
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

<?= $this->endSection(); ?>