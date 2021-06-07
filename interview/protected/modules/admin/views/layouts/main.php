<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
        
        <!--//==========CSS===========//-->
        <link rel="stylesheet" type="text/css" href="/interview/plugins/pace/pace-theme-flash.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/bootstrap-tag/bootstrap-tagsinput.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/dropzone/css/dropzone.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/bootstrap-datepicker/css/datepicker.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/ios-switch/ios7-switch.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/bootstrap-select2/select2.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/boostrap-slider/css/slider.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/boostrapv3/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/boostrapv3/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/font-awesome/css/font-awesome.css" >
        <link rel="stylesheet" type="text/css" href="/interview/css/animate.min.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/jquery-scrollbar/jquery.scrollbar.css" >
        <link rel="stylesheet" type="text/css" href="/interview/css/responsive.css" >
        <link rel="stylesheet" type="text/css" href="/interview/css/custom-icon-set.css" >
        <link rel="stylesheet" type="text/css" href="/interview/css/style.css" >
        <link rel="stylesheet" type="text/css" href="/interview/css/common.css" >
        <link rel="stylesheet" type="text/css" href="/interview/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css" >
        
        <!--//============JS==============//-->
        <script language="javascript" src="https://code.jquery.com/jquery-2.0.0.min.js"></script>

    </head>
<body>
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse "> 
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation"> 
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
                <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> </li>		 
            </ul>
            <!-- BEGIN LOGO -->	
            <a href="/interview/interview"><img src="/interview/images/layout/logo.png" class="logo" alt=""  data-src="/interview/images/layout/logo.png" data-src-retina="/interview/images/layout/logo.png" width="106" height="21"/></a>
            <!-- END LOGO --> 
            <ul class="nav pull-right notifcation-center">	
                <li class="dropdown" id="header_task_bar"> <a href="/interview/interview" class="dropdown-toggle active" data-toggle=""> <div class="iconset top-home"></div> </a> </li>                              
            </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER --> 
        <div class="header-quick-nav" > 
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left"> 
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >
                            <div class="iconset top-menu-toggle-dark"></div>
                        </a> </li>
                </ul>
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="" class="" onclick="location.reload();" >
                            <div class="iconset top-reload"></div>
                        </a> </li>               
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right"> 
                <div class="chat-toggler">	
                    <!--<a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">-->
                    <div class="user-details"> 
                        <div class="username">
                                <!--<span class="badge badge-important">3</span>--> 
                            <span class="bold">&nbsp;</span>									
                        </div>						
                    </div> 
                </div>
                <ul class="nav quick-section ">
                    <li class="quicklinks"> 
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">						
                            <div class="iconset top-settings-dark "></div> 	
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                            <?php echo CHtml::beginForm(array('admin/logout'), 'post') ?>                           
                            <button class="btn btn-block btn-white" type="submit"><i class='fa fa-power-off'>Logout</i></button>
                            <?php echo CHtml::endForm(); ?>             
                        </ul>
                    </li> 

                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div> 
        <!-- END TOP NAVIGATION MENU --> 

    </div>
    <!-- END TOP NAVIGATION BAR --> 
</div>
<!-- END HEADER -->

