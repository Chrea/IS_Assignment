SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Drop old tables
DROP TABLE IF EXISTS `blogposts`;
DROP TABLE IF EXISTS `photos`;


-- Create new tables
CREATE TABLE `blogposts`
( `postId`    int(10)        NOT NULL AUTO_INCREMENT
, `author`    varchar(64)    NOT NULL
, `avatar`    text    NOT NULL
, `title`     varchar(64)    NOT NULL
, `content`   text  NOT NULL
, `votes`     int(3)         NOT NULL
, `postDate`  varchar(10)    NOT NULL
, `images`    text
, PRIMARY KEY(`postId`)
);

CREATE TABLE `photos`
( `photoId`		int(10)         NOT NULL AUTO_INCREMENT
, `title`     varchar(64)      NOT NULL
, `author`		varchar(64)    NOT NULL
, `photo` 		text    NOT NULL
, `description`	text
, `postDate`    varchar(10)    NOT NULL
, PRIMARY KEY(`photoId`)
);


-- Insert dummy data into both tables
INSERT INTO `blogposts`
  VALUES (1, 'Chris Klassen', 'https://en.gravatar.com/userimage/17321210/5b8283d1650b1c74193e660de9570608.png', 'Post A', 'Hello!', 5, '2015-02-14', '../../data/rhea.png~../../data/rhea.png');
INSERT INTO `blogposts`
  VALUES (2, 'Chris Klassen', 'https://en.gravatar.com/userimage/17321210/5b8283d1650b1c74193e660de9570608.png', 'Post B', 'Hello there!', 23, '2015-02-15', '../../data/rhea.png~../../data/rhea.png');
INSERT INTO `blogposts`
  VALUES (3, 'Rhea Lauzon', 'https://en.gravatar.com/userimage/17321210/5b8283d1650b1c74193e660de9570608.png', 'Post C', 'Boo!', 74, '2015-02-17', '../../data/rhea.png~../../data/rhea.png');

INSERT INTO `photos`
  VALUES (1, 'Magic', 'Rhea Lauzon', 'https://magnesiumninja.files.wordpress.com/2015/01/7e7973792cdb7608f68f6efd3876ef56.png', 'Beautiful.', '2015-02-06');
INSERT INTO `photos`
  VALUES (2, 'Incredible', 'Rhea Lauzon', 'https://magnesiumninja.files.wordpress.com/2015/01/3590225fc185f3877a9990556a09e2b2.png', 'Gorgeous.', '2015-02-08');
INSERT INTO `photos`
  VALUES (3, 'Absolute', 'Chris Klassen', 'https://magnesiumninja.files.wordpress.com/2014/07/screen2.png', 'Scrumptious.', '2015-02-15');
