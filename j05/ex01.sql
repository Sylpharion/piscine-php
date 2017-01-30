CREATE TABLE IF NOT EXISTS `ft_table` (
`id` int UNSIGNED NOT NULL AUTO_INCREMENT NOT NULL,
`login` varchar(8) DEFAULT 'toto',
groupe ENUM('staff', 'student', 'other') NOT NULL,
`date_de_creation` date NOT NULL,
PRIMARY KEY (`id`));
