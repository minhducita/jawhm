{include file=$header}
<ol class="breadcrumb" style="margin-top:70px;">
  <li><a href="http://www.jawhm.or.jp/">ワーキング・ホリデー(ワーホリ)協会</a></li>
  <li><a href="{$base}/">メンバー専用ページトップ</a></li>
  <li><a href="{$base}/client/seminar/index">会員情報変更</a></li>
  <li>メールアドレス変更</li>
</ol>

<div class="contents-wrapper">
	<h4>メールアドレス変更</h4>
	お客様にご登録頂いたメールアドレスの一覧です。<br />
	該当アドレスに当協会から状況確認等送信しますので、最低1つお客様に届くメールアドレスを設定してください(3つまで)<br />
	メールが届かなかった等の理由でメールアドレスが新規登録できなくなった場合は<a href="" id="sendemail">こちら</a>からメールの再送<br />
	もしくは<a href="" id="delemail">こちら</a>から該当メールアドレスの削除をお願いします。
	
</div>

{if $list|@count > 0}
	{$list|@count} 件の登録があります。<br />
    <table id="tbl">
        <thead>
            <tr>
            	<th class="text-center">No</th>
            	<th class="text-center">ログイン使用</th>
            	<th class="text-center">変更・登録・削除</th>
            </tr>
                <th class="text-center" colspan="4">メールアドレス</th>
            </tr>
        </thead>

		{section name=i start=0 loop=3}
			{assign var=i value=$smarty.section.i.iteration - 1}
        		<tbody id="trno_{$i}"  class="list">
        		{if $list|@count > $i}
        	    	<tr>
                   		<td class="text-right">{$i+1}</td>
                    	<td class="editable text-center">{if $list[$i].key_flag == 1}<span class="glyphicon glyphicon-ok"></span>{else}<a href=""><span id="change_key_{$list[i].email_id}" class="glyphicon glyphicon-minus"></span></a>{/if}</td>
                    	<td class="editable text-center">{if $list[$i].key_flag == 1}<span class="glyphicon glyphicon-minus"></span>{elseif $list[$i].use_flag == 1}<a href=""><span id="delete_email_{$list[i].email_id}" class="glyphicon glyphicon-remove"></span></a>{else}<a href=""><span class="glyphicon glyphicon-minus"></span></a>{/if}</td>
                	</tr>
                	<tr>
                    	<td colspan="4">{$list[$i].email|escape}</td>
               		</tr>
               	{else}
               		<tr>
               			<td></td>
               			<td></td>
                    	<td class="editable text-center"><a href=""><span id="change_email_null" class="glyphicon glyphicon-edit"></span></a></td>
               		</tr>
               		<tr>
               			<td colspan="4"></td>
               		</tr>
               	{/if}
	        	</tbody>
	    {/section}
    </table>
{else}
	現在、お客様にご登録頂いているメールアドレスはありません。
{/if}
	
{include file=$footer}