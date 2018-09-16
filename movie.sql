-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 03:51 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_rating`
--

CREATE TABLE `comment_rating` (
  `comment_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_rating`
--

INSERT INTO `comment_rating` (`comment_id`, `movie_id`, `id`, `comment`, `rating`) VALUES
(1, 1, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable.', 4),
(2, 1, 2, 'good movie', 4),
(3, 1, 6, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 5),
(4, 1, 7, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 5),
(5, 1, 8, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable.', 4),
(6, 1, 11, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable.', 3),
(7, 2, 6, 'It''s scaryï»¿. I thought this was the real movieï»¿', 2),
(8, 3, 6, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 2),
(9, 9, 7, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised ', 3),
(10, 2, 12, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,', 4),
(11, 2, 11, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable.', 3),
(12, 10, 7, 'fhsadfkhfkwhfwddljfdljf\r\n', 4);

-- --------------------------------------------------------

--
-- Table structure for table `moviedetails`
--

CREATE TABLE `moviedetails` (
  `movie_id` int(20) NOT NULL,
  `moviename` varchar(255) NOT NULL,
  `director` text NOT NULL,
  `cast` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `moviepic` text NOT NULL,
  `avgrate` float(4,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moviedetails`
--

INSERT INTO `moviedetails` (`movie_id`, `moviename`, `director`, `cast`, `description`, `category`, `moviepic`, `avgrate`, `created_at`) VALUES
(1, 'Train to Busan (2016)', 'Sang-ho Yeon', 'Yoo Gong, Yu-mi Jung, Dong-seok Ma', 'Sok-woo, a father with not much time for his daughter, Soo-ahn, are boarding the KTX, a fast train that shall bring them from Seoul to Busan. But during their journey, the apocalypse begins, and most of the earth''s population become flesh craving zombies. While the KTX is shooting towards Busan, the passenger''s fight for their families and lives against the zombies - and each other.', 'Horror', 'Heropage-980x560_62.jpg', 4.17, '2017-12-02 20:27:18'),
(2, 'The Conjuring (2013)', 'James Wan', 'Patrick Wilson, Vera Farmiga, Ron Livingston', 'In 1971, Carolyn and Roger Perron move their family into a dilapidated Rhode Island farm house and soon strange things start happening around it with escalating nightmarish terror. In desperation, Carolyn contacts the noted paranormal investigators, Ed and Lorraine Warren, to examine the house. What the Warrens discover is a whole area steeped in a satanic haunting that is now targeting the Perron family wherever they go. To stop this evil, the Warrens will have to call upon all their skills and spiritual strength to defeat this spectral menace at its source that threatens to destroy everyone involved.', 'Horror', 'blogger-image-402376143.jpg', 3.00, '2017-12-02 20:34:55'),
(3, 'I Saw the Devil (2010)', 'Jee-woon Kim (as Kim Jee-woon)', ' Byung-hun Lee, Min-sik Choi, Joon-hyeok Lee', 'Jang Kyung-chul (Choi Min-sik) is a dangerous psychopath serial killer. He has committed infernal serial murders in diabolic ways that one cannot even imagine and his victims range from young women to even children. The police have chased him for a long time, but were unable to catch him. One day, Joo-yeon, daughter of a retired police chief becomes his prey and is found dead in a horrific state. Her fiancÃ© Soo-hyun (Lee Byung-hun), a top secret agent, decides to track down the murderer himself. He promises himself that he will do everything in his power to take bloody vengeance against the killer, even if it means that he must become a monster himself to get this monstrous and inhumane killer.', 'Horror', 'maxresdefault.jpg', 2.00, '2017-12-02 20:37:57'),
(4, 'Justice League (2017)', 'Zack Snyder', 'Ben Affleck, Gal Gadot, Jason Momoa', 'Fueled by his restored faith in humanity and inspired by Superman''s selfless act, Bruce Wayne enlists the help of his newfound ally, Diana Prince, to face an even greater enemy. Together, Batman and Wonder Woman work quickly to find and recruit a team of metahumans to stand against this newly awakened threat. But despite the formation of this unprecedented league of heroes-Batman, Wonder Woman, Aquaman, Cyborg and The Flash-it may already be too late to save the planet from an assault of catastrophic proportions.', 'Action', 'maxresdefault (1).jpg', 0.00, '2017-12-02 20:39:16'),
(5, 'Thor: Ragnarok (2017)', 'Taika Waititi', 'Chris Hemsworth, Tom Hiddleston, Cate Blanchett', 'Thor is imprisoned on the other side of the universe and finds himself in a race against time to get back to Asgard to stop Ragnarok, the destruction of his homeworld and the end of Asgardian civilization, at the hands of an all-powerful new threat, the ruthless Hela.', 'Action', 'maxresdefault (2).jpg', 0.00, '2017-12-02 20:40:26'),
(6, 'Wonder Woman (2017)', 'Patty Jenkins', 'Gal Gadot, Chris Pine, Robin Wright', 'Diana, princess of the Amazons, trained to be an unconquerable warrior. Raised on a sheltered island paradise, when a pilot crashes on their shores and tells of a massive conflict raging in the outside world, Diana leaves her home, convinced she can stop the threat. Fighting alongside man in a war to end all wars, Diana will discover her full powers and her true destiny.', 'Action', 'WWMovie.jpg', 0.00, '2017-12-02 20:56:00'),
(7, 'Titanic (1997)', 'James Cameron', 'Leonardo DiCaprio, Kate Winslet, Billy Zane', '84 years later, a 100 year-old woman named Rose DeWitt Bukater tells the story to her granddaughter Lizzy Calvert, Brock Lovett, Lewis Bodine, Bobby Buell and Anatoly Mikailavich on the Keldysh about her life set in April 10th 1912, on a ship called Titanic when young Rose boards the departing ship with the upper-class passengers and her mother, Ruth DeWitt Bukater, and her fiancÃ©, Caledon Hockley. Meanwhile, a drifter and artist named Jack Dawson and his best friend Fabrizio De Rossi win third-class tickets to the ship in a game. And she explains the whole story from departure until the death of Titanic on its first and last voyage April 15th, 1912 at 2:20 in the morning.', 'Romantic', 'titanic1.jpg', 0.00, '2017-12-02 20:59:32'),
(8, 'A Walk to Remember (2002)', 'Adam Shankman', 'Mandy Moore, Shane West, Peter Coyote', 'In North Carolina especially in Beaufort a prank on a guy goes wrong and puts the student in the clinic. Carter, a famous student with no plans for the future, is held responsible and forced to join in after-school community service activities as consequence, which include starring as the lead in the play. And participating in these activities is Jamie Sullivan, the reverend''s daughter who has great ambitions and nothing in common with Landon. When Landon decides he wants to take his activities seriously, he asks Jamie for help and begins to spend most of his time with her. But he starts to like her, that he did not expect to do. They relationship, much to the chagrin of Landon''s old popular friends and Jamie''s strict reverend father. But when a heart-breaking secret becomes known that puts their relationship to the test, it is then that Landon and Jamie realize the true meaning of love and fate.', 'Romantic', '9da8f23d8a62daa6ad861f464d88287c--nicholas-sparks-books-nicholas-dagosto.jpg', 0.00, '2017-12-02 21:01:36'),
(9, 'My Sassy Girl (2008)', 'Yann Samuell', 'Elisha Cuthbert, Jesse Bradford, Austin Basis', 'My Sassy Girl is the tale of the first and last time Charlie Bello falls in love. From their initial meeting, trouble is the name of the game. Imagine an amorphous mass of dating disasters and you get an idea of the relationship between the young couple. Some mysterious force with the strength of gravity between two planets must be at play between Charlie and Jordan as the relationship truly makes no sense on the surface. Everything seems pitted against the two of them. Things suddenly come to a halt when the two write letters confessing their love for each other. Agreeing to meet a year later to read the love letters together, Charlie and Jordan go their separate ways.', 'Romantic', 'my-sassy-girl-movie-poster-500x400.jpg', 3.00, '2017-12-02 21:02:50'),
(10, 'Annabelle (2014)', ' John R. Leonetti', 'Eric Ladin, Brian Howe and Alfre Woodard ', 'In 1969 in Santa Monica, John Form, a doctor, presents his expectant wife Mia with a rare vintage porcelain doll as a gift for their first child to be placed in a collection of dolls in their daughter''s nursery.\r\nThat night, the couple is disturbed by the sounds of their next door neighbors, the Higgins, being murdered during a home invasion. While Mia calls the police, she and John are attacked by the Higgins'' killers. The police arrive and shoot the man dead while the woman commits suicide by slitting her own throat inside the nursery while holding the porcelain doll. News reports identify the assailants as the Higgins'' estranged daughter, Annabelle, and her unidentified boyfriend, both members of a cult.', 'Horror', 'images.jpg', 4.00, '2017-12-03 18:35:14'),
(11, 'Logan (2017)', 'James Mangold', 'Hugh Jackman.Patrick Stewart ', 'Gabriela Lopez, a former nurse for biotechnology corporation Alkali-Transigen, tries to hire Logan to escort her and an 11-year-old girl, Laura, to Eden, a refuge in North Dakota. Logan reluctantly accepts, but finds Gabriela killed. He is confronted at his hideout by Gabriela''s killer, Donald Pierce, Transigen''s cyborg chief of security, who is looking for Laura. Laura has stowed away in Logan''s limo, and has powers like Logan''s. She, Logan and Charles escape Pierce and his Reavers, but Caliban is captured and tortured by Pierce into tracking Laura.', 'Action', 'Logan_2017_poster.jpg', 0.00, '2017-12-03 18:40:27'),
(12, 'Their Finest (2017)', 'Lone Scherfig', 'Gemma Arterton , Sam Claflin, screenwriter Jack Huston', 'The film is set in London in 1940. Catrin Cole is summoned to an interview at the Ministry of Information, where she is taken on to write script for short information films. Her husband Ellis Cole is a war artist, unable to secure an exhibition and exempted from conscription due to a Spanish Civil War leg wound. He is initially accepting of her job, but when she becomes the only wage earner he begins to feel threatened and plans to send her back home to Wales, on the pretence of keeping her safe from the London Blitz.', 'Romantic', '299514.jpg', 0.00, '2017-12-03 18:48:06'),
(13, 'The Big Sick (2017)', 'Michael Showalter', 'Linda Emond,Kurt Braunohler', 'Kumail is a young Chicago standup comedian who drives for Uber and performs at night. He has a one-man show about his Pakistani background. His Muslim immigrant parents set him up with Pakistani women, hoping he will follow their example of an arranged marriage, but he is uninterested.', 'Romantic', '024a_tbs_sg_30719-h_2017.jpg', 0.00, '2017-12-03 18:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `registerrs`
--

CREATE TABLE `registerrs` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registerrs`
--

INSERT INTO `registerrs` (`id`, `firstname`, `lastname`, `email`, `password`, `user_type`, `created_at`) VALUES
(7, 'meem ', 'zeba', 'zeba@mail.com', '123456', 'user', '2017-11-13 07:27:29'),
(11, 'Rulia', 'Islam', 'rulila12@yahoo.com', '123456', 'user', '2017-12-01 07:37:52'),
(12, 'Ashik', 'Mahmud', 'ashik@gmail.com', '123654', 'user', '2017-12-03 18:18:51'),
(13, 'Shahrin', 'Nasrin', 'ana@gmail.com', '853206', 'admin', '2017-12-03 18:25:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_rating`
--
ALTER TABLE `comment_rating`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `moviedetails`
--
ALTER TABLE `moviedetails`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `registerrs`
--
ALTER TABLE `registerrs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_rating`
--
ALTER TABLE `comment_rating`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `moviedetails`
--
ALTER TABLE `moviedetails`
  MODIFY `movie_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `registerrs`
--
ALTER TABLE `registerrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
