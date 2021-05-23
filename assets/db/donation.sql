-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2021 at 11:53 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodnkrd_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donees`
--

CREATE TABLE `tbl_donees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(55) DEFAULT NULL,
  `cnic` varchar(55) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `headcount` varchar(100) DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  `record_inserted_by` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donees`
--

INSERT INTO `tbl_donees` (`id`, `name`, `number`, `cnic`, `address`, `area`, `headcount`, `organization_id`, `record_inserted_by`, `date`) VALUES
(1000001, 'Saima Sajjad', '', '4240163170874', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000002, 'Noor Muhammad', '', '4240115848829', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000003, 'Noor un Nisa', '', '4240114423632', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000004, 'Hawa', '', '4240116434124', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000005, 'Saba', '', '4240158957958', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000006, 'Anwar Ali', '', '4240119523337', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000007, 'Parsa', '', '4240117621012', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000008, 'Gul Nisa', '', '4240116064440', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000009, 'Abdul Qadir', '', '4220161744487', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000010, 'Ahmed', '', '4240143195795', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000011, 'Zubaida', '', '4240126841232', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000012, 'Habiba', '', '4240199733410', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000013, 'Zaib un Nisa', '', '4240144827218', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000014, 'Abida', '', '4240127606514', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000015, 'Abdul Rauf', '', '3220317510455', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000016, 'Hameeda', '', '4230160101502', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000017, 'Shazia', '', '4240146474264', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000018, 'Basraan', '', '4240151082874', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000019, 'Abdullah', '', '4230125729495', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000020, '6 Person', '', '', 'Lyari', NULL, '', 1, 4, '2020-03-22 19:00:00'),
(1000021, 'Sunny', '03091250590', '', 'Will pickup from Disco bakery', NULL, '2 to 3 families', 1, 2, '2020-03-23 19:00:00'),
(1000022, 'Ishtiaq', '03343481268', '', 'Flat No. B-211, Allah wali, New Karachi', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000023, 'Muhammad Ali', '03162005821', '', 'Jacob lines, Karachi', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000024, 'Saima', '03038780460', '', 'Safora goth sachal PS', NULL, '', 1, 1, '2020-03-23 19:00:00'),
(1000025, 'Zohra Bano', '03404881237', '4210116921936', '1620/15 javed nihari azizabad road ki taraf near manal beauty parlour Masjid Al Akhwan', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000026, 'Mr Yasin', '03082681414', '', 'Flat A 30 zeena #4, third floor bab e ghazi phase 1 near masjid siddique akbar.', NULL, '', 1, 1, '2020-03-23 19:00:00'),
(1000027, 'Zain Ul Abidin', '03482955184', '', 'Will pickup from Noorani Kabab house, Landhi ', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000028, 'Mehwish Mahrib', '03122737454', '', 'Kala board se andar malir khokrapar 2 number near bilal masjid', NULL, '3 to 5 families', 1, 2, '2020-03-23 19:00:00'),
(1000029, 'Nawaz + Mohammad Shah', '03432036143', '', 'Will pickup from Madras Chowk', NULL, '2 families', 1, 1, '2020-03-23 19:00:00'),
(1000030, 'Riyaz Bhai + his brother', '03062659356', '', 'Kaneez Fatima Society ', NULL, '2 families', 1, 3, '2020-03-24 19:00:00'),
(1000031, 'Tariq Bhai', '03362394423', '', 'North nazimabad Block D Aslam market besides shariq mart.', NULL, '6 Adults + 1 infant', 1, 1, '2020-03-23 19:00:00'),
(1000032, 'Rizwan', '03362394423', '', 'North nazimabad Block D Aslam market besides shariq mart.', NULL, '3 Adults', 1, 1, '2020-03-23 19:00:00'),
(1000033, 'Ibrahim + his brother', '03022103649', '', 'near paradise bakery road, faysal bank near memon masjid', NULL, '5 Adults + 5 children ', 1, 3, '2020-03-24 19:00:00'),
(1000034, 'Abdul Ghafoor', '03412895430', '3450153503893', 'near baloch para, lyari hospital / lyari ground, punjabi mohalla', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000035, 'Ali', '03118460440', '', 'He will pick 2 ration bags today(24th) at 6pm through Daniyal from norani ', NULL, '', 1, 5, '2020-03-23 19:00:00'),
(1000036, 'Noshad', '03035017446', '', 'Sector-9, North Karachi', NULL, '5', 1, 1, '2020-03-23 19:00:00'),
(1000037, 'Gulnaz begum', '03460804473', '', 'B-5 faizabad model colony', NULL, '7', 1, 1, '2020-03-23 19:00:00'),
(1000038, 'Ayesha bagi', '0304250046', '', 'Sector-9, North Karachi', NULL, '5', 1, 1, '2020-03-23 19:00:00'),
(1000039, 'Mumtaz', '', '', 'Bilal colony, north karachi', NULL, '2 familes', 1, 1, '2020-03-23 19:00:00'),
(1000040, 'Muhammad Hashim', '03062095570', '', 'R-265, Sector-15, Malik Society, Gulshan e rasheed', NULL, '', 1, 3, '2020-03-24 19:00:00'),
(1000041, 'Ghulam Qasim', '03048165733', '', '', NULL, '', 1, 3, '2020-03-23 19:00:00'),
(1000042, 'Sadia Jehanzeb', '', '', 'Mehmoodabad', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000043, 'Muhammad Rizwan ', '03152383816', '', 'House No. 542, I Area Korangi # 5, Karachi ', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000044, 'Qasim Ahmed Sharif', '03130252770', '4210170101753', 'Orangi town 1 number, 7A house number 153 near Saeed pan shop', NULL, '', 1, 2, '2020-03-24 19:00:00'),
(1000045, 'Rashid Ahmed Sharif', '03130252771', '4210121265835', 'Orangi town 1 number, 7A house number 153 near Saeed pan shop', NULL, '', 1, 2, '2020-03-24 19:00:00'),
(1000046, 'Muzammil', '03310258995', '', 'Gulshan block#10 near sindbad prison tower flat#616, 6th floor', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000047, 'Bilal', '03162083270', '', 'Malir airport', NULL, '', 1, 1, '2020-03-23 19:00:00'),
(1000048, 'Jawed Iqbal', '03032470414', '3130305839487', 'Perfume Chowk', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000049, 'Bilal warsi', '03132715650', '', 'Perfume Chowk', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000050, 'Samad', '03362532057', '', 'Five Star Complex, FL/1, M/11, Near Moti Mahal, Gulshan-e-Iqbal, Block 2', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000051, 'Ghulam Abbas Khan', '03012759648', '', 'House # C.C/50 Alfalah Housing Society Near Raja Bakers, Malir Halt', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000052, 'Kashifa Rizwan', '03332965533', '', 'Bahadurabad', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000053, 'Lai Khanam', '03142677907', '4230110293782', 'Mehmoodabad', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000054, 'Abeer Aunty', '03327395473', '', 'Block A, 1st Floor, Flat # 104 (Single Room) Vasavar Garden, Mosamyat Near Dow Ojha Campus.', NULL, '', 1, 2, '2020-03-23 19:00:00'),
(1000055, 'Mukhtar Ahmed', '03160290582', '', 'Liaquatabad, Near Rehmania Masjid', NULL, '', 1, 1, '2020-03-23 19:00:00'),
(1000056, 'Abdullah Jamal', '', '', 'DHA', NULL, '', 1, 2, '2020-03-24 19:00:00'),
(1000057, 'Malik Abrar Hussain', '03312961593', '4220177969821', 'Saddar ---opp to Chullu kabab near atrium ', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000058, 'Wasay', '', '', 'sadar - naz plaza opposite nishad cinema', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000059, 'Shameem', '', '', 'near saadi town', NULL, '5', 1, 1, '2020-03-24 19:00:00'),
(1000060, 'Shahbano ', '03111838935', '4140509053685', 'Near Usmania hospital, Jamshed road ', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000061, 'Shera', '03422051675', '4240102266885', 'Plot No. A-10, Mominabad, Orangi Town, Sector A', NULL, '', 1, 2, '2020-03-24 19:00:00'),
(1000062, 'Muhammad Sajid', '03022256852', '3120129147455', 'Near Al-Falah Masjid, Al-falah society, Malir Halt, Karachi', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000063, 'Saad', '03347990900', '', 'New Karachi', NULL, '4 labours live together', 1, 2, '2020-03-26 19:00:00'),
(1000064, 'Saad', '03347990900', '', 'New Karachi', NULL, '5', 1, 2, '2020-03-26 19:00:00'),
(1000065, 'Rehman bhai', '03317521478', '', 'Kati pahari ', NULL, '', 1, 5, '2020-03-24 19:00:00'),
(1000066, 'Muhammad Waqas', '03091025589', '4250133392913', 'Near Al-Falah Masjid, Al-falah society, Malir Halt, Karachi', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000067, 'Aisha Perveen', '03162843207', '4210182057224', 'Orangi Town, Chishti Nagar, Street 12, Sector 11 1/2', NULL, '', 1, 2, '2020-03-24 19:00:00'),
(1000068, 'Mr. Zafar', '03102791439', '4220155370819', 'J1 65 Lodi Parak, Korangi No. 5. Near Memon Institute', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000069, 'Aiman ', '03322181290', '', 'Plot # 2232 Flat #5 Second Floor PIB Colony , Near Sitara Manzil ', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000070, 'Chacha Manzoor - Lift walay ', '03142079650', '', 'Nazimabad ', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000071, 'Rafeeq Ahmed urf lala', '03121008734', '4220158494633', 'Address number makan number A671 gali number 7 Sharif calony landhi sector 36-G landhi number 4', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000072, 'Shabbir ahmed', '03366476782', '3240223624169', 'House no. 828 street-15 zia-ul-haq colony block-1 gulshan-e-iqbal karachi', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000073, 'Aziz bhai + his brother', '', '', 'sheet no 15 model colony', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000074, 'Arshad Khan', '03084588962', '', 'near saadi town', NULL, '6', 1, 1, '2020-03-25 19:00:00'),
(1000075, 'Najma', '03162083270', '4210114821210', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000076, 'Sehar', '03162083270', '4220150282896', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000077, 'Abdul Wahab', '03162083270', '4240121300196', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000078, 'Imran', '03162083270', '4220158029191', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000079, 'Saeed', '03162083270', '4220190456771', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000080, 'Habib uddin', '03162083270', '4220103242223', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000081, 'Akram', '03162083270', '4220182952327', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000082, 'Rahat', '03162083270', '3720181169139', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000083, 'Ikram', '03162083270', '4220106407515', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000084, 'Shabnam', '03162083270', '4220105455564', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000085, 'Naeem', '03162083270', '4220192102179', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000086, 'Farooq (R)', '03162083270', '4220159497473', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000087, 'Farooq', '03162083270', '4220104516321', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000088, 'Hameda', '03162083270', '4130423085795', '', NULL, '', 1, 1, '2020-03-25 19:00:00'),
(1000089, 'Mahrukh Nadeem', '03110824039', '', 'Plot No. C226, Nazimabad No. 2', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000090, 'Yameen', '0323230682', '4210145669501', 'Rufi Green Land Society, Paradise Bakery', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000091, 'Abdul Qadir ', '03150445487', '', 'Landhi 1 num Hero pakwan noor manzil K stop per', NULL, '2 Families ', 1, 2, '2020-03-26 19:00:00'),
(1000092, 'Mehak Varis ', '03453205382', '', 'Landhi # 5 ,  4A - Street #42 , House #6 ', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000093, 'Seema', '03161621778', '4210141415206', 'Liaqutabad c1 ariya memod panwali gali', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000094, 'Abdullah', '03463258055', '4210189552495', 'Anda mor, sector 7D-4', NULL, '', 1, 2, '2020-03-30 19:00:00'),
(1000095, 'Faaiz', '03102424628', '', 'Sector-9, North Karachi', NULL, '', 1, 1, '2020-03-26 19:00:00'),
(1000096, 'Sohail Zaman', '03418160591', '', 'Umer Colony', NULL, '', 1, 1, '2020-03-27 19:00:00'),
(1000097, 'Gohar Khan', '03428167966', '', 'Banaras', NULL, '', 1, 1, '2020-03-27 19:00:00'),
(1000098, 'Rafeeq', '03056027368', '', 'PECHS', NULL, '', 1, 1, '2020-03-27 19:00:00'),
(1000099, 'Vicky', '03100027998', '', 'Baloch Colony', NULL, '', 1, 1, '2020-03-27 19:00:00'),
(1000100, 'Gul Badshah', '03148079169', '', 'Mehmoodabad', NULL, '', 1, 1, '2020-03-27 19:00:00'),
(1000101, 'Muhammad Shahzad', '03470296791', '', 'Orangi Town', NULL, '', 1, 1, '2020-03-27 19:00:00'),
(1000102, 'Tufail', '03161014932', '', 'Umer Colony', NULL, '', 1, 1, '2020-03-27 19:00:00'),
(1000103, 'Rafeeq Ahmed ', '03121278287', '4220188431397', 'PIB --- ghosia colony muhamadi masjid wali gali makan number j 252', NULL, '10', 1, 2, '2020-03-28 19:00:00'),
(1000104, 'Saleem', '03341310853', '4220136720035', 'Shoe Market (after garden west) noorani apartment building, Block A, flat no. 310', NULL, '', 1, 2, '2020-03-28 19:00:00'),
(1000105, 'Abdul Samad', '03232879010', '4230181418741', 'Garden west near jillani masjid, faqeeri masjid wali gali, Azeemullah apartment, 2nd floor', NULL, '', 1, 2, '2020-03-28 19:00:00'),
(1000106, 'Nadia', '03112662147', '4210119444485', 'Anda mor', NULL, '', 1, 2, '2020-03-30 19:00:00'),
(1000107, 'Zahida Maid ', '03352630429', '', 'Nazimabad ', NULL, '', 1, 2, '2020-04-02 19:00:00'),
(1000108, 'Noreen', '03132631882', '4550422240727', 'Anda Mor', NULL, '', 1, 2, '2020-03-30 19:00:00'),
(1000109, 'Ali', '03132947067', '4220104070152', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000110, 'Asghar Ali', '03473576178', '4210115928339', 'Bilal colony, North Karachi', NULL, '8', 1, 2, '2020-03-30 19:00:00'),
(1000111, 'Huzur Baksh ', '03047750300', '3130282985605', 'Gali # 5, house # 113, sector 35-B, Korangi#5, Karachi-31', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000112, 'Farooq', '03062009431', '', 'Near Airport', NULL, '', 1, 2, '2020-03-28 19:00:00'),
(1000113, 'Nadir', '', '', 'Liaquatabad FC Area', NULL, '', 1, 2, '2020-03-29 19:00:00'),
(1000114, 'Raheem Bux', '03041021013', '4210124356547', 'Bilal colony, North Karachi', NULL, '7', 1, 2, '2020-03-30 19:00:00'),
(1000115, 'Abdur Raheem', '03132596902', '4240148482739', 'Surjani Town', NULL, '', 1, 2, '2020-04-02 19:00:00'),
(1000116, 'Umer Khan', '', '', 'North Nazimabad', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000117, 'Umer Khan', '', '', 'Nazimabad', NULL, '', 1, 2, '2020-03-27 19:00:00'),
(1000118, 'Abdullah Jamal', '', '', '', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000119, 'Qari Yonus ', '03233231917', '', 'Korange # 1---Masjid Bait-ul-Mamoor \nShan chowrange say right turn \nGari will park inside the Madarrsa and then saman will offload ---SAMAN wont be distributed outside the madarssaaa ', NULL, '', 1, 2, '2020-03-28 19:00:00'),
(1000120, 'Muhammad Habib ', '3162402371', '', 'Landhi 5B --Chiraagh Hotel ---Gali #28---Quarter# 5', NULL, '', 1, 2, '2020-03-28 19:00:00'),
(1000121, 'Saleem', '03452958117', '4220166841891', 'B-11/2 Khokrapar, near sindh government hospital', NULL, '10', 1, 1, '2020-03-27 19:00:00'),
(1000122, 'Imtiaz Ahmed', '03010802152', '4230186923157', '236/A, ALLAH bux street near fatimah masjid,upper gizri,karachi', NULL, 'N/A', 1, 2, '2020-03-27 19:00:00'),
(1000123, 'Imran Ali', '03401319551', '4210118746165', 'Flat no w_1, kda economy flat, sector 4 opposite power house surjani town ', NULL, 'N/A', 1, 2, '2020-04-02 19:00:00'),
(1000124, 'Erum Nasir', '03082249146', '4210174599858', 'M1-304, block 6,phase 2, country tower flats, near nagan chowrangi', NULL, 'N/A', 1, 2, '2020-03-30 19:00:00'),
(1000125, 'Saadat Ali', '03242525316 / 03345125728', '', 'house no. 59, arba-bad, near sindi muslim society (ghausia chakki)', NULL, 'N/A', 1, 5, '2020-03-28 19:00:00'),
(1000126, 'Waseem Ghaffar', 'Will Provide', '422011855391', 'Live in a rented house, near tariq road', NULL, '', 1, 5, '2020-03-28 19:00:00'),
(1000127, 'Nishat Zameer', 'Will Provide', '4220137196233', 'Live in a rented house, near tariq road', NULL, '', 1, 5, '2020-03-28 19:00:00'),
(1000128, 'Yasir Malik', 'Will Provide', '3130362161526', 'Live in a rented house, near tariq road', NULL, '', 1, 5, '2020-03-28 19:00:00'),
(1000129, 'yusuf dilawar', 'Will Provide', '1340195603675', 'lines area rented house', NULL, '3', 1, 5, '2020-03-28 19:00:00'),
(1000130, 'Imran hussain', '', '4220125354021', 'house no 9, jutt line, block 36,karachi', NULL, '5', 1, 5, '2020-03-28 19:00:00'),
(1000131, 'Abdul Rehman', '03128954434', '4230152966225', 'PECHS  --- Chanesar Goth ', NULL, '', 1, 5, '2020-04-02 19:00:00'),
(1000132, 'Hanif ', '03132970398', '', 'Liaqabad # 10 ', NULL, '', 1, 2, '2020-03-29 19:00:00'),
(1000133, 'Wasi', '03408684307', '', 'Orangi Town - Sector # 11, House # 757 near masjid Aqsa ', NULL, '', 1, 2, '2020-04-02 19:00:00'),
(1000134, 'Abdul Samad', '03182550960', '', '', NULL, '', 1, 2, '2020-03-29 19:00:00'),
(1000135, 'Owais ', '03012479030', '3130102708009', '\nAyesha Masjid ---khatim un nabi k pass ----3# gate faisal bank, Paradise bakery ', NULL, '', 1, 1, '2020-03-30 19:00:00'),
(1000136, 'Bakht nabi ', 'â€Ž03032028420', '4220106119877', 'Shah faisal colony', NULL, '', 1, 2, '2020-03-28 19:00:00'),
(1000137, 'Azam bhai', '03212584879', '4240166088325', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000138, 'Jameel Bhai', '03333353897', '4210101293261', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000139, 'Nazeer Ahmed', '03132293122', '4240113030679', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000140, 'Ashaq Bhai', '03162555411', '4240114120995', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000141, 'naeem Gudu', '03123898312', '4240119359169', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000142, 'sarwat (widow)', '03152346866', '4240117700114', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000143, 'M.Ali', '03323159710', '4240129436295', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000144, 'Younus Ali', '03072681274', '4240118323647', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000145, 'Jalal-ud-Din', '03132505850', '4240151608985', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000146, 'Yaseen', '03212962676', '4240141010507', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000147, 'Adnan', '03122174299', '4040143690559', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000148, 'Faizan', '03127898317', '4210119745083', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000149, 'M.Junaid', '03172685531', '4240130450980', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000150, 'Moin Ali', '03422887160', '4240106111771', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000151, 'waseem bhai', '03115602626', '4240101396159', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000152, 'Danish', '03112612295', '4230166944016', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000153, 'Adbul Rafay (Lady)', '03132453062', '4240157455867', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000154, 'Fahad', '03152083143', '4240197866907', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000155, 'Farhan', '03174737842', '4240115616398', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000156, 'Oyan Wald M Wali', '03353829990', '4240188671999', 'Orangi Town', NULL, '', 1, 2, '2020-03-25 19:00:00'),
(1000157, 'Muhammad Akmal', '03433489412', '4240116853049', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000158, 'Muhammad Rehmat Ali', '03360845763', '4240175181455', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000159, 'Shehnaz', '03172046067', '4240146767436', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000160, 'Shabana Ali', '03118952990', '4240115051894', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000161, 'Pervaiz Ahmed', '03456146641', '4240139457251', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000162, 'Muhammad Amir', '', '424010138717', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000163, 'Nizam Ud Din', '03121268511', '4240118493215', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000164, 'Mursaleen Rao', '03472491806', '4240114951733', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000165, 'Muhammad Qasim', '03129489307', '4240103185209', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000166, 'Muhammad Shehbaz', '03152586084', '4240197702289', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000167, 'Raees Hassan', '03162849712', '4240118483403', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000168, 'Mehtab Alam', '03412238049', '4240113320871', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000169, 'Tabassum Ara', '03112338111', '4240165207468', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000170, 'Muhammad Aziz', '03142962934', '4240108767091', 'Orangi Town', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000171, 'Zafar Ali Jogee', '03354280138', '4220158144411', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000172, 'Maqbool Joge', '03354280138', '4220190364059', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000173, 'Anwar Joge', '03354280138', '4250136618433', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000174, 'Babu', '03354280138', '4240119216499', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000175, 'Muhammad Anwar Sheikh', '03354280138', '4140930381427', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000176, 'Badal Rehman', '03354280138', '4250106563517', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000177, 'Anwer Joge', '03354280138', '4250196146129', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000178, 'Nazeer Joge', '03354280138', '4250101019823', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000179, 'Anwer Ali', '03354280138', '4220181361869', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000180, 'Azeem Khan', '03354280138', '4250189490561', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000181, 'Aziz Joge', '03354280138', '4140904242685', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000182, 'Haji Joge', '03354280138', '4140987402515', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000183, 'Achu Sheikh', '03354280138', '4140934402979', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000184, 'Yaseen Sheikh', '03354280138', '4140908448359', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000185, 'Sanoon', '03354280138', '4250173175781', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000186, 'Muhammad Arif Joge', '03354280138', '4140929976255', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000187, 'Ramzan', '03354280138', '4149991558573', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000188, 'Khuda Baksh', '03354280138', '4220130463437', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000189, 'Khan Muhammad Joge', '03354280138', '4250114595851', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000190, 'Muntahar', '03354280138', '4250125098775', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000191, 'Sawan Sheikh', '03354280138', '4140999854061', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000192, 'Ghulam Qadir', '03354280138', '4220134824467', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000193, 'Dildar Joge', '03354280138', '4220173290807', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000194, 'Muhammad Yousuf', '03354280138', '4250194353073', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000195, 'Daarr hoon Sheikh', '03354280138', '4140962549383', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000196, 'Jan Muhammad', '03354280138', '4250157809957', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000197, 'Sajjad Ali', '03354280138', '4250162581647', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000198, 'Hakeem', '03354280138', '4250163209389', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000199, 'Javeed Ali Shaikh', '03354280138', '4140964527101', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000200, 'Bekum', '03354280138', '4240116661812', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000201, 'Alhadnu Shaikh', '03354280138', '4140962259889', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000202, 'Lalu', '03354280138', '4220191493159', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000203, 'Muhammad Yusuf', '03354280138', '4250181265965', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000204, 'Rajahan', '03354280138', '4250174667415', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000205, 'Muhammad Salman', '03354280138', '4220147146523', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000206, 'Muhammad Ramzan', '03354280138', '4250160269315', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000207, 'Kal Muhammad', '03354280138', '4250192231861', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000208, 'Muhammad Bashim', '03354280138', '4250176085873', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000209, 'Sawan', '03354280138', '4220187626407', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000210, 'Panhuun', '03354280138', '4240117647251', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000211, 'Sikandar Ali', '03354280138', '4250178349073', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000212, 'Panhuun', '03354280138', '42501148336341', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000213, 'Maula Baksh', '03354280138', '4250119741559', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000214, 'Rajjaa', '03354280138', '4250114836771', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000215, 'Rajab Ali Sheikh', '03354280138', '4140968028873', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000216, 'Muhammad Liaqat Sheikh', '03354280138', '4140912994127', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000217, 'Murad Ali', '03354280138', '', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000218, 'Murad Ali', '03354280138', '', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000219, 'Murad Ali', '03354280138', '', 'Ghanii Bakhsh Goth (Jouhar Kachi Abadi)', NULL, '', 1, 2, '2020-03-26 19:00:00'),
(1000220, 'Saad', '03347990900', '', 'New Karachi', NULL, '', 1, 2, '2020-03-29 19:00:00'),
(1000221, 'Shazia ', '03052379308', '1530262734395', 'Pathan Colony ---Banaras near SITE AREA ', NULL, '', 1, 2, '2020-04-02 19:00:00'),
(1000222, 'Naheed Baji ', '03463180536', '4210153210482', 'Nazimabad Block L - Arfaat Town , Makan # R-311 ---Taimuria Thanay wali gali ', NULL, '13', 1, 2, '2020-03-28 19:00:00'),
(1000223, 'Waqar', '03132941284', '4210156482355', 'Moosa colony Karimabad ', NULL, '6', 1, 2, '2020-03-30 19:00:00'),
(1000224, 'Kausar Parveen', '0340069497', '4220172857340', 'Near ishat ul Quran, khosa goth, Malir', NULL, '13', 1, 2, '2020-03-28 19:00:00'),
(1000225, 'Kiran Aunty ', '03352457376', '4210115012920', 'Al-Ghafoor Vista, Flat 201, Nazimabad #1, 1/16 Block A near Sir syed Lawn ', NULL, '4', 1, 2, '2020-04-02 19:00:00'),
(1000226, 'Osama ', '0332509005', '4210122322269', 'R-680 Block 18 Samnabad FB area Karachi---Rizwan and Anwar ', NULL, '', 1, 2, '2020-04-02 19:00:00'),
(1000227, 'Osama ', '0332509005', '3630356639657', 'R-680 Block 18 Samnabad FB area Karachi---Rizwan and Anwar ', NULL, '', 1, 2, '2020-04-02 19:00:00'),
(1000228, 'Sultana and Nusrat ', '03102354177', '', 'Landhi 5b/31 5 --Gosht Market ', NULL, '12', 1, 2, '2020-04-02 19:00:00'),
(1000229, 'Ahmad Hussain', '03171050268', '4210116873347', 'main University road mosmyat shakeel garden A block flat no 014(ground floor)', NULL, '', 1, 1, '2020-04-02 19:00:00'),
(1000230, 'Matloob Ahmed', '03322465832', '4210162116417', 'Raza Square', NULL, '', 1, 2, '2020-03-28 19:00:00'),
(1000231, 'Muhammad Salman', '', '4220165749015', 'Jamshed Road', NULL, '', 1, 2, '2020-03-28 19:00:00'),
(1000232, 'Shakira', 'Will Provide', '', 'Usmania Colony, Jamshed Road', NULL, '', 1, 2, '2020-03-28 19:00:00'),
(1000233, 'Umer Khan', '', '', 'N/A', NULL, '', 1, 2, '2020-03-29 19:00:00'),
(1000234, 'Yaseen', '', '', 'Azam Basti', NULL, '', 1, 2, '2020-03-29 19:00:00'),
(1000235, 'Afroz Khan', '', '', 'Orangi Town', NULL, '', 1, 6, '2020-03-29 19:00:00'),
(1000236, 'Sakina', '03142291896', '', '81/3 sheet #19 model colony, malir', NULL, '4 person', 1, 1, '2020-03-30 19:00:00'),
(1000237, 'Adnan', '03453261050', '', '40/3 sheet #19 model colony, malir', NULL, '6 person', 1, 1, '2020-03-30 19:00:00'),
(1000238, 'Rashida', '03003671777', '3130153688955', 'Bilal colony, North Karachi', NULL, '', 1, 1, '2020-03-30 19:00:00'),
(1000239, 'Ghazala', '', '', 'Hassan square, Gulshan e Iqbal', NULL, '', 1, 1, '2020-03-30 19:00:00'),
(1000240, 'Naseem Bibi', '03460804473', '', '9c, near united bakery, model colony', NULL, '6 person', 1, 1, '2020-03-30 19:00:00'),
(1000241, 'Muntaha', '03402105136', '', 'flat 405, D2, classic view, Johar block 19', NULL, '', 1, 1, '2020-03-30 19:00:00'),
(1000242, 'Ghulam Yaseen', '03041763756', '3120173656505', 'near by saadi town', NULL, '6', 1, 1, '2020-03-29 19:00:00'),
(1000243, 'Bashir Ahmed', '03028547305', '3120102849655', 'near by saadi town', NULL, '3', 1, 1, '2020-03-29 19:00:00'),
(1000244, 'Abdullah Jamal', '', '', 'Surjani Town', NULL, '', 1, 2, '2020-03-29 19:00:00'),
(1000245, 'Shahzad Khan', '', '', 'Malir Thanna, Malir City', NULL, '8', 1, 6, '2020-03-29 19:00:00'),
(1000246, 'Umer Khan', '', '', 'N/A', NULL, '', 1, 2, '2020-03-30 19:00:00'),
(1000247, 'Muhammad Rashid', '03433141535', '3110130073367', 'House # B 131/I Block No 2, Model Colony mor jokhio road', NULL, '5 families', 1, 1, '2020-03-30 19:00:00'),
(1000248, 'Muhammad Shabbir', '03052400839', '3130191747947', 'Gulshan', NULL, '', 1, 1, '2020-03-30 19:00:00'),
(1000249, 'Liaquat Khan', '03312024726', '3240228232103', 'Gulshan', NULL, '', 1, 1, '2020-03-30 19:00:00'),
(1000250, 'Mujahid', '0305025282', '3120186560419', 'jhuggi at block 5 Saadi town', NULL, '2 families', 1, 1, '2020-03-30 19:00:00'),
(1000251, 'Aged lady', '031558350443', '', 'Shah faisal colony no. 33/1475 near qamar masjid road, opp furniture shop wali gali, 3rd floor p hai ghr', NULL, '', 1, 5, '2020-04-02 19:00:00'),
(1000252, 'Raheel ', '03012070720', '4510285512431', '', NULL, '6', 1, 5, '2020-04-02 19:00:00'),
(1000253, 'Jawad ki Ammi', '03182272404', '4220109434729', 'A-97, Block A, Tower wali gali, Bagh e Korangi', NULL, '9', 1, 1, '2020-04-03 19:00:00'),
(1000254, 'Mina Abid', '03112879551', '4220135410258', 'D-24 shah faisal colony no. 6', NULL, '7', 1, 1, '2020-04-03 19:00:00'),
(1000255, 'Rameez', '03132471035', '', 'main University road mosmyat shakeel garden A block (third floor)', NULL, '10', 1, 1, '2020-04-23 03:53:47'),
(1000256, 'Ajaz', '03164736708', '4240159989183', 'Banaras', NULL, '7', 1, 1, '2020-04-23 03:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donees_distribution`
--

