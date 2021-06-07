
<?php
Yii::import('application.components.CounterColumn');
$this->breadcrumbs = array(
    'Visas',
);
?>

<link rel="stylesheet" href="/yii1/web/css/jn.css" >

<h1>Visas</h1>

<?php
    echo CHtml::link('作成', array('visa/create'), array('class' => 'btn btn-success'));
?>

<div class="jn_form" style="margin-top:7px;">
    <button type="button" class="bt_save_order btn btn-primary btn-xs btn-mini btn_sort" onclick="saveOrder($(this).val())">順序を保存します</button>
    
    <?php

    $this->widget(
        'zii.widgets.grid.CGridView', array(
        'dataProvider' => $model->search(),
        'filter' => $model,
        'ajaxUpdate' => false,
        'columns' => array(
            array(
                'type' => 'raw',
                'value' => function($data) {
                    return "<span id=\"order\" class=\"order glyphicon glyphicon-sort \" ></span>";
                },
                'htmlOptions' => array('class' => 'column_sort'),
            ),
            //array(
                //'header' => '#',
                //'class' => 'CounterColumn',
                //'htmlOptions' => array('class' => 'column_counter'),
            //),
            array(
                'type' => 'html',
                'name' => 'image',
                'value' => function($data) {
                    if($data->country) {
                        return CHtml::image("/images/{$data->country->image}", "Error url", array("width" => 211, "class" => "img-thumbnail img-responsive"));
                    } else {
                        return "Error url";
                    }
                },
                'filter' => false,
                'htmlOptions' => array('class' => 'jn_width25per'),
            ),
            array(
                'type' => 'html',
                'header' => 'Country',
                'name' =>  'country',
                'value' => function ($data) {
                    if($data->country) {
                        return $data->country->name_transcription;
                    } else {
                        return null;
                    }
                },
                'htmlOptions' => array('class' => 'jn_width15per'),
                'filter' => CHtml::activeDropDownList($model, 'country_search', CHtml::listData($countries, 'id', 'name_transcription'), array('class' => 'width100', 'prompt' => '全て')),
            ),
            'slug',
            array(
                'type' => 'raw',
                'header' => 'Status',
                'name' => 'status',
                'value' => function($data) {
                    $checked = ($data->status > 0) ? 'checked' : '';
                    return "<div class=\"checkbox check-success\">
                        <input id=\"checkbox{$data->id_country}\" type=\"checkbox\" value=\"{$data->id_country}\" $checked onchange='changeStatus({$data->id_country},this)'>
                        <label for=\"checkbox{$data->id_country}\"></label>
                        </div>";
                },
                'filter' => CHtml::activeDropDownList($model, 'status', array('1' => 'Published', '0' => 'Pending Review'), array('class' => 'width100', 'prompt' => '全て')),
                'htmlOptions' => array('class' => 'jn_width10per'),
            ),
            array(
                'type' => 'raw',
                'header' => '#',
                'value' => function($data) {
                    $edit_button = '<a class="" href="/interview/admin/visa/update/id/' . $data->id_country . '"><span class="glyphicon glyphicon-pencil"></span></a>';
                    $delete_button = '
                        <form action="/interview/admin/visa/del" method="post" name="delete_form"
                            style="display: inline;"
                            onsubmit="if(confirm(\'You want delete this interview. Are you sure!?\')) return true; return false;">
                            <button type="submit" name="id" value="' . $data->id_country . '" class="btn btn-link" style="">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </form>
                    ';
                    return $edit_button . $delete_button;
                },
                'htmlOptions' => array('class' => 'option_column'),
            ),
        ),
        'htmlOptions' => array('class' => 'table table-striped table-hover table-responsive jn_table'),
        'rowHtmlOptionsExpression' => 'array("id" => $data->id_country)',
    ));
    ?>
    <button type="button" class="bt_save_order btn btn-primary btn-xs btn-mini btn_sort" onclick="saveOrder($(this).val())">順序を保存します</button>
    <div class="clearfix"></div>
</div>
<script>
    $(function () {
        $('#order').attr('title', 'Please select Parent to activate this feature');      
        $('table.items tbody').attr('id', 'JN_tbody');

            $('#JN_tbody').sortable({
                axis: 'y',
                opacity: 0.5,
                handle: '#order',  
                cursor: "move",
                update: function (event, ui) {
                    var list_sortable = $(this).sortable('toArray').toString();
                    $('.bt_save_order').each(function(){
                        $(this).val(list_sortable);
                    });
                }
            });

    });
    function saveOrder(list)
    {
        if(list != '')
        $.ajax({
                type: 'post',
                url: '/yii1/web/admin/visa/sort',
                data: {list_order: list.toString()},
                success: function (data)
                {
                    alert(data);
                },
                dataType: 'text'
            });
        else alert('You have not sorted!');
    }
    function changeStatus(id, value){   
        $.ajax({
            url : '/yii1/web/admin/visa/ChangeStatus',
            type : 'post',
            dataType : 'text',
            async: false,
            cache: false,
            data : {          
                id : id,
                value : value.checked,               
            },
            success : function(value){
                console.log(value);
            }
        });
    }
</script>