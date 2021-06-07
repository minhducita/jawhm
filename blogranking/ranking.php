<?php

require_once 'getRanking.php';

$inRanking = getRanking(array('CA00000004'),0,'desc',10);
$outRanking = getRanking(array('CA00000004'),1,'desc',10);
?><html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>INランキング</h1>
<ol>
<?php foreach($inRanking as $r) { ?>
	<li><?php echo $r['title']; ?>&nbsp;&nbsp;<?php echo $r['sum_in']; ?> in</li>
<?php } ?>
</ol>
<hr>
<h1>OUTランキング</h1>
<ol>
<?php foreach($outRanking as $r) { ?>
	<li><?php echo $r['title']; ?>&nbsp;&nbsp;<?php echo $r['sum_out']; ?> in</li>
<?php } ?>
</ol>

</body></html>