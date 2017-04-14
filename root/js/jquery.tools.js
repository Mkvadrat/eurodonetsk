/**
 * @description cheack IE version
 */
function isIE(version) {
    if ($.browser.msie && parseInt($.browser.version) == version) { return true; } else { return false };
}

/**
 * @description mini plugins for content
 */
(function($) {
    /**
    * @description crossbrowsing rounded corners
    */
    $.fn.rbox = function() {
        if ($(this).get(0)) {
            $(this).addClass('rbox').wrapInner('<div class="rbox_m"></div>');
            $('.rbox_m',this).before('<div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t"> </div></div></div>');
            $('.rbox_m',this).after('<div class="rbox_br"><div class="rbox_bl"><div class="rbox_b"> </div></div></div>');
        }
        return $(this);
    }

    /**
     * @description js&css tooltips
     */
    $.fn.linkTooltip = function() {
        $(this).each(function(i, obj) {
            if ($(obj).attr('title') && ($(obj).children().is('img') || !$(obj).children().get(0))) {
                if (isIE(6) && obj.tagName == 'ABBR' || ($(obj).children().is('img') && isIE(6))) {
                    return;
                } else {
                    $(obj).append('<span>'+$(obj).attr('title')+'</span>').attr('title', '').addClass('tooltip');
                }
            }
        });
        return $(this);
    }

    /**
     * @description external links
     */
    $.fn.linkExternal = function() {
        $(this).each(function(i, obj) {
            var href = $(obj).attr('href');
            var host = (location.host).replace('www.', '');
            if (href && href.indexOf('http') == 0  && !$(obj).children().get(0)) {
                if ( href.indexOf('http://'+host) == 0 ||
                     href.indexOf('http://www.'+host ||
                     href.indexOf('https://www.'+host)  == 0 ) ) {
                    $(obj).addClass('external')
                }
            }        
        });
        return $(this);
    }

    /**
     * @description autoclear
     */
    $.fn.autoClear = function () {
        $(this).each(function() { $(this).attr("defaultvalue", $(this).attr("value")); });
        $(this)
            .bind('focus', function() {
                if ($(this).attr("value") == $(this).attr("defaultvalue")) {
                    $(this).attr("value", "").addClass('autoclear-normalcolor');
                }
            })
            .bind('blur', function() {
                if ($(this).attr("value") == "") {
                    $(this).attr("value", $(this).attr("defaultvalue")).removeClass('autoclear-normalcolor');
                }
            });
        return $(this);
    }

    /**
     * @description input width
     */
    $.fn.formsWidthNormalize = function () {
        if ($.browser.msie && $.browser.version<7) {
            $("select.form-weight-normal").each(function(i, obj) {
                var normPadding=Math.ceil(Number(String($(obj).css("padding-left")).slice(0,-2)))+Math.ceil(Number(String($(obj).css("padding-right")).slice(0,-2)));
                var normBorder=Math.ceil(Number(String($(obj).css("border-left-width")).slice(0,-2)))+Math.ceil(Number(String($(obj).css("border-right-width")).slice(0,-2)));
                var normWidth=Math.ceil(Number($(obj).width()))+normPadding+normBorder*2;
                $(obj).width(normWidth);
            });
        } else {
            $("input[type=text].form-weight-normal, input[type=password].form-weight-normal, textarea.form-weight-normal").each(function(i, obj) {
                var normPadding=Math.ceil(Number(String($(obj).css("padding-left")).slice(0,-2)))+Math.ceil(Number(String($(obj).css("padding-right")).slice(0,-2)));
                var normWidth=Math.ceil(Number($(obj).width()))-normPadding;
                $(obj).width(normWidth);
            });
            $("select.form-weight-normal").each(function(i, obj) {
                var normPadding=Math.ceil(Number(String($(obj).css("padding-left")).slice(0,-2)))+Math.ceil(Number(String($(obj).css("padding-right")).slice(0,-2)));
                var normBorder=Math.ceil(Number(String($(obj).css("border-left-width")).slice(0,-2)))+Math.ceil(Number(String($(obj).css("border-right-width")).slice(0,-2)));
                if ($.browser.msie && $.browser.version<8){
                    var normWidth=Math.ceil(Number($(obj).width()))+normPadding+normBorder*2;
                } else {
                    var normWidth=Math.ceil(Number($(obj).width()))+normPadding+normBorder;
                }
                $(obj).width(normWidth);
            });     
        }
        return $(this);
    }
})(jQuery)
