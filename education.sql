-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 02:50 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(7, 'admin@gmail.com', '1844156d4166d94387f1a4ad031ca5fa');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5d87979657506', '5d87979662598'),
('5d935032e71cb', '5d935033239c2'),
('5d9f27f0c7f7f', '5d9f27f0ea8b6'),
('5d9f27f117351', '5d9f27f121e4f'),
('5d9f27f1686e7', '5d9f27f18c16d'),
('5da06e7e73c44', '5da06e7e73d43'),
('5da06efa5f1cb', '5da06efa60920'),
('5da0728cb31ce', '5da0728cb33cd'),
('5da0728d86b6d', '5da0728d8f389'),
('5da0728ddde69', '5da0728de607e'),
('5da0d5a6acf5c', '5da0d5a6ad3d9'),
('5da0d89c995b4', '5da0d89cedf71'),
('5da0d89d50d9c', '5da0d89d6932c'),
('5da0d89d9cb7a', '5da0d89dac872'),
('5da0db3cd64a2', '5da0db3d5fc47'),
('5da0db3d97f8f', '5da0db3dbc038'),
('5da0db3de499a', '5da0db3e00487'),
('5da0db3e5fce9', '5da0db3e6aacd'),
('5da0db3e9b63e', '5da0db3ea41fd'),
('5da0e1fd1444d', '5da0e3777b4b0'),
('5da0e1fd94c3f', '5da0e377e4add'),
('5da0e1fddb4eb', '5da0e37854d2d'),
('5da0e1fe18976', '5da0e378abb0b'),
('5da0e1fe69edf', '5da0e3793f382'),
('5da0e1feafee0', '5da0e37985a37'),
('5da0e1ff10c32', '5da0e37a0f7fa'),
('5da0e1ff6256b', '5da0e37a803b4'),
('5da0e1ff9f335', '5da0e37b6b1ed'),
('5da0e1ffebdba', '5da0e37bac676'),
('5da4eaed07185', '5da6bf064be7f'),
('5da4eaee19114', '5da6bf06de8b0'),
('5da7839f80756', '5da7839fe1e58'),
('5da783a026691', '5da783a02c6c4'),
('5da0dcebd3109', '5dacbc0175577'),
('5da0dcec953aa', '5dacbc01cefd0'),
('5da0dced0d64b', '5dacbc022eb76'),
('5da0dced64381', '5dacbc0272a70');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('5584ddd0da0ab', 'netcamp', 'sunnygkp10@gmail.com', 'feedback', ';mLBLB', '2015-06-20', '05:28:16am'),
('558510a8a1234', 'sunnygkp10', 'sunnygkp10@gmail.com', 'dl;dsnklfn', 'fmdsfld fdj', '2015-06-20', '09:05:12am'),
('5585509097ae2', 'sunny', 'sunnygkp10@gmail.com', 'kcsncsk', 'l.mdsavn', '2015-06-20', '01:37:52pm');

-- --------------------------------------------------------

--
-- Table structure for table `freeairtime`
--

CREATE TABLE `freeairtime` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subid` varchar(15) NOT NULL,
  `time` varchar(20) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freeairtime`
--

