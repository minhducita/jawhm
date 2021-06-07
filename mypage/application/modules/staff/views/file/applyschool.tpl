<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">学校閲覧確認</h4>
    </div>

    <div class="modal-body">
        本当に{$filename}を学校に対して閲覧可能にしてよろしいですか?<br />
        <form id="apply-school" method="post">
            <fieldset>
                <input type="hidden" name="token" value="{$token}">
                <input type="hidden" name="action_tag" value="applyschool">
            </fieldset>
        </form>
    </div>

    <div class="modal-footer">
        <button id="apply_school" type="button" class="btn btn-danger">はい</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">いいえ</button>
    </div>
</div>
<script type="text/javascript" src="{$base}/mypage/themes/js/modal.js"></script>