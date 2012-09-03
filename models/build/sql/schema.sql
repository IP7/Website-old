
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
    `type` TINYINT DEFAULT 0 NOT NULL,
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
    `visits_nb` INTEGER DEFAULT 0,
    `config_show_email` TINYINT(1) DEFAULT 0,
    `config_show_phone` TINYINT(1) DEFAULT 0,
    `config_show_real_name` TINYINT(1) DEFAULT 1,
    `config_show_birthdate` TINYINT(1) DEFAULT 0,
    `config_show_age` TINYINT(1) DEFAULT 1,
    `config_show_address` TINYINT(1) DEFAULT 0,
    `config_index_profile` TINYINT(1) DEFAULT 0,
    `config_private_profile` TINYINT(1) DEFAULT 0,
    `deactivated` TINYINT(1) DEFAULT 1,
    `is_a_teacher` TINYINT(1) DEFAULT 0,
    `is_a_student` TINYINT(1) DEFAULT 0,
    `is_an_alumni` TINYINT(1) DEFAULT 0,
    `avatar_id` INTEGER,
    `description` TEXT(512),
    `remarks` VARCHAR(255),
    PRIMARY KEY (`id`),
    INDEX `users_FI_1` (`avatar_id`),
    CONSTRAINT `users_FK_1`
        FOREIGN KEY (`avatar_id`)
        REFERENCES `files` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
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
    `newsletter_id` INTEGER,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `cursus_U_1` (`name`),
    INDEX `cursus_I_1` (`short_name`),
    INDEX `cursus_FI_1` (`responsable_id`),
    INDEX `cursus_FI_2` (`newsletter_id`),
    CONSTRAINT `cursus_FK_1`
        FOREIGN KEY (`responsable_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL,
    CONSTRAINT `cursus_FK_2`
        FOREIGN KEY (`newsletter_id`)
        REFERENCES `newsletters` (`id`)
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
    `code` VARCHAR(16) NOT NULL,
    `ECTS` FLOAT DEFAULT 3,
    `description` TEXT(1024),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `courses_U_1` (`code`, `semester`, `cursus_id`),
    INDEX `courses_FI_1` (`cursus_id`),
    CONSTRAINT `courses_FK_1`
        FOREIGN KEY (`cursus_id`)
        REFERENCES `cursus` (`id`)
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
    `name` VARCHAR(128) NOT NULL,
    `date` DATETIME NOT NULL,
    `description` VARCHAR(255),
    `file_type` TINYINT,
    `path` VARCHAR(255) NOT NULL,
    `access_rights` TINYINT DEFAULT 0,
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
-- newsletters
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `newsletters`;

CREATE TABLE `newsletters`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `newsletters_U_1` (`name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- newsletters_posts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `newsletters_posts`;

CREATE TABLE `newsletters_posts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `newsletter_id` INTEGER,
    `date` DATETIME NOT NULL,
    `text` TEXT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `newsletters_posts_FI_1` (`newsletter_id`),
    CONSTRAINT `newsletters_posts_FK_1`
        FOREIGN KEY (`newsletter_id`)
        REFERENCES `newsletters` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- newsletters_subscribers
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `newsletters_subscribers`;

CREATE TABLE `newsletters_subscribers`
(
    `subscriber_id` INTEGER NOT NULL,
    `newsletter_id` INTEGER NOT NULL,
    PRIMARY KEY (`subscriber_id`,`newsletter_id`),
    INDEX `newsletters_subscribers_FI_2` (`newsletter_id`),
    CONSTRAINT `newsletters_subscribers_FK_1`
        FOREIGN KEY (`subscriber_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `newsletters_subscribers_FK_2`
        FOREIGN KEY (`newsletter_id`)
        REFERENCES `newsletters` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- alerts
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `alerts`;

CREATE TABLE `alerts`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `subscriber_id` INTEGER NOT NULL,
    `cursus_id` INTEGER,
    `course_id` INTEGER,
    `tag_id` INTEGER,
    `content_type_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `alerts_FI_1` (`subscriber_id`),
    INDEX `alerts_FI_2` (`cursus_id`),
    INDEX `alerts_FI_3` (`course_id`),
    INDEX `alerts_FI_4` (`tag_id`),
    INDEX `alerts_FI_5` (`content_type_id`),
    CONSTRAINT `alerts_FK_1`
        FOREIGN KEY (`subscriber_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `alerts_FK_2`
        FOREIGN KEY (`cursus_id`)
        REFERENCES `cursus` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `alerts_FK_3`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `alerts_FK_4`
        FOREIGN KEY (`tag_id`)
        REFERENCES `tags` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `alerts_FK_5`
        FOREIGN KEY (`content_type_id`)
        REFERENCES `content_types` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- events
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `event_type_id` INTEGER,
    `description` TEXT,
    `date` DATE,
    `beginning` TIME,
    `end` TIME,
    `place` VARCHAR(255),
    `access_rights` TINYINT DEFAULT 0,
    PRIMARY KEY (`id`),
    INDEX `events_FI_1` (`event_type_id`),
    CONSTRAINT `events_FK_1`
        FOREIGN KEY (`event_type_id`)
        REFERENCES `event_types` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- event_types
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `event_types`;

CREATE TABLE `event_types`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `event_types_U_1` (`name`)
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
    `date` DATETIME NOT NULL,
    `access_rights` TINYINT DEFAULT 0,
    `validated` TINYINT(1) DEFAULT 0,
    `title` VARCHAR(255),
    `text` TEXT,
    `cursus_id` INTEGER,
    `course_id` INTEGER,
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
    PRIMARY KEY (`id`)
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
-- tags
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(16) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `tags_I_1` (`name`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- contents_tags
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `contents_tags`;

CREATE TABLE `contents_tags`
(
    `tag_id` INTEGER NOT NULL,
    `content_id` INTEGER NOT NULL,
    PRIMARY KEY (`tag_id`,`content_id`),
    INDEX `contents_tags_FI_2` (`content_id`),
    CONSTRAINT `contents_tags_FK_1`
        FOREIGN KEY (`tag_id`)
        REFERENCES `tags` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `contents_tags_FK_2`
        FOREIGN KEY (`content_id`)
        REFERENCES `contents` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- ads_tags
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ads_tags`;

CREATE TABLE `ads_tags`
(
    `tag_id` INTEGER NOT NULL,
    `ad_id` INTEGER NOT NULL,
    PRIMARY KEY (`tag_id`,`ad_id`),
    INDEX `ads_tags_FI_2` (`ad_id`),
    CONSTRAINT `ads_tags_FK_1`
        FOREIGN KEY (`tag_id`)
        REFERENCES `tags` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `ads_tags_FK_2`
        FOREIGN KEY (`ad_id`)
        REFERENCES `ads` (`id`)
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
-- notes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_id` INTEGER NOT NULL,
    `course_id` INTEGER NOT NULL,
    `score` FLOAT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `notes_FI_1` (`user_id`),
    INDEX `notes_FI_2` (`course_id`),
    CONSTRAINT `notes_FK_1`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `notes_FK_2`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    `date` DATETIME NOT NULL,
    `cursus_id` INTEGER,
    `course_id` INTEGER,
    `access_rights` TINYINT DEFAULT 0,
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
-- ads
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ads`;

CREATE TABLE `ads`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `author_id` INTEGER NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `text` TEXT(400),
    `date` DATETIME NOT NULL,
    `validated` TINYINT(1) DEFAULT 1,
    `access_rights` TINYINT DEFAULT 0,
    PRIMARY KEY (`id`),
    INDEX `ads_FI_1` (`author_id`),
    CONSTRAINT `ads_FK_1`
        FOREIGN KEY (`author_id`)
        REFERENCES `users` (`id`)
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
-- forum_categories
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `forum_categories`;

CREATE TABLE `forum_categories`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `parent_id` INTEGER,
    `access_rights` TINYINT DEFAULT 0,
    PRIMARY KEY (`id`),
    INDEX `forum_categories_FI_1` (`parent_id`),
    CONSTRAINT `forum_categories_FK_1`
        FOREIGN KEY (`parent_id`)
        REFERENCES `forum_categories` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- forum_topics
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `forum_topics`;

CREATE TABLE `forum_topics`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `category_id` INTEGER NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `is_locked` TINYINT(1) DEFAULT 0,
    `is_announcement` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id`),
    INDEX `forum_topics_FI_1` (`category_id`),
    CONSTRAINT `forum_topics_FK_1`
        FOREIGN KEY (`category_id`)
        REFERENCES `forum_categories` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- forum_messages
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `forum_messages`;

CREATE TABLE `forum_messages`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `author_id` INTEGER NOT NULL,
    `topic_id` INTEGER NOT NULL,
    `last_modification` DATETIME NOT NULL,
    `text` TEXT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `forum_messages_FI_1` (`author_id`),
    INDEX `forum_messages_FI_2` (`topic_id`),
    CONSTRAINT `forum_messages_FK_1`
        FOREIGN KEY (`author_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `forum_messages_FK_2`
        FOREIGN KEY (`topic_id`)
        REFERENCES `forum_topics` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    `name` VARCHAR(32) NOT NULL,
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

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
