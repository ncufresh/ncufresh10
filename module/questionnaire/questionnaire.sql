-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Aug 05, 2010, 01:30 AM
-- 伺服器版本: 5.1.44
-- PHP 版本: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 資料庫: `ncu_fresh_2010`
--

-- --------------------------------------------------------

--
-- 資料表格式： `ques_answer`
--

CREATE TABLE `ques_answer` (
		  `aid` int(11) NOT NULL AUTO_INCREMENT,
		  `tid` int(11) NOT NULL,
		  `uid` int(11) NOT NULL,
		  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  PRIMARY KEY (`aid`),
		  KEY `tid` (`tid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 列出以下資料庫的數據： `ques_answer`
--


-- --------------------------------------------------------

--
-- 資料表格式： `ques_answer_option`
--

CREATE TABLE `ques_answer_option` (
		  `tid` int(11) NOT NULL,
		  `uid` int(11) NOT NULL,
		  `oid` int(11) NOT NULL,
		  KEY `tid` (`tid`,`uid`,`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 列出以下資料庫的數據： `ques_answer_option`
--


-- --------------------------------------------------------

--
-- 資料表格式： `ques_form`
--

CREATE TABLE `ques_form` (
		  `qid` int(11) NOT NULL AUTO_INCREMENT,
		  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  PRIMARY KEY (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='問卷基本資料' AUTO_INCREMENT=1 ;

--
-- 列出以下資料庫的數據： `ques_form`
--


-- --------------------------------------------------------

--
-- 資料表格式： `ques_has_answered`
--

CREATE TABLE `ques_has_answered` (
		  `uid` int(11) NOT NULL,
		  `qid` int(11) NOT NULL,
		  KEY `uid` (`uid`,`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 列出以下資料庫的數據： `ques_has_answered`
--


-- --------------------------------------------------------

--
-- 資料表格式： `ques_option`
--

CREATE TABLE `ques_option` (
		  `oid` int(11) NOT NULL AUTO_INCREMENT,
		  `tid` int(11) NOT NULL,
		  `option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `correct` tinyint(4) NOT NULL,
		  PRIMARY KEY (`oid`),
		  KEY `tid` (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 列出以下資料庫的數據： `ques_option`
--

INSERT INTO `ques_option` VALUES(0, 0, '其他', 0);

-- --------------------------------------------------------

--
-- 資料表格式： `ques_topic`
--

CREATE TABLE `ques_topic` (
		  `tid` int(11) NOT NULL AUTO_INCREMENT,
		  `qid` int(11) NOT NULL,
		  `t_type` tinyint(4) NOT NULL,
		  `t_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `t_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `o_other` tinyint(1) NOT NULL DEFAULT '0',
		  `required` tinyint(4) NOT NULL,
		  PRIMARY KEY (`tid`),
		  KEY `qid` (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='題目和選項' AUTO_INCREMENT=1 ;

--
-- 列出以下資料庫的數據： `ques_topic`
--


