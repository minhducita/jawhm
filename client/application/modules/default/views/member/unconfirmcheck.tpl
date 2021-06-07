<script type="text/javascript">
	<!--
	var email = '{$email}';
	var token = '{$token}';
	
	{literal}
	var data = {'change_email': email, 'action_tag': 'editemail', 'token': token};
	submit_action('resend', data, null);	
	{/literal}
	-->
</script>