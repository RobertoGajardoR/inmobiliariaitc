-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2016 at 04:47 
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academias`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `rut` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `Codigoinmueble` varchar(10) NOT NULL,
  `numrecibo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `rut`, `sexo`, `Codigoinmueble`, `numrecibo`) VALUES
(5, 'juan norte', 'perez molina', '11433712-9', 'Hombre', 'I0005', 'A0005'),
(4, 'sepa ', 'alvaro ponce', '17040495-5', 'Hombre', 'I0004', 'A0004'),
(1, 'roberto', 'gajardo', '19326295-3', 'Hombre', 'I0001', 'A0001'),
(7, 'sepa moya', 'urrutia silva', '19378411-9', 'Hombre', 'I0007', 'A0007'),
(8, 'roberto', 'urrutia silva', '20611641-2', 'Hombre', 'I0006', 'A0008'),
(2, 'andres', 'antonio perz', '23135235-k', 'Hombre', 'I0002', 'A0002'),
(3, 'andres silvak', 'perez sapata', '5135833-3', 'Mujer', 'I0003', 'A0003');

-- --------------------------------------------------------

--
-- Table structure for table `edificios`
--

CREATE TABLE `edificios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edificios`
--

INSERT INTO `edificios` (`id`, `nombre`, `ubicacion`, `direccion`) VALUES
(12, 'nuevo milenion', 'santiago', 'pirnart #999'),
(13, 'catedral norte', 'cerro luz', 'pedro de valdivia  #33'),
(14, 'catedral sur', 'cisterna', 'malallla #33'),
(15, 'costanera', 'providencia', 'pedro de mott  #7777'),
(16, 'torrepalme', 'buenos aires', 'bernado #54654'),
(17, 'zeus', 'cotanera', 'costanera #777'),
(19, 'perumagico', 'peru', 'lima #360');

-- --------------------------------------------------------

--
-- Table structure for table `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `fechalim` date NOT NULL,
  `servicio` varchar(25) NOT NULL,
  `cuenta` varchar(25) NOT NULL,
  `banco` varchar(25) NOT NULL,
  `monto` varchar(25) NOT NULL,
  `situacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `egresos`
--

INSERT INTO `egresos` (`id`, `fechalim`, `servicio`, `cuenta`, `banco`, `monto`, `situacion`) VALUES
(1, '2016-01-30', 'internet', '315-6848', 'banco chile', '500055', 'pagado'),
(4, '2016-01-31', 'cable xxx', '54645-541-68', 'santander', '400000', 'sin pagar'),
(5, '2016-01-26', 'cable', '54645-541-684', 'banco chile', '20000', 'sin pagar'),
(6, '2016-01-18', 'luz', '315-6848', 'santander', '70000', 'sin pagar'),
(7, '2016-02-25', 'party boob', '1351516-5', 'falabella', '1000000', 'sin pagar'),
(8, '2016-03-22', 'limpieza', '4655-5465-654', 'banco peru', '1000000', 'sin pagar');

-- --------------------------------------------------------

--
-- Table structure for table `ingresos`
--

