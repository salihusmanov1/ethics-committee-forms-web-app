-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 11:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conversion_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisors`
--

CREATE TABLE `advisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advisors`
--

INSERT INTO `advisors` (`id`, `user_id`, `app_id`, `title`, `name`, `department`, `phone`, `address`, `email`, `created_at`, `updated_at`) VALUES
(8, 5, 68, 'Dr.', 'Olivia Anderson', 'Psychology', '(111) 222-3333', 'Girne, North Cyprus', 'olivia.anderson@email.com', '2023-08-22 09:34:14', '2023-08-22 09:34:14'),
(10, 13, 71, 'Asst. Prof. Dr.', 'Olivia Anderson', 'Psychology', '(111) 222-3333', 'Girne, North Cyprus', 'olivia.anderson@email.com', '2023-08-25 05:26:31', '2023-08-25 05:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `app_status`
--

CREATE TABLE `app_status` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supervisor_name` varchar(255) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `researcher_name` varchar(255) DEFAULT NULL,
  `rdate` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `admin_comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_status`
--

INSERT INTO `app_status` (`id`, `user_id`, `status`, `created_at`, `updated_at`, `supervisor_name`, `sdate`, `researcher_name`, `rdate`, `type`, `user_email`, `admin_comment`) VALUES
(62, 5, 'Pending', '2023-08-22', '2023-08-23 09:34:51', 'Dr. Olivia Anderson', NULL, 'Emily Johnson', NULL, 'ETHICS COMMITTEE PROJECT INFORMATION FORM', 'nael.alyousefi@final.edu.tr', NULL),
(68, 5, 'Approved', '2023-08-22', '2023-08-23 06:57:09', 'Dr. Olivia Anderson', '2023-08-19', 'Emily Johnson', '2023-08-24', 'ETHICS COMMITTEE APPLICATION FORM', 'nael.alyousefi@final.edu.tr', 'Approved'),
(71, 13, 'New', '2023-08-25', '2023-08-25 05:26:31', NULL, NULL, NULL, NULL, 'ETHICS COMMITTEE APPLICATION FORM', 'souhaila.elmerabet@final.edu.tr', NULL),
(72, 5, 'New', '2023-08-29', '2023-08-29 05:31:59', 'Dr. Olivia Anderson', NULL, 'Emily Johnson', NULL, 'ETHICS COMMITTEE PROJECT INFORMATION FORM', 'nael.alyousefi@final.edu.tr', NULL),
(73, 5, 'New', '2023-08-29', '2023-08-29 05:41:27', 'Dr. Olivia Anderson', NULL, 'Emily Johnson', NULL, 'ETHICS COMMITTEE PROJECT INFORMATION FORM', 'nael.alyousefi@final.edu.tr', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extension_of_previous_study`
--

CREATE TABLE `extension_of_previous_study` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `protocol_no` varchar(255) DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `any_differences` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extension_of_previous_study`
--

INSERT INTO `extension_of_previous_study` (`id`, `user_id`, `app_id`, `protocol_no`, `completion_date`, `any_differences`, `created_at`, `updated_at`) VALUES
(4, 5, 68, NULL, NULL, NULL, '2023-08-22 09:34:14', '2023-08-22 09:34:14'),
(6, 13, 71, NULL, NULL, NULL, '2023-08-25 05:26:31', '2023-08-25 05:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `form2`
--

CREATE TABLE `form2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `data_col_plan` text NOT NULL,
  `exp_result` text NOT NULL,
  `yes_no1` varchar(255) NOT NULL,
  `if_involve` text NOT NULL,
  `yes_no2` varchar(255) NOT NULL,
  `partic_kept_uniformed` text NOT NULL,
  `poten_contr` text NOT NULL,
  `yes_no3` varchar(255) NOT NULL,
  `research_before` text NOT NULL,
  `rname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form2`
--

INSERT INTO `form2` (`id`, `user_id`, `app_id`, `description`, `data_col_plan`, `exp_result`, `yes_no1`, `if_involve`, `yes_no2`, `partic_kept_uniformed`, `poten_contr`, `yes_no3`, `research_before`, `rname`, `sname`, `created_at`, `updated_at`) VALUES
(11, 5, 62, 'wgrgrgvbwergvweagewgw', 'egvewagvwevewvwevwegvwegvwe', 'vweagvweavwevgewvgwevewvwevv', 'no', '', 'yes', 'wevewvwevewvwevwev', 'wevewvwevwevwegvwev', 'yes', 'wevwevewvwecfwaecvwec', 'Emily Johnson', 'Dr. Olivia Anderson', '2023-08-22 03:46:01', '2023-08-28 06:36:48'),
(13, 5, 72, 'qfvqefcqefcqefcqefcq', 'qfcqefcefcsvfdsvbetg', 'dtrbtrbtdrfvdfvefv', 'yes', 'dbvdbebvvedvbev', 'no', '', 'ebvebvevdtvgedgtvbdvg', 'no', '', 'Emily Johnson', 'Dr. Olivia Anderson', '2023-08-29 05:31:59', '2023-08-29 05:31:59'),
(14, 5, 73, 'evwevewfewfw', 'evwevewfwefewfcewafcweewv', 'veawveawvweafvefcwefewf', 'yes', 'ewfvwevfewvfewvewfwefwef', 'yes', 'waevewvwefvewfveawvewfv', 'vgewvewvvdthtykyil,kuyklo.,lgyftdh', 'yes', 'evewafweafcefwafewf', 'Emily Johnson', 'Dr. Olivia Anderson', '2023-08-29 05:41:27', '2023-08-29 05:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_08_06_193331_title_of_study', 2),
(11, '2023_08_06_193415_type_of_study', 2),
(12, '2023_08_06_193439_researchers', 2),
(13, '2023_08_06_193510_other_researchers', 2),
(16, '2023_08_07_074138_advisors_supervisors_faculty_member', 3),
(143, '2023_08_10_130504_create_app_status', 4),
(201, '2023_08_08_074556_create_studies_table', 5),
(202, '2023_08_08_074616_create_researchers_table', 5),
(203, '2023_08_08_074633_create_other_researchers_table', 5),
(204, '2023_08_08_074647_create_advisors_table', 5),
(205, '2023_08_08_074702_create_organizations_table', 5),
(206, '2023_08_08_074724_create_other_questions_table', 5),
(207, '2023_08_10_112142_create_extension_of_previous_study', 5),
(208, '2023_08_10_112531_create_reporting_changes', 5),
(209, '2023_08_10_112924_create_new_or_revised', 5),
(210, '2023_08_12_132428_create_form2_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `new_or_revised`
--

CREATE TABLE `new_or_revised` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `purpose_of_study` text DEFAULT NULL,
  `data_collection` text DEFAULT NULL,
  `if_aim_incorrect_info` varchar(255) DEFAULT NULL,
  `if_harmful` text DEFAULT NULL,
  `number_of_participants` int(11) DEFAULT NULL,
  `if_cgroup_used` varchar(255) DEFAULT NULL,
  `type_of_participants` text DEFAULT NULL,
  `verbal_consent_children` text DEFAULT NULL,
  `verbal_consent_pupils` text DEFAULT NULL,
  `descr_of_particip` text DEFAULT NULL,
  `expl_of_invitation` text DEFAULT NULL,
  `methods` text DEFAULT NULL,
  `possible_contributions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `other_type` text DEFAULT NULL,
  `other_method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_or_revised`
--

INSERT INTO `new_or_revised` (`id`, `user_id`, `app_id`, `purpose_of_study`, `data_collection`, `if_aim_incorrect_info`, `if_harmful`, `number_of_participants`, `if_cgroup_used`, `type_of_participants`, `verbal_consent_children`, `verbal_consent_pupils`, `descr_of_particip`, `expl_of_invitation`, `methods`, `possible_contributions`, `created_at`, `updated_at`, `other_type`, `other_method`) VALUES
(4, 5, 68, 'xdsfjkbisnbwoibriovewiobhwriobnwriob', 'sdbdpbnbvweoivbwekviebviorniov', 'yes', 'yes', 15, 'yes', '[\"University students\",\"Adults in employment\",\"Unemployed adults\",\"Preschool children\",\"Highschool students\",\"Primary school pupils\",\"Child workers\",\"The elderly\",\"Mentally disabled\\/challenged individuals\",\"Physically disabled\\/challenged individuals\",\"Prisoners\",\"Other\"]', 'yes', 'yes', 'hellllloooooooo', 'wrhrbrwbfetbetbetbte', '[\"Survey\",\"Interview\",\"Observation\",\"Computer test\",\"Video\\/film recording\",\"Voice recording\",\"Physiological measurement\",\"Biological sample\",\"Making participants use alcohol, drugs or any other chemical substance\",\"Exposure to high simulation (such as light, sound)\",\"Other\"]', 'etbetnetntrgergwsdgsdg', '2023-08-22 09:34:14', '2023-08-23 06:15:19', 'egfweoghwogbweoigb', 'wrgwrgwrgrw'),
(6, 13, 71, NULL, NULL, 'no', 'yes', NULL, NULL, 'null', NULL, NULL, NULL, NULL, 'null', NULL, '2023-08-25 05:26:31', '2023-08-25 05:50:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `user_id`, `app_id`, `name`, `created_at`, `updated_at`) VALUES
(7, 5, 68, '[\"Jehangir\",\"Dilmurod\",\"HElllooo\"]', '2023-08-22 09:34:14', '2023-08-23 04:17:46'),
(9, 13, 71, '[\"Jehangir\"]', '2023-08-25 05:26:31', '2023-08-25 05:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `other_questions`
--

CREATE TABLE `other_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `is_supported` varchar(255) NOT NULL,
  `institutions` varchar(255) NOT NULL,
  `specify` varchar(255) NOT NULL,
  `pr_submission` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_of_app` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_questions`
--

INSERT INTO `other_questions` (`id`, `user_id`, `app_id`, `permission`, `is_supported`, `institutions`, `specify`, `pr_submission`, `created_at`, `updated_at`, `status_of_app`) VALUES
(6, 5, 68, 'Fawgfvqwevfeqg', 'Not Supported', 'TUBITAK', '', 'feafvefaefveafc', '2023-08-22 09:34:14', '2023-08-28 04:56:55', 'Revised'),
(8, 13, 71, 'Fawgfvqwevfeqg', 'Supported', 'University', '', 'no', '2023-08-25 05:26:31', '2023-08-25 05:26:31', 'Reporting Changes');

-- --------------------------------------------------------

--
-- Table structure for table `other_researchers`
--

CREATE TABLE `other_researchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_researchers`
--

INSERT INTO `other_researchers` (`id`, `user_id`, `app_id`, `name`, `institute`, `created_at`, `updated_at`) VALUES
(12, 5, 68, '[\"Salih\",\"Hello\"]', '[\"Final\",\"World\"]', '2023-08-22 09:34:14', '2023-08-22 09:34:14'),
(14, 13, 71, '[\"Salih\",\"Hello\"]', '[\"Final\",\"World\"]', '2023-08-25 05:26:31', '2023-08-25 05:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `reporting_changes`
--

CREATE TABLE `reporting_changes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `protocol_no` varchar(255) DEFAULT NULL,
  `explanation_of_changes` varchar(255) DEFAULT NULL,
  `if_could_harm_participants` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reporting_changes`
--

INSERT INTO `reporting_changes` (`id`, `user_id`, `app_id`, `protocol_no`, `explanation_of_changes`, `if_could_harm_participants`, `created_at`, `updated_at`) VALUES
(4, 5, 68, NULL, NULL, 'yes', '2023-08-22 09:34:14', '2023-08-22 09:34:14'),
(6, 13, 71, '65441122', 'srhrwhrwgwregewg', 'no', '2023-08-25 05:26:31', '2023-08-25 05:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `researchers`
--

CREATE TABLE `researchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `researchers`
--

INSERT INTO `researchers` (`id`, `user_id`, `app_id`, `name`, `department`, `institution`, `phone`, `address`, `email`, `created_at`, `updated_at`) VALUES
(8, 5, 68, 'Emily Johnson', 'Psychology', 'Final University', '(123) 456-7890', 'Girne', 'john@gmail.com', '2023-08-22 09:34:14', '2023-08-22 09:34:14'),
(10, 13, 71, 'Emily Johnson', 'Psychology', 'Final University', '(123) 456-7890', 'girne', 'emily.johnson@email.com', '2023-08-25 05:26:31', '2023-08-25 05:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(0, 'admin'),
(1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE `studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `expected_start` date NOT NULL,
  `expected_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`id`, `user_id`, `app_id`, `title`, `type`, `expected_start`, `expected_end`, `created_at`, `updated_at`) VALUES
(8, 5, 68, 'Examining the Impact of Virtual Reality Exposure Therapy on Arachnophobia', 'ewfoewfob', '2023-08-25', '2023-08-30', '2023-08-22 09:34:14', '2023-08-28 06:24:10'),
(10, 13, 71, 'Examining the Impact of Virtual Reality Exposure Therapy on Arachnophobia', 'Doctorate Thesis', '2023-08-26', '2023-08-31', '2023-08-25 05:26:31', '2023-08-25 05:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT 1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `role_id`, `updated_at`, `created_at`) VALUES
(5, 'nael.alyousefi@final.edu.tr', '$2y$10$G1nPHBrvliHviBm4.e8DquK0Cpqi6jHkdHFkyjbJY22bdunfESkiC', 'Nael', 1, '2023-08-19 21:33:07', '2023-08-19 17:35:29'),
(11, 'mirsolikh.usmonov@final.edu.tr', '$2y$10$uCx2Y2Mz8YHXt0zjkE9VduN/h6FP5yPCpPAKgfyrPLy21fz6D51Ta', 'Salih', 0, '2023-08-19 22:03:01', '2023-08-19 19:02:35'),
(12, 'test@gmail.com', '$2y$10$j3g5yKdATqVl47OFVXmMK.IkhE30276mQOvDdUkhLfcSM6oTVtI06', 'Nael Bullshit', 0, '2023-08-21 08:20:34', '2023-08-21 05:20:16'),
(13, 'souhaila.elmerabet@final.edu.tr', '$2y$10$bWjSdwaXr/412txaYqEuLu4MaLi00UNTiAODYIl56ZS48BKwcfZj6', 'Souheila', 1, '2023-08-24 09:32:49', '2023-08-24 09:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisors`
--
ALTER TABLE `advisors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advisors_user_id_foreign` (`user_id`),
  ADD KEY `advisors_app_id_foreign` (`app_id`);

--
-- Indexes for table `app_status`
--
ALTER TABLE `app_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_status_user_id_foreign` (`user_id`);

--
-- Indexes for table `extension_of_previous_study`
--
ALTER TABLE `extension_of_previous_study`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extension_of_previous_study_user_id_foreign` (`user_id`),
  ADD KEY `extension_of_previous_study_app_id_foreign` (`app_id`);

--
-- Indexes for table `form2`
--
ALTER TABLE `form2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form2_user_id_foreign` (`user_id`),
  ADD KEY `form2_app_id_foreign` (`app_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_or_revised`
--
ALTER TABLE `new_or_revised`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_or_revised_user_id_foreign` (`user_id`),
  ADD KEY `new_or_revised_app_id_foreign` (`app_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizations_user_id_foreign` (`user_id`),
  ADD KEY `organizations_app_id_foreign` (`app_id`);

--
-- Indexes for table `other_questions`
--
ALTER TABLE `other_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_questions_user_id_foreign` (`user_id`),
  ADD KEY `other_questions_app_id_foreign` (`app_id`);

--
-- Indexes for table `other_researchers`
--
ALTER TABLE `other_researchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_researchers_user_id_foreign` (`user_id`),
  ADD KEY `other_researchers_app_id_foreign` (`app_id`);

--
-- Indexes for table `reporting_changes`
--
ALTER TABLE `reporting_changes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reporting_changes_user_id_foreign` (`user_id`),
  ADD KEY `reporting_changes_app_id_foreign` (`app_id`);

--
-- Indexes for table `researchers`
--
ALTER TABLE `researchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `researchers_user_id_foreign` (`user_id`),
  ADD KEY `researchers_app_id_foreign` (`app_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studies_user_id_foreign` (`user_id`),
  ADD KEY `studies_app_id_foreign` (`app_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisors`
--
ALTER TABLE `advisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `app_status`
--
ALTER TABLE `app_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `extension_of_previous_study`
--
ALTER TABLE `extension_of_previous_study`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form2`
--
ALTER TABLE `form2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `new_or_revised`
--
ALTER TABLE `new_or_revised`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `other_questions`
--
ALTER TABLE `other_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `other_researchers`
--
ALTER TABLE `other_researchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reporting_changes`
--
ALTER TABLE `reporting_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `researchers`
--
ALTER TABLE `researchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `studies`
--
ALTER TABLE `studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisors`
--
ALTER TABLE `advisors`
  ADD CONSTRAINT `advisors_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advisors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `app_status`
--
ALTER TABLE `app_status`
  ADD CONSTRAINT `app_status_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `extension_of_previous_study`
--
ALTER TABLE `extension_of_previous_study`
  ADD CONSTRAINT `extension_of_previous_study_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `extension_of_previous_study_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form2`
--
ALTER TABLE `form2`
  ADD CONSTRAINT `form2_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form2_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `new_or_revised`
--
ALTER TABLE `new_or_revised`
  ADD CONSTRAINT `new_or_revised_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `new_or_revised_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `organizations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `other_questions`
--
ALTER TABLE `other_questions`
  ADD CONSTRAINT `other_questions_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `other_questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `other_researchers`
--
ALTER TABLE `other_researchers`
  ADD CONSTRAINT `other_researchers_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `other_researchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reporting_changes`
--
ALTER TABLE `reporting_changes`
  ADD CONSTRAINT `reporting_changes_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reporting_changes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `researchers`
--
ALTER TABLE `researchers`
  ADD CONSTRAINT `researchers_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `researchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_app_id_foreign` FOREIGN KEY (`app_id`) REFERENCES `app_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
