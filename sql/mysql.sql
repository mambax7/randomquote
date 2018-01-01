#
# Structure table for `randomquote_quotes` 6
#

CREATE TABLE `randomquote_quotes` (
  `id`      INT(11)      NOT NULL  AUTO_INCREMENT,
  `quote`   TEXT         NOT NULL,
  `author`  VARCHAR(255) NOT NULL,
  `online`  INT(10)      NOT NULL  DEFAULT 1,
  `created` TIMESTAMP    NOT NULL  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cid`     INT(8)       NOT NULL  DEFAULT 0,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM;

#
# Structure table for `randomquote_category` 8
#

CREATE TABLE `randomquote_category` (
  `id`          INT(8)       NOT NULL  AUTO_INCREMENT,
  `pid`         INT(8)       NOT NULL  DEFAULT 0,
  `title`       VARCHAR(255) NOT NULL,
  `description` TEXT         NULL,
  `image`       VARCHAR(255) NULL,
  `weight`      INT(5)       NOT NULL  DEFAULT 0,
  `color`       VARCHAR(10)  NOT NULL  DEFAULT '0',
  `online`      TINYINT(2)   NOT NULL  DEFAULT 1,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM;
