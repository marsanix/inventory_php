<?php
/*
 * Entry point for the application
 * 
 * This file initializes the application by including necessary files and creating an instance of the App class.
 * 
 * @package public
 * @author Marsani
 * @version 1.0
 */

/**
Nama    : Marsani
NIM     : 230401010282
Kelas   : IF404
Matkul  : Pemrograman Web II
Prodi   : Informatika PJJ S1 
Dosen   : Riad Sahara, S.SI., M.T. 
 */

// Include the configuration file
require_once "../app/config/config.php";

// Include the Database class file
require_once "../app/core/Database.php";

// Helper
require_once "../app/core/Helper.php";

// Include the Controller class file
require_once "../app/core/Controller.php";

// Include the App class file
require_once "../app/core/App.php";

// Create a new instance of the App class
$app = new App();