{include file=$header}
    <div class="main-content">
        <div id="breadcrumbs" class="breadcrumbs breadcrumbs-fixed">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="school/index/index">{$brd_msg[0].message}</a>
                </li>
                <li class="active">
                    {$brd_msg[1].message}
                </li>
            </ul>
        </div>

        <div class="page-content">
            <div class="wrapper col-xs-12" style="margin-bottom: 50px;">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">{$msg[0].message}</h4>
                    </div>

                    <div class="panel-body">
                        <form id="client-search" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-2" for="search_school_name">{$msg[1].message}</label>
                                <div class="col-xs-12 col-sm-4">
                                    <select class="col-xs-12 kill-padding-left" name="search_school_name">
                                        <option></option>
                                        {if $school_names|@count >= 1}
                                            {foreach item=item from=$school_names}
                                                <option {if $search_school_name == $item.0}selected{/if}>{$item.0}</option>
                                            {/foreach}
                                        {/if}
                                    </select>
                                </div>
                                <label class="col-xs-12 col-sm-2 control-label no-padding-right" for="search_item">{$msg[2].message}</label>
                                <div class="col-xs-12 col-sm-4">
                                    <select class="col-xs-12 kill-padding-left" name="search_item">
                                        <option selected></option>
                                        {if $items|@count >= 1}
                                            {foreach item=item from=$items}
                                                <option {if $search_item == $item.school|cat:':'|cat:$item.item}selected{/if}>{$item.school}:{$item.item}</option>
                                            {/foreach}
                                        {/if}
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-md-2" for="search_entry_status">{$msg[3].message}</label>
                                <div class="col-xs-12 col-md-2">
                                    <select class="col-xs-12 kill-padding-left" name="search_entry_status">
                                        <option value="0" {if $search_entry_status == 0}selected{/if}>{$msg[4].message}</option>
                                        <option value="1" {if $search_entry_status == 1}selected{/if}>{$msg[5].message}</option>
                                        <option value="2" {if $search_entry_status == 2}selected{/if}>{$msg[6].message}</option>
                                    </select>
                                </div>
                                {if $smp == 1}<div class="col-xs-12" style="margin-bottom: 5px;"></div>{/if}
                                <label class="col-xs-12 col-md-2" {if $smp == 1}style="padding-left: 15px;"{/if} for="search_entrance_date">{$msg[7].message}</label>
                                <div id="entrance_date" class="col-xs-12 col-md-4 input-group date">
                                    {if $smp==0}
                                        <input class="col-xs-11 col-md-10" type="date" name="search_entrance_date" placeholder="{$msg[7].message}" value="{$search_entrance_date}">
                                        <span class="input-group-addon col-xs-1 col-md-2 calender-icon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    {else}
                                        <span class="col-xs-7 kill-rlpadding">
                                            <input type="date" name="search_entrance_date" placeholder="{$msg[7].message}" value="{$search_entrance_date}">
                                        </span>
                                        <span class="col-xs-1 kill-rlpadding"> </span>
                                        <span class="col-xs-3 kill-rlpadding">
                                            <select class="kill-padding-left" name="search_entrance_timing" style="height: 27px;">
                                                <option value="0" {if $search_entrance_timing == 0}selected{/if}>{$msg[8].message}</option>
                                                <option value="1" {if $search_entrance_timing == 1}selected{/if}>{$msg[9].message}</option>
                                            </select>
                                        </span>
                                    {/if}
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    {if $smp==0}
                                        <select class="col-xs-12 kill-padding-left" name="search_entrance_timing">
                                            <option value="0" {if $search_entrance_timing == 0}selected{/if}>{$msg[8].message}</option>
                                            <option value="1" {if $search_entrance_timing == 1}selected{/if}>{$msg[9].message}</option>
                                        </select>
                                    {/if}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-2" for="search_name">{$msg[10].message}</label>
                                <div class="col-xs-12 col-sm-2">
                                    <input class="col-xs-12 col-sm-12" type="text" name="search_name" placeholder="{$msg[10].message}" value="{$search_name}">
                                </div>
                                <label class="col-xs-12 col-md-2" for="search_week">{$msg[11].message}</label>
                                <div class="col-nd-12 col-md-2">
                                    <input class="col-xs-12 col-sm-12" type="text" name="search_week" placeholder="{$msg[11].message}" value="{$search_week}">
                                </div>
                                {if $smp == 1}<div class="col-xs-12" style="margin-bottom: 5px;"></div>{/if}
                                <div class="col-sm-4 pull-right">
                                    <div class="col-xs-12 control-label no-padding-right" style="padding-top: 0px;">
                                        <button class="btn btn-sm" type="button" id="client_search_reset">
                                            <i class="icon-undo bigger-110"></i>
                                            {$msg[12].message}
                                        </button>
                                        <button class="btn btn-sm btn-info" type="button" id="client_search">
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
                        <div id="clientsearch">{$rst_msg[1].message}</div>
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
            $('#entrance_date').datetimepicker({
                language: lang,
                format: 'yyyy-mm-dd',
                pickTime: false
            }).on('changeDate', function(ev){
                $(this).datetimepicker('hide');
            });
        }
        $('#entrance_date').removeClass('input-group', 'date');

    </script>
{include file=$footer}