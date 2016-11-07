-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 06:59 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_newspaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ad`
--

CREATE TABLE IF NOT EXISTS `tbl_ad` (
  `ad_id` int(5) NOT NULL,
  `ad_title` varchar(255) NOT NULL,
  `ad_description` text NOT NULL,
  `ad_image` text NOT NULL,
  `ad_publication_status` tinyint(4) NOT NULL,
  `ad_deletion_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ad`
--

INSERT INTO `tbl_ad` (`ad_id`, `ad_title`, `ad_description`, `ad_image`, `ad_publication_status`, `ad_deletion_status`) VALUES
(1, 'test ad', 'test des<br>', '../admin/images/12.jpg', 1, 0),
(2, 'Advertise Here', 'Advertise Here<br>', '../admin/images/images.png', 1, 1),
(3, 'Advertise Here', 'Advertise Here', '../admin/images/images.jpg', 1, 1),
(4, 'test ad 4', 'design and developed by jobaer', '../admin/images/11402993_474673062710422_2813567363653633604_n.jpg', 0, 0),
(5, 'Advertise Here3', 'Advertise Here3', '../admin/images/123.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(3) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email_address` varchar(255) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `access_level` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email_address`, `admin_password`, `access_level`) VALUES
(12, 'jobaer', 'jobaer.fenibd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(4) NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `cat_code` int(5) NOT NULL,
  `position` int(2) NOT NULL DEFAULT '1',
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `parent`, `cat_code`, `position`, `category_name`, `category_description`, `publication_status`, `deletion_status`) VALUES
(1, 1, 0, 1, 'Bangladesh', 'Latest and Breaking News on Bangladesh', 1, 1),
(2, 1, 0, 3, 'International', 'International News<br>', 1, 1),
(3, 0, 1, 1, 'Sports', 'Latest sports news on cricket, football, tennis, athletics, and other games in Bangladesh and the world.', 1, 1),
(7, 0, 1, 1, 'Entertainment', 'Latest entertainment news related to Hollywood, Bollywood, Dhalywood', 1, 1),
(8, 1, 0, 1, 'Science&tech', 'Latest science and technology news on computer/laptop, mobile phones, automobiles, researches, space, tech celebrities', 1, 1),
(9, 0, 2, 1, 'Lifestyle', 'Lifestyle news, features, advices and tips on realtionship, marriage, love, romance, health, food', 1, 1),
(10, 1, 0, 1, 'Economy', 'Latest economic and business news of Bangladesh and world including: garments, jute', 1, 1),
(11, 0, 1, 2, 'National', 'National affairs<br>', 1, 1),
(12, 0, 1, 2, 'Politics', 'Bangladesh Politics<br>', 1, 1),
(13, 0, 1, 2, 'Dhaka', 'Dhaka', 1, 1),
(14, 1, 3, 3, 'Sports', 'Hello sports', 1, 1),
(15, 1, 0, 2, 'Education', '', 1, 1),
(16, 1, 15, 5, 'puzzle', 'draw picture', 1, 1),
(17, 0, 2, 1, 'Pakistan break resistance to clinch win', '<i style="box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-family: georgia; font-size: 16px; line-height: 26px; vertical-align: baseline; background-color: rgb(255, 255, 255);"><b style="box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-size: inherit; font-style: inherit; font-variant: inherit; line-height: inherit; vertical-align: baseline;">Pakistan</b>&nbsp;378 (Misbah 102, Shafiq 83, Younis 58, Masood 54, Wood 3-39, Moeen 3-108) and 354 for 6 dec (Younis 118, Misbah 87, Shafiq 79) beat&nbsp;<b style="box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-size: inherit; font-style: inherit; font-variant: inherit; line-height: inherit; vertical-align: baseline;">England</b>&nbsp;242 (Root 88, Wahab 4-66, Yasir 4-93) and 312 (Root 71, Rashid 61, Yasir 4-87) by 178 runs</i><span style="font-family: georgia; font-size: 16px; line-height: 26px; background-color: rgb(255, 255, 255);">&nbsp;</span>', 1, 1),
(18, 0, 2, 1, 'Pakistan break resistance to clinch win', '<i style="box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-family: georgia; font-size: 16px; line-height: 26px; vertical-align: baseline; background-color: rgb(255, 255, 255);"><b style="box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-size: inherit; font-style: inherit; font-variant: inherit; line-height: inherit; vertical-align: baseline;">Pakistan</b>&nbsp;378 (Misbah 102, Shafiq 83, Younis 58, Masood 54, Wood 3-39, Moeen 3-108) and 354 for 6 dec (Younis 118, Misbah 87, Shafiq 79) beat&nbsp;<b style="box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-size: inherit; font-style: inherit; font-variant: inherit; line-height: inherit; vertical-align: baseline;">England</b>&nbsp;242 (Root 88, Wahab 4-66, Yasir 4-93) and 312 (Root 71, Rashid 61, Yasir 4-87) by 178 runs</i><span style="font-family: georgia; font-size: 16px; line-height: 26px; background-color: rgb(255, 255, 255);">&nbsp;</span>', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` bigint(20) NOT NULL,
  `comment_content` text NOT NULL,
  `parent` tinyint(1) NOT NULL DEFAULT '1',
  `news_id` text NOT NULL,
  `user_id` int(5) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `comment_content`, `parent`, `news_id`, `user_id`, `create_time`, `publish_status`) VALUES
