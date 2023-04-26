-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 21, 2022 at 09:53 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarttech`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attempts` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `user_id`, `attempts`) VALUES
(1, 1, 1),
(2, 7, 1),
(3, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `posted_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `body`, `posted_at`) VALUES
(3, 8, 'Lorem Ipsum', 'lorem-ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum iaculis eu non diam phasellus vestibulum lorem. Ultrices tincidunt arcu non sodales neque. Commodo sed egestas egestas fringilla phasellus. Mauris a diam maecenas sed. Id volutpat lacus laoreet non curabitur gravida arcu ac tortor. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Interdum consectetur libero id faucibus nisl tincidunt eget. Pulvinar elementum integer enim neque volutpat. Sagittis aliquam malesuada bibendum arcu vitae elementum curabitur vitae. Nec nam aliquam sem et. Pulvinar sapien et ligula ullamcorper malesuada. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Lacinia at quis risus sed vulputate odio ut enim. Sit amet tellus cras adipiscing enim eu turpis egestas pretium.', 1658885045),
(5, 7, 'my First Post', 'my-first-post', 'ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum iaculiswdsfdafasddfd..', 1658961222),
(6, 7, 'my second post', 'my-second-post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum iaculis eu non diam phasellus vestibulum lorem. Ultrices tincidunt arcu non sodales neque. Commodo sed egestas egestas fringilla phasellus. Mauris a diam maecenas sed.', 1658966509),
(7, 7, 'try new post on dashboard', 'try-new-post-on-dashboard', 'try new post on dashboardtry new post on dashboardtry new post on dashboardtry new post on dashboardtry new post on dashboard', 1658969493),
(16, 7, 'new post post new', 'new-post-post-new', 'new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new new post post new', 1659540300),
(18, 7, 'new post try with pic', 'new-post-try-with-pic', 'new post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with pic', 1659543965),
(19, 7, 'new post try with pic', 'new-post-try-with-pic', 'new post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with picnew post try with pic', 1659546431),
(21, 7, 'new post without image', 'new-post-without-image', 'new post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without image', 1659621966),
(22, 7, 'new post without image', 'new-post-without-image', 'new post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without imagenew post without image', 1659623480),
(23, 7, 'with image a new Post', 'with-image-a-new-post', 'with image a new Postwith image a new Postwith image a new Postwith image a new Postwith image a new Postwith image a new Postwith image a new Postwith image a new Postwith image a new Postwith image a new Postwith image a new Post', 1659623559),
(24, 7, 'final test post', 'final-test-post', 'final test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test post', 1660180547),
(25, 7, 'final test post with image', 'final-test-post-with-image', 'final test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test postfinal test post', 1660180609),
(26, 7, 'new post with java script langauge', 'new-post-with-java-script-langauge', 'new post with java script langaugenew post with java script langaugenew post with java script langaugenew post with java script langaugenew post with java script langaugenew post with java script langaugenew post with java script langaugenew post with java script langaugenew post with java script langaugenew post with java script langaugenew post with java script langaugenew post with java script langauge.', 1660531175),
(27, 7, 'the final test post without image', 'the-final-test-post-without-image', 'ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1661117356),
(28, 7, 'the final test post with image', 'the-final-test-post-with-image', 'ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1661117415),
(29, 10, 'try post', 'try-post', 'hey here ist my first post\r\nhey here ist my first posthey here ist my first posthey here ist my first posthey here ist my first posthey here ist my first posthey here ist my first posthey here ist my first posthey here ist my first posthey here ist my first posthey here ist my first posthey here ist my first post', 1661118745);

-- --------------------------------------------------------

--
-- Table structure for table `posts_likes`
--

CREATE TABLE `posts_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts_likes`
--

INSERT INTO `posts_likes` (`id`, `user_id`, `post_id`) VALUES
(5, 7, 5),
(6, 7, 6),
(10, 7, 20),
(3, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `commented_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `body`, `commented_at`) VALUES
(1, 7, 5, 'my first comment for this user', 214748364),
(2, 7, 5, 'dfdgdf', 1660152781),
(3, 7, 5, 'hallo World', 1660154867),
(4, 7, 3, 'hey there', 1660155013),
(5, 7, 6, 'hallo', 1660316738),
(6, 7, 26, 'nice!', 1660531223);

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `post_id`, `filename`, `created_at`) VALUES
(8, 19, '0e62a60b7d2b1e9206ed7be50f3f4f17.jpg', 1659546431),
(9, 23, 'cd7d8dc7866a786c5f47f93cac4bb355.jpg', 1659623559),
(10, 25, 'c68a550c71018dd05938446806f711e0.jpg', 1660180609),
(11, 26, '58e2182f75f01242f9f039cd7b3e521f.jpg', 1660531175),
(12, 28, '7263af5a6a51a97e523cfa0b50b8b861.png', 1661117415);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'editor'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `gender`, `first_name`, `last_name`, `password`) VALUES
(1, 'mohammad', 'test@test.test', '', 'mohammad', 'sa', 'Password1234'),
(2, 'mat', 'mat@test.test', '', 'mathis', 'müller', 'mathispassword'),
(3, 'asdsad', 'test@gmail.de', '', 'asds', 'adsad', '$2y$10$zrbMpI5tX2iCujWbIsJpIeg21L6tktRxIc.P1PlfSP48w/z1zByPm'),
(4, 'asa', 'asa@test.test', 'male', 'asa', 'asa', '$2y$10$rjmiSzJytpq/yCHKffC8FuRCr.8RIThBvWNoSLaM4iDEK.2vuzgxW'),
(5, 'hansglück', 'hans@test.test', 'male', 'hans', 'glück', '$2y$10$kdZQLRMWpvMxXrffJOO1SO5omepWFHM7ag2TjHZaSxd2afb22LnT.'),
(6, 'sam.simo', 'sam@sam.sam', 'male', 'sam', 'sami', '$2y$10$RJySmEtY0aJ4YYQ4V0g8v./rsVhqGsmw9MaO/2IpeKKss0CfOfgcO'),
(7, 'sarah93', 'sarah@test.test', 'female', 'sarah', 'klein', '$2y$10$u1R.hF/qOxb2l8.X/MmyX.S8zSqziNKwp02GNmB1FvpCiytJq6eDe'),
(8, 'maximax', 'max@test.te', 'male', 'maxi', 'gross', '$2y$10$7p1Y2qB3LvPlPUV6xWYdR.zoddTBT5XQcW88ItqSSSugUjXNr9lqG'),
(9, 'testuser', 'testuser@test.test', 'male', 'first', 'last', '$2y$10$GDmvJUjd6jwgVq08maEzLu9G1.eKC7oMFpaGoZvDPzG40Vow5LKWW'),
(10, 'botuser', 'bot@test.test', 'male', 'bot', 'robot', '$2y$10$1aEDnn4xlnwqUq5n.xxCJuaxlC.H0JtEMbXg8sZAuCwozcek/MUxS');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 7, 3),
(5, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`post_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `posts_likes`
--
ALTER TABLE `posts_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD CONSTRAINT `login_attempts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_images`
--
ALTER TABLE `post_images`
  ADD CONSTRAINT `post_images_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
