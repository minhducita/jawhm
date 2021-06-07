<?php

try {
    //memlist DB (Because test server not use new database, use same db (pdo_member.int -> pdo_mail_list.ini)
    $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_mail_list.ini', FALSE);
    $db_mem = new PDO($ini['dsn'], $ini['user'], $ini['password']);
    $db_mem->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_mem->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $db_mem->query('SET CHARACTER SET utf8');
    //jawhm DB
    $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../bin/pdo_mail_list.ini', FALSE);
    $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $db->query('SET CHARACTER SET utf8');

} catch (PDOException $e) {
    die($e->getMessage());
}

?>
