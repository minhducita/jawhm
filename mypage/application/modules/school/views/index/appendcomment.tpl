<div class="col-xs-10">
    <form id="comment-edit_{$no}" method="post">
        <fieldset>

            <div class="form-group">
                 <textarea class="form-control" name="comment_{$no}" rows="3">{$item.comment}</textarea>
            </div>

            <div class="form-group pull-right">
                  <div class="col-sm-12">
                        {$msg[0].message}: <span class="count_{$no}">300</span>
                        <button id="comment_edit_{$no}" type="button" class="btn btn-primary">{$msg[1].message}</button>
                  </div>
            </div>

            <input type="hidden" name="append" value="contact_comment">
            <input type="hidden" name="no" value="{$no}">
            <input type="hidden" name="token" value="{$token}">
            <input type="hidden" name="action_tag" value="append_comment">
            <input type="hidden" name="id" value="{$item.mypage_school_contact_id}">
        </fieldset>
    </form>
</div>
<script type="text/javascript" src="themes/js/append.js"></script>
<script>
    $('.count_{$no}').html(300);
</script>