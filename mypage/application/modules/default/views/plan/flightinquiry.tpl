<div class="modal-content window-container">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">フライト見積問合せ</h4>
    </div>

    <div class="modal-body">
        <form id="inquiry-confirm" method="post">
            <fieldset>
                <h3>本人情報</h3>
                <div class="form-group">
                    <label for="name_jp" class="col-sm-4 control-label">お名前(日本語)</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="name_jp" size="20" value="{$item.name_jp}" autofocus">
                    </div>
                </div>

                <div class="form-group">
                   <label for="name_en" class="col-sm-4 control-label">お名前(英語)</label>
                   <div class="col-sm-8">
                       <input class="form-control" type="text" name="name_en" size="20" value="{$item.name_en}">
                       <div class="help-block">※パスポートのスペルとよく確認してください。</div>
                    </div>
                </div>

                <div class="form-group">
                   <label for="tel" class="col-sm-4 control-label">携帯電話番号</label>
                   <div class="col-sm-8">
                       <input class="form-control" type="tel" name="tel" size="20" value="{$item.tel}">
                    </div>
                </div>

                <div class="form-group">
                       <label for="email" class="col-sm-4 control-label">PCメールアドレス</label>
                       <div class="col-sm-8">
                       <input class="form-control" type="email" name="email" size="20" value="{$item.email}">
                    </div>
                </div>

                <div class="form-group">
                   <h3>渡航先</h3>

                   <label for="email" class="col-sm-4 control-label">渡航予定日</label>
                   <div class="col-sm-8 input-group date" id="flight_date" style="width: 342px; left: 15px;">
                        <input type='date' class="form-control" name="flight_date" value="{$item.flight_date}" />
                        <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                   <label for="departure_place" class="col-sm-4 control-label">出発地情報</label>
                   <div class="col-sm-8">
                       <input id="text1" class="form-control" type="text" name="departure_place" size="20" value="{$item.departure_place}">
                       <div id="suggest1" style="display:none;"></div>
                       <div class="help-block">東京等</div>
                    </div>

                    <label for="destination_place" class="col-sm-4 control-label">到着地情報</label>
                    <div class="col-sm-8">
                       <input id="text2" class="form-control" type="text" name="destination_place" size="20" value="{$item.destination_place}">
                       <div id="suggest2" style="display:none;"></div>
                       <div class="help-block">シドニー等</div>
                    </div>

                    <label for="ticket_request" class="col-sm-4 control-label checkbox-inline">片道・往復リクエスト</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="ticket_request">
                            <option value="1" {if $item.ticket_request == 1}selected{/if}>片道</option>
                            <option value="2" {if $item.ticket_request == 2}selected{/if}>往復</option>
                        </select>
                    </div>

                    <label for="plan_request" class="col-sm-4 control-label checkbox-inline">プランリクエスト</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="plan_request">
                            <option value="1" {if $item.plan_request == 1 || !isset($item.plan_request)}selected{/if}>安さ重視</option>
                            <option value="2" {if $item.plan_request == 2}selected{/if}>直行便希望</option>
                            <option value="3" {if $item.plan_request == 3}selected{/if}>両方</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                   <label for="visa_type" class="col-sm-4 control-label">ビザタイプ</label>
                   <div class="col-sm-8">
                       <select class="form-control" name="visa_type">
                            <option value="1" {if $item.visa_type == 1}selected{/if}>ワーキングホリデービザ</option>
                            <option value="2" {if $item.visa_type == 2}selected{/if}>学生ビザ</option>
                            <option value="3" {if $item.visa_type == 3}selected{/if}>観光ビザ</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="age" class="col-sm-4 control-label">渡航時の年齢</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="number" name="age" size="20" value="{$item.age}">
                    </div>
                </div>

                <div class="form-group">
                      <div class="pull-right col-sm-2">
                          <input type="reset" class="btn btn-warning" value="リセット">
                      </div>
                </div>
                   <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="inquiry">
                <input type="hidden" name="id" value="{$item.mypage_flight_inquiry_id}">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="inquiry_confirm" type="button" class="btn btn-primary">確認画面</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
    </div>
</div>
<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
<script type="text/javascript" src="themes/js/moment.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
<script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
<script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
<script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
<script type="text/javascript" src="themes/js/suggestjp.js"></script>
<script type="text/javascript" src="themes/js/modal.js"></script>
<script>
var smp = {$smp};
if (smp == 0) {
    $(function () {
        $('#flight_date').datetimepicker({
            language: 'ja',
            format: 'yyyy-mm-dd',
            pickTime: false
        }).on('changeDate', function(ev){
            $(this).datetimepicker('hide');
        });
    });
}

var base = '{$base}/mypage';
{literal}
    $(function(){
           new Suggest.Local(
              "text1",
              "suggest1",
              "候補:"+[],
              {
                highlight: true,
                hookBeforeSearch: function(text) {
                    var self = this;
                     $.post(base+"/plan/suggestion",
                        {inp:text},
                        function(data, status){
                               if(status == 'success' && data){
                                  self.clearSuggestArea();
                                  self.candidateList = eval(data);

                                  // init
                                  textJP = new Array();

                                  // get array number
                                  var row = 0;
                                  for (i in self.candidateList) {
                                      row++;
                                  }

                                  for (var i=0; i<row; i++) {
                                      textJP[i] = self.candidateList[i].substring(3);
                                  }

                                  var resultList = self._search(textJP);
                                  if (textJP.length != 0){
                                     self.createSuggestArea(textJP);
                                  }
                                  return false;
                               }
                        }
                     );
                }
              }
        );
    });

    $(function(){
        new Suggest.Local(
           "text2",
           "suggest2",
           [],
           {
             highlight: true,
             hookBeforeSearch: function(text) {
                 var self = this;
                  $.post(base+"/plan/suggestion",
                     {inp:text},
                     function(data, status){
                         if(status == 'success' && data){
                            self.clearSuggestArea();
                            self.candidateList = eval(data);

                            // init
                            textJP = new Array();

                            // get array number
                            var row = 0;
                            for (i in self.candidateList) {
                                row++;
                            }

                            for (var i=0; i<row; i++) {
                                textJP[i] = self.candidateList[i].substring(3);
                            }

                            var resultList = self._search(textJP);
                            if (textJP.length != 0){
                               self.createSuggestArea(textJP);
                            }
                            return false;
                         }
                     }
                  );
             }
           }
     );
 });
{/literal}
</script>