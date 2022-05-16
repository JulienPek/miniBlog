-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 mai 2022 à 08:39
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetminiblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Zelda'),
(2, 'Mario');

-- --------------------------------------------------------

--
-- Structure de la table `comz`
--

CREATE TABLE `comz` (
  `id` int(5) NOT NULL,
  `pseudo` int(5) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `post_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comz`
--

INSERT INTO `comz` (`id`, `pseudo`, `content`, `post_id`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo molestie felis, id vulputate elit consequat id. Aenean efficitur, risus non convallis pulvinar, quam est ornare nibh, vitae tincidunt nisi quam ac velit. Aliquam vehicula pellentesque augue eu ultricies. Maecenas semper bibendum tortor a maximus. Cras sit amet aliquet odio, et consectetur erat. Ut tempor erat ut enim vulputate, in tempor urna mattis. Aenean eros nibh, pharetra finibus sapien id, dignissim ultricies dui.', 1),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo molestie felis, id vulputate elit consequat id. Aenean efficitur, risus non convallis pulvinar, quam est ornare nibh, vitae tincidunt nisi quam ac velit. Aliquam vehicula pellentesque augue eu ultricies. Maecenas semper bibendum tortor a maximus. Cras sit amet aliquet odio, et consectetur erat. Ut tempor erat ut enim vulputate, in tempor urna mattis. Aenean eros nibh, pharetra finibus sapien id, dignissim ultricies dui.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(5) NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `author_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(250) COLLATE utf8_bin NOT NULL,
  `category_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author_id`, `date`, `image`, `category_id`) VALUES
(1, 'Mario is dead', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis felis, ornare non mollis in, eleifend et est. Quisque vel pellentesque ligula. Donec blandit risus dapibus, commodo elit sed, ornare justo. Praesent fringilla nunc elit, in molestie massa dictum eget. Aenean rhoncus volutpat odio feugiat rutrum. Phasellus lacus ipsum, pharetra in gravida id, dapibus in erat. Praesent dapibus diam sed ex auctor consectetur. Pellentesque sit amet ligula massa. Vestibulum quam ipsum, condimentum scelerisque vestibulum et, lacinia vel mauris. Curabitur interdum tortor at aliquet molestie. Maecenas a enim ut nisl tristique dignissim. Donec at quam eros. Praesent ultricies nisl sapien, ut consequat dui scelerisque id.\r\n\r\nSuspendisse ut auctor turpis, ut iaculis elit. Integer bibendum purus id sapien laoreet, nec fermentum est porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vitae neque tincidunt, sodales augue nec, eleifend dui. Aliquam eget lectus ac dolor mollis tincidunt at eu sem. Suspendisse enim ex, tempus eget posuere sit amet, dictum nec dui. Mauris condimentum, purus eget scelerisque lacinia, ante neque porta tortor, sed porttitor justo nisl vel purus. Nulla ornare nunc ac est sagittis, et mollis tortor viverra. Etiam vitae fringilla leo. Nulla vel ante turpis.\r\n\r\nVestibulum vel scelerisque urna, sit amet fermentum tellus. Sed sagittis fringilla orci ut mattis. Duis bibendum augue a sem interdum tempor. Fusce orci metus, posuere sed nunc et, euismod gravida tellus. Nulla dictum justo magna, ac condimentum magna lacinia vel. Nam quis eleifend tortor. Pellentesque semper tempor mi a eleifend. In hac habitasse platea dictumst. Quisque vestibulum lorem eu auctor ornare. Integer vel mi nibh. Praesent sed ante et elit efficitur rutrum. Proin non est sed arcu congue viverra. Donec quis accumsan purus.\r\n\r\nNullam gravida eleifend mattis. Aenean luctus tempor lectus vitae condimentum. Morbi dignissim augue purus, quis congue neque commodo ac. Donec at aliquet risus. In tellus orci, feugiat eleifend erat sit amet, ullamcorper dapibus metus. Quisque fermentum scelerisque augue, nec vestibulum sapien porta et. Maecenas vehicula dictum ligula at fermentum. Vivamus suscipit sit amet felis sit amet rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam in risus metus. Nunc sodales, sapien et ultricies rutrum, turpis sapien gravida purus, ut auctor erat lectus at elit. Aliquam erat volutpat. Maecenas id quam vehicula, luctus justo et, volutpat diam. Duis vel sodales purus.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus vel est congue, tempor nulla id, volutpat orci. Praesent mollis venenatis massa non tincidunt. Cras interdum, velit at tristique tempus, nibh velit venenatis magna, vitae gravida velit metus sit amet erat. Sed ultricies auctor purus, id faucibus felis aliquet at. Integer ac semper ex. Nulla maximus leo et augue egestas, ut efficitur neque semper. Phasellus pretium dolor sit amet volutpat dictum. Proin auctor, nibh a dignissim viverra, diam leo gravida lectus, at vestibulum est orci eu augue.', 1, '2022-05-02', './images/Mario.jpg', 2),
(2, 'New Zelda Game', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis felis, ornare non mollis in, eleifend et est. Quisque vel pellentesque ligula. Donec blandit risus dapibus, commodo elit sed, ornare justo. Praesent fringilla nunc elit, in molestie massa dictum eget. Aenean rhoncus volutpat odio feugiat rutrum. Phasellus lacus ipsum, pharetra in gravida id, dapibus in erat. Praesent dapibus diam sed ex auctor consectetur. Pellentesque sit amet ligula massa. Vestibulum quam ipsum, condimentum scelerisque vestibulum et, lacinia vel mauris. Curabitur interdum tortor at aliquet molestie. Maecenas a enim ut nisl tristique dignissim. Donec at quam eros. Praesent ultricies nisl sapien, ut consequat dui scelerisque id.\r\n\r\nSuspendisse ut auctor turpis, ut iaculis elit. Integer bibendum purus id sapien laoreet, nec fermentum est porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vitae neque tincidunt, sodales augue nec, eleifend dui. Aliquam eget lectus ac dolor mollis tincidunt at eu sem. Suspendisse enim ex, tempus eget posuere sit amet, dictum nec dui. Mauris condimentum, purus eget scelerisque lacinia, ante neque porta tortor, sed porttitor justo nisl vel purus. Nulla ornare nunc ac est sagittis, et mollis tortor viverra. Etiam vitae fringilla leo. Nulla vel ante turpis.\r\n\r\nVestibulum vel scelerisque urna, sit amet fermentum tellus. Sed sagittis fringilla orci ut mattis. Duis bibendum augue a sem interdum tempor. Fusce orci metus, posuere sed nunc et, euismod gravida tellus. Nulla dictum justo magna, ac condimentum magna lacinia vel. Nam quis eleifend tortor. Pellentesque semper tempor mi a eleifend. In hac habitasse platea dictumst. Quisque vestibulum lorem eu auctor ornare. Integer vel mi nibh. Praesent sed ante et elit efficitur rutrum. Proin non est sed arcu congue viverra. Donec quis accumsan purus.\r\n\r\nNullam gravida eleifend mattis. Aenean luctus tempor lectus vitae condimentum. Morbi dignissim augue purus, quis congue neque commodo ac. Donec at aliquet risus. In tellus orci, feugiat eleifend erat sit amet, ullamcorper dapibus metus. Quisque fermentum scelerisque augue, nec vestibulum sapien porta et. Maecenas vehicula dictum ligula at fermentum. Vivamus suscipit sit amet felis sit amet rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam in risus metus. Nunc sodales, sapien et ultricies rutrum, turpis sapien gravida purus, ut auctor erat lectus at elit. Aliquam erat volutpat. Maecenas id quam vehicula, luctus justo et, volutpat diam. Duis vel sodales purus.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus vel est congue, tempor nulla id, volutpat orci. Praesent mollis venenatis massa non tincidunt. Cras interdum, velit at tristique tempus, nibh velit venenatis magna, vitae gravida velit metus sit amet erat. Sed ultricies auctor purus, id faucibus felis aliquet at. Integer ac semper ex. Nulla maximus leo et augue egestas, ut efficitur neque semper. Phasellus pretium dolor sit amet volutpat dictum. Proin auctor, nibh a dignissim viverra, diam leo gravida lectus, at vestibulum est orci eu augue.', 2, '2022-05-02', './images/Zelda.jpg', 1),
(3, 'Cuphead borthers', 'Votre article ici....popopooooo', 3, '2022-05-03', './images/cuphead.png', 2),
(11, 'Sonic essaie 17', 'Votre article ici....fhjkghjk', 3, '2022-05-03', './images/sonic.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `pseudo` varchar(100) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mdp`, `email`) VALUES
(1, 'Petro', '123456', 'petro@petro.com'),
(2, 'Melvin95', '124578', 'melvin85@gmail.com'),
(3, 'toto', '$2y$10$Dto3IGXd/TcfwfRjBEF4GeHDeD5HB4i0RHe67u4S3npx43ZpMC9BK', 'toto@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comz`
--
ALTER TABLE `comz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comz`
--
ALTER TABLE `comz`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comz`
--
ALTER TABLE `comz`
  ADD CONSTRAINT `comz_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comz_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
