CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL UNIQUE,
  `nik` varchar(100) NOT NULL UNIQUE,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL UNIQUE,
  `rule` varchar(100) NOT NULL,
  `bod`  date,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;