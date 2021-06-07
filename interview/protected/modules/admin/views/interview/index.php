<link rel="stylesheet" href="/interview/css/jn.css" >
<?php
$this->breadcrumbs=array('Interview');
?>
<h1>カウンセラー一覧</h1>
<?php
    echo CHtml::link('インタビューを作成', array('interview/create'), array('class' => 'btn btn-success'));
?>
<div class="jn_form" style="margin-top:7px;">

	<button type="button" class="btn btn-primary btn-xs btn-mini btn_sort" onclick="saveListSort()">順序を保存します</button>
	
    <div id="page_size" style="float: right; display: none">
        Show
        <select class="jn_show_size" onchange="location.href = '/interview/admin/interview/index?size=' + $('.jn_show_size option:selected').val()">
            <option value="10" <?php if ($size <= 10) echo 'selected' ?> >10</option>
            <option value="30" <?php if ($size > 10 && $size <= 30) echo 'selected' ?> >30</option>
            <option value="50" <?php if ($size > 30 && $size <= 50) echo 'selected' ?> >50</option>
            <option value="all" <?php if ($size > 50) echo 'selected' ?> >All</option>
        </select>
    </div>

    
    <?php 
    $array_status = array('1' => 'Published', '0' => 'Pending Review');
    
    $this->widget(
        'zii.widgets.grid.CGridView', array(
        'dataProvider' => $model->search($size),
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
            array(
                'type' => 'html',
                'name' => 'image',
                'value' => 'CHtml::image("/interview/images/files/{$data->image}", "Error url", array("width" => 100, "class" => "img-thumbnail img-responsive"))',
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
                'value' => 'CHtml::dropDownList("status", $data->status, array("1" => "Published", "0" => "Pending Review"), array("onchange" => "changeStatus({$data->id},$(this).val())"))',
                'filter' => CHtml::activeDropDownList($model, 'status', array("1" => "Published", "0" => "Pending Review"), array('prompt' => '全て')),
            ),
            array(
                'type' => 'raw',
                'header' => '#',
                'value' => function($data) {
                    $str =  '<a class="" href="/interview/admin/interview/update/id/' . $data->id . '/id_office/' . $data->id_office . '"><span class="glyphicon glyphicon-pencil"></span></a>' .
                            //'<a href="/interview/admin/interview/del?id='.$data->id.'" ><span class="glyphicon glyphicon-trash"></span></a>';// . 
                            '<form action="/interview/admin/interview/del" method="post" name="delete_form" onsubmit="if(confirm(\'You want delete this interview. Are you sure!?\')) return true; return false;"><button type="submit" name="id" value="'.$data->id.'" class="btn btn-link" style=""><span class="glyphicon glyphicon-trash"></span></button></form>';
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
    <button type="button" class="btn btn-primary btn-xs btn-mini btn_sort" onclick="saveListSort()">順序を保存します</button>
    <div class="clearfix"></div>
</div>
<script>
    var listSortParent = '';
    $(function () {
		
        $('#order').attr('title', 'Sort with office to enable');      
        $('table.items tbody').attr('id', 'JN_tbody');
        //var selOffice = $('select[name="Interview[office_search]"] option:selected').val();
        //if(selOffice !== '')
        var isSortable = <?php echo isset(Yii::app()->params['sortable']) ? Yii::app()->params['sortable'] : 0 ?>;
        var isShowSize = <?php echo isset(Yii::app()->params['show_page_size']) ? Yii::app()->params['show_page_size'] : 0 ?>;
        if(isShowSize > 0) 
            $('#page_size').show(500);
        else 
            $('#page_size').hide(500);
        //if(isSortable > 0)
        //{
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
                }
            }); 
        //}
    });
    
    function saveListSort()
    {
        if(listSortParent != '')
        //alert(listSortParent);
        $.ajax({
            type: 'post',
            url: '/interview/admin/interview/SetOrder',
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
            url : '/interview/admin/interview/ChangeStatus',
            type : 'post',
            dataType : 'text',
            data : {          
                id : id,
                value : value               
            },
            success : function(value){    
                alert(value);
            }
        });

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