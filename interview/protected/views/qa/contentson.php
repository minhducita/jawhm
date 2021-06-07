<?php
require_once __DIR__ . '/../../../../include/header.php';
require_once __DIR__ . '/../../../../calendar_module/mod_event_horizontal.php';
$links_obj = new Links();
$this->breadcrumbs = array('ワーキングホリデー協定国別・よくある質問' => array('../../qa.html'), $slug);
?>

<div id="maincontent">
    <!-- Header -->
    <h2 style="margin-top:0" id="<?php echo "question_seminar"; ?>" class="sec-title"><?= $category_parent["title"] ?></h2>

    <!-- Q&A Content -->
    <div class="qa-qbox">
        <?php if (!empty($category_child)): ?>
        <h3 id="question01" class="qa-qtitle"><?= $category_child["title"] ?></h3>
        <?php foreach ($questions as $question): ?>
            <ul>
                <li>
                    <a href="<?php echo "#semians" . $question->id; ?>"> <?= $question->title ?>  </a>
                    <?php
                    $answer = $question->answers;
                    $absolute_cond = '';
                    foreach ($answer as $v5):
                        ?>
                        <p style="min-height: 35px; padding-top: 2px;" class="text-answer <?php echo "qa-seminar-ans" . $question->id; ?>">
                        <?php
                        if (preg_match('/seminar_calendar_keyword/', $v5['content'])) {
                            $used_keyword = 1;
                        } else {
                            $used_keyword = 0;
                        }
                        $arr_str1 = explode('seminar_calendar', $v5['content']);
                        foreach ($arr_str1 as $str1) {
                            $arr_str2 = explode(']]', $str1);
                            foreach ($arr_str2 as $str2) {
                                $str_code = strstr($str2, '[[');
                                if (strlen($str_code) > 0) {
                                    $str_code = substr($str_code, 2, strlen($str_code));
                                    $arr = explode('|', $str_code);
                                    if ($arr[0] != '') {
                                        display_horizontal_calendar("該当なし", 5, 0, "", "$arr[0]", true);
                                        display_horizontal_calendar("該当なし", 2, 0, "", "$arr[0]");
                                        $absolute_cond = $arr[0];
                                    }
                                } else {
                                    echo $str2;
                                }
                            }
                        }
                        ?>
                        </p>
                    <?php endforeach ?>
                </li>
            </ul>
        <?php endforeach ?>
        <?php endif; ?>
    </div>

    <!-- Scroll to top -->
    <div class="top-move">
        <p><a href="<?php echo "#question_seminar"; ?>">▲Q&A TOPへ</a></p>
    </div>

    <!-- Include Category QA  -->
    <div>
        <?php Yii::app()->controller->renderPartial('categoryqa'); ?>
    </div>

    <!-- Ad Box -->
    <div class="advbox03">
        <?php
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

    <?php $links_obj->display_links(); ?>

</div>
