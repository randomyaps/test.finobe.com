# test.finobe.com
This is a finobe.com recreation in php,
it is missing lots of html pages, if you have any,
please give it to us and we will credit you as well
as add it to the project.
# Kind Donators of HTMLs
- 0k
- era
# How to set up:
create a database in sql called finobe
run the following code on SQL tab:
```
CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `info` longtext NOT NULL,
  `creatorid` varchar(100) NOT NULL,
  `playing` varchar(100) NOT NULL,
  `maxplayer` varchar(100) NOT NULL,
  `favorited` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `createdon` longtext NOT NULL,
  `assetype` varchar(100) NOT NULL,
  `genre` longtext NOT NULL,
  `approved` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `message` longtext DEFAULT NULL,
  `dius` varchar(100) NOT NULL,
  `blurb` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
```
once you did that
go to ```general\loadingValues\generalConfigs.php```
and then modify the configurations to match your stuff
