-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  jeu. 17 jan. 2019 à 22:48
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `curriculum`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE `activities` (
  `id_act` int(11) NOT NULL,
  `title_act` varchar(45) DEFAULT NULL,
  `desc_act` varchar(45) DEFAULT NULL,
  `users_id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `exp_pro`
--

CREATE TABLE `exp_pro` (
  `id_exp` int(11) NOT NULL,
  `start_date_exp` date DEFAULT NULL,
  `end_date_exp` date DEFAULT NULL,
  `firm_name_exp` varchar(45) DEFAULT NULL,
  `location_exp` varchar(45) DEFAULT NULL,
  `job_exp` varchar(45) DEFAULT NULL,
  `mission_exp` longtext,
  `type_contract_exp` varchar(45) DEFAULT NULL,
  `users_id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `realisations`
--

CREATE TABLE `realisations` (
  `id_rea` int(11) NOT NULL,
  `title_rea` varchar(45) DEFAULT NULL,
  `desc_rea` varchar(45) DEFAULT NULL,
  `start_date_rea` date DEFAULT NULL,
  `end_date_rea` date DEFAULT NULL,
  `users_id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id_skill` int(11) NOT NULL,
  `title_skill` varchar(45) DEFAULT NULL,
  `desc_skill` varchar(45) DEFAULT NULL,
  `users_id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `trainings`
--

CREATE TABLE `trainings` (
  `id_train` int(11) NOT NULL,
  `start_date_train` date DEFAULT NULL,
  `end_date_train` date DEFAULT NULL,
  `school_train` varchar(45) DEFAULT NULL,
  `location_train` varchar(45) DEFAULT NULL,
  `title_train` varchar(45) DEFAULT NULL,
  `dipl_name_train` varchar(45) DEFAULT NULL,
  `dipl_validate_train` tinyint(4) DEFAULT NULL,
  `users_id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name_user` varchar(45) DEFAULT NULL,
  `lastname_user` varchar(45) DEFAULT NULL,
  `keypass_user` varchar(255) DEFAULT NULL,
  `address_user` varchar(45) DEFAULT NULL,
  `phone_user` varchar(10) DEFAULT NULL,
  `mail_user` varchar(45) DEFAULT NULL,
  `date_birth_user` date DEFAULT NULL,
  `obj_career_user` longtext,
  `cv_title_user` varchar(45) DEFAULT NULL,
  `handicap_user` varchar(45) DEFAULT NULL,
  `cv_exist` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id_act`,`users_id_users`),
  ADD KEY `fk_activities_users_idx` (`users_id_users`);

--
-- Index pour la table `exp_pro`
--
ALTER TABLE `exp_pro`
  ADD PRIMARY KEY (`id_exp`,`users_id_users`),
  ADD KEY `fk_exp_pro_users1_idx` (`users_id_users`);

--
-- Index pour la table `realisations`
--
ALTER TABLE `realisations`
  ADD PRIMARY KEY (`id_rea`,`users_id_users`),
  ADD KEY `fk_realisations_users1_idx` (`users_id_users`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_skill`,`users_id_users`),
  ADD KEY `fk_skills_users1_idx` (`users_id_users`);

--
-- Index pour la table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id_train`,`users_id_users`),
  ADD KEY `fk_trainings_users1_idx` (`users_id_users`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activities`
--
ALTER TABLE `activities`
  MODIFY `id_act` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `exp_pro`
--
ALTER TABLE `exp_pro`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `realisations`
--
ALTER TABLE `realisations`
  MODIFY `id_rea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id_train` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `fk_activities_users` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `exp_pro`
--
ALTER TABLE `exp_pro`
  ADD CONSTRAINT `fk_exp_pro_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `realisations`
--
ALTER TABLE `realisations`
  ADD CONSTRAINT `fk_realisations_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `fk_skills_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `fk_trainings_users1` FOREIGN KEY (`users_id_users`) REFERENCES `users` (`id_users`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
