<?php
// Define an array of routes for the application
$routes = [
    // Route for the home page, maps to the 'index' method of 'InventoryController'
    '' => ['controller' => 'InventoryController', 'method' => 'index'],

    // Route for the inventories list page, maps to the 'index' method of 'InventoryController'
    'inventories' => ['controller' => 'InventoryController', 'method' => 'index'],

    'inventory/list' => ['controller' => 'InventoryController', 'method' => 'getAllInventories'],

    // Route for a specific inventory page, maps to the 'id' method of 'InventoryController'
    'inventory/id' => ['controller' => 'InventoryController', 'method' => 'inventoryById'],

    // Route for adding a new inventory, maps to the 'addInventory' method of 'InventoryController'
    'inventory/add' => ['controller' => 'InventoryController', 'method' => 'addNewInventory'],

    // Route for deleting a inventory, maps to the 'delete' method of 'InventoryController'
    'inventory/delete' => ['controller' => 'InventoryController', 'method' => 'deleteInventory'],

    'inventory/addStock' => ['controller' => 'InventoryController', 'method' => 'addStock'],

    // Route for updating a inventory, maps to the 'update' method of 'InventoryController'
    'inventory/update' => ['controller' => 'InventoryController', 'method' => 'updateInventory'],

     // Route for adding a new inventory, maps to the 'addInventory' method of 'InventoryController'
    'inventory/useItem' => ['controller' => 'InventoryController', 'method' => 'useItem'],

    // Route for printing the inventory, maps to the 'printInventory' method of 'InventoryController'
    'print/inventory' => ['controller' => 'InventoryController', 'method' => 'printInventory'],
];
