/*
 * Auth : SinhNguyen
 * Email: sinhnguyen193@gmail.com
 */
fbcomment = (function ($) {
    var id = 0;
    var css = [
        '/css/jquery_als/als.css'
    ];
	 var js = [
        '/js/jquery_als/jquery.als-1.7.min.js',
		'/js/jquery_slick/slick.js'
	];
    var items = [];
    var defaultConfig = {
		//config general
        container: {
            id: undefined,
            class: 'als-container comment-content clearfix'
        },
        category: undefined,
        width: undefined,
        height: undefined,	
		visible_items: 5,// item	
		speed: 1000,
		scrolling_items:1,// user jquery slick +1 show item top -> bot or right->left , -1 show item bot->top or left -> right,		
        background: '#fff',
        description: '当協会のセミナーにご参加頂いた方の声をご紹介します',
		easing: "linear", //animation
		typejs:'slick', // value als or slick
		circular:'no',
        items: {
            background: '#fbfbfb',
            color: '#222'
        },
		scroll:{
			axis:'vertical',
			direction:'down'
		},
        sort: {
            column: '',
            type: 'RAND'
        },
		//config slick
		autoscroll: 'true', //value boolean
		vertical:true, // true scroll bot->top, false left -> right
		// config als
		autoscroll_als: 'yes', //value yes or no
		interval:5000,
    };
    var feedback = {
        init: function () {
            feedback.registerCssFile(css,'head');
            feedback.registerJsFile(js,'head');
        },
        Widget: function (options) {
            var setting = $.extend({}, defaultConfig, options || {});
            if (this.prepareInit(setting)) {
                var mainContent = document.createElement('div');
                var element = '';
                var settingContent = setting.container;
                if (typeof settingContent == 'string') {
                    if (settingContent.substring(0, 1) == '#') {
                        jQuery(mainContent).attr('id', settingContent.substring(1));
                    } else if (settingContent.substring(0, 1) == '.') {
                        jQuery(mainContent).attr('class', settingContent.substring(1));
                    } else {
                        jQuery(mainContent).attr('id', settingContent);
                    }
                    element = settingContent;
                } else if (typeof settingContent == 'object') {
                    if (settingContent.id == undefined) {
                        settingContent.id = 'fbcomment-' + id;
                    }
                    jQuery.each(settingContent, function (attribute, value) {
                        jQuery(mainContent).attr(attribute, value);
                    });
                    element = '#' + settingContent.id;
                    settingContent.id = undefined;
                }
                jQuery(mainContent).css('width', setting.width)
                                   .css('height', setting.height)
                                   .css('background', setting.background)
                                   .css('margin', '5px 0')
                                   .css('overflow', 'hidden');

                feedback.getItems({category: setting.category, sort: setting.sort},setting.typejs);
                jQuery(mainContent).append('<p class="fb-desc">'+setting.description+'</p>')
                                   .append(items);
                document.write(jQuery(mainContent).prop('outerHTML'));
                jQuery.each(setting.items, function(attribute, value) {
                    jQuery(element).find('.als-item').css(attribute, value);
                });
				if(setting.typejs == 'als'){// use jquery als
					var script = '<script>' +
                    'jQuery("' + element + '").als({' +
					'visible_items:'+setting.visible_items+','+
                    'speed:' + setting.speed + ',' +
                    'interval:' + setting.interval + ',' +
                    'autoscroll: "' + setting.autoscroll_als + '",' +
                    'scrolling_items:' + setting.scrolling_items + ',' +
					'easing:"' +setting.easing+'",'+
					'orientation:"'+setting.scroll.axis+'",'+
					'direction: "'+setting.scroll.direction+'",'+
					'circular:"'+setting.circular+'"'+
                    '});' +
                    '</script>';
				}
                else{ //use jquery slick
					var script = '<script>jQuery("' + element + ' .als-viewport").slick({'+
						'adaptiveHeight:true,'+
						'vertical:'+setting.vertical+','+
						'slidesToShow:'+setting.visible_items+','+
						'slidesToScroll:'+setting.scrolling_items+','+
						'autoplay: '+setting.autoscroll+','+
						'easing:"'+setting.easing+'",'+					 
						'autoplaySpeed: '+setting.speed+
					'})';
                }
                
                feedback.registerScript(script, 'body');
                id++;
            }

        },
        prepareInit: function (config) {
            if (config.category == undefined) {
                alert('Category required!');
                return false;
            }
            if (config.width == undefined || config.height == undefined) {
                alert('Feedback Width || Height required!');
                return fase;
            }
            return true;
        },
        getItems: function (options,typejs) {
			if(typejs == 'als')
				var url = window.location.origin + '/feedback/fbcomment_als.php';
			else
				var url = window.location.origin + '/feedback/fbcomment.php';
            jQuery.ajax({
               url: url,
               type: 'post',
               async:false,
               data: options,
               success: function(d) {
                   items = d;
               }
            });
        },
        registerScript: function (script, appendIn) {
            if (typeof script == 'string') {
                jQuery(appendIn).append(script);
            }
        },
        registerJsFile: function(js, appendIn) {
            if (typeof js == 'string') {
                var sc = document.createElement( 'script' );
                    sc.type = 'text/javascript';
                    sc.src  = js;
                jQuery(appendIn).append(sc);
            } else if (jQuery.isArray(js)) {
                jQuery.each(js, function(i, s){
                    var sc  = document.createElement( 'script' );
                        sc.type = 'text/javascript';
                        sc.src  = s;
                    jQuery(appendIn).append(sc);
                });
            }
        },
        registerCssFile: function(css, appendIn) {
            if (typeof css == 'string') {
                var cs = document.createElement( 'link' );
                    cs.rel  = "stylesheet";
                    cs.type = 'text/css';
                    cs.href = css;
                jQuery(appendIn).append(cs);
            } else if (jQuery.isArray(css)) {
                jQuery.each(css, function(i, c){
                    var cs = document.createElement( 'link' );
                        cs.rel  = "stylesheet";
                        cs.type = 'text/css';
                        cs.href = c;
                    jQuery(appendIn).append(cs);
                });
            }
        }
    };
    return feedback;
})(window.jQuery);
fbcomment.init();