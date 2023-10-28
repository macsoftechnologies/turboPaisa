<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-05 00:04:00 --> Severity: Notice --> Undefined variable: set F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 289
ERROR - 2021-01-05 00:04:00 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '= ''
WHERE `survey_form_id` = '1'
AND `question_id` = '1'' at line 1 - Invalid query: UPDATE `tbl_survey_data` SET  = ''
WHERE `survey_form_id` = '1'
AND `question_id` = '1'
ERROR - 2021-01-05 00:59:42 --> Severity: Parsing Error --> syntax error, unexpected '$answerProData' (T_VARIABLE) F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 316
ERROR - 2021-01-05 01:13:34 --> Severity: Notice --> Undefined index: $option F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 314
ERROR - 2021-01-05 01:14:24 --> Severity: Notice --> Undefined offset: 0 F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 314
ERROR - 2021-01-05 01:16:56 --> Severity: Error --> Call to a member function result_array() on array F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 314
ERROR - 2021-01-05 02:23:33 --> Severity: Notice --> Undefined index: selectedOption F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:23:33 --> Query error: Column 'selectedOption' cannot be null - Invalid query: INSERT INTO `tbl_survey_data` (`survey_form_id`, `question_id`, `selectedOption`, `created_at`) VALUES (3, '1', NULL, '2021-01-05 02:23:33')
ERROR - 2021-01-05 02:23:59 --> Query error: Unknown column 'option_name' in 'field list' - Invalid query: INSERT INTO `tbl_survey_data` (`survey_form_id`, `question_id`, `option_name`, `created_at`) VALUES (4, '1', 'yes', '2021-01-05 02:23:59')
ERROR - 2021-01-05 02:24:50 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:24:50 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:25:17 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:25:17 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:25:36 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:25:36 --> Severity: Notice --> Trying to get property of non-object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:25:51 --> Severity: Notice --> Undefined index: $option F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:25:51 --> Severity: Notice --> Undefined index: $option F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:26:33 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:26:33 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 312
ERROR - 2021-01-05 02:44:54 --> Severity: Notice --> Undefined index: option_name F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:44:54 --> Severity: Notice --> Undefined variable: j F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:44:54 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:44:54 --> Severity: Notice --> Undefined variable: j F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:44:54 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:44:54 --> Query error: Column 'option_name' cannot be null - Invalid query: INSERT INTO `tbl_survey_answer` (`survey_form_id`, `question_id`, `option_name`, `sub_question_id`, `answer`, `created_at`) VALUES (11, '1', NULL, NULL, NULL, '2021-01-05 02:44:54')
ERROR - 2021-01-05 02:45:43 --> Severity: Notice --> Undefined variable: j F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:45:43 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:45:43 --> Severity: Notice --> Undefined variable: j F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:45:43 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:45:43 --> Query error: Column 'sub_question_id' cannot be null - Invalid query: INSERT INTO `tbl_survey_answer` (`survey_form_id`, `question_id`, `option_name`, `sub_question_id`, `answer`, `created_at`) VALUES (12, '1', 'yes', NULL, NULL, '2021-01-05 02:45:43')
ERROR - 2021-01-05 02:46:01 --> Severity: Notice --> Undefined index: sub_question_id F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:46:01 --> Severity: Notice --> Undefined index: answer F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:46:01 --> Query error: Column 'sub_question_id' cannot be null - Invalid query: INSERT INTO `tbl_survey_answer` (`survey_form_id`, `question_id`, `option_name`, `sub_question_id`, `answer`, `created_at`) VALUES (13, '1', 'yes', NULL, NULL, '2021-01-05 02:46:01')
ERROR - 2021-01-05 02:47:40 --> Severity: Notice --> Undefined index: sub_question_id F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:47:40 --> Severity: Notice --> Undefined index: answer F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:47:40 --> Query error: Column 'sub_question_id' cannot be null - Invalid query: INSERT INTO `tbl_survey_answer` (`survey_form_id`, `question_id`, `option_name`, `sub_question_id`, `answer`, `created_at`) VALUES (14, '1', 'yes', NULL, NULL, '2021-01-05 02:47:40')
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:48:47 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at F:\xampp\htdocs\ysrsurvey\system\core\Exceptions.php:271) F:\xampp\htdocs\ysrsurvey\system\core\Common.php 570
ERROR - 2021-01-05 02:52:19 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:19 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:19 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:19 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:19 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:19 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:19 --> Severity: Notice --> Undefined variable: i F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:19 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:19 --> Query error: Column 'question_id' cannot be null - Invalid query: INSERT INTO `tbl_survey_answer` (`survey_form_id`, `question_id`, `option_name`, `sub_question_id`, `answer`, `created_at`) VALUES (18, NULL, NULL, NULL, NULL, '2021-01-05 02:52:19')
ERROR - 2021-01-05 02:52:19 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at F:\xampp\htdocs\ysrsurvey\system\core\Exceptions.php:271) F:\xampp\htdocs\ysrsurvey\system\core\Common.php 570
ERROR - 2021-01-05 02:52:33 --> Severity: Notice --> Undefined index: question_id F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:33 --> Severity: Notice --> Undefined index: option_name F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:33 --> Severity: Notice --> Undefined index: sub_question_id F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:33 --> Severity: Notice --> Undefined index: answer F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 02:52:33 --> Query error: Column 'question_id' cannot be null - Invalid query: INSERT INTO `tbl_survey_answer` (`survey_form_id`, `question_id`, `option_name`, `sub_question_id`, `answer`, `created_at`) VALUES (19, NULL, NULL, NULL, NULL, '2021-01-05 02:52:33')
ERROR - 2021-01-05 02:55:59 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`ysr`.`tbl_survey_answer`, CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`sub_question_id`) REFERENCES `tbl_answer` (`answer_id`)) - Invalid query: INSERT INTO `tbl_survey_answer` (`survey_form_id`, `question_id`, `option_name`, `sub_question_id`, `answer`, `created_at`) VALUES (21, '2', 'yes', 3, 'userIput', '2021-01-05 02:55:59')
ERROR - 2021-01-05 02:57:03 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`ysr`.`tbl_survey_answer`, CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`sub_question_id`) REFERENCES `tbl_answer` (`answer_id`)) - Invalid query: INSERT INTO `tbl_survey_answer` (`survey_form_id`, `question_id`, `option_name`, `sub_question_id`, `answer`, `created_at`) VALUES (22, '2', 'yes', 3, 'userIput', '2021-01-05 02:57:03')
ERROR - 2021-01-05 14:32:50 --> Severity: Notice --> Undefined variable: barLastid F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 14:32:50 --> Severity: Notice --> Undefined variable: barLastid F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 14:32:50 --> Severity: Notice --> Undefined variable: barLastid F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 328
ERROR - 2021-01-05 14:33:36 --> Severity: Notice --> Undefined variable: barLastid F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 14:33:36 --> Severity: Notice --> Undefined variable: barLastid F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 308
ERROR - 2021-01-05 14:33:36 --> Severity: Notice --> Undefined variable: barLastid F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 328
ERROR - 2021-01-05 15:40:57 --> Severity: Error --> First array member is not a valid class name or object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:41:41 --> Severity: Parsing Error --> syntax error, unexpected '$options' (T_VARIABLE) F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:41:56 --> Severity: Error --> First array member is not a valid class name or object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:42:15 --> Severity: Error --> Function name must be a string F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:42:39 --> Severity: Parsing Error --> syntax error, unexpected '(', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:42:56 --> Severity: Error --> First array member is not a valid class name or object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:43:45 --> Severity: Parsing Error --> syntax error, unexpected '$options' (T_VARIABLE) F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:44:04 --> Severity: Parsing Error --> syntax error, unexpected '$options' (T_VARIABLE) F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:44:27 --> Severity: Error --> First array member is not a valid class name or object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:45:05 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:45:22 --> Severity: Notice --> Undefined property: Question::$post F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:45:22 --> Severity: Notice --> Undefined index: ('options') F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:45:53 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:46:09 --> Severity: Notice --> Undefined index:  F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:46:26 --> Severity: Error --> First array member is not a valid class name or object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:53:14 --> Severity: Error --> First array member is not a valid class name or object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:55:29 --> Severity: Error --> First array member is not a valid class name or object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:55:44 --> Severity: Error --> First array member is not a valid class name or object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 309
ERROR - 2021-01-05 15:55:57 --> Severity: Error --> First array member is not a valid class name or object F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 326
ERROR - 2021-01-05 15:56:09 --> Severity: Notice --> Undefined offset: 2 F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 326
ERROR - 2021-01-05 15:56:25 --> Severity: Notice --> Undefined index: options F:\xampp\htdocs\ysrsurvey\application\controllers\services\Question.php 326
ERROR - 2021-01-05 16:00:16 --> Query error: Unknown column 'created_at' in 'field list' - Invalid query: INSERT INTO `tbl_answers_data` (`survey_form_id`, `question_id`, `option_name`, `sub_question_id`, `answer`, `created_at`) VALUES (32, '1', 'yes', 1, 'userIput', '2021-01-05 16:00:16')
