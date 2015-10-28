-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2015 at 12:56 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog_design`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(256) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'Computer'),
(3, 'Laptop'),
(4, 'Mobile'),
(5, 'Desktop'),
(6, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_url` varchar(255) NOT NULL,
  `c_message` text NOT NULL,
  `c_date` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`c_id`, `c_name`, `c_email`, `c_url`, `c_message`, `c_date`, `post_id`, `active`) VALUES
(11, 'tanu', 'tanisa@gmail.com', '', 'very nice topics', '2015-10-24', 31, 1),
(17, 'Tani', 'tanu@gmail.com', '', 'nice to see', '2015-10-24', 36, 1),
(18, 'tanisa', 'tanisa@gmail.com', '', 'important topics', '2015-10-24', 32, 1),
(19, 'niha', 'niha@gmail.com', '', 'nice idea', '2015-10-24', 38, 0),
(20, 'tahmina', 'tani19@gmail.com', '', 'important topic', '2015-10-24', 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `description`) VALUES
(1, 'copyright @2015,Tani.All Right Reserved.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`) VALUES
(1, 'admin', '1d40d718e97437920da7060a43796d1f');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(250) NOT NULL,
  `post_description` text NOT NULL,
  `post_image` varchar(250) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tag_id` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `post_timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_title`, `post_description`, `post_image`, `cat_id`, `tag_id`, `post_date`, `year`, `month`, `post_timestamp`) VALUES
(20, 'Newton’s rings', '<p>Newton&rsquo;s rings is a noteworthy illustration</p>\r\n\r\n<p>of the interference of light waves reflected</p>\r\n\r\n<p>from the opposite surfaces of s thin film</p>\r\n\r\n<p>of variable thickness. When plano-convex</p>\r\n\r\n<p>lens with its convex surface is placed on a</p>\r\n\r\n<p>plane glass sheet, an air film of gradually</p>\r\n\r\n<p>increasing thickness outward is formed</p>\r\n\r\n<p>between the lens and the sheet. The</p>\r\n\r\n<p>thickness of film at the point of contact</p>\r\n\r\n<p>is zero. If monochromatic light is allowed</p>\r\n\r\n<p>to fall normally on the lens, and the film is</p>\r\n\r\n<p>viewed in reflected light, alternate bright</p>\r\n\r\n<p>and dark concentric rings are seen around</p>\r\n\r\n<p>the point of contact. These rings were first</p>\r\n\r\n<p>discovered by Newton, that&#39;s why they are</p>\r\n\r\n<p>called <strong>NEWTON&#39;S RINGS</strong> .</p>\r\n\r\n<p><strong>EXPLANATION</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>The phenomenon of the formation of the light.</li>\r\n	<li>An air film of varying thickness is formed between the lens and the glass sheet.<br />\r\n	When a light ray is incident on the upper surface of the lens, it is reflected as well as refracted.<br />\r\n	When the refracted ray strikes the glass sheet, it undergo a phase change of 180<sup>O</sup> on reflection.<br />\r\n	Interference occurs between the two waves which interfere constructively if path difference between them is <strong>(m+1/2)l</strong> and destructively if path difference between them is <strong>ml</strong> producing alternate bright and dark rings.</li>\r\n</ol>\r\n', '20.png', 5, '4,3', '2015-07-24', '2015', '07', '1445637600'),
(21, 'Surge protector', '<p>A <strong>surge protector</strong> (or <strong>surge suppressor</strong>) is</p>\r\n\r\n<p>an appliance designed to protect <a href="http://en.wikipedia.org/wiki/Electricity" title="Electricity">electrical </a></p>\r\n\r\n<p><a href="http://en.wikipedia.org/wiki/Electricity" title="Electricity">devices</a> from <a href="http://en.wikipedia.org/wiki/Voltage_spike" title="Voltage spike">voltage spikes</a>. A surge protecto</p>\r\n\r\n<p>r attempts to limit the <a href="http://en.wikipedia.org/wiki/Voltage" title="Voltage">voltage</a> supplied to an</p>\r\n\r\n<p>electric device by either blocking or by shorting</p>\r\n\r\n<p>to <a href="http://en.wikipedia.org/wiki/Ground_%28electricity%29" title="Ground (electricity)">ground</a> any unwanted voltages above a</p>\r\n\r\n<p>safe threshold. This article primarily discusses specifications and components relevant to</p>\r\n\r\n<p>the type of protector that diverts (shorts) a</p>\r\n\r\n<p>voltage spike to ground; however, there</p>\r\n\r\n<p>is some coverage of other methods.</p>\r\n\r\n<p>The terms <strong>surge protection device (SPD)</strong>,</p>\r\n\r\n<p>or the obsolescent term <strong>transient voltage</strong></p>\r\n\r\n<p><strong>surge suppressor (TVSS)</strong>, are used to</p>\r\n\r\n<p>describe electrical devices typically installed</p>\r\n\r\n<p>in power distribution panels, process control</p>\r\n\r\n<p>systems, communications systems, and</p>\r\n\r\n<p>other heavy-duty industrial systems, for</p>\r\n\r\n<p>the purpose of protecting against electrical</p>\r\n\r\n<p>surges and spikes, including those caused</p>\r\n\r\n<p>by <a href="http://en.wikipedia.org/wiki/Lightning" title="Lightning">lightning</a>. Scaled-down versions of these</p>\r\n\r\n<p>devices are sometimes installed in residential</p>\r\n\r\n<p>service entrance electrical panels, to protect</p>\r\n\r\n<p>equipment in a household from similar hazards.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '21.png', 4, '1,3,5', '2015-10-24', '2015', '10', '1445637600'),
(25, 'UPS(uninterruptible power supply)', '<p>An uninterruptible power supply, also uninterruptible</p>\r\n\r\n<p>power source, UPS or battery/flywheel backup,</p>\r\n\r\n<p>is an electrical apparatus that provides</p>\r\n\r\n<p>emergency power to a load when the</p>\r\n\r\n<p>input power source, typically mains power,</p>\r\n\r\n<p>fails. A UPS differs from an auxiliary or</p>\r\n\r\n<p>emergency power system or standby</p>\r\n\r\n<p>generator in that it will provide</p>\r\n\r\n<p>near-instantaneous protection</p>\r\n\r\n<p>from input power interruptions, by</p>\r\n\r\n<p>supplying energy stored in batteries or</p>\r\n\r\n<p>a flywheel. The on-battery runtime of most</p>\r\n\r\n<p>uninterruptible power sources is relatively</p>\r\n\r\n<p>short (only a few minutes) but sufficient to</p>\r\n\r\n<p>start a standby power source or properly</p>\r\n\r\n<p>shut down the protected equipment.The on-battery runtime of most</p>\r\n\r\n<p>uninterruptible power sources is relatively</p>\r\n\r\n<p>short (only a few minutes) but sufficient to</p>\r\n\r\n<p>start a standby power source or properly</p>\r\n\r\n<p>shut down the protected equipment.</p>\r\n', '25.png', 6, '1,4', '2015-09-24', '2015', '09', '1445637600'),
(31, 'Wiring System', '<div style="margin-left:.38in;">•Neutral Wire:</div>\r\n\r\n<p style="margin-left:.38in;">    In a 3-phase 4-wire ac supply, the potential between any two phases is 440V and the potential between any of the three phases and the fourth wire known as neutral is 230V.</p>\r\n\r\n<p style="margin-left:.38in;">    This neutral is connected to the junction of the 3-phases at the generating end.</p>\r\n\r\n<p style="margin-left:.38in;">    The neutral wire is always grounded at the generating station.</p>\r\n\r\n<p style="margin-left:.38in;">    The residential electrical appliances such as lamp, radio, fan, heater, iron etc, all operate at 230V.</p>\r\n\r\n<p style="margin-left:.38in;">    For the residential wiring, one of the outer phases and neutral are brought into the house.</p>\r\n\r\n<div style="margin-left:.38in;">•If the consumers load is quite high, then all the three phases and neutral are brought in, but the appliances are connected between an phase and a neutral and whole of the load is equally distributed on all the phases.</div>\r\n', '31.png', 1, '1,3,5', '2015-10-24', '2015', '10', '1445637600'),
(32, 'Instant Power Supply (IPS)', '<p><strong>Introduction</strong></p>\r\n\r\n<p>PowerCom IPS is the ideal solution for continuous power supply facilities during mains failure. The system has many distinct features over the conventional generators. It is the precession IPS designed according to our power line Condition. It has the ability to charge the battery in low voltage so you will get sufficient backup in Failure of Power.</p>\r\n\r\n<p>Applications</p>\r\n\r\n<p>PowerCom IPS is designed to meet power requirements of Home/office appliances like Light, Fan, TV, Video Player, Audio- Player, Fax, PABX, etc and can be plugged-in directly with the mains supply. It is also suitable for households, Business centers, Offices, Conference rooms, Restaurants, Medical facilities departments, Testing labs &amp; Apartments etc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Features</p>\r\n\r\n<p>Fully Automatic.Requires no Fuel/Lubricant for maintenance. Noiseless and Pollution free. Two hours of continuous power at full load. Built-in over load and under voltage protection. Built in over charge and Battery Low Volt Disconnect Facility</p>\r\n', '32.png', 5, '4,5', '2015-10-24', '2015', '10', '1445637600'),
(34, 'Retro Photos', '<p>Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorpermassa, cosectetuer feipsum eget pede. Proin nunc. Donec nonummy, tellus er sodales enim, in tincidunmauris in odio. Massa ac laoreet iaculipede nisl ullamcorpermassa, ac consectetuer feipsum eget pede. Proin nunc. Donec massa. Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorpermassa, cosectetuer feipsum eget pede. Proin nunc. Donec nonummy, tellus er sodales enim, in tincidunmauris in odio. Massa ac laoreet iaculipede nisl ullamcorpermassa, ac consectetuer feipsum eget pede. Proin nunc. Donec massa</p>\r\n', '34.png', 4, '1,5', '2015-10-24', '2015', '10', '1445637600'),
(36, 'Original Wordpress Themes', '<p>Lorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorpermassa, cosectetuer feipsum eget pede. Proin nunc. Donec nonummy, tellus er sodales enim, in tincidunmauris in odio. Massa ac laoreet iaculipede nisl ullamcorpermassa, ac consectetuer feipsum eget pede. Proin nunc. Donec massaLorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorpermassa, cosectetuer feipsum eget pede. Proin nunc. Donec nonummy, tellus er sodales enim, in tincidunmauris in odio. Massa ac laoreet iaculipede nisl ullamcorpermassa, ac consectetuer feipsum eget pede. Proin nunc. Donec massaLorem ipsum dolor sit amet, consectetuer adipi scing elit.Mauris urna urna, varius et, interdum a, tincidunt quis, libero. Aenean sit amturpis. Maecenas hendrerit, massa ac laoreet iaculipede mnisl ullamcorpermassa, cosectetuer feipsum eget pede. Proin nunc. Donec nonummy, tellus er sodales enim, in tincidunmauris in odio. Massa ac laoreet iaculipede nisl ullamcorpermassa, ac consectetuer feipsum eget pede. Proin nunc. Donec massa</p>\r\n', '36.png', 3, '1,4', '2015-10-24', '2015', '10', '1445637600'),
(38, 'Wiring System1', '<p>Neutral Wire:</p>\r\n\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; In a 3-phase 4-wire ac supply, the potential between any two phases is 440V and the potential between any of the three phases and the fourth wire known as neutral is 230V.</p>\r\n\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; This neutral is connected to the junction of the 3-phases at the generating end.</p>\r\n\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; The neutral wire is always grounded at the generating station.</p>\r\n\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; The residential electrical appliances such as lamp, radio, fan, heater, iron etc, all operate at 230V.</p>\r\n\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; For the residential wiring, one of the outer phases and neutral are brought into the house.</p>\r\n\r\n<div style="margin-left:.38in;">&bull;If the consumers load is quite high, then all the three phases and neutral are brought in, but the appliances are connected between an phase and a neutral and whole of the load is equally distributed on all the phases.Neutral Wire:\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; In a 3-phase 4-wire ac supply, the potential between any two phases is 440V and the potential between any of the three phases and the fourth wire known as neutral is 230V.</p>\r\n\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; This neutral is connected to the junction of the 3-phases at the generating end.</p>\r\n\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; The neutral wire is always grounded at the generating station.</p>\r\n\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; The residential electrical appliances such as lamp, radio, fan, heater, iron etc, all operate at 230V.</p>\r\n\r\n<p style="margin-left:.38in;">&nbsp;&nbsp;&nbsp; For the residential wiring, one of the outer phases and neutral are brought into the house.</p>\r\n\r\n<div style="margin-left:.38in;">&bull;If the consumers load is quite high, then all the three phases and neutral are brought in, but the appliances are connected between an phase and a neutral and whole of the load is equally distributed on all the phases.</div>\r\n</div>\r\n', '38.png', 4, '1,4,5', '2015-10-24', '2015', '10', '1445637600');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(256) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`tag_id`, `tag_name`) VALUES
(1, 'books'),
(3, 'mobile'),
(4, 'khata'),
(5, 'pen');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
