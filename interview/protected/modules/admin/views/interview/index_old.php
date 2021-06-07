<link rel="stylesheet" href="/interview/css/jn.css" >
<?php
$this->breadcrumbs=array('Interview');
?>
<h1>カウンセラー一覧</h1>
<?php
    echo CHtml::link('インタビューを作成', array('interview/create'), array('class' => 'btn btn-success'));
?>
<div class="jn_form" style="margin-top:7px;">
    <button type="button" class="btn btn-primary btn-xs btn-mini btn_sort order_display_none" onclick="saveListSort()">順序を保存します</button>
    <?php 
    $array_status = array('1' => 'Published', '0' => 'Pending Review');
    
    $this->widget(
        'zii.widgets.grid.CGridView', array(
        'dataProvider' => $model->search(),
        'filter' => $model,
        'ajaxUpdate' => false,
        'columns' => array(
            array(
            'type' => 'raw',
            'value' => function($data) {
                    return "<span id=\"order\" class=\"order glyphicon glyphicon-sort order_display_none \" ></span>";
                }
            ),
            array(
                'type' => 'html',
                'name' => 'image',
                'value' => 'CHtml::image("/yii1/web/images/files/{$data->image}", "Error url", array("width" => 100, "class" => "img-thumbnail img-responsive"))',
                'filter' => false,
            ),
            //'name',
            array(
                'type' => 'html',
                'name' => 'name',
                //'filter' => 'CHtml::activeTextField($model, "name")',
                'header' => 'Name',
                'value' => '$data->name ? $data->name : ""',
            ),
            'name_transcription',
            array(
                'type' => 'text',
                'header' => 'Office',
                'name' => 'idOffice',
                'value' => '$data->idOffice->name_transcription',
                'filter' => CHtml::activeDropDownList($model, 'office_search', CHtml::listData($offices, 'name_transcription', 'name_transcription'), array('prompt' => '全て')),
            ),
            //'seminar_title',
            'slug',
            array(
                'type' => 'raw',
                'name' => 'status',
                'value' => 'CHtml::dropDownList("status", $data->status, array("1" => "Published", "0" => "Pending Review"), array())',
                'filter' => CHtml::activeDropDownList($model, 'status', array("1" => "Published", "0" => "Pending Review"), array('prompt' => '全て')),
            ),
            array(
                'type' => 'raw',
                'header' => '#',
                'value' => function($data) {
                    $str =  '<a class="" href="/yii1/web/admin/interview/update/id/' . $data->id . '/id_office/' . $data->id_office . '"><span class="glyphicon glyphicon-pencil"></span></a>' .
                            //'<a href="/yii1/web/admin/interview/del?id='.$data->id.'" ><span class="glyphicon glyphicon-trash"></span></a>';// . 
                            '<form action="/yii1/web/admin/interview/del" method="post" name="delete_form" onsubmit="if(confirm(\'You want delete this interview. Are you sure!?\')) return true; return false;"><button type="submit" name="id" value="'.$data->id.'" class="btn btn-link" style=""><span class="glyphicon glyphicon-trash"></span></button></form>';
                    return $str;
                },
            ),
//            array(
//                'class' => 'CButtonColumn',
//                'template' => '{update}{delete}',
//                'buttons' => array(
//                    'update' => array(
//                        'url' => 'Yii::app()->createUrl("admin/interview/update", array("id" => "$data->id", "id_office" => "$data->id_office"))',
//                    ),
//                    'delete' => array(
//                        'url' => '"#"',
//                        //'click' => 'ajaxDelete($data->id)',
//                        'click' => 'function(){if(confirm($data->id)) console.log(\'$data->id\');}',
//                    ),
//                ),
//            ),
        ),
        'htmlOptions' => array('class' => 'table table-striped table-hover table-responsive jn_table_interview'),
        'rowHtmlOptionsExpression' => 'array("id" => $data->id)',            
    ));
    ?>
    <button type="button" class="btn btn-primary btn-xs btn-mini btn_sort order_display_none" onclick="saveListSort()">順序を保存します</button>
    <div class="clearfix"></div>
</div>
<script>
    var listSortParent = '';
    $(function () {
        $('#order').attr('title', 'Sort with office to enable');      
        var selOffice = $('select[name="Interview[office_search]"] option:selected').val();
        $('table.items tbody').attr('id', 'JN_tbody');
        //alert(selOffice);
        if(selOffice !== '')
        {
            $(".btn_sort").each(function(){
                $(this).removeClass('order_display_none');
            });
            $(".order").each(function(){
                $(this).removeClass('order_display_none');
            });
            $('#JN_tbody').sortable({
                axis: 'y',
                opacity: 0.5,
                handle: '#order',  
                cursor: "move",
                update: function (event, ui) {
                    var list_sortable = $(this).sortable('toArray').toString();
                    listSortParent = list_sortable;
                    //alert(listSortParent);
//                    $.ajax({
//                        type: 'post',
//                        url: '/yii1/web/admin/interview/SetOrder',
//                        data: {list_order: list_sortable},
//                        success: function (data)
//                        {
//                            console.log(data);
//                        },
//                        dataType: 'text'
//                    });
                }
            }); 
        }
    });
    
    function saveListSort()
    {
        if(listSortParent != '')
        //alert(listSortParent);
        $.ajax({
            type: 'post',
            url: '/yii1/web/admin/interview/SetOrder',
            data: {list_order: listSortParent},
            success: function (data)
            {
                alert(data);          
            },
            dataType: 'text'
            });
        else
            alert('You have not sorted!');
    }
    
    function changeStatus(id, value){             
        $.ajax({
            url : '/yii1/web/admin/interview/ChangeStatus',
            type : 'post',
            dataType : 'text',
            data : {          
                id : id,
                value : value,               
            },
            success : function(value){
                 //alert('value');
                alert(value);
            }
        });
//        $.post(
//                '/advanced/backend/interview/change-status',
//                {id : id, value : value},
//                function(value){
//                    alert('value');
//                    alert(value);},
//                'text');
    }

    function setupAjaxWithCSRFToken()
    {
        $.ajaxSetup({
            headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
    }

</script>