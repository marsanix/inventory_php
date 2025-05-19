let table;

$(document).ready(function () {

  table = $('#invTable').DataTable({
        ajax: {
            url: BASE_URL + 'inventory/list',
            dataSrc: ''
        },
        columns: [
            { data: 'kode_barang' },
            { data: 'barcode_barang' },
            { data: 'nama_barang' },
            { data: 'jumlah_barang' },
            { data: 'satuan_barang' },
            { data: 'harga_beli' },
            {
                data: 'status_barang',
                render: function (data) {
                    return data == 1 ? 'Available' : 'Not Available';
                }
            },
            {
                data: 'id_barang',
                render: function (data, type, row) {

                    return `<a href="` + BASE_URL + `inventory/addStock/${data}" 
                              data-id="${row.id_barang}"
                              data-kode="${row.kode_barang}"
                              data-barcode="${row.barcode_barang}"
                              data-nama="${row.nama_barang}"
                              data-satuan="${row.satuan_barang}"
                              data-jumlah="${row.jumlah_barang}"
                              data-harga="${row.harga_beli}"
                              data-status="${row.status_barang}"
                            class="btn btn-sm btn-primary btn-addStock">Tambah</a>

                            <a href="` + BASE_URL + `inventory/useItem/${data}" 
                              data-id="${row.id_barang}"
                              data-kode="${row.kode_barang}"
                              data-barcode="${row.barcode_barang}"
                              data-nama="${row.nama_barang}"
                              data-satuan="${row.satuan_barang}"
                              data-jumlah="${row.jumlah_barang}"
                              data-harga="${row.harga_beli}"
                              data-status="${row.status_barang}"
                            class="btn btn-sm btn-info btn-use">Pakai</a>

                            <a href="` + BASE_URL + `inventory/update/${data}"
                              data-id="${row.id_barang}"
                              data-kode="${row.kode_barang}"
                              data-barcode="${row.barcode_barang}"
                              data-nama="${row.nama_barang}"
                              data-satuan="${row.satuan_barang}"
                              data-jumlah="${row.jumlah_barang}"
                              data-harga="${row.harga_beli}"
                              data-status="${row.status_barang}"
                             class="btn btn-sm btn-warning btn-edit">Edit</a>

                            <a href="` + BASE_URL + `inventory/delete/${data}" data-id="${row.id_barang}" data-nama="${row.nama_barang}" class="btn btn-sm btn-danger btn-delete">Hapus</a>
                            `;
                }
            }
        ]
    });




             
  $('#frmAdd').on('submit', function (e) {
    e.preventDefault();
    const form = $(this);

    $.ajax({
      url: BASE_URL + 'inventory/add',
      method: 'POST',
      data: form.serialize(),
      dataType: 'json',
      beforeSend() {
        form.find('button[type=submit]').prop('disabled', true);
      },
      success(res) {
        if (res.status == 'success') {

          // Tutup modal dengan cara yang aman
          const modalEl = document.getElementById('addModal');
          const modalInstance = bootstrap.Modal.getInstance(modalEl);
          modalInstance.hide();

          table.ajax.reload(null, false); // Reload tabel tanpa reset halaman
          form[0].reset();

          setTimeout(() => {
            $('#addModal').modal('hide');
            // $('body').removeAttr('style');
            // document.body.classList.remove('modal-open');
            // document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
          }, 300);

          $.toast({
              heading: 'Success',
              text: res.message,
              showHideTransition: 'slide',
              icon: 'success',
              position: 'top-right', 
          });
         
        } else {
          alert(res.message);
        }
      },
      error(xhr) {
        alert('Error: ' + xhr.responseText);
      },
      complete() {
        form.find('button[type=submit]').prop('disabled', false);
      }
    });
  });


  // Form Edit Item
  $('#formEditItem').on('submit', function (e) {
    e.preventDefault();
    const form = $(this);
    const url = form.attr('action');

    $.ajax({
      url: url,
      method: 'POST',
      data: form.serialize(),
      dataType: 'json',
      beforeSend() {
        form.find('button[type=submit]').prop('disabled', true);
      },
      success(res) {
        if (res.status == 'success') {

          // Tutup modal dengan cara yang aman
          const modalEl = document.getElementById('modalEditItem');
          const modalInstance = bootstrap.Modal.getInstance(modalEl);
          modalInstance.hide();

          table.ajax.reload(null, false); // Reload tabel tanpa reset halaman
          form[0].reset();

          setTimeout(() => {
            $('#modalEditItem').modal('hide');
            // $('body').removeAttr('style');
            // document.body.classList.remove('modal-open');
            // document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
          }, 300);

          $.toast({
              heading: 'Success',
              text: res.message,
              showHideTransition: 'slide',
              icon: 'success',
              position: 'top-right', 
          });
         
        } else {
          alert(res.message);
        }
      },
      error(xhr) {
        alert('Error: ' + xhr.responseText);
      },
      complete() {
        form.find('button[type=submit]').prop('disabled', false);
      }
    });
  });


  // Tombol edit
  $(document).on('click', '.btn-edit', function (e) {
    e.preventDefault();
    const data = $(this).data();

    $('#edit_id_barang').val(data.id);
    $('#edit_kode_barang').val(data.kode);
    $('#edit_barcode_barang').val(data.barcode);
    $('#edit_nama_barang').val(data.nama);
    $('#edit_jumlah_barang').val(data.jumlah);
    $('#edit_satuan_barang').val(data.satuan);
    $('#edit_jumlah_barang').val(data.harga);
    $('#edit_harga_beli').val(data.harga);
    $('#edit_status_barang').val(data.status);

    const modalEditItem = $('#modalEditItem').modal('show');
    modalEditItem.find('#formEditItem').attr('action', $(this).attr('href'));
  });


  // Tombol Add Stock
  $(document).on('click', '.btn-addStock', function (e) {
    e.preventDefault();
    const data = $(this).data();

    $('#addStock_id_barang').html(data.id);
    $('#addStock_kode_barang').html(data.kode);
    $('#addStock_barcode_barang').html(data.barcode);
    $('#addStock_nama_barang').html(data.nama);
    // $(document).find('#addStock_jumlah_barang').html(data.jumlah);
    $('#addStock_jumlah_barang').html(data.jumlah);
    $('#addStock_satuan_barang').html(data.satuan);
    $('#addStock_harga_beli').html(formatRupiah(data.harga*1));
    $('#addStock_status_barang').html((data.jumlah > 0) ? 'Available' : 'Not-Available');

    const addStockModal = $('#addStockModal').modal('show');
    addStockModal.find('#frmAddStock').attr('action', $(this).attr('href'));

  });

  // Form Add Stock
  $('#frmAddStock').on('submit', function (e) {
    e.preventDefault();
    const form = $(this);
    const url = form.attr('action');

    $.ajax({
      url: url,
      method: 'POST',
      data: form.serialize(),
      dataType: 'json',
      beforeSend() {
        form.find('button[type=submit]').prop('disabled', true);
      },
      success(res) {
      
        if (res.status == 'success') {

          table.ajax.reload(null, false); // Reload tabel tanpa reset halaman
          form[0].reset();

          $('#addStockModal').modal('hide');

          $.toast({
              heading: 'Success',
              text: res.message,
              showHideTransition: 'slide',
              icon: 'success',
              position: 'top-right', 
          });
          
        } else {
          alert(res.message);
        }
      },
      error(xhr) {
        alert('Error: ' + xhr.responseText);
      },
      complete() {
        form.find('button[type=submit]').prop('disabled', false);
      }
    });
  });



  // Tombol Use item
  $(document).on('click', '.btn-use', function (e) {
    e.preventDefault();
    const data = $(this).data();

    $('#use_id_barang').html(data.id);
    $('#use_kode_barang').html(data.kode);
    $('#use_barcode_barang').html(data.barcode);
    $('#use_nama_barang').html(data.nama);
    $('#use_jumlah_barang').html(data.jumlah);
    $('#use_satuan_barang').html(data.satuan);
    $('#use_harga_beli').html(formatRupiah(data.harga*1));
    $('#use_status_barang').html((data.jumlah > 0) ? 'Available' : 'Not-Available');

    const useModal = $('#useModal').modal('show');
    useModal.find('#frmUse').attr('action', $(this).attr('href'));

  });

  // Update status barang by kondisi jumlah_barang
  $(document).on('change', '#use_input_jumlah_barang', function (e) {
    e.preventDefault();

    const data = $(this).val();
    let jumnlah_sekarang = $('#use_jumlah_barang').html();
    $(this).attr('max', jumnlah_sekarang);

    if(((jumnlah_sekarang*1) - data) > 0){
      $('#use_status_barang').html('Available');
    } else {
      $('#use_status_barang').html('Not-Available');
    }

  });

  // Form Use Barang
  $('#frmUse').on('submit', function (e) {
    e.preventDefault();
    const form = $(this);
    const url = form.attr('action');

    $.ajax({
      url: url,
      method: 'POST',
      data: form.serialize(),
      dataType: 'json',
      beforeSend() {
        form.find('button[type=submit]').prop('disabled', true);
      },
      success(res) {
      
        if (res.status == 'success') {

          table.ajax.reload(null, false); // Reload tabel tanpa reset halaman
          form[0].reset();

          $('#useModal').modal('hide');

          $.toast({
              heading: 'Success',
              text: res.message,
              showHideTransition: 'slide',
              icon: 'success',
              position: 'top-right', 
          });
          
        } else {
          alert(res.message);
        }
      },
      error(xhr) {
        alert('Error: ' + xhr.responseText);
      },
      complete() {
        form.find('button[type=submit]').prop('disabled', false);
      }
    });
  });


  // Tombol Delete Item
  $(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    const id = $(this).data('id');
    const nama = $(this).data('nama');
    const deleteModel = $('#deleteModal').modal('show');
    deleteModel.find('#formDeleteItem').attr('action', $(this).attr('href'));
    deleteModel.find('#delete_id_barang').val(id);
    deleteModel.find('#delete_nama_barang').html(nama);
  });

  // Tombol konfirmasi Delete Item
  $('#btnConfirmDelete').on('click', function () {
    const deleteModel = $('#deleteModal').modal('show');
    const deleteId = deleteModel.find('#delete_id_barang').val();
    const url = deleteModel.find('#formDeleteItem').attr('action');
    if (!deleteId) return;

    $.ajax({
      url: url,
      method: 'POST',
      data: { id: deleteId },
      dataType: 'json',
      success: function (res) {
        if (res.status == 'success') {
          $('#deleteModal').modal('hide');
          // Reload DataTable atau update UI
          $('#dataTable').DataTable().ajax.reload();

          $.toast({
                heading: 'Success',
                text: res.message,
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-right', 
            });

        } else {
          alert(res.message || 'Gagal menghapus item');
        }
      },
      error: function () {
        alert('Terjadi kesalahan saat menghapus data.');
      }
    });
  });

});


function formatRupiah(angka) {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    literals: 'Rp',
  }).format(angka);
}