(27, 'This is too much', 1, '32', 16, '2015-10-22 18:17:12', 0),
(28, 'good', 1, '31', 14, '2015-10-23 04:09:55', 0),
(29, 'Police and the witnesses said a series of blasts happened at around 1:45am in front of Huseni Dalan right before a Tazia procession on the eve of Ashura day today (Saturday).', 1, '50', 18, '2015-10-25 01:33:37', 0),
(30, 'Six people were killed and five others injured in separate road accidents in Habiganj and Moulvibazar districts on Saturday morning.', 1, '49', 18, '2015-10-25 01:36:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE IF NOT EXISTS `tbl_image` (
  `image_id` int(4) NOT NULL,
  `image_name` text NOT NULL,
  `social1_url` varchar(255) NOT NULL,
  `social2_url` varchar(255) NOT NULL,
  `social3_url` varchar(255) NOT NULL,
  `social4_url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `image_name`, `social1_url`, `social2_url`, `social3_url`, `social4_url`) VALUES
(1, '../admin/images/images.png', 'http://fb.com', 'http://localhost/newspaper/admin/options.php', 'http://localhost/newspaper/admin/options.php', 'http://localhost/newspaper/admin/options.php'),
(2, '../admin/images/images(3).jpg', '0', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(8) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_description` text NOT NULL,
  `news_image` text NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(4) NOT NULL,
  `admin_id` int(3) NOT NULL,
  `views` int(255) NOT NULL,
  `news_publication_status` tinyint(4) NOT NULL,
  `news_deletion_status` tinyint(4) NOT NULL DEFAULT '1',
  `top_news` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_description`, `news_image`, `news_date`, `category_id`, `admin_id`, `views`, `news_publication_status`, `news_deletion_status`, `top_news`) VALUES
(27, 'Wet outfield delays start at Eden Gardens', 'fg gfhfgth ghgfyh ghgyfh gfh <br>', '../admin/images/b25ba4cf32ebecc74cf3da023b53ca7b-pluto-afp.jpg', '2015-10-13 15:51:43', 2, 1, 20, 1, 1, 0),
(28, 'Wet outfield delays start at Eden Gardens', 'fg gfhfgth ghgfyh ghgyfh gfh <br>', '../admin/images/b25ba4cf32ebecc74cf3da023b53ca7b-pluto-afp.jpg', '2015-10-13 15:51:43', 8, 2, 48, 0, 1, 0),
(31, '', '<br>', '../admin/images/b25ba4cf32ebecc74cf3da023b53ca7b-pluto-afp.jpg	', '2015-10-14 16:33:07', 0, 1, 12, 0, 1, 0),
(32, 'admin id test jobaer', 'abcd', '../admin/images/b25ba4cf32ebecc74cf3da023b53ca7b-pluto-afp.jpg', '2015-10-14 16:36:35', 0, 2, 188, 1, 0, 0),
(33, 'Say â€˜thank youâ€™ for better marital outcomes', '<span id="media_0" style="width:643px;" class="jw_media_holder jwMediaContent aligncenter"></span><img itemprop="image" src="http://www.en.prothom-alo.com/contents/cache/images/643x0x1/uploads/media/2015/10/23/f3efd524f68b49ecd90634d9c2809036-Say-thank-you.jpg" alt="Say â€˜thank youâ€™ for better marital outcomes" width="643"><br><br>If you want a long and happy married life start thanking your spouse at every opportunity, suggests new research.<br><br>â€œWe\r\n found that feeling appreciated and believing that your spouse values \r\nyou directly influences how you feel about your marriage, how committed \r\nyou are to it, and your belief that it will last,â€ said study co-author \r\nTed Futris, an associate professor at the University of Georgia in the \r\nUS.<br><br>With the use of a telephone survey, the study asked 468 \r\nmarried individuals questions about their financial well being, \r\ndemand/withdraw communication and expressions of spousal gratitude.<br><br>The results indicated that spousal expression of gratitude was the most consistent significant predictor of marital quality.<br><br>â€œIt goes to show the power of â€˜thank you,â€™â€ studyâ€™s lead author Allen Barton from the University of Georgia noted.\r\n<p><br>â€œEven if a couple is experiencing distress and difficulty in \r\nother areas, gratitude in the relationship can help promote positive \r\nmarital outcomes,â€ Barton noted.<br><br>The study also found that higher\r\n levels of spousal gratitude expressions protected menâ€™s and womenâ€™s \r\ndivorce proneness as well as womenâ€™s marital commitment from the \r\nnegative effects of poor communication during conflict.<br><br>â€œImportantly,\r\n we found that when couples are engaging in a negative conflict pattern \r\nlike demand/withdrawal, expressions of gratitude and appreciation can \r\ncounteract or buffer the negative effects of this type of interaction on\r\n marital stability,â€ Futris said.<br><br>â€œThis is the first study to \r\ndocument the protective effect that feeling appreciated by your spouse \r\ncan have for marriages,â€ Barton said.<br>The study was published in the journal Personal Relationships.</p>', '../admin/images/f3efd524f68b49ecd90634d9c2809036-Say-thank-you.jpg', '2015-10-23 14:37:45', 9, 1, 2, 1, 1, 1),
(34, 'NASA unveils stunning', 'NASA has unveiled stunning mosaics of Pluto and its largest mo<br>on Charon,\r\n representing the global response to its popular â€œ#PlutoTimeâ€ <br>social \r\nmedia campaign.<br><br>The Pluto Time concept and widget was developed \r\nby NASAâ€™s<br>Â New Horizons science team so that people could experience t<br>he \r\napproximate sunlight level on Pluto at noon-generally aroun<br>d dawn or \r\ndusk on the Earth, the American space agency said<br>on Tuesday.<br><br><br>', '../admin/images/b25ba4cf32ebecc74cf3da023b53ca7b-pluto-afp.jpg', '2015-10-23 14:43:48', 8, 1, 11, 1, 1, 1),
(35, 'IS behind Tazia blast, says SITE', '<p>Militant group Islamic State has claimed responsibility for bombings \r\nthat targeted Shiâ€™ites in Dhaka on Saturday, the monitor group SITE \r\nsaid, Reuters reported from Dubai.</p>\r\n<p>The SITE, added Reuters, cited Islamic State as saying â€œsoldiers of \r\nthe Caliphate in Bangladeshâ€ detonated explosive devices in Dhaka during\r\n â€œpolytheist ritualsâ€.<br>IS earlier claimed reportedly responsibility \r\nfor the killing of Italian aid worker Cesare Tavella in Dhaka and \r\nJapanese national Kunio Hoshi in Rangpur.<br>However, those claims could\r\n not be varified independently while the government of Bangladesh \r\noutright rejected such claims ruling out possibility of IS presence in \r\nthe country.<br>On Saturady, too, the top officials of the police denied IS link and said the blast was an act of sabotage.</p>', '../admin/images/650xNx317289c83dbe0077cdfe069f93f4619d-IS.png.pagespeed.ic.v4IEQn6KM1.jpg', '2015-10-24 13:57:07', 2, 12, 1, 1, 1, 0),
(36, 'Hurricane Patricia hits Mexico', '<p>Record-breaking Hurricane Patricia rumbled across western Mexico \r\nearly Saturday, uprooting trees and triggering some landslides but \r\ncausing less damage than feared so far for such a massive storm, \r\nofficials said.</p>\r\n<p>Authorities relocated coastal residents, evacuated tourists from \r\nbeach hotels and closed sea ports, airports and schools in several \r\nstates before Patricia made landfall in Jalisco state as a huge category\r\n five hurricane.</p>\r\n<p>Patricia had grown into the strongest hurricane ever recorded hours \r\nbefore reaching the coast, raising fears that it would bring death and \r\ndestruction across the country.</p>\r\n<p>But almost five hours after landfall, President Enrique Pena Nieto \r\naddressed the nation on television, saying that the first reports \r\nâ€œconfirm that the damages have been smaller than those corresponding to a\r\n hurricane of this magnitude.â€</p>\r\n<p>Pena Nieto urged Mexicans to stay in shelters, however, warning that \r\nPatricia still posed a threat, with heavy rain expected across the \r\nPacific coast as well as central and northeastern Mexico.</p>\r\n<p>â€œWe canâ€™t let our guard down yet. I insist, the most dangerous part \r\nof the hurricane has yet to enter the national territory,â€ said Pena \r\nNieto, whose country has seen deadly devastation from hurricanes before.</p>\r\n<p>The hurricane crashed ashore around the towns of Cuixmala and \r\nEmiliano Zapata in the early evening, about 95 kilometers (60 miles) \r\nwest of the major port of Manzanillo, according to US and Mexican \r\nauthorities.</p>\r\n<p>The US National Hurricane Center said Patricia weakened marginally \r\nwhen it made landfall Friday evening, with maximum winds of 270 \r\nkilometers per hour.</p>\r\n<p>As it moved further inland through the night, Patricia was gradually \r\ndowngraded to category two but was still a â€œstrongâ€ hurricane, with 155 \r\nkph winds, the center said, adding that rapid weakening to tropical \r\nstorm status was expected.</p>\r\n<p>Patricia peaked at 325 kph several hours earlierâ€”more powerful than \r\nthe 315 kph winds of Super Typhoon Haiyan, which left more than 7,350 \r\ndead or missing when it struck the Philippines in November 2013.</p>\r\n<p>But Jalisco Governor Aristoteles Sandoval wrote on Twitter that â€œthere have been no reports of deaths for the moment.â€</p>\r\n<p>More than 6,300 people were in shelters in Jalisco.</p>\r\n<p>In the state of Colima, where Manzanillo lies, some 350 trees were \r\nripped out of the ground â€œbut fortunately there is only material \r\ndamage,â€ Agriculture Minister Jose Calzada told Milenio television.</p>\r\n<p>Some landslides blocked the Colima-Manzanillo highway, said Transport Ministry Gerardo Ruiz Esparza.</p>\r\n<ul><li>â€˜Wrong place, wrong timeâ€™ -</li></ul>\r\n<p>Stores shut down in the resort of Puerto Vallarta, where some 7,000 \r\nforeign and 21,000 Mexican tourists had come for vacation ahead of the \r\nstorm.</p>\r\n<p>Seafront hotels were evacuated and some tourists were moved to shelters.</p>\r\n<p>Federal officials said 3,500 people were evacuated from Puerto Vallarta by bus and plane.</p>\r\n<p>A Red Cross facility in the city was turned into a shelter for 109 people, including Americans, Canadians and Italians.</p>\r\n<p>â€œI had the bad luck of being at the wrong place in the wrong time,â€ \r\nsaid Gian Paolo Azzena, a 26-year-old Italian medical school graduate. \r\nâ€œI found out that a hurricane was coming thanks to a craftsman. I \r\nthought it was a joke.â€</p>\r\n<p>A handful of people waited at a bus station before service ended at \r\nmidday, while others bought water and loaded vehicles with jerricans of \r\nfuel.</p>\r\n<p>Some 20 people were even seen drinking at a beach bar earlier in the \r\nafternoon, but heavy rain began to fall later in the evening.</p>\r\n<p>US President Barack Obama said American disaster aid experts were on the ground and primed to help.</p>\r\n<p>Tens of thousands of US tourists are among those in the hurricaneâ€™s path, US officials said.</p>\r\n<ul><li>US bound? -</li></ul>\r\n<p>Authorities shut down power along the coasts of Jalisco and Colima states to prevent electrocutions.</p>\r\n<p>Jose Maria Tapia Franco, director of the National Disaster Fund, said\r\n 400,000 people live in vulnerable areas. Hundreds of shelters were made\r\n available.</p>\r\n<p>In Colima, villages around the Volcano of Fire were emptied over \r\nconcerns that ash that accumulated during recent volcanic activity could\r\n combine with water to produce landslides.</p>\r\n<p>Patricia was expected to dump up to 51 centimeters (20 inches) of \r\nrain over five western Mexican states, which could trigger \r\nlife-threatening flash floods and mudslides.</p>\r\n<p>But it was expected to weaken rapidly as it moved further inland and be downgraded into a tropical storm on Saturday morning.</p>\r\n<p>The National Water Commission said Patricia was â€œso big and intenseâ€ \r\nthat it could cross the entire country, reach the Gulf of Mexico, and \r\nmake landfall in the United States.</p>', '../admin/images/x6b5132b4c1fe321a664a3f9ad62a9e5b-Spartia.jpg,qjadewits_media_id=74645.pagespeed.ic.7yA_z6mZaV.jpg', '2015-10-24 13:58:37', 2, 12, 6, 1, 1, 0),
(37, 'Klopp sets sights on first Liverpool win', 'Jurgen Kloppâ€™s arrival as Liverpool manager has created a frenzy of \r\ninterest among fans and media alike, but has not as yet succeeded in \r\nshedding his clubâ€™s growing reputation as draw specialists.\r\n<p><br>Six of their last eight matches have ended in stalemate, a total \r\nthat rises to seven with the inclusion of last monthâ€™s unimpressive \r\npenalty shoot-out victory over League Two side Carlisle, which had ended\r\n 1-1 after 120 minutes.<br><br>The concern for Klopp ahead of his third \r\nmatch in charge, at home to Southampton in the Premier League on Sunday,\r\n is a lack of ruthlessness in front of goal.<br><br>While a 0-0 draw at \r\nTottenham last Saturday marked a solid start to the former Borussia \r\nDortmund managerâ€™s reign, Thursdayâ€™s 1-1 Europa League draw at home to a\r\n 10-man Rubin Kazan side was more of a disappointment.<br><br>As Klopp put it: â€œSome of the players were so stiff in their mind. They think: â€˜We shoot now?â€™<br><br>â€œWe\r\n have to make better decisions in the box. But I have only been here for\r\n a short time and I think, at this stage, itâ€™s pretty normal.â€<br><br>Liverpoolâ€™s\r\n performance against their Russian opponents lacked the pace they showed\r\n against Tottenham - and the energy for which Kloppâ€™s teams have become \r\nfamed.<br><br></p>\r\n<p>Klopp has not been helped in his early matches, though, by a lack of attacking options.</p>', '../admin/images/ff9496de275aa5bcaa893e15aac86485-Klopp.jpg', '2015-10-24 14:03:14', 3, 12, 0, 1, 1, 0),
(38, 'German football museum ready for kick-off', 'The German Football Museum opens its doors to the public this \r\nweekend, offering some light relief from a cash-for-votes scandal over \r\nthe 2006 World Cup.\r\n<p><br>At a cost of 36 million euros ($40 million), the private venture \r\npartially backed by the DFB (German Football Association) will open as a\r\n shrine to those who have worn the famous white shirt in football-mad \r\nGermany.<br><br>The eye-catching, 7,700-square-metre complex in the heart of the western city of Dortmund contains some 1,600 exhibits.<br><br>The\r\n largest is the Mercedes bus on which the German team rode through \r\nBerlin on their triumphant return from the 2014 World Cup in Brazil.<br><br>The\r\n bus also carried the German team after they finished third at the 2006 \r\nWorld Cup on home soil, which is nostalgically referred to here as the \r\nâ€œSommermaerchenâ€-the â€œsummer fairytaleâ€.</p>\r\n<br>The dream soured last weekend when Spiegel news magazine alleged \r\nthe votes of four Asian members of FIFAâ€™s executive committee were \r\nbought in the race to host the tournament.<br><br>The DFB has strenuously denied the allegations.', '../admin/images/13e1f0b96d42c2966f1c7e7c54b9996e-Museum.jpg', '2015-10-24 14:06:19', 3, 12, 0, 1, 1, 0),
(39, 'Emotional attachment to work good for your health', 'Workers who feel emotionally attached to and identify with their work have better psychological well-being, says a new study.<br><br>Efforts\r\n to increase affective organisational commitment (AOC) - the employeeâ€™s \r\nemotional attachment to, identification with, and involvement in the \r\norganisation - may lead to a happier, healthier workforce, and possibly \r\ncontribute to reducing employee turnover, the study said.<br><br>Thomas \r\nClausen from National Research Centre for the Working Environment in \r\nCopenhagen, Denmark, and colleagues looked at how AOC affected \r\npsychological well-being and other health-related outcomes in \r\napproximately 5,000 Danish eldercare workers, organised into 300 groups.<br><br>The results showed significantly higher well-being for employees in groups with higher AOC.', '../admin/images/350xNx24d5b05280ca82d5d388dfcd1295e0ae-office-reuters.jpg.pagespeed.ic.muUEPa-8Kr.jpg', '2015-10-24 14:11:53', 9, 12, 0, 0, 1, 0),
(40, 'These foods can help slow down your ageing', 'Ageing is a natural phenomenon which everyone has to go through, but \r\nconsuming dark chocolates or blueberries can help slow down the process \r\nwith better results, says an expert.<br><br>Vikas Jain, fitness and \r\nhealth connoisseur at Anytime Fitness, has shared a list of five super \r\nfood that can actually make a difference to our body system.<br><br><strong>Olive oil:</strong>\r\n It is a good source of MUFA (monounsaturated fatty acids) and omega 3. A\r\n serving of olive oil will give you the daily dose of healthy fats. <br><br>Cooking\r\n in olive oil damages the structure of olive oil and it converts it into\r\n a saturated fat. Olive oil is also excellent source of polyphenols \r\nwhich are strong antioxidants which are needed to balance the free \r\nradicals.<br><br><strong>Yogurt:</strong> It is an excellent source of \r\nprotein and calcium. It helps us to prevent from muscle and bone loss. \r\nAlso it provides us with billions of good bacteria in our stomach. These\r\n bacteria help us to break down our food and also help us to get rid of \r\ntoxins. Make sure to have at least two servings of yoghurt, for best \r\nresults take it at room temperature.', '../admin/images/350xNx55b20f0982a1c3b06ae1a6c341040656-foods.jpg.pagespeed.ic.xHY3VfnHQE.jpg', '2015-10-24 14:29:27', 9, 12, 0, 0, 1, 0),
(41, 'Internet TV leads to more options, not viewing time', 'The option of watching television online may make the experience more \r\npleasurable, but it will not influence the amount of time a person \r\nspends viewing TV, says a new study.<br><br>â€œSome media reports predict \r\nthat because people now have access to watch anything they want, anytime\r\n they want, they will spend more time watching TV,â€ said one of the \r\nstudyâ€™s authors Stan Liebowitz, professor at Naveen Jindal School of \r\nManagement, University of Texas at Dallas in the US.<br><br>Because data\r\n of current trends in Internet TV viewing wonâ€™t be available for another\r\n 10 to 15 years, the researchers prognosticated what is going to happen \r\nbased on what had happened in the past, the study said.<br><br>So the researchers examined television consumption during the switch from broadcast TV to cable TV.<br><br>They found that viewing time was not essentially linked to increase in the variety of available TV shows.<br><br>Liebowitz\r\n said consumers have only 24 hours in a day, so giving them more variety\r\n does not mean they are going to spend more time watching television.<br><br>Because\r\n the variety of programmes does not impact the amount of television \r\nconsumption, the researchers determined that on-demand internet \r\nstreaming media companies should not expect to make additional revenues \r\nthrough increased viewing.', '../admin/images/4737b4dc99307701f7d8313036a648b9-tv-afp.jpg', '2015-10-24 14:30:29', 9, 12, 0, 1, 1, 0),
(42, 'Facebook hits all-time high', '<article itemscope="" itemtype="http://schema.org/Article" class="jw_detail_content_holder content mb10 oh">\r\n<div itemprop="articleBody"><p>Facebook shares lifted Friday to an \r\nall-time high, crossing $100 for the first time, during a rally in the \r\ntechnology sector on Wall Street.</p>\r\n<p>Shares in Facebook rallied 2.5 percent to close at a record $102.19, \r\nto give the worldâ€™s biggest social network a market value of $288 \r\nbillion.</p>\r\n<p>While Facebook has seen ups and downs since its stock market debut in\r\n 2012 -- hitting a low of $17.73 in September 2012, it has been on a \r\ntear as it leverages its billion-plus audience to bring in advertising \r\nrevenues.</p>\r\n<p>The record close comes a day after a spectacular day for tech sector \r\nearnings: Amazon, Google and Microsoft all beat expectations and saw \r\nstrong gains as well.</p>\r\n<p>Microsoft rallied 10 percent, Google jumped eight percent and Amazon six percent in a strong day for the sector.</p>\r\n<p>Facebook, which releases its quarterly earnings November 4, this week\r\n announced an effort to expand its search options, allowing users to \r\ndive into the more than two trillion posts on the network.</p>\r\n<p>One tech firm did not join the partyâ€”online radio giant Pandora Media\r\n plunged 35 percent after its earnings update raised concerns about its \r\nfuture path.</p></div>\r\n</article>', '../admin/images/x29a6fc0ccc561456a6f9a59c60e0a05d-FB.png,qjadewits_media_id=74689.pagespeed.ic.ObUJ0w_LwK.jpg', '2015-10-24 14:31:58', 8, 12, 0, 0, 1, 1),
(43, 'PM reaffirms zero-tolerance to terrorism', '<p>Prime minister Sheikh Hasina on Saturday said Bangladesh will \r\ncontinue to do its part in promoting a culture of peace and non-violence\r\n and zero-tolerance approach to all forms of terrorism and violent \r\nextremism.</p>\r\n<p>â€œWe need to better harness the UNâ€™s ability to forge consensus on \r\nending deadly conflicts and other drivers that continue to give rise to a\r\n series of humanitarian crises,â€ she said.</p>\r\n<p>The Prime Minister said this in a message issued marking the United \r\nNations Day. 24 October is celebrated as United Nations Day since 1948. \r\nIn 1971, the United Nations General Assembly recommended that the day be\r\n observed by Member States as a public holiday.</p>\r\n<p>Sheikh Hasina said Bangladesh will remain in the forefront of the \r\nUNâ€™s much-valued work in peacekeeping and peace building in \r\nconflict-torn settings.</p>\r\n<p>â€œWe shall continue to draw inspiration from the vision of our Father \r\nof The Nation Bangabandhu Sheikh Mujibur Rahman to pursue peace, \r\njustice, development and cooperation as the cardinal principles of our \r\nengagement with the UN and the wider international community,â€ she said.</p>\r\n<p>The prime minister reiterated Bangladeshâ€™s unwavering commitment to \r\nthe international rule of law and non-interference in the internal \r\naffairs of other countries.</p>\r\n<p>The UN Day marks the anniversary of the entry into force in 1945 of \r\nthe UN Charter. With the ratification of this founding document by the \r\nmajority of its signatories, including the five permanent members of the\r\n Security Council, the United Nations officially came into being.</p>', '../admin/images/x2539ffd75633393a96ad438f147c0df5-Hasina.jpg,qjadewits_media_id=72869.pagespeed.ic.phRV67HbHa.jpg', '2015-10-24 14:33:58', 1, 12, 3, 0, 1, 1),
(44, 'Ed Sheeran plans to take few months break', 'Singer Ed Sheeran has planned to take a nine-month break from December 12.<br><br>The\r\n â€œThinking out loudâ€ crooner has had a whirlwind few years but is ready \r\nto spend some time away from the spotlight to be with his friends and \r\nfamily and has already planned his final social media post.<br><br>â€œIâ€™ll\r\n put a post out saying, â€˜Iâ€™m with friends and family - if you love me \r\nyouâ€™ll allow me to disappear for a few months and Iâ€™ll speak to you in a\r\n bitâ€™. I think a break for me is coming off my phone, social media and \r\nemails. I am constantly on my phone, texting, replying to emails, on \r\nTwitter, on Snapchat, on Facebook,â€ Sheeran told The Sun newspaper, \r\nreports femalefirst.co.uk.<br><br>â€œI just want to get off it and live \r\nand drive to places and listen to music and have normal conversations \r\nwith people and get back to normality. Iâ€™ve got a packed schedule, then,\r\n when December 12 comes, itâ€™s done,â€ he added.', '../admin/images/7f3ae6edea7913c472dee6679296594d-ed-sheeran-reuters.jpg', '2015-10-24 14:38:20', 7, 12, 1, 1, 1, 0),
(45, 'Sarah Jessica Parker feels fragrance matters a lot', '<br>â€œItâ€™s unique in that way. Your make-up doesnâ€™t do that. Your bag \r\ndoesnâ€™t do that, your shoes, or your clothes, but fragrance completely \r\nlives in both worlds,â€ Parker told The Cut magazine, reports \r\nfemalefirst.co.uk.<br><br>The 50-year-old actress released her perfume, \r\nLovely, 10 years ago and recalled the first time she was ever mesmerised\r\n by a scent.<br><br>â€œI was like 15, 16 maybe? Up to that point I was \r\nwearing probably Loveâ€™s Baby Soft, and she (actress Mary McDonnell) \r\nwould get up and spray Aliage on every day and I was hypnotised. I saved\r\n up some of my money and bought Aliage,â€ she said.<br><br>â€œWhen I went \r\nto do â€˜Square Pegsâ€™, I shared a room with my baby brother because he was\r\n really tiny. He and I shared this little room in temporary apartments \r\nor something.', '../admin/images/29d87edc9a3a4d375c37082f5953f53b-sarah-afp.jpg', '2015-10-24 14:44:43', 7, 12, 2, 1, 1, 0),
(46, 'Has Khloe called off divorce from Lamar?', 'As previously reported, Khloeâ€™s lawyer Laura Wasser went to a court on \r\nWednesday morning and asked a judge here to withdraw the papers Khloe \r\nand Lamar signed to end their marriage. The request was granted.<br><br>While\r\n the pair havenâ€™t spoken to the press about the dismissal of their \r\ndivorce, not everyone in the Jenner-Kardashian family is reportedly \r\nhappy about Khloeâ€™s decision, as Lamar had broken such promises before.<br><br>On the other hand, Khloeâ€™s relationship and James Harden remains unclear following the dismissal of the divorce papers.', '../admin/images/2da48c342721469ae6b71358092e8f85-khloe-kardashian-lamar-odom-afp.jpg', '2015-10-24 14:46:45', 7, 12, 4, 1, 1, 1),
(49, 'Road crashes kill 6 in two districts', '<p>Six people were killed and five others injured in separate road \r\naccidents in Habiganj and Moulvibazar districts on Saturday morning.</p>\r\n<p>In Habiganj, three people were killed and five others injured as a \r\nbus crashed into a human hauler on Dhaka-Sylhet road near Sayestaganj \r\npolice station in Sadar upazila in the morning.</p>\r\n<p>The deceased were identified as Shah Alam Bulbul, 40, son of Samuj \r\nAli of Nishapot village of Sadar upazila, Binod Kor, 40, son of Kajol \r\nKor of Tugli village of Bahubal upazila and human hauler driver Ziaur \r\nRahman, 28, of Haritola village of Madhobpur upazila..</p>', '../admin/images/1.jpg', '2015-10-24 15:43:48', 1, 12, 8, 1, 1, 0),
(50, 'Teenager killed in Huseni Dalan bomb blast', '<p>Bomb blasts during the Tazia procession preparation in front of \r\nHuseni Dalan in old town of Dhaka city have killed an adolescent boy and\r\n injured more than 100 people on Friday midnight.</p>\r\n<p>The deceased has been identified as Sazzad Hossain.</p>\r\n<p>Among the injured, 57 have been admitted to Dhaka Medical College \r\nHospital, 17 to Mitford Hospital and 16 others are receiving treatment \r\nat a private hospital in cityâ€™s Moghbazar area.</p>\r\n<p>Police and the witnesses said a series of blasts happened at around \r\n1:45am in front of Huseni Dalan right before a Tazia procession on the \r\neve of Ashura day today (Saturday).</p>\r\n<p>Police were deployed in the area for the security of the programmes held annually on the 10th of the Arabic month of Muharram.</p>', '../admin/images/23.jpg', '2015-10-24 15:45:35', 1, 12, 11, 0, 1, 0),
(52, 'US policy wonâ€™t harm Bangladeshâ€™s economy: Muhith', '<p>Earlier on Saturday, the US Embassy in Dhaka updated its security \r\nmessage for American citizens in Bangladesh saying terrorist threat \r\nremains â€˜real and credibleâ€™.</p>\r\nReplying to a question about the murders of two foreigners in the \r\ncountry, the minister said, â€œThereâ€™s nothing to create fuss over the \r\nrecent killing of two foreigners. Many people are also killed in the \r\nUSA. Now, the law and order situation in Bangladesh is wonderful', '../admin/images/ed52d629b6f4cc2360b28ce6b69425d5-Shale_Oil.jpg', '2015-10-24 19:21:03', 10, 12, 1, 1, 0, 0),
(53, 'Quake rocks Afghanistan and Pakistan', '<p class="story-body__introduction" style="border: 0px; color: rgb(64, 64, 64); font-family: Helmet, Freesans, Helvetica, Arial, sans-serif; font-size: 1rem; line-height: 1.375; margin: 28px 0px 0px; padding: 0px; vertical-align: baseline; background-color: rgb(255, 255, 255);"><b>More than 150 people have been killed in a powerful earthquake which has hit north-eastern Afghanistan and Pakistan.</b></p><p style="border: 0px; color: rgb(64, 64, 64); font-family: Helmet, Freesans, Helvetica, Arial, sans-serif; font-size: 1rem; line-height: 1.375; margin: 23px 0px 0px; padding: 0px; vertical-align: baseline; background-color: rgb(255, 255, 255);"><b>Tremors from the magnitude-7.5 quake were also felt in northern India and Tajikistan.</b></p><p style="border: 0px; color: rgb(64, 64, 64); font-family: Helmet, Freesans, Helvetica, Arial, sans-serif; font-size: 1rem; line-height: 1.375; margin: 18px 0px 0px; padding: 0px; vertical-align: baseline; background-color: rgb(255, 255, 255);"><b>At least 12 of the victims were Afghan schoolgirls killed in a crush as they tried to get out of their building.</b></p><p style="border: 0px; color: rgb(64, 64, 64); font-family: Helmet, Freesans, Helvetica, Arial, sans-serif; font-size: 1rem; line-height: 1.375; margin: 18px 0px 0px; padding: 0px; vertical-align: baseline; background-color: rgb(255, 255, 255);"><b>The earthquake was centred in the mountainous Hindu Kush region, 76km (45 miles) south of Faizabad,&nbsp;<a href="http://earthquake.usgs.gov/earthquakes/eventpage/us10003re5#general_summary" class="story-body__link-external" style="border-width: 0px 0px 1px; border-bottom-style: solid; border-bottom-color: rgb(220, 220, 220); color: rgb(34, 34, 34); font-family: inherit; font-style: inherit; font-variant: inherit; letter-spacing: inherit; line-height: inherit; margin: 0px; padding: 0px; vertical-align: baseline; text-decoration: none; -webkit-tap-highlight-color: rgba(17, 103, 168, 0.298039);">the US Geological Survey reported</a>.</b></p>', '../admin/images/_86329588_029814860.jpg', '2015-10-27 05:29:06', 2, 12, 2, 1, 1, 0),
(54, 'IU Kamil exam results to publish Oct 28', '<span style="font-family: Arial; font-size: 12px; text-align: justify; background-color: rgb(255, 255, 255);">Lastnewsbd,21 October,IU Correspondent: The results of first part and second part of Kamil (Masters) Examination-2013 under Islamic University in Kushtia will be published on October 28. Sources of controller of examination office confirmed the matter on Tuesday. The results will be published at 12:00pm on that day. IU Controller of Examination (In-charge) Mohammad Ali said, â€œWe have already completed all the preparations to publish the results.â€ The results will be available on the[...]</span>', '../admin/images/IU.jpg', '2015-10-27 05:35:09', 15, 12, 1, 1, 1, 0),
(55, 'Result of DU`s Kha-unit admission test published', '<p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">The result of first-year honors admission test under Kha-unit of the Dhaka University for 2015-2016 session has been published.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">The result was published around 11.00am.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">A total of 4,351 students have passed in the examination against 2,296 seats under the unit of the university.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">A total of 31,163 admission seekers applied against 2,296 seats.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">The admission test was held at total sixty-nine centres at University campus and outside the campus on last Friday.</p>', '../admin/images/du.jpg', '2015-10-27 05:37:07', 15, 12, 0, 1, 1, 0),
(56, 'WB may give $250 mln: Muhith', '<p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">The World Bank might give Bangladesh $250 million in budgetary support, not $500 million as it had offered earlier this year, Finance Minister AMA Muhith says.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">However, there are no problems over issuing the $1 billion Taka Bond by its lending arm, the International Finance Corporation (IFC), he said while speaking to bdnews24.com at the Peruvian capital.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">Muhith is heading the Bangladesh delegation at the 2015 World Bank-IMF Annual Meeting in Lima.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">On the second day of the deliberations, the finance minister had a meeting with WB Senior Vice President Kyle Peters.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">â€œWe had sought $500 million, but they will not give that much. A maximum of $250 million can be expected,â€ he said.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">During last yearâ€™s WB-IMF annual meeting, Bangladesh had sought $500 million for the 2015-16 fiscal.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">Since then, the matter was negotiated in several meetings between officials of Bangladesh government and the World Bank.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">â€œAfter a long time, the World Bank wanted to give budgetary support and we had also expressed our interest. We hope to get it and use it in this fiscal,â€ Muhith told bdnews24.com.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">The WB funds projects in Bangladesh, but after 2008 it has not given any money as budgetary support.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">â€œNo conditions are attached to these supports. The government can spend it on any sector through the budget,â€ said Muhith.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">The IFC has already started the process to issue the Taka Bond worth $1 billion, he said, adding the funds would be spent on infrastructure.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">During his meeting with Peters, he urged the global lender to appoint someone who has â€˜a clear idea about Bangladeshâ€™ to head its office in Dhaka.</p><p style="margin: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 15px; vertical-align: baseline; background-color: rgb(255, 255, 255); text-align: justify; font-family: Arial; line-height: 17.15625px;">Bangladesh Country Director Johannes Zuttâ€™s term is about to expire and the lending agency is supposed to appoint a new one in November.</p>', '../admin/images/ab.jpg', '2015-10-27 05:39:37', 10, 12, 0, 1, 1, 0),
(57, 'Rajshahi road crash kills 2', '<span style="font-family: Arial; font-size: 12px; text-align: justify; background-color: rgb(255, 255, 255);">Lastnewsbd,22 October,Rajshahi: At least two people were killed as a passenger bus hit a human hauler, locally known as Nasiman, at Sultanganj of district`s Godagari early Thursday. The deceased were identified as Delwar Hossain, 35, son of late Abdur Rahman, and Anowarul Islam, 40, son of Meser Ali. Both hailed from Anup Nagar of Chapainawabganj, neighbouring district of Rajshahi. Locals said a passenger bus of Keya Paribahan hit the human hauler when it was on the way from a petrol</span>', '../admin/images/accident-logo-08-0120140822204510.jpg', '2015-10-27 05:41:28', 1, 12, 0, 1, 1, 0),
(58, '`Remittance inflow to cross 25 billion in 2020`', '<span style="font-family: Arial; font-size: 12px; text-align: justify; background-color: rgb(255, 255, 255);">Planning Minister AHM Mustafa Kamal said that the position of Bangladesh inflow of world remittances and Bangladesh is expected to mark 25.39 billion dollars remittance inflow by 2020. The Minister made the assertion while addressing a programme titled `Safeguarding interested of Bangladesh migrant workers issue of financial influence and social protection` at capital`s Gulshan on Wednesday. He said that migrant workers always play an important role in earning[...]</span>', '../admin/images/Dollar.jpg', '2015-10-27 05:42:59', 10, 12, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_user`
--

CREATE TABLE IF NOT EXISTS `tbl_temp_user` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_gender` tinyint(1) NOT NULL,
  `user_address` text NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_country` varchar(50) NOT NULL,
  `confirm_code` varchar(65) NOT NULL,
  `join_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_temp_user`
--

INSERT INTO `tbl_temp_user` (`user_id`, `user_name`, `user_email`, `user_gender`, `user_address`, `user_password`, `user_first_name`, `user_country`, `confirm_code`, `join_date`) VALUES
(16, 'student', 'jobaer.fenibd@gmail.com', 1, 'jobaer', 'e10adc3949ba59abbe56e057f20f883e', 'md', 'bangladesh', '3f8934a4d68fc43e46786c963aadbc89', '2015-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_gender` tinyint(1) NOT NULL DEFAULT '1',
  `user_address` text NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_country` varchar(50) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `profile_pic` text NOT NULL,
  `join_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_gender`, `user_address`, `user_password`, `user_first_name`, `user_country`, `uid`, `profile_pic`, `join_date`) VALUES
(3, '', '', 1, '', '', 'gfdgdfg', '', NULL, '', '0000-00-00'),
(4, '', '', 1, '', '', '', '', NULL, '', '0000-00-00'),
(5, '', '', 1, '', '', '', '', NULL, '', '0000-00-00'),
(6, '', '', 1, '', '', '', '', NULL, '', '0000-00-00'),
(7, '', '', 1, '', '', '', '', NULL, '', '0000-00-00'),
(8, 'cvbcvbvc', 'vbcvbcvbcvbcvb', 2, 'fdgbcvb', 'vcbcvbcvbcv', 'gfdgdfg', 'bcbcvbcvb', NULL, '', '0000-00-00'),
(14, 'zone', 'gentmart4@gmail.com', 1, '1', 'e10adc3949ba59abbe56e057f20f883e', 'mohi uddin tarek2', 'fghfghfghfgh', ' 	e10adc3949ba59abbe56e057f20f883e 	', 'images/haircut.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `video_id` int(5) NOT NULL,
  `video_title` varchar(100) NOT NULL,
  `video_description` text NOT NULL,
  `video_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`video_id`, `video_title`, `video_description`, `video_name`) VALUES
(4, 'dgfdg', 'gfdgfdg', 'qTpXgQmsW6k'),
(5, 'Shakib Al Hasans 46 power KKR', 'Shakib Al Hasans 46 power KKR', 'hiteHLc5aCI'),
(6, 'Relax 8 Hours-Relaxing Nature Sounds-Study-Sleep-Meditation-Water Sounds-Bird Song ', '<h1 class="yt watch-title-container"><span id="eow-title" class="watch-title " dir="ltr" title="Relax 8 Hours-Relaxing Nature Sounds-Study-Sleep-Meditation-Water Sounds-Bird Song">Relax 8 Hours-Relaxing Nature Sounds-Study-Sleep-Meditation-Water Sounds-Bird Song\r\n  </span></h1>', 'eKFTSSKCzWA'),
(7, 'Wonderful Earth Nature film ', '<h1 class="yt watch-title-container"><span id="eow-title" class="watch-title " dir="ltr" title="Wonderful Earth Nature film">Wonderful Earth Nature film\r\n  </span></h1>', '3TTswKT9J9g'),
(8, 'Valley of the Wolves Wild Nature Documentary 2015 ', '<h1 class="yt watch-title-container"><span id="eow-title" class="watch-title " dir="ltr" title="Valley of the Wolves Wild Nature Documentary 2015">Valley of the Wolves Wild Nature Documentary 2015\r\n  </span></h1>', 'xUEM8mc_3ZA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ad`
--
ALTER TABLE `tbl_ad`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_temp_user`
--
ALTER TABLE `tbl_temp_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ad`
--
ALTER TABLE `tbl_ad`
  MODIFY `ad_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `image_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tbl_temp_user`
--
ALTER TABLE `tbl_temp_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `video_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
