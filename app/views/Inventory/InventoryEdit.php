<!-- MODAL EDIT ITEM -->
<div class="modal fade" id="modalEditItem" tabindex="-1" aria-labelledby="modalEditItemLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="formEditItem">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditItemLabel">Edit Data Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_barang" id="edit_id_barang">

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="edit_kode_barang" class="form-label">Kode Barang</label>
              <input type="text" class="form-control" name="kode_barang" id="edit_kode_barang" required>
            </div>
            <div class="col-md-6">
              <label for="edit_barcode_barang" class="form-label">Barcode</label>
              <input type="text" class="form-control" name="barcode_barang" id="edit_barcode_barang">
            </div>
          </div>

          <div class="mb-3">
            <label for="edit_nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" id="edit_nama_barang" required>
          </div>

          <div class="row mb-3">
            <div class="col-md-4">
              <label for="edit_satuan_barang" class="form-label">Satuan</label>
              <input type="text" class="form-control" name="satuan_barang" id="edit_satuan_barang">
            </div>
            <div class="col-md-4">
              <label for="edit_harga_beli" class="form-label">Harga Beli</label>
              <input type="number" class="form-control" name="harga_beli" id="edit_harga_beli" min="0">
            </div>
            <div class="col-md-4">
              <label for="edit_status_barang" class="form-label">Status</label>
              <select class="form-select" name="status_barang" id="edit_status_barang">
                <option value="1">Available</option>
                <option value="0">Not-Available</option>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
