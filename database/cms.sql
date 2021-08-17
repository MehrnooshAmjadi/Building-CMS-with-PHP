-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2021 at 09:29 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Bootstrap'),
(13, 'Java'),
(18, 'Rubi'),
(19, 'C++'),
(20, 'C#'),
(21, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_date`, `comment_status`, `comment_content`) VALUES
(2, 1, 'sara', 'sara@gmail.com', '2021-07-26', 'approved', 'Awesome News!'),
(4, 1, 'Aida', 'aida@yahoo.com', '2021-07-26', 'approved', 'great post!'),
(5, 8, 'Nada', 'nada@yahoo.com', '2021-07-26', 'approved', 'This is fake!'),
(6, 1, 'Ali', 'ali@gmail.com', '2021-07-26', 'approved', 'I like this post'),
(7, 1, 'Mehrnoosh', 'Mehrnoosh@gmail.com', '2021-07-26', 'approved', 'I love it.'),
(8, 5, 'Yalda', 'Yalda@gmail.com', '2021-07-26', 'approved', 'I love you both.'),
(9, 10, '', '', '2021-08-10', 'Unapprove', ''),
(10, 8, 'ana', 'a@yahoo.com', '2021-08-10', 'approved', 'great!!');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_cat_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 2, 'China accused of cyber-attack on Microsoft Exchange servers', 'Gordon Corera', '2021-07-19', 'microsoft.jpg', 'The UK, US and EU have accused China of carrying out a major cyber-attack earlier this year.\r\n\r\nThe attack targeted Microsoft Exchange servers, affecting at least 30,000 organisations globally.\r\n\r\nWestern security services believe it signals a shift from a targeted espionage campaign to a smash-and-grab raid, leading to concerns Chinese cyber-behaviour is escalating.\r\n\r\nThe Chinese Ministry of State Security (MSS) has also been accused of wider espionage activity and a broader pattern of \"reckless\" behaviour.\r\n\r\nChina has previously denied allegations of hacking and says it opposes all forms of cyber-crime.\r\n\r\nThe unified call-out of Beijing shows the gravity with which this case has been taken. Western intelligence officials say aspects are markedly more serious than anything they have seen before.\r\n\r\nIt began in January when hackers from a Chinese-linked group known as Hafnium began exploiting a vulnerability in Microsoft Exchange. They used the vulnerability to insert backdoors into systems which they could return to later. ', 'Cyber-security, Microsoft', 4, 'draft'),
(5, 21, 'Mehrnoosh & Reza on  holiday', 'Hanane', '2021-08-09', 'photo5868323025114478582.jpg', 'dksokedkpow;ad', 'Course, Class, AI, DL, Deep Learning', 1, 'published'),
(8, 21, 'Zuckerberg wants Facebook to become online metaverse', 'Minoosh', '2021-07-26', '_119547646_zuck.jpg', 'One application of the metaverse he gave was being able to jump virtually into a 3D concert after initially watching on a mobile phone screen.', 'Facebook, metaverse', 2, 'draft'),
(9, 20, 'Tesla profit surge driven by record car deliveries', 'Leza', '2021-07-26', '_118164215_0x0-model_y_02.jpg', 'Tesla has reported surging profits, despite shortages of semiconductor chips and congestion at ports hampering production.\r\n\r\nSales rose to $12bn (Â£8.6bn) in the three months to the end of June, up from $6bn a year ago, when its US factory was shut down.\r\n\r\nThe electric carmaker said it delivered a record 200,000 cars to customers in the same period.\r\n\r\nIt added that public support for greener cars was greater than ever.\r\n\r\nThe company, led by billionaire entrepreneur Elon Musk, reported on Monday that profits soared off the back of strong sales.', 'Tesla, Driving', 0, 'published'),
(10, 19, 'Apple to scan iPhones for child sex abuse images', 'Minoosh', '2021-08-09', '_114216736_hi025529864.jpg', 'Before an image is stored onto iCloud Photos, the technology will search for matches of already known CSAM.\r\n\r\nApple said that if a match is found a human reviewer will then assess and report the user to law enforcement. ', 'Apple, iPhone, C++', 1, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_salt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_salt`) VALUES
(1, 'minooshleza', 'noonoosh', 'mehrnoosh', 'amjadi', 'minoosh@yahoo.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(2, 'payam', 'ahmadi', 'payam', 'shoostari', 'payam@yahoo.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(4, 'hana_90', 'hana', 'hana', 'ahmadi', 'hana@yahoo.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(5, 'mona68', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', 'mona', 'monaee', 'mona68@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
