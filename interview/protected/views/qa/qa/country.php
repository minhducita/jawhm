<?php 
require_once __DIR__ . '/../../../../../include/header.php';
require_once __DIR__ . '/../../../../../calendar_module/mod_event_horizontal.php';
$links_obj = new Links();// object Links() at model/link.php

?>

<div id="maincontent">



  <div id="topic-path">
    <div id="text-home"><a href="/">ワーキング・ホリデー（ワーホリ）協会</a>&nbsp;&gt;&nbsp;<a href="../qa.html" title="">よくある質問</a>&nbsp;&gt;&nbsp;<?php echo $nameads->name; ?></div>
  </div>    
  <h2 class="sec-title"><?php echo $nameads->name; ?>　留学・ワーキングホリデー</h2>


  <!--      part flag -->
  <table class="qatable-aus">
    <tbody>
      <tr>

        <th><img src=<?= $image ?> alt=""><br><?php echo $nameads->name; ?></th>
        <td>ワーキングホリデー協定国別に、よくあるご質問にお答えしています。</td>
      </tr>
    </tbody>
  </table>


  <!-- Star-sami -->
  <p>&nbsp;</p>
  <?php
    // settings for the calendar module display
    $country_to_display = $nameads->name; //name country
    $number_to_display = '6';
    $start_display_from = ''; //empty is begining

    display_horizontal_calendar($country_to_display, $number_to_display, $start_display_from);
    ?>

    <!-- End-sami -->





    <!-- General section -->
    <p>&nbsp;</p>
    <h2 class="sec-title">よくある質問と回答</h2>
    <p>&nbsp;</p>

    <?php
    $bien = Countries::model()->with('questions')->find('abbr=:abbr',array(':abbr'=>$country));
    $qscon = $bien->questions;
    $count = 0;
    foreach ($qscon as $qscon):

      ?>


    <!-- PART 2: QUESTION -->

    <div class="qa-abox-country">
      <!-- PART 2.1 TITLE QUESTION -->
      <h3 class="q-title"><?php echo "Q. " . ++$count . "   " . $qscon->title ?></h3>
    </br>
    <!-- PART 2.2 ANSWERS -->
    <?php foreach ($qscon->answers as $ans): ?>

      <p class="text-answerqa" >

        <?php echo $ans['content'];  ?>

        
      </p>
    </br>
    

  <?php endforeach ?>
</div>
<?php endforeach ?>

<!-- PART 3 link to header -->
<div class="top-move">
  <p><a href="#header">▲ページのＴＯＰへ</a></p>
</div>

<?php

// settings for the calendar module display
$country_to_display = $nameads->name;
$number_to_display = '6';
$start_display_from = '6'; //empty is begining

display_horizontal_calendar($country_to_display, $number_to_display, $start_display_from);
?>

    <div class="advbox03">
<?php
  // 122
  define('MAX_PATH', '/var/www/html/ad');
  if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
    if (!isset($phpAds_context)) {
      $phpAds_context = array();
    }
    // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
    $phpAds_raw = view_local('', 100, 0, 0, '', '', '0', $phpAds_context, '');
  }
  echo $phpAds_raw['html'];
?>
    </div>


<?php 
$links_obj->display_links();
?>



</div>

</div>
