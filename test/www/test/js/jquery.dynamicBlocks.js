/* 
* jQuery dynamicBlocks v1.0.0 
* Copyright (c) 2008 Taranets Aleksey 
* www: markup-javascript.com 
* Licensed under the MIT License: 
* http://www.opensource.org/licenses/mit-license.php 
*/

jQuery.fn.dynamicBlocks = function(_opt){
	// defaults options
	var _opt = jQuery.extend({
		opener:'a',
		changeStyle:'left',
		setParam:'0',
		event:'click',
		duration:500
	},_opt);
	return this.each(function(){
	var _obj = jQuery(this);
		var _defParam = parseInt(_obj.css(_opt.changeStyle));
		var _setParam = parseInt(_opt.setParam);
		var _opener = jQuery(_opt.opener, _obj);
		var _duration = _opt.duration;
		var _style = _opt.changeStyle.toString();
		
		_obj.addClass("blockDefault")
		// clic event
		if (_opt.opener && _opt.event != 'move') {
			_opener.bind(_opt.event, function(){
				if (!_obj.hasClass('blockChange')){
					_obj.addClass('blockChange');
					_obj.removeClass("blockDefault");
					eval('_obj.animate({'+_style+' : '+_setParam+'}, '+_duration+', false)');
				} else {
					eval('_obj.animate({'+_style+' : '+_defParam+'}, '+_duration+', false, function(){_obj.removeClass("blockChange"), _obj.addClass("blockDefault")})');
				}
				return false; 
			});
		// move event
		}
	});
}

