/*
 * Auth : SinhNguyen
 * Email: sinhnguyen193@gmail.com
 */
fbcomment_als = (function ($) {
    var id = 0;
	var js = [
        '/js/jquery_als/jquery.als.js',
        '/js/jquery_als/jquery.als-1.7.min.js'
    ];
    var items = [];
    var defaultConfig = {
        container: {
            id: undefined,
            class: 'als-container comment-content clearfix'
        },
        category: undefined,
        width: undefined,
        height: undefined,
		visible_items:5,
		speed:1000,
		interval:500,
		autoscroll:'yes',
		scrolling_items:1,
		easing:'linear',
        background: '#fff',
        description: '当協会のセミナーにご参加頂いた方の声をご紹介します',
        items: {
            background: '#fbfbfb',
            color: '#222'
        },
		scroll:{
			axis:'vertical',
			direction:'up'
		},
        sort: {
            column: '',
            type: 'RAND'
        }
    };
    var feedback = {
        init: function () {
                feedback.registerJsFile(js, 'head');
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

                feedback.getItems({category: setting.category, sort: setting.sort});
                jQuery(mainContent).append('<p class="fb-desc">'+setting.description+'</p>')
                                   .append(items);
                document.write(jQuery(mainContent).prop('outerHTML'));
                jQuery.each(setting.items, function(attribute, value) {
                    jQuery(element).find('.als-item').css(attribute, value);
                });
                var script = '<script>' +
                    'jQuery("' + element + '").als({' +
					'visible_items:'+setting.visible_items+','+
                    'slidesToShow:' + setting.visible_items + ',' +
                    'speed:' + setting.speed + ',' +
                    'interval:' + setting.interval + ',' +
                    'autoscroll: "' + setting.autoscroll + '",' +
                    'scrolling_items:' + setting.scrolling_items + ',' +
					'easing:"' +setting.easing+'",'+
					'orientation:"'+setting.scroll.axis+'",'+
					'direction: "'+setting.scroll.direction+'",'+
					'circular:"no"'+
                    '});' +
                    '</script>';
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
        getItems: function (options) {
            var url = window.location.origin + '/feedback/fbcomment_als.php';
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
fbcomment_als.init();