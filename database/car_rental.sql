-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 12:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creation_date`) VALUES
(2, 'Doofenshmirtz', 'patatas', '2023-05-08'),
(3, 'Patatas', 'roast', '2023-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updationdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `car_id`, `from_date`, `to_date`, `status`, `postingdate`, `updationdate`) VALUES
(1, 1, 2, '2023-04-18', '2023-04-23', 1, '2023-04-17 11:40:41', '0000-00-00 00:00:00'),
(2, 1, 1, '2023-04-19', '2023-04-30', 0, '2023-04-17 10:43:34', '0000-00-00 00:00:00'),
(6, 1, 3, '2023-05-15', '2023-05-24', 0, '2023-05-04 10:18:11', '0000-00-00 00:00:00'),
(9, 1, 3, '2023-05-01', '2023-06-23', 1, '2023-05-08 02:18:28', '0000-00-00 00:00:00'),
(10, 1, 2, '2023-05-11', '2023-05-24', 0, '2023-05-08 02:20:21', '0000-00-00 00:00:00'),
(11, 1, 2, '2023-05-10', '2023-05-24', 1, '2023-05-08 02:50:57', '0000-00-00 00:00:00'),
(12, 1, 3, '2023-06-01', '2023-06-06', 0, '2023-05-08 03:17:07', '0000-00-00 00:00:00'),
(13, 1, 1, '2023-05-07', '2023-05-31', 0, '2023-05-14 11:32:19', '0000-00-00 00:00:00'),
(14, 46, 3, '2023-05-09', '2023-05-10', 1, '2023-05-08 03:45:25', '0000-00-00 00:00:00'),
(15, 1, 2, '2023-05-01', '2023-12-18', 1, '2023-05-08 06:58:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(150) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `creation_date`) VALUES
(1, 'Toyota', '2023-04-17 10:50:52'),
(2, 'Nissan', '2023-05-08 05:23:47'),
(3, 'BMW', '2023-04-13 10:03:23'),
(4, 'Audi', '2023-04-13 10:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `carName` varchar(200) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Fuel_Type` varchar(100) NOT NULL,
  `Seats` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image1` varchar(200) NOT NULL,
  `RegDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `carName`, `brand_id`, `category_id`, `Description`, `Fuel_Type`, `Seats`, `Price`, `Image1`, `RegDate`) VALUES
