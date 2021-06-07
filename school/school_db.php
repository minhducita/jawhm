<?php
$prefix = ($preview) ? 'p_' : '';
try {
		$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
		$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
		$db->query('SET CHARACTER SET utf8');
	} catch (PDOException $e) {
		die($e->getMessage());
	}
$param = explode('/', @$_SERVER['REQUEST_URI']);
if (!empty($param[3])){
	$nickname = $param[3];
	$schcountry = $param[2];
} else {
	$pr = explode('_',$param[2]);
	$schcountry = $pr[0];
	$nickname = $pr[1];
}

try {
	$stt = $db->prepare('SELECT id,country,city,name,rubi,nickname,logo,course,licence,point,level,activity,blog,voice_url,search_word,caption,slide FROM '.$prefix.'school_list WHERE nickname = :nickname AND country = :country ');
	$stt->bindvalue(':nickname',$nickname);
	$stt->bindvalue(':country',$schcountry);
	$stt->execute();
	$idx = 0;
	while($row = $stt->fetch(PDO::FETCH_ASSOC)){
		$idx++;
		$cur_id = $row['id'];
		$country = $row['country'];
		$city = $row['city'];
		$name = $row['name'];
		$rubi = $row['rubi'];
		$nickname = $row['nickname'];
		$logo = $row['logo'];
		$course = explode(',',$row['course']);
		$licence = explode(',',$row['licence']);
		$point = explode(',',$row['point']);
		$level = $row['level'];
		$activity = $row['activity'];
		$blog = str_replace('http','https',$row['blog']); //SSL @minhquyen
		$voice_url = str_replace('http','https',$row['voice_url']); //SSL @minhquyen
		$search_word = $row['search_word'];
		$caption = $row['caption'];
		$slide = $row['slide'];
	}
} catch (PDOException $e) {
	die($e->getMessage());
}
try {
	$stt = $db->prepare('SELECT id, title, body FROM '.$prefix.'school_desc WHERE school_id = "'.$cur_id.'" ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while($row = $stt->fetch(PDO::FETCH_ASSOC)){
		$descs[$idx]['id'] = $row['id'];
		$descs[$idx]['title'] = $row['title'];
		$descs[$idx]['body'] = $row['body'];
		$idx++;
	}
} catch (PDOException $e) {
	die($e->getMessage());
}
try {
	$stt = $db->prepare('SELECT id, title, body FROM '.$prefix.'school_point WHERE school_id = "'.$cur_id.'" ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while($row = $stt->fetch(PDO::FETCH_ASSOC)){
		$points[$idx]['id'] = $row['id'];
		$points[$idx]['title'] = $row['title'];
		$points[$idx]['body'] = explode(',',$row['body']);
		$idx++;
	}
} catch (PDOException $e) {
	die($e->getMessage());
}
try {
	$stt = $db->prepare('SELECT id, name, address, student, eop, jpn, dorm, intro, country, embed FROM '.$prefix.'school_cmp WHERE school_id = "'.$cur_id.'" ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while($row = $stt->fetch(PDO::FETCH_ASSOC)){
		$cmps[$idx]['id'] = $row['id'];
		$cmps[$idx]['name'] = $row['name'];
		$cmps[$idx]['address'] = $row['address'];
		$cmps[$idx]['student'] = $row['student'];
		$cmps[$idx]['eop'] = $row['eop'];
		$cmps[$idx]['jpn'] = $row['jpn'];
		$cmps[$idx]['dorm'] = $row['dorm'];
		$cmps[$idx]['intro'] = $row['intro'];
		$cmps[$idx]['country'] = $row['country'];
		$cmps[$idx]['embed'] = $row['embed'];
		$idx++;
	}
} catch (PDOException $e) {
	die($e->getMessage());
}
try {
	$stt = $db->prepare('SELECT id, title, body, period, target, cond, remarks FROM '.$prefix.'school_prog WHERE school_id = "'.$cur_id.'" ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while($row = $stt->fetch(PDO::FETCH_ASSOC)){
		$progs[$idx]['id'] = $row['id'];
		$progs[$idx]['title'] = $row['title'];
		$progs[$idx]['body'] = $row['body'];
		$progs[$idx]['period'] = $row['period'];
		$progs[$idx]['target'] = $row['target'];
		$progs[$idx]['cond'] = $row['cond'];
		$progs[$idx]['remarks'] = explode(',',$row['remarks']);
		$idx++;
	}
} catch (PDOException $e) {
	die($e->getMessage());
}
try {
	$stt = $db->prepare('SELECT id, title, body, period, target, cond, remarks FROM '.$prefix.'school_plus WHERE school_id = "'.$cur_id.'" ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while($row = $stt->fetch(PDO::FETCH_ASSOC)){
		$pluses[$idx]['id'] = $row['id'];
		$pluses[$idx]['title'] = $row['title'];
		$pluses[$idx]['body'] = $row['body'];
		$pluses[$idx]['period'] = $row['period'];
		$pluses[$idx]['target'] = $row['target'];
		$pluses[$idx]['cond'] = $row['cond'];
		$pluses[$idx]['remarks'] = explode(',',$row['remarks']);
		$idx++;
	}
} catch (PDOException $e) {
	die($e->getMessage());
}
try {
	$stt = $db->prepare('SELECT id, icon, body FROM '.$prefix.'school_voice WHERE school_id = "'.$cur_id.'" ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while($row = $stt->fetch(PDO::FETCH_ASSOC)){
		$voices[$idx]['id'] = $row['id'];
		$voices[$idx]['icon'] = $row['icon'];
		$voices[$idx]['body'] = $row['body'];
		$idx++;
	}
} catch (PDOException $e) {
	die($e->getMessage());
}
try {
	$stt = $db->prepare('SELECT id, image, video FROM '.$prefix.'school_slide WHERE school_id = "'.$cur_id.'" ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while($row = $stt->fetch(PDO::FETCH_ASSOC)){
		$slides[$idx]['id'] = $row['id'];
		$slides[$idx]['image'] = $row['image'];
		$slides[$idx]['video'] = $row['video'];
		$idx++;
	}
} catch (PDOException $e) {
	die($e->getMessage());
}
try {
	$stt = $db->prepare('SELECT id, year, language, url FROM ' . $prefix . 'p_school_pamphlet WHERE school_id = "' . $cur_id . '" ORDER BY year DESC');
	$stt->execute();
	$idx = 0;
	while($row = $stt->fetch(PDO::FETCH_ASSOC)){
		$pamphlet[$idx]['id'] = $row['id'];
		$pamphlet[$idx]['year'] = $row['year'];
		$pamphlet[$idx]['language'] = $row['language'];
		$pamphlet[$idx]['url'] = $row['url'];
		$idx++;
	}
} catch (PDOException $e) {
	die($e->getMessage());
}
