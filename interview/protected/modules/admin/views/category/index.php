<link rel="stylesheet" href="/interview/css/jn.css" >
<?php
Yii::import('application.components.CounterColumn');
$this->breadcrumbs = array('Category',);
?>
<div class="row">
    <div class="col-md-12">
        <div class="grid simple row">
            <div class="col-md-4">
                <h3>新しいカテゴリを作成</h3>
                <?php 
                $this->renderPartial('_form', array(
                    'model' => $model_create,
                    'parent' => $parent
                ));
                ?>
            </div>
            <div class="col-md-8">
                <h3>カテゴリリスト</h3><a href="/interview/admin/category/IndexSort">Show with list parent <span style="font-size:0.9em">(click here to order category's display position on front page)</span></a>
                <div class="grid simple row" style="background-color: #fff">    
                    <div class="container-fluid">
                        <?php
                        $mapParent = CHtml::listData($parent, 'id', 'title');
                        $mapParent = array('0' => '------')  + $mapParent;
                        $s = 1;
                        ?>
                        <div id="page_size" style="float: right; display: none">
                            Show
                            <select class="jn_show_size" onchange="location.href = '/interview/admin/category/IndexSize?size=' + $('.jn_show_size option:selected').val()">
                                <option value="10" <?php if($size == 10) echo 'selected' ?> >10</option>
                                <option value="30" <?php if($size == 30) echo 'selected' ?> >30</option>
                                <option value="50" <?php if($size == 50) echo 'selected' ?> >50</option>
                                <option value="all" <?php if($size > 50) echo 'selected' ?> >All</option>
                            </select>
                        </div>
                        <button class="bt_save_order btn btn-primary btn-xs btn-mini" style="float:right;display:none;margin:7px;" onclick="saveOrder($(this).val())">順序を保存します</button>                     
                        <?php
                            $this->widget('zii.widgets.grid.CGridView', array(
                                'dataProvider' => $model->search_size($size),
                                'filter' => $model,
                                'ajaxUpdate' => false,
                                'columns' => array(
                                    array(
                                        'type' => 'raw',
                                        'value' => function($data){
                                            return "<span id=\"order\" class=\"order glyphicon glyphicon-sort order_display_none \" ></span>";   
                                        }
                                    ),
                                    array(
                                        'header'=>'#',
                                        'class'=>'CounterColumn'
                                    ),
                                    'title',
                                    //'parent',
                                    array(
                                        'type' => 'raw',
                                        'header' => 'Parent',
                                        'name' => 'parent',
                                        'value' => function($data){
                                            $parent = Category::model()->find(array(
                                                'select' => 'title',
                                                'condition' => 'id = :id',
                                                'params' => array(':id' => $data->parent),
                                            ));
                                            if($parent)
                                                return $parent->title;
                                            else
                                                return 'parent';
                                        },
                                        'filter' => CHtml::activeDropDownList($model, 'parent', $mapParent, array('prompt' => '全て', 'class' => 'width100')),
                                    ),
                                    'slug',
                                    //'status',
                                    array(
                                        'type' => 'raw',
                                        'header' => 'Status',
                                        'name' => 'status',
                                        'value' => function($data)
                                        {
                                            $checked = ($data->status > 0) ? 'checked' : '';
                                            return "<div class=\"checkbox check-success\">
                                            <input id=\"checkbox{$data->id}\" type=\"checkbox\" value=\"{$data->id}\" $checked onchange='changeStatus({$data->id},this)'>
                                            <label for=\"checkbox{$data->id}\"></label>
                                            </div>";
                                        },
                                        'filter' => CHtml::activeDropDownList($model, 'status', array('1' => 'Published', '0' => 'Pending Review'), array('prompt' => '全て')),
                                    ),
                                    array(
                                        'type' => 'raw',
                                        'header' => '<span class="glyphicon glyphicon-list-alt" style="font-size:1.5em;color: #183df4;"></span>',
                                        'value' => function($data) {
                                            $str =  '<a class="" href="/interview/admin/category/update/id/' . $data->id . '"><span class="glyphicon glyphicon-pencil"></span></a>' .
                                                    //'<a href="/interview/admin/interview/del?id='.$data->id.'" ><span class="glyphicon glyphicon-trash"></span></a>';// . 
                                                    '<form action="/interview/admin/category/del" method="post" name="delete_form" onsubmit="if(confirm(\'You want delete this category. Are you sure!?\')) return true; return false;"><button type="submit" name="id" value="'.$data->id.'" class="btn btn-link" style=""><span class="glyphicon glyphicon-trash"></span></button></form>';
                                            return $str;
                                        },
                                    ),
                                ),
                                'htmlOptions' => array('class' => 'table table-striped table-hover table-responsive jn_table_category'),
                                'rowHtmlOptionsExpression' => 'array("id" => $data->id)',
                                'filterCssClass' => 'width100',
                            ));
                        ?>
                        <button class="bt_save_order btn btn-primary btn-xs btn-mini" style="float:right;display:none;margin:7px;" onclick="saveOrder($(this).val())">順序を保存します</button>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#order').attr('title', 'Please select Parent to activate this feature');     
        $('table.items tbody').attr('id', 'JN_tbody');
        //var selParent = $('select[name="Category[parent]"] option:selected').text();    
        //if(selParent != '------全て'){
        var isSortable = <?php echo isset(Yii::app()->params['sortable']) ? Yii::app()->params['sortable'] : 0 ?>;
        var isShowSize = <?php echo isset(Yii::app()->params['show_page_size']) ? Yii::app()->params['show_page_size'] : 0 ?>;
        if(isShowSize > 0) 
            $('#page_size').show(500);
        else 
            $('#page_size').hide(500);
        if(isSortable > 0){
            $('.order').each(function(){
                $(this).removeClass('order_display_none');
            });
            $('.bt_save_order').each(function(){
                $(this).show(1000);
            });
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
                    //alert('Run!');
                }
            });
        }
    });
    function saveOrder(list)
    {
        if(list != '')
        $.ajax({
                type: 'post',
                url: '/interview/admin/category/sort',
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
        //alert(id + '-' + value.checked);
        $.ajax({
            url : '/interview/admin/category/ChangeStatus',
            type : 'post',
            dataType : 'text',
            async: false,
            cache: false,
            data : {          
                id : id,
                value : value.checked,               
            },
            success : function(value){
                //alert(value);
            }
        });
    }
</script>