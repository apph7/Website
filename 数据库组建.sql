-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-05-28 15:09:58
-- 服务器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `issgm`
--
CREATE DATABASE IF NOT EXISTS `issgm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `issgm`;
--
-- 数据库： `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- 表的结构 `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- 表的结构 `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- 表的结构 `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- 表的结构 `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- 表的结构 `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- 转存表中的数据 `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', '数据库', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"structure_or_data_forced\":\"0\",\"table_select[]\":[\"inspect\",\"learning_record\",\"paper\",\"question_bank\",\"users\"],\"table_structure[]\":[\"inspect\",\"learning_record\",\"paper\",\"question_bank\",\"users\"],\"table_data[]\":[\"inspect\",\"learning_record\",\"paper\",\"question_bank\",\"users\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@DATABASE@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"@TABLE@ 表的结构\",\"latex_structure_continued_caption\":\"@TABLE@ 表的结构 (延续的)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"@TABLE@ 表的内容\",\"latex_data_continued_caption\":\"@TABLE@ 表的内容 (延续的)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"structure_and_data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"structure_and_data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_procedure_function\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"xml_structure_or_data\":\"data\",\"xml_export_events\":\"something\",\"xml_export_functions\":\"something\",\"xml_export_procedures\":\"something\",\"xml_export_tables\":\"something\",\"xml_export_triggers\":\"something\",\"xml_export_views\":\"something\",\"xml_export_contents\":\"something\",\"yaml_structure_or_data\":\"data\",\"\":null,\"lock_tables\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_create_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- 表的结构 `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- 表的结构 `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- 表的结构 `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- 表的结构 `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- 表的结构 `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- 转存表中的数据 `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"sgm\",\"table\":\"users\"},{\"db\":\"sgm\",\"table\":\"question_bank\"},{\"db\":\"sgm\",\"table\":\"inspect\"},{\"db\":\"sgm\",\"table\":\"paper\"},{\"db\":\"sgm\",\"table\":\"learning_record\"},{\"db\":\"sgm\",\"table\":\"score\"},{\"db\":\"sgm\",\"table\":\"Learning_record\"},{\"db\":\"information_schema\",\"table\":\"APPLICABLE_ROLES\"}]');

-- --------------------------------------------------------

--
-- 表的结构 `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- 表的结构 `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- 表的结构 `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- 表的结构 `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- 表的结构 `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- 转存表中的数据 `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'sgm', 'learning_record', '{\"sorted_col\":\"`learning_record`.`end_time` ASC\"}', '2023-05-17 07:26:02'),
('root', 'sgm', 'question_bank', '{\"sorted_col\":\"`question_bank`.`no` ASC\"}', '2023-05-22 06:38:14'),
('root', 'sgm', 'users', '{\"sorted_col\":\"`users`.`username` DESC\"}', '2023-05-10 08:55:03');

-- --------------------------------------------------------

--
-- 表的结构 `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- 表的结构 `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- 转存表中的数据 `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-05-28 13:09:55', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"zh_CN\"}');

-- --------------------------------------------------------

--
-- 表的结构 `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- 表的结构 `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- 转储表的索引
--

--
-- 表的索引 `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- 表的索引 `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- 表的索引 `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- 表的索引 `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- 表的索引 `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- 表的索引 `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- 表的索引 `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- 表的索引 `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- 表的索引 `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- 表的索引 `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- 表的索引 `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- 表的索引 `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- 表的索引 `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- 表的索引 `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- 表的索引 `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- 表的索引 `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- 表的索引 `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- 表的索引 `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 数据库： `sgm`
--
CREATE DATABASE IF NOT EXISTS `sgm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sgm`;

-- --------------------------------------------------------

--
-- 表的结构 `inspect`
--

CREATE TABLE `inspect` (
  `no` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `score` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `start` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `inspect`
--

INSERT INTO `inspect` (`no`, `username`, `score`, `time`, `start`) VALUES
('11', 'aaa', '50', '5', ''),
('12', 'aaa', '50', '9', ''),
('13', 'aaa', '100', '5', ''),
('15', 'aaa', '0', '329', ''),
('16', 'aaa', '50', '12', ''),
('17', 'aaa', '50', '24', ''),
('18', 'aaa', '0', '8', ''),
('19', 'aaa', '67', '15', ''),
('15', 'aaaa', '0', '4', '');

-- --------------------------------------------------------

--
-- 表的结构 `learning_record`
--

CREATE TABLE `learning_record` (
  `username` varchar(20) NOT NULL,
  `score` varchar(40) NOT NULL,
  `start_time` varchar(40) NOT NULL,
  `end_time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `learning_record`