CREATE TABLE `tbl_donees_distribution` (
  `id` int(11) NOT NULL,
  `donee_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `donation_type` varchar(55) NOT NULL DEFAULT 'Ration' COMMENT 'ration, cash',
  `total_donation` varchar(55) NOT NULL DEFAULT '1' COMMENT 'no of bags, amount',
  `case_reference` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `delivered_to` varchar(55) DEFAULT 'donee' COMMENT 'donee, third person, representative',
  `delivered_by` varchar(55) DEFAULT NULL COMMENT 'user_id',
  `delivery_status` varchar(55) DEFAULT 'Pending' COMMENT 'pending, delivered, invalid, no response, already received',
  `delivery_date` date DEFAULT NULL,
  `donation_status` varchar(55) DEFAULT NULL COMMENT 'completed,followup,dismissed',
  `delivery_proof` text DEFAULT NULL COMMENT 'image or video',
  `record_inserted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donees_distribution`
--

INSERT INTO `tbl_donees_distribution` (`id`, `donee_id`, `organization_id`, `donation_type`, `total_donation`, `case_reference`, `remarks`, `delivered_to`, `delivered_by`, `delivery_status`, `delivery_date`, `donation_status`, `delivery_proof`, `record_inserted_by`) VALUES
(1, 1000001, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(2, 1000002, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(3, 1000003, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(4, 1000004, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(5, 1000005, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(6, 1000006, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(7, 1000007, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(8, 1000008, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(9, 1000009, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(10, 1000010, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(11, 1000011, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(12, 1000012, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(13, 1000013, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(14, 1000014, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(15, 1000015, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(16, 1000016, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(17, 1000017, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(18, 1000018, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(19, 1000019, 1, 'Ration', '1', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(20, 1000020, 1, 'Ration', '6', 'Umer Saleem', '', 'donee', '4', 'Delivered', '2020-03-23', 'Completed', NULL, 4),
(21, 1000021, 1, 'Ration', '1', 'Azher (Rija Aleem)', 'Azher - Referred by Rija Aleem - No Information. Guy was searching for work on road. Somone took his number and sent to us.', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(22, 1000022, 1, 'Ration', '0', 'Azher (Ammad Asim)', 'Only old ladies, No male.', 'donee', '', 'No Response', '2020-03-24', '', NULL, 2),
(23, 1000023, 1, 'Ration', '1', 'Azher (Rija Aleem)', 'Azher - Referred by Rija Aleem - Guard', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(24, 1000024, 1, 'Ration', '1', 'Azher (Rija Aleem)', 'maid , father mazdoor, 6 ppl', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(25, 1000025, 1, 'Ration', '1', 'Azher (Rija Aleem)', 'stitches clothes, widow with widow daughter, 7 ppl', 'donee', '8', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(26, 1000026, 1, 'Ration', '2', 'Azher (Sadia Jehanzeb)', 'Sadia baji\'s father house. They will deliver it to 2 families they know. I have verified that they are daily wagers.', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(27, 1000027, 1, 'Ration', '0', 'Umer Saleem', 'Rickshaw Driver', 'donee', '9', 'Invalid', '2020-03-27', '', NULL, 2),
(28, 1000028, 1, 'Ration', '3', 'Talha', 'clothing stall', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(29, 1000029, 1, 'Ration', '2', 'Talha', 'Rikshaw Drivers', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(30, 1000030, 1, 'Ration', '2', 'Talha', 'Rikshaw Drivers', 'donee', '3', 'Delivered', '2020-03-25', 'Completed', NULL, 3),
(31, 1000031, 1, 'Ration', '2', 'Talha', 'AC technician', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(32, 1000032, 1, 'Ration', '1', 'Talha', 'He was a small product supplier but due to this situation he is getting no orders.', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(33, 1000033, 1, 'Ration', '2', 'Talha ', 'Painters', 'donee', '3', 'Delivered', '2020-03-25', 'Completed', NULL, 3),
(34, 1000034, 1, 'Cash', '1', 'Umer Saleem', 'loading ka km krty daily ka paon p chot lg gai unhy.. old hen .. kuch din pehly Mily thy pareshan thy .. job chaiye thi unhy or ration k liye b pareshan thy----He cannot come till noorani---Rickshaw market tak we have to go ', 'donee', '2', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(35, 1000035, 1, 'Ration', '2', 'Umer Saleem', 'Yateem buchay ----Will pickup from some intermediate location  most prob Noorani---will ask daniyal to  cordinate ', 'donee', '5', 'Delivered', '2020-03-24', 'Completed', NULL, 5),
(36, 1000036, 1, 'Ration', '1', 'Sameer', 'rickshaw driver (recently had an accident) his family is in tough condition for months', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(37, 1000037, 1, 'Ration', '2', 'Sameer', 'husband and son are both daily wage labour/mechanic, daughter in law has medical condition', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(38, 1000038, 1, 'Ration', '1', 'Sameer', 'maid but not able to work much, husband daily wage labour/painter, old parents', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(39, 1000039, 1, 'Ration', '2', 'Sameer', '', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(40, 1000040, 1, 'Ration', '1', 'Azher', 'A guy named Ali Khan reached out to me on facebook and informed about this guy. I asked him if he knows him personally and are they daily wages workers and he was affirmative to both. We need to get their details and verify authenticity.', 'donee', '3', 'Delivered', '2020-03-25', 'Completed', NULL, 3),
(41, 1000041, 1, 'Ration', '0', 'Azher', 'A guy named Ali Khan reached out to me on facebook and informed about this guy. I asked him if he knows him personally and are they daily wages workers and he was affirmative to both. We need to get their details and verify authenticity.', 'donee', '', 'Already Received', '2020-03-24', '', NULL, 3),
(42, 1000042, 1, 'Ration', '2', 'Azher (Personal Reference)', 'She knows two families personally. Will be delivered to her place.', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(43, 1000043, 1, 'Ration', '1', 'Umer Saleem', 'Ask him to collect from some middle location ', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(44, 1000044, 1, 'Ration', '1', 'Daniyal', 'Total 3 families, includes chicken waste collectors', 'donee', '7', 'Delivered', '2020-03-25', 'Completed', NULL, 2),
(45, 1000045, 1, 'Ration', '1', 'Daniyal', 'brother of Qasim Ahmed', 'donee', '7', 'Delivered', '2020-03-25', 'Completed', NULL, 2),
(46, 1000046, 1, 'Ration', '1', 'Daniyal', 'A technical guy whose the sole bread winner, named muzammil, number mentioned. ye upar wali 3 families isi k reference hain', 'donee', '8', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(47, 1000047, 1, 'Ration', '1', 'Umer Saleem', 'Care of fawad ---some one has to go to Airport side to drop ---he cant come to central area ', 'representative', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(48, 1000048, 1, 'Ration', '1', 'N/A', 'Labour. Was searching for work. Gave him one bag.', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(49, 1000049, 1, 'Ration', '4', 'Azher', 'Azher - Representative. Will deliver to families himself.', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(50, 1000050, 1, 'Ration', '1', 'Azher', 'Azher - Representative of Ahmed Waqar. Will Deliver to family.', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(51, 1000051, 1, 'Ration', '1', 'Azher', 'Azher - Referred by Ahmed Waqar', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(52, 1000052, 1, 'Ration', '1', 'Azher', 'Azher - Representative - Referred by Rija Aleem', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(53, 1000053, 1, 'Ration', '1', 'Azher', 'Azher - Referred by Ahmed Waqar', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(54, 1000054, 1, 'Ration', '1', 'Azher', 'Azher - Referred by Mariam (Ahmed Waqar)', 'donee', '2', 'Delivered', '2020-03-24', 'Completed', NULL, 2),
(55, 1000055, 1, 'Ration', '1', 'Azher', 'Azher - Referred by Mariam (Ahmed Waqar)', 'donee', '1', 'Delivered', '2020-03-24', 'Completed', NULL, 1),
(56, 1000056, 1, 'Ration', '3', 'Azher', 'Azher - Personal Representative', 'representative', '2', 'Delivered', '2020-03-25', 'Completed', NULL, 2),
(57, 1000057, 1, 'Ration', '2', 'Umer Saleem', 'Reference charlene ---03343517165', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(58, 1000058, 1, 'Ration', '1', 'Sameer (Wasay)', 'Wasay and his father will deliver to the needy person the actual location is korangi but wasay said he will get it done', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(59, 1000059, 1, 'Ration', '1', 'Sameer', 'my maid told me about this family I have delivered', 'donee', '1', 'Delivered', '2020-03-25', 'Completed', NULL, 1),
(60, 1000060, 1, 'Ration', '2', 'Umer Saleem', 'Maid ---not working anywhere currently', 'donee', '8', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(61, 1000061, 1, 'Ration', '1', 'Azher', 'Azher - Referred by Ahmed Waqar', 'donee', '7', 'Delivered', '2020-03-25', 'Completed', NULL, 2),
(62, 1000062, 1, 'Ration', '1', 'Azher', 'Azher - Road side labour mazdoor', 'donee', '2', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(63, 1000063, 1, 'Ration', '1', 'Talha (Saad)', 'Saad(Mutual of Talha, Sameer and Azher) will get the delivery and distribute to Majid', 'donee', '9', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(64, 1000064, 1, 'Ration', '1', 'Talha (Saad)', 'Saad(Mutual of Talha, Sameer and Azher) will get the delivery and distribute to Abdul Rehman', 'donee', '9', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(65, 1000065, 1, 'Ration', '6', 'Daniyal (Rehman bhai)', 'labourers and daily wages workers', 'donee', '5', 'Delivered', '2020-03-25', 'Completed', NULL, 5),
(66, 1000066, 1, 'Ration', '1', 'Azher', 'Furniture polish worker on daily basis', 'donee', '2', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(67, 1000067, 1, 'Ration', '1', 'Azher', 'Azher - Afroz Representative', 'donee', '7', 'Delivered', '2020-03-25', 'Completed', NULL, 2),
(68, 1000068, 1, 'Ration', '1', 'Ammad', 'Azher - Referred by Ammad Asim - Tookray wala', 'donee', '9', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(69, 1000069, 1, 'Ration', '4', 'Umer Saleem', '2 Hindu Families of 7 members each. \nAimen is the middle person , who will take the stock from us and deliver it to Hindu families who lives in Lyari.\nPLease provide 2 bags per family ----Total 4 bags for 2 families ', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(70, 1000070, 1, 'Ration', '1', 'Umer Saleem', 'Please call this guy---Number of bags will depend on the head count of the family ', 'donee', '10', 'Pending', '2020-03-27', '', NULL, 2),
(71, 1000071, 1, 'Ration', '1', 'Ammad', 'Azher - Referred by Ammad Asim', 'donee', '9', 'Pending', '2020-03-27', '', NULL, 2),
(72, 1000072, 1, 'Ration', '1', 'Azher', 'Azher - Referred by Asma Hassan', 'donee', '8', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(73, 1000073, 1, 'Ration', '2', 'Sameer', 'my mami will deliver to his house, both brothers are old and road side labour she knows them they live near by', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(74, 1000074, 1, 'Ration', '1', 'Sameer', 'Came from punjab, and stuck here, no job', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(75, 1000075, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(76, 1000076, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(77, 1000077, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(78, 1000078, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(79, 1000079, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(80, 1000080, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(81, 1000081, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(82, 1000082, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(83, 1000083, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(84, 1000084, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(85, 1000085, 1, 'Ration', '2', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(86, 1000086, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(87, 1000087, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Saleem', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(88, 1000088, 1, 'Ration', '1', 'Bilal', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '1', 'Delivered', '2020-03-26', 'Completed', NULL, 1),
(89, 1000089, 1, 'Ration', '1', 'Azher', 'Azher - Referred by Rija Aleem', 'donee', '10', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(90, 1000090, 1, 'Ration', '1', 'Azher', 'Azher - Referred by  Donor', 'donee', '8', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(91, 1000091, 1, 'Ration', '2', 'Umer Saleem', 'Umer -- Abdul qadir cyb peon \nHe has 2 families in his surrounding\nFamily 1 ---His sister ---Headcount 7\nFamily 2 --- Bayyvaaa khtoon --- headcount 5', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(92, 1000092, 1, 'Ration', '2', 'Umer Saleem', 'Headcount 7 ', 'donee', '9', 'Pending', '2020-03-27', '', NULL, 2),
(93, 1000093, 1, 'Ration', '1', 'Ammad Asim', 'Single Woman with two kids. No Husband', 'donee', '10', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(94, 1000094, 1, 'Ration', '1', 'Azher', 'Referred by Donor - Works at small factory - has ration for 3 days', 'donee', '10', 'Delivered', '2020-03-31', 'Completed', NULL, 2),
(95, 1000095, 1, 'Ration', '1', 'Sameer', 'Faaiz ---03102424628 is the middle person lives in same area (Sector-9), he is responsible for delivering', 'donee', '1', 'Delivered', '2020-03-27', 'Completed', NULL, 1),
(96, 1000096, 1, 'Ration', '1', 'Sameer', 'Asad Noor ---03343951710 is the middle person lives near baloch colony, he is responsilbe for delivering to these labours', 'donee', '1', 'Delivered', '2020-03-28', 'Completed', NULL, 1),
(97, 1000097, 1, 'Ration', '1', 'Sameer', 'Asad Noor ---03343951710 is the middle person lives near baloch colony, he is responsilbe for delivering to these labours', 'donee', '1', 'Delivered', '2020-03-28', 'Completed', NULL, 1),
(98, 1000098, 1, 'Ration', '1', 'Sameer', 'Asad Noor ---03343951710 is the middle person lives near baloch colony, he is responsilbe for delivering to these labours', 'donee', '1', 'Delivered', '2020-03-28', 'Completed', NULL, 1),
(99, 1000099, 1, 'Ration', '1', 'Sameer', 'Asad Noor ---03343951710 is the middle person lives near baloch colony, he is responsilbe for delivering to these labours', 'donee', '1', 'Delivered', '2020-03-28', 'Completed', NULL, 1),
(100, 1000100, 1, 'Ration', '1', 'Sameer', 'Asad Noor ---03343951710 is the middle person lives near baloch colony, he is responsilbe for delivering to these labours', 'donee', '1', 'Delivered', '2020-03-28', 'Completed', NULL, 1),
(101, 1000101, 1, 'Ration', '1', 'Sameer', 'Asad Noor ---03343951710 is the middle person lives near baloch colony, he is responsilbe for delivering to these labours', 'donee', '1', 'Delivered', '2020-03-28', 'Completed', NULL, 1),
(102, 1000102, 1, 'Ration', '1', 'Sameer', 'Asad Noor ---03343951710 is the middle person lives near baloch colony, he is responsilbe for delivering to these labours', 'donee', '1', 'Delivered', '2020-03-28', 'Completed', NULL, 1),
(103, 1000103, 1, 'Ration', '2', 'Umer Saleem', 'Headcount ---10 ---2 bags ----Reference Zainab FB ', 'donee', '8', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(104, 1000104, 1, 'Ration', '1', 'Daniyal', '', 'donee', '10', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(105, 1000105, 1, 'Ration', '1', 'Daniyal', '', 'donee', '10', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(106, 1000106, 1, 'Ration', '1', 'Azher', 'Referred by Donor', 'donee', '10', 'Delivered', '2020-03-31', 'Completed', NULL, 2),
(107, 1000107, 1, 'Ration', '1', 'Umer Saleem', '5 family members \nThis contact number is of Zahida --maid---reference Jawad FB ', 'donee', '10', 'Delivered', '2020-04-03', 'Completed', NULL, 2),
(108, 1000108, 1, 'Ration', '1', 'Azher', 'Referred by Donor', 'donee', '10', 'Delivered', '2020-03-31', 'Completed', NULL, 2),
(109, 1000109, 1, 'Ration', '1', 'Azher', 'Referred by Donor', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(110, 1000110, 1, 'Ration', '2', 'Sameer', 'Rikshaw driver - referred by relative', 'donee', '10', 'Delivered', '2020-03-31', 'Completed', NULL, 2),
(111, 1000111, 1, 'Ration', '2', 'Ammad', 'Thally Wala', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(112, 1000112, 1, 'Ration', '0', 'Azher', 'Referred by Donor', 'donee', '', 'Invalid', '2020-03-29', '', NULL, 2),
(113, 1000113, 1, 'Ration', '0', 'Azher', 'Rickshaw Driver', 'donee', '10', 'Invalid', '2020-03-30', '', NULL, 2),
(114, 1000114, 1, 'Ration', '2', 'Sameer', 'Rickshaw driver - referred by relative', 'donee', '10', 'Delivered', '2020-03-31', 'Completed', NULL, 2),
(115, 1000115, 1, 'Ration', '1', 'Azher', 'Rex Center Worker', 'donee', '', 'Pending', '2020-04-03', '', NULL, 2),
(116, 1000116, 1, 'Ration', '15', 'Azher', 'Representative', 'representative', '10', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(117, 1000117, 1, 'Ration', '15', 'Azher', 'Representative', 'representative', '2', 'Delivered', '2020-03-28', 'Completed', NULL, 2),
(118, 1000118, 1, 'Ration', '6', 'Azher', 'Representative', 'representative', '9', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(119, 1000119, 1, 'Ration', '20', 'Umer Saleem', 'Representative of Fawad Referral of Umer Saleem\nWe will drop the packets in masjid with Yonus and he will systematically distribute and will collect the details ', 'donee', '2', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(120, 1000120, 1, 'Ration', '2', 'Umer Saleem', '6 persons ', 'donee', '2', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(121, 1000121, 1, 'Ration', '2', 'Sameer', 'painter, reffered by close friend', 'donee', '1', 'Delivered', '2020-03-28', 'Completed', NULL, 1),
(122, 1000122, 1, 'Ration', '1', 'Daniyal', 'Rikshaw driver - referred by relative', 'donee', '2', 'Delivered', '2020-03-28', 'Completed', NULL, 2),
(123, 1000123, 1, 'Ration', '1', 'Daniyal', 'Uber driver', 'donee', '', 'Pending', '2020-04-03', '', NULL, 2),
(124, 1000124, 1, 'Ration', '1', 'Daniyal', 'widow, no source of income', 'donee', '10', 'Delivered', '2020-03-31', 'Completed', NULL, 2),
(125, 1000125, 1, 'Ration', '1', 'Daniyal', 'Tailor, out of work', 'donee', '5', 'Delivered', '2020-03-29', 'Completed', NULL, 5),
(126, 1000126, 1, 'Ration', '1', 'Daniyal', 'Daily wage family from interior sindh, residing in a rented house, know them personally, 2 males run the house, currently one is job less, other is work on wage as a supervisor in construction company', 'donee', '5', 'Delivered', '2020-03-29', 'Completed', NULL, 5),
(127, 1000127, 1, 'Ration', '1', 'Daniyal', 'Daily wage family from interior sindh, residing in a rented house, know them personally, 2 males run the house, currently one is job less, other is work on wage as a supervisor in construction company', 'donee', '5', 'Delivered', '2020-03-29', 'Completed', NULL, 5),
(128, 1000128, 1, 'Ration', '1', 'Daniyal', 'Daily wage family from interior sindh, residing in a rented house, know them personally, 2 males run the house, currently one is job less, other is work on wage as a supervisor in construction company', 'donee', '5', 'Delivered', '2020-03-29', 'Completed', NULL, 5),
(129, 1000129, 1, 'Ration', '2', 'Daniyal', 'details will be provided shortly. A retired gaurd of a school asked for assistance', 'donee', '5', 'Delivered', '2020-03-29', 'Completed', NULL, 5),
(130, 1000130, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-29', 'Completed', NULL, 5),
(131, 1000131, 1, 'Ration', '1', 'Umer Saleem', 'Cal that guy and ask for family headcount, decide number of bags accordingly ---reference Asma Kausar FB ', 'donee', '5', 'Pending ', '2020-04-03', '', NULL, 5),
(132, 1000132, 1, 'Ration', '0', 'Umer Saleem', 'Refernece Hasseb GYM', 'donee', '10', 'No Response', '2020-03-30', '', NULL, 2),
(133, 1000133, 1, 'Ration', '1', 'Umer Saleem', 'Refernece Hasseb GYM', 'donee', '10', 'Pending ', '2020-04-03', '', NULL, 2),
(134, 1000134, 1, 'Ration', '0', 'Ammad Asim', 'Kid cleans cars', 'donee', '', 'No Response', '2020-03-30', '', NULL, 2),
(135, 1000135, 1, 'Ration', '2', 'Umer Saleem', 'Headcount: 11 ', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(136, 1000136, 1, 'Ration', '1', 'Umer Saleem', 'Heâ€™s a rickshw driver he needs help for his family. no idea on the number of headcount in family', 'donee', '2', 'Already Received', '2020-03-29', '', NULL, 2),
(137, 1000137, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(138, 1000138, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(139, 1000139, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(140, 1000140, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(141, 1000141, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(142, 1000142, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(143, 1000143, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(144, 1000144, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(145, 1000145, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(146, 1000146, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(147, 1000147, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(148, 1000148, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(149, 1000149, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(150, 1000150, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(151, 1000151, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(152, 1000152, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(153, 1000153, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(154, 1000154, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(155, 1000155, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(156, 1000156, 1, 'Ration', '1', 'Azher', 'Bilal is the representative referred by Umer Aurangzaib', 'donee', '11', 'Delivered', '2020-03-26', 'Completed', NULL, 2),
(157, 1000157, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(158, 1000158, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(159, 1000159, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(160, 1000160, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(161, 1000161, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(162, 1000162, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(163, 1000163, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(164, 1000164, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(165, 1000165, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(166, 1000166, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(167, 1000167, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(168, 1000168, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(169, 1000169, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(170, 1000170, 1, 'Ration', '1', 'Azher', 'Representative', 'donee', '7', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(171, 1000171, 1, 'Ration', '2', 'Daniyal', '50 Bags arranged from Saad Bhai (Referral of Umer Saleem) and donated to representative to distribute in Kachi Abadi of Jouhar Area - Case Handlers - Umer Saleem & Daniyal Zafar\n\nReference Murad Ali for all the below mentioned 48 cases ', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(172, 1000172, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(173, 1000173, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(174, 1000174, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(175, 1000175, 1, 'Ration', '2', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(176, 1000176, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(177, 1000177, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(178, 1000178, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(179, 1000179, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(180, 1000180, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(181, 1000181, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(182, 1000182, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(183, 1000183, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(184, 1000184, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(185, 1000185, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(186, 1000186, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(187, 1000187, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(188, 1000188, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(189, 1000189, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(190, 1000190, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(191, 1000191, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(192, 1000192, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(193, 1000193, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(194, 1000194, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(195, 1000195, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(196, 1000196, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(197, 1000197, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(198, 1000198, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(199, 1000199, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(200, 1000200, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(201, 1000201, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(202, 1000202, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(203, 1000203, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(204, 1000204, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(205, 1000205, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(206, 1000206, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(207, 1000207, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(208, 1000208, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(209, 1000209, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(210, 1000210, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(211, 1000211, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(212, 1000212, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(213, 1000213, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(214, 1000214, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(215, 1000215, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(216, 1000216, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(217, 1000217, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(218, 1000218, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(219, 1000219, 1, 'Ration', '1', 'Daniyal', '', 'donee', '', 'Delivered', '2020-03-27', 'Completed', NULL, 2),
(220, 1000220, 1, 'Ration', '2', 'Sameer', 'Representative of Sameer', 'donee', '10', 'Delivered', '2020-03-30', 'Completed', NULL, 2),
(221, 1000221, 1, 'Ration', '1', 'Umer Saleem', '3 Kids + 2 husband wife + 1 Saas = 6 ', 'donee', '10', 'Pending', '2020-04-03', '', NULL, 2),
(222, 1000222, 1, 'Ration', '2', 'Umer Saleem', 'widow and her children, total 13 people ', 'donee', '10', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(223, 1000223, 1, 'Ration', '0', 'Umer Saleem', '', 'donee', '', 'No Response', '2020-03-31', '', NULL, 2),
(224, 1000224, 1, 'Ration', '3', 'Azher', 'Widow. Don\'t have ration due to lock down situation', 'donee', '2', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(225, 1000225, 1, 'Ration', '1', 'Umer Saleem', 'Reffered by Fawad bhai ', 'donee', '', 'Pending ', '2020-04-03', '', NULL, 2),
(226, 1000226, 1, 'Ration', '2', 'Umer Saleem', 'Reffered by Fawad bhai ---Osama is our POC. He will deliver the ration bags to Anwer and rizwan--rickshaw walay safaid posh log. direct ja kar khud dayna munasib nahi. Route through Osama', 'donee', '', 'Pending ', '2020-04-03', '', NULL, 2),
(227, 1000227, 1, 'Ration', '2', 'Umer Saleem', 'Reffered by Fawad bhai ---Osama is our POC. He will deliver the ration bags to Anwer and rizwan--rickshaw walay safaid posh log. direct ja kar khud dayna munasib nahi. Route through Osama', 'donee', '', 'Pending ', '2020-04-03', '', NULL, 2),
(228, 1000228, 1, 'Ration', '3', 'Umer Saleem', 'Reffered by Fawad bhai ', 'donee', '', 'Pending ', '2020-04-03', '', NULL, 2),
(229, 1000229, 1, 'Ration', '2', 'Umer Saleem', 'Reffered by Mahnoor ', 'donee', '1', 'Delivered', '2020-04-03', '', NULL, 1),
(230, 1000230, 1, 'Ration', '1', 'Arsalan', 'Jobless person - regularly helped by Arsalan', 'donee', '8', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(231, 1000231, 1, 'Ration', '1', 'Arsalan', 'Representative of Arsalan - Will give to maid', 'donee', '8', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(232, 1000232, 1, 'Ration', '1', 'Arsalan', 'Ladies Taylor - referred by Arsalan', 'donee', '8', 'Delivered', '2020-03-29', 'Completed', NULL, 2),
(233, 1000233, 1, 'Ration', '36', 'Azher', 'Personal Representative - Picked by Nawaz (Shahzore Driver)', 'representative', '10', 'Delivered', '2020-03-30', 'Completed', NULL, 2),
(234, 1000234, 1, 'Ration', '1', 'Azher', 'Road pe ro raha tha.. Majboori ho k dedia... Kuch bhi nahi tha...', 'donee', '2', 'Delivered', '2020-03-30', 'Completed', NULL, 2),
(235, 1000235, 1, 'Ration', '10', 'Azher', 'Personal Representative', 'representative', '6', 'Delivered', '2020-03-30', 'Completed', NULL, 6),
(236, 1000236, 1, 'Ration', '1', 'Sameer', 'Refered by donor', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(237, 1000237, 1, 'Ration', '1', 'Sameer', 'Refered by donor', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(238, 1000238, 1, 'Ration', '1', 'Sameer', 'Refered by donor', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(239, 1000239, 1, 'Ration', '1', 'Sameer', 'Refered by relative - she will provide to a family in need, the needy family lives near by on rent', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(240, 1000240, 1, 'Ration', '1', 'Sameer', '', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(241, 1000241, 1, 'Ration', '1', 'Sameer', '', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(242, 1000242, 1, 'Ration', '1', 'Sameer', 'Refered by relative, local area daily wage labour', 'donee', '1', 'Delivered', '2020-03-30', 'Completed', NULL, 1),
(243, 1000243, 1, 'Ration', '1', 'Sameer', 'Refered by relative, local area daily wage labour', 'donee', '1', 'Delivered', '2020-03-30', 'Completed', NULL, 1),
(244, 1000244, 1, 'Ration', '4', 'Azher', 'Adjustment of bag given to Abdullah for 27th March - Afroz covered two cases from 27th.', 'representative', '9', 'Delivered', '2020-03-30', 'Completed', NULL, 2),
(245, 1000245, 1, 'Ration', '2', 'Ammad', 'Rickshaw Driver with minimal to no earnings due to lockdown - Shehzad will deliver - Personal representative of Ammad', 'donee', '6', 'Delivered', '2020-03-30', 'Completed', NULL, 6),
(246, 1000246, 1, 'Ration', '30', 'Azher', 'Personal Representative', 'representative', '10', 'Delivered', '2020-03-31', 'Completed', NULL, 2),
(247, 1000247, 1, 'Ration', '5', 'Azher', 'Personal reference of Omer Khan', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(248, 1000248, 1, 'Ration', '1', 'Azher', 'Referred by Azher\'s Team Lead', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(249, 1000249, 1, 'Ration', '1', 'Azher', 'Referred by Azher\'s Team Lead', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(250, 1000250, 1, 'Ration', '2', 'Sameer', 'Referred by donee at doorstep', 'donee', '1', 'Delivered', '2020-03-31', 'Completed', NULL, 1),
(251, 1000251, 1, 'Ration', '1', 'Daniyal (Nabeel qureshi)', 'Reference : Nabeel qureshi', 'donee', '5', 'Delivered', '2020-04-03', 'Completed', NULL, 5),
(252, 1000252, 1, 'Ration', '1', 'Daniyal', 'Reference : Imran Rehan ', 'donee', '5', 'Delivered', '2020-04-03', 'Completed', NULL, 5),
(253, 1000253, 1, 'Ration', '2', 'Sameer', 'Referred by friend - Humayo', 'donee', '1', 'Delivered', '2020-04-04', 'Completed', NULL, 1),
(254, 1000254, 1, 'Ration', '1', 'Sameer', 'Referred by friend - Humayo', 'donee', '1', 'Delivered', '2020-04-04', 'Completed', NULL, 1),
(255, 1000255, 1, 'Ration', '1', 'Sameer', 'Referred by donee', 'donee', '1', 'Delivered', '2020-04-12', NULL, NULL, 1),
(256, 1000256, 1, 'Ration', '1', 'Sameer', 'Referred by friend - Humayo', 'donee', '1', 'Delivered', '2020-04-11', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donors`
--

CREATE TABLE `tbl_donors` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `donation_type` varchar(55) NOT NULL DEFAULT 'Donation' COMMENT 'donation,sadqah,zakat',
  `donation_mode` varchar(55) NOT NULL DEFAULT 'Bank Transfer' COMMENT 'cash,bank transfer,self managed',
  `donation_amount` float NOT NULL,
  `bank` varchar(55) DEFAULT NULL,
  `account` varchar(55) DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT 'amount handler (member id)',
  `record_inserted_by` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donors`
--

INSERT INTO `tbl_donors` (`id`, `organization_id`, `name`, `contact_number`, `donation_type`, `donation_mode`, `donation_amount`, `bank`, `account`, `user_id`, `record_inserted_by`, `date`) VALUES
(1, 1, 'Ammar Siddiqui', '', '', 'Bank Transfer', 500, '', '', 2, 2, '2020-03-21 19:00:00'),
(2, 1, 'unknown', '', '', 'Bank Transfer', 3000, '', '', 2, 2, '2020-03-21 19:00:00'),
(3, 1, 'Sameer Khan', '', 'Donation', 'Cash', 13000, '', '', 1, 1, '2020-03-21 19:00:00'),
(4, 1, 'Azher Sharif', '', '', 'Bank Transfer', 12000, '', '', 2, 2, '2020-03-21 19:00:00'),
(5, 1, 'Sameer Khan', '', 'Donation', 'Cash', 10000, '', '', 1, 1, '2020-03-22 19:00:00'),
(6, 1, 'Daniyal Anwar', '', 'Donation', 'Bank Transfer', 2500, '', '', 1, 1, '2020-03-22 19:00:00'),
(7, 1, 'Sadia Jehanzeb', '', 'Donation', 'Bank Transfer', 5200, '', '', 2, 2, '2020-03-22 19:00:00'),
(8, 1, 'Umer Saleem', '', 'Donation', 'Self Managed', 70000, '', '', 4, 2, '2020-03-22 19:00:00'),
(9, 1, 'Mohammad Umair', '', 'Donation', 'Bank Transfer', 30000, '', '', 2, 2, '2020-03-22 19:00:00'),
(10, 1, 'S.A.Talha', '', 'Donation', 'Cash', 4800, '', '', 3, 2, '2020-03-23 19:00:00'),
(11, 1, 'unknown', '', 'Donation', 'Cash', 3000, '', '', 3, 2, '2020-03-23 19:00:00'),
(12, 1, 'Umer Saleem', '', 'Donation', 'Self Managed', 50000, '', '', 4, 2, '2020-03-24 19:00:00'),
(13, 1, 'Talha Ghaffar', '', 'Donation', 'Bank Transfer', 2600, '', '', 2, 2, '2020-03-24 19:00:00'),
(14, 1, 'Azher Sharif', '', 'Donation', 'Bank Transfer', 1000, '', '', 2, 2, '2020-03-24 19:00:00'),
(15, 1, 'Jamshed', '', 'Donation', 'Bank Transfer', 15000, '', '', 1, 1, '2020-03-24 19:00:00'),
(16, 1, 'Rafay', '', 'Donation', 'Cash', 6000, '', '', 1, 1, '2020-03-24 19:00:00'),
(17, 1, 'Ahmed Waqar', '', 'Donation', 'Bank Transfer', 15000, '', '', 2, 2, '2020-03-24 19:00:00'),
(18, 1, 'Umer Saleem', '', 'Donation', 'Bank Transfer', 11610, '', '', 4, 2, '2020-03-24 19:00:00'),
(19, 1, 'Sameed', '', 'Donation', 'Bank Transfer', 2600, '', '', 2, 2, '2020-03-25 19:00:00'),
(20, 1, 'Ammad Asim', '', 'Donation', 'Self Managed', 8000, '', '', 2, 2, '2020-03-25 19:00:00'),
(21, 1, 'Usman Siddiqui', '', 'Donation', 'Bank Transfer', 1500, '', '', 2, 2, '2020-03-25 19:00:00'),
(22, 1, 'Azher Sharif', '', 'Donation', 'Self Managed', 2000, 'Meezan Bank', '', 2, 2, '2020-03-25 19:00:00'),
(23, 1, 'Ammad Asim', '', 'Donation', 'Self Managed', 17200, '', '', 6, 2, '2020-03-25 19:00:00'),
(24, 1, 'Asma Hassan', '', 'Donation', 'Bank Transfer', 1000, 'SCB', '', 2, 2, '2020-03-26 19:00:00'),
(25, 1, 'Azher Sharif', '', 'Donation', 'Bank Transfer', 8000, '', '', 2, 2, '2020-03-26 19:00:00'),
(26, 1, 'Ammad Asim', '', 'Donation', 'Self Managed', 28100, '', '', 6, 1, '2020-03-26 19:00:00'),
(27, 1, 'Jawed', NULL, 'Donation', 'Bank Transfer', 10000, NULL, NULL, 1, 1, '2020-03-24 19:00:00'),
(28, 1, 'Umer Saleem', '', 'Donation', 'Self Managed', 153600, '', NULL, 4, 1, '2020-03-28 19:00:00'),
(29, 1, 'Azher Sharif', '', 'Donation', 'Bank Transfer', 14770, '', NULL, 2, 1, '2020-03-28 19:00:00'),
(30, 1, 'Akber Sheikh', '', 'Donation', 'Bank Transfer', 4000, 'Meezan Bank', NULL, 1, 1, '2020-03-30 13:54:06'),
(31, 1, 'Azher Sharif', '', 'Donation', 'Self Managed', 19100, '', NULL, 2, 1, '2020-03-31 20:06:05'),
(32, 1, 'Ammad Asim', '', 'Donation', 'Self Managed', 10000, '', NULL, 2, 1, '2020-03-31 20:06:54'),
(33, 1, 'Azher Sharif', '', 'Donation', 'Self Managed', 2600, '', NULL, 2, 1, '2020-03-31 20:07:41'),
(35, 2, 'Aqsa Sameer', '', 'Donation', 'Bank Transfer', 15000, '', NULL, 13, 13, '2020-04-04 14:18:42'),
(36, 2, 'Shahid', '', 'Donation', 'Bank Transfer', 8000, '', NULL, 15, 15, '2020-04-04 14:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization`
--

CREATE TABLE `tbl_organization` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `number` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_organization`
--

INSERT INTO `tbl_organization` (`id`, `name`, `number`, `email`, `address`, `date`) VALUES
(1, 'Empower Humanity', '', '', '', '2020-04-02 20:39:42'),
(2, 'Save People', '3452289340', 'people@gmail.com', 'member\'s homes', '2020-04-04 14:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ration`
--

CREATE TABLE `tbl_ration` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `total_bags` int(11) NOT NULL,
  `advance` float DEFAULT 0,
  `balance` float DEFAULT 0,
  `total_cost` float DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `status` varchar(55) NOT NULL COMMENT 'pending, received',
  `record_inserted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ration`
--

INSERT INTO `tbl_ration` (`id`, `organization_id`, `total_bags`, `advance`, `balance`, `total_cost`, `remarks`, `order_date`, `delivery_date`, `status`, `record_inserted_by`) VALUES
(1, 1, 30, 41610, 0, 41610, NULL, '2020-03-23', '2020-03-23', 'received', 4),
(2, 1, 50, 25000, 42200, 67200, NULL, '2020-03-23', '2020-03-24', 'received', 1),
(3, 1, 50, 20000, 44600, 64600, NULL, '2020-03-25', '2020-03-26', 'received', 4),
(4, 1, 50, 20000, 44600, 64600, NULL, '2020-03-25', '2020-03-27', 'received', 4),
(9, 1, 2, 2870, 0, 2870, '2 Bags delivered in Malir through Usman Siddiqui. Cost was a bit high because purcahsed from same locality.', '2020-03-26', '2020-03-26', 'received', 2),
(10, 1, 1, 1500, 0, 1500, 'Abdul Ghafoor - Lyari Case - Easy Paisa', '2020-03-26', '2020-03-26', 'received', 2),
(11, 1, 100, 40000, 89800, 129800, '100 bags Advance payment and remaining paid today', '2020-03-26', '2020-03-28', 'received', 2),
(15, 1, 1, 1400, 0, 1400, 'Barbar case - Purchased ration from Nearby and handed over one pack to him.', '2020-03-28', '2020-03-28', 'received', 4),
(16, 1, 50, 14400, 52400, 66800, '50 bags advance for aata by Umer and 50 rations bag by Azher paid 32400 & 20000', '2020-03-27', '2020-03-29', 'received', 2),
(18, 1, 50, 60500, 0, 60500, 'Excluding Daal Masoor due to shortage', '2020-03-30', '2020-03-31', 'received', 1),
(19, 2, 25, 24000, 0, 24000, '', '2020-04-03', '2020-04-04', 'received', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(55) NOT NULL COMMENT 'admin,member,representative',
  `contact_number` varchar(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `retype_password` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `enrolled_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(55) NOT NULL COMMENT 'review, inactive, active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `organization_id`, `name`, `type`, `contact_number`, `email`, `password`, `retype_password`, `address`, `enrolled_date`, `status`) VALUES
(1, 1, 'Sameer Khan', 'admin', '03452289340', 'sameerkhan5130@gmail.com', 'c64a9829fa4638ff5de86330dd227e35', '5130', 'Saadi Town', '2020-03-22 19:00:00', 'active'),
(2, 1, 'Azher Sharif', 'admin', '03453086256', 'azher.sharif@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Defence Phase II', '2020-03-22 19:00:00', 'active'),
(3, 1, 'Syed Ahmed Talha', 'member', '03438036612', 'syedahmedtalha@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Kaneez Fatima', '2020-03-22 19:00:00', 'active'),
(4, 1, 'Umer Saleem', 'member', '03312496560', 'umersaleem@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Gulshan e Iqbal', '2020-03-23 19:00:00', 'active'),
(5, 1, 'Daniyal Zafar', 'member', '03317521478', 'daniyalzafar@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Sindhi Muslim', '2020-03-23 19:00:00', 'active'),
(6, 1, 'Ammad Asim', 'member', '', 'ammadasim@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Malir', '2020-03-26 19:00:00', 'active'),
(7, 1, 'Afroz', 'representative', '', 'afroz@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '', '2020-03-26 19:00:00', 'active'),
(8, 1, 'Arsalan', 'representative', '', 'arsalan@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '', '2020-03-26 19:00:00', 'active'),
(9, 1, 'Abdullah Jamal', 'representative', '', 'abdullah@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '', '2020-03-26 19:00:00', 'active'),
(10, 1, 'Umer Khan', 'representative', '', 'umerkhan@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '', '2020-03-26 19:00:00', 'active'),
(11, 1, 'Sadiq', 'representative', '', 'sadiq@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '', '2020-03-26 19:00:00', 'active'),
(12, 1, 'Bilal', 'representative', '03162083270', 'bilal@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 'Model Colony, Malir', '2020-04-02 19:30:26', 'active'),
(13, 2, 'Sameer', 'admin', '03452289340', 'sameer@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '', '2020-04-04 14:11:09', 'active'),
(15, 2, 'Azher', 'member', '123456789', 'azher@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '', '2020-04-04 14:18:05', 'active'),
(16, 2, 'Talha', 'representative', '', 'talha@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '', '2020-04-04 15:20:53', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_donees`
--
ALTER TABLE `tbl_donees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donees_distribution`
--
ALTER TABLE `tbl_donees_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donors`
--
ALTER TABLE `tbl_donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ration`
--
ALTER TABLE `tbl_ration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_donees`
--
ALTER TABLE `tbl_donees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000257;

--
-- AUTO_INCREMENT for table `tbl_donees_distribution`
--
ALTER TABLE `tbl_donees_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `tbl_donors`
--
ALTER TABLE `tbl_donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ration`
--
ALTER TABLE `tbl_ration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