<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar" id="main-menu"> 
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
            <!-- BEGIN MINI-PROFILE -->
            <div class="user-info-wrapper">	
                <div class="profile-wrapper">
                    <img src="/interview/images/layout/default.png"  alt="" data-src="/interview/images/layout/default.png" data-src-retina="/interview/images/layout/default.png" width="69" height="69" />
                </div>
                <div class="user-info">
                    <div class="greeting">Welcome</div>
                    <div class="username"><span class="semi-bold">Admin</span></div>
                    <div class="status">Status<a href="" onclick="location.reload();"><div class="status-icon green"></div>Online</a></div>
                </div>
            </div>
            <!-- END MINI-PROFILE -->

            <!-- BEGIN SIDEBAR MENU -->	
            <p class="menu-title">BROWSE <span class="pull-right"></span></p>
            <?php
            $this->widget('zii.widgets.CMenu', array(
                'items'       => array(
                    array(
                        'label'       => '<i class="icon-custom-portlets"></i> <span class="title">Interview</span>',
                        'url'         => array('interview/index'),
                        'linkOptions' => array('class' => 'href_class'),
                        'active'      => $this->id == 'interview' ? true : false,
                    ),
                    array(
                        'label'       => '<i class="fa fa-flag"></i><span class="title">Country</span>',
                        'url'         => array('countries/index'),
                        'linkOptions' => array('class' => 'href_class'),
                        'active'      => $this->id == 'countries' ? true : false,
                    ),
                    array(
                        'label'       => '<i class="fa fa fa-adjust"></i><span class="title">Question</span>',
                        'url'         => array('question/IndexSize?size=10'),
                        'linkOptions' => array('class' => 'href_class'),
                        'active'      => $this->id == 'question' ? true : false,
                    ),
                    array(
                        'label'       => '<i class="icon-custom-portlets"></i><span class="title">Category</span>',
                        'url'         => array('category/IndexSize?size=10'),
                        'linkOptions' => array('class' => 'href_class'),
                        'active'      => $this->id == 'category' ? true : false,
                    ),
                    array(
                        'label'       => '<i class="fa fa-flag"></i>  <span class="title">Visa</span>',
                        'url'         => array('visa/index'),
                        'linkOptions' => array('class' => 'href_class'),
                        'active'      => $this->id == 'visa' ? true : false,
                    ),
                    array(
                        'label'       => '<i class="glyphicon glyphicon-list-alt"></i>  <span class="title">Office</span>',
                        'url'         => array('office/index'),
                        'linkOptions' => array('class' => 'href_class'),
                        'active'      => $this->id == 'office' ? true : false,
                    ),
                    array(
                        'label'       => '<i class="fa fa-credit-card"></i>  <span class="title">Option</span>',
                        'url'         => array('option/index'),
                        'linkOptions' => array('class' => 'href_class'),
                        'active'      => $this->id == 'option' ? true : false,
                    ),
                ),
                'encodeLabel' => false,
            ));
            ?>
            <div class="clearfix"></div>
            <!-- END SIDEBAR MENU --> 
        </div>
    </div>
    <a href="#" class="scrollup">Scroll</a>
    <!-- END SIDEBAR -->

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">  
            <div class="col-md-12">
                <!--JN:stat:breadcrumb-->
                <?php 
                if(isset($this->breadcrumbs))
                {
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                        'tagName' => 'ul',
                        'separator' => ' > ',
                        'homeLink' => '<li><a href="/interview/admin/">ワーキング・ホリデー（ワーホリ）協会</a><li>',
                        'htmlOptions' => array('class' => 'b_breadcrumbs row'),
                    ));
                }
                ?>
                <!--JN:end:breadcrumb-->
            <!--JN:start.alert-->
            <?php
            if (Yii::app()->user->hasFlash('error')) {
                ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                    <?php echo Yii::app()->user->getFlash('error') ?>
                </div>
                <?php
            }
            if (Yii::app()->user->hasFlash('success')) {
                ?>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                    <?php echo Yii::app()->user->getFlash('success') ?>
                </div>
                <?php
            }
            ?>
            <!--JN:end:alert-->
            </div><br/>         
            <?php //$this->beginBody() ?>           
            <?php echo $content; ?>
            <?php //$this->endBody() ?>

        </div>
    </div>

</div>

<!--//================JS==================//-->
<script src="/interview/plugins/boostrapv3/js/bootstrap.min.js"></script>
<script src="/interview/plugins/breakpoints.js"></script>
<script src="/interview/plugins/jquery-unveil/jquery.unveil.min.js"></script>
<script src="/interview/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="/interview/plugins/pace/pace.min.js"></script>
<script src="/interview/plugins/jquery-numberAnimate/jquery.animateNumbers.js"></script>
<script src="/interview/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="/interview/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/interview/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="/interview/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="/interview/plugins/jquery-inputmask/jquery.inputmask.min.js"></script>
<script src="/interview/plugins/jquery-autonumeric/autoNumeric.js"></script>
<script src="/interview/plugins/ios-switch/ios7-switch.js"></script>
<script src="/interview/plugins/bootstrap-select2/select2.min.js"></script>
<script src="/interview/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script src="/interview/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="/interview/plugins/bootstrap-tag/bootstrap-tagsinput.min.js"></script>
<script src="/interview/plugins/dropzone/dropzone.min.js"></script>
<script src="/interview/js/form_elements.js"></script>
<script src="/interview/js/core.js"></script>
<script src="/interview/js/chat.js"></script>
<script src="/interview/js/demo.js"></script>
<script src="/interview/plugins/jquery-block-ui/jqueryblockui.js"></script>
<script src="/interview/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js"></script>
</body>
</html>