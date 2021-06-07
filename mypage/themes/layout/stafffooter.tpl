{include file=$modal}

</body>

<script src="themes/js/jquery-1.11.1.min.js"></script>
<script src="themes/js/bootstrap.min.js"></script>
{if isset($datetimepicker)}
    <script type="text/javascript" src="themes/js/moment.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="themes/js/bootstrap-datetimepicker.ja.js"></script>
    <script type="text/javascript" src="themes/js/jquery.browser.sp.js"></script>
    <script type="text/javascript" src="themes/js/jquery.dateValidate.js "></script>
    <script type="text/javascript" src="themes/js/jquery.timeValidate.js"></script>
{/if}

{if isset($index)}
    <script type="text/javascript" src="themes/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="themes/js/jquery.yurayura.js"></script>
{/if}
<script type="text/javascript" src="themes/js/jquery.pjax.js"></script>
<script src="themes/js/common.js"></script>
<script src="themes/js/mypage-staff.js"></script>
<script>
{literal}

{/literal}
</script>
</html>