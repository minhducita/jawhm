{include file=$header}
            <div class="main-content">
                <div id="breadcrumbs" class="breadcrumbs breadcrumbs-fixed">
                    <ul class="breadcrumb">
                        <li class="active">
                            <i class="icon-home home-icon"></i>
                            <a href="school/index/index">{$brd_msg[0].message}</a>
                        </li>
                    </ul>
                </div>

                <div class="page-content">
                    <div class="col-xs-12 col-md-3"></div>
                    <div class="col-xs-12 col-md-7" style="margin-top: 5px; margin-bottom: 10px;">
                        <span class="smp-logo col-xs-12 col-md-5">
                            {if $school_name === "BLOOMSBURY"} <img src="themes/images/school/BLOOMSBURY.jpg" alt="ブルームスベリー">
                            {else if $school_name === "BROWNS"} <img src="themes/images/school/BROWNS.jpg" alt="ブラウンズ">
                            {else if $school_name === "CCEL"} <img src="themes/images/school/CCEL.jpg" alt="シーシーイーエル">
                            {else if $school_name === "CORNERSTONE"} <img src="themes/images/school/CORNERSTONE.jpg" alt="コーナーストーン">
                            {else if $school_name === "EUROCENTRES"} <img src="themes/images/school/EUROCENTRES.jpg" alt="ユーロセンター">
                            {else if $school_name === "FUSION"} <img src="themes/images/school/FUSION.jpg" alt="フュージョン">
                            {else if $school_name === "GREENWICH"} <img src="themes/images/school/GREENWICH.jpg" alt="グリニッジ">
                            {else if $school_name === "ICQA"} <img src="themes/images/school/ICQA.jpg" alt="アイシーキューエー">
                            {else if $school_name === "IHSYDNEY"} <img src="themes/images/school/IHSYDNEY.jpg" alt="アイエイチシドニー">
                            {else if $school_name === "IHVANCOUVER"} <img src="themes/images/school/IHVANCOUVER.jpg" alt="アイエイチバンクーバー">
                            {else if $school_name === "ILAC"} <img src="themes/images/school/ILAC.jpg" alt="アイラック">
                            {else if $school_name === "ILSC"} <img src="themes/images/school/ILSC.jpg" alt="アイエルエスシー">
                            {else if $school_name === "IMPACT"} <img src="themes/images/school/IMPACT.jpg" alt="インパクト">
                            {else if $school_name === "INFORUM"} <img src="themes/images/school/INFORUM.jpg" alt="インフォーラム">
                            {else if $school_name === "KGIC"} <img src="themes/images/school/KGIC.jpg" alt="ケージーアイシー">
                            {else if $school_name === "NAVITAS"} <img src="themes/images/school/NAVITAS.jpg" alt="ナビタス">
                            {else if $school_name === "NZLC"} <img src="themes/images/school/NZLC.jpg" alt="エヌゼットエルシー">
                            {else if $school_name === "PGIC"} <img src="themes/images/school/PGIC.jpg" alt="ピージーアイシー">
                            {else if $school_name === "QUEST"} <img src="themes/images/school/QUEST.jpg" alt="クエスト">
                            {else if $school_name === "SELC"} <img src="themes/images/school/SELC.jpg" alt="セルク">
                            {else if $school_name === "UMC"} <img src="themes/images/school/UMC.jpg" alt="ユーエムシー">
                            {else if $school_name === "VIVA"} <img src="themes/images/school/VIVA.jpg" alt="ビバ">
                            {else if $school_name === "ABC"} <img src="themes/images/school/ABC.jpg" alt="エービーシー">
                            {else}<img src="themes/images/bumkun/blue/1.png" alt="ばむくん" id="bum_click">
                            {/if}
                        </span>
                        <span class="welcome-font col-xs-12 col-md-7">Welcome! {$school_name}!</span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-2"></div>

                <div class="col-xs-12"></div>
                <div class="col-xs-12 col-md-1"></div>
                <div class="col-xs-12 col-md-5" {if $smp == 0}style="padding-right: 5px;"{/if}>
                    <div {if $smp == 0}style="padding-right: 5px;"{/if}>
                        <div class="panel panel-primary" style="margin-bottom: 0;">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    {$msg[0].message}
                                    <a id="changecomment_new" class="create"><span class="pull-right"><i class="icon-pencil"></i><span class="white-space">{$msg[1].message}</span></span></a>
                                </h4>
                            </div>
                        </div>

                        <ul id="contactreload" class="list-group">
                            {$i = 0}
                            {if $message|@count > 0}
                                {foreach item=item from=$message}
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{$i}" class="list-group-item mes" id="inc-contact_{$i}" style="padding-top: 5px;">
                                        {$item.sender_id}
                                        <span class="wihte-space"></span>-<span class="wihte-space"></span>
                                        {$item.updated_on|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message} %d{$head_msg[3].message} %H:%M"}{if $item.updated_on|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message} %d{$head_msg[3].message} %H:%M:%S" > $last_login|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message} %d{$head_msg[3].message} %H:%M:%S"}<span class="badge pull-right">new</span>{/if}
                                        <br />
                                        <span id="height_{$i}" class="col-xs-12">
                                            <span class="col-xs-3">
                                                {if $item.sender_id === "JAWHM"}<img id="icon_{$i}" class="client-size" src="themes/images/jawhmicon.png">{else}<img id="icon_{$i}" class="client-size" src="{$logo}">{/if}
                                            </span>
                                            <span class="col-xs-9">
                                                <span id="comment{$i}" class="main-containts">{$item.comment}</span><br />
                                                <span class="pull-right">
                                                    {if $item.sender_id === $school_id}
                                                        <span id="changecomment_{$item.mypage_school_contact_id}" class="link-color"><i class="icon-pencil"></i>{$msg[2].message}</span><span class="white-space"></span><span id="deletecomment_{$item.mypage_school_contact_id}_{$item.updated_on}" class="link-color"><i class="icon-trash link-color"></i>{$msg[3].message}</span>
                                                    {else}
                                                        <span id="changecomment_new" class="link-color"><i class="icon-reply"></i>{$msg[4].message}</span>
                                                    {/if}
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                    <span id="collapse_{$i}" class="panel-collapse collapse append-color">
                                        <div class="append-size">
                                            <span class="col-xs-2"><img class="client-size" src="{$logo}"></span>
                                            <div id="contact_comment_{$i}"></div>
                                        </div>
                                    </span>
                                    {$i = $i + 1}
                                {/foreach}
                                <a href="school/talk/index" class="list-group-item mes" style="padding-top: 5px;">
                                    <span class="link-color">{$msg[5].message}</span>
                                </a>
                             {else}
                                <li class="list-group-item inc-btn">
                                    {$msg[18].message}
                                </li>
                             {/if}
                        </ul>
                    </div>
                </div>

                <div class="col-xs-12 col-md-5">
                    <div {if $smp == 0}style="margin-left: -5px;"{/if}>
                        <h4 class="panel panel-primary" style="margin-top:0px; margin-bottom: 0px;">
                            <a data-toggle="collapse" data-parent="#accordion" class="list-group-item active">{$msg[6].message}</a>
                        </h4>
                        <span id="collapse_1" class="panel-collapse collapse in">
                            <ul class="list-group" style="margin-bottom: 0;">
                            {if $seminar|@count > 0}
                            {$n = 0}
                                {foreach item=item from=$seminar}
                                    <li class="list-group-item inc-btn" style="background-color: #e5f2f7;">
                                        <span class="col-xs-3 kill-rlpadding">{$msg[7].message}</span>
                                        <span class="col-xs-6 kill-rlpadding">{$item.starttime|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message}%H:%M"}～</span>
                                        <span class="col-xs-3 pull-right kill-rlpadding"><span id="showseminar_{$item.id}" class="clickable"><span class="glyphicon glyphicon-list-alt"></span><span class="white-space">{$msg[8].message}</span></span>
                                    </li>
                                    <li id="inc-contact{$i}" class="list-group-item">
                                        <span class="col-xs-3 kill-rlpadding">{$msg[9].message}</span>
                                        <span id="comment{$i}" class="col-xs-9">{$item.k_title1|strip_tags:false}</span>
                                    </li>
                                    <li class="list-group-item inc-btn">
                                        <span class="col-xs-3 kill-rlpadding">{$msg[10].message}</span>
                                        <span class="col-xs-3 kill-rlpadding">{$item.place}</span>
                                        <span class="col-xs-3 kill-rlpadding">{$msg[11].message}</span>
                                        <span class="col-xs-3 kill-rlpadding">{if isset($join_number[$n].number)}{$join_number[$n].number}{else}0{/if}{$msg[21].message}</span>
                                    </li>
                                    {$n = $n + 1}
                                    {$i = $i +1}
                                {/foreach}
                                {* pagination links *}
                                <li class="text-center">
                                    {$pages2.firstItemNumber} to {$pages2.lastItemNumber} of {$pages2.totalItemCount}<br />
                                    <ul class="pagination">
                                        {if $pages2.current != $pages2.first}
                                            <li><a href="school/index?page2={$pages2.first}"> &lt;&lt; </a>
                                        {/if}

                                        {if isset($pages2.previous)}
                                            <li><a href="school/index?page2={$pages2.previous}"> &lt; </a></li>
                                        {/if}

                                        {foreach item=p from=$pages2.pagesInRange}

                                            {if $pages2.current == $p}
                                                <li><span>{$p|escape}</span></li>
                                            {else}
                                                <li><a href="school/index?page2={$p}"> {$p} </a></li>
                                            {/if}
                                        {/foreach}

                                        {if isset($pages2.next)}
                                            <li><a href="school/index?page2={$pages2.next}"> &gt; </a></li>
                                        {/if}

                                        {if $pages2.current != $pages2.last}
                                            <li><a href="school/index?page2={$pages2.last}"> &gt;&gt; </a></li>
                                        {/if}
                                    </ul>
                                </li>
                                {* pagination links *}
                            {else}
                                <li class="list-group-item inc-btn">
                                    {$msg[19].message}
                                </li>
                            {/if}
                        </ul>
                    </span>
                </div>
            </div>
            <div class="col-xs-12" style="margin-bottom: 15px;"></div>

                <div class="col-xs-12 col-md-1"></div>
                <div class="col-xs-12 col-md-10" {if $smp == 0}style="padding-right: 30px;"{/if}>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">{$msg[12].message}</h4>
                        </div>

                        <div class="panel-body">
                            <ul class="list-group" {if $smp == 0}style="margin-bottom: 0;"{/if}>
                                {if $student|@count > 0}
                                    {$no = $pages.firstItemNumber}
                                    {$m = 0}
                                    {foreach item=item from=$student}
                                        <div id="client_{$m}" class="panel panel-success col-xs-12 col-md-6" style="padding-left:0; padding-right:0;">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    {$msg[13].message}No: {$no} {$item.5}
                                                    <span class="pull-right"><span id="showdetails_{$item.study_abroad_no}_{$item.school_no}" class="clickable"><span class="glyphicon glyphicon-list-alt"></span>{if $smp == 0}<span class="white-space">{$msg[14].message}</span>{/if}</span>
                                                </h4>
                                            </div>

                                            <div class="panel-body" style="margin-bottom: 30px;">
                                                <span id="collapse_1" class="panel-collapse collapse in">
                                                    <ul class="list-group" style="margin-bottom: 0;">
                                                        <li class="list-group-item inc-btn">
                                                            <span class="col-xs-3 kill-rlpadding">{$msg[15].message}</span>
                                                            <span class="col-xs-9">{$item.6} {$item.7}</span>
                                                        </li>
                                                        <li class="list-group-item inc-btn">
                                                            <span class="col-xs-3 kill-rlpadding">{$msg[16].message}</span>
                                                            <span class="col-xs-9">{$item.entrance_date|date_format:"%G{$head_msg[1].message}%m{$head_msg[2].message}%d{$head_msg[3].message}"}</span>
                                                        </li>
                                                        <li id="inc-course_{$m}" class="list-group-item"><span class="col-xs-3 kill-rlpadding">{$msg[17].message}</span>
                                                            <span id="course_{$m}" class="col-xs-6">{$item.memo}</span>
                                                            <span class="col-xs-3">{$item.weeks} Weeks</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            {$no = $no + 1}
                                            {$m = $m + 1}
                                        {/foreach}
                                        {if $m % 2 != 0}<div class="col-xs-12 col-md-6"></div>{/if}
                                        <div class="col-xs-12"></div>
                                        {* pagination links *}
                                        <div class="text-center col-xs-12">
                                            {$pages.firstItemNumber} to {$pages.lastItemNumber} of {$pages.totalItemCount}<br />
                                            <ul class="pagination">
                                                {if $pages.current != $pages.first}
                                                    <li><a href="school/index?page={$pages.first}"> &lt;&lt; </a>
                                                {/if}

                                                {if isset($pages.previous)}
                                                    <li><a href="school/index?page={$pages.previous}"> &lt; </a></li>
                                                {/if}

                                                {foreach item=p from=$pages.pagesInRange}

                                                    {if $pages.current == $p}
                                                        <li><span>{$p|escape}</span></li>
                                                    {else}
                                                        <li><a href="school/index?page={$p}"> {$p} </a></li>
                                                    {/if}
                                                {/foreach}

                                                {if isset($pages.next)}
                                                    <li><a href="school/index?page={$pages.next}"> &gt; </a></li>
                                                {/if}

                                                {if $pages.current != $pages.last}
                                                    <li><a href="school/index?page={$pages.last}"> &gt;&gt; </a></li>
                                                {/if}
                                            </ul>
                                        </div>
                                        {* pagination links *}
                                    {else}
                                        <li class="list-group-item inc-btn">
                                            {$msg[20].message}
                                        </li>
                                    {/if}
                                </ul>
                            </span>
                        </div>

                    </div>
                </div>
                <div class="col-xs-1"></div>
        <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="themes/data/bumdata.json"></script>
        <script>
                bum  = {$bum};
        </script>

{include file=$footer}
