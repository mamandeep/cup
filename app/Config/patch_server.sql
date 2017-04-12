USE cupbt;

CREATE TABLE IF NOT EXISTS `choices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `std_id` bigint(20) DEFAULT NULL,
  `preference` varchar(200) DEFAULT NULL,
  `pref_order` int(10) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `rollno` varchar(50) DEFAULT NULL,
  `score` varchar(20) DEFAULT NULL,
  `centre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46;

CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reg_id` bigint(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_email` varchar(45) DEFAULT NULL,
  `father_mobile` varchar(20) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_email` varchar(45) DEFAULT NULL,
  `mother_mobile` varchar(20) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `aadhaar_no` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `pwd` varchar(10) DEFAULT NULL,
  `kashmiri_mig` varchar(10) DEFAULT NULL,
  `ward_of_def` varchar(10) DEFAULT NULL,
  `state_domicile` varchar(50) DEFAULT NULL,
  `comm_address` text,
  `year_of_cucet` int(10) DEFAULT NULL,
  `rollno` varchar(20) DEFAULT NULL,
  `subject1` varchar(100) DEFAULT NULL,
  `rollno1` varchar(50) DEFAULT NULL,
  `score1` varchar(40) DEFAULT NULL,
  `pg_result` varchar(20) DEFAULT NULL,
  `pg_marks` varchar(10) DEFAULT NULL,
  `gate_year_of_passing` varchar(20) DEFAULT NULL,
  `gate_rollno` varchar(20) DEFAULT NULL,
  `gate_score` varchar(10) DEFAULT NULL,
  `gpat_year_of_passing` varchar(20) DEFAULT NULL,
  `gpat_rollno` varchar(20) DEFAULT NULL,
  `gpat_score` varchar(10) DEFAULT NULL,
  `any_other_info` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `response_code` varchar(10) DEFAULT NULL,
  `payment_date_created` varchar(45) DEFAULT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `payment_amount` varchar(20) DEFAULT NULL,
  `payment_transaction_id` varchar(50) DEFAULT NULL,
  `options_locked` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;


alter table document add column std_id bigint(20) NULL DEFAULT NULL AFTER `applicant_id`;

alter table registered_users 
ADD COLUMN password varchar(100) NULL DEFAULT NULL AFTER `email`,
ADD COLUMN std_id bigint(20) NULL DEFAULT NULL AFTER `physically_disabled`,
ADD COLUMN otp varchar(50) NULL DEFAULT NULL AFTER `std_id`,
ADD COLUMN otp_timestamp datetime NULL DEFAULT NULL AFTER `otp`,
ADD COLUMN otp_gap int(10) NULL DEFAULT NULL AFTER `otp_timestamp`,
ADD COLUMN otp_response varchar(500) NULL DEFAULT NULL AFTER `otp_gap`;

