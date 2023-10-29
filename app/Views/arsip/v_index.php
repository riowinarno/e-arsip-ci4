<div class="row">
  <div class="col-md-12">
    <div class="card card-primary card-solid">
      <div class="card-header">
        <h3 class="card-title">Data Arsip</h3>

        <div class="card-tools ">
          <a href="<?= base_url('arsip/add') ?>" class="btn btn-success btn-sm btn-flat">
            <i class="fas fa-plus"> Add</i>
          </a>
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
            <tr class="text-center">
              <th>Nomor</th>
              <th>Nomor Arsip</th>
              <th>Nama Arsip</th>
              <th>Kategori</th>
              <th>Tanggal Upload</th>
              <th>Tanggal Update</th>
              <th>User</th>
              <th>Departemen</th>
              <th>File</th>
              <th width="150px">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $count = 1;
            foreach ($arsip as $key => $value) : ?>
              <tr>
                <td class="text-center"><?= $count++; ?></td>
                <td class="text-center"><?= $value['no_arsip']; ?></td>
                <td><?= $value['nama_arsip']; ?></td>
                <td><?= $value['nama_kategori']; ?></td>
                <td><?= $value['tgl_upload']; ?></td>
                <td><?= $value['tgl_update']; ?></td>
                <td><?= $value['nama_user']; ?></td>
                <td><?= $value['nama_dep']; ?></td>
                <td class="text-center">
                  <a href="<?= base_url('arsip/viewpdf/' . $value['id_arsip']) ?>" class="btn btn-sm btn-primary">View</a>
                  <br>
                  <?= number_format($value['ukuran_file'], 0)  ?> Byte
                </td>
                <td class="text-center">
                  <a href="<?= base_url('arsip/edit/' . $value['id_arsip']) ?>" class="btn btn-sm btn-warning">Edit</a>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_arsip']; ?>">Delete</button>
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

<!-- /.modal delete arsip -->
<?php 
  foreach ($arsip as $key => $value) : ?>
    <div class="modal fade" id="delete<?= $value['id_arsip']; ?>">
      <div class="modal-dialog modal-danger">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin untuk menghapus <b><?= $value['nama_arsip']; ?></b>?
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <a href="<?= base_url('arsip/delete/' . $value['id_arsip']) ?>" type="submit" class="btn btn-primary">Delete</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
<?php endforeach; ?>