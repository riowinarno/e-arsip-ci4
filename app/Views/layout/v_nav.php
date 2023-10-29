  <div class="collapse navbar-collapse order-3" id="navbarCollapse">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="<?= base_url('home') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('kategori') ?>" class="nav-link">Kategori</a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('dep') ?>" class="nav-link">Departemen</a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('arsip') ?>" class="nav-link">Arsip</a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('user') ?>" class="nav-link">User</a>
      </li>
    </ul>

  </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item">
        <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary btn-flat">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">E-Arsip</a></li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container">
