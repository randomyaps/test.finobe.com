# sitetest1.finobe.com
Hi there, this is a finobe.com rewrite.
This is currently a W.I.P (Work In Progress) so things might not work, or might be missing.
# NOTICE
This is a very outdated version of this project, and i have learned how to do so many more things in PHP now.
I do NOT recommend or endorse anyone to ever, EVER use this for any actual project.
This code contains various vulns, uses outdated methods and probably is prone to SQL injecting.
# How to set up:
First create a database in MySQL, called finobe.

Then click on the finobe database, and then on the tab 'SQL'.

Then copy and paste the following code:
```
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NULL,
  `dius` varchar(100) NOT NULL,
  `blurb` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `banned` varchar(100) NULL,
  `warn` varchar(100) NULL,
  `bannedreason` varchar(100) NULL,
  `finobetoken` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```
click on Go, and then do the same for the code below:
```
CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(100) NOT NULL,
  `by` varchar(100) NOT NULL,
  `playing` varchar(100) NOT NULL,
  `blurb` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

After that, copy and paste src to htdocs, and modify values at /general/loadvls.php
