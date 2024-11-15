-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql10.namesco.net
-- Generation Time: Nov 11, 2024 at 02:54 PM
-- Server version: 10.3.39-MariaDB-log
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PH587033_kickstartyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `twitter_users`
--

CREATE TABLE `twitter_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_link` varchar(255) NOT NULL,
  `last_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `twitter_users`
--

INSERT INTO `twitter_users` (`id`, `username`, `description`, `img_link`, `last_modified`) VALUES
(95, 'Edsheeran', '<a href=\"http://facebook.com/EdSheeranMusic\" target=\"_blank\">Facebook.com/EdSheeranMusic</a>', '', 1439395974),
(99, 'calvinharris', 'Music producer', '', 1439395974),
(103, 'justinbieber', 'Let\'s make the world better, together. Join my fan club @officialfahlo and add me on @shots \'justinbieber\'.\r\n\r\n<a href=\"http://youtube.com/justinbieber\" target=\"_blank\">YouTube.com/JustinBieber</a>', '', 1439395974),
(105, 'MTV', 'The official Twitter account for MTV, USA! Tweets by @Kaitiii | Snapchat/KiK: MTV\r\n\r\n<a href=\"http://mtv.com\" target=\"_blank\">MTV.com</a>', '', 1439395974),
(107, 'harry_styles', 'Raconteur.\r\n\r\n<a href=\"http://onedirectionmusic.com\" target=\"_blank\">OneDirectionMusic.com</a>', '', 1439395975),
(109, 'NiallOfficial', 'Back on the road again, gona be an incredible year!\r\n\r\n<a href=\"http://onedirectionmusic.com\" target=\"_blank\">OneDirectionMusic.com</a>', '', 1439395975),
(111, 'Louis_Tomlinson', '1/5 of One Direction :) Live life for the moment because everything else is uncertain! We would be nowhere without our incredible fans, we owe it all to you.', '', 1439395975),
(119, 'jtimberlake', 'The Official Twitter of Justin Timberlake\r\n\r\n<a href=\"http://justintimberlake.com\" target=\"_blank\">JustinTimberlake.com</a>', '', 1439395976),
(125, 'deadmau5', '<a href=\"http://live.deadmau5.com\" target=\"_blank\">live.deadmau5.com</a>', '', 1439395976),
(127, 'KylieJenner', '<a href=\"http://KendallandKylie.com\" target=\"_blank\">KendallandKylie.com</a>', '', 1439395976),
(129, 'foofighters', '<a href=\"http://foofighters.com\" target=\"_blank\">FooFighters.com</a> ', '', 1439395977),
(131, 'richardbranson', 'Tie-loathing adventurer, philanthropist & troublemaker, who believes in turning ideas into reality. Otherwise known as Dr Yes at @virgin!\r\n\r\n<a href=\"http://www.virgin.com/richard-branson\" target=\"_blank\">Virgin.com/Richard-Branson</a>', '', 1439395977),
(133, 'Virgin', 'Welcome! This is the official Twitter page for the Virgin Group - sharing news, views and fun from around the Virgin universe\r\n\r\n<a href=\"http://virgin.com\" target=\"_blank\">Virgin.com</a>', '', 1439395977),
(135, 'selenagomez', 'Philippians 4:13 oh and remember you are awesome.\r\n\r\n<a href=\"http://smarturl.it/GoodForYouSG\" target=\"_blank\">GoodForYouSG</a>', '', 1439395977),
(137, 'BBC', 'Our mission is to enrich your life and to inform, educate and entertain you, wherever you are. \r\n\r\n<a href=\"http://bbc.co.uk\" target=\"_blank\">BBC.co.uk</a>', '', 1439395978),
(143, 'EmRata', 'OFFICIAL TWITTER OF EMILY RATAJKOWSKI <a href=\"https://www.facebook.com/Officialemilyratajkowski\" target=\"_blank\">Facebook.com/OfficialEmilyRatajkowski</a>\r\n\r\n<a href=\"http://emrata.com/Officialemilyratajkowski\" target=\"_blank\">emrata.com</a> ', '', 1439395978),
(145, 'LewisHamilton', 'H.A.M til the day i die!! #TeamLH \r\n\r\n<a href=\"https://www.youtube.com/lewishamilton\" target=\"_blank\">YouTube.com/LewisHamilton</a>\r\n<a href=\"http://www.facebook.com/lewishamilton\" target=\"_blank\">Facebook.com/LewisHamilton</a>\r\n<a href=\"http://instagram.com/lewishamilton\" target=\"_blank\">Instagram.com/LewisHamilton</a>\r\n<a href=\"http://lewishamilton.com\" target=\"_blank\">LewisHamilton.com</a>\r\nlewishamilton.com', '', 1439395978),
(147, 'Twitter', 'Your official source for news, updates and tips from Twitter, Inc. Need help? Visit \r\n<a href=\"http://support.twitter.com\" target=\"_blank\">Support.Twitter.com</a>\r\n\r\n<a href=\"http://blog.twitter.com\" target=\"_blank\">Blog.Twitter.com</a>', '', 1439395978),
(155, 'MileyCyrus', '<a href=\"http://miley.lk/happyhippie\" target=\"_blank\">miley.lk/happyhippie</a>', '', 1439395979),
(157, 'britneyspears', 'Itâ€™s Britney Bitch! Get #PieceOfMe tickets now! http://britney.lk/pieceofmetix\r\n\r\n<a href=\"http://britney.lk/pieceofmetix\" target=\"_blank\">britney.lk/pieceofmetix </a>', '', 1439395979),
(161, 'NICKIMINAJ', '<a href=\"http://itun.es/us/AYao5\" target=\"_blank\">itun.es/us/AYao5</a>', '', 1439395979),
(163, 'O2', 'Hi. Weâ€™re O2. We like tweeting & technology & all the other exciting stuff in life. Turning the world around, one cat at a time. Live more. Do more.\r\n<a href=\"https://twitter.com/hashtag/bemoredog?src=hash\" target=\"_blank\">#bemoredog</a>\r\n\r\n<a href=\"http://bemoredog.com\" target=\"_blank\">bemoredog.com</a>', '', 1439395979),
(167, 'nickjonas', '<a href=\"http://nickjonas.com/events\" target=\"_blank\">nickjonas.com/events</a>\r\n', '', 1439395980),
(169, 'JKCorden', 'Dancer. Ballet, Tap and Modern. I dont read DM\'s!', '', 1439395980),
(171, 'Eminem', '<a href=\"http://smarturl.it/MMLP2\" target=\"_blank\">smarturl.it/MMLP2</a>\r\n\r\n<a href=\"http://eminem.com\" target=\"_blank\">eminem.com</a>', '', 1439395980),
(385, 'mike_hodkinson', 'Entrepreneur | Sports Car Lover | General Happy Guy | Customer Experience Specialist for http://names.co.uk @blossomfuliy â¤ï¸', '', 0),
(387, 'tinkywinkwink', '', '', 0),
(389, 'JoelIeHughes', 'I\'m Joelle & I\'m from Kent :)', '', 0),
(401, 'Shockerfeeds', 'Publishing stories, videos and viral trends on the web.', '', 0),
(403, 'abbienot2shabby', 'Global', '', 0),
(405, 'AlinaIicious', 'Social Influencer & Global Superstar', '', 0),
(407, 'Harley_north', 'Life\'s too short to be serious', '', 0),
(417, 'ninanesbitt', 'under construction, returning in 2017 \r\nMGMT- vicky@vdmmusic.com instagram.com/ninanesbitt ', '', 0),
(419, 'FTfundraiser', 'Use our crowdfunding website! We help you reach your dreams and the dreams of others, bring your big idea to us and we\'ll help you find the people to fund it!\r\nhttp://fulltimefundraiser.com', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `twitter_users`
--
ALTER TABLE `twitter_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `twitter_users`
--
ALTER TABLE `twitter_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
