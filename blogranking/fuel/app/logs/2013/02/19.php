<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

Error - 2013-02-19 00:20:48 --> 8 - Undefined variable: email in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/views/register/confirm.php on line 125
Error - 2013-02-19 00:24:00 --> 8 - Undefined variable: email in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/views/register/confirm.php on line 125
Error - 2013-02-19 00:24:04 --> 8 - Undefined index: CA00000005 in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/views/register/confirm.php on line 145
Error - 2013-02-19 00:32:29 --> 1052 - Column 'blog_id' in where clause is ambiguous [ SELECT * FROM `m_blog` JOIN `t_ranking` ON (`m_blog`.`blog_id` = `t_ranking`.`blog_id`) WHERE `blog_id` = 'BL00000016' AND `quit_flag` = 0 ] in /opt/local/apache2/htdocs/vhosts/jawh/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2013-02-19 00:33:48 --> 1052 - Column 'blog_id' in where clause is ambiguous [ SELECT * FROM `m_blog` JOIN `t_ranking` ON (`m_blog`.`blog_id` = `t_ranking`.`blog_id`) WHERE `blog_id` = 'BL00000016' AND `quit_flag` = 0 ] in /opt/local/apache2/htdocs/vhosts/jawh/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2013-02-19 00:33:50 --> 1052 - Column 'blog_id' in where clause is ambiguous [ SELECT * FROM `m_blog` JOIN `t_ranking` ON (`m_blog`.`blog_id` = `t_ranking`.`blog_id`) WHERE `blog_id` = 'BL00000016' AND `quit_flag` = 0 ] in /opt/local/apache2/htdocs/vhosts/jawh/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2013-02-19 00:34:25 --> 8 - Undefined index: status in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/classes/model/ranking.php on line 174
Error - 2013-02-19 00:35:19 --> 2 - mysqli_result::data_seek() expects parameter 1 to be long, string given in /opt/local/apache2/htdocs/vhosts/jawh/fuel/core/classes/database/mysqli/result.php on line 37
Error - 2013-02-19 00:43:22 --> 8 - Undefined index: out01 in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/classes/model/ranking.php on line 184
Error - 2013-02-19 00:43:50 --> 1054 - Unknown column 'out' in 'field list' [ UPDATE `t_ranking` SET `out` = 1 WHERE `blog_id` = 'BL00000016' ] in /opt/local/apache2/htdocs/vhosts/jawh/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2013-02-19 00:44:10 --> 8 - Undefined index: url in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/classes/controller/api.php on line 23
Error - 2013-02-19 01:55:34 --> 1054 - Unknown column '0' in 'field list' [ UPDATE `t_ranking` SET `0` = 'out01', `1` = 2, `update_datetime` = '20130219015534' WHERE `blog_id` = 'BL00000001' ] in /opt/local/apache2/htdocs/vhosts/jawh/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2013-02-19 09:10:59 --> 8 - Undefined variable: omg_path in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/classes/controller/mypage/edit.php on line 46
Error - 2013-02-19 09:55:28 --> 1052 - Column 'blog_id' in order clause is ambiguous [ SELECT * FROM `m_blog` JOIN `t_ranking` ON (`m_blog`.`blog_id` = `t_ranking`.`blog_id`) WHERE `m_blog`.`delete_flag` = '0' ORDER BY `blog_id` ] in /opt/local/apache2/htdocs/vhosts/jawh/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2013-02-19 10:09:53 --> 1054 - Unknown column 'm_blog.category_id' in 'order clause' [ SELECT * FROM `m_blog` JOIN `t_ranking` ON (`m_blog`.`blog_id` = `t_ranking`.`blog_id`) WHERE `m_blog`.`delete_flag` = '0' ORDER BY `m_blog`.`category_id` ] in /opt/local/apache2/htdocs/vhosts/jawh/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2013-02-19 10:28:56 --> Parsing Error - syntax error, unexpected ';' in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/classes/controller/manage.php on line 56
Error - 2013-02-19 10:29:31 --> Parsing Error - syntax error, unexpected ')' in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/classes/controller/manage.php on line 58
Error - 2013-02-19 11:51:52 --> Parsing Error - syntax error, unexpected '}', expecting ',' or ';' in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/views/mypage/edit/index.php on line 223
Error - 2013-02-19 12:03:52 --> Error - Class 'Category' not found in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/classes/controller/mypage/top.php on line 28
Error - 2013-02-19 12:04:14 --> 8 - Undefined index: banner_url in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/views/mypage/top/index.php on line 151
Error - 2013-02-19 12:04:56 --> 8 - Use of undefined constant BANNER_IMG_DIR - assumed 'BANNER_IMG_DIR' in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/views/mypage/top/index.php on line 158
Error - 2013-02-19 12:05:31 --> 8 - Undefined offset: 0 in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/views/mypage/top/index.php on line 158
Error - 2013-02-19 12:33:41 --> 8 - Undefined offset: 0 in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/classes/controller/mypage/top.php on line 15
Error - 2013-02-19 12:35:27 --> 8 - Undefined offset: 0 in /opt/local/apache2/htdocs/vhosts/jawh/fuel/app/classes/controller/mypage/top.php on line 15
