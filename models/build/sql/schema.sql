
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
    `responsable_id` INTEGER,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `cursus_U_1` (`name`),
    INDEX `cursus_I_1` (`short_name`),
    INDEX `cursus_FI_1` (`responsable_id`),
    CONSTRAINT `cursus_FK_1`
        FOREIGN KEY (`responsable_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
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
    `use_latex` TINYINT(1) DEFAULT 0,
    `use_sourcecode` TINYINT(1) DEFAULT 1,
    `deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `courses_U_1` (`short_name`, `semester`, `cursus_id`),
    INDEX `courses_FI_1` (`cursus_id`),
    CONSTRAINT `courses_FK_1`
        FOREIGN KEY (`cursus_id`)
        REFERENCES `cursus` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    INDEX `courses_aliases_FI_1` (`course_id`),
    CONSTRAINT `courses_aliases_FK_1`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    `responsable_id` INTEGER,
    `deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `educational_paths_U_1` (`short_name`, `cursus_id`),
    INDEX `educational_paths_FI_1` (`cursus_id`),
    INDEX `educational_paths_FI_2` (`responsable_id`),
    CONSTRAINT `educational_paths_FK_1`
        FOREIGN KEY (`cursus_id`)
        REFERENCES `cursus` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `educational_paths_FK_2`
        FOREIGN KEY (`responsable_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- users_paths
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users_paths`;

CREATE TABLE `users_paths`
(
    `user_id` INTEGER NOT NULL,
    `path_id` INTEGER NOT NULL,
    PRIMARY KEY (`user_id`,`path_id`),
    INDEX `users_paths_FI_2` (`path_id`),
    CONSTRAINT `users_paths_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `users_paths_FK_2`
        FOREIGN KEY (`path_id`)
        REFERENCES `educational_paths` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    INDEX `educational_paths_optional_courses_FI_2` (`path_id`),
    CONSTRAINT `educational_paths_optional_courses_FK_1`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `educational_paths_optional_courses_FK_2`
        FOREIGN KEY (`path_id`)
        REFERENCES `educational_paths` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    INDEX `educational_paths_mandatory_courses_FI_2` (`path_id`),
    CONSTRAINT `educational_paths_mandatory_courses_FK_1`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `educational_paths_mandatory_courses_FK_2`
        FOREIGN KEY (`path_id`)
        REFERENCES `educational_paths` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    `downloads_count` INTEGER DEFAULT 0,
    `deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `files_U_1` (`path`),
    INDEX `files_FI_1` (`author_id`),
    CONSTRAINT `files_FK_1`
        FOREIGN KEY (`author_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
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
    INDEX `contents_FI_4` (`content_type_id`),
    CONSTRAINT `contents_FK_1`
        FOREIGN KEY (`author_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL,
    CONSTRAINT `contents_FK_2`
        FOREIGN KEY (`cursus_id`)
        REFERENCES `cursus` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `contents_FK_3`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `contents_FK_4`
        FOREIGN KEY (`content_type_id`)
        REFERENCES `content_types` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
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
    INDEX `contents_files_FI_2` (`file_id`),
    CONSTRAINT `contents_files_FK_1`
        FOREIGN KEY (`content_id`)
        REFERENCES `contents` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `contents_files_FK_2`
        FOREIGN KEY (`file_id`)
        REFERENCES `files` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
-- content_comments
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `content_comments`;

CREATE TABLE `content_comments`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `reply_to_id` INTEGER,
    `content_id` INTEGER,
    `author_id` INTEGER,
    `date` DATETIME NOT NULL,
    `text` TEXT(2048) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `content_comments_FI_1` (`reply_to_id`),
    INDEX `content_comments_FI_2` (`content_id`),
    INDEX `content_comments_FI_3` (`author_id`),
    CONSTRAINT `content_comments_FK_1`
        FOREIGN KEY (`reply_to_id`)
        REFERENCES `content_comments` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL,
    CONSTRAINT `content_comments_FK_2`
        FOREIGN KEY (`content_id`)
        REFERENCES `contents` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `content_comments_FK_3`
        FOREIGN KEY (`author_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- reports
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `reports`;

CREATE TABLE `reports`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `content_id` INTEGER,
    `author_id` INTEGER,
    `date` DATETIME NOT NULL,
    `text` VARCHAR(255),
    PRIMARY KEY (`id`),
    INDEX `reports_FI_1` (`content_id`),
    INDEX `reports_FI_2` (`author_id`),
    CONSTRAINT `reports_FK_1`
        FOREIGN KEY (`content_id`)
        REFERENCES `contents` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `reports_FK_2`
        FOREIGN KEY (`author_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
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
    INDEX `news_FI_3` (`cursus_id`),
    CONSTRAINT `news_FK_1`
        FOREIGN KEY (`author_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL,
    CONSTRAINT `news_FK_2`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `news_FK_3`
        FOREIGN KEY (`cursus_id`)
        REFERENCES `cursus` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- transactions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(255) NOT NULL,
    `amount` DOUBLE DEFAULT 0 NOT NULL,
    `user_id` INTEGER,
    `validated` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    INDEX `transactions_FI_1` (`user_id`),
    CONSTRAINT `transactions_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- exams
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `exams`;

CREATE TABLE `exams`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_id` INTEGER NOT NULL,
    `date` DATE NOT NULL,
    `beginning` TIME,
    `end` TIME,
    `comments` VARCHAR(255),
    PRIMARY KEY (`id`),
    INDEX `exams_FI_1` (`course_id`),
    CONSTRAINT `exams_FK_1`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- schedules
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `schedules`;

CREATE TABLE `schedules`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `cursus_id` INTEGER,
    `path_id` INTEGER,
    `title` VARCHAR(32) NOT NULL,
    `beginning` DATE,
    `end` DATE,
    PRIMARY KEY (`id`),
    INDEX `schedules_FI_1` (`cursus_id`),
    INDEX `schedules_FI_2` (`path_id`),
    CONSTRAINT `schedules_FK_1`
        FOREIGN KEY (`cursus_id`)
        REFERENCES `cursus` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `schedules_FK_2`
        FOREIGN KEY (`path_id`)
        REFERENCES `educational_paths` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- scheduled_courses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `scheduled_courses`;

CREATE TABLE `scheduled_courses`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_id` INTEGER NOT NULL,
    `teacher_id` INTEGER,
    `teacher_name` VARCHAR(32),
    `weekday` TINYINT,
    `beginning` TIME,
    `end` TIME,
    `place` VARCHAR(32),
    PRIMARY KEY (`id`),
    INDEX `scheduled_courses_FI_1` (`course_id`),
    INDEX `scheduled_courses_FI_2` (`teacher_id`),
    CONSTRAINT `scheduled_courses_FK_1`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `scheduled_courses_FK_2`
        FOREIGN KEY (`teacher_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- schedules_courses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `schedules_courses`;

CREATE TABLE `schedules_courses`
(
    `schedule_id` INTEGER NOT NULL,
    `scheduled_course_id` INTEGER NOT NULL,
    PRIMARY KEY (`schedule_id`,`scheduled_course_id`),
    INDEX `schedules_courses_FI_2` (`scheduled_course_id`),
    CONSTRAINT `schedules_courses_FK_1`
        FOREIGN KEY (`schedule_id`)
        REFERENCES `schedules` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `schedules_courses_FK_2`
        FOREIGN KEY (`scheduled_course_id`)
        REFERENCES `scheduled_courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    INDEX `tokens_FI_1` (`user_id`),
    CONSTRAINT `tokens_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    INDEX `courses_urls_FI_1` (`course_id`),
    CONSTRAINT `courses_urls_FK_1`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
-- courses_contents_archives
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `courses_contents_archives`;

CREATE TABLE `courses_contents_archives`
(
    `course_id` INTEGER NOT NULL,
    `file_id` INTEGER NOT NULL,
    PRIMARY KEY (`course_id`,`file_id`),
    INDEX `courses_contents_archives_FI_2` (`file_id`),
    CONSTRAINT `courses_contents_archives_FK_1`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `courses_contents_archives_FK_2`
        FOREIGN KEY (`file_id`)
        REFERENCES `files` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
