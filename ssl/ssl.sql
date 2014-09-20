
CREATE TABLE `certificates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `shared` tinyint(3) unsigned NOT NULL,
  `fqdn` varchar(255) NOT NULL,
  `altnames` text NOT NULL,
  `validstart` datetime NOT NULL,
  `validend` datetime NOT NULL,
  `sslcsr` text NOT NULL,
  `sslkey` text NOT NULL,
  `sslcrt` text NOT NULL,
  `sslchain` text NOT NULL,
  `ssl_action` varchar(32) NOT NULL,
  `ssl_result` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `ssl_action` (`ssl_action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