--

INSERT INTO `learning_record` (`username`, `score`, `start_time`, `end_time`) VALUES
('aaa', '30', '2023-05-17 09:43:39', '2023-05-17 09:43:51'),
('', '0', '2023-05-17 13:15:31', '2023-05-17 13:15:47'),
('aaa', '0', '2023-05-17 13:16:21', '2023-05-17 13:16:36'),
('aaa', '0', '2023-05-17 13:19:50', '2023-05-17 13:20:05'),
('aaa', '0', '2023-05-17 13:21:56', '2023-05-17 13:22:09'),
('aaa', '0', '2023-05-17 13:23:38', '2023-05-17 13:23:54'),
('aaa', '0', '2023-05-17 13:26:16', '2023-05-17 13:26:30'),
('aaa', '0', '2023-05-17 13:27:26', '2023-05-17 13:27:38'),
('aaa', '0', '2023-05-17 13:30:20', '2023-05-17 13:30:34'),
('aaa', '40', '2023-05-17 13:31:32', '2023-05-17 13:31:46'),
('aaa', '20', '2023-05-17 13:52:55', '2023-05-17 13:53:15'),
('11', '20', '2023-05-17 16:06:46', '2023-05-17 16:07:01'),
('aaa', '30', '2023-05-22 10:32:00', '2023-05-22 10:32:14'),
('aaa', '30', '2023-05-22 11:50:06', '2023-05-22 11:50:17'),
('aaa', '40', '2023-05-22 22:21:54', '2023-05-22 22:22:04'),
('aaaa', '40', '2023-05-23 12:03:09', '2023-05-23 12:03:20'),
('aaa', '30', '2023-05-23 18:38:57', '2023-05-23 18:39:17'),
('aaaa', '30', '2023-05-25 08:01:42', '2023-05-25 08:01:56'),
('aaaa', '20', '2023-05-25 08:01:42', '2023-05-25 08:02:21'),
('aaaa', '10', '2023-05-25 08:03:59', '2023-05-25 08:04:11'),
('aaa', '10', '2023-05-25 08:05:01', '2023-05-25 08:05:14'),
('aaa', '20', '2023-05-25 08:05:01', '2023-05-25 08:05:46'),
('aaa', '50', '2023-05-25 09:29:16', '2023-05-25 09:31:25'),
('aaa', '30', '2023-05-26 16:15:38', '2023-05-26 16:15:49');

-- --------------------------------------------------------

--
-- 表的结构 `paper`
--

