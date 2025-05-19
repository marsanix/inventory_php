<?php
/**
 * Helper function to check if the request is an AJAX request
 *
 * @return bool True if the request is an AJAX request, false otherwise
 */

// Path: app/core/Helper.php
// Fungsi Pembantu untuk Aplikasi
// File ini berisi fungsi pembantu yang dapat digunakan di seluruh aplikasi
// seperti memeriksa apakah permintaan tersebut merupakan permintaan AJAX atau tidak

// Fungsi ini memeriksa apakah permintaan tersebut merupakan permintaan AJAX
// dengan memeriksa apakah header 'HTTP_X_REQUESTED_WITH' ada dan nilainya adalah 'xmlhttprequest'
function is_ajax_request(): bool {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}