INSERT INTO `freeairtime` (`firstname`, `lastname`, `email`, `subid`, `time`, `regdate`) VALUES
('Samuel', 'Omoniyi', 'samuelomoniyi@gmail.com', '5dacbc7786762', '09:58:47pm', '2019-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sn` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `legendquiz`
--

CREATE TABLE `legendquiz` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lid` varchar(20) NOT NULL,
  `time` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `sub1` varchar(50) NOT NULL,
  `sub2` varchar(50) NOT NULL,
  `sub3` varchar(50) NOT NULL,
  `sub4` varchar(50) NOT NULL,
  `reg_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `legendquiz`
--

INSERT INTO `legendquiz` (`firstname`, `lastname`, `email`, `lid`, `time`, `date`, `sub1`, `sub2`, `sub3`, `sub4`, `reg_status`) VALUES
('0', '0', '0', '5dab7d7d470dc', '0', '0000-00-00', '0', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5d87979657506', '03', '5d87979662592'),
('5d87979657506', '02', '5d87979662598'),
('5d87979657506', '05', '5d8797966259a'),
('5d87979657506', '06', '5d8797966259b'),
('5d935032e71cb', 'cup', '5d935033239b8'),
('5d935032e71cb', 'desktop', '5d935033239bf'),
('5d935032e71cb', 'puc', '5d935033239c1'),
('5d935032e71cb', 'cpu', '5d935033239c2'),
('5d9f27f0c7f7f', 'bible', '5d9f27f0ea8b6'),
('5d9f27f0c7f7f', 'none', '5d9f27f0ea8bc'),
('5d9f27f0c7f7f', 'bile', '5d9f27f0ea8bd'),
('5d9f27f0c7f7f', 'bielb', '5d9f27f0ea8bf'),
('5d9f27f117351', 'gne', '5d9f27f121e48'),
('5d9f27f117351', 'genesis', '5d9f27f121e4f'),
('5d9f27f117351', 'amos', '5d9f27f121e50'),
('5d9f27f117351', 'none', '5d9f27f121e51'),
('5d9f27f1686e7', 'bad man', '5d9f27f18c164'),
('5d9f27f1686e7', 'drunker', '5d9f27f18c16b'),
('5d9f27f1686e7', 'good man', '5d9f27f18c16c'),
('5d9f27f1686e7', 'messaiah', '5d9f27f18c16d'),
('5da06e7e73c44', 'ICICI Bank', '5da06e7e73d43'),
('5da06e7e73c44', 'Axis bank', '5da06e7e73d4d'),
('5da06e7e73c44', 'HDFC', '5da06e7e73d4e'),
('5da06e7e73c44', 'DSBC', '5da06e7e73d50'),
('5da06efa5f1cb', 'ICICI Bank', '5da06efa60920'),
('5da06efa5f1cb', 'Axis bank', '5da06efa60926'),
('5da06efa5f1cb', 'HDFC', '5da06efa60927'),
('5da06efa5f1cb', 'DSBC', '5da06efa60929'),
('5da0728cb31ce', 'ICICI Bank', '5da0728cb33cd'),
('5da0728cb31ce', 'Axis bank', '5da0728cb33d1'),
('5da0728cb31ce', 'HDFC', '5da0728cb33d2'),
('5da0728cb31ce', 'DSBC', '5da0728cb33d3'),
('5da0728d86b6d', 'Gulmarg', '5da0728d8f389'),
('5da0728d86b6d', 'Siachin', '5da0728d8f390'),
('5da0728d86b6d', 'Leh', '5da0728d8f391'),
('5da0728d86b6d', 'Manali', '5da0728d8f392'),
('5da0728ddde69', 'Dot per inch', '5da0728de6077'),
('5da0728ddde69', 'Dot per sq.inch', '5da0728de607e'),
('5da0728ddde69', 'Dots printed per unit time', '5da0728de607f'),
('5da0728ddde69', 'all of the above', '5da0728de6081'),
('5da0d5a6acf5c', 'An internet syp system capable of detecting malafide messages.', '5da0d5a6ad3d9'),
('5da0d5a6acf5c', 'an award winning feature film.', '5da0d5a6ad3df'),
('5da0d5a6acf5c', 'An NGO working for the welfare of visually handicapped.', '5da0d5a6ad3e0'),
('5da0d5a6acf5c', 'A SHG working in Andhra Pradesh for the welfare of street children', '5da0d5a6ad3e1'),
('5da0d89c995b4', '5', '5da0d89cedf6a'),
('5da0d89c995b4', '3', '5da0d89cedf71'),
('5da0d89c995b4', '4', '5da0d89cedf72'),
('5da0d89c995b4', '5', '5da0d89cedf73'),
('5da0d89d50d9c', '4', '5da0d89d69323'),
('5da0d89d50d9c', '6', '5da0d89d6932b'),
('5da0d89d50d9c', '1', '5da0d89d6932c'),
('5da0d89d50d9c', '0', '5da0d89d6932d'),
('5da0d89d9cb7a', '2', '5da0d89dac869'),
('5da0d89d9cb7a', '4', '5da0d89dac86f'),
('5da0d89d9cb7a', '45', '5da0d89dac870'),
('5da0d89d9cb7a', '0', '5da0d89dac872'),
('5da0db3cd64a2', 'windows', '5da0db3d5fc47'),
('5da0db3cd64a2', 'unix', '5da0db3d5fc4e'),
('5da0db3cd64a2', 'os/2', '5da0db3d5fc50'),
('5da0db3cd64a2', 'all of the above', '5da0db3d5fc51'),
('5da0db3d97f8f', 'Mosaic', '5da0db3dbc038'),
('5da0db3d97f8f', 'Netscape', '5da0db3dbc03e'),
('5da0db3d97f8f', 'internet explorer', '5da0db3dbc040'),
('5da0db3d97f8f', 'collabra', '5da0db3dbc041'),
('5da0db3de499a', 'algorithm', '5da0db3e00480'),
('5da0db3de499a', 'Input devices', '5da0db3e00487'),
('5da0db3de499a', 'Output devices', '5da0db3e00489'),
('5da0db3de499a', 'Portal', '5da0db3e0048a'),
('5da0db3e5fce9', 'Encrption Program', '5da0db3e6aac3'),
('5da0db3e5fce9', 'surge Protector', '5da0db3e6aaca'),
('5da0db3e5fce9', 'Firewall', '5da0db3e6aacb'),
('5da0db3e5fce9', 'UPS', '5da0db3e6aacd'),
('5da0db3e9b63e', 'steel', '5da0db3ea41f6'),
('5da0db3e9b63e', 'optical', '5da0db3ea41fc'),
('5da0db3e9b63e', 'flash', '5da0db3ea41fd'),
('5da0db3e9b63e', 'magnetic', '5da0db3ea41ff'),
('5da0e1fd1444d', 'Arithmetic logic unit', '5da0e3777b4b0'),
('5da0e1fd1444d', 'Array logic unit', '5da0e3777b4b6'),
('5da0e1fd1444d', 'Application logic unit', '5da0e3777b4b8'),
('5da0e1fd1444d', 'None of above', '5da0e3777b4b9'),
('5da0e1fd94c3f', 'Compactable read only memory', '5da0e377e4ad3'),
('5da0e1fd94c3f', 'Compact data read only memory', '5da0e377e4ada'),
('5da0e1fd94c3f', 'Compactable disk read only memory', '5da0e377e4adb'),
('5da0e1fd94c3f', 'Compact disk read only memory', '5da0e377e4add'),
('5da0e1fddb4eb', 'Video graphics array', '5da0e37854d24'),
('5da0e1fddb4eb', 'Visual graphic array', '5da0e37854d2a'),
('5da0e1fddb4eb', 'Volatile graphics array', '5da0e37854d2c'),
('5da0e1fddb4eb', 'Video graphics adapter', '5da0e37854d2d'),
('5da0e1fe18976', ' Wap AreaNetwork', '5da0e378abb04'),
('5da0e1fe18976', 'Wide Area Network', '5da0e378abb0b'),
('5da0e1fe18976', 'Wide Array Net', '5da0e378abb0c'),
('5da0e1fe18976', 'Wireless Area Network', '5da0e378abb0e'),
('5da0e1fe69edf', 'Computer Aided Design', '5da0e3793f382'),
('5da0e1fe69edf', 'Computer Algorithm for Design', '5da0e3793f389'),
('5da0e1fe69edf', 'Computer Application in Design', '5da0e3793f38a'),
('5da0e1fe69edf', 'Computer Analogue Design', '5da0e3793f38b'),
('5da0e1feafee0', 'Allen Turing', '5da0e37985a30'),
('5da0e1feafee0', 'Charles Babbage', '5da0e37985a37'),
('5da0e1feafee0', 'Simur City', '5da0e37985a38'),
('5da0e1feafee0', 'Augusta Adaming', '5da0e37985a39'),
('5da0e1ff10c32', 'User interface', '5da0e37a0f7fa'),
('5da0e1ff10c32', 'Language translator', '5da0e37a0f803'),
('5da0e1ff10c32', 'Platform', '5da0e37a0f804'),
('5da0e1ff10c32', 'Screen saver', '5da0e37a0f805'),
('5da0e1ff6256b', 'Assembly language', '5da0e37a803ae'),
('5da0e1ff6256b', ' Machine language', '5da0e37a803b4'),
('5da0e1ff6256b', ' Source code', '5da0e37a803b6'),
('5da0e1ff6256b', 'Object code', '5da0e37a803b7'),
('5da0e1ff9f335', 'File translation ', '5da0e37b6b1e5'),
('5da0e1ff9f335', 'Format translation', '5da0e37b6b1ec'),
('5da0e1ff9f335', 'Formula translation', '5da0e37b6b1ed'),
('5da0e1ff9f335', 'Floppy translation', '5da0e37b6b1ee'),
('5da0e1ffebdba', 'Homepage', '5da0e37bac676'),
('5da0e1ffebdba', 'Index', '5da0e37bac67d'),
('5da0e1ffebdba', 'JAVA script', '5da0e37bac67f'),
('5da0e1ffebdba', 'Bookmark', '5da0e37bac680'),
('5da4eaed07185', 'h', '5da6bf064be77'),
('5da4eaed07185', 'a', '5da6bf064be7f'),
('5da4eaed07185', 'd', '5da6bf064be80'),
('5da4eaed07185', 'gh', '5da6bf064be81'),
('5da4eaee19114', 'k', '5da6bf06de8a8'),
('5da4eaee19114', 'h', '5da6bf06de8af'),
('5da4eaee19114', 'm', '5da6bf06de8b0'),
('5da4eaee19114', 'h', '5da6bf06de8b2'),
('5da7839f80756', 's', '5da7839fe1e58'),
('5da7839f80756', 'g', '5da7839fe1e5f'),
('5da7839f80756', 'gj', '5da7839fe1e60'),
('5da7839f80756', '\'lfd', '5da7839fe1e61'),
('5da783a026691', 'sdf', '5da783a02c6bd'),
('5da783a026691', 'g\'jk', '5da783a02c6c4'),
('5da783a026691', 'df', '5da783a02c6c5'),
('5da783a026691', 's', '5da783a02c6c6'),
('5da0dcebd3109', 'screen', '5dacbc017556f'),
('5da0dcebd3109', 'monitor', '5dacbc0175576'),
('5da0dcebd3109', 'both 2', '5dacbc0175577'),
('5da0dcebd3109', 'printer', '5dacbc0175578'),
('5da0dcec953aa', 'random origin money', '5dacbc01cefc7'),
('5da0dcec953aa', 'Random only memory', '5dacbc01cefce'),
('5da0dcec953aa', 'read only memory', '5dacbc01cefcf'),
('5da0dcec953aa', 'random access memory', '5dacbc01cefd0'),
('5da0dced0d64b', 'Babbbage', '5dacbc022eb70'),
('5da0dced0d64b', 'bill gates', '5dacbc022eb76'),
('5da0dced0d64b', 'bill clinton', '5dacbc022eb77'),
('5da0dced0d64b', 'none of these', '5dacbc022eb78'),
('5da0dced64381', 'first generation', '5dacbc0272a70'),
('5da0dced64381', 'second generation', '5dacbc0272a77'),
('5da0dced64381', 'third generation', '5dacbc0272a78'),
('5da0dced64381', 'fourth generation', '5dacbc0272a79');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(10) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_body` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_body`, `post_date`) VALUES
(3, 'Africa Is Leapfrogging Into Digital Agricultures', 'Africansin', '2019-10-15 22:18:23'),
(9, 'Seeking A Programme Officer', 'Officers', '2019-10-15 22:23:30'),
(10, 'Omoluabi, Traditional Yoruba Value: Implications For Corpers Serving In The State Of Osun', 'Center For Rural Affairs And Community Development (ceracode) Is A Private, Non-profit And Non-governmental Organization Based In Iba, Osun State, Nigeria. Ceracode, A Duly Registered Ngo Formed In 2017 In Response To The Yearnings Of Rural Communities Fo', '2019-10-15 22:19:52'),
(11, '2nd Annual International Small Town And Rural Development Conference (stardec-2019)', 'Conference', '2019-10-15 22:20:40'),
(12, 'Medical Anthropologist Recommends Rural Mobile Health Clinics (rmhc) For Osun State', 'Medical', '2019-10-15 22:20:01'),
(13, '1st Annual International Small Town And Rural Development Conference (stardec-2018)', 'Conference', '2019-10-15 22:20:52'),
(14, 'Benefits Of Community Service For You', 'Benefits', '2019-10-15 22:20:13'),
(15, 'International Association For Community Development (iacd)', 'Iacd', '2019-10-15 22:21:00'),
(18, 'Center For Rural Affairs And Community Development Conference Transcript', 'The Conference Which Took Place On 6th Of August 2019 Started With The National Anthem Followed By The Omoluwabi Anthem; Of Which The Conference Was Anchored By Mr. Oluwaseun Owojori.\r\n	At First, He Introduced The Distinguished Persons On The High Table Which Include: Hrm (prof.) Adekunle Okunoye, Prof.  Yakubu Ochefu, Dr. Oluwatope Ayodeji Who Represented Prof. Aderonmu, Hrm Oba Joseph Adebayo Adewole (owa-ajero Of Ijero Kingdom), Hrm Oba Adedokun Abo-larin (orangun Of Oke-ila), Prof. Tunji Olaopa, Dr. Charles Akinla (chief Of Staff, State Of Osun Who Represented The State Governor State Of Osun), Prof. Kolawole Adebayo. \r\nThereafter The Welcome Speech Was Delivered By Hrm Oba (prof.) Adekunle Okunoye. In His Speech, He Appreciated And Recognized The Presence Of Everybody That Was Seated During The Conference; He Also Unearthed The Theme Of The Conference Termed Â€ï¿½rural Areas And Community Development In Digital Eraâ€. In Addition, He Unveiled The Mission, Vision, Value Statement And Some Of The Accomplishment Of The Organization Since Its Establishment.\r\nFurthermore, The State Coordinator Of Nysc Was Summoned To Deliver His Good Will Message, Where He Pointed Out That The Reason Nysc Partners With The Organization (ceracode) Is That Part Of The Cardinal Programme Of Nysc Is Community Development Services (cds), He Assured Kabiyesi That Their Partnership Will Continue And Lastly, He Presented A Gift To Kabiyesi.\r\nThe Provost College Of Education, Ilesha Who Was Represented By Dr. Omotayo, On His Goodwill Message Appreciated Kabiyesi For His Initiative And Wished The Organization A Glorious Future.\r\nThe Chief Of Staff (dr. Charles Akinla) Who Represented The State Governor, State Of Osun Gave His Good Will Message; He Started By Recognizing The Presence Of The Dignified Persons On The High Table, Also The Kings That Were Not On The High Table Which Include: Oba (dr.) Adebisi Ayoola Raji (olukitibi Of Kitibi), Oba (dr.) Taiwo Adesiji Ayeni (owalya Of Kajola-ikotuo), Oba Salahudans Ajiboye (atapara Of Iyaku) And The Entire Audience. In His Message, He Emphasized On How Agriculture Has Been A Means Of Strengthening Rural Development. \r\n', '2019-10-15 22:20:28'),
(19, 'Sfd', 'Sfd', '2019-10-15 22:15:39'),
(22, 'Not now', 'Yes Not now', '2019-10-20 11:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `profquiz`
--

CREATE TABLE `profquiz` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `time` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `sub1` varchar(50) NOT NULL,
  `sub2` varchar(50) NOT NULL,
  `sub3` varchar(50) NOT NULL,
  `sub4` varchar(50) NOT NULL,
  `reg_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profquiz`
--

INSERT INTO `profquiz` (`firstname`, `lastname`, `email`, `pid`, `time`, `date`, `sub1`, `sub2`, `sub3`, `sub4`, `reg_status`) VALUES
('0', '0', '0', '5dab7cb4ee29f', '0', '0000-00-00', '0', '0', '0', '0', 0),
('0', '0', '0', '5dab7cfe3240d', '0', '0000-00-00', '0', '0', '0', '0', 0),
('0', '0', '0', '5dab7d021510c', '0', '0000-00-00', '0', '0', '0', '0', 0),
('0', '0', '0', '5dab7d0586c20', '0', '0000-00-00', '0', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5da06d7bd4219', '5da0728d86b6d', 'High altitude warfare school of the indian army is located at', 4, 2),
('5da06d7bd4219', '5da0728ddde69', 'The output quality of a printer is measured by', 4, 3),
('5da0d8086acd2', '5da0d89c995b4', '4+4-5', 4, 1),
('5da0d8086acd2', '5da0d89d50d9c', 'sin90', 4, 2),
('5da0d8086acd2', '5da0d89d9cb7a', 'cos90', 4, 3),
('5da0d9d8d85d1', '5da0db3cd64a2', 'which of the following is an/are operating systems', 4, 1),
('5da0d9d8d85d1', '5da0db3d97f8f', 'the first web browser is ', 4, 2),
('5da0d9d8d85d1', '5da0db3de499a', 'light pen and joystick are', 4, 3),
('5da0d9d8d85d1', '5da0db3e5fce9', 'To prevent the loss of data during power failure, use a(an)', 4, 4),
('5da0d9d8d85d1', '5da0db3e9b63e', 'The most common type of storage devices are', 4, 5),
('5da0df9440b66', '5da0e1fd1444d', 'ALU is', 4, 1),
('5da0df9440b66', '5da0e1fd94c3f', 'CD-ROM stands for', 4, 2),
('5da0df9440b66', '5da0e1fddb4eb', 'VGA is', 4, 3),
('5da0df9440b66', '5da0e1fe18976', 'WAN stands for', 4, 4),
('5da0df9440b66', '5da0e1fe69edf', 'CAD stands for', 4, 5),
('5da0df9440b66', '5da0e1feafee0', 'Who is the father of computer', 4, 6),
('5da0df9440b66', '5da0e1ff10c32', 'Which of the following controls the process of interation between the user and the operating system', 4, 7),
('5da0df9440b66', '5da0e1ff6256b', 'The first computer were programmed using', 4, 8),
('5da0df9440b66', '5da0e1ff9f335', 'FORTRAN is', 4, 9),
('5da0df9440b66', '5da0e1ffebdba', 'The first page of a website is termed as', 4, 10),
('5da4eac7b9410', '5da4eaed07185', 'apple', 4, 1),
('5da4eac7b9410', '5da4eaee19114', 'mouse', 4, 2),
('5da783632028f', '5da7839f80756', 'sdf', 4, 1),
('5da783632028f', '5da783a026691', 'gd', 4, 2),
('5da0dbd301c63', '5da0dcebd3109', 'VDU is also called', 4, 1),
('5da0dbd301c63', '5da0dcec953aa', 'RAM stands for', 4, 2),
('5da0dbd301c63', '5da0dced0d64b', 'Who is the chief of Microsoft', 4, 3),
('5da0dbd301c63', '5da0dced64381', 'The computer size was very large in', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('5da0d8086acd2', 'Mathematics', 1, 0, 3, 3, 'calculations', 'math', '2019-10-11 19:29:12'),
('5da0d9d8d85d1', 'Network', 1, 0, 5, 4, 'networking', 'networking', '2019-10-11 19:36:56'),
('5da0dbd301c63', 'Basic Computer', 1, 0, 4, 1, 'basic computer', 'computer', '2019-10-16 06:57:56'),
('5da0df9440b66', 'Operating System', 1, 0, 10, 10, 'questions on O/S', 'os', '2019-10-11 20:01:24'),
('5da4eac7b9410', 'Physics', 1, 0, 2, 2, 'sdfds', 'df', '2019-10-17 05:04:33'),
('5da783632028f', 'English', 1, 0, 2, 2, 'test', 'testing', '2019-10-16 20:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_title`) VALUES
(1, 'English'),
(2, 'Mathematics'),
(3, 'Physics'),
(4, 'Chemistry'),
(5, 'Agriculture'),
(6, 'Biology'),
(7, 'Geography');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `m_image` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `secret_question` text NOT NULL,
  `m_ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `address`, `email`, `mobile`, `password`, `dob`, `gender`, `m_image`, `state`, `secret_question`, `m_ip`) VALUES
('Omoniyi', 'Samuel', 'Iba', 'samuelomoniyi@gmail.com', '08038493845', 'c20ad4d76fe97759aa27a0c99bff6710', '1991-03-12', 'Male', '2019-10-05-10-02-41-836.jpg', 'Ondo', 'rice', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `freeairtime`
--
ALTER TABLE `freeairtime`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
