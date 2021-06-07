{include file=$header}
<ul class="breadcrumb">
    <li><a href="{$base}/mypage/staff/index/index">スタッフ用トップページ</a></li>
    <li>お客様ファイル管理</li>
</ul>


<div class="wrapper col-xs-12">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">ファイル操作</h4>
            </div>

            <div class="panel-body">
                <button id="client_upload" class="btn btn-warning">お客様にファイルを送る</button>
                <button id="file_upload" class="btn btn-info">学校にファイルを送る</button>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">お客様関連ファイル</h4>
            </div>
            <div class="panel-body">
                <ul class="list-group col-xs-12" style="margin-bottom:0; padding-right:0;">
                    {if $items|@count >= 1}
                        {foreach item=item from=$items}
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        種別:
                                        <span class="text-bold text-italic">
                                            {$i = 0}
                                            {foreach item=m from=$msg}
                                                {if $item.class == $m.file_class}
                                                    {break}
                                                {else}
                                                    {$i = $i + 1}
                                                {/if}
                                            {/foreach}
                                            {$msg[$i].message}
                                            {if $item.client_perusal == 1}
                                                <span class="alert-info-custom space-left">お客様閲覧可</span>
                                            {/if}
                                            {if $item.school_perusal == 1}
                                                <span class="alert-warning-custom space-left">学校覧可</span>
                                            {else if $item.class == 94}
                                                <button id="applyschool_{$item.branch_no}_{$item.file_name}" class="btn btn-success space-left">学校閲覧可能にする</button>
                                            {/if}
                                        </span>
                                    </div>
                                </div>
                                <div class="panel-body" style="padding-bottom:0;">
                                    <ul class="list-group col-xs-12">
                                        <li class="list-group-item inc-line">
                                            <span class="col-xs-4">ファイル名</span>
                                            <span class="col-xs-8"><a id="getfile_{$item.branch_no}_{$item.file_name}" target="_blank">{$item.file_name}</a></span>
                                        </li>
                                        <li class="list-group-item inc-line">
                                            <span class="col-xs-4">アップロード日時</span>
                                            <span class="col-xs-8">{$item.insert_date|date_format:"%G-%m-%d %H:%M:%S"}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        {/foreach}
                    {else}
                        現在、お客様関連ファイルはありません。
                    {/if}
                </ul>
            </div>

        </div>
    </div>
</div>
{include file=$footer}