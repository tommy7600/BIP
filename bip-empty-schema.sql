SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `approved_revision_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_articles_revision_ibfk_1_idx` (`approved_revision_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `articles_contents`;
CREATE TABLE `articles_contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `articles_revisions`;
CREATE TABLE `articles_revisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `global_revision` int(10) unsigned NOT NULL,
  `title_id` int(10) unsigned NOT NULL,
  `content_id` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `gallery_id` int(10) unsigned DEFAULT NULL,
  `date` int(10) unsigned NOT NULL,
  `approved_by_id` int(10) unsigned DEFAULT NULL,
  `approval_date` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_articles_revsions_ibfk_1_idx` (`article_id`),
  KEY `articles_users_ibfk_2_idx` (`approved_by_id`),
  KEY `articles_users_ibfk_3_idx` (`author_id`),
  KEY `articles_articles_contents_ibfk_4_idx` (`content_id`),
  KEY `articles_articles_titles_ibfk_5_idx` (`title_id`),
  KEY `articles_revisions_galleries_ibfk_6_idx` (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `articles_titles`;
CREATE TABLE `articles_titles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `approved_revision_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_galleries_revisions_ibfk_1_idx` (`approved_revision_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `galleries_images`;
CREATE TABLE `galleries_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_revision_id` int(10) unsigned NOT NULL,
  `image_revision_id` int(10) unsigned NOT NULL,
  `order` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_images_images_revisions_ibfk_1_idx` (`image_revision_id`),
  KEY `galleries_images_galleries_revisions_ibfk_2_idx` (`gallery_revision_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `galleries_revisions`;
CREATE TABLE `galleries_revisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(10) unsigned NOT NULL,
  `title_id` int(10) unsigned NOT NULL,
  `global_revision` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `date` int(11) DEFAULT NULL,
  `approved_by_id` int(10) unsigned DEFAULT NULL,
  `approval_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_revisions_galleries_titles_ibfk_2_idx` (`title_id`),
  KEY `galleries_revisions_users_ibfk_3_idx` (`author_id`),
  KEY `galleries_revisions_users_ibfk_4_idx` (`approved_by_id`),
  KEY `galleries_revisions_galleries_ibfk_1` (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `galleries_titles`;
CREATE TABLE `galleries_titles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `images_descriptions`;
CREATE TABLE `images_descriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `images_revisions`;
CREATE TABLE `images_revisions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_id` int(10) unsigned NOT NULL,
  `revision` int(11) NOT NULL,
  `description_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_revisions_images_ibfk_1` (`image_id`),
  KEY `images_revisions_descriptions_ibfk1` (`description_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `user_tokens`;
CREATE TABLE `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  KEY `expires` (`expires`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


ALTER TABLE `articles`
  ADD CONSTRAINT `articles_articles_revision_ibfk_1` FOREIGN KEY (`approved_revision_id`) REFERENCES `articles_revisions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `articles_revisions`
  ADD CONSTRAINT `articles_articles_contents_ibfk_4` FOREIGN KEY (`content_id`) REFERENCES `articles_contents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articles_articles_revsions_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articles_articles_titles_ibfk_5` FOREIGN KEY (`title_id`) REFERENCES `articles_titles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articles_revisions_galleries_ibfk_6` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articles_revisions_ibfk_1` FOREIGN KEY (`approved_by_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `articles_users_ibfk_3` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_galleries_revisions_ibfk_1` FOREIGN KEY (`approved_revision_id`) REFERENCES `galleries_revisions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `galleries_images`
  ADD CONSTRAINT `galleries_images_images_revisions_ibfk_1` FOREIGN KEY (`image_revision_id`) REFERENCES `images_revisions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `galleries_images_galleries_revisions_ibfk_2` FOREIGN KEY (`gallery_revision_id`) REFERENCES `galleries_revisions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `galleries_revisions`
  ADD CONSTRAINT `galleries_revisions_galleries_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `galleries_revisions_galleries_titles_ibfk_2` FOREIGN KEY (`title_id`) REFERENCES `galleries_titles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `galleries_revisions_users_ibfk_3` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `galleries_revisions_users_ibfk_4` FOREIGN KEY (`approved_by_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `images_revisions`
  ADD CONSTRAINT `images_revisions_ibfk_1` FOREIGN KEY (`description_id`) REFERENCES `images_descriptions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `images_revisions_images_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
