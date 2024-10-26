<?= $this->extend('layoutAdmin/index'); ?>

<?= $this->section('admin-content'); ?>

<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Detail Pengguna</h1>

  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card shadow-lg border-0 mb-4 rounded" style="max-width: 540px;">
        <div class="row g-0">

          <div class="col-md-4 d-flex align-items-center justify-content-center bg-info rounded-left">
            <img src="<?= base_url('/img/' . $user->user_img); ?>" class="img-fluid rounded-circle p-2" alt="<?= $user->username; ?>" style="width: 150px; height: 150px; object-fit: cover;">
          </div>

          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title text-primary"><?= $user->username; ?></h5>

              <?php if ($user->fullname) : ?>
                <p class="card-text text-muted"><?= $user->fullname; ?></p>
              <?php endif; ?>

              <p class="card-text"><?= $user->email; ?></p>

              <!-- Badge untuk Role -->
              <p class="card-text text-light">
                <span class="badge bg-<?= ($user->name == 'admin') ? 'success' : 'warning'; ?>">
                  <?= ucfirst($user->name); ?>
                </span>
              </p>

              <a href="<?= base_url('admin/pengguna'); ?>" class="btn btn-sm btn-outline-primary mt-2">
                &laquo; Kembali
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>