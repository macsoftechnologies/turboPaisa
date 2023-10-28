<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-04 16:04:22 --> 404 Page Not Found: services/Master/getServices
ERROR - 2021-08-04 16:04:51 --> 404 Page Not Found: services/Master/getServices
ERROR - 2021-08-04 16:07:26 --> 404 Page Not Found: services/Master/getServices
ERROR - 2021-08-04 16:08:03 --> 404 Page Not Found: services/Master/getServices
ERROR - 2021-08-04 16:45:01 --> Query error: Unknown column 'status' in 'field list' - Invalid query: INSERT INTO `services` (`service_name`, `status`, `created_at`) VALUES ('hardware', 1, '2021-08-04 16:45:01')
ERROR - 2021-08-04 18:29:43 --> Severity: Compile Error --> Cannot redeclare Master::delete_post() F:\xampp\htdocs\serviceApp\application\controllers\services\Master.php 266
ERROR - 2021-08-04 18:31:43 --> Severity: Compile Error --> Cannot redeclare Master::delete_post() F:\xampp\htdocs\serviceApp\application\controllers\services\Master.php 265
ERROR - 2021-08-04 18:32:03 --> Severity: Compile Error --> Cannot redeclare Master::delete_post() F:\xampp\htdocs\serviceApp\application\controllers\services\Master.php 265
ERROR - 2021-08-04 18:32:26 --> Query error: Unknown column 'eployee_id' in 'field list' - Invalid query: SELECT `eployee_id`, `employee_name`, `employee_email`, `employee_address`, `employee_phone`, `employee_code`, `status`
FROM `employeesdata`
WHERE `status` = 1
ERROR - 2021-08-04 18:37:47 --> Query error: Table 'serviceapp.employees' doesn't exist - Invalid query: UPDATE `employees` SET `employee_name` = 'macsoftechnology', `employee_phone` = '9346222599', `employee_email` = 'macsof@gmail.com', `employee_address` = 'visakhapatnam', `employee_code` = 'MS1234', `status` = 1, `created_at` = '2021-08-04 18:37:47'
WHERE `employee_id` = 1
ERROR - 2021-08-04 18:38:54 --> Query error: Table 'serviceapp.employees' doesn't exist - Invalid query: SELECT `employee_id`, `employee_name`, `employee_email`, `employee_address`, `employee_phone`, `employee_code`, `status`
FROM `employees`
WHERE `employee_id` = 1
AND `status` = 1
ERROR - 2021-08-04 18:39:50 --> Query error: Table 'serviceapp.employees' doesn't exist - Invalid query: UPDATE `employees` SET `status` = 0
WHERE `employee_id` = 1
ERROR - 2021-08-04 22:35:14 --> Query error: Unknown column 'employee_id' in 'where clause' - Invalid query: UPDATE `customers` SET `customer_name` = 'MacsofTechnologies', `phone_number` = '9346222599', `email` = 'macsof@gmail.com', `address` = 'visakhapatnam', `employee_code` = NULL, `status` = 1
WHERE `employee_id` IS NULL
ERROR - 2021-08-04 22:35:32 --> Query error: Unknown column 'employee_code' in 'field list' - Invalid query: UPDATE `customers` SET `customer_name` = 'MacsofTechnologies', `phone_number` = '9346222599', `email` = 'macsof@gmail.com', `address` = 'visakhapatnam', `employee_code` = NULL, `status` = 1
WHERE `customer_id` = 1
ERROR - 2021-08-04 22:35:46 --> Query error: Unknown column 'employee_code' in 'field list' - Invalid query: UPDATE `customers` SET `customer_name` = 'MacsofTechnologies', `phone_number` = '9346222599', `email` = 'macsof@gmail.com', `address` = 'visakhapatnam', `employee_code` = NULL, `status` = 1
WHERE `customer_id` = 1
ERROR - 2021-08-04 22:35:54 --> Query error: Unknown column 'employee_code' in 'field list' - Invalid query: UPDATE `customers` SET `customer_name` = 'MacsofTechnologies', `phone_number` = '9346222599', `email` = 'macsof@gmail.com', `address` = 'visakhapatnam', `employee_code` = NULL, `status` = 1
WHERE `customer_id` = 1
ERROR - 2021-08-04 22:44:05 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT `status_id`, `status_name`
FROM `status`
WHERE `status` = 1
