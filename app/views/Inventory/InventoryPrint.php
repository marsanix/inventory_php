<table class="table table-bordered table-sm">
    <thead class="table-light">
    <tr>
        <th>#</th>
        <th>Kode</th>
        <th>Barcode</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Harga Beli</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($inventories as $i => $item): ?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= htmlspecialchars($item['kode_barang']) ?></td>
        <td><?= htmlspecialchars($item['barcode_barang']) ?></td>
        <td><?= htmlspecialchars($item['nama_barang']) ?></td>
        <td><?= $item['jumlah_barang'] ?></td>
        <td><?= htmlspecialchars($item['satuan_barang']) ?></td>
        <td><?= number_format($item['harga_beli'], 0, ',', '.') ?></td>
        <td><?= $item['status_barang'] ? 'Tersedia' : 'Kosong' ?></td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>