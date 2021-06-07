{include file="common/letter_header.tpl"}

{__("dear")} {$order_info.firstname},<br /><br />

{$order_status.email_header nofilter}<br /><br />

{assign var="order_header" value=__("invoice")}
{if $status_settings.appearance_type == "C" && $order_info.doc_ids[$status_settings.appearance_type]}
    {assign var="order_header" value=__("credit_memo")}
{elseif $status_settings.appearance_type == "O"}
    {assign var="order_header" value=__("order_details")}
{/if}
{if $order_status.description|substr:0:1 == "1" || $order_status.description|substr:0:1 == "2" || $order_status.description|substr:0:1 == "4"}
	{if $order_status.description|substr:0:1 == "4"}
		{assign var="order_header" value="receipt"}
	{else}
		{assign var="order_header" value="invoice"}
	{/if}
	Attention. This is no real {$order_header}.<br />
	This {$order_header} is for verification purpose.<br />
	Please wait for the the real {$order_header}.
	<br /><br />
	{if $order_status.description|substr:0:1 == "4"}
		{assign var="order_header" value="Receipt"}
	{else}
		{assign var="order_header" value="Invoice"}
	{/if}

{/if}
<b>{$order_header}:</b><br />

{include file="orders/invoice.tpl"}

{include file="common/letter_footer.tpl"}