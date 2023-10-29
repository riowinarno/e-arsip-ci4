<div class="row">
  <div class="col-md-3">
  </div>

  <div class="col-md-6">
    <div class="card card-primary card-solid">
      <div class="card-header">
        <h3 class="card-title">Add User</h3>

        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?php $errors = session()->getFlashdata('errors');
        if (!empty($errors)) : ?>
          <div class="alert alert-danger alert-dismissible">
            <h5>Ada kesalahan!</h5>
            <ul>
              <?php foreach ($errors as $key => $value) : ?>
                <li><?= esc($value); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?= form_open_multipart('user/insert'); ?>
          <div class="form-group">
            <label>Nama User</label>
            <input name="nama_user" class="form-control" placeholder="Nama User">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input name="email" class="form-control" placeholder="Email">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input name="password" class="form-control" placeholder="Password">
          </div>
          
          <div class="form-group">
            <label>Level</label>
            <select name="level" class="form-control">
              <option value="">-- Pilih Level --</option>
              <option value="1">Admin</option>
              <option value="2">User</option>
            </select>
          </div>
          
          <div class="form-group">
            <label>Departemen</label>
            <select name="id_dep" class="form-control">
              <option value="">-- Pilih Departemen --</option>
              <?php foreach ($dep as $key => $value) : ?>
                <option value="<?= $value['id_dep']; ?>"><?= $value['nama_dep']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="form-group">
            <label>Foto</label>
            <input name="foto" class="form-control" type="file">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= base_url('user') ?>" class="btn btn-primary">Kembali</a>
          </div>
        <?= form_close(); ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

  <div class="col-md-3">
  </div>
</div>