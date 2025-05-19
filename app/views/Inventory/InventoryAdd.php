<!-- MODAL TAMBAH -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="frmAdd">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Kode</label>
              <input type="text" name="kode_barang" class="form-control" required>
            </div>
            <div class="col-md-8">
              <label class="form-label">Barcode</label>
              <input type="text" name="barcode_barang" class="form-control">
            </div>
            <div class="col-md-12">
              <label class="form-label">Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Jumlah</label>
              <input type="number" name="jumlah_barang" class="form-control" min="0" value="0" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Satuan</label>
              <select name="satuan_barang" class="form-select" required>
                <option value="kg">kg</option>
                <option value="pcs">pcs</option>
                <option value="liter">liter</option>
                <option value="meter">meter</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Harga Beli</label>
              <input type="number" step="0.01" name="harga_beli" class="form-control" min="0" value="0" required>
            </div>
            <div class="col-md-6">
              <label class="form-label d-block">Status</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_barang" value="1" checked>
                <label class="form-check-label">Available</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_barang" value="0">
                <label class="form-check-label">Not-Available</label>
              </div>
            </div>
          </div>
        </div><!-- /.modal-body -->

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
