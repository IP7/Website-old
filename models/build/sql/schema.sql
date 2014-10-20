
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(16),
    `password_hash` VARCHAR(255),
    `rights` TINYINT DEFAULT 0 NOT NULL,
    `firstname` VARCHAR(64) NOT NULL,
    `lastname` VARCHAR(128) NOT NULL,
    `gender` TINYINT DEFAULT 0,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20),
    `website` VARCHAR(255),
    `birth_date` DATE,
    `first_entry` DATE,
    `last_entry` DATE,
    `expiration_date` DATE,
    `last_visit` DATETIME,
    `visits_count` INTEGER DEFAULT 0,
    `config_show_email` TINYINT(1) DEFAULT 0,
    `config_show_phone` TINYINT(1) DEFAULT 0,
    `config_show_real_name` TINYINT(1) DEFAULT 1,
    `config_show_birthdate` TINYINT(1) DEFAULT 0,
    `config_show_age` TINYINT(1) DEFAULT 1,
    `config_index_profile` TINYINT(1) DEFAULT 0,
    `config_private_profile` TINYINT(1) DEFAULT 0,
    `activated` TINYINT(1) DEFAULT 0,
    `is_a_teacher` TINYINT(1) DEFAULT 0,
    `is_a_student` TINYINT(1) DEFAULT 0,
    `is_an_alumni` TINYINT(1) DEFAULT 0,
    `description` TEXT(512),
    `remarks` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- cursus
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cursus`;

CREATE TABLE `cursus`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `short_name` CHAR(2) NOT NULL,
    `name` VARCHAR(16) NOT NULL,
    `description` TEXT(1024),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `cursus_U_1` (`name`),
    INDEX `cursus_I_1` (`short_name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- courses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `cursus_id` INTEGER,
    `semester` TINYINT DEFAULT 0,
    `name` VARCHAR(64) NOT NULL,
    `short_name` VARCHAR(16) NOT NULL,
    `ECTS` FLOAT DEFAULT 3,
    `description` TEXT(1024),
    `use_sourcecode` TINYINT(1) DEFAULT 1,
    `deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `courses_U_1` (`short_name`, `semester`, `cursus_id`),
    INDEX `courses_FI_1` (`cursus_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- courses_aliases
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `courses_aliases`;

CREATE TABLE `courses_aliases`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    `short_name` VARCHAR(16) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `courses_aliases_FI_1` (`course_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- educational_paths
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `educational_paths`;

CREATE TABLE `educational_paths`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `short_name` VARCHAR(8) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `description` TEXT(1024),
    `cursus_id` INTEGER NOT NULL,
    `deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `educational_paths_U_1` (`short_name`, `cursus_id`),
    INDEX `educational_paths_FI_1` (`cursus_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- educational_paths_optional_courses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `educational_paths_optional_courses`;

CREATE TABLE `educational_paths_optional_courses`
(
    `course_id` INTEGER NOT NULL,
    `path_id` INTEGER NOT NULL,
    PRIMARY KEY (`course_id`,`path_id`),
    INDEX `educational_paths_optional_courses_FI_2` (`path_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- educational_paths_mandatory_courses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `educational_paths_mandatory_courses`;

CREATE TABLE `educational_paths_mandatory_courses`
(
    `course_id` INTEGER NOT NULL,
    `path_id` INTEGER NOT NULL,
    PRIMARY KEY (`course_id`,`path_id`),
    INDEX `educational_paths_mandatory_courses_FI_2` (`path_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- files
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `author_id` INTEGER,
    `title` VARCHAR(128) NOT NULL,
    `date` DATETIME NOT NULL,
    `description` VARCHAR(255),
    `file_type` TINYINT,
    `path` VARCHAR(255) NOT NULL,
    `access_rights` TINYINT DEFAULT 0,
    `deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `files_U_1` (`path`),
    INDEX `files_FI_1` (`author_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- contents
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `author_id` INTEGER,
    `content_type_id` INTEGER,
    `access_rights` TINYINT DEFAULT 0,
    `validated` TINYINT(1) DEFAULT 0,
    `title` VARCHAR(255),
    `text` TEXT,
    `cursus_id` INTEGER,
    `course_id` INTEGER,
    `year` INTEGER,
    `deleted` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `contents_FI_1` (`author_id`),
    INDEX `contents_FI_2` (`cursus_id`),
    INDEX `contents_FI_3` (`course_id`),
    INDEX `contents_FI_4` (`content_type_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- contents_files
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `contents_files`;

CREATE TABLE `contents_files`
(
    `content_id` INTEGER NOT NULL,
    `file_id` INTEGER NOT NULL,
    PRIMARY KEY (`content_id`,`file_id`),
    INDEX `contents_files_FI_2` (`file_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- content_types
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `content_types`;

CREATE TABLE `content_types`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `short_name` VARCHAR(16) NOT NULL,
    `access_rights` TINYINT DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `content_types_U_1` (`name`),
    UNIQUE INDEX `content_types_U_2` (`short_name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- news
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `author_id` INTEGER NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `text` TEXT(1024) NOT NULL,
    `expiration_date` DATETIME,
    `cursus_id` INTEGER,
    `course_id` INTEGER,
    `access_rights` TINYINT DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `news_FI_1` (`author_id`),
    INDEX `news_FI_2` (`course_id`),
    INDEX `news_FI_3` (`cursus_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- tokens
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tokens`;

CREATE TABLE `tokens`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER,
    `expiration_date` DATETIME,
    `rights` TINYINT DEFAULT 0,
    `value` VARCHAR(255) NOT NULL,
    `method` TINYINT DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `tokens_U_1` (`value`),
    INDEX `tokens_FI_1` (`user_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- courses_urls
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `courses_urls`;

CREATE TABLE `courses_urls`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_id` INTEGER NOT NULL,
    `text` VARCHAR(255) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `courses_urls_FI_1` (`course_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- shortlinks
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shortlinks`;

CREATE TABLE `shortlinks`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `short_url` VARCHAR(255) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `clicks_count` INTEGER DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `shortlinks_U_1` (`short_url`),
    UNIQUE INDEX `shortlinks_U_2` (`url`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- files_archives
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `files_archives`;

CREATE TABLE `files_archives`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `files_ids` VARCHAR(255) NOT NULL,
    `title` VARCHAR(128) NOT NULL,
    `date` DATETIME NOT NULL,
    `path` VARCHAR(255) NOT NULL,
    `access_rights` TINYINT DEFAULT 0,
    `deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `files_archives_U_1` (`path`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- courses_contents_archives
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `courses_contents_archives`;

CREATE TABLE `courses_contents_archives`
(
    `course_id` INTEGER NOT NULL,
    `archive_id` INTEGER NOT NULL,
    PRIMARY KEY (`course_id`,`archive_id`),
    INDEX `courses_contents_archives_FI_2` (`archive_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- pages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `url` VARCHAR(64) NOT NULL,
    `title` VARCHAR(64) NOT NULL,
    `text` TEXT(4096) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
