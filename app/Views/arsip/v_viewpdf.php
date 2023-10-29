<a href="<?= base_url('arsip') ?>" class="btn btn-primary mb-5">Kembali</a>

<div class="row">
  <div class="col-sm-12">
    <table class="table table-bordered">
      <tr>
        <th width="150px">Nomor Arsip</th>
        <th width="50px">:</th>
        <td><?= $arsip['no_arsip']; ?></td>
        <th width="150px">Tanggal Upload</th>
        <th width="50px">:</th>
        <td><?= $arsip['tgl_upload']; ?></td>
      </tr>
      <tr>
        <th>Nama Arsip</th>
        <th>:</th>
        <td><?= $arsip['nama_arsip']; ?></td>
        <th width="150px">Tanggal Update</th>
        <th width="50px">:</th>
        <td><?= $arsip['tgl_update']; ?></td>
      </tr>
      <tr>
        <th>Deskripsi</th>
        <th>:</th>
        <td><?= $arsip['deskripsi']; ?></td>
        <th>Ukuran File</th>
        <th>:</th>
        <td><?= $arsip['ukuran_file']; ?> Byte</td>
      </tr>
      <tr>
        <th>Departemen</th>
        <th>:</th>
        <td><?= $arsip['nama_dep']; ?></td>
        <th>User</th>
        <th>:</th>
        <td><?= $arsip['nama_user']; ?></td>
      </tr>
    </table>
  </div>

  <div class="col-sm-12">
    <iframe src="<?= base_url('file_arsip/' . $arsip['file_arsip']) ?>" height="600" width="100%" frameborder="0"></iframe>
  </div>
</div>