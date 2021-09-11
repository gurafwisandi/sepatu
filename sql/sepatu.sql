/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : sepatu

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2021-09-11 14:50:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `nama_item` varchar(64) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `ukuran` varchar(64) DEFAULT NULL,
  `warna` varchar(64) DEFAULT NULL,
  `deskripsi` varchar(128) DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `stok` double(5,0) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=2109060002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('2109060001', 'SEPATU ULTRABOOST 5.0 DNA', '2109060001', '32', 'PUTIH', 'SEPATU ULTRABOOST 5.0 DNA\r\nSEPATU RUNNING DENGAN TAMPILAN YANG COCOK DIPAKAI KE MANA PUN.\r\nKenyamanan yang berasal dari aktivita', '2500000', '2800000', '1', '2108080001');

-- ----------------------------
-- Table structure for `kategori`
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(15) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=2109060004 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('2109060001', 'PRIA');
INSERT INTO `kategori` VALUES ('2109060002', 'WANITA');
INSERT INTO `kategori` VALUES ('2109060003', 'ANAK');

-- ----------------------------
-- Table structure for `pegawai`
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(64) DEFAULT NULL,
  `jabatan` varchar(25) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=2109060002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES ('2108050001', 'ARSAL', 'SPV', 'Jalan Pramuka Smanda 6 Komplek Bina Lestari', '085821670414', 'arsal@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `pegawai` VALUES ('2109060001', 'SEPTA', 'KASIR', 'poris', '0813', 'septa@gmail.com', 'septa', '827ccb0eea8a706c4c34a16891f84e7b');

-- ----------------------------
-- Table structure for `pembelian`
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_pembelian` date DEFAULT NULL,
  `jam_pembelian` time DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=2109070002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES ('2109070001', '2021-09-06', '09:00:00', '5000000', '2108080001', 'Done');

-- ----------------------------
-- Table structure for `penjualan`
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_penjualan` date DEFAULT NULL,
  `jam_penjualan` time DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=2109110002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penjualan
-- ----------------------------
INSERT INTO `penjualan` VALUES ('2109110001', '2021-09-11', '11:24:57', '2520000', 'Done');

-- ----------------------------
-- Table structure for `supplier`
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(64) DEFAULT NULL,
  `alamat` varchar(64) DEFAULT NULL,
  `kota` varchar(64) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=2109060002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('2108080001', 'PT. PANARUP', 'jl. rangkas', 'tangerang', '089535795372');
INSERT INTO `supplier` VALUES ('2109060001', 'PT. ADIDAS', 'jl. surabaya', 'surabaya', '021');

-- ----------------------------
-- Table structure for `transaksi_pembelian`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_pembelian`;
CREATE TABLE `transaksi_pembelian` (
  `id_detail_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=2109070002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_pembelian
-- ----------------------------
INSERT INTO `transaksi_pembelian` VALUES ('2109070001', '2109060001', '2500000', '2', '5000000', '2109070001');

-- ----------------------------
-- Table structure for `transaksi_penjualan`
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_penjualan`;
CREATE TABLE `transaksi_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `id_item` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `diskon` varchar(64) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=2109110002 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_penjualan
-- ----------------------------
INSERT INTO `transaksi_penjualan` VALUES ('2109110001', '2109060001', '2800000', '1', '10', '2520000', '2109110001');
