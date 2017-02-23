/*
	jResize v1.0.0
	by Todd Motto: http://www.toddmotto.com
	Latest version: https://github.com/toddmotto/jResize

	Responsive development plugin for resizing the content within one window
*/
$('document').ready(function(){
    (function ($) {

        $.jResize = function (options) {

            // jResize default options for customisation, ViewPort size, Background Color and Font Color
            $.jResize.defaults = {
                viewPortSizes   : ["320px", "480px", "540px", "600px", "768px", "960px", "1024px", "1280px"],
                backgroundColor : '444',
                fontColor       : 'FFF'
            };

            options = $.extend({}, $.jResize.defaults, options);

            // Variables
            var resizer        = '<div class="viewports" style="position:fixed;height:85px;top:0;left:0;right:0;overflow:hidden;z-index:9999;background:#'
                               + options.backgroundColor + ';color:#' + options.fontColor + ';box-shadow:0 0 3px #222;"><ul class="viewlist">'
                               + '</ul><div style="clear:both;"></div></div>';

            var viewPortWidths = options.viewPortSizes;

            var viewPortList   = 'display:inline-block;cursor:pointer;font-size:12px;line-height:12px;text-align:center;width:12%;font-family:sans-serif;'
                               + 'border-right:1px solid #555;padding:13px 5px;';

            // Wrap all HTML inside the <body>
            $('body').wrapInner('<div id="resizer" />');

            // Insert our resizing plugin
            $('#resizer').before(resizer);

            // Loop through the array, using the each to dynamically generate our ViewPort lists
            $.each(viewPortWidths, function (go, className) {
                switch(className) {
                    case '21em':
                        var classLabel = 'Phone Portrait';
                        break;
                    case '30em':
                        var classLabel = 'Phone Landscape (480px)';
                        break;
                    case '48em':
                        var classLabel = 'Tablet Portrait (768px)';
                        break;
                    case '64em':
                        var classLabel = 'Tablet Landscape (1024px)';
                        break;    
                    case '79em':
                        var classLabel = 'Desktop Minimal (1260px)';
                        break;    
                    default:
                        var classLabel = className;
                }
                $('.viewlist').append($('<li class="' + className + '"' + ' style="' + viewPortList + '">' + classLabel + '</li>'));
                $('.' + className + '').click(function () {
                    $('#resizer').animate({
                        width: '' + className + ''
                    }, 300);
                });
            });

            // Prepend our Reset button
            $('.viewlist').prepend('<li class="reset" style="' + viewPortList + '">Reset</li>');

            // Slidedown the viewport navigation and animate the resizer
            var height = $('.viewlist').outerHeight();
            $('.viewports').hide().slideDown('300');
            $('#resizer').css({margin: '0 auto'});//.animate({marginTop : height});

            // Allow for Reset
            $('.reset').click(function () {
                $('#resizer').css({
                    width: 'auto'
                });
            });

        };

    })(jQuery);
    
    $.jResize({
        viewPortSizes   : ["21em", "30em", "48em", "64em", "79em"], // ViewPort Widths
        backgroundColor : '444', // HEX Code
        fontColor       : 'FFF' // HEX Code
    });
});