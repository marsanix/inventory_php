<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <!-- jQuery Toast CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

  <script>
    var BASE_URL = '<?= BASE_URL ?>';
  </script>

  <!-- 
  Nama    : Marsani
  NIM     : 230401010282
  Kelas   : IF404
  Matkul  : Pemrograman Web II
  Prodi   : Informatika PJJ S1 
  Dosen   : Riad Sahara, S.SI., M.T. 
  -->

</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- Logo / Brand -->
    <a class="navbar-brand fw-bold" href="#">InventoryApp</a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu Items -->
    <div class="collapse navbar-collapse" id="navbarMenu">
      <!-- Left Menu -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php BASE_URL ?>print/inventory" target="_blank">Print Laporan</a>
        </li>
      </ul>

      <!-- Right Menu -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">Tentang Aplikasi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- MODAL TENTANG APLIKASI -->
<div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aboutModalLabel">Tentang Aplikasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p><strong>InventoryApp</strong> adalah sistem informasi manajemen barang (inventory) sederhana berbasis web.</p>
        <div>
          <h6>Fitur Utama:</h6>
          <ul>
            <li>Manajemen Barang</li>
            <li>Tambah, Edit, Hapus Barang</li>
            <li>Tambah Stock Barang</li>
            <li>Print Laporan</li>
          </ul>

          <h6>Teknologi yang digunakan:</h6>
          <ul>
            <li>PHP</li>
            <li>MVC</li>
            <li>Bootstrap 5, HTML5, CSS3</li>
            <li>Javascript, jQuery, Ajax</li>
            <li>DataTables</li>
            <li>jQuery Toast Plugin</li>
            <li>MySQL, Koneksi POD</li>
            <li>JSON</li>
          </ul>

          <h6>Tools:</h6>
          <ul>
            <li>Visual Studio Code</li>
            <li>HeidiSQL</li>
            <li>XAMPP</li>
          </ul>

        </div>

        <p>
          Dikembangkan oleh: <strong>Marsani</strong><br />
          Email: marsani@example.com<br />
          Github: <a href="https://github.com/marsanix/inventory_php" target="_blank">marsanix/inventory</a><br />
        </p>
 
        <p>Versi: 1.0.0</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>



<div id="main" class="container-lg">

<?php require_once '../app/views/' . $viewPath . '.php'; ?>

</div><!-- /.container -->

<footer class="bg-dark text-white pt-4 pb-2 mt-5">
  <div class="container">
    <div class="row">
      <!-- Info -->
      <div class="col-md-6 mb-3">
        <h5>Inventory System</h5>
        <p class="mb-0">Sistem informasi untuk manajemen barang berbasis web.</p>
      </div>

      <!-- Link Navigasi -->
      <div class="col-md-3 mb-3">
        <h6>Menu</h6>
        <ul class="list-unstyled">
          <li><a href="<?php BASE_URL ?>" class="text-white text-decoration-none">Dashboard</a></li>
          <li><a href="<?php BASE_URL ?>print/inventory" target="_blank" class="text-white text-decoration-none">Print Laporan</a></li>
          <li><a href="#" class="text-white text-decoration-none" data-bs-toggle="modal" data-bs-target="#aboutModal">Tentang Aplikasi</a></li>
        </ul>
      </div>

      <!-- Kontak / Credit -->
      <div class="col-md-3 mb-3">
        <h6>Kontak</h6>
        <p class="mb-1">Email: marsanix@gmail.com</p>
        <p class="mb-0">© 2025 InventoryApp</p>
      </div>
    </div>

    <hr class="border-light">

    <div class="text-center small">
      Dibuat dengan ❤️ menggunakan Bootstrap & PHP
    </div>
  </div>
</footer>

<!-- jQuery 3.7.1 (wajib sebelum plugin lain) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap 5 JS bundle (termasuk Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables core & adapter Bootstrap 5 -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<!-- jQuery Toast JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script src="<?php BASE_URL ?>assets/js/main.js?v=1.0"></script>
</body>
</html>