CREATE TABLE `ingresos` (
  `id` int(11) NOT NULL,
  `numrecibo` varchar(25) NOT NULL,
  `fechaemision` date NOT NULL,
  `montorenta` int(11) NOT NULL,
  `valoragua` int(11) NOT NULL,
  `valorluz` int(11) NOT NULL,
  `gastoscomunes` int(11) NOT NULL,
  `situacion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingresos`
--

INSERT INTO `ingresos` (`id`, `numrecibo`, `fechaemision`, `montorenta`, `valoragua`, `valorluz`, `gastoscomunes`, `situacion`) VALUES
(26, 'A0005', '2016-01-27', 300000, 20000, 15000, 10000, 'sin pagar'),
(27, 'A0001', '2016-01-25', 500000, 40000, 30000, 15000, 'pagado'),
(28, 'A0002', '2016-02-18', 350000, 40000, 45000, 40000, 'sin pagar'),
(29, 'A0008', '2016-01-11', 450000, 20000, 20000, 15000, 'pagado'),
(30, 'A0005', '2016-01-25', 400000, 50000, 20000, 10000, 'sin pagar'),
(31, 'A0004', '2016-01-26', 600000, 20000, 20000, 14000, 'sin pagar'),
(32, 'A0003', '2016-01-25', 250000, 25000, 30000, 15000, 'sin pagar'),
(33, 'A0001', '2016-02-29', 500000, 50000, 15000, 30000, 'pagado'),
(34, 'A0005', '2016-01-25', 460000, 15000, 20000, 25000, 'sin pagar'),
(35, 'A0003', '2016-01-31', 45004, 16007, 15005, 20000, 'sin pagar'),
(36, 'A0005', '2016-01-26', 400000, 40000, 20000, 15000, 'sin pagar');

-- --------------------------------------------------------

--
-- Table structure for table `inmuebles`
--

CREATE TABLE `inmuebles` (
  `edificio` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `Codigoinmueble` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inmuebles`
--

INSERT INTO `inmuebles` (`edificio`, `id`, `tipo`, `numero`, `descripcion`, `Codigoinmueble`) VALUES
('nuevo milenion', 40, 'Local', 'j456', 'sala amplia ', 'I0001'),
('nuevo milenion', 41, 'Piso', 'f54681', 'tres dormitorios', 'I0002'),
('costanera', 42, 'Oficina', 'c54351', 'baÃ±o en mal estado', 'I0003'),
('costanera', 43, 'Piso', '5cdfv5', 'sala azul', 'I0004'),
('nuevo milenion', 44, 'Oficina', 'd53454', 'dos baÃ±os', 'I0005'),
('catedral norte', 45, 'Piso', 'f422', 'vista al cerro', 'I0006'),
('catedral sur', 46, 'Local', '4sdf4542', 'un solo baÃ±o', 'I0007'),
('nuevo milenion', 47, 'Oficina', '545', 'vecinos simpaticos', 'I0008'),
('catedral norte', 48, 'Local', '5545', 'dscd', 'I0009'),
('catedral sur', 49, 'Local', '8654685n', 'mola', 'I0010'),
('torrepalme', 50, 'Piso', 'k4515', 'faltan puertas ', 'I0011'),
('perumagico', 51, 'Local', 'g777', 'buena comida peruna', 'I0012');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pasadmin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `email`, `pasadmin`) VALUES
(1, 'admin', '133', 'robertogajardo@gmail.com', '12345'),
(4, 'roberto', '123456', 'robertogajardo.r@gmail.com', ''),
(5, 'laperra', '13333', 'laperra@gmail.com', ''),
(7, 'benja', '4564', 'benja@gmail.cl', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`rut`),
  ADD UNIQUE KEY `id_inmueble_2` (`Codigoinmueble`),
  ADD UNIQUE KEY `numrecibo_2` (`numrecibo`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_clente` (`Codigoinmueble`),
  ADD KEY `id_inmueble` (`Codigoinmueble`),
  ADD KEY `id_inmueble_3` (`Codigoinmueble`),
  ADD KEY `numrecibo` (`numrecibo`),
  ADD KEY `Codigoinmueble` (`Codigoinmueble`);

--
-- Indexes for table `edificios`
--
ALTER TABLE `edificios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_2` (`nombre`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `nombre_3` (`nombre`);

--
-- Indexes for table `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numrecibo` (`numrecibo`);

--
-- Indexes for table `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `edificio` (`edificio`),
  ADD KEY `edificio_2` (`edificio`),
  ADD KEY `edificio_3` (`edificio`),
  ADD KEY `Codigoinmueble` (`Codigoinmueble`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `edificios`
--
ALTER TABLE `edificios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`Codigoinmueble`) REFERENCES `inmuebles` (`Codigoinmueble`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`numrecibo`) REFERENCES `clientes` (`numrecibo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD CONSTRAINT `inmuebles_ibfk_1` FOREIGN KEY (`edificio`) REFERENCES `edificios` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
