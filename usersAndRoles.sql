INSERT INTO `roles` ( `name`, `description`) VALUES
( 'redactor', 'Can add and edit articles and galeries.'),
( 'god', 'Can add, edit, delete and confirm articles and galeries.');


INSERT INTO `users` ( `userscol`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
( NULL, 'tbula@future-processing.com', 'Kenny', 'ffc7fa3a4cf481ecbd5e55597099a246d522299c424d1c999e9f70ff09da59ed', 9, 1357736919),
( NULL, 'redactor@qwe.com', 'Redactor', 'ffc7fa3a4cf481ecbd5e55597099a246d522299c424d1c999e9f70ff09da59ed', 0, NULL),
( NULL, 'god@qwe.com', 'god', 'ffc7fa3a4cf481ecbd5e55597099a246d522299c424d1c999e9f70ff09da59ed', 0, NULL),
( NULL, 'admin@qwe.com', 'admin', 'ffc7fa3a4cf481ecbd5e55597099a246d522299c424d1c999e9f70ff09da59ed', 0, NULL);


INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(9, 2),
(1, 3),
(1, 4),
(7, 4),
(8, 4);

/*pass: superhaslo