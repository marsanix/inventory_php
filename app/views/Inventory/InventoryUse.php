<!-- MODAL TAMBAH -->
<div class="modal fade" id="useModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="frmUse">
        <div class="modal-header">
          <h5 class="modal-title">Pakai Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
        
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th scope="row" style="width: 30%;">Kode Barang</th>
                <td id="use_kode_barang">-</td>
              </tr>
              <tr>
                <th scope="row">Barcode Barang</th>
                <td id="use_barcode_barang">-</td>
              </tr>
              <tr>
                <th scope="row">Nama Barang</th>
                <td id="use_nama_barang">-</td>
              </tr>
              <tr>
                <th scope="row" style="background-color: #e4fff2;">Jumlah</th>
                <td style="background-color: #e4fff2">
                  <div id="use_jumlah_barang">-</div>
                  <br />
                  <b>Jumlah barang yang akan di pakai:</b> <input type="number" id="use_input_jumlah_barang" name="jumlah_barang" class="form-control" min="0" value="0" required>
                </td>
              </tr>
              <tr>
                <th scope="row">Satuan</th>
                <td id="use_satuan_barang">-</td>
              </tr>
              <tr>
                <th scope="row">Harga Beli</th>
                <td id="use_harga_beli">-</td>
              </tr>
              <tr>
                <th scope="row">Status</th>
                <td id="use_status_barang">-</td>
              </tr>
            </tbody>
          </table>
        
        </div><!-- /.modal-body -->

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
