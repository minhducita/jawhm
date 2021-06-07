<link rel="stylesheet" href="/interview/css/jn.css" >
<?php
Yii::import('application.components.CounterColumn');
$this->breadcrumbs = array('Question',);
?>

<div class="col-md-12">
    <h3>質問</h3>
    <p>
        <?php
            echo CHtml::link('質問を作成', array('question/create'), array('class' => 'btn btn-success'));
        ?>
    </p>

    <div class="grid simple" style="background-color: #fff">  

        <div id="page_size" style="float: right; display: none">
            Show
            <select class="jn_show_size" onchange="location.href = '/interview/admin/question/IndexSize?size=' + $('.jn_show_size option:selected').val()">
                <option value="10" <?php if ($size <= 10) echo 'selected' ?> >10</option>
                <option value="30" <?php if ($size > 10 && $size <= 30) echo 'selected' ?> >30</option>
                <option value="50" <?php if ($size > 30 && $size <= 50) echo 'selected' ?> >50</option>
                <option value="all" <?php if ($size > 50) echo 'selected' ?> >All</option>
            </select>
        </div>

        <div class="grid-body no-border">
            <button class="bt_save_order btn btn-primary btn-xs btn-mini" style="float:right;display:none;margin:7px;" onclick="saveOrder($(this).val())">順序を保存します</button>
            <?php
            $mapCate = CHtml::listData($categories, 'id', 'title');
            $mapCoun = CHtml::listData($country, 'id', 'name');
            //JN:Check
            //die(print_r($model->search_size($size)->itemCount));
            //JN:End.check
            ?>
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'             => $model->search_size($size),
                'filter'                   => $model,
                'ajaxUpdate'               => false,
                'columns'                  => array(
                    array(
                        'header'      => '#',
                        'class'       => 'CounterColumn',
                        'htmlOptions' => array('class' => 'column_counter'),
                    ),
                    array(
                        'type'        => 'raw',
                        'value'       => function ($data) {
                            return "<span id=\"order\" class=\"order glyphicon glyphicon-sort order_display_none \" ></span>";
                        },
                        'htmlOptions' => array('class' => 'column_sort'),
                    ),
                    'title',
                    array(
                        'type'        => 'raw',
                        'header'      => 'カテゴリ',
                        'name'        => 'question_category',
                        'value'       => function ($data) {
                            $str = '<ul class="table_td_ul">';
                            foreach ($data->categoryList() as $cate) {
                                $str .= "<li>{$cate->title}</li>";
                            }
                            $str .= '</ul>';
                            return $str;
                        },
                        'filter'      => CHtml::activeDropDownList($model, 'category_search', $mapCate, array(
                            'prompt' => '全て',
                            'class'  => ''
                        )),
                        'htmlOptions' => array('class' => 'jn_width13per'),
                    ),

                    array(
                        'name'        => 'question_country',
                        'type'        => 'raw',
                        'header'      => '国',
                        'value'       => function ($data) {
                            $str = '';
                            foreach ($data->countryList() as $coun) {
                                $str .= $coun->name . '<br />';
                            }
                            return $str;
                        },
                        'filter'      => CHtml::activeDropDownList($model, 'country_search', $mapCoun, array(
                            'prompt' => '全て',
                            'class'  => ''
                        )),
                        //'filter' => $mapCoun,
                        //'filter' => '',
                        'htmlOptions' => array('class' => 'jn_width13per'),
                    ),

                    array(
                        'name'        => 'answers',
                        'type'        => 'raw',
                        'header'      => '回答',
                        'value'       => function ($data) {
                            $str = '<ul class="table_td_ul">';
                            foreach ($data->answers as $ans) {
                                //$str_content = substr($ans->content, 0, 50) . '.......' . substr($ans->content, (strlen($ans->content) - 50), strlen($ans->content));
                                $str .= "<li>" . substr($ans->content, 0, 50) . "</li>";
                            }
                            $str .= '</ul>';
                            return $str;
                        },
                        'filter'      => '',
                        'htmlOptions' => array('class' => 'jn_width20per'),
                    ),

                    array(
                        'type'        => 'raw',
                        'header'      => '状態',
                        'name'        => 'status',
                        'value'       => function ($data) {
                            $checked = ($data->status > 0) ? 'checked' : '';
                            return "<div class=\"checkbox check-success\">
                                            <input id=\"checkbox_status_{$data->id}\" type=\"checkbox\" value=\"{$data->id}\" $checked onchange='changeStatus({$data->id},this)'>
                                            <label for=\"checkbox_status_{$data->id}\"></label>
                                            </div>";
                        },
                        'filter'      => CHtml::activeDropDownList($model, 'status', array(
                            '1' => 'Published',
                            '0' => 'Pending Review'
                        ), array(
                            'prompt' => '全て',
                            'class'  => ''
                        )),
                        'htmlOptions' => array('class' => 'jn_width10per'),
                    ),

                    array(
                        'type'        => 'raw',
                        'name'        => 'search',
                        'value'       => function ($data) {
                            $checked = ($data->search > 0) ? 'checked' : '';
                            return "<div class=\"checkbox check-info\">
                                            <input id=\"checkbox_search_{$data->id}\" type=\"checkbox\" value=\"{$data->id}\" $checked onchange='changeSearch({$data->id},this)'>
                                            <label for=\"checkbox_search_{$data->id}\"></label>
                                            </div>";
                        },
                        'filter'      => CHtml::activeDropDownList($model, 'search', array(
                            '1' => 'Published',
                            '0' => 'Pending Review'
                        ), array(
                            'prompt' => '全て',
                            'class'  => ''
                        )),
                        'htmlOptions' => array('class' => 'jn_width10per'),
                    ),
                    array(
                        'type'        => 'raw',
                        'header'      => '<span class="glyphicon glyphicon-list-alt" style="font-size:1.5em;color: #183df4;"></span>',
                        'value'       => function ($data) {
                            $update_button = '<a class="" href="/interview/admin/question/update/id/' . $data->id . '"><span class="glyphicon glyphicon-pencil"></span></a>';
                            $remove_button = '<form action="/interview/admin/question/del" method="post" name="delete_form"
                                     style="display: inline-block"
                                     onsubmit="if(confirm(\'You want delete this category. Are you sure!?\')) return true; return false;"
                                >
                                    <button type="submit" name="id" value="' . $data->id . '" class="btn btn-link" style=""><span class="glyphicon glyphicon-trash"></span></button>
                                </form>';
                            return $update_button . $remove_button;
                        },
                        'htmlOptions' => array('class' => 'option_column'),
                    ),
                ),
                'htmlOptions'              => array('class' => 'table table-striped table-hover table-responsive jn_table'),
                //jn_table_question
                'rowHtmlOptionsExpression' => 'array("id" => $data->id)',
                //'filterCssClass' => 'width100',
            ));
            ?>
            <button class="bt_save_order btn btn-primary btn-xs btn-mini" style="float:right;display:none;margin:7px;" onclick="saveOrder($(this).val())">順序を保存します</button>
        </div>
    </div>
</div>

<script>
$(function () {
        var isSortable = <?php echo isset(Yii::app()->params['sortable']) ? Yii::app()->params['sortable'] : 0 ?>;
        var isShowSize = <?php echo isset(Yii::app()->params['show_page_size']) ? Yii::app()->params['show_page_size'] : 0 ?>;
        $('table.items tbody').attr('id', 'JN_tbody');
        $('#order').attr('title', 'Please select Category to activate this feature');      
        //var selCate = $('[name="Question[category_search]"]').val();
        //var selCoun = $('[name="Question[country_search]"]').val();
        //if(selCate > 0 || selCoun > 0)
        if(isShowSize > 0) 
            $('#page_size').show(500);
        else 
            $('#page_size').hide(500);
        if(isSortable > 0)
        {
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
                }
            });
        }
});
    function saveOrder(list)
    {
        if(list != '')
        $.ajax({
                type: 'post',
                url: '/interview/admin/question/sort',
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
            url : '/interview/admin/question/ChangeStatus',
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
    function changeSearch(id, value){   
        $.ajax({
            url : '/interview/admin/question/ChangeSearch',
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