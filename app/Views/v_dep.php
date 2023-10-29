<div class="row">
  <div class="col-md-12">
    <div class="card card-primary card-solid">
      <div class="card-header">
        <h3 class="card-title">Data Departemen</h3>

        <div class="card-tools ">
          <button type="button" class="btn btn-success btn-sm btn-flat" data-toggle="modal" data-target="#add">
            <i class="fas fa-plus"> Add</i>
          </button>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?php 
        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Success! - ';
          echo session()->getFlashdata('pesan');
          echo '</h5></div>';
        } ?>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" width="80px">Nomor</th>
              <th>Departemen</th>
              <th class="text-center" width="150px">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $count = 1;
            foreach ($dep as $key => $value) : ?>
              <tr>
                <td class="text-center"><?= $count++; ?></td>
                <td><?= $value['nama_dep']; ?></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_dep']; ?>">Edit</button>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_dep']; ?>">Delete</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

<!-- /.modal add dep -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Departemen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('dep/add'); ?>

        <div class="form-group">
          <label>Departemen</label>
          <input name="nama_dep" class="form-control" placeholder="Departemen" required>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- /.modal edit dep -->
<?php 
  foreach ($dep as $key => $value) : ?>
    <div class="modal fade" id="edit<?= $value['id_dep']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Departemen</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= form_open('dep/edit/' . $value['id_dep']); ?>

            <div class="form-group">
              <label>Departemen</label>
              <input name="nama_dep" value="<?= $value['nama_dep']; ?>" class="form-control" placeholder="dep" required>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
<?php endforeach; ?>

<!-- /.modal delete dep -->
<?php 
  foreach ($dep as $key => $value) : ?>
    <div class="modal fade" id="delete<?= $value['id_dep']; ?>">
      <div class="modal-dialog modal-danger">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Departemen</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin untuk menghapus <b><?= $value['nama_dep']; ?></b>?
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <a href="<?= base_url('dep/delete/' . $value['id_dep']) ?>" type="submit" class="btn btn-primary">Delete</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
<?php endforeach; ?>