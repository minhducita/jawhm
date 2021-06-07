<?php
/*
 * Template name: seminar
 */
get_header();
$place = $_GET["place"];
$title = $_GET["title"];
$view = $_GET['view'];
if (strlen($place) == 0) {
    $place = "online";
}

/**  EDIT BY MINHQUYEN - 20/12/2016
if ($view == "all") {
$end_date = get_end_date();
} else {
$date = get_start_date();
$end_date = strtotime($date);
$end_date = date('Y-m-d',strtotime('+10 days', $end_date) );
}
**/
$end_date = get_end_date();
function queryGen($place, $title) {
    echo "?place=" . $place . "&title=" . $title . "&view=10";
}

function getPref($place) {
    if (!isset($place)) {
        return '東京';
    }
    $pref = array(
        'tokyo' => '東京',
        'osaka' => '大阪',
        'nagoya' => '名古屋',
        'fukuoka' => '福岡',
        'okinawa' => '沖縄',
        'kyoto' => '京都',
        'omiya' => '大宮',
    );
    return $pref[$place];
}

function activePlace($compare, $place) {
    if ($compare != $place)
        echo "off";
}

function activeTitle($compare, $title) {
    if ($compare != $title || $compare == "")
        echo "off";
}
function config_knowlist_default($title){ // config default list seminar
    if(empty($title)){
        return array('id' => 'all', 'active' => 'on');
    }
    $know_list = array(
            '初心者'   =>  array(
                    'id' => 's01',
                    'name' => '初心者向けセミナー',
                    'word2' => array('初心者'),
                    'default'=>'on',
                    'active' => 'on',
            ),
            '語学学校' =>   array(
                    'id' => 's05',
                    'name' => '語学学校セミナー',
                    'word2' => array('学校セミナー','学校懇談'),
                    'active' => 'on',
                    'default'=>'on',
            ),
            // '体験談'    =>  array(
            //      'id' => 's06',
            //      'name' => '体験談セミナー',
            //      'word2' => array('体験談'),
            //      'active' => 'on',
            //      'default'=>'on',
            // )
    );
    return $know_list[$title];
}
$know_list = config_knowlist_default(@$_GET['title']);
if (wp_is_mobile()) {
    $config = array(
        'view_mode' => 'list',
        'start_date' => get_start_date(),
        'end_date' => $end_date,
        'list' => array(
            'place_default' => $place,
            'title' => array(get_keyword(),),
            //'title3' => array($title,),
            'keyword' => $title == "語学学校" ? array('学校セミナー','学校懇談',) :  array($title,),
            //'keyword2' => $title == "語学学校" ? array('学校懇談',) : "",
            'count_field_active' => 'deactive',
            'use_area' => 'on',
        ),
    );
} else {
    $config = array(
        'start_date' => get_start_date(),
        'end_date' => get_end_date(),
        'view_mode' => 'calendar',
        'calendar' => array(
            'place_default' => $place,
            'title' => array(get_keyword(),),
            'title3' => array($title,),
            'know_list'     => array($know_list,$know_list),
            'place_active' => 'deactive',
            'country_active' => 'deactive',
            'know_active' => 'deactive',
            'calendar_icon_active' => 'deactive',
            'count_field_active' => 'deactive',
            'calendar_title_active' => 'deactive',
            'calendar_desc_active' => 'deactive',
            'footer_desc_active' => 'deactive',
            'use_area' => 'on',
        )
    );
}
$sm = new SeminarModule($config);
?>

<div class="underSec seminar">

<?php if (get_seminar_keyvisual()) : ?>
    <div class="keyvisual seminar">
        <p>ワーキングホリデー＆留学フェアのセミナー一覧</p>
        <!--img src="<?php echo get_seminar_keyvisual(); ?>" alt="飛行機"-->
    </div><!-- /.keyvisual -->      
