<?php
/**
 * Configuration file for the application
 * 
 * File ini berisi detail koneksi database dan URL dasar untuk aplikasi.
 * 
 * @package config
 * @author Marsani
 * @version 1.0
 */
class Inventory
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    /* ==========  READ  ========== */
    public function getAllInventories(): array
    {

        // Prepare a SQL query to select all records from the book table
        $this->db->query("SELECT * FROM tb_inventory ORDER BY id_barang DESC");
        // Execute the prepared query
        $this->db->execute();
        // Return the results of the query
        return $this->db->results();
    }

    public function find(int $id): ?array
    {
        $st = $this->db->query("SELECT * FROM tb_inventory WHERE id_barang = ?");
        $this->db->bind(1, $id);
        $this->db->execute();
        $row = $this->db->result();
        return $row ?: null;
    }

    /* ==========  CREATE  ========== */
    public function addInventory(array $data): int
    {
        $this->validate($data);

        try {
            $this->db->beginTransaction();

            $sql = "INSERT INTO tb_inventory
                    (kode_barang, barcode_barang, nama_barang, jumlah_barang,
                     satuan_barang, harga_beli, status_barang)
                    VALUES (:kode, :barcode, :nama, :jumlah, :satuan, :harga, :status)";
            $this->db->query($sql);
                // Prepare a SQL query to insert a new record into the book table
            // $this->db->query("INSERT INTO book (isbn, title, author) VALUES (:isbn, :title, :author)");
            $this->db->bind(':kode', $data['kode_barang']);
            $this->db->bind(':barcode', $data['barcode_barang']);
            $this->db->bind(':nama', $data['nama_barang']);
            $this->db->bind(':jumlah', $data['jumlah_barang']);
            $this->db->bind(':satuan', $data['satuan_barang']);
            $this->db->bind(':harga', $data['harga_beli']);
            $this->db->bind(':status', ($data['jumlah_barang'] > 0)? $data['status_barang']: 0); // status_barang otomatis 0 jika jumlah barang 0

            // Execute the prepared query
            $this->db->execute();
            
            $this->db->commit();
            return (int)$this->db->lastInsertId();

        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e; // forwarding agar bisa ditangani controller
        }
    }

    /* ==========  UPDATE INFO  ========== */
    public function update(int $id, array $data): bool
    {
        $this->validate($data);

        try {
            $this->db->beginTransaction();

            $sql = "UPDATE tb_inventory SET
                    kode_barang   = :kode,
                    barcode_barang= :barcode,
                    nama_barang   = :nama,
                    satuan_barang = :satuan,
                    harga_beli    = :harga
                    WHERE id_barang = :id";
            $this->db->query($sql);

            $this->db->bind(':id', $id);
            $this->db->bind(':kode', $data['kode_barang']);
            $this->db->bind(':barcode', $data['barcode_barang']);
            $this->db->bind(':nama', $data['nama_barang']);
            // $this->db->bind(':jumlah', $data['jumlah_barang']);
            $this->db->bind(':satuan', $data['satuan_barang']);
            $this->db->bind(':harga', $data['harga_beli']+0);
            // $this->db->bind(':status', ($data['jumlah_barang'] > 0)? $data['status_barang']: 0); // status_barang otomatis 0 jika jumlah barang 0

            $ok = $this->db->execute();

            $this->db->commit();
            return $ok;

        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /* ==========  DELETE  ========== */
    public function delete(int $id): bool
    {
        try {

            $this->db->beginTransaction();
            $this->db->query("DELETE FROM tb_inventory WHERE id_barang = :id");
            $this->db->bind(':id', $id);
            $ok = $this->db->execute();
            $this->db->commit();    
            return $ok;
        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /* ==========  PEMAKAIAN  ========== */
    public function useItem(int $id, int $qty): bool
    {
        if ($qty <= 0) {
            throw new InvalidArgumentException('Qty pemakaian harus > 0.');
        }

        try {
            $this->db->beginTransaction();

            $item = $this->find($id);
            if (!$item) throw new RuntimeException('Data tidak ditemukan.');

            if ($qty > $item['jumlah_barang']) {
                throw new RuntimeException('Stok tidak mencukupi.');
            }

            $newQty = $item['jumlah_barang'] - $qty;
            $status = $newQty === 0 ? 0 : 1;

            $this->db->query(
                "UPDATE tb_inventory SET jumlah_barang = ?, status_barang = ? WHERE id_barang = ?"
            );
            $this->db->bind(1, $newQty);
            $this->db->bind(2, $status);
            $this->db->bind(3, $id);
            $this->db->execute();

            $this->db->commit();
            return true;

        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /* ==========  PENAMBAHAN STOK  ========== */
    public function addStock(int $id, int $qty): bool
    {
        if ($qty <= 0) {
            throw new InvalidArgumentException('Qty penambahan harus > 0.');
        }

        try {
            $this->db->beginTransaction();

            $item = $this->find($id);
            if (!$item) throw new RuntimeException('Data tidak ditemukan.');

            $newQty = $item['jumlah_barang'] + $qty;
            $status = ($newQty > 0)?1:0; 

            $this->db->query(
                "UPDATE tb_inventory SET jumlah_barang = ?, status_barang = ? WHERE id_barang = ?"
            );
            $this->db->bind(1, $newQty);
            $this->db->bind(2, $status);
            $this->db->bind(3, $id);
            $this->db->execute();

            $this->db->commit();
            return true;

        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /* ==========  HELPER  ========== */
    /** Validasi data; lempar InvalidArgumentException jika ada error */
    private function validate(array $d): void
    {
        $err = [];

        // kode_barang wajib & max 20
        if (empty($d['kode_barang']) || strlen($d['kode_barang']) > 20) {
            $err[] = 'Kode barang wajib (maks 20 karakter).';
        }

        // barcode_barang opsional, batas panjang wajar
        if (!empty($d['barcode_barang']) && strlen($d['barcode_barang']) > 255) {
            $err[] = 'Barcode terlalu panjang.';
        }

        // nama_barang wajib & max 50
        if (empty($d['nama_barang']) || strlen($d['nama_barang']) > 50) {
            $err[] = 'Nama barang wajib (maks 50 karakter).';
        }

        // jumlah_barang numerik >= 0
        if (isset($d['jumlah_barang'])) {
            if( !is_numeric($d['jumlah_barang']) || $d['jumlah_barang'] < 0) {
                $err[] = 'Jumlah barang harus angka ≥ 0.';
            }
        }

        // satuan_barang harus salah satu pilihan
        $allowedUnit = ['kg','pcs','liter','meter'];
        if (empty($d['satuan_barang']) || !in_array($d['satuan_barang'], $allowedUnit, true)) {
            $err[] = 'Satuan barang tidak valid.';
        }

        // harga_beli numerik >= 0
        if (!isset($d['harga_beli']) || !is_numeric($d['harga_beli']) || $d['harga_beli'] < 0) {
            $err[] = 'Harga beli harus angka ≥ 0.';
        }

        // status_barang boolean (0/1)
        if (isset($d['status_barang']) ) {
            if( !in_array($d['status_barang'], [0,1,'0','1'], true)) {
                $err[] = 'Status barang tidak valid.';
            }
        }

        if ($err) {
            throw new InvalidArgumentException(implode(' ', $err));
        }
    }


}
?>
