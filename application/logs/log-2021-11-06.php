<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-06 16:08:07 --> Query error: Unknown column 'first_name' in 'field list' - Invalid query: SELECT `order_id`, `user_id`, `grand_total`, `order_txn`, `tracking_id`, `bank_ref`, `delivery_date`, `order_status`, `status`, `created_at`, `updated_at`, `first_name`, `last_name`, `email`, `address`, `city`, `state`, `phone_number`, `zipcode`
FROM `tbl_order`
WHERE `order_status` = 1
ORDER BY `order_id` DESC
ERROR - 2021-11-06 17:02:48 --> 404 Page Not Found: Offer/insert