(1, 'Toyota Fortuner', 1, 1, 'The time is now to take on new journeys and brave the path less taken in the new Toyota Fortuner.Lead the road with Toyota Fortuner\'s premium interior finish and on-board control system with all your commands within reach.\n\nVenture the Roads with Sleek and Precision.With power that runs deep in the new Fortuner\'s more powerful and more fuel-efficient engine, no journey is a road too rough.With the new Toyota Fortuner, expect journeys in exquisite comfort all throughout, no matter what road you travel or challenge you encounter.The Toyota Fortuner comes with advanced passive and active safety features that allow you to travel with greater confidence.Time to roll the dice and go where the road takes you. Adventure lies ahead --on or off the road, and no doubt the Toyota Fortuner will bravely commit.\nYour Fortune Awaits', 'Diesel', 7, 950, 'toyota-fortuner-legender-rear-quarters-6e57.jpg', '2023-04-02'),
(2, 'BMW 5 Series', 3, 2, 'BMW 5 Series price starts at ? 55.4 Lakh and goes upto ? 68.39 Lakh. The price of Petrol version for 5 Series ranges between ? 55.4 Lakh - ? 60.89 Lakh and the price of Diesel version for 5 Series ranges between ? 60.89 Lakh - ? 68.39 Lakh.The most advanced BMW 5 Series ever: as a Sedan, Touring, M Automobile and Plug-in hybrid Sedan. In addition to impressive elegance and performance, these vehicles also have a range of diverse qualities that makes them indispensable in everyday use.Plenty of room for the highest requirements: the BMW 5 Series Touring boasts numerous driver assistance systems, the 8-speed Steptronic transmission and a selection of powerful and economical petrol and diesel engines. Also featured is a luggage space of 560 litres, which can be extended to a total of 1,670 litres with its three-part folding backrest. In addition to all this, the intelligent BMW xDrive all-wheel drive system ensures driving pleasure on every road, on every bend and in every driving situation.', 'Petrol', 5, 3100, 'BMW5.jpg', '2023-04-17'),
(3, 'Audi Q8', 4, 4, 'The Audi Q8 combines the elegance of a four-door luxury coupé with the practical versatility of a large SUV. Richly equipped, comprehensively connected and tough enough for off-road duty, it is a confident companion for business and leisure. Expressive design with new Singleframe and features from the original Audi quattro. Generous, elegant interior, touch operating concept and high-tech navigation: The Audi Q8 is a confident companion for business and leisure.With the imposing Singleframe in octagonal design, the Audi Q8 is the new face of the Q family. The brawny radiator grille stands upright and, together with the spoiler that has been drawn toward the front and the large, highly contoured air inlets, emphasizes the self-confident look. The elegantly sloping roofline terminates in gently inclined D-pillars and rests against the quattro blisters above the wheel arches, which house up to 22-inch wheels. A light strip connects the units at the rear.\"\"\"\"\"\"\"\"', 'Petrol', 5, 3500, 'audi q8.jpg', '2023-04-17'),
(4, 'X-trail', 2, 1, 'This is the fourth generation of Nissan’s flagship SUV, if you can believe it. It started off as a cheap and chunky pseudo 4x4 back in 2001, part of the vanguard of soft-roaders that included the likes of the Toyota RAV4 and Land Rover Discovery Sport. \r\n\r\nLike those two cars, the X-Trail has gently poshed up and smoothed out its rough edges over the years, with Nissan trying to ape the success of its smaller Qashqai crossover in a larger format.\r\n\r\nIndeed, the X-Trail’s main sell is that it comes with seven seats, and now in a more fuel-sipping form thanks to Nissan’s quirky petrol hybrid powertrain. Is that enough to give it the edge over the all-round packages like the Skoda Kodiaq, Kia Sorento or Dacia Jogger?', 'Petrol', 6, 2510, 'xtrail.png', '2023-05-07'),
(5, 'Nissan Livina', 2, 1, 'There\'s more for everyone with the All-New Nissan Livina. Built with a spacious and versatile cabin, advanced safety technology, and an enjoyable drive,\r\nit\'s the perfect 7-seater vehicle to live the life you\'ve always wanted and create excitement for you and your loved ones.\r\n\r\nEnjoy a wide interior space that\'s crafted with a comfortable and versatile cabin. The All-New Livina is capable of various 7-seat configurations just the way you need it.\r\n\r\nFrom keeping you on the right side of the road to helping you get out of tight parking spaces, the All-New Livina is equipped with safety technology to give you peace of mind with every drive.\r\n\r\nEquipped with a 7\" touchscreen, 12V sockets, and other user-friendly technology, the All-New Livina lets you create enjoyment for everyone without missing a beat.', 'Petrol', 7, 1900, 'livina.jpg', '2023-05-07'),
(6, 'VIOS GR-S', 1, 2, 'The thrill-seeker in you deserves the new Vios GR-S: the Philippines’ best-selling sedan now with the feel and excitement of Toyota Gazoo Racing motorsport architecture\r\nDrive on the road or on the track and be ready to experience a whole new level of driving exhilaration with the sporty Meter Design with 4.2” TFT Multi-Information Display.\r\nStrength and ease harmonize to deliver world-class driving experience,\r\nall from a class-leading fuel efficient sedan.\r\nIn this ever-changing world, the Toyota Vios levels up once again to keep up with your well-rounded lifestyle and comes with a fresh, interior upgrade for everyday heart-stirring, spirited drives on the road.\"\"', 'Petrol', 5, 1000, 'vios.png', '2023-05-15'),
(7, 'VIOS 1.5 G CVT', 1, 2, 'The Philippines best-selling got upgraded a finessed exterior design that swift on the street, with the same reliable grip and steering that you can trust.\r\nNo need to look further the 6.75in. Display Audio of the new Vios delivers all you need for everyday ease and long drive convenience.\r\nStrength and ease harmonize to deliver world-class driving experience, all from a class-leading fuel-efficient sedan.\r\nThe Vios gives you the comfort you need for all your drives, from cushioned seats to smooth turns.\r\nFind comfort in an all-in-one car that fits your needs.', 'Petrol', 5, 800, 'slider-vehicle-vios.png', '2023-05-15'),
(8, 'WIGO 1.0 TRD S AT', 1, 4, 'A cool and compact exterior that refreshing to the eyes and easy on the road.\r\nEnjoy daily drives with easy access to Wigo infotainment system and air conditioner panel.\r\nEnjoy long drives with a fuel-efficient engine that delivers practical performance from under a compact hood.\r\nGet maximum chill - experience utmost comfort with spacious seats and legroom, and generous cup holders.\r\nBeyond being comfortable, the Wigo keeps you safe with an advanced security system designed from Toyota safety standards.\r\n', 'Petrol', 5, 500, 'wigo.jpg', '2023-05-15'),
(9, 'Nissan URVAN', 2, 5, 'With innovative Nissan Intelligent Mobility features and a stylish new look,\r\nthe New Nissan Urvan is ready to add some zest to your life pursuits both for business and for leisure.\r\n\r\nThe New Nissan Urvan, now with improved safety features, is equipped with High Beam Assist, Side Curtain Airbags, and ISO-Fix.\r\nSturdy construction with clean, modern looks create the perfect combination for your everyday needs on the job or for recreation.\r\nDriving with the Urvan is made-smoother with technology features like Vehicle Dynamic Control and Hill Start Assist.\r\nWith new looks for the gear shift panel and D-shaped steering wheel, the Urvan dashboard continues to keep the driver comfortable and in control.', 'Diesel', 18, 2500, 'urvan.png', '2023-05-15'),
(10, 'BMW M3', 3, 2, 'The BMW M3 Competition Sedan combine powerful proportions and distinctive four-door 3-box design with the sportiness typical of M. Leading the quartet of bold characters is the BMW M3 Competition Sedan with its impressive 510 hp and 650 Nm of torque. Equipped with a high-performance BMW M TwinPower Turbo power unit, 8-speed M Steptronic, Active M Differential and numerous technologies derived from motorsport, it guarantees maximum driving dynamics – both in everyday use and on the race track. The model range is rounded off by the BMW M340i xDrive Sedan: alongside attractive design, the powerful sports saloons inspire with an especially balanced mix of sportiness, efficiency and convenient everyday utility.', 'Petrol', 5, 4500, '58056-car-bmw-m3-2017-x6-free-download-png-hq.png', '2023-05-15'),
(11, 'BMW X7', 3, 1, 'The first-ever BMW X7 is the elegant fusion of presence and personality. Despite its majestic appearance, it gives an impression of lightness and agility thanks to the puristic design and athletic styling. At the same time, the considerable spaciousness of the interior offers a pioneering interplay of exclusivity, functionality and freedom – incomparable comfort all the way to the third row of seats. Charm is its essence. Elegance its character.\r\nThe BMX X7 offers a particularly high level of ride comfort combined with outstanding driving dynamics. The optional Executive Drive Pro chassis control system uses active roll stabilisers that electromechanically reduce body lean to a minimum continuously while driving. The standard Adaptive 2-axle air suspension makes it easier to get in and out of the vehicle, as well as to load it. The air suspension automatically keeps the vehicle at a constant height regardless of the load and is manually adjustable.', 'Petrol', 5, 4100, 'bmw_19x7msport40isu1b_angularfront.png', '2023-05-15'),
(12, 'BMW 4 Series Coupé', 3, 7, 'The all-new BMW 4 Series Coupé impresses with its unique aesthetics, sporting dynamics and high-quality interior. The combination of unique design and impressive agility develops an extraordinarily high attraction.\r\nProvocative, independent, edgy: with its unmistakeable exterior design, the BMW 4 Series Coupé manifests itself as a rebellious individualist. The distinctive front with the unique BMW double kidney grille emphasises maximum independence and symbolizes the expressive appearance of the BMW 4 Series Coupé.\r\nComplexity in concise form: the interior design of the BMW 4 Series Coupé places the driver at the centre of attention. Alongside the functional styling of the interior, the precise design language and the high-quality design elements produce a modern and independent aura.\r\nSporty roadholding, optimum handling and high agility: in terms of performance and driving dynamics, the BMW 4 Series Coupé provides exciting driving pleasures. With powerful TwinPower Turbo engines and perfectly matched suspension components, the sports coupé is prepared for every challenge.', 'Petrol', 2, 5000, 'bmw-4-series-coupe-modelfinder.png', '2023-05-15'),
(13, ' Audi R8 Coupe', 4, 7, 'The R8 Coupe, a new Coupe from Audi comes in 1 variants. The top variant of R8 Coupe is powered by the 5.2 L a 5204 cc, 10 cylinder Gasoline engine that fires 570 hp of power and 560 Nm torque. The 2 seater R8 Coupe 5.2 L 7-Speed comes with Automatic transmission. For added safety are provided central locking & power door locks.', 'Petrol', 2, 5501, 'cc_2020AUC170039_01_1280_T9T9.png', '2023-05-15'),
(14, 'Audi A6 Sedan', 4, 2, 'The Audi A6 Sedan is offered Gasoline engine in the Philippines. The new Sedan from Audi comes in a total of 1 variants. If we talk about Audi A6 Sedan engine specs then the Gasoline engine displacement is 1998 cc. A6 Sedan is available with Automatic transmission. The A6 Sedan is a 5 Seater Sedan and has a length of 4939 mm the width of 1886 mm, and a wheelbase of 2924 mm.', 'Petrol', 5, 4502, '2019-56.png', '2023-05-15'),
(15, ' Audi Q3', 4, 1, 'The Audi Q3 is offered Gasoline engine in the Philippines. The new SUV from Audi comes in a total of 1 variants. If we talk about Audi Q3 engine specs then the Gasoline engine displacement is 1395 cc. Q3 is available with Automatic transmission. Also, depending on the variant and fuel type the Q3 has a fuel consumption of 27 kmpl on highway. The Q3 is a 5 Seater SUV and has a length of 4388 mm the width of 2019 mm, and a wheelbase of 2603 mm.\r\n\r\n', 'Petrol', 5, 4700, 'Audi-Q3-PNG-Image.png', '2023-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(120) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `creation_date`) VALUES
(1, 'SUV', '2023-05-08 05:24:00'),
(2, 'Sedan', '2023-04-13 10:04:01'),
(3, 'Pick up', '2023-04-17 10:45:54'),
(4, 'Hatchback', '2023-04-17 10:43:06'),
(5, 'Van', '2023-05-14 22:28:23'),
(7, 'Coupe', '2023-05-14 22:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `user_id`, `message`, `postingdate`, `status`) VALUES
(1, 1, 'Dove se trova restorante?', '2023-04-19 12:12:40', 1),
(19, 46, 'saan na', '2023-05-08 03:54:57', 1),
(20, 1, 'pabili looad paplastik po', '2023-05-08 05:47:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactusinfo`
--

CREATE TABLE `contactusinfo` (
  `address` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact_no` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contactusinfo`
--

INSERT INTO `contactusinfo` (`address`, `email`, `contact_no`) VALUES
('Purok 1, Malamig, Gloria,Oriental Mindoro', 'patatasroast00@gmail.com', '09473829317');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(11) NOT NULL,
  `First_Name` varchar(120) NOT NULL,
  `Last_Name` varchar(120) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `ContactNo` char(11) NOT NULL,
  `house_no` varchar(20) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `Barangay` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `ZipCode` int(4) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `RegDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `First_Name`, `Last_Name`, `Email`, `Password`, `ContactNo`, `house_no`, `street`, `Barangay`, `City`, `ZipCode`, `Province`, `Country`, `RegDate`) VALUES
(1, 'Charles Humphrey', 'Garcia', 'patatas05@gmail.com', 'code1', '0938242383', '211', 'Purok 2', 'Malamig', 'Gloria', 5209, 'Oriental Mindoro', 'Philippines', '2023-04-06'),
(39, 'Naruto', 'Uzumaki', 'patatas@gmail.com', 'hj', '09657483024', '', '12', 'Manihala', 'Bansud', 0, 'Oriental Mindoro', 'Philippines', '2023-05-07'),
(46, 'June', 'Ignacio', 'manga@gmail.com', 'user', '09550228559', '68', 'Mountain Side', 'Victoria', 'Roxas', 5212, 'Oriental Mindoro', 'Philippines', '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transac_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(8) NOT NULL,
  `transac_status` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transac_id`, `booking_id`, `car_id`, `user_id`, `amount`, `transac_status`, `date`) VALUES
(1, 1, 2, 1, 15500, 1, '2023-04-17 11:35:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
