<?php
$this->breadcrumbs = array('カテゴリー',);
?>
<script>
    var listSortParent = '';//new Array();
    //var listSortChild = new Array();
    
    $(function () {
//        $('#order').attr('title', 'Please select Parent to activate this feature');      
//        var selParent = $('[name="CategorySearch[parent]"] option:selected').text();
        //alert(selParent);
//        if(selParent !== '全て')
        //document.getElementsByClassName("order").style.opacity = 0.5;
//        $('#JN_tbody').sortable({
//            axis: 'y',
//            opacity: 0.5,
//            handle: '#order',  
//            cursor: "move",
//            update: function (event, ui) {
//                var list_sortable = $(this).sortable('toArray').toString();
//                alert(list_sortable);
//                $.ajax({
//                type: 'post',
//                    url: '/advanced/backend/qa/category/sort',
//                    data: {list_order: list_sortable},
//                    success: function (data)
//                    {
//                        alert(data);
//                    },
//                    dataType: 'text'
//                });
//            }
//        });
        
        //set checked for search status
        $('#checkbox_all').attr('checked', 'checked');
        //////test
        $('#sortable').sortable({
            axis: 'y',
            opacity: 0.5,
            handle: '#order_parent',  
            cursor: "move",
            placeholder : "panel-group",
            update: function (event, ui) {
                var list_sortable = $(this).sortable('toArray').toString();
                listSortParent = list_sortable;
                //console.log(listSortParent);
                //alert(list_sortable); 
//                $.ajax({
//                type: 'post',
//                    url: '/advanced/backend/qa/category/sort',
//                    data: {list_order: list_sortable},
//                    success: function (data)
//                    {
//                        //alert(data);
//                    },
//                    dataType: 'text'
//                });
            }
        });
        
    });
    function changeStatus(id, value){   
        //alert(id + '-' + value.checked);
        $.ajax({
            url : '/yii1/web/admin/category/ChangeStatus',
            type : 'post',
            dataType : 'text',
            async: false,
            cache: false,
            data : {          
                id : id,
                value : value.checked,               
            },
            success : function(value){
                 //alert('value');
                //alert(value);
            }
        });
    }
    function loadCategoryChile(id)
    {
        $('#collapse_'+id).empty();
        $.ajax({
            url : '/yii1/web/admin/category/LoadCategoryByParent',
            type : 'post',
            dataType : 'json',
            data : {id : id},
            success : function (data) {
                if(data.length > 0)
                {
                    var str = '<table class="table table-striped table-hover table-condensed category_table_sort">'
                            + '<thead><tr><th>#</th><th>#</th><th>Title</th><th>Slug</th><th>状態</th><th>#</th></tr></thead>'
                            + '<tbody id="JN_tbody_'+id+'">';
                    $.each(data, function(i, item){
                        str += '<tr id='+item.id+'>';
                        str += '<td id="order_td"><span id="order" class="order glyphicon glyphicon-sort"></span></td><td>'+(i+1)+'</td>';
                        str += '<td>'+item.title+'</td>';                      
                        str += '<td>'+item.slug+'</td>';
                        str += '<td>';
                        str += '<div class="row-fluid">';                       
                        var checked = (item.status > 0) ? 'checked' : '';                       
                        str += '<div class="checkbox check-success">';
                        str += '<input id="checkbox'+item.id+'" type="checkbox" value="1" '+checked+' checked="checked" onchange="changeStatus('+item.id+',this)">';
                        str += '<label for="checkbox'+item.id+'"></label>';                                              
                        str += '</div></div>';
                        str += '</td>';                   
                        str += '<td>';
                        //str += '<a href="/advanced/backend/qa/category/view?id='+item.id+'" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';
                        str += '<a href="/yii1/web/admin/category/update/id/'+item.id+'" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>';
                        //str += '<a href="/advanced/backend/qa/category/delete?id='+item.id+'" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>';
                        str += '<form action="/yii1/web/admin/category/del" method="post" name="delete_form" onsubmit="if(confirm(\'You want delete this category. Are you sure!?\')) return true; return false;"><button type="submit" name="id" value="'+item.id+'" class="btn btn-link" style=""><span class="glyphicon glyphicon-trash"></span></button></form>';
                        str += '</td>';
                        str += '</tr>';                   
                    });

                    str += '</tbody></table>';

                    $('#collapse_'+id).append(str);
                    
                    $('#JN_tbody_'+id).sortable({
                    axis: 'y',
                    opacity: 0.5,
                    handle: '#order',  
                    cursor: "move",
                    placeholder : "panel-collapse",
                    update: function (event, ui) {
                        var list_sortable = $(this).sortable('toArray').toString();
                        //alert(list_sortable);
                        //console.log(list_sortable);
                        //$('#bt_save_order').val(list_sortable);
                        $.ajax({
                        type: 'post',
                            url: '/advanced/backend/qa/category/sort',
                            data: {list_order: list_sortable},
                            success: function (data)
                            {
                                alert(data);
                            },
                            dataType: 'text'
                        });
                    }
                    });
        
                }else
                alert('no data');
            
            }
        });
                
    }
    function addSortable(id)
    {
        $('#JN_tbody_'+id).sortable({
                    axis: 'y',
                    opacity: 0.5,
                    handle: '#order',  
                    cursor: "move",
                    placeholder : "panel-collapse",
                    update: function (event, ui) {
                        var list_sortable = $(this).sortable('toArray').toString();
                        console.log(list_sortable);
                        $('#bt_save_order_'+id).val(list_sortable);
//                        $.ajax({
//                        type: 'post',
//                            url: '/advanced/backend/qa/category/sort',
//                            data: {list_order: list_sortable},
//                            success: function (data)
//                            {
//                                //alert(data);
//                            },
//                            dataType: 'text'
//                        });
                    }
        });        
    }
    function saveListSort()
    {
        if(listSortParent != '')
        //alert(listSortParent);
        $.ajax({
            type: 'post',
            url: '/yii1/web/admin/category/sort',
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
    function saveOrder(list)
    {
        if(list != '')
        $.ajax({
                type: 'post',
                url: '/yii1/web/admin/category/sort',
                data: {list_order: list.toString()},
                async: false,
                cache: false,
                success: function (data)
                {
                    alert(data);
                },
                dataType: 'text'
            });
        else alert('You have not sorted!');
    }
</script>
<div class="row">
<div class="col-md-12">
<div class="grid simple row">
 
    <h1><?php // Html::encode($this->title) ?></h1>
<!--    <form action="/advanced/backend/qa/category/index">
    <input type="text" name="CategorySearch[slug]" class="form-control" />
    </form>-->

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
        <h3>カテゴリリスト</h3><a href="/yii1/web/admin/category/IndexSize?size=10">Show with table</a>
    <div class="grid simple" style="background-color: #fff">    
    <div class="grid-body no-border">
        
<!--//////////start//////////-->

<h4 style="font-weight:bold; margin-right: 9px;">親リスト</h4>
<div class="form-group" style="text-align:right">

<button type="button" class="btn btn-primary btn-xs btn-mini" onclick="saveListSort()">順序を保存します</button>
</div>

<div class="panel-group" id="sortable" > <!--data-toggle="collapse"-->   
    <?php
        $i = 1;
         foreach ($parent as $p)
        {
            //$category_childs = Category::find()->where(['parent' => $p->id])->orderBy(['sort' => SORT_ASC])->all();
            $category_childs = Category::model()->findAll(array(
                'condition' => 'parent = :id',
                'params' => array(':id' => $p->id),
                'order' => 't.sort',
            ));
        ?>
            <div class="panel" id="<?php echo $p->id ?>">
		<div class="panel">
			  <!--<h4 class="panel-title">-->				
				<!--///////-->
                                <div class="add-margin">
						
                                    <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                                                       
                                        <div class="row b-grey b-b xs-p-b-20 category_background_list_parent table-box">

                                                <div class="col-md-1 col-sm-1 table-box-cell">
                                                    <div class="widget-stats">
                                                        <div class="wrapper transparent">
                                                            <a onclick="addSortable( <?php echo $p->id ?> )" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $p->id ?>">
                                                                <span id="order_parent" class="order glyphicon glyphicon-sort"></span>
                                                            </a>
                                                        </div>
                                                    </div>       
                                                </div> 

                                                <div class="col-md-8 col-sm-8 table-box-cell">                                                        
                                                    <h4 class="category_sort_list_title"><a onclick="addSortable( <?php echo $p->id ?> )" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $p->id ?>"><?php echo $p->title ?>&nbsp;<span class="fa fa-toggle-down"></span></a></h4>	<!--onclick="loadCategoryChile( $p->id)" -->						                                                      
                                                </div>
                                                <div class="table-box-cell">
                                                    <span class="category_sort_total_item">(<?php echo count($category_childs) ?> items)</span>
                                                </div>

                                                <div class="table-box-cell">

                                                    <div class="row-fluid">
                                                        <?php
                                                        $checked = ($p->status > 0) ? 'checked' : '';
                                                        ?>
                                                        <div class="checkbox check-success 	">
                                                            <input id="checkbox<?php echo $p->id ?>" type="checkbox" value="1" <?php echo $checked ?> onchange="changeStatus(<?php echo $p->id ?>,this)">
                                                            <label for="checkbox<?php echo $p->id ?>"></label>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="table-box-cell">
                                                    <!--<a href="/advanced/backend/qa/category/view?id=" title="View" aria-label="View"><span class="glyphicon glyphicon-eye-open"></span></a>-->
                                                    <a href="/yii1/web/admin/category/update/id/<?php echo $p->id ?>" title="Update" aria-label="Update" ><span class="glyphicon glyphicon-pencil"></span></a>
                                                    <!--<a href="/advanced/backend/qa/category/delete?id=<? echo $p->id ?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>-->
                                                    <form action="/yii1/web/admin/category/del" method="post" name="delete_form" onsubmit="if(confirm('You want delete this category. Are you sure!?')) return true; return false;"><button type="submit" name="id" value="<?php echo $p->id ?>" class="btn btn-link" style=""><span class="glyphicon glyphicon-trash"></span></button></form>
                                                </div>
                                            </div>
						
                                            </div>
					</div>
                                <!--///////-->
				
			  <!--</h4>-->
			</div>
			<div id="collapse_<?php echo $p->id ?>" class="panel-collapse collapse">
			  <!--<div class="panel-body">-->
				<!--This is item content-->
                                <?php 
                                
                                if(isset($category_childs) && $category_childs)
                                {
                                ?>                              
                                <button type="button" id="bt_save_order_<?php echo $p->id ?>" class="btn btn-primary btn-xs btn-mini" style="float:right; dislay:none;" value="" onclick="saveOrder($(this).val())">順序を保存します</button>
                                <table class="table table-striped table-hover table-condensed category_table_sort">
                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>#</th>
                                                        <th>Title</th>                                                     
                                                        <th>Slug</th>
                                                        <th>状態</th>
                                                        <th>#</th>
                                                    </tr>
                                    </thead>
                                    <tbody id="JN_tbody_<?php echo $p->id ?>">     
                                        <?php
                                        $ii = 1;                                       
                                        foreach($category_childs as $category_child) {
                                        ?>
                                        <tr id='<?php echo $category_child->id?>'>
                                            <td id="order_td"><span id="order" class="order glyphicon glyphicon-sort"></span></td>
                                            <td><?php echo $ii ?></td>
                                            <td><?php echo $category_child->title ?></td>                            
                                            <td><?php echo $category_child->slug ?></td>
                                            <td>
                                                <?php $checked = ($category_child->status > 0) ? 'checked' : ''; ?>
                                                <div class="checkbox check-success">
                                                    <input id="checkbox<?php echo $category_child->id?>" type="checkbox" value="<?php echo $category_child->id?>" <?php echo $checked?> onchange='changeStatus(<?php echo $category_child->id?>,this)'>
                                                    <label for="checkbox<?php echo $category_child->id?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <!--<a href="/advanced/backend/qa/category/view?id=" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>-->
                                                <!--<a href="/advanced/backend/qa/category/update?id=<? echo $category_child->id ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>-->
                                                <a href="/yii1/web/admin/category/update/id/<?php echo $category_child->id ?>" title="Update" aria-label="Update" ><span class="glyphicon glyphicon-pencil"></span></a>
                                                <!--<a href="/advanced/backend/qa/category/delete?id=<? echo $category_child->id ?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>-->
                                                <form action="/yii1/web/admin/category/del" method="post" name="delete_form" onsubmit="if(confirm('You want delete this category. Are you sure!?')) return true; return false;"><button type="submit" name="id" value="<?php $category_child->id ?>" class="btn btn-link" style=""><span class="glyphicon glyphicon-trash"></span></button></form>
                                            </td>
                                        </tr>
                                        <?php $ii++; } ?>    
                                    </tbody>
                                </table>
                                
                                <?php }else{ ?>
                                <p>No item</p>
                                <?php } ?>
			  <!--</div>-->
			</div>
            </div>
        <?php
        $i++;
        }
    ?>
    </div>    
<!--/////////end//////////-->        
<!--    <div class="form-group" style="text-align:right">
        <?php // Html::button('Save order', ['class' => 'btn btn-primary btn-md', 'onclick' => 'saveListSort()'])?>
    </div>                   -->
    </div>           
    </div>
    </div>
</div>
</div>
</div>