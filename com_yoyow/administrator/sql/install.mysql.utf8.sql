DROP TABLE IF EXISTS `#__yoyow_associations`;

CREATE TABLE `#__yoyow_associations` (
	`id`            INT     (11)  NOT NULL AUTO_INCREMENT,
	`idjoomlauser`  INT     (11)  NOT NULL,
	`idyoyow`       VARCHAR (100) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;