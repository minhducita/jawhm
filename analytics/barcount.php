<html>
<title>�o�i�[�A�N�Z�X�W�v</title>
<body>
<h1 style="color:white;background-color:#525D76;font-size:22px;">
	�o�i�[�E�A�N�Z�X�W�v</h1>

<table border="1">
<tr>
<th style="background-color:navy; color:white;">���t</th>
<th style="background-color:navy; color:white;">�J�E���^�o�f</th>
<th style="background-color:navy; color:white;">�����N��</th>
<th style="background-color:navy; color:white;">���[�UID</th>
<th style="background-color:navy; color:white;">��</th>
</tr>

<?php
try {

	$ini = parse_ini_file('../../bin/pdo_jawhm_bar.ini', FALSE);
	$db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->query('SET CHARACTER SET utf8');
	$stt = $db->prepare('SELECT vdate, vname, vref, vuid, count(*) as cnt FROM accesslog GROUP BY vdate, vname, vref, vuid');
	$stt->execute();

	while($row = $stt->fetch(PDO::FETCH_NUM)){
		print('<tr>');
		print('<td>'.$row[0].'</td>');
		print('<td>'.$row[1].'</td>');
		print('<td><a href="'.$row[2].'" target="_blank">'.$row[2].'</a></td>');
		print('<td>'.$row[3].'</td>');
		print('<td style="text-align:right;">'.$row[4].'</td>');
		print('</tr>');
	}

	$db = NULL;

} catch (PDOException $e) {
	die($e->getMessage());
}
?>

</table>
</body>
