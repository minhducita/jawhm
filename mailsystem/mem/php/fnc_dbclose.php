<?php
	try {
		$db_mem = NULL;
		$db = NULL;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
?>