//jQuery.noConflict();

window.onload=documentLoaded;
function documentLoaded(){
    
}

$(function() {
    $('.roundbox').rbox();
    $('.content a').linkExternal();
    $('.content a[title], .content abbr[title], .content acronym[title], .content dfn[title]').linkTooltip();
    $('.autoclear').autoClear();

    $('.content img').each(function(n, o){
    	var float = $(o).css('float');
    	if (float == 'left') { $(o).addClass('alignImageLeft'); }
    	else if (float == 'right') { $(o).addClass('alignImageRight'); }
    });

    $('.content tr:not(thead tr, tfoot tr):odd').addClass('odd');	
    
    $('.tooltip span')
    	.css('border-radius', '5px')	
    	.css('-moz-border-radius', '5px')	
    	.css('-webkit-border-radius', '5px');	
    
    $(document).formsWidthNormalize();
    if (isIE(6)) { $(document).pngFix(); }
});
