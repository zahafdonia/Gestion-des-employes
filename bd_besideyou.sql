-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 nov. 2024 à 11:43
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_besideyou`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `idA` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(200) NOT NULL,
  `duration` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`idA`, `date`, `reason`, `duration`, `employeeid`) VALUES
(1, '2024-11-04', 'maladie', 2, 1),
(2, '2024-11-16', '--------', 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `idU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `idU`) VALUES
(11, 1),
(22, 2),
(33, 3),
(44, 4),
(45, 11),
(46, 13);

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `position` varchar(30) NOT NULL,
  `salary` double NOT NULL,
  `idU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`employeeId`, `city`, `address`, `position`, `salary`, `idU`) VALUES
(1, 'tunis', 'ville 5000', 'web devoloper', 1800, 5),
(2, 'sfax', 'hay habib', 'cloud engineering', 2500, 6),
(3, 'mestir', 'rue 8000', 'mobile devoloper', 2000, 7),
(4, 'tunis', 'rue 6122', 'testeur', 3200, 8),
(5, 'france', 'paris-101', 'manager', 1500, 9);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_18_113951_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `performance`
--

CREATE TABLE `performance` (
  `idP` int(11) NOT NULL,
  `rating` double NOT NULL,
  `date` date NOT NULL,
  `employeeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `performance`
--

