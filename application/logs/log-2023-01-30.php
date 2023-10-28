<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-30 02:59:15 --> 404 Page Not Found: Controller/extension
ERROR - 2023-01-30 11:49:52 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation 'like' - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE  p.name  LIKE '%పులిహోర%' ESCAPE '!' 
AND  p.status  LIKE '%1%' ESCAPE '!' 
ORDER BY `p`.`product_id` DESC
ERROR - 2023-01-30 11:49:54 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation 'like' - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE  p.name  LIKE '%పులిహోర%' ESCAPE '!' 
AND  p.status  LIKE '%1%' ESCAPE '!' 
ORDER BY `p`.`product_id` DESC
ERROR - 2023-01-30 11:50:58 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation 'like' - Invalid query: SELECT `p`.`product_id`, `p`.`weight`, `p`.`name`, `p`.`type`, `p`.`category_id`, `c`.`category_name`, `p`.`style_code`, `p`.`description`, `p`.`price`, `p`.`discount`, `p`.`front_image`, `p`.`measurement`, `p`.`stone`, `p`.`weight`, `p`.`net_weight`, `p`.`clousure`, `p`.`weight`, `p`.`stone_color`, `p`.`gst`, `p`.`status`, `p`.`sub_cat_id`, `s`.`sub_cat_name`, `p`.`price_type`, `p`.`length`, `p`.`width`, `p`.`size`, `p`.`stock`
FROM `tbl_product` `p`
INNER JOIN `categories` `c` ON `p`.`category_id` = `c`.`category_id`
INNER JOIN `sucategories` `s` ON `p`.`sub_cat_id` = `s`.`sub_cat_id`
WHERE  p.name  LIKE '%పులిహోర%' ESCAPE '!' 
AND  p.status  LIKE '%1%' ESCAPE '!' 
ORDER BY `p`.`product_id` DESC
ERROR - 2023-01-30 13:19:56 --> 404 Page Not Found: Controller/extension
ERROR - 2023-01-30 15:12:34 --> 404 Page Not Found: Controller/extension
ERROR - 2023-01-30 18:46:18 --> 404 Page Not Found: Controller/extension
