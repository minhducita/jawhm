<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">ステップチャート詳細情報編集</h4>
    </div>
    <div class="modal-body">
        <form id="edit-stepchart">
            <fieldset>
                <div class="form-group">
                       <label for="separate_flag" class="col-sm-4 control-label radio-inline">詳細フラグ</label>
                       <div class="col-sm-8">
                           <label class="radio-inline">
                            <input type="radio" name="separate_flag" value="0" {if $item.separate_flag == '0'}checked{/if}>  なし
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="separate_flag" value="1" {if $item.separate_flag == '1'}checked{/if}> あり
                        </label>
                    </div>
                </div>

                <div class="form-group">
                       <label for="subtitle_flag" class="col-sm-4 control-label radio-inline">副題フラグ</label>
                       <div class="col-sm-8">
                           <label class="radio-inline">
                            <input type="radio" name="subtitle_flag" value="0" {if $item.subtitle_flag == 0}checked{/if}>なし
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="subtitle_flag" value="1" {if $item.subtitle_flag == 1}checked{/if}> あり
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="flight_flag" class="col-sm-4 control-label radio-inline">航空券見積ボタン可視</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="flight_flag" value="0" {if $item.flight_flag == 0}checked{/if}> なし
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="flight_flag" value="1" {if $item.flight_flag == 1}checked{/if}> あり
                        </label>
                    </div>
                </div>

                <div class="form-group">
                       <label for="detail_flag" class="col-sm-4 control-label radio-inline">詳細ボタン可視</label>
                       <div class="col-sm-8">
                           <label class="radio-inline">
                            <input type="radio" name="detail_flag" value="0" {if $item.detail_flag == 0}checked{/if}> なし
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="detail_flag" value="1" {if $item.detail_flag == 1}checked{/if}> あり
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="separate_number" class="col-sm-4 control-label radio-inline">詳細ページ番号</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="separate_number" value="{$item.separate_number}">
                    </div>
                </div>

                <div class="form-group">
                       <label for="comment_content" class="col-sm-4 control-label">ステップチャート文言</label>
                       <div class="col-sm-8">
                         <textarea class="form-control" name="description" rows="5">{$item.description nofilter}</textarea>
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-4">
                           現在の文字数: <span class="count">0</count>
                      </div>
                </div>

                <div class="form-inline">
                      <input type="reset" class="btn btn-warning pull-right {if $smp == false}rstbtn-toppad{/if}" value="リセット">
                </div>

                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="stepchart">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="edit_stepchart" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>
<script>
    var thisValueLength = $('*[name=description]').val().length;
    $('.count').html(thisValueLength);
</script>