<?php
/**
 * Advertisements in sidebar
 */
?>
<!--
<?php
  //s001

  // The MAX_PATH below should point to the base of your OpenX installation
  define('MAX_PATH', '/var/www/html/ad');
  if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
    if (!isset($phpAds_context)) {
      $phpAds_context = array();
    }
    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
    $phpAds_raw = view_local('', 156, 0, 0, '_blank', '', '0', $phpAds_context, '');
    $phpAds_context[] = array('!=' => 'campaignid:'.$phpAds_raw['campaignid']);
  }
  echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
  
  
  
  
?>

-->

<?php
  //s002

  // The MAX_PATH below should point to the base of your OpenX installation
  define('MAX_PATH', '/var/www/html/ad');
  if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
    if (!isset($phpAds_context)) {
      $phpAds_context = array();
    }
    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
    $phpAds_raw = view_local('', 157, 0, 0, '_blank', '', '0', $phpAds_context, '');
    $phpAds_context[] = array('!=' => 'campaignid:'.$phpAds_raw['campaignid']);
  }
  echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
?>




<?php
  //s003
  // The MAX_PATH below should point to the base of your OpenX installation
  define('MAX_PATH', '/var/www/html/ad');
  if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
    if (!isset($phpAds_context)) {
      $phpAds_context = array();
    }
    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
    $phpAds_raw = view_local('', 158, 0, 0, '_blank', '', '0', $phpAds_context, '');
    $phpAds_context[] = array('!=' => 'campaignid:'.$phpAds_raw['campaignid']);
  }
  echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
?>



<?php
  //w001

  // The MAX_PATH below should point to the base of your OpenX installation
  define('MAX_PATH', '/var/www/html/ad');
  if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
    if (!isset($phpAds_context)) {
      $phpAds_context = array();
    }
    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
    $phpAds_raw = view_local('', 155, 0, 0, '_blank', '', '0', $phpAds_context, '');
    $phpAds_context[] = array('!=' => 'campaignid:'.$phpAds_raw['campaignid']);
  }
  echo str_replace($big_size, $sml_size, $phpAds_raw['html']);
?>

<?php
  //blog mem
  // The MAX_PATH below should point to the base of your OpenX installation
  define('MAX_PATH', '/var/www/html/ad');
  if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
    if (!isset($phpAds_context)) {
      $phpAds_context = array();
    }
    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
    $phpAds_raw = view_local('', 190, 0, 0, '_blank', '', '0', $phpAds_context, '');
  }
  echo $phpAds_raw['html'];
?>