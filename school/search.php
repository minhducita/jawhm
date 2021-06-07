<?php
ini_set('display_error', 1);
require_once '../include/header.php';
try {
	$ini = parse_ini_file('../../bin/pdo_mail_list.ini', FALSE);
	$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
	$db->query('SET CHARACTER SET utf8');
} catch (PDOException $e) {
	die($e->getMessage());
}
$search = '';
$order = '';
$country_list = array('オーストラリア' => 'aus', 'カナダ' => 'can', 'ニュージーランド' => 'nz', 'イギリス' => 'en', 'アメリカ' => 'usa', 'フランス' => 'fra', 'ドイツ' => 'deu', 'アイルランド' => 'ire', 'ワールドワイド' => 'ww',);
if (isset($_GET['countries'])) {
	$eu = explode(',', $_GET['countries']);
	if (strpos($_GET['countries'], 'ヨーロッパ') || $_GET['countries'] === 'ヨーロッパ' || in_array('ヨーロッパ', $eu)) {
		$_GET['countries'] = str_replace('ヨーロッパ', 'イギリス,フランス,ドイツ,アイルランド', $_GET['countries']);
	}
	$countries = explode(',', $_GET['countries']);
	$search .= 'AND ( 1 = 0 ';
	foreach ($countries as $country) {
		$search .= 'OR `country` LIKE "%' . $country_list[$country] . '%" OR `country` LIKE "%ww%" ';
	}
	$search .= ' )';
	$result = true;
}
if (isset($_GET['courses'])) {
	$courses = explode(',', $_GET['courses']);
	$search .= 'AND ( 1 = 1 ';
	foreach ($courses as $course) {
		$search .= 'AND `course` LIKE "%' . $course . '%" ';
	}
	$search .= ' )';
	$result = true;
}
if (isset($_GET['licences'])) {
	$licences = explode(',', $_GET['licences']);
	$search .= 'AND ( 1 = 1 ';
	foreach ($licences as $licence) {
		$search .= 'AND `licence` LIKE "%' . $licence . '%" ';
	}
	$search .= ' )';
	$result = true;
}
if (isset($_GET['points'])) {
	$points = explode(',', $_GET['points']);
	$search .= 'AND ( 1 = 1 ';
	foreach ($points as $point) {
		$search .= 'AND `point` LIKE "%' . $point . '%" ';
	}
	$search .= ' )';
	$result = true;
}
if (!$result) {
	$order = 'ORDER BY name ASC limit 0, 5';
} else $order = 'ORDER BY name ASC';
//$order = 'ORDER BY RAND() limit 0, 5';
if ($preview) {
	session_start();

	// ログインチェック
	$url_base = '/mailsystem/mem/';
	$user_id = @$_SESSION['user_id'];
	$user_name = @$_SESSION['user_name'];
	$user_level = @$_SESSION['user_level'];
	if ($user_id == '') {
		// ログインページ表示
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
			$uri = 'https://';
		} else {
			$uri = 'http://';
		}
		$uri .= $_SERVER['HTTP_HOST'];
		header('Location: ' . $uri . $url_base . 'login.php');
		exit;
	}

	try {
		$sql = 'SELECT `id`, `nickname`, `country`, `city`, `name`, `rubi`, `logo`, `course`, `licence`, `point`, `edit_time`, `caption` FROM `p_school_list` WHERE ( 1 = 1 ' . $search . ' )' . $order;
		$stt = $db->query($sql);
		foreach ($stt as $row) {
			$schools[] = $row;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
} else {
	try {
		$sql = 'SELECT `id`, `nickname`, `country`, `city`, `name`, `rubi`, `logo`, `course`, `licence`, `point`, `edit_time`, `caption` FROM `school_list` WHERE ( 1 = 1 ' . $search . ' )' . $order;
		$stt = $db->query($sql);
		foreach ($stt as $row) {
			$schools[] = $row;
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

//選択項目を取得
try {
	$stt = $db->prepare('SELECT id, name FROM school_course_list ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
		$idx++;
		$course_id[] = $row['id'];
		$course_name[] = $row['name'];
	}
} catch (PDOException $e) {
	die($e->getMessage());
}

try {
	$stt = $db->prepare('SELECT id, name FROM school_licence_list ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
		$idx++;
		$licence_id[] = $row['id'];
		$licence_name[] = $row['name'];
	}
} catch (PDOException $e) {
	die($e->getMessage());
}


try {
	$stt = $db->prepare('SELECT id, name FROM school_point_list ORDER BY sort_number');
	$stt->execute();
	$idx = 0;
	while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
		$idx++;
		$point_id[] = $row['id'];
		$point_name[] = $row['name'];
	}
} catch (PDOException $e) {
	die($e->getMessage());
}

$header_obj = new Header();

$header_obj->title_page = '語学学校検索';
$header_obj->description_page = 'ワーキングホリデー（ワーホリ）や留学で行ける各種語学学校のご案内です。ワーキングホリデー（ワーホリ）協定国の最新のビザ取得方法や渡航情報などを発信しています。また、ワーキングホリデー（ワーホリ）をされる方向けの各種無料セミナーを開催しています。オーストラリア、ニュージーランド、カナダ、韓国、フランス、ドイツ、イギリス、アイルランド、デンマーク、台湾、香港でワーキングホリデー（ワーホリ）ビザの取得が可能です。ワーキングホリデー（ワーホリ）ビザ以外に学生ビザでの留学などもお手伝い可能です。';

$header_obj->add_css_files = '<link href="/school/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />';
$header_obj->add_js_files = '<script src="/school/js/jquery.js" type="text/javascript"></script>';

$header_obj->fncMenuHead_imghtml = '<img id="top-mainimg" src="/images/mainimg/top-mainimg.jpg" alt="" width="970" height="170" />';
$header_obj->fncMenuHead_h1text = 'ワーキングホリデー（ワーホリ）や留学で行ける各種語学学校の検索。';

if ($header_obj->computer_use() == false && $_SESSION['pc'] != 'on') {
	$header_obj->add_css_files = '<link href="/school/css/style_sp.css" rel="stylesheet" type="text/css" />
                              <link href="/school/css/slick.css" rel="stylesheet" type="text/css" />
                              <link href="/school/css/slick-theme.css" rel="stylesheet" type="text/css" />';

	$header_obj->add_js_files = '<script src="/school/js/common.js" type="text/javascript"></script>
                            <script type="text/javascript" src="/school/js/jquery.min.js"></script>
                            <script src="/school/js/slick.min.js"></script>
                            <script src="/school/js/sp_common.js" type="text/javascript"></script>';
	//$header_obj->add_js_files='<script src="/school/js/sp_common.js" type="text/javascript"></script>';
} else {
	$header_obj->add_css_files = '<link href="/school/css/style.css" rel="stylesheet" type="text/css" />';
	$header_obj->add_js_files = '<script src="/school/js/common.js" type="text/javascript"></script>';
}

$header_obj->display_header();

?>
<?php if (!$result) : ?>
	<?php if ($header_obj->computer_use() == false && $_SESSION['pc'] != 'on') {
		include_once('_temp/_search_sp.php');
	} else {
		include_once('_temp/_search_pc.php');
	}
	?>

	</div><!-- /.#contents -->
	</div><!-- /.#contentsbox -->

	<?php fncMenuFooter($header_obj->footer_type); ?>

	</body>

	</html>
<?php else : ?>
	<?php if ($header_obj->computer_use() == false && $_SESSION['pc'] != 'on') {
		include_once('_temp/_search_results_sp.php');
	} else {
		include_once('_temp/_search_results_pc.php');
	}
	?>

	</div><!-- /.#contents -->
	</div><!-- /.#contentsbox -->

	<?php fncMenuFooter($header_obj->footer_type); ?>

	</body>

	</html>
<?php endif; ?>