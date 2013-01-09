INSERT INTO `roles` ( `name`, `description`) VALUES
( 'redactor', 'Can add and edit articles and galeries.'),
( 'god', 'Can add, edit, delete and confirm articles and galeries.');


INSERT INTO `users` ( `email`, `username`, `password`, `logins`, `last_login`) VALUES
( 'tbula@future-processing.com', 'Kenny', 'ffc7fa3a4cf481ecbd5e55597099a246d522299c424d1c999e9f70ff09da59ed', 9, 1357736919),
(  'redactor@qwe.com', 'Redactor', 'ffc7fa3a4cf481ecbd5e55597099a246d522299c424d1c999e9f70ff09da59ed', 0, NULL),
(  'god@qwe.com', 'god', 'ffc7fa3a4cf481ecbd5e55597099a246d522299c424d1c999e9f70ff09da59ed', 0, NULL),
(  'admin@qwe.com', 'admin', 'ffc7fa3a4cf481ecbd5e55597099a246d522299c424d1c999e9f70ff09da59ed', 0, NULL);


INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(2, 1),
(2, 2),
(5, 2),
(2, 3),
(2, 4),
(3, 4),
(4, 4);

/*pass: superhaslo