CREATE TABLE `paper` (
  `no` varchar(20) NOT NULL,
  `num` varchar(20) NOT NULL,
  `start` varchar(20) NOT NULL,
  `end` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `paper`
--

INSERT INTO `paper` (`no`, `num`, `start`, `end`) VALUES
('1', '1', '2023-05-19 22:14:00', '2023-05-19 22:14:00'),
('2', '1', '2023-05-19 22:15:00', '2023-05-19 22:15:00'),
('2', '2', '2023-05-19 22:15:00', '2023-05-19 22:15:00'),
('3', '2', '2023-05-19 22:16:00', '2023-05-19 22:20:00'),
('4', '1', '2023-05-19 22:21:00', '2023-05-19 22:25:00'),
('4', '2', '2023-05-19 22:21:00', '2023-05-19 22:25:00'),
('5', '1', '2023-05-19 22:22:00', '2023-05-19 22:27:00'),
('5', '2', '2023-05-19 22:22:00', '2023-05-19 22:27:00'),
('5', '3', '2023-05-19 22:22:00', '2023-05-19 22:27:00'),
('5', '4', '2023-05-19 22:22:00', '2023-05-19 22:27:00'),
('6', '1', '2023-05-19 22:25:00', '2023-05-19 22:25:00'),
('6', '2', '2023-05-19 22:25:00', '2023-05-19 22:25:00'),
('6', '3', '2023-05-19 22:25:00', '2023-05-19 22:25:00'),
('7', '1', '2023-05-19 22:27:00', '2023-05-19 22:27:00'),
('7', '2', '2023-05-19 22:27:00', '2023-05-19 22:27:00'),
('7', '3', '2023-05-19 22:27:00', '2023-05-19 22:27:00'),
('8', '1', '2023-05-19 22:30:00', '2023-05-19 22:30:00'),
('8', '2', '2023-05-19 22:30:00', '2023-05-19 22:30:00'),
('8', '3', '2023-05-19 22:30:00', '2023-05-19 22:30:00'),
('9', '1', '2023-05-19 22:41:00', '2023-05-19 22:45:00'),
('9', '2', '2023-05-19 22:41:00', '2023-05-19 22:45:00'),
('10', '1', '2023-05-20 19:34:00', '2023-05-20 19:38:00'),
('10', '5', '2023-05-20 19:34:00', '2023-05-20 19:38:00'),
('11', '1', '2023-05-20 20:11:00', '2023-05-25 20:11:00'),
('11', '2', '2023-05-20 20:11:00', '2023-05-25 20:11:00'),
('12', '1', '2023-05-20 23:00:00', '2023-05-27 23:00:00'),
('12', '2', '2023-05-20 23:00:00', '2023-05-27 23:00:00'),
('13', '1', '2023-05-20 23:07:00', '2023-05-27 23:07:00'),
('13', '2', '2023-05-20 23:07:00', '2023-05-27 23:07:00'),
('14', '1', '2023-05-20 23:09:00', '2023-05-20 14:09:00'),
('15', '4', '2023-05-20 23:24:00', '2023-05-27 23:24:00'),
('16', '1', '2023-05-21 15:11:00', '2023-05-24 15:11:00'),
('16', '3', '2023-05-21 15:11:00', '2023-05-24 15:11:00'),
('17', '4', '2023-05-21 15:58:00', '2023-05-26 15:58:00'),
('17', '5', '2023-05-21 15:58:00', '2023-05-26 15:58:00'),
('18', '5', '2023-05-21 16:19:00', '2023-05-24 16:19:00'),
('18', '7', '2023-05-21 16:19:00', '2023-05-24 16:19:00'),
('19', '3', '2023-05-22 14:57:00', '2023-05-24 14:57:00'),
('19', '4', '2023-05-22 14:57:00', '2023-05-24 14:57:00'),
('19', '5', '2023-05-22 14:57:00', '2023-05-24 14:57:00'),
('20', '10', '2023-05-23 18:40:00', '2023-05-24 18:40:00'),
('20', '11', '2023-05-23 18:40:00', '2023-05-24 18:40:00');

-- --------------------------------------------------------

--
-- 表的结构 `question_bank`
--

CREATE TABLE `question_bank` (
  `no` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `option1` varchar(20) NOT NULL,
  `option2` varchar(20) NOT NULL,
  `option3` varchar(20) NOT NULL,
  `option4` varchar(20) NOT NULL,
  `answer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `question_bank`
--

INSERT INTO `question_bank` (`no`, `content`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, '《党章》规定，对要求入党的积极分子进行教育和培养，要重视在生产、工作第一线和（）中发展党员。', '工人', '农民', '青年', '知识分子', 'C'),
(2, '企业、农村、机关、学校、科研院所、街道社区、社会组织、人民解放军连队和其他基层单位，凡是有正式党员（）人以上的，都应当成立党的基层组织。', '一', '二', '三', '四', 'C'),
(3, '党的中央和省、自治区、直辖市委员会实行巡视制度，在（）内，对所管理的地方、部门、企事业单位党组织实现巡视全覆盖。', '一年', '三年', '十年', '一届任期', 'D'),
(4, '党的基层委员会、总支部委员会、支部委员会每届任期（）。', '三年至五年', '两年或三年', '两年至三年', '三年或五年', 'D'),
(5, '党的基层委员会、总支部委员会、支部委员会的书记、副书记选举产生后，应报（）批准。', '上级党委', '上级组织部门', '上级党组织', '上级党组织书记', 'C'),
(6, '党的基层组织基本任务之一是对党员进行教育、管理、监督和服务，提高党员素质，坚定理想信念，增强党性，（），保障党员的权利不受侵犯。', '严格党的组织生活', '开展批评和自我批评', '维护和执行党的纪律', '监督党员切实履行义务', 'A'),
(7, '党的基层组织，根据工作需要和党员人数，经上级党组织批准，分别设立党的（）。', '基层委员会', '总支部委员会', '支部委员会', '地方委员会', 'ABC'),
(8, '党的市（地、州、盟）和县（市、区、旗）委员会建立（）制度。', '巡视', '巡察', '检查', '监察', 'B'),
(9, '实行行政领导人负责制的事业单位中党的基层组织，发挥（）作用。', '领导核心', '组织领导', '战斗堡垒', '监督检查', 'C'),
(10, '（）是党的全部工作和战斗力的基础。', '党的委员会', '党的基层组织', '党小组', '党支部', 'B'),
(11, '（ ）是党的根本组织原则，也是群众路线在党的生活中的运用。', '民主集中制', '为人民服务', '民主评议党员', '一切依靠群众', 'A'),
(12, '1921年7月23日至8月初,中国共产党第一次全国代表大会先后在（  ）召开。', '上海、天津', '上海、嘉兴', '北京、上海', '北京、上海', 'B'),
(13, '党支部对入党积极分子进行的培养考察时间？(   )', '半年以上', '三个月以上', '一年以上', '2年以上', 'C'),
(14, '中国共产党是(    )的先锋队，同时是中国人民和中华民族的先锋队。 B、村民委员会', '中国工人阶级', '中国工农阶级', '中国农民阶级', '中国知识分子阶级', 'A'),
(15, '坚持(    )，是我们的强国之路。', '经济建设', '改革开放', '解放思想', '', 'B'),
(16, '我们党的最大政治优势是密切联系群众，党执政后的最大危险是 (  )', '脱离党员', '脱离群众', '脱离干部', '', 'B'),
(17, '党必须按照总揽全局、协调各方的原则，在同级各种组织中发挥 (   ) 作用。', '领导核心', '民主自治', '指导', '', 'A'),
(18, '党的十六大第一次把（ ）作为我党的指导思想写入党章之中。', '马克思列宁主义', '毛泽东思想', '邓小平理论', '“三个代表”重要思想', 'D'),
(19, 'sdf', 'f', 'f', 'f', '', 'f'),
(20, 'h', 's', 'g', 'gg', '', 'g'),
(21, 'h', 's', 'g', 'gg', '', 'g'),
(22, 'h', 's', 'g', 'gg', '', 'g');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `role`) VALUES
('2107010118', '666888aa', '2398625952@qq.com', 'admin'),
('a', 'a', '2398625952@qq.com', 'organizer'),
('aa', 'aa', '2398625952@qq.com', 'organizer'),
('aaa', 'aaa', '2398625952@qq.com', 'user'),
('aaaa', 'aaaa', '2398625952@qq.com', 'user'),
('aaq', 'aa', '2398625952@qq.com', 'admin');

--
-- 转储表的索引
--

--
-- 表的索引 `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`no`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
--
-- 数据库： `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
