<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-06 21:21:11 --> Query error: Unknown column 'houseownername' in 'field list' - Invalid query: SELECT `survey_id`, `user_id`, `houseownername`, `fatherorhusbandname`, `rationcardnumber`, `mobilenumber`, `address`, `status`, `created_at`
FROM `tbl_survey_form` `s`
WHERE `status` = 1
ERROR - 2021-01-06 21:21:57 --> Severity: Compile Error --> Cannot redeclare UserModel::SurveyDetails() F:\xampp\htdocs\ysrsurvey\application\models\UserModel.php 233
ERROR - 2021-01-06 21:22:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`status`
FROM `tbl_survey_form` `s`
WHERE `status` = 1' at line 1 - Invalid query: SELECT `s`.`survey_form_id`, `s`.`user_id`, `s`.`survey_id` `s`.`status`
FROM `tbl_survey_form` `s`
WHERE `status` = 1
ERROR - 2021-01-06 21:22:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`status`
FROM `tbl_survey_form` `s`
WHERE `s`.`status` = 1' at line 1 - Invalid query: SELECT `s`.`survey_form_id`, `s`.`user_id`, `s`.`survey_id` `s`.`status`
FROM `tbl_survey_form` `s`
WHERE `s`.`status` = 1
ERROR - 2021-01-06 21:22:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`status`
FROM `tbl_survey_form` `s`' at line 1 - Invalid query: SELECT `s`.`survey_form_id`, `s`.`user_id`, `s`.`survey_id` `s`.`status`
FROM `tbl_survey_form` `s`
