<<<<<<< HEAD
<?

	ini_set( "display_errors", "On");

	mb_language("Ja");
	mb_internal_encoding("utf8");

	// セキュリティー情報取得
	$agent = $_SERVER['HTTP_USER_AGENT'];
	$ip = getenv("REMOTE_ADDR");
	$host = getenv("REMOTE_HOST");
	if ($host == null || $host == $ip)
	$host = gethostbyaddr($ip);

	echo '---- Start Memver valid-date Control ------<br/>';

	try {
		$ini = parse_ini_file('../../bin/pdo_member.ini', FALSE);
		$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query('SET CHARACTER SET utf8');

		$sql  = "";
		$sql .= "update memlist";
		$sql .= " set validuntil = date_add(indate , interval 3 year)";
		$sql .= " where";
		$sql .= " state = 5";
		$sql .= " and validuntil is null";
		$stt = $db->prepare($sql);
		$stt->execute();
		echo '  Set ValidDate on normal members.<br/>';

		$sql  = "";
		$sql .= "update memlist";
		$sql .= " set state = 9";
		$sql .= " where";
		$sql .= " state = 5";
		$sql .= " and validuntil < CURRENT_DATE()";
		$stt2 = $db->prepare($sql);
		$stt2->execute();
		echo '  Set Reject state on valid member.<br/>';

		$db = NULL;
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	echo '---- End   Memver valid-date Control ------<br/>';

?>
=======
<?

	ini_set( "display_errors", "On");

	mb_language("Ja");
	mb_internal_encoding("utf8");

	// セキュリティー情報取得
	$agent = $_SERVER['HTTP_USER_AGENT'];
	$ip = getenv("REMOTE_ADDR");
	$host = getenv("REMOTE_HOST");
	if ($host == null || $host == $ip)
	$host = gethostbyaddr($ip);

	echo '---- Start Memver valid-date Control ------<br/>';

	try {
		$ini = parse_ini_file('../../bin/pdo_member.ini', FALSE);
		$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query('SET CHARACTER SET utf8');

		$sql  = "";
		$sql .= "update memlist";
		$sql .= " set validuntil = date_add(indate , interval 3 year)";
		$sql .= " where";
		$sql .= " state = 5";
		$sql .= " and validuntil is null";
		$stt = $db->prepare($sql);
		$stt->execute();
		echo '  Set ValidDate on normal members.<br/>';

		$sql  = "";
		$sql .= "update memlist";
		$sql .= " set state = 9";
		$sql .= " where";
		$sql .= " state = 5";
		$sql .= " and validuntil < CURRENT_DATE()";
		$stt2 = $db->prepare($sql);
		$stt2->execute();
		echo '  Set Reject state on valid member.<br/>';

		$db = NULL;
	} catch (PDOException $e) {
		die($e->getMessage());
	}

	echo '---- End   Memver valid-date Control ------<br/>';

?>
>>>>>>> 5c05174425501e924d383c3f29f998b7b818ae6d
