<div class="row">
  <div class="col-md-12">
    <div class="card card-primary card-solid">
      <div class="card-header">
        <h3 class="card-title">Data Kategori</h3>

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
              <th>Kategori File</th>
              <th class="text-center" width="150px">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $count = 1;
            foreach ($kategori as $key => $value) : ?>
              <tr>
                <td class="text-center"><?= $count++; ?></td>
                <td><?= $value['nama_kategori']; ?></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_kategori']; ?>">Edit</button>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_kategori']; ?>">Delete</button>
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

<!-- /.modal add kategori -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('kategori/add'); ?>

        <div class="form-group">
          <label>Kategori</label>
          <input name="nama_kategori" class="form-control" placeholder="Kategori" required>
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


<!-- /.modal edit kategori -->
<?php 
  foreach ($kategori as $key => $value) : ?>
    <div class="modal fade" id="edit<?= $value['id_kategori']; ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Kategori</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?= form_open('kategori/edit/' . $value['id_kategori']); ?>

            <div class="form-group">
              <label>Kategori</label>
              <input name="nama_kategori" value="<?= $value['nama_kategori']; ?>" class="form-control" placeholder="Kategori" required>
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

<!-- /.modal delete kategori -->
<?php 
  foreach ($kategori as $key => $value) : ?>
    <div class="modal fade" id="delete<?= $value['id_kategori']; ?>">
      <div class="modal-dialog modal-danger">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Kategori</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin untuk menghapus <b><?= $value['nama_kategori']; ?></b>?
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <a href="<?= base_url('kategori/delete/' . $value['id_kategori']) ?>" type="submit" class="btn btn-primary">Delete</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
<?php endforeach; ?>