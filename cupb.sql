-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2015 at 06:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cupb`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_dist`
--

DROP TABLE IF EXISTS `academic_dist`;
CREATE TABLE IF NOT EXISTS `academic_dist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `academic_course` varchar(300) NOT NULL,
  `academic_dist` varchar(100) NOT NULL,
  `sr_of_proof` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
CREATE TABLE IF NOT EXISTS `applicants` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `appId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `advertisement_no` varchar(100) NOT NULL,
  `post_applied_for` varchar(500) NOT NULL,
  `name_of_centre` varchar(200) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `first_name` varchar(99) DEFAULT NULL,
  `middle_name` varchar(99) DEFAULT NULL,
  `last_name` varchar(99) DEFAULT NULL,
  `email` varchar(99) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `father_name` varchar(99) DEFAULT NULL,
  `father_email` varchar(99) DEFAULT NULL,
  `father_mobile` varchar(20) DEFAULT NULL,
  `mother_name` varchar(99) DEFAULT NULL,
  `mother_email` varchar(99) DEFAULT NULL,
  `mother_mobile` varchar(20) DEFAULT NULL,
  `date_of_birth` varchar(40) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `aadhar_no` varchar(50) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `appfee_dd_no` varchar(50) NOT NULL,
  `appfee_dd_date` varchar(50) NOT NULL,
  `appfee_dd_amt` varchar(50) NOT NULL,
  `appfee_dd_bank` varchar(200) NOT NULL,
  `appfee_dd_branch` varchar(100) NOT NULL,
  `mailing_address` text NOT NULL,
  `perm_address` text NOT NULL,
  `landline_no` varchar(50) NOT NULL,
  `fax_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `appId` (`appId`),
  KEY `Id` (`id`),
  KEY `mobile_no` (`mobile_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `applicant_id` bigint(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `course` varchar(99) DEFAULT NULL,
  `board` varchar(99) DEFAULT NULL,
  `year_of_passing` varchar(20) DEFAULT NULL,
  `percentage` varchar(20) DEFAULT NULL,
  `marks_obtained` varchar(20) DEFAULT NULL,
  `max_marks` varchar(20) DEFAULT NULL,
  `roll_no` varchar(40) DEFAULT NULL,
  `subjects` text,
  PRIMARY KEY (`id`),
  KEY `applicant_id` (`applicant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` bigint(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `sr_no` varchar(20) NOT NULL,
  `designation` varchar(99) DEFAULT NULL,
  `scale_of_pay` varchar(50) DEFAULT NULL,
  `name_add` text,
  `from_date` varchar(50) DEFAULT NULL,
  `to_date` varchar(50) DEFAULT NULL,
  `no_of_yrs_mnths` varchar(50) DEFAULT NULL,
  `nature_of_work` varchar(199) DEFAULT NULL,
  `sr_of_proof` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `filename2` varchar(200) DEFAULT NULL,
  `type2` varchar(100) DEFAULT NULL,
  `size2` int(11) DEFAULT NULL,
  `filename3` varchar(200) DEFAULT NULL,
  `type3` varchar(100) DEFAULT NULL,
  `size3` int(11) DEFAULT NULL,
  `filename4` varchar(200) DEFAULT NULL,
  `type4` varchar(100) DEFAULT NULL,
  `size4` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `misc`
--

DROP TABLE IF EXISTS `misc`;
CREATE TABLE IF NOT EXISTS `misc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tot_exp_years` varchar(50) NOT NULL,
  `tot_exp_mnths` varchar(50) NOT NULL,
  `tot_exp_days` varchar(50) NOT NULL,
  `tot_imp_fac_sci` varchar(50) NOT NULL,
  `tot_imp_fac_google` varchar(50) NOT NULL,
  `h_index_scopus` varchar(50) NOT NULL,
  `h_index_google` varchar(20) NOT NULL,
  `i10_index_google` varchar(50) NOT NULL,
  `seminar_attended` varchar(400) NOT NULL,
  `sematt_national` varchar(20) NOT NULL,
  `sematt_international` varchar(20) NOT NULL,
  `sematt_total` varchar(21) NOT NULL,
  `sematt_sr_proof` varchar(20) NOT NULL,
  `seminar_organized` varchar(400) NOT NULL,
  `semorg_national` varchar(20) NOT NULL,
  `semorg_international` varchar(20) NOT NULL,
  `semorg_total` varchar(21) NOT NULL,
  `semorg_sr_proof` varchar(20) NOT NULL,
  `proj_comp_or_ongng1` varchar(500) NOT NULL,
  `funding_agency1` varchar(300) NOT NULL,
  `pi_or_copi1` varchar(200) NOT NULL,
  `amt_of_grant1` varchar(20) NOT NULL,
  `proj_comp_or_ongng2` varchar(500) NOT NULL,
  `funding_agency2` varchar(300) NOT NULL,
  `pi_or_copi2` varchar(200) NOT NULL,
  `amt_of_grant2` varchar(20) NOT NULL,
  `proj_comp_or_ongng3` varchar(500) NOT NULL,
  `funding_agency3` varchar(300) NOT NULL,
  `pi_or_copi3` varchar(200) NOT NULL,
  `amt_of_grant3` varchar(20) NOT NULL,
  `proj_comp_or_ongng4` varchar(500) NOT NULL,
  `funding_agency4` varchar(300) NOT NULL,
  `pi_or_copi4` varchar(200) NOT NULL,
  `amt_of_grant4` varchar(20) NOT NULL,
  `rg_comp_mphil` varchar(20) NOT NULL,
  `rg_comp_phd` varchar(20) NOT NULL,
  `rg_comp_sr_proof` varchar(20) NOT NULL,
  `rg_undsup_mphil` varchar(20) NOT NULL,
  `rg_undsup_phd` varchar(20) NOT NULL,
  `rg_undsup_sr_proof` varchar(20) NOT NULL,
  `preco_award1` varchar(200) NOT NULL,
  `preco_agency1` varchar(200) NOT NULL,
  `preco_year1` varchar(20) NOT NULL,
  `preco_sr_proof1` varchar(20) NOT NULL,
  `preco_award2` varchar(200) NOT NULL,
  `preco_agency2` varchar(200) NOT NULL,
  `preco_year2` varchar(20) NOT NULL,
  `preco_sr_proof2` varchar(20) NOT NULL,
  `ref_add1` varchar(200) NOT NULL,
  `ref_email1` varchar(100) NOT NULL,
  `ref_landline1` varchar(50) NOT NULL,
  `ref_mobile1` varchar(50) NOT NULL,
  `ref_fax1` varchar(50) NOT NULL,
  `ref_add2` varchar(200) NOT NULL,
  `ref_email2` varchar(100) NOT NULL,
  `ref_landline2` varchar(50) NOT NULL,
  `ref_mobile2` varchar(50) NOT NULL,
  `ref_fax2` varchar(50) NOT NULL,
  `ref_add3` varchar(200) NOT NULL,
  `ref_email3` varchar(100) NOT NULL,
  `ref_landline3` varchar(50) NOT NULL,
  `ref_mobile3` varchar(50) NOT NULL,
  `ref_fax3` varchar(50) NOT NULL,
  `presentp_desig` varchar(50) NOT NULL,
  `presentp_nameuniv` varchar(200) NOT NULL,
  `presentp_basic_pay` varchar(50) NOT NULL,
  `presentp_pay_scale` varchar(50) NOT NULL,
  `presentp_gross_salary` varchar(50) NOT NULL,
  `presentp_increment_date` varchar(50) NOT NULL,
  `presentp_sr_proof` varchar(50) NOT NULL,
  `time_req_for_joining` varchar(50) NOT NULL,
  `any_other_info` text NOT NULL,
  `willing_for_temp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `miscexp`
--

DROP TABLE IF EXISTS `miscexp`;
CREATE TABLE IF NOT EXISTS `miscexp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ug_no_yrs` varchar(50) NOT NULL,
  `ug_no_mnths` varchar(50) NOT NULL,
  `ug_sr_proof` varchar(50) NOT NULL,
  `pg_no_yrs` varchar(50) NOT NULL,
  `pg_no_mnths` varchar(50) NOT NULL,
  `pg_sr_proof` varchar(50) NOT NULL,
  `pd_no_yrs` varchar(50) NOT NULL,
  `pd_no_mnths` varchar(50) NOT NULL,
  `pd_sr_proof` varchar(50) NOT NULL,
  `ot_no_yrs` varchar(50) NOT NULL,
  `ot_no_mnths` varchar(50) NOT NULL,
  `ot_sr_proof` varchar(50) NOT NULL,
  `tot_no_yrs` varchar(50) NOT NULL,
  `tot_no_mnths` varchar(50) NOT NULL,
  `tot_sr_proof` varchar(50) NOT NULL,
  `pdd_agency1` varchar(200) NOT NULL,
  `pdd_institute1` varchar(200) NOT NULL,
  `pdd_from_date1` varchar(50) NOT NULL,
  `pdd_to_date1` varchar(50) NOT NULL,
  `pdd_duration1` varchar(99) NOT NULL,
  `pdd_sr_proof1` varchar(50) NOT NULL,
  `pdd_agency2` varchar(200) NOT NULL,
  `pdd_institute2` varchar(200) NOT NULL,
  `pdd_from_date2` varchar(50) NOT NULL,
  `pdd_to_date2` varchar(50) NOT NULL,
  `pdd_duration2` varchar(50) NOT NULL,
  `pdd_sr_proof2` varchar(50) NOT NULL,
  `pdd_agency3` varchar(200) NOT NULL,
  `pdd_institute3` varchar(200) NOT NULL,
  `pdd_from_date3` varchar(50) NOT NULL,
  `pdd_to_date3` varchar(50) NOT NULL,
  `pdd_duration3` varchar(50) NOT NULL,
  `pdd_sr_proof3` varchar(50) NOT NULL,
  `pdd_agency4` varchar(200) NOT NULL,
  `pdd_institute4` varchar(200) NOT NULL,
  `pdd_from_date4` varchar(50) NOT NULL,
  `pdd_to_date4` varchar(50) NOT NULL,
  `pdd_duration4` varchar(50) NOT NULL,
  `pdd_sr_proof4` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `researcharticles`
--

DROP TABLE IF EXISTS `researcharticles`;
CREATE TABLE IF NOT EXISTS `researcharticles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `author` varchar(200) NOT NULL,
  `title_of_book` varchar(400) NOT NULL,
  `title_of_article` varchar(500) NOT NULL,
  `place_of_publication` varchar(200) NOT NULL,
  `publisher_isbn` varchar(200) NOT NULL,
  `page_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

-- --------------------------------------------------------

--
-- Table structure for table `researchpapers`
--

DROP TABLE IF EXISTS `researchpapers`;
CREATE TABLE IF NOT EXISTS `researchpapers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `author` varchar(400) NOT NULL,
  `title_of_paper` varchar(500) NOT NULL,
  `journal_name_place` varchar(500) DEFAULT NULL,
  `publication_issn` varchar(200) DEFAULT NULL,
  `vol_pageno_year` varchar(100) DEFAULT NULL,
  `impact_factor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `first_name` varchar(99) DEFAULT NULL,
  `last_name` varchar(99) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `city` varchar(99) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `role` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `word_document`
--

DROP TABLE IF EXISTS `word_document`;
CREATE TABLE IF NOT EXISTS `word_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
