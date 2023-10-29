<div class="row">
  <div class="col-lg-3 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= $total_arsip; ?></h3>

        <p>File Arsip</p>
      </div>
      <div class="icon">
        <i class="fa fa-regular fa-file-pdf"></i>
      </div>
      <a href="<?= base_url('arsip') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-3 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $total_kategori; ?></h3>

        <p>Kategori</p>
      </div>
      <div class="icon">
        <i class="fa fa-regular fa-bookmark"></i>
      </div>
      <a href="<?= base_url('kategori') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= $total_dep; ?></h3>

        <p>Departemen</p>
      </div>
      <div class="icon">
        <i class="fa fa-regular fa-building"></i>
      </div>
      <a href="<?= base_url('dep') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-12">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?= $total_user; ?></h3>

        <p>User</p>
      </div>
      <div class="icon">
        <i class="fa fa-regular fa-user"></i>
      </div>
      <a href="<?= base_url('user') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>