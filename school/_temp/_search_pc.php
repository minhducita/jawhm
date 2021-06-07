<div id="maincontent">
               <?php echo $header_obj->breadcrumbs(); ?>
        
    		<section id="schoolSec" class="srcSec">
        
        	<section class="srcBox">
            <h2 class="sec-title">学校紹介特集</h2>
            <div class="country">
              <h3>行きたい国を選ぶ</h3>
              <div class="inList">
                <input type="checkbox" name="country" value="オーストラリア" id="country_Aus" />
                <label for="country_Aus" class="checkbox country_Aus">オーストラリア</label>
                
                <input type="checkbox" name="country" value="カナダ" id="country_Can" />
                <label for="country_Can" class="checkbox country_Can">カナダ</label>
                
                <input type="checkbox" name="country" value="ニュージーランド" id="country_Nez" />
                <label for="country_Nez" class="checkbox country_Nez">ニュージーランド</label>
                
                <input type="checkbox" name="country" value="ヨーロッパ" id="country_Eur" />
                <label for="country_Eur" class="checkbox country_Eur">ヨーロッパ</label>
                
                <input type="checkbox" name="country" value="ワールドワイド" id="country_WW" />
                <label for="country_WW" class="checkbox country_WW">ワールドワイド</label>
                
                <input type="checkbox" name="country" value="アメリカ" id="country_Usa" />
                <label for="country_Usa" class="checkbox country_Usa">アメリカ</label>
              </div><!-- /.inList -->            
            </div><!-- /.country -->
            
            <div class="conditions">
              <h3>条件を選ぶ</h3>
              <div class="moreMenu">
                <dl class="condBox">
                  <dt>受講出来るコース</dt>
                  <dd>
                    <ul>
                    <?php $i = 1; foreach($course_name as $cn) : ?>
                      <li><input type="checkbox" name="course" value="<?php echo $cn; ?>" id="course_<?php echo $i; ?>" /><label for="course_<?php echo $i; ?>" class="checkbox"><?php echo $cn; ?></label></li>
                    <?php $i++; endforeach; ?>
                     </ul>
                  </dd>
                </dl><!-- /.condBox -->
                <dl class="condBox">
                  <dt>取得出来る資格</dt>
                  <dd>
                    <ul>
                    <?php $i = 1; foreach($licence_name as $ln) : ?>
                      <li><input type="checkbox" name="licence" value="<?php echo $ln; ?>" id="licence_<?php echo $i; ?>" /><label for="licence_<?php echo $i; ?>" class="checkbox"><?php echo $ln; ?></label></li>
                    <?php $i++; endforeach; ?>
                    </ul>
                  </dd>
                </dl><!-- /.condBox -->
                <dl class="condBox last">
                  <dt>オススメポイント</dt>
                  <dd>
                    <ul>
                    <?php $i = 1; foreach($point_name as $pn) : ?>
                      <li><input type="checkbox" name="point" value="<?php echo $pn; ?>" id="point_<?php echo $i; ?>" /><label for="point_<?php echo $i; ?>" class="checkbox"><?php echo $pn; ?></label></li>
                    <?php $i++; endforeach; ?>
                    </ul>
                  </dd>
                </dl><!-- /.condBox -->
              </div>
              <div class="link"><a class="check_clear"><span>選択済み前条件をクリア</span></a></div>   
            </div><!-- /.conditions -->
            <form id="school_search" action="" method="GET">
                <input type="hidden" value="" name="countries"> 
                      <input type="hidden" value="" name="courses"> 
                      <input type="hidden" value="" nam e="licences"> 
                      <input type="hidden" value="" name="points"> 
                      <?php if ($preview) {echo '<input type="hidden" value="true" name="preview">'; } ?>
              </form>
            <button id="search_submit" class="Btn"></button>
              
          </section><!-- /.srcBox -->
          
          <section class="pickUpList">
          	<h2 class="sec-title">PICK UP</h2>
            	<?php
            $term_list = array('aus' => 'Aus','can' => 'Can','nz' => 'Nez','en' => 'Eng','usa' => 'Usa','fra' => 'Fra','deu' => 'Deu','ire' => 'Ire','ww' => 'WW');
            $term_list2 = array('aus' => 'Australia','can' => 'Canada','nz' => 'New Zealand','en' => 'England','usa' => 'USA','fra' => 'France','deu' => 'Germany','ire' => 'Ireland','ww' => 'World Wide');
            ?>
          	<table>
          	<?php foreach ($schools as $school) : ?>
            	<tr class="spView flagCell">
              	<td colspan="2">
	                <a href="<?php echo '/school/'.$school['country'].'/'.$get; ?>"><img src="/school/images/search/flag_<?php echo $term_list[$school['country']]; ?>.gif" alt="<?php echo $term_list2[$school['country']]; ?>"> <?php echo $term_list2[$school['country']]; ?></a> <?php echo $school['city']; ?>
               	</td>
              </tr><!-- /.spView -->
            	<tr>
              	<th><img src="/school/images/logo/<?php echo basename($school['logo']); ?>" alt=""></th>
                <td>
	                <a href="<?php echo '/school/'.$school['country'].'/'.$school['nickname'].'/'.$get; ?>"><span><?php echo $school['rubi']; ?></span><?php echo $school['name']; ?></a>
                  <p class="caption">
                  	<?php echo $school['caption'] ?>
                  </p><!-- /.caption -->
                  <ul class="iconList <?php echo $term_list[$school['country']]; ?> pcView">
                  <?php $ps = explode(',',$school['point']); foreach ($ps as $p) : ?>
                  	<?php if ($p) echo '<li>'. $p .'</li>'; else echo '';?>
                  <?php endforeach; ?>
                  </ul><!-- /.iconList -->
                </td>
                <td class="flagCell">                	
                  <a href="<?php if($school['country']=='en'||$school['country']=='fra'||$school['country']=='deu'||$school['country']=='ire') echo '/school/eu/'.$get; else echo '/school/'.$school['country'].'/'.$get; ?>" alt="<?php echo $term_list2[$school['country']]; ?>"><img src="/school/images/search/flag_<?php echo $term_list[$school['country']]; ?>.gif" alt="United Kingdom"><br><?php echo $term_list2[$school['country']]; ?></a> <?php echo $school['city']; ?>
                </td>
              </tr>              
              <tr class="spView">
              	<td colspan="2">
                	<ul class="iconList <?php echo $term_list[$school['country']]; ?>">
                	<?php $ps = explode(',',$school['point']); foreach ($ps as $p) : ?>
                  		<li><?php echo $p; ?></li>
                  	<?php endforeach; ?>
                  </ul><!-- /.iconList -->
                </td>
              </tr><!-- /.spView-->
          <?php endforeach; ?>
            </table>          
        	</section><!-- /.pickUpList -->
          
          <section class="voiceBan">
          	<h2 class="sec-title">留学・ワーホリ経験者からの声</h2>
            <p>
            	各国、語学学校の卒業生さんからの体験談を掲載しています。<br>
              実際に学校で語学を勉強した方々からのメッセージをご覧頂くことができます。<br>
              皆さんの、留学・ワーホリの参考になりますよ。            
            </p>
            <div style="text-align:center;">
              <a href="/school/voice/"><img src="/school/voice/img/govoice_off.gif" alt="留学・ワーホリ経験者からの声"></a>
            </div>
          </section><!-- /.voiceBan -->
          <div class="advbox03" style="margin-top: 0px!important">
              <?php
              // 301
              define('MAX_PATH', '/var/www/html/ad');
              if (@include_once(MAX_PATH . '/www/delivery/alocal.php')) {
              if (!isset($phpAds_context)) {
              $phpAds_context = array();
              }
              // function view_local($what, $zoneid=0, $campaignid=0, $bannerid=0, $target='', $source='', $withtext='', $context='', $charset='')
              $phpAds_raw = view_local('', 215, 0, 0, '', '', '0', $phpAds_context, '');
              }
              echo $phpAds_raw['html'];
              ?>
          </div>         
        </section><!-- /.schoolSec -->        
</div><!-- /.maincontent -->