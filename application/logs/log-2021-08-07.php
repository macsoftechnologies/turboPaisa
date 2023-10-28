<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-07 16:41:46 --> Query error: Column 'employee_name' cannot be null - Invalid query: INSERT INTO `employees` (`company_id`, `company_name`, `branch_id`, `branch_name`, `employee_name`, `employee_phone_number`, `role_id`, `role_name`, `device_name`, `device_id`, `status`, `created_at`) VALUES (1, 'Macsof', 1, 'Macsof technoloies', NULL, '9090909090', 1, 'Cloud Services.', 'Windows 10', '878897', 1, '2021-08-07 16:41:46')
ERROR - 2021-08-07 16:43:35 --> Severity: Notice --> Undefined variable: companies F:\xampp\htdocs\serviceApp\application\controllers\services\Employees.php 128
ERROR - 2021-08-07 16:43:35 --> Severity: Notice --> Undefined variable: branches F:\xampp\htdocs\serviceApp\application\controllers\services\Employees.php 130
ERROR - 2021-08-07 16:43:35 --> Severity: Notice --> Undefined variable: roles F:\xampp\htdocs\serviceApp\application\controllers\services\Employees.php 134
ERROR - 2021-08-07 18:01:00 --> 404 Page Not Found: services/Complaintregistration/getCompaintregistration
ERROR - 2021-08-07 18:07:09 --> Query error: Unknown column 'c.complaint_registration_id' in 'field list' - Invalid query: SELECT `c`.`complaint_registration_id`, `c`.`service_id`, `c`.`employee_id`, `c`.`message`, `c`.`date_time`, `c`.`status`, `c`.`created_at`, `e`.`employee_name`, `e`.`employee_phone_number`, `s`.`service_name`
FROM `complaint_registration`
LEFT JOIN `employees` `e` ON `c`.`employee_id` = `e`.`employee_id`
LEFT JOIN `services` `s` ON `c`.`service_id` = `s`.`service_id`
WHERE `complaint_registration_id` = 1
AND `status` = 1
ERROR - 2021-08-07 18:29:35 --> Severity: Compile Error --> Cannot redeclare Complaintregistration::update_post() F:\xampp\htdocs\serviceApp\application\controllers\services\Complaintregistration.php 242
ERROR - 2021-08-07 18:30:14 --> Severity: Compile Error --> Cannot redeclare Complaintregistration::complaintregistrationDelete_post() F:\xampp\htdocs\serviceApp\application\controllers\services\Complaintregistration.php 274
ERROR - 2021-08-07 18:53:22 --> 404 Page Not Found: Indexhtml/index
ERROR - 2021-08-07 18:54:35 --> 404 Page Not Found: services/Admin/login
ERROR - 2021-08-07 18:54:35 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\serviceApp\application\controllers\Adminlogin.php 40
ERROR - 2021-08-07 19:03:08 --> 404 Page Not Found: services/Admin/login
ERROR - 2021-08-07 19:03:08 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\serviceApp\application\controllers\Adminlogin.php 40
ERROR - 2021-08-07 20:48:38 --> Severity: Error --> Cannot use object of type stdClass as array F:\xampp\htdocs\serviceApp\application\controllers\Adminlogin.php 51
ERROR - 2021-08-07 21:01:53 --> Severity: error --> Exception: Unable to locate the model you have specified: AdminModel F:\xampp\htdocs\serviceApp\system\core\Loader.php 348
ERROR - 2021-08-07 21:02:25 --> Severity: Error --> Call to undefined method UserModel::adminDetails() F:\xampp\htdocs\serviceApp\application\controllers\Dashboard.php 15
ERROR - 2021-08-07 21:03:21 --> Severity: Notice --> Undefined variable: users F:\xampp\htdocs\serviceApp\application\views\dashboard.php 26
ERROR - 2021-08-07 21:03:21 --> Severity: Error --> Call to a member function num_rows() on null F:\xampp\htdocs\serviceApp\application\views\dashboard.php 26
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/img
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/img
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/img
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 21:06:46 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 21:09:28 --> 404 Page Not Found: Assets/img
ERROR - 2021-08-07 21:09:28 --> 404 Page Not Found: Assets/img
ERROR - 2021-08-07 21:11:18 --> 404 Page Not Found: Indexhtml/index
ERROR - 2021-08-07 21:30:17 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-07 21:30:18 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 21:30:18 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 21:31:16 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-07 21:31:16 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 21:31:16 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 21:32:14 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-07 21:32:14 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 21:32:14 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 21:32:27 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 21:32:27 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 21:32:27 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-07 21:35:00 --> 404 Page Not Found: Datatableshtml/index
ERROR - 2021-08-07 21:41:48 --> Severity: error --> Exception: Unable to locate the model you have specified: AdminModel F:\xampp\htdocs\serviceApp\system\core\Loader.php 348
ERROR - 2021-08-07 21:42:41 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:42:57 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:43:03 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:43:36 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:44:18 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:44:29 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:48:09 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:48:15 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:48:52 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:50:43 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:51:35 --> 404 Page Not Found: Services/master
ERROR - 2021-08-07 21:52:34 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:52:54 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:52:55 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:52:56 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:52:57 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:54:31 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:54:50 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:55:12 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:55:12 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\serviceApp\application\controllers\Adminlogin.php 48
ERROR - 2021-08-07 21:55:12 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\serviceApp\application\controllers\Adminlogin.php 59
ERROR - 2021-08-07 21:55:57 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:56:15 --> 404 Page Not Found: Serviceapp/services
ERROR - 2021-08-07 21:56:24 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:56:51 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:56:52 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:56:54 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:56:55 --> 404 Page Not Found: Services/admin
ERROR - 2021-08-07 21:58:00 --> 404 Page Not Found: services//index
ERROR - 2021-08-07 21:58:41 --> 404 Page Not Found: services//index
ERROR - 2021-08-07 22:10:34 --> Severity: Error --> Cannot use object of type stdClass as array F:\xampp\htdocs\serviceApp\application\views\ser\index.php 45
ERROR - 2021-08-07 22:12:46 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-07 22:12:46 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 22:12:46 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 22:13:14 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 22:13:14 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 22:13:14 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-07 22:17:12 --> 404 Page Not Found: services/Question/Questionli
ERROR - 2021-08-07 22:17:12 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\serviceApp\application\controllers\Serv.php 32
ERROR - 2021-08-07 22:17:29 --> Severity: Notice --> Undefined variable: question F:\xampp\htdocs\serviceApp\application\views\ser\create.php 34
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/img
ERROR - 2021-08-07 22:21:50 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/img
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/img
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/css
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/bundles
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-07 22:21:51 --> 404 Page Not Found: Assets/js
ERROR - 2021-08-07 22:24:01 --> Severity: Notice --> Undefined variable: question F:\xampp\htdocs\serviceApp\application\views\ser\create.php 34
ERROR - 2021-08-07 22:32:53 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-07 22:32:53 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 22:32:53 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 22:34:14 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 22:34:14 --> 404 Page Not Found: Assets1/css
ERROR - 2021-08-07 22:34:14 --> 404 Page Not Found: Assets1/bundles
ERROR - 2021-08-07 22:37:45 --> 404 Page Not Found: services/Question/getquestionsdetails
ERROR - 2021-08-07 22:37:45 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\serviceApp\application\controllers\Serv.php 69
ERROR - 2021-08-07 22:46:34 --> 404 Page Not Found: Serv/edit
