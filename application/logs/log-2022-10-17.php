<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-17 03:26:36 --> 404 Page Not Found: Controller/extension
ERROR - 2022-10-17 05:03:51 --> Severity: Warning --> mysqli::query(): (HY000/1030): Got error 28 from storage engine /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-17 05:03:51 --> Query error: Got error 28 from storage engine - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE `p`.`sub_cat_id` = '10'
AND `p`.`status` = 1
ORDER BY `p`.`product_id` DESC
ERROR - 2022-10-17 06:02:15 --> Severity: Warning --> mysqli::query(): (HY000/1030): Got error 28 from storage engine /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-17 06:02:15 --> Query error: Got error 28 from storage engine - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE `p`.`sub_cat_id` = '1'
AND `p`.`status` = 1
ORDER BY `p`.`product_id` DESC
ERROR - 2022-10-17 06:37:53 --> Severity: Warning --> mysqli::query(): (HY000/1030): Got error 28 from storage engine /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-17 06:37:53 --> Query error: Got error 28 from storage engine - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE `p`.`sub_cat_id` = '18'
AND `p`.`status` = 1
ORDER BY `p`.`product_id` DESC
ERROR - 2022-10-17 09:00:23 --> Severity: Warning --> mysqli::real_connect(): php_network_getaddresses: getaddrinfo failed: Name or service not known /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-17 09:00:23 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): php_network_getaddresses: getaddrinfo failed: Name or service not known /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 201
ERROR - 2022-10-17 09:00:23 --> Unable to connect to the database
ERROR - 2022-10-17 09:42:36 --> Severity: Warning --> mysqli::query(): (HY000/1030): Got error 28 from storage engine /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-17 09:42:36 --> Query error: Got error 28 from storage engine - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE `p`.`sub_cat_id` = '12'
AND `p`.`status` = 1
ORDER BY `p`.`product_id` DESC
ERROR - 2022-10-17 09:42:36 --> Severity: Warning --> mysqli::query(): (HY000/1030): Got error 28 from storage engine /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-17 09:42:36 --> Query error: Got error 28 from storage engine - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE `p`.`sub_cat_id` = '12'
AND `p`.`status` = 1
ORDER BY `p`.`product_id` DESC
ERROR - 2022-10-17 12:38:26 --> Severity: Warning --> mysqli::query(): (HY000/1030): Got error 28 from storage engine /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-17 12:38:26 --> Query error: Got error 28 from storage engine - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE  p.name  LIKE '%earrings%' ESCAPE '!' 
AND  p.status  LIKE '%1%' ESCAPE '!' 
ORDER BY `p`.`product_id` DESC
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:45:08 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:24 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 235
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
ERROR - 2022-10-17 13:46:41 --> Severity: Notice --> Undefined variable: making /hermes/bosnacweb04/bosnacweb04cl/b418/ipg.macsoforg/vysyarajujewellers/admin/application/controllers/services/Products.php 788
