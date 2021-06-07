<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">住所情報登録</h4>
    </div>

    <div class="modal-body">
        <form id="address-edit" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="zip" class="col-sm-4 control-label">郵便番号</label>
                    <div class="col-sm-8">
                        <input id="zip" class="form-control" type="text" name="zip" size="20" value="{$address.2}" autofocus onkeyup="AjaxZip2.zip2addr(this,'add1','add2',null,'add2');">
                    </div>
                </div>

                <div class="form-group">
                       <label for="add1" class="col-sm-4 control-label">都道府県</label>
                       <div class="col-sm-8">
                       <input id="add1" class="form-control" type="text" name="add1" size="20" value="{$address.3}">
                    </div>
                </div>

                <div class="form-group">
                       <label for="add2" class="col-sm-4 control-label">市群区</label>
                       <div class="col-sm-8">
                       <input id="add2" class="form-control" type="text" name="add2" size="20" value="{$address.4}">
                    </div>
                </div>

                <div class="form-group">
                       <label for="add3" class="col-sm-4 control-label">町村</label>
                       <div class="col-sm-8">
                       <input id="add3" class="form-control" type="text" name="add3" size="20" value="{$address.5}">
                    </div>
                </div>

                <div class="form-group">
                       <label for="add4" class="col-sm-4 control-label">番地その他</label>
                       <div class="col-sm-8">
                       <input id="add4" class="form-control" type="text" name="add4" size="20" value="{$address.6}">
                    </div>
                </div>

                <div class="form-group">
                       <label for="devision" class="col-sm-4 control-label">登録先</label>
                       <div class="col-sm-8">
                           <select class="form-control" name="devision">
                            <option value="0">現住所</option>
                            <option value="1" {if $address.7 === '実家'}selected{/if}>実家</option>
                            <option value="2" {if $address.7 === '留学先'}selected{/if}>留学先</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                       <label for="tel" class="col-sm-4 control-label">電話番号</label>
                       <div class="col-sm-8">
                       <input class="form-control" type="tel" name="tel" size="20" value="{$address.1}">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="address">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="address_edit" type="button" class="btn btn-primary">送信</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script charset="UTF-8" src="themes/js/ajaxzip2/ajaxzip2.js"></script>