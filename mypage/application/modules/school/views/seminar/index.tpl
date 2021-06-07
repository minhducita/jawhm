{include file=$header}
    <div class="main-content">
        <div id="breadcrumbs" class="breadcrumbs breadcrumbs-fixed">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="school/index/index">{$brd_msg[0].message}</a>
                </li>
                <li class="active">
                    {$brd_msg[4].message}
                </li>
            </ul>
        </div>

        <div class="page-content">
            <div class="wrapper" style="margin-bottom: 50px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">{$msg[0].message}</h4>
                    </div>

                    <div class="panel-body">
                        <form id="seminar-search" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-xs-3 col-sm-1 control-label no-padding-right" for="search_school_name">{$msg[1].message}</label>
                                <div class="col-xs-9 col-sm-5">
                                    <select class="col-xs-12" name="search_school_name" style="padding-left: 0;">
                                        {if $school_names|@count >= 1}
                                            {foreach item=item from=$school_names}
                                                <option {if $search_school_name == $item.school_name}selected{/if}>{$item.school_name}</option>
                                            {/foreach}
                                        {/if}
                                    </select>
                                </div>
                                <label class="col-xs-3 col-md-1 control-label no-padding-right" for="search_place">{$msg[2].message}</label>
                                <div class="col-xs-9 col-md-2">
                                    <select class="col-xs-12" name="search_place" style="padding-left: 0;">
                                        <option value="tokyo" {if $search_place === 'tokyo'}selected{/if}>{$msg[3].message}</option>
                                        <option value="osaka" {if $search_place === 'osaka'}selected{/if}>{$msg[4].message}</option>
                                        <option value="nagoya" {if $search_place === 'nagoya'}selected{/if}>{$msg[5].message}</option>
                                        <option value="fukuoka" {if $search_place === 'fukuoka'}selected{/if}>{$msg[6].message}</option>
                                        <option value="okinawa" {if $search_place === 'okinawa'}selected{/if}>{$msg[7].message}縄</option>
                                        <option value="kyoto" {if $search_place === 'kyoto'}selected{/if}>{$msg[8].message}</option>
                                        <option value="oomiya" {if $search_place === 'oomiya'}selected{/if}>{$msg[9].message}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 col-sm-1 control-label no-padding-right" for="search_start_date">{$msg[10].message}</label>
                                <div id="search_start_date" class="col-xs-9 col-sm-3 input-group date">
                                    {if $smp==0}
                                        <input class="col-xs-10 col-md-8" type="date" name="search_start_date" placeholder="{$msg[10].message}" value="{$search_start_date}">
                                        <span class="input-group-addon col-xs-1 col-md-3" {if $smp == 0}style="padding-bottom: 4px; padding-left: 0px; padding-right: 0px; width: 25px;"{else}style="padding-bottom: 4px; padding-left: 0px; padding-right: 0px; width: 24px;border-right-width: 0px;"{/if}>
                                            <span class="glyphicon glyphicon-calendar" {if $smp == 1}style="height: 21px;"{/if}>
                                        </span>
                                    {else}
                                        <span class="col-xs-12 kill-rlpadding">
                                            <input class="col-xs-12" type="date" name="search_start_date" placeholder="{$msg[10].message}" value="{$search_start_date}">
                                        </span>
                                    {/if}
                                </div>

                                {if $smp == 1}<div class="col-xs-12"></div>{/if}

                                <label class="col-xs-3 col-sm-1 control-label no-padding-right" for="search_name">{$msg[11].message}</label>
                                <div id="search_end_date" class="col-xs-9 col-sm-3 input-group date">
                                   {if $smp==0}
                                            <input class="col-xs-10 col-md-8" type="date" name="search_end_date" placeholder="{$msg[11].message}" value="{$search_end_date}">
                                            <span class="input-group-addon col-xs-1 col-md-3"{if $smp == 0}style="padding-bottom: 4px; padding-left: 0px; padding-right: 0px; width: 25px;"{else}style="padding-bottom: 4px; padding-left: 0px; padding-right: 0px; width: 24px;border-right-width: 0px;"{/if}>
                                                <span class="glyphicon glyphicon-calendar" {if $smp == 1}style="height: 21px;"{/if}></span>
                                            </span>
                                    {else}
                                        <span class="col-xs-12 kill-rlpadding">
                                            <input class="col-xs-12" type="date" name="search_end_date" placeholder="{$msg[11].message}" value="{$search_end_date}">
                                        </span>
                                    {/if}
                                </div>
                                <div class="col-sm-4 pull-right">
                                    <div class="col-xs-12 control-label no-padding-right" style="padding-top: 0px;">
                                        <button class="btn btn-sm" type="button" id="seminar_search_reset">
                                            <i class="icon-undo bigger-110"></i>
                                            {$msg[12].message}
                                        </button>
                                        <button class="btn btn-sm btn-info" type="button" id="seminar_search">
                                            <i class="icon-search bigger-110"></i>
                                            {$msg[13].message}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">{$rst_msg[0].message}</h4>
                    </div>

                    <div class="panel-body">
                        <div id="seminarsearch">{$rst_msg[1].message}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/moment.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
<script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
<script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
<script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
<script>
    var school_name = "{$school_names[0]['school_name']}";
    var lang = '{$lang}';
    var smp = {$smp};

    if (lang === 'ja') {
        year = '年';
        month = '月';
        date = '日';
    } else {
        year = 'year';
        month = 'month';
        date = 'date';
    }

    if (smp == 0) {
        $('#search_start_date').datetimepicker({
            language: lang,
            format: 'yyyy-mm-dd',
            pickTime: false
        }).on('changeDate', function(ev){
            $(this).datetimepicker('hide');
        });

        $('#search_end_date').datetimepicker({
            language: lang,
            format: 'yyyy-mm-dd',
            pickTime: false
        }).on('changeDate', function(ev){
            $(this).datetimepicker('hide');
        });
    }
</script>
{include file=$footer}