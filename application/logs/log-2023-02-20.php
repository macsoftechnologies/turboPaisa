<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-20 01:28:44 --> 404 Page Not Found: Controller/extension
ERROR - 2023-02-20 12:39:42 --> Query error: User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) - Invalid query: SELECT *
FROM `tbl_stone`
WHERE `product_id` = '52'
ERROR - 2023-02-20 12:39:42 --> Query error: User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`, `p`.`diamond_color`, `p`.`diamond_clarity`, `p`.`diamond_carat`, `p`.`diamond_pcs`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE `p`.`sub_cat_id` = '1'
AND `p`.`status` = 1
ORDER BY `p`.`product_id` DESC
ERROR - 2023-02-20 12:39:42 --> Query error: User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`, `p`.`diamond_color`, `p`.`diamond_clarity`, `p`.`diamond_carat`, `p`.`diamond_pcs`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE `p`.`sub_cat_id` = '1'
AND `p`.`status` = 1
ORDER BY `p`.`product_id` DESC
ERROR - 2023-02-20 12:39:42 --> Query error: User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`, `p`.`diamond_color`, `p`.`diamond_clarity`, `p`.`diamond_carat`, `p`.`diamond_pcs`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE `p`.`sub_cat_id` = '1'
AND `p`.`status` = 1
ORDER BY `p`.`product_id` DESC
ERROR - 2023-02-20 12:39:42 --> Query error: User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`, `p`.`diamond_color`, `p`.`diamond_clarity`, `p`.`diamond_carat`, `p`.`diamond_pcs`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE `p`.`sub_cat_id` = '1'
AND `p`.`status` = 1
ORDER BY `p`.`product_id` DESC
ERROR - 2023-02-20 12:39:42 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:42 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:42 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:42 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:42 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:42 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:42 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:42 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:42 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:42 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:42 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:42 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:43 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:44 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:44 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:45 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:45 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:46 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:46 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:47 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:39:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:39:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:40:11 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:40:11 --> Unable to connect to the database
ERROR - 2023-02-20 12:40:20 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:40:20 --> Unable to connect to the database
ERROR - 2023-02-20 12:40:27 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:40:27 --> Unable to connect to the database
ERROR - 2023-02-20 12:40:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:40:28 --> Unable to connect to the database
ERROR - 2023-02-20 12:40:29 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:40:29 --> Unable to connect to the database
ERROR - 2023-02-20 12:40:42 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:40:42 --> Unable to connect to the database
ERROR - 2023-02-20 12:40:51 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:40:51 --> Unable to connect to the database
ERROR - 2023-02-20 12:41:05 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:41:05 --> Unable to connect to the database
ERROR - 2023-02-20 12:41:07 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:41:07 --> Unable to connect to the database
ERROR - 2023-02-20 12:41:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:41:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:41:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:41:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:41:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:41:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:41:48 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:41:48 --> Unable to connect to the database
ERROR - 2023-02-20 12:42:27 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:42:27 --> Unable to connect to the database
ERROR - 2023-02-20 12:42:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:42:28 --> Unable to connect to the database
ERROR - 2023-02-20 12:42:28 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:42:28 --> Unable to connect to the database
ERROR - 2023-02-20 12:44:21 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:44:21 --> Unable to connect to the database
ERROR - 2023-02-20 12:44:22 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:44:22 --> Unable to connect to the database
ERROR - 2023-02-20 12:45:00 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:45:00 --> Unable to connect to the database
ERROR - 2023-02-20 12:45:02 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:45:02 --> Unable to connect to the database
ERROR - 2023-02-20 12:45:22 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:45:22 --> Unable to connect to the database
ERROR - 2023-02-20 12:45:23 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:45:23 --> Unable to connect to the database
ERROR - 2023-02-20 12:45:47 --> Severity: Warning --> mysqli::real_connect(): (42000/1226): User 'vysyaraju' has exceeded the 'max_questions' resource (current value: 150000) /hermes/bosnacweb04/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2023-02-20 12:45:47 --> Unable to connect to the database
