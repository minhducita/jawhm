<?php
//use yii\helpers\Html;

include __DIR__ . '/../../../../seminar_module/seminar_module.php';
$sm = new SeminarModule($config);
require_once __DIR__ . '/../../../../include/header.php';
//require_once __DIR__ . '/../layouts/include/header.php';
$header_obj = new Header();
$header_obj->title_page = $content->name;
//$this->params['breadcrumbs'][] = ['label' => 'カウンセラー一覧', 'url' => '/interview', 'template' => '<span>{link}</span>'];
//$this->params['breadcrumbs'][] = ['label' => $content->name, 'template' => ' > <sqan>{link}</span>'];
$this->breadcrumbs = array_merge(array('ワーキング・ホリデー（ワーホリ）協会 ' => '/'), $this->breadcrumbs, array('カウンセラー一覧' => array('interview/index')), array($content->name));
$name_office = strtolower($office);//strtolower($content->officeName);
echo "<div class=\"interview {$name_office}\">";
//echo 'This is jawhm';
//foreach ($content as $m) {
//    $header_obj->title_page = $m['name_transcription'];
//    echo $header_obj->breadcrumbs();
$m = str_replace('http://','https://',$content['content']);
$arr_str1 = explode('phpfunction', $m);
//echo Yii::$app->request->baseUrl . '<br />';
foreach ($arr_str1 as $str1) {
    $arr_str2 = explode(']]', $str1);
    foreach ($arr_str2 as $str2) {
        //echo 'Jack Nguyen 2';
        $str_code = strstr($str2, '[[');
        if (strlen($str_code) > 0) {
            //$exe = trim(substr($str_code,3, strlen($str_code)));
            $arr = explode('|', $str_code);
            //print_r($arr);
            //handle
            $pro = trim(substr($arr[0], 2, strlen($arr[0])));
            //echo $pro;
            if ($pro == 'sem') {//phpfunction[[title]]
                $config = array('view_mode' => 'list', 'list' => array('detail_open' => 'off', count_field_active => 'none', 'backcolor' => '#0062b3', title => $arr[1], 'place_default' => $arr[2]));
                //$config = array('view_mode' => 'list' ,'list' => array('detail_open' => 'off', count_field_active => 'none','backcolor' => '#0062b3', title => 'フランス体験談') );
                $sm = new SeminarModule($config);
                echo($sm->get_add_js());
                echo($sm->get_add_css());
                echo($sm->get_add_style());
                $ret = $sm->show();
            }
            //
        } else {
            //echo __DIR__;
            echo $str2;
        }
    }
}
?>
<h2 class="sec-title">セミナー情報</h2>

<table>
    <tbody>
        <tr>
            <td>
                <!--<p class="text01">&nbsp;</p>-->
    <center><b><font size="3">このカウンセラーが担当する体験談セミナーに参加しよう！</font></b></center>
</td>
</tr>
<tr>
    <td>
        <?php
        if ($content['seminar_title'] != '') {
            //$config = array('view_mode' => 'list', 'list' => array('detail_open' => 'off', count_field_active => 'none', 'backcolor' => '#0062b3', title => $content['seminar_title'], 'place_default' => strtolower($office)));
			// Edit by Minhquyen-JAWHMvn
			$config = array('view_mode' => 'list', 'list' => array('detail_open' => 'off', count_field_active => 'none', 'backcolor' => '#0062b3', keyword => $content['seminar_title'], 'place_default' => strtolower($office)));
            //$config = array('view_mode' => 'list' ,'list' => array('detail_open' => 'off', count_field_active => 'none','backcolor' => '#0062b3', title => 'フランス体験談') );
            $sm = new SeminarModule($config);
            echo($sm->get_add_js());
            echo($sm->get_add_css());
            echo($sm->get_add_style());
            $ret = $sm->show();
        }else
        {
            echo '<center><b><font size="3" style="color:red">現在セミナースケジュールの調整中です。</font></b></center>';
        }
        ?>
    </td>
</tr>
</tbody>
</table>
<a class="shirushi" href="/interview/"><span class="mgr10">&lt;</span>一覧へ戻る</a>

<br />
<br />
<?php
echo '</div>';
?>
<script>
    $(function(){
        $("#interview_block").removeClass().addClass('<?php echo 'interview ' . $name_office ?>');
    });
</script>    