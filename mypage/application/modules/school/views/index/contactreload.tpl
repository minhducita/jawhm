<ul id="contactreload" class="list-group">
    {$i = 0}
    {if $message|@count > 0}
        {foreach item=item from=$message}
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{$i}" class="list-group-item mes" id="inc-contact_{$i}" style="padding-top: 5px;">
                {$item.sender_id}
                <span class="wihte-space"></span>-<span class="wihte-space"></span>
                {$item.updated_on|date_format:"%G{$head_msg[0].message}%m{$head_msg[1].message} %d{$head_msg[2].message} %H:%M"}{if $item.updated_on|date_format:"%G{$head_msg[0].message}%m{$head_msg[1].message} %d{$head_msg[2].message} %H:%M:%S" > $last_login|date_format:"%G{$head_msg[0].message}%m{$head_msg[1].message} %d{$head_msg[2].message} %H:%M:%S"}<span class="badge pull-right">new</span>{/if}
                <br />
                <span id="height_{$i}" class="col-xs-12">
                    <span class="col-xs-3">
                        {if $item.sender_id === "JAWHM"}<img id="icon_{$i}" class="client-size" src="themes/images/jawhmicon.png">{else}<img id="icon_{$i}" class="client-size" src="{$logo}">{/if}
                    </span>
                    <span class="col-xs-9">
                        <span id="comment{$i}" class="main-containts">{$item.comment}</span><br />
                        <span class="pull-right">
                            {if $item.sender_id === $school_id}
                                <span id="changecomment_{$item.mypage_school_contact_id}" class="link-color"><i class="icon-pencil"></i>{$msg[2].message}</span><span class="white-space"></span><span id="deletecomment_{$item.mypage_school_contact_id}_{$item.updated_on}" class="link-color"><i class="icon-trash link-color"></i>{$msg[3].message}</span>
                            {else}
                                <span id="changecomment_new" class="link-color"><i class="icon-reply"></i>{$msg[4].message}</span>
                            {/if}
                        </span>
                    </span>
                </span>
            </a>
            <span id="collapse_{$i}" class="panel-collapse collapse append-color">
                <div class="append-size">
                    <span class="col-xs-2"><img class="client-size" src="{$logo}"></span>
                    <div id="contact_comment_{$i}"></div>
                </div>
            </span>
            {$i = $i + 1}
        {/foreach}
        <a href="school/talk/index" class="list-group-item mes" style="padding-top: 5px;">
            <span class="link-color">{$msg[5].message}</span>
        </a>
     {else}
        <li class="list-group-item inc-btn">
            {$msg[18].message}
        </li>
     {/if}
 </ul>

<script src="themes/js/append.js"></script>
<script>
loadingView(false);
{literal}
    $('[id^=inc-contact]').each(function(i) {
        var height = $('[id=comment'+i+']').outerHeight() + 30;
        $(this).css({'padding-top': '20px', 'padding-bottom': height});
        var icon_height = Math.max(0, ($('*[id=height_'+i+']').outerHeight() / 4 ) - $('[id=icon_'+i+']').children('img').height());
        $('*[id=icon_'+i+']').css({'position': 'absolute', 'top': 0, 'left': 0, 'right': 0, 'bottom': 0, 'margin-top': icon_height+'px'});
    });

    $('[id^=inc-contact]').click(function() {
        var i = $(this).attr("id").split("_");
        var no = i[1];

        var data = {'id': 'new',
                    'append': 'contact_comment',
                    'no': no};

        mode = 'new';

        submit_action('school/index/appendcomment', data, 'append');
    });
{/literal}
</script>