<?php endif;?>

    <!-- ▼ ワーキングホリデー＆留学フェアとは？ ▼ -->      
    <section class="normalBox">
        <h2 class="hukidashi">セミナースケジュール<span>SEMINAR SCHEDULE</span></h2> 

        <div class="contentBox noPad">        
            <p class="planeText mgb20">
                <?php the_seminar_description() ?>
            </p><!-- /.planeText -->
            
            <?php if(!get_seminar_place()): ?>
            <div class="btnArea">
                <p class="mgb10">お近くの会場をクリックしてください。</p>
                <ul>
                    <li><a class="online <?php activePlace("online", $place) ?>" href="<?php queryGen("online", $title) ?>">オンライン会場</a></li>
                    <li><a class="tokyo <?php activePlace("tokyo", $place) ?>" href="<?php queryGen("tokyo", $title) ?>">東京会場</a></li>
                    <li><a class="osaka <?php activePlace("osaka", $place) ?>" href="<?php queryGen("osaka", $title) ?>">大阪会場</a></li>
                </ul><!-- /.areaList -->
                <ul>
                    <li><a class="nagoya <?php activePlace("nagoya", $place) ?>" href="<?php queryGen("nagoya", $title) ?>">名古屋会場</a></li>
                    <li><a class="fukuoka <?php activePlace("fukuoka", $place) ?>" href="<?php queryGen("fukuoka", $title) ?>">福岡会場</a></li>
                </ul><!-- /.areaList -->
            </div><!-- /.btnArea -->
            <?php endif; ?>
            
            <?php if (!is_seminar_category_open()): ?>
                <div class="btnArea2">
                    <p class="mgb10">お好みのセミナーをクリックしてください。</p>
                    <ul>
                        <li><a class="first <?php activeTitle("初心者", $title) ?>" href="<?php queryGen($place, "初心者") ?>">初心者セミナー</a></li>
                        <li><a class="gogaku <?php activeTitle("語学学校", $title) ?>" href="<?php queryGen($place, "語学学校") ?>">語学学校セミナー</a></li>
                    </ul>
                    <ul>
                        <!-- <li><a class="taiken <?php activeTitle("体験談", $title) ?>" href="<?php queryGen($place, "体験談") ?>">体験談セミナー</a></li> -->
                        <li><a class="all <?php if (strlen($title) > 0) echo "off" ?>" href="<?php queryGen($place, "") ?>">全てのセミナー</a></li>
                    </ul>
                </div>
            <?php endif; ?>

            <section class="semListArea">               
                <h3 class="spview"><?php echo getPref($place) ?>会場<span>の</span><?php echo $title ?>セミナー</h3>
                <div class="pcview clearfix">
                    <p class="left"><?php echo getPref($place) ?>会場</p>
                    <p class="right"><?php echo (strlen($title) > 0) ? $title : "全て" ?>のセミナー<span>を表示しています</span></p>
                </div>
                <div id="seminarList">
                <?php $sm->show(); ?> 
                </div>
                <?php
                    if(empty($view) || $view == "")
                    {
                        $next = 20;
                    }
                    else
                    {
                        $next = $view + 10;
                    }
                
                ?>
                <div class="btnShadow2 mgt30 spview"><a id="moreSeminar" class="btn moreView" href="<?php echo get_home_url( $blog_id ).'/seminar/?place='.$place.'&title='.$title.'&view='.$next; ?>"><span>もっと見る</span></a></div>
                <?php  ?>
            </section><!-- /.semListArea -->         
        </div><!-- /.contentBox -->         
    </section><!-- /.normalBpx -->
</div><!-- /.underSec -->
<?php
$date = new DateTime(now);

?>
<section class="normalBox footSec">   
    <script>
        jQuery(document).ready(function ($) {
            $("section.semListArea > div > div").each(function(){
                var date = "<?php echo $date->format(Ymd) ?>";
                if(Number($(this).attr("id")) < Number(date)){
                    $(this).hide();
                }
            });
            var count = $('#seminarList > div:first > div').length;
            var href = $("#moreSeminar").attr("href");
            $("#moreSeminar").attr("href",href+"&cnt="+count);
            console.log("<?php echo $_GET['cnt']; ?>");

            if ("<?php echo $_GET['view']; ?>" == "all"){ 
                var show = "<?php echo $_GET['cnt']; ?>"
                show++;
                var p = $("#seminarList div:nth-child("+show+")").offset().top;
                $('html,body').animate({ scrollTop: p }, 0);
                return false;
                ;}
        });
    </script>    
    <?php get_footer() ?>