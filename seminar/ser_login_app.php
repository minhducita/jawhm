<?php
session_start(); //JN:change position

$email = @$_GET['email'];
$pwd = @$_GET['pwd'];
$token = @$_GET['token'];

if ($token == md5('@JawhmApp303@')) {
    try {
        $ini = parse_ini_file('../../bin/pdo_member.ini', FALSE);
        $db = new PDO($ini['dsn'], $ini['user'], $ini['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->query('SET CHARACTER SET utf8');
        $stt = $db->prepare('SELECT id, email, password, namae FROM memlist WHERE email = :email and state = "5" ');
        $stt->bindValue(':email', $email);
        $stt->execute();
        $cur_id = '';
        $cur_email = '';
        $cur_password = '';
        $cur_namae = '';
        while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
            $cur_id = $row['id'];
            $cur_email = $row['email'];
            $cur_password = $row['password'];
            $cur_namae = $row['namae'];
        }
        $db = NULL;
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    if ($cur_password == $pwd) {
        $_SESSION['mem_id'] = $cur_id;
        $_SESSION['mem_name'] = $cur_namae;
        $_SESSION['mem_level'] = 0;
        header("location: /seminar/ser");
    } else {
        unset($_SESSION['mem_id']);
        unset($_SESSION['mem_name']);
        unset($_SESSION['mem_level']);
        header("location: /seminar/ser");
    }
} else {
    echo "<h2>このページはアプリで表示ができません。</h3>";
}
?>
