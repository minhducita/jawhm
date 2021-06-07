<?php
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(__FILE__) . DS);
    if (file_exists(ROOT . 'alocal.php')) {
        include_once(ROOT . 'alocal.php');
    }
    $array = explode(',', $_GET['zoneid']);
    $string = '';
    if (! empty($array)) {
        foreach ($array as $value) {
            $result = view_local('', (is_numeric($value) ? $value : 217), 0, 0, '_blank', '', '0', array(), '');
            $string .= $result['html'];
        }
    } else if($_GET['zoneid'] === '221'){
        $result = view_local('', 221, 0, 0, '_blank', '', '0', array(), '');
        $string .= $result['html'];
    } else {
        $result = view_local('', 217, 0, 0, '_blank', '', '0', array(), '');
        $string .= $result['html'];
    }
    echo $string;
?>

