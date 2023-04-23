CREATE TABLE `wea`.`users` (`id` INT(255) NOT NULL AUTO_INCREMENT , `username` VARCHAR(256) NOT NULL , `email` VARCHAR(256) NOT NULL , `password` VARCHAR(256) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `wea`.`words` (`id` INT(255) NOT NULL AUTO_INCREMENT , `word` VARCHAR(256) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `wea`.`stats` (`id` INT(255) NOT NULL , `win` BOOLEAN NOT NULL , `user_id` INT(255) NOT NULL , `word_id` INT(255) NOT NULL ) ENGINE = InnoDB;

INSERT INTO words (word)
VALUES ('kabat'),
       ('prst'),
       ('praha'),
       ('auto'),
       ('kolo'),
       ('kapka'),
       ('krab'),
       ('mrak'),
       ('stavba'),
       ('svaz'),
       ('kruh'),
       ('meloun'),
       ('mamut'),
       ('krok'),
       ('truhla'),
       ('chlup'),
       ('letadlo'),
       ('kostka'),
       ('sklo'),
       ('trubka'),
       ('voda'),
       ('velryba'),
       ('kozel'),
       ('pudl'),
       ('had');