INSERT INTO `performance` (`idP`, `rating`, `date`, `employeeid`) VALUES
(1, 18, '2024-11-01', 1),
(2, 25, '2024-11-01', 3),
(3, 50, '2024-11-01', 4);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idR` int(5) NOT NULL,
  `nomR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idR`, `nomR`) VALUES
(1, 'Admin'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5X5wRj2qU5vwVeFKRXnfj7MKNBjojFZCwP9mDgkM', NULL, '127.0.0.1', 'PostmanRuntime/7.42.0', 'ZXlKcGRpSTZJbE00TUhoUE1WQnROVmRSYlc1YVIwUTVjVVJ6TkhjOVBTSXNJblpoYkhWbElqb2lNWFJWZUhKMVRUVlVlbXRhYlRkWVZHUm9jVkpHZGtGNFNWSndNVzAyYXl0SlVEbGxVR2wyU3pOUE1ESTJUR1V6YVVWVmJtWmthbEpDTjJoQlpETjJUVzh6Y0RWQkwzcFZabkZMUzNGMGVGZFVlV2tyTld4TE1rWlVWRzlsYmtSa1FXdHJZVzVhYkRGQ1dXcFJjRGxaT0U1QmVGSnpWbkZVWTBvd1NHeG9SWGhxWlhka05tMWxiWEJHTW1WU1N6SmlWbXhxY1RaSlJrSmpSVXRLYTBOdWMxZ3dTRzFIYURSRWMyRnlaekpDV25aNU0wdHFOSFpYWjAxQ2EzTlljMFEyTm5NdllqWkVaRk5hVm1nelIwRlJOV3R0VlRrMVRIZElkbEZZU1ZWRVkzb3JibE42V0c5MVltVXdjV2xGT0hkR01WSkhZakZpZVdOdVZYVnRjekpCVlhkUEx6bE5RbUpFYUhaRlp6SlVWbWx0VUVOaFoxUlpia2czUVdVelJqSktZa05zWjNVMFF6SlNMemRQYWpKTkx6aDNkRWxOTURFelIzTm1kbUkyVFRoVWJFOVZNRU5TVnpkME15c3djRGxITW5seUwyTXpSamt3Y0dGRFpUbGtiM054YzBwbk9WcG9URVJxT0c5clQyTTBkRUoyU213MVNVWlFTbmhIVG5wVUlpd2liV0ZqSWpvaU1tWm1NREF5WVdVeE56STNZakppTVRWa1pXUTNPRGxpWXpJd05UUXlZVE14Wm1JM05EZGtOVGMzT1RnMU0yRXpaRGhsWmpGaVkyTTBaVGxrWVRobU5pSXNJblJoWnlJNklpSjk=', 1732012849),
('gQRLJkJbEM1bg4jbG4jLIrP5rPDCxc2ZPRxYmSi3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJakZPVUZoS1VFSjFjSHBTYlVOSE5FeHlXbVZFUVhjOVBTSXNJblpoYkhWbElqb2lhbXRzYlZSSVRFVnNRWFI1VkZFNFptZFJLM0Z0Yml0U1ZHZHJURmx6ZFdWRVZ6aEVUR3hzT0U0MVQyRjBiMWxpTDJGaFJEVmtPV2xrZFd4NWQzZGlhbWx4U2twYVNGaE5WMWN3U0dOTVFXcDNPSE5tWW1oVk5qTk5TVWR6V1dkTlRrSTVkeTgxVVROS1UyeE5SMnBSVW1sb2VtWXZVVEZEUjJseUsyUnlOSEJWZFc5UU4yWTNRWFp6Y1c0MlFWVnNNbkF6TVRsS1FVZzJlazFFVTJ4Mk5EYzJOeTkxVm1oeVkwOUJkakF3T1dKUFdHTjJhR1YwT1hsNFJ6RlFSbVV4YkdaeldYVTFNVFV4YjJ0NlJFTnNWMVJ1U2toS05UaEtWelJtWlhack5uVlhaR3hXV0ZSdWVFWlpNelpwTVV0amFHdG5hMWMzTW1ObmNuZFhjR015VEcwMlp6bHBRMVV4UlRoaldWcDZaak1yZFVObWRrRnJjMFozVTNWUmNuVjZXRGhPUTJwMU1Ua3hURVpOYmxCd1ZHZHZRVmRUTW5SUFpYRXJRamhXWnpKcE9GTlJiRkJ3YkU0NFltbHJiMEZTUlVSR1JrSjZObVp4YTNST2NFMXJOblJwSzB0SWRVZzJVa1I0YzI1VlVWWm1jVlZCUWtwYVkxZE1LMXBzTVdWcklpd2liV0ZqSWpvaVl6SXhOakF6TmpGalpUZGhZVGd5TlRnMU5URTNZV1l4TnpWbVpUZ3hNMkk1TURrNVptTmlOVGswT0RWak56aGpaR013WkRrMU1HSTBPV05tTXpZek55SXNJblJoWnlJNklpSjk=', 1732012890);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idU` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(62) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `idR` int(5) NOT NULL,
  `status` varchar(100) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idU`, `email`, `password`, `lastname`, `name`, `idR`, `status`) VALUES
(1, 'donia@gmail.com', '$2y$12$EjYwxEquInJfwR3VVTAzI.xchjfVCvf.ss50TC9RPkFezZ2m8peT6', 'zahaf', 'donia', 1, 'active'),
(2, 'habib@gmail.com', '$2y$12$wlw0sFmLM6gm3O78DelcDe4Baszg.rY7jx/heYyexpoOpdYgX0.Cy', 'drira', 'habib', 1, 'active'),
(3, 'jihen@gmail.com', '$2y$12$FC1Qi1N426scYrArGEiKmedh9Xbcdoi6flUqwyz3dSCdErclH/EO.', 'farhani', 'jihen', 1, 'active'),
(4, 'feres@gmail.com', '$2y$12$Z3M9DeQOVBfs5Tmo9k630uMy36s37p8syoplSxmi5eFQur5oKyDkm', 'choura', 'feres', 1, 'active'),
(5, 'employee1@gmail.com', '$2y$12$/oLtFpH7aEaF3GXB1a8uBu8ceU/QmnYzSRz2y1isCxU1nfllqKv2y', 'moni', 'pascal', 2, 'active'),
(6, 'employee2@gmail.com', '$2y$12$Z/MjhqhFXSHGHHmFIkq7TuRYQrPmUAIprbEfkQ45XlSrGoB4Ak5wu', 'fredi', 'ricky', 2, 'active'),
(7, 'employee3@gmail.com', '$2y$12$NhkMk/bLsEfzf76p/sEq9OCgdc6B6pnFM1f7V/lK1x81dTlMWDt7O', 'alij', 'salwa', 2, 'active'),
(8, 'employee4@gmail.com', '$2y$12$xmx8aoX8Rr411g4rUATOFOZPpHmuIHZTMbT7YPzqkuGVZFzerBLIq', 'zahaf', 'oussema', 2, 'active'),
(9, 'employee5@gmail.com', '$2y$12$.C9YztpwXcW97Kol7MJNH.GhsL/efmPOByuOtkj2ZSEmdZZvkRTqq', 'betoni', 'david', 2, 'active'),
(11, 'admin@example.com', '$2y$12$NJEn7r/g8mHKV386PV2bveiIWhHnK2vXyqzS6ss5euShQdMymdgqS', 'AdminLastName', 'AdminFirstName', 1, 'active'),
(13, 'admin2@example.com', '$2y$12$vmvp8j9zNEcGQ5QZak0S7uPrJ/PVQ5g.uA8U/WJ/vClWZuGLsBHum', 'AdminLastName', 'AdminFirstName', 1, 'active');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`idA`),
  ADD KEY `employeeid` (`employeeid`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `idU` (`idU`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeId`),
  ADD KEY `idU` (`idU`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `ffkp` (`employeeid`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idR`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idU`),
  ADD KEY `idR` (`idR`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `idA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `performance`
--
ALTER TABLE `performance`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`employeeid`);

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `user` (`idU`);

--
-- Contraintes pour la table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `user` (`idU`);

--
-- Contraintes pour la table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `ffkp` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`employeeid`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idR`) REFERENCES `role` (`idR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `loans` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL, -- L'utilisateur ayant soumis la demande
  `amount` DOUBLE NOT NULL, -- Montant de la demande
  `reason` VARCHAR(255), -- Raison de la demande
  `status` ENUM('pending', 'approved', 'rejected') DEFAULT 'pending', -- Statut de la demande
  `admin_id` INT NULL, -- L'admin qui a traité la demande
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`idU`) ON DELETE CASCADE,
  FOREIGN KEY (`admin_id`) REFERENCES `admin`(`idAdmin`) ON DELETE SET NULL
);
