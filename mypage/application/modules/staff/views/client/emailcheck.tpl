<meta content="text/html" charset="utf-8" http-equiv="Content-Type"/>
<script src="themes/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    <!--
    var member_id = '{$member_id}';
    var client_name = '{$client_name}';
    var result = {$result};
    {literal}
    if(result == 1) {
        var $form = $('#insert_client');
        var data = $form.serializeArray();

        data.push({name: 'member_id', value: member_id});
        data.push({name: 'client_name', value: client_name});
        var url = 'index/clientinsert';

        submit_action(url, data, 'update');
    } else {
        alert('メールアドレスが一致しません');
    }

    {/literal}
    -->
</script>