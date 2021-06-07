{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="staff/index/index">メンバー専用ページトップ</a></li>
  <li>学校セミナー日程提案一覧</li>
</ol>
<div class="page-content">
    <div class="wrapper col-xs-12" style="margin-bottom: 50px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">セミナー日程提案検索</h4>
            </div>

            <div class="panel-body">
                <form id="proposal-search" class="form-horizontal" role="form">
                    <div class="form-group col-xs-6">
                        <label class="col-xs-4 control-label" for="search_decision_flag">決定状態</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="search_decision_flag">
                                <option value="1" {if !isset($search_decision_flag) || $search_decision_flag == 1}}selected{/if}>未決</option>
                                <option value="2" {if $search_decision_flag === 2}selected{/if}>決定</option>
                                <option value="0" {if $search_decision_flag === 0}selected{/if}>取消</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-xs-6">
                        <label class="col-xs-4 control-label" for="search_school_id">学校担当者ID</label>
                        <div class="col-xs-8">
                            <input class="form-control" type="text" name="search_school_id" placeholder="学校担当者ID" value="{$search_school_id}">
                        </div>
                    </div>

                    <div class="form-group col-sm-4 pull-right">
                        <div class="col-xs-12 control-label no-padding-right" style="padding-top: 0px;">
                            <button class="btn btn-sm" type="button" id="proposal_search_reset">
                                <i class="icon-undo bigger-110"></i>
                                リセット
                            </button>
                            <button class="btn btn-sm btn-info" type="button" id="proposal_search">
                                <i class="icon-search bigger-110"></i>
                                検索
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-xs-5"></div>
        <div class="col-xs-2">
            <button class="btn btn-sm btn-success" type="button" id="proposal_seminar_new">
                <i class="icon-pencil bigger-110"></i>
                セミナー日程提案の新規作成
            </button>
        </div>

        <div class="col-xs-5"></div>
        <div class="col-xs-12" style="margin-bottom: 20px"></div>

        <div class="panel panel-primary col-xs-12 kill-rlpadding">
            <div class="panel-heading">
                <h4 class="panel-title">検索結果表示</h4>
            </div>

            <div class="panel-body">
                <div id="proposalsearch">検索結果がここに表示されます。</div>
            </div>
        </div>
    </div>
</div>
{include file=$footer}