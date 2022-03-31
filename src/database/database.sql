CREATE TABLE `offers` (
	`id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `offer_name` varchar(32) NOT NULL
);

CREATE TABLE `company` (
  `id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cover_img_url` text NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `about` text NOT NULL,
  `telephone` varchar(9) NOT NULL,
  `location` varchar(128) NOT NULL,
  `occupation` int UNSIGNED NOT NULL,
  `company_desc` text NOT NULL,
    
   CONSTRAINT FOREIGN KEY(`occupation`) REFERENCES `offers`(`id`)
);

CREATE TABLE `cards` (
  `id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `company_id` int UNSIGNED DEFAULT NULL,
  `img_url_1` text DEFAULT NULL,
  `img_url_2` text DEFAULT NULL,
  `img_url_3` text DEFAULT NULL,
  `desc_1` text DEFAULT NULL,
  `desc_2` text DEFAULT NULL,
  `desc_3` text DEFAULT NULL,
    
    CONSTRAINT FOREIGN KEY(`company_id`) REFERENCES `company`(`id`)
);

CREATE TABLE `links` (
  `id` int UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `company_id` int UNSIGNED DEFAULT NULL,
  `linkedin` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `github` text NOT NULL,
    CONSTRAINT FOREIGN KEY(`company_id`) REFERENCES `company`(`id`)
);