# test.finobe.com (new update)
this is a finobe.com rewrite in php
it is missing hundreds of pages
it has been rewritten to use safer and more newer php functions
it also jquery for the games page and pretty much works better than the old version
# How to set up:
create a database in sql called finobe
run the following code on SQL tab:
```
CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `info` longtext NOT NULL,
  `creatorname` longtext NOT NULL,
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
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL,
  `message` longtext DEFAULT NULL,
  `dius` varchar(100) NOT NULL,
  `blurb` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```
once you did that
go to general\loadingValues\generalConfigs.php
and then modify the configurations to match your stuff
