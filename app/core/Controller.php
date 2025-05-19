<?php
/*
 * Controller class for the application
 * 
 * Kelas ini menyediakan metode untuk memuat model dan memberikan tampilan.
 * 
 * @package core
 * @author Marsani
 * @version 1.0
 */

 // Define the Controller class
class Controller
{
    // Method to load a model
    // Takes the model name as a parameter

    // This will load the model from the models directory
    // 
    // ex: Book model from Book.php
    // ------------------------------------------
    // require_once '../app/models/Book.php';
    // return new Book;
    // ------------------------------------------

    protected function loadModel($model)
    {
        // Include the model file from the models directory
        require_once '../app/models/' . $model . '.php';
        // Instantiate and return the model object
        return new $model;
    }

    // Method to render a view
    // Takes the view path, data array, and optional title as parameters
    protected function renderView($viewPath, $data = [], $title = "InventoryApp")
    {
        // Extract the data array into individual variables
        extract($data);
        // Include the layout file from the views directory
        require_once '../app/views/layout.php';
    }

    // Method to render a view for printing
    // Takes the view path, data array, and optional title as parameters
    protected function renderPrint($viewPath, $data = [], $title = "InventoryApp")
    {
        // Extract the data array into individual variables
        extract($data);
        // Include the layout file from the views directory
        require_once '../app/views/layoutPrint.php';
    }
}