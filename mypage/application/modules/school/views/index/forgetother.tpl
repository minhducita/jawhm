<div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h4 class="modal-title">{$msg[0].message}</h4>
    </div>

    <div class="modal-body">
        {$msg[1].message}<br />
        <a href="mailto:school@jawhm.or.jp">school@jawhm.or.jp</a><br />
        <br />
        <ul>
            <li>{$msg[2].message}</li><br />
            <li class="asta">{$msg[3].message}</li>
            <li class="asta">{$msg[4].message}</li>
            <li class="asta">{$msg[5].message}</li>
        </ul>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{$msg[6].message}</button>
    </div>
</div>