<?php
/**
 * MAIL TEXT.
 * User: nguyentuananh2985@gmail.com
 * Time: 10:35 AM
 */
mb_internal_encoding("UTF-8");
//tên tiêu đề gửi mail
$ch_tantousha_name = '{{担当者}}';//tên người nhận
$ch_place = '{{開催都市}}';//nơi tổ chức sự kiện
$ch_hiduke = '{{開催日}}';//ngày YYYY/mm/dd
$ch_hiduke_week = '{{曜日}}';//ngày bắt đầu hiển thị thứ. W

//nội dung gửi mail
$ch_before_sttime = '{{前セミナー開始時刻}}';//ngày giờ của seminar trước đó h:i
$ch_title_before = '{{前セミナータイトル}}';//title của seminar truoc do

$ch_affter_sttime = '{{本セミナー開始時刻}}';//ngày giờ chính của seminar tổ chức h:i
$ch_title1 = '{{本セミナータイトル}}';//title của seminar chính

$ch_place_different = '{{中継案内}}';//seminar cc place position
$ch_et_list = '{{参加予定者リスト}}';// danh sách người đăng ký hiển thị form

$from_email = 'school@jawhm.or.jp';//<-- mail được gửi từ dịa chỉ
$bcc_email = 'school@jawhm.or.jp';
//$bcc_email = 'minhquyen123@gmail.com';