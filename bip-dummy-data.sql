SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

INSERT INTO `articles` (`id`, `approved_revision_id`) VALUES
(1, NULL);

INSERT INTO `articles_contents` (`id`, `content`) VALUES
(1, 'test_article_content');

INSERT INTO `articles_titles` (`id`, `title`) VALUES
(1, 'test_article_title');

INSERT INTO `galleries_titles` (`id`, `title`) VALUES
(1, 'test_gallery_title');

INSERT INTO `images` (`id`, `path`) VALUES
(1, '/path/to/image');

INSERT INTO `images_descriptions` (`id`, `description`) VALUES
(1, 'test_image_description');

INSERT INTO `images_revisions` (`id`, `image_id`, `revision`, `description_id`) VALUES
(1, 1, 1, 1);

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

INSERT INTO `users` (`email`, `username`, `password`, `logins`, `last_login`) VALUES
('test@test.com', 'xylem', '1234', 0, NULL);

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1);

INSERT INTO `articles_revisions` (`id`, `article_id`, `global_revision`, `title_id`, `content_id`, `author_id`, `gallery_id`, `date`, `approved_by_id`, `approval_date`) VALUES
(1, 1, 1, 1, 1, 1, NULL, 12345678, 1, 12345679);


INSERT INTO `galleries` (`id`, `approved_revision_id`) VALUES
(1, NULL);

INSERT INTO `bip`.`galleries_revisions` (`id`, `gallery_id`, `title_id`, `global_revision`, `author_id`, `date`, `approved_by_id`, `approval_date`) VALUES ('1', '1', '1', '0', '1', NULL, NULL, NULL);

INSERT INTO `galleries_images` (`id`, `gallery_revision_id`, `image_revision_id`, `order`) VALUES
(1, 1, 1, 1);

