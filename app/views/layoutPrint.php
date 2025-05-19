<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style-print.css" media="print">
</head>
<body>
  <div class="container mt-4" id="print-area">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="mb-0">Daftar Laporan Barang</h3>
      <button class="btn btn-primary no-print" onclick="window.print()">🖨 Cetak</button>
    </div>

    <?php require_once '../app/views/' . $viewPath . '.php'; ?>

    <div class="text-end mt-5">
    <p><strong>Tanggal Cetak:</strong> <?= date('d-m-Y H:i') ?></p>
    </div>

  </div>
</body>
</html>
