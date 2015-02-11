
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


CREATE TABLE IF NOT EXISTS `certif_alias` (
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`name`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Global aliases defined for SSL certificates FILE validation processes';

INSERT IGNORE INTO `domaines_type` (name ,description ,target ,entry ,compatibility ,enable ,only_dns ,need_dns ,advanced ) VALUES ('vhost-ssl','Locally hosted WITH SSL','DIRECTORY','%SUB% IN A @@PUBLIC_IP@@','vhost,url,txt,defmx,defmx2,mx,mx2','ALL',0,0,0,1,1);
INSERT IGNORE INTO `domaines_type` (name ,description ,target ,entry ,compatibility ,enable ,only_dns ,need_dns ,advanced ) VALUES ('url-ssl','URL redirection WITH SSL','URL','%SUB% IN A @@PUBLIC_IP@@','vhost,url,txt,defmx,defmx2','ALL',0,0,0,0,0);
INSERT IGNORE INTO `domaines_type` (name ,description ,target ,entry ,compatibility ,enable ,only_dns ,need_dns ,advanced ) VALUES ('panel-ssl','AlternC panel access WITH SSL','NONE','%SUB% IN A @@PUBLIC_IP@@','panel,ip,ipv6,cname,txt,mx,mx2,defmx,defmx2','ALL',0,0,1,0,0);
INSERT IGNORE INTO `domaines_type` (name ,description ,target ,entry ,compatibility ,enable ,only_dns ,need_dns ,advanced ) VALUES ('roundcube-ssl','Roundcube Webmail access WITH SSL', 'NONE', '%SUB% IN A @@PUBLIC_IP@@', 'mx,mx2,defmx,defmx2,roundcube,txt', 'ALL', '0', '0', '0');
INSERT IGNORE INTO `domaines_type` (name ,description ,target ,entry ,compatibility ,enable ,only_dns ,need_dns ,advanced ) VALUES ('squirrelmail-ssl','Squirrelmail Webmail access WITH SSL', 'NONE', '%SUB% IN A @@PUBLIC_IP@@', 'mx,mx2,defmx,defmx2,squirrelmail,txt', 'ALL', '0', '0', '0');

