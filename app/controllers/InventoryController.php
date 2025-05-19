<?php

class InventoryController extends Controller
{ 
    // Method to display all inventories
    public function index()
    {
        // Load the Inventory model by calling loadModel() method which is inherited from Controller super class
        $inventoryModel = $this->loadModel("Inventory");
        // Retrieve all inventories from the model calling getAllInventories() method from Inventory class
        $inventories = $inventoryModel->getAllInventories();
        // Render the view with the list of inventories by calling renderView() method which is inherited from Controller super class
        $this->renderView('Inventory/Inventories', ["inventories" => $inventories]);
    }

    // Method to display all inventories
    public function getAllInventories()
    {

        if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        // Load the Inventory model by calling loadModel() method which is inherited from Controller super class
        $inventoryModel = $this->loadModel("Inventory");
        // Retrieve all inventories from the model calling getAllInventories() method from Inventory class
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

        // Check if the request method is POST by checking whether the user is clicked submit button
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data = [
                "kode_barang" => $_POST["kode_barang"],
                "barcode_barang" => $_POST["barcode_barang"],
                "nama_barang" => $_POST["nama_barang"],
                "jumlah_barang" => $_POST["jumlah_barang"],
                "satuan_barang" => $_POST["satuan_barang"],
                "harga_beli" => $_POST["harga_beli"],
                "status_barang" => $_POST["status_barang"]
            ];

            // Load the Inventory model
            $inventoryModel = $this->loadModel("Inventory");
            // Add a new inventory using data from the POST request
            $inventoryModel->addInventory($data);
   
            echo json_encode([
                'status' => 'success',
                'message' => 'Inventory added successfully',
                'data' => $data
            ]);
        } 
 
    }

    
    // Method to update a inventory by its ID
    public function updateInventory($id)
    {

        if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        // Load the Inventory model
        $inventoryModel = $this->loadModel("Inventory");
        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

             $data = [
                "kode_barang" => $_POST["kode_barang"],
                "barcode_barang" => $_POST["barcode_barang"],
                "nama_barang" => $_POST["nama_barang"],
                // "jumlah_barang" => $_POST["jumlah_barang"],
                "satuan_barang" => $_POST["satuan_barang"],
                "harga_beli" => $_POST["harga_beli"],
                // "status_barang" => $_POST["status_barang"]
            ];

            // Update the inventory with the given ID using data from the POST request
            $inventoryModel->update($id, $data);
            
            // Retrieve the inventory with the given ID
            $inventory = $inventoryModel->find($id);

            echo json_encode([
                'status' => 'success',
                'message' => 'Inventory added successfully',
                'data' => $inventory
            ]);

        }
        
    }

    // Method to delete a inventory by its ID
    public function deleteInventory($id)
    {

         if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Load the Inventory model
            $inventoryModel = $this->loadModel("Inventory");
            // Delete the inventory with the given ID
            $inventoryModel->delete($id);
            // Redirect to the inventories list page

            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
            ]);


        }
    }

        // Method to delete a inventory by its ID
    public function addStock($id)
    {

        if (!is_ajax_request()) {
            http_response_code(403);
            echo 'Forbidden: AJAX requests only.';
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $qty = (int)$_POST['jumlah_barang'];

            // Load the Inventory model
            $inventoryModel = $this->loadModel("Inventory");
            // Delete the inventory with the given ID
            $inventoryModel->addStock($id, $qty);
            // Redirect to the inventories list page

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

    // Method to display a inventory by its ID
    public function inventoryById($id)
    {
        // Load the Inventory model
        $inventoryModel = $this->loadModel("Inventory");
        // Retrieve the inventory with the given ID
        $inventory = $inventoryModel->getInventoryById($id);
        // Render the view with the inventory details | $inventory['title'] is replacing the title of the webpage tab
        $this->renderView('Inventory/Inventory', ["inventory" => $inventory], $inventory['title']);
    }



}