CREATE TABLE IF NOT EXISTS `_fa5` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `class` varchar(42) DEFAULT NULL,
  `unicode` varchar(4) DEFAULT NULL,
  `kategori` varchar(7) DEFAULT NULL
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `_login` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `u53r` varchar(50) NOT NULL,
  `p455` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `uk` varchar(100) NOT NULL,
  `id_role` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `_menu_modul` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `label` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `icon_class_id` int(11) NOT NULL,
  `modul` varchar(100) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `_modul_akses` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `_modul_aksi` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_akses` int(11) NOT NULL,
  `input` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `deleteall` tinyint(1) NOT NULL DEFAULT '0',
  `load` tinyint(1) NOT NULL DEFAULT '0',
  `export` tinyint(1) NOT NULL DEFAULT '0',
  `print` tinyint(1) NOT NULL DEFAULT '0',
  `view_page` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `_role` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `_modul_akses`
  ADD CONSTRAINT `modul_akses_menu_fk` FOREIGN KEY (`id_menu`) REFERENCES `_menu_modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modul_akses_role_fk` FOREIGN KEY (`id_role`) REFERENCES `_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `_modul_aksi`
  ADD CONSTRAINT `modul_aksi_akses_fk` FOREIGN KEY (`id_akses`) REFERENCES `_modul_akses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

  