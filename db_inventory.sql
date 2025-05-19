CREATE DATABASE IF NOT EXISTS db_inventory;
USE db_inventory;
CREATE TABLE tb_inventory (
  id_barang INT AUTO_INCREMENT PRIMARY KEY,
  kode_barang VARCHAR(20),
  barcode_barang TEXT,
  nama_barang VARCHAR(50),
  jumlah_barang INT,
  satuan_barang VARCHAR(20),
  harga_beli DOUBLE(20,2),
  status_barang BOOLEAN DEFAULT 1
);
INSERT INTO tb_inventory
(kode_barang, barcode_barang, nama_barang, jumlah_barang, satuan_barang, harga_beli, status_barang)
VALUES
('BRG001','123456789012','Baut 2cm',100,'pcs',200.00,1),
('BRG002','123456789013','Paku 5cm',50,'pcs',150.00,1),
('BRG003','123456789014','Cat Putih 1L',20,'liter',45000.00,1),
('BRG004','123456789015','Kabel 10m',10,'meter',120000.00,1),
('BRG005','123456789016','Plastik 1kg',0,'kg',25000.00,0),
('BRG006','123456789017','Obeng Plus',15,'pcs',30000.00,1),
('BRG007','123456789018','Obeng Minus',15,'pcs',28000.00,1),
('BRG008','123456789019','Sarung Tangan',40,'pcs',10000.00,1),
('BRG009','123456789020','Lakban',30,'pcs',8000.00,1),
('BRG010','123456789021','Semen 50kg',25,'kg',60000.00,1),
('BRG011','123456789022','Besi Hollow',12,'meter',70000.00,1),
('BRG012','123456789023','Amplifier',5,'pcs',350000.00,1),
('BRG013','123456789024','Lampu LED',60,'pcs',12000.00,1),
('BRG014','123456789025','Masker',100,'pcs',2000.00,1),
('BRG015','123456789026','Kuas Cat',35,'pcs',7000.00,1);
