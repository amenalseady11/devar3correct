-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2021 at 07:27 AM
-- Server version: 5.7.32-0ubuntu0.16.04.1
-- PHP Version: 7.2.34-9+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crayotech_multistore`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attribute_id` int(11) NOT NULL,
  `attribute_code` varchar(225) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `layered_nav` int(11) NOT NULL,
  `required` int(11) NOT NULL,
  `label` varchar(225) NOT NULL,
  `quick_search` int(11) NOT NULL,
  `advanced_search` int(11) NOT NULL,
  `configurable` enum('Yes','No') NOT NULL DEFAULT 'No',
  `specific_categories` varchar(50) NOT NULL,
  `search_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_code`, `input_type`, `layered_nav`, `required`, `label`, `quick_search`, `advanced_search`, `configurable`, `specific_categories`, `search_categories`) VALUES
(3, 'color', 'dropdown', 1, 1, 'Color', 1, 1, 'Yes', '0', 0),
(4, 'size', 'dropdown', 0, 1, 'Size', 0, 0, 'Yes', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_options`
--

CREATE TABLE `attribute_options` (
  `option_id` int(11) NOT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `option_value` varchar(225) NOT NULL,
  `option_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_options`
--

INSERT INTO `attribute_options` (`option_id`, `attribute_id`, `option_value`, `option_position`) VALUES
(9, 3, 'Red', 0),
(10, 3, 'Blue', 0),
(11, 3, 'Black', 0),
(12, 3, 'Green', 0),
(13, 4, 'Small', 0),
(14, 4, 'Large', 0),
(15, 4, 'Mediam', 0),
(16, 4, 'Large', 0),
(17, 4, 'Mediam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_set`
--

CREATE TABLE `attribute_set` (
  `set_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_set`
--

INSERT INTO `attribute_set` (`set_id`, `name`) VALUES
(1, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_set_options`
--

CREATE TABLE `attribute_set_options` (
  `id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `attribute_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_set_options`
--

INSERT INTO `attribute_set_options` (`id`, `set_id`, `attribute_id`) VALUES
(41, 1, '3'),
(42, 1, '4');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(335) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `description`, `link`) VALUES
(3, 'Slider 1', 'b7809-slide1.jpg', '', ''),
(4, 'Slider 2', 'a21e6-slide2.jpg', '', ''),
(5, 'Slider 3', '53994-slide3.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `url_key` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catalog_category`
--

CREATE TABLE `catalog_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `featured` int(5) NOT NULL,
  `url_key` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `parent_category` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `attributes` text NOT NULL,
  `tag_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_category`
--

INSERT INTO `catalog_category` (`category_id`, `category_name`, `featured`, `url_key`, `description`, `parent_category`, `image`, `attributes`, `tag_group`) VALUES
(1, 'Cosmetic', 1, 'cosmetic', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 0, 'nnmj_1611660225_category-01.jpg', '', 0),
(6, 'Skincare & Spa', 1, 'skincare-spa', '', 0, 'jbxe_1611660274_category-02.jpg', '', 0),
(7, 'Consumer Goods', 1, 'consumer-goods', '', 0, 'zjy8_1611660315_category-03.jpg', '', 0),
(8, 'Stationery', 1, 'stationery', '', 0, '2rrh_1611660332_category-04.jpg', '', 0),
(9, 'Gift Shop', 1, 'gift-shop', '', 0, 'nowf_1611662215_category-05.jpg', '', 0),
(10, 'Beauty Equipment', 1, 'beauty-equipment', '', 0, 'yezf_1611662239_category-06.jpg', '', 0),
(11, 'Food', 1, 'food', '', 0, 'ji6f_1611662259_category-07.jpg', '', 0),
(12, 'Pet Product', 1, 'pet-product', '', 0, 'm5cr_1611662321_category-08.jpg', '', 0),
(13, 'IT', 1, 'it', '', 0, 's4su_1611662352_category-09.jpg', '', 0),
(14, 'Medical', 1, 'medical', '', 0, 'vzas_1611662683_category-10.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product`
--

CREATE TABLE `catalog_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `url_key` varchar(225) NOT NULL,
  `feature` int(2) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(200) NOT NULL,
  `stock` varchar(50) NOT NULL,
  `special_price` varchar(200) NOT NULL,
  `product_code` varchar(225) NOT NULL,
  `status` int(2) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `default_image` varchar(150) NOT NULL,
  `youtube_video_url` varchar(300) NOT NULL,
  `sub_title` varchar(300) NOT NULL,
  `level` varchar(200) NOT NULL,
  `attributes` text NOT NULL,
  `attribute_set_id` int(11) NOT NULL,
  `attributee_data` text NOT NULL,
  `tags` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `short_title` varchar(300) NOT NULL,
  `look_book` varchar(225) NOT NULL,
  `line_sheet` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `config_attributes` text NOT NULL,
  `price_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_product`
--

INSERT INTO `catalog_product` (`product_id`, `product_name`, `category`, `url_key`, `feature`, `description`, `qty`, `price`, `stock`, `special_price`, `product_code`, `status`, `weight`, `default_image`, `youtube_video_url`, `sub_title`, `level`, `attributes`, `attribute_set_id`, `attributee_data`, `tags`, `image`, `short_title`, `look_book`, `line_sheet`, `user_id`, `config_attributes`, `price_data`) VALUES
(3, 'IN2IT Natural Brow Waterproof Eyebrow Mascara NBM02 Copper', '1', 'in2it-natural-brow-waterproof-eyebrow-mascara-nbm02-copper', 0, '', 50, '', '', '', 'in2it-natural-brow-waterproof-eyebrow-mascara-nbm02-copper', 1, '0.6', '', '', '', '', '{}', 1, '', '', 'zfax_1611728403_products-for-Bahrain_201102_21-600x600.jpeg', '', '', '', 0, '', '[{"price":"2.90","special_price":"","currency_code":"BHD","currency_id":"12"},{"price":"2.90","special_price":"","currency_code":"KWD","currency_id":"78"},{"price":"2.90","special_price":"","currency_code":"OMR","currency_id":"110"},{"price":"2.90","special_price":"","currency_code":"QAR","currency_id":"118"},{"price":"2.90","special_price":"","currency_code":"SAR","currency_id":"127"},{"price":"2.90","special_price":"","currency_code":"AED","currency_id":"157"}]'),
(4, 'IN2IT Highlight & Contour – HC01', '1', 'in2it-highlight-contour-hc01', 0, '', 0, '', '', '', 'in2it-highlight-contour-hc01', 1, '0.34', '', '', '', '', '{}', 1, '', '', 'ct6h_1611728603_products-for-Bahrain_201102_17-600x600.jpeg', '', '', '', 0, '', '[{"price":"5.40","special_price":"","currency_code":"BHD","currency_id":"12"},{"price":"5.40","special_price":"","currency_code":"KWD","currency_id":"78"},{"price":"5.40","special_price":"","currency_code":"OMR","currency_id":"110"},{"price":"5.40","special_price":"","currency_code":"QAR","currency_id":"118"},{"price":"5.40","special_price":"","currency_code":"SAR","currency_id":"127"},{"price":"5.40","special_price":"","currency_code":"AED","currency_id":"157"}]'),
(5, 'IN2IT UV Shine Control Sheer Face Powder With Oil Control SPF 15 PA++ – SCP03 Harvest', '1', 'in2it-uv-shine-control-sheer-face-powder-with-oil-control-spf-15-pa-scp03-harvest', 0, '', 50, '', '', '', 'in2it-uv-shine-control-sheer-face-powder-with-oil-control-spf-15-pa-scp03-harvest', 1, '0.9', '', '', '', '', '{}', 1, '', '', 'cj2g_1611728728_products-for-Bahrain_201102_28-600x600.jpeg', '', '', '', 0, '', '[{"price":"3.90","special_price":"","currency_code":"BHD","currency_id":"12"},{"price":"3.90","special_price":"","currency_code":"KWD","currency_id":"78"},{"price":"3.90","special_price":"","currency_code":"OMR","currency_id":"110"},{"price":"3.90","special_price":"","currency_code":"QAR","currency_id":"118"},{"price":"3.90","special_price":"","currency_code":"SAR","currency_id":"127"},{"price":"3.90","special_price":"","currency_code":"AED","currency_id":"157"}]'),
(6, 'Simply Tanaka Soap', '6', 'simply-tanaka-soap', 0, '', 50, '', '', '', 'simply-tanaka-soap', 1, '', '', '', '', '', '{}', 1, '', '', 'ftvp_1611728966_5_20210126112902.png', '', '', '', 0, '', '[{"price":"2.63","special_price":"","currency_code":"BHD","currency_id":"12"},{"price":"2.63","special_price":"","currency_code":"KWD","currency_id":"78"},{"price":"2.63","special_price":"","currency_code":"OMR","currency_id":"110"},{"price":"2.63","special_price":"","currency_code":"QAR","currency_id":"118"},{"price":"2.63","special_price":"","currency_code":"SAR","currency_id":"127"},{"price":"2.63","special_price":"","currency_code":"AED","currency_id":"157"}]'),
(7, 'Murr Fiber', '6', 'murr-fiber', 0, '', 50, '', '', '', 'murr-fiber', 1, '', '', '', '', '', '{}', 1, '', '', 'rubs_1611729674_2_20210123182540.png', '', '', '', 0, '', '[{"price":"5.90","special_price":"","currency_code":"BHD","currency_id":"12"},{"price":"5.90","special_price":"","currency_code":"KWD","currency_id":"78"},{"price":"5.90","special_price":"","currency_code":"OMR","currency_id":"110"},{"price":"5.90","special_price":"","currency_code":"QAR","currency_id":"118"},{"price":"5.90","special_price":"","currency_code":"SAR","currency_id":"127"},{"price":"5.90","special_price":"","currency_code":"AED","currency_id":"157"}]'),
(8, 'Herbal Tea – red', '6', 'herbal-tea-red', 0, '', 50, '', '', '', 'herbal-tea-red', 1, '', '', '', '', '', '{}', 1, '', '', 'yd8d_1611729775_S__3309572-600x720.jpeg', '', '', '', 0, '', '[{"price":"11.13","special_price":"","currency_code":"BHD","currency_id":"12"},{"price":"11.13","special_price":"","currency_code":"KWD","currency_id":"78"},{"price":"11.13","special_price":"","currency_code":"OMR","currency_id":"110"},{"price":"11.13","special_price":"","currency_code":"QAR","currency_id":"118"},{"price":"11.13","special_price":"","currency_code":"SAR","currency_id":"127"},{"price":"11.13","special_price":"","currency_code":"AED","currency_id":"157"}]');

-- --------------------------------------------------------

--
-- Table structure for table `category_level`
--

CREATE TABLE `category_level` (
  `category_id` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_level`
--

INSERT INTO `category_level` (`category_id`, `level`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 2),
(16, 3),
(17, 4),
(18, 4),
(19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category_urls`
--

CREATE TABLE `category_urls` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `url` varchar(225) NOT NULL,
  `url_ids` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_urls`
--

INSERT INTO `category_urls` (`id`, `category_id`, `url`, `url_ids`) VALUES
(1, 1, 'cosmetic', '1'),
(6, 6, 'skincare-spa', '6'),
(7, 7, 'consumer-goods', '7'),
(8, 8, 'stationery', '8'),
(9, 9, 'gift-shop', '9'),
(10, 10, 'beauty-equipment', '10'),
(11, 11, 'food', '11'),
(12, 12, 'pet-product', '12'),
(13, 13, 'it', '13'),
(14, 14, 'medical', '14'),
(15, 15, 'cosmetic/test', '1/15'),
(16, 16, 'cosmetic/test/test2', '1/15/16'),
(17, 17, 'cosmetic/test/test2/test', '1/15/16/17'),
(18, 18, 'cosmetic/test/test2/ssss', '1/15/16/18'),
(19, 19, 'cosmetic/test2', '1/19');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `page_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `sub_title` varchar(225) NOT NULL,
  `url_key` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`page_id`, `title`, `sub_title`, `url_key`, `content`, `image`, `status`) VALUES
(1, ' About Us', 'About Company', 'about-us.html', '<p>\r\n	CORNISH ARABIAN ALUMINIUM FACTORY LLC started its operation in Dubai since 1984 as &ldquo;Cornish Aluminium&rdquo;. Over 3 decades we have introduced many Arabic ethnic designs by incorporating traditional architectural with modern engineering and technology make us unique in market. Our capability of integrating traditional and modern design made us one of the leading aluminium fabrication company in UAE, OMAN &amp; QATAR.</p>\r\n<p style="margin-bottom: 5px;">\r\n	We are an integrated group of companies operating across UAE, OMAN and QATAR specialized in the field of Fabrication and installation of Architectural Envelopes such as :</p>\r\n<div>\r\n	<ul class="list-chevron-circle">\r\n		<li>\r\n			Louver</li>\r\n		<li>\r\n			Curtain Walls</li>\r\n		<li>\r\n			Aluminium Doors</li>\r\n		<li>\r\n			Aluminium Windows</li>\r\n		<li>\r\n			Aluminium Mashrabiya Screens</li>\r\n		<li>\r\n			Skylights</li>\r\n		<li>\r\n			Balustrades</li>\r\n		<li>\r\n			ACP Cladding</li>\r\n		<li>\r\n			SS Hand Rail &amp; Ramp Rail</li>\r\n		<li>\r\n			Other Aluminium &amp; Street Architectural Items</li>\r\n	</ul>\r\n</div>\r\n<p>\r\n	Today we have more than 2000 employees working across GCC being a part of global movement to be the magic development of each region</p>\r\n<div>\r\n	<p>\r\n		We CORNISH ARABIAN ALUMINIUM FACTORY LLC, is actually a one-stop service solution for many clients throughout GCC. With our value engineering process we are specialized in providing the top quality material and service at affordable price. A dedicated planning team will analyze each scope of work and design in a way to make sure our clients are benefited out of it.</p>\r\n</div>\r\n', '', 1),
(2, 'Services', 'Services', 'services.html', '<p><b>Aluminium and Glass</b></p>\r\n                            <p style="margin-bottom: 5px;">\r\n                                Cornish Arabian Aluminium Factory offer engineering services that include design, development, fabrication and maintenance of superior quality metal and glazing solutions for construction projects of any kind or scale. We are regarded as one of the premium companies in the industry with a large workforce and a solid time-tested reputation among contractors and consultants. Our products include Spider System Facades, Structural Glazing, Doors and Windows, Partitions, Skylights and Domes, Stair Handrails, Balcony Handrails and Balustrades, Frame-less Structures, Curtain Walls, Decorative Metal Work, Aluminium Composite Panel Cladding and Cast Aluminium.\r\n                            </p>\r\n                      <div>\r\n                          <ul class="list-chevron-circle">\r\n                                        <li>Curtain Walls – Stick type</li>\r\n                                        <li>Structural Glazing</li>\r\n                                        <li>Doors</li>\r\n                                        <li>Windows</li>\r\n                                        <li>Partitions</li>\r\n                                        <li>Spider System Facades</li>\r\n                                        <li>Frame less Structures</li>\r\n                                        <li>Skylight and Dome</li>\r\n                                        <li>Aluminum Composite Panel Cladding</li>\r\n                                        <li>Stairs handrails, Balcony rails and balustrades</li>\r\n                                        <li>Decorative Metal Work</li>\r\n                                    </ul>\r\n                      </div>', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configurable_products`
--

CREATE TABLE `configurable_products` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `product_code` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `url_key` varchar(225) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `special_price` float NOT NULL,
  `status` enum('Enable','Disable') NOT NULL,
  `default_image` varchar(225) NOT NULL,
  `visibility` enum('Not Visible','Catalog') NOT NULL,
  `stock` varchar(225) NOT NULL,
  `attribute_info` text NOT NULL,
  `combination` text NOT NULL,
  `price_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configurable_products`
--

INSERT INTO `configurable_products` (`id`, `parent_id`, `name`, `product_code`, `category`, `url_key`, `qty`, `price`, `special_price`, `status`, `default_image`, `visibility`, `stock`, `attribute_info`, `combination`, `price_data`) VALUES
(5, 2, '', '', '', '', 50, 100, 0, '', '38d3_1610894832_sc138392.jpeg', 'Not Visible', '1', '{"color":"9","size":"13"}', '9,13', '[{"price":"90","special_price":"","currency_code":"BHD","currency_id":"12"},{"price":"90","special_price":"","currency_code":"KWD","currency_id":"78"},{"price":"90","special_price":"","currency_code":"OMR","currency_id":"110"},{"price":"90","special_price":"","currency_code":"QAR","currency_id":"118"},{"price":"90","special_price":"","currency_code":"SAR","currency_id":"127"},{"price":"90","special_price":"","currency_code":"AED","currency_id":"157"}]'),
(6, 2, '', '', '', '', 50, 100, 0, '', 'vkpc_1610894851_fun_swimsuit_2.jpeg', 'Not Visible', '1', '{"color":"10","size":"14"}', '10,14', '[{"price":"100","special_price":"","currency_code":"BHD","currency_id":"12"},{"price":"100","special_price":"","currency_code":"KWD","currency_id":"78"},{"price":"100","special_price":"","currency_code":"OMR","currency_id":"110"},{"price":"100","special_price":"","currency_code":"QAR","currency_id":"118"},{"price":"100","special_price":"","currency_code":"SAR","currency_id":"127"},{"price":"100","special_price":"","currency_code":"AED","currency_id":"157"}]'),
(7, 2, '', '', '', '', 50, 0, 0, 'Enable', 'tdxh_1611409864_sc138392.jpeg', 'Not Visible', '1', '{"color":"9","size":"15"}', '9,15', '[{"price":"100","special_price":"","currency_code":"BHD","currency_id":"12"},{"price":"100","special_price":"","currency_code":"KWD","currency_id":"78"},{"price":"100","special_price":"","currency_code":"OMR","currency_id":"110"},{"price":"100","special_price":"","currency_code":"QAR","currency_id":"118"},{"price":"100","special_price":"","currency_code":"SAR","currency_id":"127"},{"price":"100","special_price":"","currency_code":"AED","currency_id":"157"}]');

-- --------------------------------------------------------

--
-- Table structure for table `configurable_products_image`
--

CREATE TABLE `configurable_products_image` (
  `id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configurable_products_image`
--

INSERT INTO `configurable_products_image` (`id`, `image`, `product_id`) VALUES
(1, 'f0043-fun_swimsuit_2.jpeg', 1),
(2, '0309f-sc138392.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `phone_number_two` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `place` varchar(225) NOT NULL,
  `facebook_url` varchar(225) NOT NULL,
  `linked_in_url` varchar(225) NOT NULL,
  `best_quality` text NOT NULL,
  `support` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `email`, `phone_number`, `phone_number_two`, `address`, `place`, `facebook_url`, `linked_in_url`, `best_quality`, `support`) VALUES
(1, ' info@dfdsf', '+97 14 25 888 28', '+971 50 919 5981', '<h5 class="wt-tilte text-uppercase m-b0">\r\n	Address</h5>\r\n<p>\r\n	PO Box 20237, Dubai, United Arab Emirates</p>\r\n', 'dubai/uae', '', '', 'Lorem ipsum dolor sit amet, cdipiscing elit, sed diam non dolore .', 'Lorem ipsum dolor sit amet, cdipiscing elit, sed diam non dolore .');

-- --------------------------------------------------------

--
-- Table structure for table `config_data`
--

CREATE TABLE `config_data` (
  `id` int(11) NOT NULL,
  `scop_id` int(11) NOT NULL,
  `path` varchar(225) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_data`
--

INSERT INTO `config_data` (`id`, `scop_id`, `path`, `value`) VALUES
(1, 0, 'configurations/general/allowed_countries', '[{"id":"221","code":"TH","name":"Thailand"},{"id":"225","code":"TO","name":"Tonga"}]'),
(2, 0, 'configurations/general/state', '[{"id":"35","code":"BG","name":"Bulgaria"},{"id":"38","code":"KH","name":"Cambodia"}]'),
(3, 0, 'configurations/general/zipcode', '[{"id":"6","code":"AD","name":"Andorra"},{"id":"171","code":"PA","name":"Panama"},{"id":"219","code":"TJ","name":"Tajikistan"}]'),
(4, 0, 'configurations/general/zones', '165'),
(5, 0, 'configurations/general/defaultlocale', '26'),
(6, 0, 'configurations/general/locales', '[{"id":"7","code":"ar_SA","name":"Arabic (Saudi Arabia)"},{"id":"26","code":"en_US","name":"English (United States)"},{"id":"77","code":"th_TH","name":"Thai (Thailand)"}]'),
(7, 0, 'configurations/general/unit', 'Kgs'),
(8, 0, 'configurations/general/storename', 'dgdfgd1'),
(9, 0, 'configurations/general/storecountry', '184'),
(10, 0, 'configurations/general/phone', '4565461'),
(11, 0, 'configurations/general/region', 'dfgdfgf1'),
(12, 0, 'configurations/general/postalcode', 'rtert5461'),
(13, 0, 'configurations/general/address1', 'gdfgdfg1'),
(14, 0, 'configurations/general/address2', 'dfgfdgfdg11'),
(15, 0, 'configurations/general/city', 'dfgfdgdfg1'),
(16, 0, 'configurations/general/vat', '564fdg1'),
(17, 0, 'configurations/currency_setup/allowedcurrencies', '[{"id":"12","code":"BHD","name":"Bahraini Dinar"},{"id":"78","code":"KWD","name":"Kuwaiti Dinar"},{"id":"110","code":"OMR","name":"Omani Rial"},{"id":"118","code":"QAR","name":"Qatari Rial"},{"id":"127","code":"SAR","name":"Saudi Riyal"},{"id":"157","code":"AED","name":"United Arab Emirates Dirham"}]'),
(18, 0, 'configurations/currency_setup/basecurrency', 'BHD'),
(19, 0, 'configurations/currency_setup/conversion', 'manual'),
(20, 0, 'configurations/email/general_contact_name', 'gdfgfdg'),
(21, 0, 'configurations/email/general_contact_email', 'dgdfg@test.com'),
(22, 0, 'configurations/email/support_name', 'dfgdfg'),
(23, 0, 'configurations/email/support_email', 'ggg@test.com'),
(24, 0, 'configurations/email/contact_enable', 'no'),
(25, 0, 'configurations/email/email_to', 'gdfgdfg@test.com'),
(26, 0, 'configurations/catalog/products_per_page', '10'),
(27, 0, 'configurations/catalog/product_sort', 'productname'),
(28, 0, 'configurations/catalog/product_enable', 'yes'),
(29, 0, 'configurations/catalog/guest_review', 'no'),
(30, 0, 'configurations/catalog/stock_products', 'yes'),
(31, 0, 'configurations/catalog/max_quantity', '11'),
(32, 0, 'configurations/catalog/website_key', 'dfgdfgdf46565fgfghfghgfh1'),
(33, 0, 'configurations/catalog/secret_key', 'fgdfgdf456546cvbccvb4565461'),
(34, 0, 'configurations/catalog/key_status', 'yes'),
(35, 0, 'configurations/general/logo', '1611573305-logo_dark.png');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_code` char(2) COLLATE utf8_bin DEFAULT NULL,
  `country_name` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Åland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AU', 'Australia'),
(15, 'AT', 'Austria'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BS', 'Bahamas'),
(18, 'BH', 'Bahrain'),
(19, 'BD', 'Bangladesh'),
(20, 'BB', 'Barbados'),
(21, 'BY', 'Belarus'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BM', 'Bermuda'),
(26, 'BT', 'Bhutan'),
(27, 'BO', 'Bolivia, Plurinational State of'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British Indian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'CV', 'Cape Verde'),
(42, 'KY', 'Cayman Islands'),
(43, 'CF', 'Central African Republic'),
(44, 'TD', 'Chad'),
(45, 'CL', 'Chile'),
(46, 'CN', 'China'),
(47, 'CX', 'Christmas Island'),
(48, 'CC', 'Cocos (Keeling) Islands'),
(49, 'CO', 'Colombia'),
(50, 'KM', 'Comoros'),
(51, 'CG', 'Congo'),
(52, 'CD', 'Congo, the Democratic Republic of the'),
(53, 'CK', 'Cook Islands'),
(54, 'CR', 'Costa Rica'),
(55, 'CI', 'Côte d\'Ivoire'),
(56, 'HR', 'Croatia'),
(57, 'CU', 'Cuba'),
(58, 'CW', 'Curaçao'),
(59, 'CY', 'Cyprus'),
(60, 'CZ', 'Czech Republic'),
(61, 'DK', 'Denmark'),
(62, 'DJ', 'Djibouti'),
(63, 'DM', 'Dominica'),
(64, 'DO', 'Dominican Republic'),
(65, 'EC', 'Ecuador'),
(66, 'EG', 'Egypt'),
(67, 'SV', 'El Salvador'),
(68, 'GQ', 'Equatorial Guinea'),
(69, 'ER', 'Eritrea'),
(70, 'EE', 'Estonia'),
(71, 'ET', 'Ethiopia'),
(72, 'FK', 'Falkland Islands (Malvinas)'),
(73, 'FO', 'Faroe Islands'),
(74, 'FJ', 'Fiji'),
(75, 'FI', 'Finland'),
(76, 'FR', 'France'),
(77, 'GF', 'French Guiana'),
(78, 'PF', 'French Polynesia'),
(79, 'TF', 'French Southern Territories'),
(80, 'GA', 'Gabon'),
(81, 'GM', 'Gambia'),
(82, 'GE', 'Georgia'),
(83, 'DE', 'Germany'),
(84, 'GH', 'Ghana'),
(85, 'GI', 'Gibraltar'),
(86, 'GR', 'Greece'),
(87, 'GL', 'Greenland'),
(88, 'GD', 'Grenada'),
(89, 'GP', 'Guadeloupe'),
(90, 'GU', 'Guam'),
(91, 'GT', 'Guatemala'),
(92, 'GG', 'Guernsey'),
(93, 'GN', 'Guinea'),
(94, 'GW', 'Guinea-Bissau'),
(95, 'GY', 'Guyana'),
(96, 'HT', 'Haiti'),
(97, 'HM', 'Heard Island and McDonald Islands'),
(98, 'VA', 'Holy See (Vatican City State)'),
(99, 'HN', 'Honduras'),
(100, 'HK', 'Hong Kong'),
(101, 'HU', 'Hungary'),
(102, 'IS', 'Iceland'),
(103, 'IN', 'India'),
(104, 'ID', 'Indonesia'),
(105, 'IR', 'Iran, Islamic Republic of'),
(106, 'IQ', 'Iraq'),
(107, 'IE', 'Ireland'),
(108, 'IM', 'Isle of Man'),
(109, 'IL', 'Israel'),
(110, 'IT', 'Italy'),
(111, 'JM', 'Jamaica'),
(112, 'JP', 'Japan'),
(113, 'JE', 'Jersey'),
(114, 'JO', 'Jordan'),
(115, 'KZ', 'Kazakhstan'),
(116, 'KE', 'Kenya'),
(117, 'KI', 'Kiribati'),
(118, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 'KR', 'Korea, Republic of'),
(120, 'KW', 'Kuwait'),
(121, 'KG', 'Kyrgyzstan'),
(122, 'LA', 'Lao People\'s Democratic Republic'),
(123, 'LV', 'Latvia'),
(124, 'LB', 'Lebanon'),
(125, 'LS', 'Lesotho'),
(126, 'LR', 'Liberia'),
(127, 'LY', 'Libya'),
(128, 'LI', 'Liechtenstein'),
(129, 'LT', 'Lithuania'),
(130, 'LU', 'Luxembourg'),
(131, 'MO', 'Macao'),
(132, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(133, 'MG', 'Madagascar'),
(134, 'MW', 'Malawi'),
(135, 'MY', 'Malaysia'),
(136, 'MV', 'Maldives'),
(137, 'ML', 'Mali'),
(138, 'MT', 'Malta'),
(139, 'MH', 'Marshall Islands'),
(140, 'MQ', 'Martinique'),
(141, 'MR', 'Mauritania'),
(142, 'MU', 'Mauritius'),
(143, 'YT', 'Mayotte'),
(144, 'MX', 'Mexico'),
(145, 'FM', 'Micronesia, Federated States of'),
(146, 'MD', 'Moldova, Republic of'),
(147, 'MC', 'Monaco'),
(148, 'MN', 'Mongolia'),
(149, 'ME', 'Montenegro'),
(150, 'MS', 'Montserrat'),
(151, 'MA', 'Morocco'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NL', 'Netherlands'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine, State of'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Réunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'BL', 'Saint Barthélemy'),
(186, 'SH', 'Saint Helena, Ascension and Tristan da Cunha'),
(187, 'KN', 'Saint Kitts and Nevis'),
(188, 'LC', 'Saint Lucia'),
(189, 'MF', 'Saint Martin (French part)'),
(190, 'PM', 'Saint Pierre and Miquelon'),
(191, 'VC', 'Saint Vincent and the Grenadines'),
(192, 'WS', 'Samoa'),
(193, 'SM', 'San Marino'),
(194, 'ST', 'Sao Tome and Principe'),
(195, 'SA', 'Saudi Arabia'),
(196, 'SN', 'Senegal'),
(197, 'RS', 'Serbia'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leone'),
(200, 'SG', 'Singapore'),
(201, 'SX', 'Sint Maarten (Dutch part)'),
(202, 'SK', 'Slovakia'),
(203, 'SI', 'Slovenia'),
(204, 'SB', 'Solomon Islands'),
(205, 'SO', 'Somalia'),
(206, 'ZA', 'South Africa'),
(207, 'GS', 'South Georgia and the South Sandwich Islands'),
(208, 'SS', 'South Sudan'),
(209, 'ES', 'Spain'),
(210, 'LK', 'Sri Lanka'),
(211, 'SD', 'Sudan'),
(212, 'SR', 'Suriname'),
(213, 'SJ', 'Svalbard and Jan Mayen'),
(214, 'SZ', 'Swaziland'),
(215, 'SE', 'Sweden'),
(216, 'CH', 'Switzerland'),
(217, 'SY', 'Syrian Arab Republic'),
(218, 'TW', 'Taiwan, Province of China'),
(219, 'TJ', 'Tajikistan'),
(220, 'TZ', 'Tanzania, United Republic of'),
(221, 'TH', 'Thailand'),
(222, 'TL', 'Timor-Leste'),
(223, 'TG', 'Togo'),
(224, 'TK', 'Tokelau'),
(225, 'TO', 'Tonga'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TN', 'Tunisia'),
(228, 'TR', 'Turkey'),
(229, 'TM', 'Turkmenistan'),
(230, 'TC', 'Turks and Caicos Islands'),
(231, 'TV', 'Tuvalu'),
(232, 'UG', 'Uganda'),
(233, 'UA', 'Ukraine'),
(234, 'AE', 'United Arab Emirates'),
(235, 'GB', 'United Kingdom'),
(236, 'US', 'United States'),
(237, 'UM', 'United States Minor Outlying Islands'),
(238, 'UY', 'Uruguay'),
(239, 'UZ', 'Uzbekistan'),
(240, 'VU', 'Vanuatu'),
(241, 'VE', 'Venezuela, Bolivarian Republic of'),
(242, 'VN', 'Viet Nam'),
(243, 'VG', 'Virgin Islands, British'),
(244, 'VI', 'Virgin Islands, U.S.'),
(245, 'WF', 'Wallis and Futuna'),
(246, 'EH', 'Western Sahara'),
(247, 'YE', 'Yemen'),
(248, 'ZM', 'Zambia'),
(249, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(40) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `coupon_amount` varchar(100) NOT NULL,
  `users` text,
  `pids` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usable` int(100) NOT NULL,
  `limit` varchar(100) NOT NULL,
  `amount_type` enum('Fixed','Percentage') NOT NULL,
  `exp_date` timestamp NULL DEFAULT NULL,
  `status` enum('Enable','Disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_amount`, `users`, `pids`, `created_at`, `usable`, `limit`, `amount_type`, `exp_date`, `status`) VALUES
(6, 'lbgcwryp', '50', '', '', '2016-02-25 18:30:00', 1, '1000', 'Fixed', NULL, 'Enable'),
(7, 'lbgcu5qp', '50', '', '', '2016-02-25 18:30:00', 1, '1000', 'Fixed', NULL, 'Enable'),
(8, 'lbgc4rur', '50', '', '', '2016-02-25 18:30:00', 1, '1000', 'Fixed', NULL, 'Enable'),
(9, 'lbgcj82w', '50', '', '', '2016-02-25 18:30:00', 1, '1000', 'Fixed', NULL, 'Enable'),
(10, 'lbgc24yn', '50', '', '', '2016-02-25 18:30:00', 1, '1000', 'Fixed', NULL, 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `currency_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `currency_code`, `currency_name`) VALUES
(1, 'AFN', 'Afghan Afghani'),
(2, 'ALL', 'Albanian Lek'),
(3, 'DZD', 'Algerian Dinar'),
(4, 'AOA', 'Angolan Kwanza'),
(5, 'ARS', 'Argentine Peso'),
(6, 'AMD', 'Armenian Dram'),
(7, 'AWG', 'Aruban Florin'),
(8, 'AUD', 'Australian Dollar'),
(9, 'AZN', 'Azerbaijani Manat'),
(10, 'AZM', 'Azerbaijani Manat (1993-2006)'),
(11, 'BSD', 'Bahamian Dollar'),
(12, 'BHD', 'Bahraini Dinar'),
(13, 'BDT', 'Bangladeshi Taka'),
(14, 'BBD', 'Barbadian Dollar'),
(15, 'BYR', 'Belarusian Ruble'),
(16, 'BZD', 'Belize Dollar'),
(17, 'BMD', 'Bermudan Dollar'),
(18, 'BTN', 'Bhutanese Ngultrum'),
(19, 'BOB', 'Bolivian Boliviano'),
(20, 'BAM', 'Bosnia-Herzegovina Convertible Mark'),
(21, 'BWP', 'Botswanan Pula'),
(22, 'BRL', 'Brazilian Real'),
(23, 'GBP', 'British Pound Sterling'),
(24, 'BND', 'Brunei Dollar'),
(25, 'BGN', 'Bulgarian Lev'),
(26, 'BUK', 'Burmese Kyat'),
(27, 'BIF', 'Burundian Franc'),
(28, 'XOF', 'CFA Franc BCEAO'),
(29, 'XPF', 'CFP Franc'),
(30, 'KHR', 'Cambodian Riel'),
(31, 'CAD', 'Canadian Dollar'),
(32, 'CVE', 'Cape Verdean Escudo'),
(33, 'KYD', 'Cayman Islands Dollar'),
(34, 'CLP', 'Chilean Peso'),
(35, 'CNY', 'Chinese Yuan'),
(36, 'COP', 'Colombian Peso'),
(37, 'KMF', 'Comorian Franc'),
(38, 'CDF', 'Congolese Franc'),
(39, 'CRC', 'Costa Rican Colon'),
(40, 'HRK', 'Croatian Kuna'),
(41, 'CUP', 'Cuban Peso'),
(42, 'CZK', 'Czech Republic Koruna'),
(43, 'DKK', 'Danish Krone'),
(44, 'DJF', 'Djiboutian Franc'),
(45, 'DOP', 'Dominican Peso'),
(46, 'XCD', 'East Caribbean Dollar'),
(47, 'EGP', 'Egyptian Pound'),
(48, 'GQE', 'Equatorial Guinean Ekwele'),
(49, 'ERN', 'Eritrean Nakfa'),
(50, 'EEK', 'Estonian Kroon'),
(51, 'ETB', 'Ethiopian Birr'),
(52, 'EUR', 'Euro'),
(53, 'FKP', 'Falkland Islands Pound'),
(54, 'FJD', 'Fijian Dollar'),
(55, 'GMD', 'Gambian Dalasi'),
(56, 'GEK', 'Georgian Kupon Larit'),
(57, 'GEL', 'Georgian Lari'),
(58, 'GHS', 'Ghanaian Cedi'),
(59, 'GIP', 'Gibraltar Pound'),
(60, 'GTQ', 'Guatemalan Quetzal'),
(61, 'GNF', 'Guinean Franc'),
(62, 'GYD', 'Guyanaese Dollar'),
(63, 'HTG', 'Haitian Gourde'),
(64, 'HNL', 'Honduran Lempira'),
(65, 'HKD', 'Hong Kong Dollar'),
(66, 'HUF', 'Hungarian Forint'),
(67, 'ISK', 'Icelandic Krona'),
(68, 'INR', 'Indian Rupee'),
(69, 'IDR', 'Indonesian Rupiah'),
(70, 'IRR', 'Iranian Rial'),
(71, 'IQD', 'Iraqi Dinar'),
(72, 'ILS', 'Israeli New Sheqel'),
(73, 'JMD', 'Jamaican Dollar'),
(74, 'JPY', 'Japanese Yen'),
(75, 'JOD', 'Jordanian Dinar'),
(76, 'KZT', 'Kazakhstani Tenge'),
(77, 'KES', 'Kenyan Shilling'),
(78, 'KWD', 'Kuwaiti Dinar'),
(79, 'KGS', 'Kyrgystani Som'),
(80, 'LAK', 'Laotian Kip'),
(81, 'LVL', 'Latvian Lats'),
(82, 'LBP', 'Lebanese Pound'),
(83, 'LSL', 'Lesotho Loti'),
(84, 'LRD', 'Liberian Dollar'),
(85, 'LYD', 'Libyan Dinar'),
(86, 'LTL', 'Lithuanian Litas'),
(87, 'MOP', 'Macanese Pataca'),
(88, 'MKD', 'Macedonian Denar'),
(89, 'MGA', 'Malagasy Ariary'),
(90, 'MWK', 'Malawian Kwacha'),
(91, 'MYR', 'Malaysian Ringgit'),
(92, 'MVR', 'Maldivian Rufiyaa'),
(93, 'MRO', 'Mauritanian Ouguiya'),
(94, 'MUR', 'Mauritian Rupee'),
(95, 'MXN', 'Mexican Peso'),
(96, 'MDL', 'Moldovan Leu'),
(97, 'MNT', 'Mongolian Tugrik'),
(98, 'MAD', 'Moroccan Dirham'),
(99, 'MZN', 'Mozambican Metical'),
(100, 'MMK', 'Myanmar Kyat'),
(101, 'NAD', 'Namibian Dollar'),
(102, 'NPR', 'Nepalese Rupee'),
(103, 'ANG', 'Netherlands Antillean Guilder'),
(104, 'TWD', 'New Taiwan Dollar'),
(105, 'NZD', 'New Zealand Dollar'),
(106, 'NIC', 'Nicaraguan Cordoba (1988-1991)'),
(107, 'NGN', 'Nigerian Naira'),
(108, 'KPW', 'North Korean Won'),
(109, 'NOK', 'Norwegian Krone'),
(110, 'OMR', 'Omani Rial'),
(111, 'PKR', 'Pakistani Rupee'),
(112, 'PAB', 'Panamanian Balboa'),
(113, 'PGK', 'Papua New Guinean Kina'),
(114, 'PYG', 'Paraguayan Guarani'),
(115, 'PEN', 'Peruvian Nuevo Sol'),
(116, 'PHP', 'Philippine Peso'),
(117, 'PLN', 'Polish Zloty'),
(118, 'QAR', 'Qatari Rial'),
(119, 'RHD', 'Rhodesian Dollar'),
(120, 'RON', 'Romanian Leu'),
(121, 'ROL', 'Romanian Leu (1952-2006)'),
(122, 'RUB', 'Russian Ruble'),
(123, 'RWF', 'Rwandan Franc'),
(124, 'SHP', 'Saint Helena Pound'),
(125, 'SVC', 'Salvadoran Colon'),
(126, 'WST', 'Samoan Tala'),
(127, 'SAR', 'Saudi Riyal'),
(128, 'RSD', 'Serbian Dinar'),
(129, 'SCR', 'Seychellois Rupee'),
(130, 'SLL', 'Sierra Leonean Leone'),
(131, 'SGD', 'Singapore Dollar'),
(132, 'SKK', 'Slovak Koruna'),
(133, 'SBD', 'Solomon Islands Dollar'),
(134, 'SOS', 'Somali Shilling'),
(135, 'ZAR', 'South African Rand'),
(136, 'KRW', 'South Korean Won'),
(137, 'LKR', 'Sri Lankan Rupee'),
(138, 'SDG', 'Sudanese Pound'),
(139, 'SRD', 'Surinamese Dollar'),
(140, 'SZL', 'Swazi Lilangeni'),
(141, 'SEK', 'Swedish Krona'),
(142, 'CHF', 'Swiss Franc'),
(143, 'SYP', 'Syrian Pound'),
(144, 'STD', 'Sao Tomo and Principe Dobra'),
(145, 'TJS', 'Tajikistani Somoni'),
(146, 'TZS', 'Tanzanian Shilling'),
(147, 'THB', 'Thai Baht'),
(148, 'TOP', 'Tongan Paʻanga'),
(149, 'TTD', 'Trinidad and Tobago Dollar'),
(150, 'TND', 'Tunisian Dinar'),
(151, 'TRY', 'Turkish Lira'),
(152, 'TRL', 'Turkish Lira (1922-2005)'),
(153, 'TMM', 'Turkmenistani Manat (1993-2009)'),
(154, 'USD', 'US Dollar'),
(155, 'UGX', 'Ugandan Shilling'),
(156, 'UAH', 'Ukrainian Hryvnia'),
(157, 'AED', 'United Arab Emirates Dirham'),
(158, 'UYU', 'Uruguayan Peso'),
(159, 'UZS', 'Uzbekistan Som'),
(160, 'VUV', 'Vanuatu Vatu'),
(161, 'VEF', 'Venezuelan Bolivar'),
(162, 'VEB', 'Venezuelan Bolivar (1871-2008)'),
(163, 'VND', 'Vietnamese Dong'),
(164, 'CHE', 'WIR Euro'),
(165, 'CHW', 'WIR Franc'),
(166, 'YER', 'Yemeni Rial'),
(167, 'ZMK', 'Zambian Kwacha (1968-2012)'),
(168, 'ZWD', 'Zimbabwean Dollar (1980-2008)');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `home_config`
--

CREATE TABLE `home_config` (
  `id` int(11) NOT NULL,
  `about_company` text NOT NULL,
  `about_image` varchar(100) NOT NULL,
  `about_sub_1_title` varchar(50) NOT NULL,
  `about_sub_1_icon` varchar(100) NOT NULL,
  `about_sub_1_content` varchar(300) NOT NULL,
  `about_sub_2_title` varchar(50) NOT NULL,
  `about_sub_2_icon` varchar(100) NOT NULL,
  `about_sub_2_content` varchar(300) NOT NULL,
  `about_sub_3_title` varchar(50) NOT NULL,
  `about_sub_3_icon` varchar(100) NOT NULL,
  `about_sub_3_content` varchar(300) NOT NULL,
  `about_sub_4_title` varchar(50) NOT NULL,
  `about_sub_4_icon` varchar(100) NOT NULL,
  `about_sub_4_content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_config`
--

INSERT INTO `home_config` (`id`, `about_company`, `about_image`, `about_sub_1_title`, `about_sub_1_icon`, `about_sub_1_content`, `about_sub_2_title`, `about_sub_2_icon`, `about_sub_2_content`, `about_sub_3_title`, `about_sub_3_icon`, `about_sub_3_content`, `about_sub_4_title`, `about_sub_4_icon`, `about_sub_4_content`) VALUES
(1, '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the when an unknown galley.</p>\r\n<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. remaining essentially unchanged. It was popularised in the with the .</p>\r\n', '19d2e-about-pic.jpg', 'Building', '<i class="fa fa-building" aria-hidden="true"></i>', 'Lorem ipsum dolor sit piscing sed diam nonmy end .', 'Renovation', '<i class="fa fa-paint-brush" aria-hidden="true"></i>', 'Lorem ipsum dolor sit piscing sed diam nonmy end .', 'Digging', '<i class="fa fa-gavel" aria-hidden="true"></i>', 'Lorem ipsum dolor sit piscing sed diam nonmy end .', 'interior', '<i class="fa fa-picture-o" aria-hidden="true"></i>', 'Lorem ipsum dolor sit piscing sed diam nonmy end .');

-- --------------------------------------------------------

--
-- Table structure for table `locale`
--

CREATE TABLE `locale` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locale`
--

INSERT INTO `locale` (`id`, `code`, `name`) VALUES
(1, 'af_ZA', 'Afrikaans (South Africa)'),
(2, 'sq_AL', 'Albanian (Albania)'),
(3, 'ar_DZ', 'Arabic (Algeria)'),
(4, 'ar_EG', 'Arabic (Egypt)'),
(5, 'ar_KW', 'Arabic (Kuwait)'),
(6, 'ar_MA', 'Arabic (Morocco)'),
(7, 'ar_SA', 'Arabic (Saudi Arabia)'),
(8, 'az_AZ', 'Azerbaijani (Azerbaijan)'),
(9, 'be_BY', 'Belarusian (Belarus)'),
(10, 'bn_BD', 'Bengali (Bangladesh)'),
(11, 'bs_BA', 'Bosnian (Bosnia and Herzegovina)'),
(12, 'bg_BG', 'Bulgarian (Bulgaria)'),
(13, 'ca_ES', 'Catalan (Spain)'),
(14, 'zh_CN', 'Chinese (China)'),
(15, 'zh_HK', 'Chinese (Hong Kong SAR China)'),
(16, 'zh_TW', 'Chinese (Taiwan)'),
(17, 'hr_HR', 'Croatian (Croatia)'),
(18, 'cs_CZ', 'Czech (Czech Republic)'),
(19, 'da_DK', 'Danish (Denmark)'),
(20, 'nl_NL', 'Dutch (Netherlands)'),
(21, 'en_AU', 'English (Australia)'),
(22, 'en_CA', 'English (Canada)'),
(23, 'en_IE', 'English (Ireland)'),
(24, 'en_NZ', 'English (New Zealand)'),
(25, 'en_GB', 'English (United Kingdom)'),
(26, 'en_US', 'English (United States)'),
(27, 'et_EE', 'Estonian (Estonia)'),
(28, 'fil_PH', 'Filipino (Philippines)'),
(29, 'fi_FI', 'Finnish (Finland)'),
(30, 'fr_CA', 'French (Canada)'),
(31, 'fr_FR', 'French (France)'),
(32, 'gl_ES', 'Galician (Spain)'),
(33, 'ka_GE', 'Georgian (Georgia)'),
(34, 'de_AT', 'German (Austria)'),
(35, 'de_DE', 'German (Germany)'),
(36, 'de_CH', 'German (Switzerland)'),
(37, 'el_GR', 'Greek (Greece)'),
(38, 'gu_IN', 'Gujarati (India)'),
(39, 'he_IL', 'Hebrew (Israel)'),
(40, 'hi_IN', 'Hindi (India)'),
(41, 'hu_HU', 'Hungarian (Hungary)'),
(42, 'is_IS', 'Icelandic (Iceland)'),
(43, 'id_ID', 'Indonesian (Indonesia)'),
(44, 'it_IT', 'Italian (Italy)'),
(45, 'it_CH', 'Italian (Switzerland)'),
(46, 'ja_JP', 'Japanese (Japan)'),
(47, 'km_KH', 'Khmer (Cambodia)'),
(48, 'ko_KR', 'Korean (South Korea)'),
(49, 'lo_LA', 'Lao (Laos)'),
(50, 'lv_LV', 'Latvian (Latvia)'),
(51, 'lt_LT', 'Lithuanian (Lithuania)'),
(52, 'mk_MK', 'Macedonian (Macedonia)'),
(53, 'ms_MY', 'Malay (Malaysia)'),
(54, 'mn_MN', 'Mongolian (Mongolia)'),
(55, 'nb_NO', 'Norwegian Bokmål (Norway)'),
(56, 'nn_NO', 'Norwegian Nynorsk (Norway)'),
(57, 'fa_IR', 'Persian (Iran)'),
(58, 'pl_PL', 'Polish (Poland)'),
(59, 'pt_BR', 'Portuguese (Brazil)'),
(60, 'pt_PT', 'Portuguese (Portugal)'),
(61, 'ro_RO', 'Romanian (Romania)'),
(62, 'ru_RU', 'Russian (Russia)'),
(63, 'sr_RS', 'Serbian (Serbia)'),
(64, 'sk_SK', 'Slovak (Slovakia)'),
(65, 'sl_SI', 'Slovenian (Slovenia)'),
(66, 'es_AR', 'Spanish (Argentina)'),
(67, 'es_CL', 'Spanish (Chile)'),
(68, 'es_CO', 'Spanish (Colombia)'),
(69, 'es_CR', 'Spanish (Costa Rica)'),
(70, 'es_MX', 'Spanish (Mexico)'),
(71, 'es_PA', 'Spanish (Panama)'),
(72, 'es_PE', 'Spanish (Peru)'),
(73, 'es_ES', 'Spanish (Spain)'),
(74, 'es_VE', 'Spanish (Venezuela)'),
(75, 'sw_KE', 'Swahili (Kenya)'),
(76, 'sv_SE', 'Swedish (Sweden)'),
(77, 'th_TH', 'Thai (Thailand)'),
(78, 'tr_TR', 'Turkish (Turkey)'),
(79, 'uk_UA', 'Ukrainian (Ukraine)'),
(80, 'vi_VN', 'Vietnamese (Vietnam)'),
(81, 'cy_GB', 'Welsh (United Kingdom)');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `url_key` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `url_key`, `image`, `status`, `created_at`) VALUES
(3, 'Title of first blog post', '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text since the when an printer .</p>\r\n', 'news1.html', '7de03-pic1.jpg', '1', '2020-10-30 10:17:28'),
(4, 'News 2', '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text since the when an printer .</p>\r\n', 'news2.html', 'a4ff6-pic2.jpg', '1', '2020-10-30 10:17:53'),
(5, 'News 3', '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text since the when an printer .</p>\r\n', 'news3.html', 'b6a55-pic3.jpg', '1', '2020-10-30 10:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'vidhul@crayo.com');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `url_key` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`id`, `category_name`, `url_key`) VALUES
(1, 'TRENDY DESIGNERS', 'trendy-designers'),
(2, 'Default', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `news_gallery`
--

CREATE TABLE `news_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_gallery`
--

INSERT INTO `news_gallery` (`id`, `image`, `news_id`) VALUES
(1, '9e2c4-cash.jpg', 1),
(2, 'b8994-ino.jpg', 1),
(21, 'a1a74-cash.jpg', 2),
(22, 'b2468-all.jpg', 2),
(23, 'c2b85-ino.jpg', 2),
(24, 'e6345-all.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_id` int(11) NOT NULL,
  `payment_title` varchar(200) NOT NULL,
  `enabled` varchar(50) NOT NULL,
  `type` enum('offline','prepaid') NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `allowed_countries` varchar(225) NOT NULL,
  `specific_countries` text NOT NULL,
  `instructions` text NOT NULL,
  `minimum_order_total` decimal(10,2) NOT NULL,
  `maximum_order_total` decimal(10,2) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_id`, `payment_title`, `enabled`, `type`, `order_status`, `allowed_countries`, `specific_countries`, `instructions`, `minimum_order_total`, `maximum_order_total`, `sort_order`) VALUES
(1, 'Cash On Delivery', 'yes', 'offline', '1', '0', '', '', '44.00', '55.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products_image`
--

CREATE TABLE `products_image` (
  `id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL,
  `default_image` int(2) NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `extension` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_image`
--

INSERT INTO `products_image` (`id`, `image`, `product_id`, `default_image`, `file_name`, `extension`) VALUES
(1, '05c6e-fun_swimsuit_2.jpeg', 1, 0, '', ''),
(2, '08980-sc138392.jpeg', 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_price_index`
--

CREATE TABLE `product_price_index` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `special_price` int(11) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `currency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_specification`
--

CREATE TABLE `product_specification` (
  `id` int(11) NOT NULL,
  `specification_name` varchar(225) NOT NULL,
  `specification_value` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_specification`
--

INSERT INTO `product_specification` (`id`, `specification_name`, `specification_value`, `product_id`) VALUES
(1, 'Color', 'Red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_urls`
--

CREATE TABLE `product_urls` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_product_url` varchar(300) NOT NULL,
  `product_url` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_urls`
--

INSERT INTO `product_urls` (`id`, `product_id`, `category_product_url`, `product_url`) VALUES
(1, 1, 'product/', ''),
(2, 2, 'product/', ''),
(3, 3, 'product/in2it-natural-brow-waterproof-eyebrow-mascara-nbm02-copper', 'in2it-natural-brow-waterproof-eyebrow-mascara-nbm02-copper'),
(4, 4, 'product/in2it-highlight-contour-hc01', 'in2it-highlight-contour-hc01'),
(5, 5, 'product/', ''),
(6, 6, 'product/', ''),
(7, 7, 'product/', ''),
(8, 8, 'product/', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `overall_rating` smallint(6) NOT NULL,
  `value_rating` smallint(6) NOT NULL,
  `comfortable_rating` smallint(6) NOT NULL,
  `greatdesign_rating` smallint(6) NOT NULL,
  `wellmade_rating` smallint(6) NOT NULL,
  `description` text NOT NULL,
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `overall_rating`, `value_rating`, `comfortable_rating`, `greatdesign_rating`, `wellmade_rating`, `description`, `status`) VALUES
(1, 8, 3, 0, 0, 0, 0, '<p><em>Lorem ipsum</em>, or&nbsp;<em>lipsum</em>&nbsp;as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s&nbsp;<em>De Finibus Bonorum et Malorum</em>&nbsp;for use in a type specimen book. It usually begins with:</p>\r\n', 1),
(2, 4, 3, 3, 4, 2, 5, '<p><em>Lorem ipsum</em>, or&nbsp;<em>lipsum</em>&nbsp;as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero&#39;s&nbsp;<em>De Finibus Bonorum et Malorum</em>&nbsp;for use in a type specimen book. It usually begins with:</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `order_increment_id` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `coupon_code` varchar(225) NOT NULL,
  `locale` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `discount_amount` float NOT NULL,
  `tax_amount` float NOT NULL,
  `shipping_amount` float NOT NULL,
  `grand_total` float NOT NULL,
  `send_email` int(2) NOT NULL,
  `email_address` varchar(225) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `billing_address_id` int(11) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `no_of_piece` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_billing_address`
--

CREATE TABLE `sales_order_billing_address` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `addresss` text NOT NULL,
  `country_code` varchar(50) NOT NULL,
  `city` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `zip_code` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_item`
--

CREATE TABLE `sales_order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `parent_item_id` int(11) NOT NULL,
  `locale_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_options` text NOT NULL,
  `weight` varchar(50) NOT NULL,
  `sku` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `tax_amount` float NOT NULL,
  `discount_amount` float NOT NULL,
  `row_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_shipping_address`
--

CREATE TABLE `sales_order_shipping_address` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `addresss` text NOT NULL,
  `country_code` varchar(50) NOT NULL,
  `city` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `zip_code` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `search_terms`
--

CREATE TABLE `search_terms` (
  `id` int(11) NOT NULL,
  `data_index` varchar(225) NOT NULL,
  `search_count` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `seo_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `meta_keyword` varchar(300) NOT NULL,
  `meta_description` text NOT NULL,
  `section` varchar(225) NOT NULL,
  `section_id` int(11) NOT NULL,
  `url_key` int(11) NOT NULL,
  `u_key` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`seo_id`, `title`, `meta_keyword`, `meta_description`, `section`, `section_id`, `url_key`, `u_key`) VALUES
(1, 'Cosmetic', 'Cosmetic', 'Cosmetic', 'category', 1, 1, 'cosmetic'),
(2, 'Cosmetic', 'Cosmetic', 'Cosmetic', 'category', 2, 1, 'women/test'),
(3, 'Dress', 'Dress', 'Dress', 'category', 3, 1, 'women/clothing/dress'),
(4, 'Accessories', 'Accessories', 'Accessories', 'category', 4, 1, 'women/accessories'),
(6, 'Dolce & Gabb', 'Dolce & Gabb', 'Dolce & Gabb', 'product', 1, 0, 'product/dolce-gabb'),
(7, 'Test Configurable Product', 'Test Configurable Product', 'Test Configurable Product', 'product', 2, 0, 'product/test-configurable-product'),
(8, 'Whats New', 'Whats New', 'Whats New', 'category', 5, 5, 'whats-new'),
(9, 'Skincare & Spa', 'Skincare & Spa', 'Skincare & Spa', 'category', 6, 6, 'skincare-spa'),
(10, 'Consumer Goods', 'Consumer Goods', 'Consumer Goods', 'category', 7, 7, 'consumer-goods'),
(11, 'Stationery', 'Stationery', 'Stationery', 'category', 8, 8, 'stationery'),
(12, 'Gift Shop', 'Gift Shop', 'Gift Shop', 'category', 9, 9, 'gift-shop'),
(13, 'Beauty Equipment', 'Beauty Equipment', 'Beauty Equipment', 'category', 10, 10, 'beauty-equipment'),
(14, 'Food', 'Food', 'Food', 'category', 11, 11, 'food'),
(15, 'Pet Product', 'Pet Product', 'Pet Product', 'category', 12, 12, 'pet-product'),
(16, 'IT', 'IT', 'IT', 'category', 13, 13, 'it'),
(17, 'Medical', 'Medical', 'Medical', 'category', 14, 14, 'medical'),
(18, 'Test', 'Test', 'Test', 'category', 15, 1, 'cosmetic/test'),
(19, 'test2', 'test2', 'test2', 'category', 16, 1, 'cosmetic/test/test2'),
(20, 'test', 'test', 'test', 'category', 17, 1, 'cosmetic/test/test2/test'),
(21, 'ssss', 'ssss', 'ssss', 'category', 18, 1, 'cosmetic/test/test2/ssss'),
(22, 'test', 'test', 'test', 'category', 19, 1, 'cosmetic/test2'),
(23, 'IN2IT Natural Brow Waterproof Eyebrow Mascara NBM02 Copper', 'IN2IT Natural Brow Waterproof Eyebrow Mascara NBM02 Copper', 'IN2IT Natural Brow Waterproof Eyebrow Mascara NBM02 Copper', 'product', 3, 0, 'product/in2it-natural-brow-waterproof-eyebrow-mascara-nbm02-copper'),
(24, 'IN2IT Highlight & Contour – HC01', 'IN2IT Highlight & Contour – HC01', 'IN2IT Highlight & Contour – HC01', 'product', 4, 0, 'product/in2it-highlight-contour-hc01'),
(25, 'IN2IT UV Shine Control Sheer Face Powder With Oil Control SPF 15 PA++ – SCP03 Harvest', 'IN2IT UV Shine Control Sheer Face Powder With Oil Control SPF 15 PA++ – SCP03 Harvest', 'IN2IT UV Shine Control Sheer Face Powder With Oil Control SPF 15 PA++ – SCP03 Harvest', 'product', 5, 0, 'product/in2it-uv-shine-control-sheer-face-powder-with-oil-control-spf-15-pa-scp03-harvest'),
(26, 'Simply Tanaka Soap', 'Simply Tanaka Soap', 'Simply Tanaka Soap', 'product', 6, 0, 'product/simply-tanaka-soap'),
(27, 'Murr Fiber', 'Murr Fiber', 'Murr Fiber', 'product', 7, 0, 'product/murr-fiber'),
(28, 'Herbal Tea – red', 'Herbal Tea – red', 'Herbal Tea – red', 'product', 8, 0, 'product/herbal-tea-red');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `shipping_id` int(11) NOT NULL,
  `enabled` varchar(50) NOT NULL,
  `charge` float NOT NULL,
  `shipping_title` varchar(200) NOT NULL,
  `shipping_method` varchar(100) NOT NULL,
  `minimum_order_amount` decimal(10,2) NOT NULL,
  `error_message` text NOT NULL,
  `applicable_countries` varchar(50) NOT NULL,
  `specific_countries` text NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`shipping_id`, `enabled`, `charge`, `shipping_title`, `shipping_method`, `minimum_order_amount`, `error_message`, `applicable_countries`, `specific_countries`, `sort_order`) VALUES
(1, 'yes', 0, 'Free Shipping', 'fee_shipping', '55.00', 'adasd', 'All', '', 3),
(2, 'yes', 10, 'Flate Rate', 'flate_rate', '0.00', '', 'All', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(200) NOT NULL,
  `type` enum('Home Top','Home Middle','Home Bottom') NOT NULL,
  `link` varchar(300) NOT NULL,
  `slider_image` varchar(250) NOT NULL,
  `slider_description` text NOT NULL,
  `slider_status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `type`, `link`, `slider_image`, `slider_description`, `slider_status`) VALUES
(1, 'Slider 1', 'Home Top', '', '75bc0-slider01.jpg', '<h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">\r\n	COSMETIC</h2>\r\n<h5 class="mb-3 mb-sm-4 staggered-animation " data-animation="slideInLeft" data-animation-delay="1s">\r\n	Get up to <span class="text_default">50%</span> off Today Only!</h5>\r\n', 1),
(2, 'Middle1', 'Home Middle', '', '75f74-banner01.jpeg', '', 1),
(3, 'Middle 2', 'Home Middle', '', '9e305-banner02.jpeg', '', 1),
(4, 'Middle 3', 'Home Middle', '', '58d27-banner03.jpeg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `static_block`
--

CREATE TABLE `static_block` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `font` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static_block`
--

INSERT INTO `static_block` (`id`, `title`, `content`, `image`, `font`) VALUES
(1, 'Our Team Home', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.</p>', '', ''),
(2, 'Latest Blog Homek', '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been tahe industry.</p>\r\n', '', ''),
(3, 'Our Clients Home', '<p>\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s.</p>\r\n', '', ''),
(4, 'Footer Top Content', '<h4 class="text-uppercase m-b10">\r\n	We are ready to build your dream tell us more about your project</h4>\r\n<p>\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra mauris eget tortor.</p>\r\n', '', ''),
(5, 'Footer About', '<p>\r\n	Cornish Arabian Aluminium Factory is a leading contractor in the engineering, project management, manufacturing and installation of architectural ...</p>\r\n', '', ''),
(6, 'Contact Address UAE', '<div class="icon-content">\r\n	<h5 class="text-white">\r\n		UAE</h5>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		PO Box 20237<br />\r\n		Dubai, Dubai</p>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		<strong>Phone : </strong> 00968-24604560, 24604222</p>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		<strong>Fax : </strong>00968-24604099</p>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		<strong>Email : </strong> <a class="text-white" href="mailto:info@aluminiumcornish.com">info@aluminiumcornish.com</a></p>\r\n</div>\r\n', '', ''),
(7, 'Contact Address Oman', '<div class="icon-content">\r\n	<h5 class="text-white">\r\n		Oman</h5>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		PO Box : 2335<br />\r\n		Al Gubra, Sultanate of Oman</p>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		<strong>Phone : </strong> <a class="text-white" href="tel:+97142588828">+97142588828</a></p>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		<strong>Fax : </strong> +97142588788</p>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		<strong>Email : </strong> <a class="text-white" href="mailto:cornisharabian@gmail.com">cornisharabian@gmail.com</a></p>\r\n</div>\r\n', '', ''),
(8, 'Contact Adress Qater', '<div class="icon-content">\r\n	<h5 class="text-white">\r\n		Qatar</h5>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		PO Box 37491<br />\r\n		NBK-Musherib Building Qatar, Doha</p>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		<strong>Phone : </strong> <a class="text-white" href="tel:+97444681414">+97444681414</a></p>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		<strong>Fax : </strong> +97444681819</p>\r\n	<p class="text-white" style="margin-bottom: 10px;">\r\n		<strong>Email : </strong> <a class="text-white" href="mailto:info@aluminiumcornish.com">info@aluminiumcornish.com</a></p>\r\n</div>\r\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `store_credit`
--

CREATE TABLE `store_credit` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `add_or_subtract_amount` decimal(10,2) NOT NULL,
  `current_balance_amount` decimal(10,2) NOT NULL,
  `comments` text NOT NULL,
  `status` smallint(6) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_credit`
--

INSERT INTO `store_credit` (`id`, `customer_id`, `add_or_subtract_amount`, `current_balance_amount`, `comments`, `status`, `transaction_date`) VALUES
(13, 2, '450.00', '450.00', 'hgfhfgh', 1, '2021-01-24 10:13:40'),
(14, 3, '300.00', '300.00', 'fdrdt', 1, '2021-01-24 10:13:58'),
(15, 2, '-200.00', '250.00', 'hgfhgfhgf', 1, '2021-01-24 10:14:15'),
(16, 3, '500.00', '800.00', 'fhghfgh', 1, '2021-01-24 10:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `swatches`
--

CREATE TABLE `swatches` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `swatch_image` varchar(225) NOT NULL,
  `color_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_coupon_used`
--

CREATE TABLE `tb_coupon_used` (
  `id` int(40) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `type` enum('designer','buyer','Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `type`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$ccmPitGSZUHm5W7pfp6TT.32T86qaOeNlG3VJ9ZN5KEa1Sixn1lXC', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1611744259, 1, 'Admin', 'istrator', 'ADMIN', '0', 'Admin'),
(2, '127.0.0.1', 'vidhul@crayotech.com', '$2y$10$9ZfrjrxvhBl6fIwX1s42g.WfqnuLilhi0Xyi.PyWLOBQPCTMCv1e2', 'vidhul@crayotech.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1574011515, 1575338050, 1, 'Vidhul', 'Nath', NULL, '9895734058', 'User'),
(3, '127.0.0.1', 'vidhul@amf.com', '$2y$10$1Brsz3vR060wd3zpb2tD0.7QD0TxW/slSumTyFuD2Z6b14MCRb/Fe', 'vidhul@amf.com', NULL, NULL, NULL, NULL, NULL, '34c60df66234a85b3d67ec6bddaf7b13e34714e9', '$2y$10$AjkSHLX402frWzsvgSZIPeeOABI48dzn9/Uf64hQSqRMXLoIPDOAK', 1575339979, 1575943970, 1, 'Vidhul', 'Kv', NULL, '9895734058', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `zone_id` int(10) NOT NULL,
  `country_code` char(2) COLLATE utf8_bin NOT NULL,
  `zone_name` varchar(35) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_id`, `country_code`, `zone_name`) VALUES
(1, 'AD', 'Europe/Andorra'),
(2, 'AE', 'Asia/Dubai'),
(3, 'AF', 'Asia/Kabul'),
(4, 'AG', 'America/Antigua'),
(5, 'AI', 'America/Anguilla'),
(6, 'AL', 'Europe/Tirane'),
(7, 'AM', 'Asia/Yerevan'),
(8, 'AO', 'Africa/Luanda'),
(9, 'AQ', 'Antarctica/McMurdo'),
(10, 'AQ', 'Antarctica/Casey'),
(11, 'AQ', 'Antarctica/Davis'),
(12, 'AQ', 'Antarctica/DumontDUrville'),
(13, 'AQ', 'Antarctica/Mawson'),
(14, 'AQ', 'Antarctica/Palmer'),
(15, 'AQ', 'Antarctica/Rothera'),
(16, 'AQ', 'Antarctica/Syowa'),
(17, 'AQ', 'Antarctica/Troll'),
(18, 'AQ', 'Antarctica/Vostok'),
(19, 'AR', 'America/Argentina/Buenos_Aires'),
(20, 'AR', 'America/Argentina/Cordoba'),
(21, 'AR', 'America/Argentina/Salta'),
(22, 'AR', 'America/Argentina/Jujuy'),
(23, 'AR', 'America/Argentina/Tucuman'),
(24, 'AR', 'America/Argentina/Catamarca'),
(25, 'AR', 'America/Argentina/La_Rioja'),
(26, 'AR', 'America/Argentina/San_Juan'),
(27, 'AR', 'America/Argentina/Mendoza'),
(28, 'AR', 'America/Argentina/San_Luis'),
(29, 'AR', 'America/Argentina/Rio_Gallegos'),
(30, 'AR', 'America/Argentina/Ushuaia'),
(31, 'AS', 'Pacific/Pago_Pago'),
(32, 'AT', 'Europe/Vienna'),
(33, 'AU', 'Australia/Lord_Howe'),
(34, 'AU', 'Antarctica/Macquarie'),
(35, 'AU', 'Australia/Hobart'),
(36, 'AU', 'Australia/Melbourne'),
(37, 'AU', 'Australia/Sydney'),
(38, 'AU', 'Australia/Broken_Hill'),
(39, 'AU', 'Australia/Brisbane'),
(40, 'AU', 'Australia/Lindeman'),
(41, 'AU', 'Australia/Adelaide'),
(42, 'AU', 'Australia/Darwin'),
(43, 'AU', 'Australia/Perth'),
(44, 'AU', 'Australia/Eucla'),
(45, 'AW', 'America/Aruba'),
(46, 'AX', 'Europe/Mariehamn'),
(47, 'AZ', 'Asia/Baku'),
(48, 'BA', 'Europe/Sarajevo'),
(49, 'BB', 'America/Barbados'),
(50, 'BD', 'Asia/Dhaka'),
(51, 'BE', 'Europe/Brussels'),
(52, 'BF', 'Africa/Ouagadougou'),
(53, 'BG', 'Europe/Sofia'),
(54, 'BH', 'Asia/Bahrain'),
(55, 'BI', 'Africa/Bujumbura'),
(56, 'BJ', 'Africa/Porto-Novo'),
(57, 'BL', 'America/St_Barthelemy'),
(58, 'BM', 'Atlantic/Bermuda'),
(59, 'BN', 'Asia/Brunei'),
(60, 'BO', 'America/La_Paz'),
(61, 'BQ', 'America/Kralendijk'),
(62, 'BR', 'America/Noronha'),
(63, 'BR', 'America/Belem'),
(64, 'BR', 'America/Fortaleza'),
(65, 'BR', 'America/Recife'),
(66, 'BR', 'America/Araguaina'),
(67, 'BR', 'America/Maceio'),
(68, 'BR', 'America/Bahia'),
(69, 'BR', 'America/Sao_Paulo'),
(70, 'BR', 'America/Campo_Grande'),
(71, 'BR', 'America/Cuiaba'),
(72, 'BR', 'America/Santarem'),
(73, 'BR', 'America/Porto_Velho'),
(74, 'BR', 'America/Boa_Vista'),
(75, 'BR', 'America/Manaus'),
(76, 'BR', 'America/Eirunepe'),
(77, 'BR', 'America/Rio_Branco'),
(78, 'BS', 'America/Nassau'),
(79, 'BT', 'Asia/Thimphu'),
(80, 'BW', 'Africa/Gaborone'),
(81, 'BY', 'Europe/Minsk'),
(82, 'BZ', 'America/Belize'),
(83, 'CA', 'America/St_Johns'),
(84, 'CA', 'America/Halifax'),
(85, 'CA', 'America/Glace_Bay'),
(86, 'CA', 'America/Moncton'),
(87, 'CA', 'America/Goose_Bay'),
(88, 'CA', 'America/Blanc-Sablon'),
(89, 'CA', 'America/Toronto'),
(90, 'CA', 'America/Nipigon'),
(91, 'CA', 'America/Thunder_Bay'),
(92, 'CA', 'America/Iqaluit'),
(93, 'CA', 'America/Pangnirtung'),
(94, 'CA', 'America/Atikokan'),
(95, 'CA', 'America/Winnipeg'),
(96, 'CA', 'America/Rainy_River'),
(97, 'CA', 'America/Resolute'),
(98, 'CA', 'America/Rankin_Inlet'),
(99, 'CA', 'America/Regina'),
(100, 'CA', 'America/Swift_Current'),
(101, 'CA', 'America/Edmonton'),
(102, 'CA', 'America/Cambridge_Bay'),
(103, 'CA', 'America/Yellowknife'),
(104, 'CA', 'America/Inuvik'),
(105, 'CA', 'America/Creston'),
(106, 'CA', 'America/Dawson_Creek'),
(107, 'CA', 'America/Fort_Nelson'),
(108, 'CA', 'America/Whitehorse'),
(109, 'CA', 'America/Dawson'),
(110, 'CA', 'America/Vancouver'),
(111, 'CC', 'Indian/Cocos'),
(112, 'CD', 'Africa/Kinshasa'),
(113, 'CD', 'Africa/Lubumbashi'),
(114, 'CF', 'Africa/Bangui'),
(115, 'CG', 'Africa/Brazzaville'),
(116, 'CH', 'Europe/Zurich'),
(117, 'CI', 'Africa/Abidjan'),
(118, 'CK', 'Pacific/Rarotonga'),
(119, 'CL', 'America/Santiago'),
(120, 'CL', 'America/Punta_Arenas'),
(121, 'CL', 'Pacific/Easter'),
(122, 'CM', 'Africa/Douala'),
(123, 'CN', 'Asia/Shanghai'),
(124, 'CN', 'Asia/Urumqi'),
(125, 'CO', 'America/Bogota'),
(126, 'CR', 'America/Costa_Rica'),
(127, 'CU', 'America/Havana'),
(128, 'CV', 'Atlantic/Cape_Verde'),
(129, 'CW', 'America/Curacao'),
(130, 'CX', 'Indian/Christmas'),
(131, 'CY', 'Asia/Nicosia'),
(132, 'CY', 'Asia/Famagusta'),
(133, 'CZ', 'Europe/Prague'),
(134, 'DE', 'Europe/Berlin'),
(135, 'DE', 'Europe/Busingen'),
(136, 'DJ', 'Africa/Djibouti'),
(137, 'DK', 'Europe/Copenhagen'),
(138, 'DM', 'America/Dominica'),
(139, 'DO', 'America/Santo_Domingo'),
(140, 'DZ', 'Africa/Algiers'),
(141, 'EC', 'America/Guayaquil'),
(142, 'EC', 'Pacific/Galapagos'),
(143, 'EE', 'Europe/Tallinn'),
(144, 'EG', 'Africa/Cairo'),
(145, 'EH', 'Africa/El_Aaiun'),
(146, 'ER', 'Africa/Asmara'),
(147, 'ES', 'Europe/Madrid'),
(148, 'ES', 'Africa/Ceuta'),
(149, 'ES', 'Atlantic/Canary'),
(150, 'ET', 'Africa/Addis_Ababa'),
(151, 'FI', 'Europe/Helsinki'),
(152, 'FJ', 'Pacific/Fiji'),
(153, 'FK', 'Atlantic/Stanley'),
(154, 'FM', 'Pacific/Chuuk'),
(155, 'FM', 'Pacific/Pohnpei'),
(156, 'FM', 'Pacific/Kosrae'),
(157, 'FO', 'Atlantic/Faroe'),
(158, 'FR', 'Europe/Paris'),
(159, 'GA', 'Africa/Libreville'),
(160, 'GB', 'Europe/London'),
(161, 'GD', 'America/Grenada'),
(162, 'GE', 'Asia/Tbilisi'),
(163, 'GF', 'America/Cayenne'),
(164, 'GG', 'Europe/Guernsey'),
(165, 'GH', 'Africa/Accra'),
(166, 'GI', 'Europe/Gibraltar'),
(167, 'GL', 'America/Nuuk'),
(168, 'GL', 'America/Danmarkshavn'),
(169, 'GL', 'America/Scoresbysund'),
(170, 'GL', 'America/Thule'),
(171, 'GM', 'Africa/Banjul'),
(172, 'GN', 'Africa/Conakry'),
(173, 'GP', 'America/Guadeloupe'),
(174, 'GQ', 'Africa/Malabo'),
(175, 'GR', 'Europe/Athens'),
(176, 'GS', 'Atlantic/South_Georgia'),
(177, 'GT', 'America/Guatemala'),
(178, 'GU', 'Pacific/Guam'),
(179, 'GW', 'Africa/Bissau'),
(180, 'GY', 'America/Guyana'),
(181, 'HK', 'Asia/Hong_Kong'),
(182, 'HN', 'America/Tegucigalpa'),
(183, 'HR', 'Europe/Zagreb'),
(184, 'HT', 'America/Port-au-Prince'),
(185, 'HU', 'Europe/Budapest'),
(186, 'ID', 'Asia/Jakarta'),
(187, 'ID', 'Asia/Pontianak'),
(188, 'ID', 'Asia/Makassar'),
(189, 'ID', 'Asia/Jayapura'),
(190, 'IE', 'Europe/Dublin'),
(191, 'IL', 'Asia/Jerusalem'),
(192, 'IM', 'Europe/Isle_of_Man'),
(193, 'IN', 'Asia/Kolkata'),
(194, 'IO', 'Indian/Chagos'),
(195, 'IQ', 'Asia/Baghdad'),
(196, 'IR', 'Asia/Tehran'),
(197, 'IS', 'Atlantic/Reykjavik'),
(198, 'IT', 'Europe/Rome'),
(199, 'JE', 'Europe/Jersey'),
(200, 'JM', 'America/Jamaica'),
(201, 'JO', 'Asia/Amman'),
(202, 'JP', 'Asia/Tokyo'),
(203, 'KE', 'Africa/Nairobi'),
(204, 'KG', 'Asia/Bishkek'),
(205, 'KH', 'Asia/Phnom_Penh'),
(206, 'KI', 'Pacific/Tarawa'),
(207, 'KI', 'Pacific/Enderbury'),
(208, 'KI', 'Pacific/Kiritimati'),
(209, 'KM', 'Indian/Comoro'),
(210, 'KN', 'America/St_Kitts'),
(211, 'KP', 'Asia/Pyongyang'),
(212, 'KR', 'Asia/Seoul'),
(213, 'KW', 'Asia/Kuwait'),
(214, 'KY', 'America/Cayman'),
(215, 'KZ', 'Asia/Almaty'),
(216, 'KZ', 'Asia/Qyzylorda'),
(217, 'KZ', 'Asia/Qostanay'),
(218, 'KZ', 'Asia/Aqtobe'),
(219, 'KZ', 'Asia/Aqtau'),
(220, 'KZ', 'Asia/Atyrau'),
(221, 'KZ', 'Asia/Oral'),
(222, 'LA', 'Asia/Vientiane'),
(223, 'LB', 'Asia/Beirut'),
(224, 'LC', 'America/St_Lucia'),
(225, 'LI', 'Europe/Vaduz'),
(226, 'LK', 'Asia/Colombo'),
(227, 'LR', 'Africa/Monrovia'),
(228, 'LS', 'Africa/Maseru'),
(229, 'LT', 'Europe/Vilnius'),
(230, 'LU', 'Europe/Luxembourg'),
(231, 'LV', 'Europe/Riga'),
(232, 'LY', 'Africa/Tripoli'),
(233, 'MA', 'Africa/Casablanca'),
(234, 'MC', 'Europe/Monaco'),
(235, 'MD', 'Europe/Chisinau'),
(236, 'ME', 'Europe/Podgorica'),
(237, 'MF', 'America/Marigot'),
(238, 'MG', 'Indian/Antananarivo'),
(239, 'MH', 'Pacific/Majuro'),
(240, 'MH', 'Pacific/Kwajalein'),
(241, 'MK', 'Europe/Skopje'),
(242, 'ML', 'Africa/Bamako'),
(243, 'MM', 'Asia/Yangon'),
(244, 'MN', 'Asia/Ulaanbaatar'),
(245, 'MN', 'Asia/Hovd'),
(246, 'MN', 'Asia/Choibalsan'),
(247, 'MO', 'Asia/Macau'),
(248, 'MP', 'Pacific/Saipan'),
(249, 'MQ', 'America/Martinique'),
(250, 'MR', 'Africa/Nouakchott'),
(251, 'MS', 'America/Montserrat'),
(252, 'MT', 'Europe/Malta'),
(253, 'MU', 'Indian/Mauritius'),
(254, 'MV', 'Indian/Maldives'),
(255, 'MW', 'Africa/Blantyre'),
(256, 'MX', 'America/Mexico_City'),
(257, 'MX', 'America/Cancun'),
(258, 'MX', 'America/Merida'),
(259, 'MX', 'America/Monterrey'),
(260, 'MX', 'America/Matamoros'),
(261, 'MX', 'America/Mazatlan'),
(262, 'MX', 'America/Chihuahua'),
(263, 'MX', 'America/Ojinaga'),
(264, 'MX', 'America/Hermosillo'),
(265, 'MX', 'America/Tijuana'),
(266, 'MX', 'America/Bahia_Banderas'),
(267, 'MY', 'Asia/Kuala_Lumpur'),
(268, 'MY', 'Asia/Kuching'),
(269, 'MZ', 'Africa/Maputo'),
(270, 'NA', 'Africa/Windhoek'),
(271, 'NC', 'Pacific/Noumea'),
(272, 'NE', 'Africa/Niamey'),
(273, 'NF', 'Pacific/Norfolk'),
(274, 'NG', 'Africa/Lagos'),
(275, 'NI', 'America/Managua'),
(276, 'NL', 'Europe/Amsterdam'),
(277, 'NO', 'Europe/Oslo'),
(278, 'NP', 'Asia/Kathmandu'),
(279, 'NR', 'Pacific/Nauru'),
(280, 'NU', 'Pacific/Niue'),
(281, 'NZ', 'Pacific/Auckland'),
(282, 'NZ', 'Pacific/Chatham'),
(283, 'OM', 'Asia/Muscat'),
(284, 'PA', 'America/Panama'),
(285, 'PE', 'America/Lima'),
(286, 'PF', 'Pacific/Tahiti'),
(287, 'PF', 'Pacific/Marquesas'),
(288, 'PF', 'Pacific/Gambier'),
(289, 'PG', 'Pacific/Port_Moresby'),
(290, 'PG', 'Pacific/Bougainville'),
(291, 'PH', 'Asia/Manila'),
(292, 'PK', 'Asia/Karachi'),
(293, 'PL', 'Europe/Warsaw'),
(294, 'PM', 'America/Miquelon'),
(295, 'PN', 'Pacific/Pitcairn'),
(296, 'PR', 'America/Puerto_Rico'),
(297, 'PS', 'Asia/Gaza'),
(298, 'PS', 'Asia/Hebron'),
(299, 'PT', 'Europe/Lisbon'),
(300, 'PT', 'Atlantic/Madeira'),
(301, 'PT', 'Atlantic/Azores'),
(302, 'PW', 'Pacific/Palau'),
(303, 'PY', 'America/Asuncion'),
(304, 'QA', 'Asia/Qatar'),
(305, 'RE', 'Indian/Reunion'),
(306, 'RO', 'Europe/Bucharest'),
(307, 'RS', 'Europe/Belgrade'),
(308, 'RU', 'Europe/Kaliningrad'),
(309, 'RU', 'Europe/Moscow'),
(310, 'UA', 'Europe/Simferopol'),
(311, 'RU', 'Europe/Kirov'),
(312, 'RU', 'Europe/Volgograd'),
(313, 'RU', 'Europe/Astrakhan'),
(314, 'RU', 'Europe/Saratov'),
(315, 'RU', 'Europe/Ulyanovsk'),
(316, 'RU', 'Europe/Samara'),
(317, 'RU', 'Asia/Yekaterinburg'),
(318, 'RU', 'Asia/Omsk'),
(319, 'RU', 'Asia/Novosibirsk'),
(320, 'RU', 'Asia/Barnaul'),
(321, 'RU', 'Asia/Tomsk'),
(322, 'RU', 'Asia/Novokuznetsk'),
(323, 'RU', 'Asia/Krasnoyarsk'),
(324, 'RU', 'Asia/Irkutsk'),
(325, 'RU', 'Asia/Chita'),
(326, 'RU', 'Asia/Yakutsk'),
(327, 'RU', 'Asia/Khandyga'),
(328, 'RU', 'Asia/Vladivostok'),
(329, 'RU', 'Asia/Ust-Nera'),
(330, 'RU', 'Asia/Magadan'),
(331, 'RU', 'Asia/Sakhalin'),
(332, 'RU', 'Asia/Srednekolymsk'),
(333, 'RU', 'Asia/Kamchatka'),
(334, 'RU', 'Asia/Anadyr'),
(335, 'RW', 'Africa/Kigali'),
(336, 'SA', 'Asia/Riyadh'),
(337, 'SB', 'Pacific/Guadalcanal'),
(338, 'SC', 'Indian/Mahe'),
(339, 'SD', 'Africa/Khartoum'),
(340, 'SE', 'Europe/Stockholm'),
(341, 'SG', 'Asia/Singapore'),
(342, 'SH', 'Atlantic/St_Helena'),
(343, 'SI', 'Europe/Ljubljana'),
(344, 'SJ', 'Arctic/Longyearbyen'),
(345, 'SK', 'Europe/Bratislava'),
(346, 'SL', 'Africa/Freetown'),
(347, 'SM', 'Europe/San_Marino'),
(348, 'SN', 'Africa/Dakar'),
(349, 'SO', 'Africa/Mogadishu'),
(350, 'SR', 'America/Paramaribo'),
(351, 'SS', 'Africa/Juba'),
(352, 'ST', 'Africa/Sao_Tome'),
(353, 'SV', 'America/El_Salvador'),
(354, 'SX', 'America/Lower_Princes'),
(355, 'SY', 'Asia/Damascus'),
(356, 'SZ', 'Africa/Mbabane'),
(357, 'TC', 'America/Grand_Turk'),
(358, 'TD', 'Africa/Ndjamena'),
(359, 'TF', 'Indian/Kerguelen'),
(360, 'TG', 'Africa/Lome'),
(361, 'TH', 'Asia/Bangkok'),
(362, 'TJ', 'Asia/Dushanbe'),
(363, 'TK', 'Pacific/Fakaofo'),
(364, 'TL', 'Asia/Dili'),
(365, 'TM', 'Asia/Ashgabat'),
(366, 'TN', 'Africa/Tunis'),
(367, 'TO', 'Pacific/Tongatapu'),
(368, 'TR', 'Europe/Istanbul'),
(369, 'TT', 'America/Port_of_Spain'),
(370, 'TV', 'Pacific/Funafuti'),
(371, 'TW', 'Asia/Taipei'),
(372, 'TZ', 'Africa/Dar_es_Salaam'),
(373, 'UA', 'Europe/Kiev'),
(374, 'UA', 'Europe/Uzhgorod'),
(375, 'UA', 'Europe/Zaporozhye'),
(376, 'UG', 'Africa/Kampala'),
(377, 'UM', 'Pacific/Midway'),
(378, 'UM', 'Pacific/Wake'),
(379, 'US', 'America/New_York'),
(380, 'US', 'America/Detroit'),
(381, 'US', 'America/Kentucky/Louisville'),
(382, 'US', 'America/Kentucky/Monticello'),
(383, 'US', 'America/Indiana/Indianapolis'),
(384, 'US', 'America/Indiana/Vincennes'),
(385, 'US', 'America/Indiana/Winamac'),
(386, 'US', 'America/Indiana/Marengo'),
(387, 'US', 'America/Indiana/Petersburg'),
(388, 'US', 'America/Indiana/Vevay'),
(389, 'US', 'America/Chicago'),
(390, 'US', 'America/Indiana/Tell_City'),
(391, 'US', 'America/Indiana/Knox'),
(392, 'US', 'America/Menominee'),
(393, 'US', 'America/North_Dakota/Center'),
(394, 'US', 'America/North_Dakota/New_Salem'),
(395, 'US', 'America/North_Dakota/Beulah'),
(396, 'US', 'America/Denver'),
(397, 'US', 'America/Boise'),
(398, 'US', 'America/Phoenix'),
(399, 'US', 'America/Los_Angeles'),
(400, 'US', 'America/Anchorage'),
(401, 'US', 'America/Juneau'),
(402, 'US', 'America/Sitka'),
(403, 'US', 'America/Metlakatla'),
(404, 'US', 'America/Yakutat'),
(405, 'US', 'America/Nome'),
(406, 'US', 'America/Adak'),
(407, 'US', 'Pacific/Honolulu'),
(408, 'UY', 'America/Montevideo'),
(409, 'UZ', 'Asia/Samarkand'),
(410, 'UZ', 'Asia/Tashkent'),
(411, 'VA', 'Europe/Vatican'),
(412, 'VC', 'America/St_Vincent'),
(413, 'VE', 'America/Caracas'),
(414, 'VG', 'America/Tortola'),
(415, 'VI', 'America/St_Thomas'),
(416, 'VN', 'Asia/Ho_Chi_Minh'),
(417, 'VU', 'Pacific/Efate'),
(418, 'WF', 'Pacific/Wallis'),
(419, 'WS', 'Pacific/Apia'),
(420, 'YE', 'Asia/Aden'),
(421, 'YT', 'Indian/Mayotte'),
(422, 'ZA', 'Africa/Johannesburg'),
(423, 'ZM', 'Africa/Lusaka'),
(424, 'ZW', 'Africa/Harare');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `attribute_options`
--
ALTER TABLE `attribute_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `attribute_set`
--
ALTER TABLE `attribute_set`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `attribute_set_options`
--
ALTER TABLE `attribute_set_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_key` (`url_key`);

--
-- Indexes for table `catalog_category`
--
ALTER TABLE `catalog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `catalog_product`
--
ALTER TABLE `catalog_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `category_urls`
--
ALTER TABLE `category_urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `configurable_products`
--
ALTER TABLE `configurable_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurable_products_image`
--
ALTER TABLE `configurable_products_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_data`
--
ALTER TABLE `config_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_country_code` (`country_code`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_config`
--
ALTER TABLE `home_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locale`
--
ALTER TABLE `locale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_gallery`
--
ALTER TABLE `news_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products_image`
--
ALTER TABLE `products_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_price_index`
--
ALTER TABLE `product_price_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_urls`
--
ALTER TABLE `product_urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_item`
--
ALTER TABLE `sales_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_shipping_address`
--
ALTER TABLE `sales_order_shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_terms`
--
ALTER TABLE `search_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`seo_id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `static_block`
--
ALTER TABLE `static_block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_credit`
--
ALTER TABLE `store_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `swatches`
--
ALTER TABLE `swatches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_coupon_used`
--
ALTER TABLE `tb_coupon_used`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `idx_country_code` (`country_code`),
  ADD KEY `idx_zone_name` (`zone_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `attribute_options`
--
ALTER TABLE `attribute_options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `attribute_set`
--
ALTER TABLE `attribute_set`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attribute_set_options`
--
ALTER TABLE `attribute_set_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catalog_category`
--
ALTER TABLE `catalog_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `catalog_product`
--
ALTER TABLE `catalog_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category_urls`
--
ALTER TABLE `category_urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `configurable_products`
--
ALTER TABLE `configurable_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `configurable_products_image`
--
ALTER TABLE `configurable_products_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `config_data`
--
ALTER TABLE `config_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `home_config`
--
ALTER TABLE `home_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `locale`
--
ALTER TABLE `locale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news_gallery`
--
ALTER TABLE `news_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products_image`
--
ALTER TABLE `products_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_price_index`
--
ALTER TABLE `product_price_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product_urls`
--
ALTER TABLE `product_urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_order_item`
--
ALTER TABLE `sales_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_order_shipping_address`
--
ALTER TABLE `sales_order_shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `search_terms`
--
ALTER TABLE `search_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `static_block`
--
ALTER TABLE `static_block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `store_credit`
--
ALTER TABLE `store_credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `swatches`
--
ALTER TABLE `swatches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_coupon_used`
--
ALTER TABLE `tb_coupon_used`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `zone_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
