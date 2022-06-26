DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
    `id`    int unsigned NOT NULL AUTO_INCREMENT,
    `name`  varchar(30),
    `email` varchar(30),
    `password`    varchar(32),
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3;

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`
(
    `id`          int unsigned NOT NULL AUTO_INCREMENT,
    `title`       varchar(30),
    `question`    varchar(300),
    `select_type` enum ('single','multi') NOT NULL DEFAULT 'single' COMMENT 'варианты выбора ответов',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3;

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options`
(
    `id`          int          NOT NULL AUTO_INCREMENT,
    `question_id` int unsigned NOT NULL,
    `option`      varchar(300),
    PRIMARY KEY (`id`),
    KEY `question_id` (`question_id`),
    CONSTRAINT `options_fk1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3;

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers`
(
    `id`          int          NOT NULL AUTO_INCREMENT,
    `user_id`     int unsigned NOT NULL,
    `question_id` int unsigned NOT NULL,
    `answer`      varchar(300),
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    KEY `question_id` (`question_id`),
    CONSTRAINT `answers_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
    CONSTRAINT `answers_fk2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3;
