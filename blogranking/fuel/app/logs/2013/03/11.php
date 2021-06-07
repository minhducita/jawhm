<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

Error - 2013-03-11 02:46:21 --> 8 - Trying to get property of non-object in /var/www/html/blogranking/fuel/app/classes/controller/api.php on line 11
Error - 2013-03-11 02:46:30 --> 1052 - Column 'delete_flag' in where clause is ambiguous [ SELECT * FROM `t_ranking` JOIN `m_blog` ON (`m_blog`.`blog_id` = `t_ranking`.`blog_id`) WHERE `status` = 3 AND `delete_flag` = 0 OR `category_id` = 'CA00000005' ORDER BY `in01` DESC LIMIT 10 ] in /var/www/html/blogranking/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2013-03-11 02:46:30 --> 2 - file_get_contents(http://www.jawhm.net/blogranking/api/?param={"ctgs":["CA00000005"],"rankingType":0,"sort":"desc","limit":10}): failed to open stream: HTTP request failed! HTTP/1.0 500 Internal Server Error
 in /var/www/html/blogranking/fuel/app/classes/controller/api.php on line 67
Error - 2013-03-11 02:46:56 --> 1052 - Column 'delete_flag' in where clause is ambiguous [ SELECT * FROM `t_ranking` JOIN `m_blog` ON (`m_blog`.`blog_id` = `t_ranking`.`blog_id`) WHERE `status` = 3 AND `delete_flag` = 0 OR `category_id` = 'CA00000005' ORDER BY `in01` DESC LIMIT 10 ] in /var/www/html/blogranking/fuel/core/classes/database/mysqli/connection.php on line 243
Error - 2013-03-11 22:50:55 --> Error - Class 'Email' not found in /var/www/html/blogranking/fuel/app/classes/controller/register.php on line 59
Error - 2013-03-11 22:52:00 --> Error - Class 'Package\Email' not found in /var/www/html/blogranking/fuel/app/classes/controller/register.php on line 60
Error - 2013-03-11 22:53:12 --> Parsing Error - syntax error, unexpected T_CONSTANT_ENCAPSED_STRING, expecting ')' in /var/www/html/blogranking/fuel/app/config/email.php on line 93
Error - 2013-03-11 22:53:39 --> Error - Failed authentication. in /var/www/html/blogranking/fuel/packages/email/classes/email/driver/smtp.php on line 165
Error - 2013-03-11 22:54:41 --> Error - Failed authentication. in /var/www/html/blogranking/fuel/packages/email/classes/email/driver/smtp.php on line 165
