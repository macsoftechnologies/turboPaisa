<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-31 00:17:08 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-31 00:17:08 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 00:17:08 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 00:18:53 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 00:18:53 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 00:18:54 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-31 00:19:15 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-31 00:19:15 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 00:19:15 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 01:16:03 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 01:16:03 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 01:16:03 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-31 01:16:21 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 01:16:21 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 01:16:32 --> 404 Page Not Found: Assets1/img
ERROR - 2021-08-31 01:17:49 --> 404 Page Not Found: Assets1/img
ERROR - 2021-08-31 01:18:02 --> 404 Page Not Found: Assets1/img
ERROR - 2021-08-31 01:18:09 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-31 01:18:10 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 01:18:10 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-31 20:53:15 --> 404 Page Not Found: Assets1/img
ERROR - 2021-08-31 20:54:37 --> 404 Page Not Found: Assets1/img
ERROR - 2021-08-31 20:54:41 --> 404 Page Not Found: Assets/img
ERROR - 2021-08-31 20:54:45 --> 404 Page Not Found: Assets/diamond.png
ERROR - 2021-08-31 20:55:31 --> Query error: Table 'vysyarajujewellers.services' doesn't exist - Invalid query: SELECT `service_id`, `service_name`, `status`
FROM `services`
WHERE `status` = 1
ERROR - 2021-08-31 20:55:31 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Walkin.php 18
ERROR - 2021-08-31 20:55:31 --> Query error: Table 'vysyarajujewellers.walkin_complaint_registration' doesn't exist - Invalid query: SELECT `c`.`walkin_id`, `c`.`service_id`, `c`.`message`, `c`.`date_time`, `c`.`customer_name`, `c`.`customer_email`, `c`.`customer_phone`, `c`.`customer_address`, `c`.`status`, `c`.`created_at`, `s`.`service_name`
FROM `walkin_complaint_registration` `c`
LEFT JOIN `services` `s` ON `c`.`service_id` = `s`.`service_id`
WHERE `c`.`status` = 1
ERROR - 2021-08-31 20:55:31 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Walkin.php 23
ERROR - 2021-08-31 20:55:36 --> Query error: Table 'vysyarajujewellers.services' doesn't exist - Invalid query: SELECT `service_id`, `service_name`, `status`
FROM `services`
WHERE `status` = 1
ERROR - 2021-08-31 20:55:36 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Complaint.php 18
ERROR - 2021-08-31 20:55:36 --> Query error: Table 'vysyarajujewellers.complaint_registration' doesn't exist - Invalid query: SELECT `c`.`complaint_registration_id`, `c`.`service_id`, `c`.`employee_id`, `c`.`message`, `c`.`date_time`, `c`.`status`, `c`.`created_at`, `e`.`employee_name`, `e`.`employee_phone_number`, `s`.`service_name`
FROM `complaint_registration` `c`
LEFT JOIN `employees` `e` ON `c`.`employee_id` = `e`.`employee_id`
LEFT JOIN `services` `s` ON `c`.`service_id` = `s`.`service_id`
WHERE `c`.`status` = 1
ERROR - 2021-08-31 20:55:36 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Complaint.php 23
ERROR - 2021-08-31 20:55:36 --> Query error: Table 'vysyarajujewellers.employees' doesn't exist - Invalid query: SELECT `employee_id`, `branch_id`, `branch_name`, `company_id`, `company_name`, `role_id`, `role_name`, `employee_name`, `employee_phone_number`, `device_id`, `device_name`, `status`, `created_at`
FROM `employees`
WHERE `status` = 1
ERROR - 2021-08-31 20:55:36 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Complaint.php 28
ERROR - 2021-08-31 20:55:47 --> Query error: Table 'vysyarajujewellers.services' doesn't exist - Invalid query: SELECT `service_id`, `service_name`, `status`
FROM `services`
WHERE `status` = 1
ERROR - 2021-08-31 20:55:47 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Complaint.php 18
ERROR - 2021-08-31 20:55:47 --> Query error: Table 'vysyarajujewellers.complaint_registration' doesn't exist - Invalid query: SELECT `c`.`complaint_registration_id`, `c`.`service_id`, `c`.`employee_id`, `c`.`message`, `c`.`date_time`, `c`.`status`, `c`.`created_at`, `e`.`employee_name`, `e`.`employee_phone_number`, `s`.`service_name`
FROM `complaint_registration` `c`
LEFT JOIN `employees` `e` ON `c`.`employee_id` = `e`.`employee_id`
LEFT JOIN `services` `s` ON `c`.`service_id` = `s`.`service_id`
WHERE `c`.`status` = 1
ERROR - 2021-08-31 20:55:47 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Complaint.php 23
ERROR - 2021-08-31 20:55:47 --> Query error: Table 'vysyarajujewellers.employees' doesn't exist - Invalid query: SELECT `employee_id`, `branch_id`, `branch_name`, `company_id`, `company_name`, `role_id`, `role_name`, `employee_name`, `employee_phone_number`, `device_id`, `device_name`, `status`, `created_at`
FROM `employees`
WHERE `status` = 1
ERROR - 2021-08-31 20:55:47 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Complaint.php 28
ERROR - 2021-08-31 20:55:50 --> Query error: Table 'vysyarajujewellers.branches' doesn't exist - Invalid query: SELECT `branch_id`, `company_id`, `company_name`, `branch_name`, `branch_address`, `branch_code`, `status`, `created_at`
FROM `branches`
WHERE `status` = 1
ERROR - 2021-08-31 20:55:50 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Branches.php 18
ERROR - 2021-08-31 20:55:50 --> Query error: Table 'vysyarajujewellers.companies' doesn't exist - Invalid query: SELECT `company_id`, `company_name`, `status`, `created_at`
FROM `companies`
WHERE `status` = 1
ERROR - 2021-08-31 20:55:50 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Branches.php 23
ERROR - 2021-08-31 21:40:22 --> Query error: Table 'vysyarajujewellers.branches' doesn't exist - Invalid query: SELECT `branch_id`, `company_id`, `company_name`, `branch_name`, `branch_address`, `branch_code`, `status`, `created_at`
FROM `branches`
WHERE `status` = 1
ERROR - 2021-08-31 21:40:22 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Branches.php 18
ERROR - 2021-08-31 21:40:22 --> Query error: Table 'vysyarajujewellers.companies' doesn't exist - Invalid query: SELECT `company_id`, `company_name`, `status`, `created_at`
FROM `companies`
WHERE `status` = 1
ERROR - 2021-08-31 21:40:22 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\vysyarajujewellers\application\controllers\Branches.php 23
ERROR - 2021-08-31 23:48:36 --> Query error: Unknown column 'address' in 'field list' - Invalid query: INSERT INTO `users` (`firstname`, `lastname`, `email`, `address`, `mobilenumber`, `password`, `status`, `created_at`) VALUES ('Macsof', 'Technologies', 'macsof@gmail.com', 'visakhapatnam', '9346222599', 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-08-31 23:48:36')
