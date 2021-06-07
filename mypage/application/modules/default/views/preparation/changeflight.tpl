{include file=$header}
<div id="editflight" class="page-content">
    <div class="col-xs-12" style="margin-bottom: 20px; padding-left: 0;">
        <a href="preparation/flightlist" class="btn btn-primary">前の画面に戻る</a>
    </div>

    <div class="page-header">
        <h1>
            フライト情報登録
            <small>
                <i class="icon-double-angle-right"></i>
                フライト情報のご入力とチケットの画像をご登録ください。
            </small>
        </h1>
    </div>
    <div class="col-xs-12 col-md-2"></div>
    <div class="col-xs-12 col-md-6">
        <form id="flight-edit" class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-xs-4" for="flight_number">便名</label>
                <div class="col-xs-8">
                    <input class="form-control ime-disabled" type="text" name="flight_number" size="20" value="{$item.flight_number}" autofocus>
                    <div class="help-block">JQ123等</div>
                </div>
            </div>

            <div class="form-group">
                <label for="departure_place" class="col-xs-4"  for="departure_place">出発地</label>
                <div class="col-xs-8">
                    <input class="form-control ime-disabled" type="text" id="text1" name="departure_place" value="{$item.departure_place}" size="20">
                    <div class="help-block">TOKYO等</div>
                    <div id="suggest1"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="departure_time" class="col-xs-4 input-append date" for="departure_time">出発日時</label>
                <div class="col-xs-8">
                    <div {if $smp==0}class="input-group date" id="departure_time"{/if}>
                        <input type="{if $smp==0}text{else}datetime-local{/if}" class="form-control" name="departure_time" value="{$item.departure_time|date_format:"%G-%m-%d %H:%M"}" />
                        {if $smp==0}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        {/if}
                    </div>
                </div>
            </div>

            <div class="form-group">
                   <label for="destination_place" class="col-xs-4" for="destination_place">到着地</label>
                   <div class="col-xs-8">
                       <input class="form-control ime-disabled" type="text" id="text2" name="destination_place" class="ime-disabled" value="{$item.destination_place}" size="20">
                       <div class="help-block">Cairns等</div>
                       <div id="suggest2">
                   </div>
                </div>
            </div>

            <div class="form-group">
                <label for="destination_time" class="col-xs-4" for="destination_time">到着日時</label>
                <div class="col-xs-8">
                    <div {if $smp==0}class="input-group date" id="destination_time"{/if}>
                    <input type="{if $smp==0}text{else}datetime-local{/if}" class="form-control" name="destination_time" value="{$item.destination_time|date_format:"%G-%m-%d %H:%M"}" />
                        {if $smp==0}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        {/if}
                    </div>
                </div>
            </div>

            <div class="form-group">
            <span>航空券の情報が確認できる画像のアップロードをお願いします。</span>
                <p class="help-block col-xs-12" style="margin-top: 5px;">
                    <span class="item-name">画像のアップロード</span><br />
                    <span class="text-red">
                        フライト情報を登録後、フライト情報を確認できる画像のアップロードをこの画面からお願いします。
                    </span>
                </p>
                {if $flight_id != 'new'}
                    <div class="col-xs-12">
                        {if isset($img)}
                            <div class="col-xs-6">
                                <img src="{$img}" alt="file"><br />
                                <button type="button" id="delete_flight_{$flight_id}" class="btn btn-danger" style="padding-left: 16px;">画像の削除</button>
                            </div>
                        {/if}
                    </div>
                    <div class="col-xs-12" style="margin-top: 5px;">
                        <button type="button" id="InputFile_{$flight_id}" class="btn btn-default">画像アップロード</button>
                    </div>
                {/if}
            </div>

            <div class="form-group">
                <div class="col-xs-5 col-md-7"></div>
                <div class="col-xs-7 col-md-5">
                    <button id="flight_edit" type="button" class="btn btn-primary">送信</button>
                    &nbsp;
                    <input type="reset" class="btn btn-warning" value="リセット">
                </div>
            </div>
            <input type="hidden" name="token" value="{$token}">
            <input type="hidden" name="action_tag" value="flight">
            <input type="hidden" name="ID" value="{$item.ID}">
        </form>
    </div>
    <div class="col-xs-12 col-md-4"></div>
</div>
<script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="themes/js/suggest.js"></script>
<script type="text/javascript" src="themes/js/append.js"></script>
{if smp==0}
    <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="themes/js/moment.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
    <script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
    <script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
    <script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
    <script type="text/javascript" src="themes/js/modal.js"></script>
{/if}
<script>
<!--
loadingView(false);
{if $smp==0}
    $('#departure_time').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });

    $('#destination_time').datetimepicker({
        language: 'ja',
        format: 'yyyy-mm-dd hh:ii',
        pickTime: true
    }).on('changeDate', function(ev){
        $(this).datetimepicker('hide');
    });
{/if}

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
                     $.post(base+"/preparation/suggestion",
                        {inp:text},
                        function(data, status){
                               if(status == 'success' && data){
                                  self.clearSuggestArea();
                                  self.candidateList = eval(data);
                                  var resultList = self._search(text);
                                  if (resultList.length != 0){
                                     self.createSuggestArea(resultList);
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
                  $.post(base+"/preparation/suggestion",
                     {inp:text},
                     function(data, status){
                            if(status == 'success' && data){
                               self.clearSuggestArea();
                               self.candidateList = eval(data);
                               var resultList = self._search(text);
                               if (resultList.length != 0){
                                  self.createSuggestArea(resultList);
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
-->
</script>

</body>
</html>
