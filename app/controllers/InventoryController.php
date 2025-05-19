<?php
/**
 * InventoryController class
 * 
 * Kelas ini menangani fungsionalitas manajemen inventaris seperti menampilkan, menambahkan, memperbarui, dan menghapus inventaris.
 * 
 * @package controllers
 * @author Marsani
 * @version 1.0
 */
class InventoryController extends Controller
{ 
    // Metode untuk menampilkan semua inventaris
    public function index()
    {
        // Muat model inventaris dengan memanggil metode LoadModel () yang diwarisi dari Controller Super Class
        $inventoryModel = $this->loadModel("Inventory");
        // Ambil semua inventaris dari metode model panggilan getAllInventories () dari kelas inventaris
        $inventories = $inventoryModel->getAllInventories();
        // Render tampilan dengan daftar inventaris dengan memanggil metode renderview () yang diwarisi dari controller super class
        $this->renderView('Inventory/Inventories', ["inventories" => $inventories]);
    }

    // Method to display all inventories
    public function getAllInventories()
    {

        // check apakah permintaan berupa ajax
        // jika bukan ajax, tampilkan pesan forbidden
        // jika ajax, lanjutkan
        if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        $inventoryModel = $this->loadModel("Inventory");
        $inventories = $inventoryModel->getAllInventories();
        
        echo json_encode($inventories);
    }

    // Method to add a new inventory
    public function addNewInventory()
    {

        if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        // Periksa apakah metode permintaan diposting dengan memeriksa apakah pengguna diklik tombol kirim
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // Ambil data dari formulir dan simpan dalam array
            $data = [
                "kode_barang" => $_POST["kode_barang"],
                "barcode_barang" => $_POST["barcode_barang"],
                "nama_barang" => $_POST["nama_barang"],
                "jumlah_barang" => $_POST["jumlah_barang"],
                "satuan_barang" => $_POST["satuan_barang"],
                "harga_beli" => $_POST["harga_beli"],
                "status_barang" => $_POST["status_barang"]
            ];

            $inventoryModel = $this->loadModel("Inventory");
            $inventoryModel->addInventory($data);
   
            echo json_encode([
                'status' => 'success',
                'message' => 'Inventory added successfully',
                'data' => $data
            ]);
        } 
 
    }

    
    // Metode untuk memperbarui inventaris berdasarkan ID
    public function updateInventory($id)
    {

        if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        $inventoryModel = $this->loadModel("Inventory");
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

             $data = [
                "kode_barang" => $_POST["kode_barang"],
                "barcode_barang" => $_POST["barcode_barang"],
                "nama_barang" => $_POST["nama_barang"],
                // "jumlah_barang" => $_POST["jumlah_barang"],  // jumlah barang tidak diupdate
                "satuan_barang" => $_POST["satuan_barang"],
                "harga_beli" => $_POST["harga_beli"],
                // "status_barang" => $_POST["status_barang"] // status barang tidak diupdate
            ];

            $inventoryModel->update($id, $data);
            $inventory = $inventoryModel->find($id);

            // Mengembalikan data inventaris yang diperbarui dalam format JSON
            echo json_encode([
                'status' => 'success',
                'message' => 'Inventory added successfully',
                'data' => $inventory
            ]);

        }
        
    }

    // Metode untuk menghapus inventaris berdasarkan  ID
    public function deleteInventory($id)
    {

         if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $inventoryModel = $this->loadModel("Inventory");
            $inventoryModel->delete($id);

            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
            ]);


        }
    }

    // Metode untuk menambah stok barang inventaris
    public function addStock($id)
    {

        if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $qty = (int)$_POST['jumlah_barang'];

            $inventoryModel = $this->loadModel("Inventory");
            $inventoryModel->addStock($id, $qty);

            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
            ]);


        }
    }

    // Method to update a inventory by its ID
    public function useItem($id)
    {

        if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        $inventoryModel = $this->loadModel("Inventory");
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            $qty = (int)$_POST['jumlah_barang'];
            $inventoryModel->useItem($id, $qty);
            
            echo json_encode([
                'status' => 'success',
                'message' => 'Barang berhasil di pakai',
            ]);

        }
        
    }

    // Metode untuk menampilkan inventaris dengan ID -nya
    public function inventoryById($id)
    {
        $inventoryModel = $this->loadModel("Inventory");
        $inventory = $inventoryModel->getInventoryById($id);
        $this->renderView('Inventory/Inventory', ["inventory" => $inventory], $inventory['title']);
    }

    // Metode untuk mencetak inventaris
    // Menggunakan metode renderPrint untuk mencetak inventaris 
    public function printInventory()
    {
        $inventoryModel = $this->loadModel("Inventory");
        $inventories = $inventoryModel->getAllInventories();
        $this->renderPrint('Inventory/InventoryPrint', ["inventories" => $inventories]);
    }


}