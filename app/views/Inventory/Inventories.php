<h3 class="mb-3">Master Barang

    <button class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#addModal">
    + Tambah Barang
    </button>
</h3>

<table id="invTable" class="table table-striped table-bordered">
  <thead class="table-secondary">
    <tr>
      <th>Kode</th>
      <th>Barcode</th>
      <th>Nama</th>
      <th>Qty</th>
      <th>Satuan</th>
      <th>Harga</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($inventories as $row): ?>
    <tr>
      <td><?= htmlspecialchars($row['kode_barang']) ?></td>
      <td><?= $row['barcode_barang'] ?></td>
      <td><?= $row['nama_barang'] ?></td>
      <td><?= $row['jumlah_barang'] ?></td>
      <td><?= $row['satuan_barang'] ?></td>
      <td><?= $row['harga_beli'] ?></td>
      <td>
        <span class="badge <?= $row['status_barang']?'bg-success':'bg-danger' ?>">
          <?= $row['status_barang']?'Available':'Not Available' ?>
        </span>
      </td>
      <td class="text-center">
        <a href="form_edit.php?id=<?= $row['id_barang'] ?>" class="btn btn-sm btn-primary btn-edit"
          data-id="1"
          data-kode="BRG001"
          data-barcode="123456789"
          data-nama="Kertas A4"
          data-satuan="Rim"
          data-harga="25000"
          data-status="1"
        >Edit</a>

        <button data-id="<?= $row['id_barang'] ?>" class="btn btn-sm btn-danger delBtn">Hapus</button>
        <button data-id="<?= $row['id_barang'] ?>" class="btn btn-sm btn-warning useBtn">Pakai</button>
        <button data-id="<?= $row['id_barang'] ?>" class="btn btn-sm btn-info addBtn">Tambah</button>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<?php require_once '../app/views/Inventory/InventoryAdd.php'; ?>
<?php require_once '../app/views/Inventory/InventoryAddStock.php'; ?>
<?php require_once '../app/views/Inventory/InventoryEdit.php'; ?> 
<?php require_once '../app/views/Inventory/InventoryUse.php'; ?>
<?php require_once '../app/views/Inventory/InventoryDelete.php'; ?>