<form action="https://www.jawhm.or.jp/mypage/staff/client/stafflogin" method="post" name="postForm">
    <input type="hidden" name="staff_cd" value="{$item.staff_cd}">
    <input type="hidden" name="office_cd" value="{$item.office_cd}">
    <input type="hidden" name="client_no" value="{$item.client_no}">
</form>

<script>
window.onload = function() {
    document.postForm.submit();
}
</script>