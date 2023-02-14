-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 08:25 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tables`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_no` varchar(14) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone_no`, `password`, `email_address`) VALUES
(111, 'Reema', '05487739222', '12333', 'Reema9@hotmail.com'),
(112, 'Razan', '05433002899', '15544', 'Razan5@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `productquantity` varchar(200) NOT NULL,
  `customerid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_no` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email_address`, `password`, `address`, `phone_no`) VALUES
(1, 'Sara', 'sara03@hotmail.com', '12345', 'Dammam', '0524587454'),
(2, 'Sara Saad', 'Sara33@hotmail.com', '', 'Khobar', '05543344555'),
(3, 'Mohammed', 'Mmd@hotmail.com', '', 'Alahsaa', '05094884777'),
(4, 'Sami', 'Sa_aljeh@hotmail.com', '', 'Dammam', '05099876544'),
(5, 'Maha Rashid', 'MahaR8@hotmail.com', '', 'Khobar', '05000939881'),
(6, 'Aljoharah', 'Joh99@hotmail.com', '', 'Riyadh', '05838727622'),
(7, 'Muhammad', 'muhammd@hotmail.com', '12345', 'Dammam', '056654785'),
(8, 'Jumana', 'Jumana@gmail.com', '12345', 'Dammam', '05664795452'),
(9, 'Sara', 'sara@gmail.com', '12345', 'Dammam', '0524587514'),
(10, 'Mona', 'Mona@gmail.com', '12345', 'Dammam', '32200'),
(11, 'Norah', 'Norah@gmail.com', '', '', ''),
(12, 'ryana', 'ryana@outlook.com', '11', 'dammam', '0503883023'),
(13, 'dala', 'da@outlook.com', '11', 'damma', '0503883023');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_bill` double NOT NULL,
  `payment_method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_bill`, `payment_method`) VALUES
(5522, 12, 150, 'visa card'),
(5523, 12, 60, 'visa card'),
(5524, 12, 60, 'visa card'),
(5525, 13, 90, 'visa card');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id_product`, `id_order`) VALUES
(4545, 5522),
(5599, 5522),
(5599, 5523),
(5599, 5524),
(8812, 5525),
(7665, 5525);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `Product_details` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `quantity`, `Product_details`, `image`) VALUES
(2323, 'Country Apple', 80, 10, 'The Country Apple takes you to Tuscany. Bask beneath the glow of the descending sun entwined amid the quirks and flickers of Italian citrus oils, all drenched in the luminosity of a hundred crushed figs. Textures of sensual musk tinted with a gentle brushed suede accord will help you to unfurl.', 'productimages/Country Apple.png'),
(4545, 'Water lily', 45, 10, 'The Water lily Candle embodies the beauty of the Eastern Sierras: rolling hills of shrubs, miles of stone and minerals, a post-hike soak in natural hot springs, and taking it easy outdoors. The fragrance is aromatic, dry, and woody with notes of cedar, granite, dry sage, and Sierra juniper.', 'productimages/Water lily.png'),
(5599, 'Cocomelon', 60, 10, 'The Old Cocomelon Candle is a sensual and contemporary take on fine leather, fusing spicy saffron with Egyptian violet to create a gratifying lapse in time away from the day to day. Timeless Bulgarian rose oil is framed by a distinctive accord of suede and benzoin, all resting within a shadow of glowing embers and raw Haitian vetiver.', 'productimages/Cocomelon.png'),
(7117, 'Winterfell', 50, 10, 'The complexity of Winterfell cosiness is driven by a scent of fresh green foliages mixed with Greek figs, patchouli, Icelandic woods, water jasmine, galbanum, and Tibetan roses to arrive at a familiar, enveloping warmth and a tinge of independent spirits.', 'productimages/Winterfell.png'),
(7665, 'Lake', 40, 10, 'The Lake is filled with delicate bergamot and musk-infused cloud tops, playfully soaring within a sensual blanket of orris powder and white tea. Sustainably sourced Sri Lankan black pepper and warming Indian ginger snugly blend with fine Virginian cedarwood to leave an understated, yet cosy, trail.', 'productimages/Lake.png'),
(8812, 'Moon light', 50, 10, 'The Moon light is voluptuous and room defining. Once lit, this modern chypre scent, framed by natural Bulgarian rose oil, unfolds to reveal flirtations of red berries, violet leaf and lychee. A burning bouquet of peony and transparent jasmine smoulder within an eclectic shadow of sumptuous labdanum, white musk and Indonesian patchouli.', 'productimages/Moon light.png'),
(9009, 'Sunshine', 50, 10, 'The Sunshine is a fragrance created for lie-ins. Wake up slow surrounded by a comforting veil of milky Madagascan vanilla dashed with warm sandalwood. Captivating amber and powdery musk emanate beneath subtle spices, charming Italian citruses, Moroccan iris and orange blossom to stimulate your week ahead.', 'productimages/Sunshine.png'),
(9011, 'Autumn Pearl', 40, 10, 'A creamy blend of lush orchid, vanilla and delicate freesia notes sweetened by the scent of spun sugar.', 'productimages/candle new.png'),
(9012, 'Pink Salt', 70, 10, 'It is an exotic island escape in the beautiful mix of bright citrus, sweet florals and spicy vanilla.', 'productimages/candle blo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5526;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9021;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
